<?php
declare(strict_types=1);

require_once __DIR__ . '/lib/db.php';

$slug = isset($_GET['slug']) ? trim((string) $_GET['slug']) : '';
$post = null;

if ($slug !== '') {
    try {
        $pdo = db();
        $stmt = $pdo->prepare(
            'SELECT p.*, a.name AS author_name, a.bio AS author_bio,
                    c.name AS category_name, c.slug AS category_slug
             FROM blog_posts p
             LEFT JOIN blog_authors a    ON a.id = p.author_id
             LEFT JOIN blog_categories c ON c.id = p.category_id
             WHERE p.slug = :slug AND p.status = "published"
             LIMIT 1'
        );
        $stmt->execute([':slug' => $slug]);
        $post = $stmt->fetch() ?: null;
    } catch (Throwable $ex) {
        $post = null;
    }
}

if (!$post) {
    http_response_code(404);
    $pageTitle = 'Post not found — DevZila Blog';
    $pageDescription = 'The requested blog post could not be found.';
    $navServicesHref = '/#services';
    require __DIR__ . '/partials/header.php';
    echo '<header class="svc-header"><div class="svc-label">404</div>'
       . '<h1>Post not found</h1>'
       . '<p>The article you are looking for doesn\'t exist or is no longer available.</p>'
       . '<div class="header-actions"><a class="btn-primary" href="/blog">Back to blog →</a></div></header>';
    require __DIR__ . '/partials/footer.php';
    exit;
}

$pageTitle = $post['title'] . ' — DevZila Blog';
$pageDescription = $post['excerpt'] ?: ('Read "' . $post['title'] . '" on the DevZila blog.');
$navServicesHref = '/#services';
require __DIR__ . '/partials/header.php';
?>

<article class="post-article">
  <header style="padding-top:7rem;">
    <a class="post-back" href="/blog">← All posts</a>
    <?php if (!empty($post['category_name'])): ?>
      <div class="post-cat"><?= e($post['category_name']) ?></div>
    <?php endif; ?>
    <h1><?= e($post['title']) ?></h1>
    <div class="post-meta">
      By <?= e($post['author_name'] ?? 'DevZila') ?> ·
      <?= e(date('F j, Y', strtotime($post['published_at'] ?? $post['created_at']))) ?>
    </div>
  </header>

  <div class="post-body">
    <?= $post['body'] /* trusted HTML authored in admin */ ?>
  </div>
</article>

<?php require __DIR__ . '/partials/footer.php'; ?>
