<?php

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
        // 1. Security: Block sensitive extensions (.sql, .md)
        if (preg_match('/\.(sql|md)$/i', $uri)) {
            $this->denyAccess();
        }

        // 2. Security: Block specific config files
        $filename = basename($uri);
        if ($filename === 'config.php' || $filename === 'config.sample.php') {
            $this->denyAccess();
        }

        // 3. Security: Block direct access to partials/ or lib/ folders
        if (preg_match('/^\/(partials|lib)\//i', $uri)) {
            $this->denyAccess();
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
    public function frontControllerPath(string $sitePath, string $siteName, string $uri): string
    {
        // Normalize trailing slashes
        $uri = rtrim($uri, '/');

        // 1. Redirect "/index" or "/index.php" to "/"
        if ($uri === '/index' || $uri === '/index.php') {
            header('Location: /', true, 301);
            exit;
        }

        // 2. Redirect external "/page.php" requests to "/page"
        if (preg_match('/\.php$/i', $uri)) {
            header('Location: ' . substr($uri, 0, -4), true, 301);
            exit;
        }

        // 3. Pretty blog post URLs: /blog/{slug} -> blog-post.php?slug={slug}
        if (preg_match('/^\/blog\/([A-Za-z0-9_-]+)$/i', $uri, $matches)) {
            $_GET['slug'] = $matches[1];
            
            // Re-inject existing query string options if present
            if (isset($_SERVER['QUERY_STRING'])) {
                parse_str($_SERVER['QUERY_STRING'], $queryStringArray);
                $_GET = array_merge($_GET, $queryStringArray);
            }

            return $sitePath . '/blog-post.php';
        }

        // 4. Map extensionless URL to its matching .php file
        if (file_exists($sitePath . $uri . '.php')) {
            return $sitePath . $uri . '.php';
        }

        // Default fallback to index.php for "/" or unknown routes
        return $sitePath . '/index.php';
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
