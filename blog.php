<?php
declare(strict_types=1);

require_once __DIR__ . '/lib/db.php';

$categorySlug = isset($_GET['category']) ? trim((string) $_GET['category']) : '';
$posts = [];
$categories = [];
$activeCategory = null;
$dbError = false;

try {
    $pdo = db();
    $categories = $pdo->query('SELECT name, slug FROM blog_categories ORDER BY name')->fetchAll();

    $sql = 'SELECT p.title, p.slug, p.excerpt, p.published_at, p.created_at,
                   a.name AS author_name, c.name AS category_name, c.slug AS category_slug
            FROM blog_posts p
            LEFT JOIN blog_authors a    ON a.id = p.author_id
            LEFT JOIN blog_categories c ON c.id = p.category_id
            WHERE p.status = "published"';
    $params = [];
    if ($categorySlug !== '') {
        $sql .= ' AND c.slug = :cat';
        $params[':cat'] = $categorySlug;
        foreach ($categories as $c) {
            if ($c['slug'] === $categorySlug) {
                $activeCategory = $c['name'];
            }
        }
    }
    $sql .= ' ORDER BY COALESCE(p.published_at, p.created_at) DESC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $posts = $stmt->fetchAll();
} catch (Throwable $ex) {
    $dbError = true;
}

$pageTitle = $activeCategory
    ? "{$activeCategory} — DevZila Blog"
    : 'Blog — DevZila';
$pageDescription = 'Insights on Ruby on Rails, Domain-Driven Design, frontend, and shipping maintainable software.';
$navServicesHref = '/#services';
require __DIR__ . '/partials/header.php';
?>

<header class="svc-header">
  <div class="breadcrumb"><a href="/">Home</a> · Blog</div>
  <div class="svc-label">DevZila Blog</div>
  <h1><?= $activeCategory ? e($activeCategory) : 'Notes on building better software' ?></h1>
  <p>Practical insights on Ruby on Rails, Domain-Driven Design, frontend, and lessons from shipping real products.</p>
</header>

<div class="blog-wrap">
  <?php if ($categories): ?>
  <div class="cat-pills">
    <a class="cat-pill <?= $categorySlug === '' ? 'active' : '' ?>" href="/blog">All</a>
    <?php foreach ($categories as $c): ?>
      <a class="cat-pill <?= $categorySlug === $c['slug'] ? 'active' : '' ?>" href="/blog?category=<?= e(urlencode($c['slug'])) ?>"><?= e($c['name']) ?></a>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <?php if ($dbError): ?>
    <div class="blog-empty">The blog is temporarily unavailable. Please check back soon.</div>
  <?php elseif (!$posts): ?>
    <div class="blog-empty">No posts published yet. Check back soon!</div>
  <?php else: ?>
    <div class="blog-grid">
      <?php foreach ($posts as $p): ?>
        <a class="post-card" href="/blog/<?= e($p['slug']) ?>">
          <?php if (!empty($p['category_name'])): ?>
            <div class="post-cat"><?= e($p['category_name']) ?></div>
          <?php endif; ?>
          <h2><?= e($p['title']) ?></h2>
          <p><?= e($p['excerpt'] ?? '') ?></p>
          <div class="post-meta">
            <?= e($p['author_name'] ?? 'DevZila') ?> ·
            <?= e(date('M j, Y', strtotime($p['published_at'] ?? $p['created_at']))) ?>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
