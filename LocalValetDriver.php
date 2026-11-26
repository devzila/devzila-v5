<?php

use Valet\Drivers\ValetDriver;

/**
 * Local (Laravel Herd / Valet) driver that mirrors the production .htaccess
 * rules: extensionless URLs, pretty blog URLs, sitemap.xml and a real 404.
 */
class LocalValetDriver extends ValetDriver
{
    /**
     * Determine if the driver serves the request.
     */
    public function serves(string $sitePath, string $siteName, string $uri): bool
    {
        return true;
    }

    /**
     * Determine if the incoming request is for a static file.
     */
    public function isStaticFile(string $sitePath, string $siteName, string $uri)
    {
        $this->guard($uri);

        // PHP files are never static: they go through the front controller.
        if (preg_match('/\.php$/i', $uri)) {
            return false;
        }

        // Standard Valet static file handling for assets (images, css, js, etc.)
        if (file_exists($staticFilePath = $sitePath . $uri) && ! is_dir($staticFilePath)) {
            return $staticFilePath;
        }

        return false;
    }

    /**
     * Front-controller pattern mapping for extensionless URLs.
     */
    public function frontControllerPath(string $sitePath, string $siteName, string $uri): ?string
    {
        $this->guard($uri);

        // Redirect "/page/" to "/page" (directories such as /admin/ are left alone)
        if ($uri !== '/' && substr($uri, -1) === '/' && ! is_dir($sitePath . rtrim($uri, '/'))) {
            $query = ! empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '';
            header('Location: ' . rtrim($uri, '/') . $query, true, 301);
            exit;
        }

        $uri = rtrim($uri, '/');

        // Homepage
        if ($uri === '') {
            return $sitePath . '/index.php';
        }

        $query = ! empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '';

        // Legacy static URLs: /page.html -> /page. Real files (the Google
        // verification HTML) are served as static files and never reach here.
        if (preg_match('/\.html$/i', $uri)) {
            $target = preg_replace('/\.html$/i', '', $uri) ?: '/';
            if ($target === '/index') {
                $target = '/';
            }
            header('Location: ' . $target . $query, true, 301);
            exit;
        }

        // The blog renderer is not a public URL.
        if ($uri === '/blog-post' || $uri === '/blog-post.php') {
            header('Location: /blog' . $query, true, 301);
            exit;
        }

        // 1. Redirect "/index" or "/index.php" to "/"
        if ($uri === '/index' || $uri === '/index.php') {
            header('Location: /', true, 301);
            exit;
        }

        // 2. Redirect external "/page.php" requests to "/page"
        if (preg_match('/\.php$/i', $uri)) {
            $query = ! empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '';
            header('Location: ' . substr($uri, 0, -4) . $query, true, 301);
            exit;
        }

        // 3. XML sitemap: /sitemap.xml -> sitemap.php
        if ($uri === '/sitemap.xml') {
            return $sitePath . '/sitemap.php';
        }

        // 4. Pretty blog post URLs: /blog/{slug} -> blog-post.php?slug={slug}
        if (preg_match('/^\/blog\/([A-Za-z0-9_-]+)$/i', $uri, $matches)) {
            $_GET['slug'] = $matches[1];

            // Re-inject existing query string options if present
            if (isset($_SERVER['QUERY_STRING'])) {
                parse_str($_SERVER['QUERY_STRING'], $queryStringArray);
                $_GET = array_merge($_GET, $queryStringArray);
            }

            return $sitePath . '/blog-post.php';
        }

        // 5. Directory index: /admin -> admin/index.php
        if (is_dir($sitePath . $uri) && is_file($sitePath . $uri . '/index.php')) {
            return $sitePath . $uri . '/index.php';
        }

        // 6. Map extensionless URL to its matching .php file
        if (is_file($sitePath . $uri . '.php')) {
            return $sitePath . $uri . '.php';
        }

        // Unknown route: real 404 page (never a soft-404 copy of the homepage)
        return $sitePath . '/404.php';
    }

    /**
     * Block the same sensitive paths the production .htaccess blocks.
     */
    private function guard(string $uri): void
    {
        // 1. Sensitive extensions (.sql, .md)
        if (preg_match('/\.(sql|md)$/i', $uri)) {
            $this->denyAccess();
        }

        // 2. Config files and this driver
        $filename = basename($uri);
        if (in_array($filename, ['config.php', 'config.sample.php', 'LocalValetDriver.php'], true)) {
            $this->denyAccess();
        }

        // 3. Include-only folders
        if (preg_match('/^\/(partials|lib)(\/|$)/i', $uri)) {
            $this->denyAccess();
        }
    }

    /**
     * Helper to return a 403 Forbidden page for blocked resources.
     */
    private function denyAccess(): void
    {
        header('HTTP/1.1 403 Forbidden');
        echo '403 Forbidden - Access Denied.';
        exit;
    }
}
