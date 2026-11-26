<?php
/**
 * XML sitemap, served at /sitemap.xml (see .htaccess).
 *
 * Static pages are listed below. Published blog posts are added from the
 * database when it is available. Only canonical, indexable URLs belong here.
 */

declare(strict_types=1);

require_once __DIR__ . '/lib/site.php';

/** path => source file (its modification time becomes <lastmod>) */
$pages = [
    '/'                           => 'index.php',
    '/ai-transformation-strategy' => 'ai-transformation-strategy.php',
    '/ai-integration-automation'  => 'ai-integration-automation.php',
    '/legacy-rails-modernization' => 'legacy-rails-modernization.php',
    '/ai-readiness-assessment'    => 'ai-readiness-assessment.php',
    '/ai-use-cases'               => 'ai-use-cases.php',
    '/rails-development'          => 'rails-development.php',
    '/rails-upgrades'             => 'rails-upgrades.php',
    '/fintech-solutions'          => 'fintech-solutions.php',
    '/frontend-development'       => 'frontend-development.php',
    '/ai-for-rails-workshop'      => 'ai-for-rails-workshop.php',
    '/ddd-workshops'              => 'ddd-workshops.php',
    '/event-storming-workshops'   => 'event-storming-workshops.php',
    '/hotwire-workshop'           => 'hotwire-workshop.php',
    '/code-mentoring'             => 'code-mentoring.php',
    '/why-devzila'                => 'why-devzila.php',
    '/ai-glossary'                => 'ai-glossary.php',
    '/faq'                        => 'faq.php',
    '/blog'                       => 'blog.php',
    '/hire-us'                    => 'hire-us.php',
];

$urls = [];
foreach ($pages as $path => $file) {
    $source = __DIR__ . '/' . $file;
    if (!is_file($source)) {
        continue;
    }
    $urls[] = ['loc' => site_url($path), 'lastmod' => date('Y-m-d', (int) filemtime($source))];
}

// Blog posts and categories (skipped silently if the database is unavailable).
try {
    $pdo = db();

    $posts = $pdo->query(
        'SELECT slug, COALESCE(updated_at, published_at, created_at) AS modified
         FROM blog_posts
         WHERE status = "published"
         ORDER BY COALESCE(published_at, created_at) DESC'
    )->fetchAll();
    foreach ($posts as $post) {
        $urls[] = [
            'loc'     => site_url('/blog/' . $post['slug']),
            'lastmod' => $post['modified'] ? date('Y-m-d', (int) strtotime((string) $post['modified'])) : null,
        ];
    }
} catch (Throwable $ex) {
    // Static pages are still listed.
}

header('Content-Type: application/xml; charset=utf-8');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($urls as $url) {
    echo "  <url>\n";
    echo '    <loc>' . htmlspecialchars($url['loc'], ENT_XML1 | ENT_QUOTES, 'UTF-8') . "</loc>\n";
    if ($url['lastmod']) {
        echo '    <lastmod>' . $url['lastmod'] . "</lastmod>\n";
    }
    echo "  </url>\n";
}
echo '</urlset>' . "\n";
