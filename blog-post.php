<?php
declare(strict_types=1);

require_once __DIR__ . '/lib/site.php';

$slug = isset($_GET['slug']) ? trim((string) $_GET['slug']) : '';
$post = null;
$related = [];

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

        if ($post) {
            // Up to three other posts, same category first, newest first.
            $stmt = $pdo->prepare(
                'SELECT p.title, p.slug, p.excerpt
                 FROM blog_posts p
                 WHERE p.status = "published" AND p.id <> :id
                 ORDER BY (p.category_id <=> :cat) DESC, COALESCE(p.published_at, p.created_at) DESC
                 LIMIT 3'
            );
            $stmt->bindValue(':id', (int) $post['id'], PDO::PARAM_INT);
            $stmt->bindValue(':cat', $post['category_id'], $post['category_id'] === null ? PDO::PARAM_NULL : PDO::PARAM_INT);
            $stmt->execute();
            $related = $stmt->fetchAll();
        }
    } catch (Throwable $ex) {
        if (!$post) {
            $post = null;
        }
        $related = [];
    }
}

if (!$post) {
    http_response_code(404);
    $pageTitle = 'Post not found — DevZila Blog';
    $pageDescription = 'The requested blog post could not be found.';
    $pageRobots = 'noindex, follow';
    require __DIR__ . '/partials/header.php';
    ?>
<header class="page-hero">
  <div class="eyebrow">404</div>
  <h1>Post not found</h1>
  <p class="lede">The article you are looking for doesn't exist or is no longer available.</p>
  <div class="header-actions">
    <a class="btn-primary" href="/blog">Back to blog <?= icon('arrow-right') ?></a>
    <a class="btn-ghost" href="/">Home</a>
  </div>
</header>
    <?php
    require __DIR__ . '/partials/footer.php';
    exit;
}

$publishedTs = (int) strtotime((string) ($post['published_at'] ?? $post['created_at']));
$modifiedTs  = (int) strtotime((string) ($post['updated_at'] ?? $post['published_at'] ?? $post['created_at']));
if ($modifiedTs < $publishedTs) {
    $modifiedTs = $publishedTs;
}
$authorName = (string) ($post['author_name'] ?? '');
$plainBody  = trim((string) preg_replace('/\s+/', ' ', strip_tags((string) $post['body'])));

$pageTitle = $post['title'] . ' — DevZila Blog';
$pageDescription = $post['excerpt'] ?: mb_substr($plainBody, 0, 155);
$pagePath = '/blog/' . $post['slug'];
$ogType = 'article';

$pageBreadcrumbs = [['Home', '/'], ['Blog', '/blog']];
if (!empty($post['category_name'])) {
    $pageBreadcrumbs[] = [$post['category_name'], '/blog?category=' . rawurlencode((string) $post['category_slug'])];
}
$pageBreadcrumbs[] = [$post['title']];

$postUrl = site_url($pagePath);
// Posts signed by the team are attributed to the organization; others to a person.
$author = ($authorName === '' || stripos($authorName, SITE_NAME) !== false)
    ? ['@id' => site_url('/#organization')]
    : ['@type' => 'Person', 'name' => $authorName];

$article = [
    '@type'            => 'BlogPosting',
    '@id'              => $postUrl . '#article',
    'headline'         => mb_substr((string) $post['title'], 0, 110),
    'description'      => $pageDescription,
    'url'              => $postUrl,
    'mainEntityOfPage' => ['@id' => $postUrl . '#webpage'],
    'datePublished'    => date('c', $publishedTs),
    'dateModified'     => date('c', $modifiedTs),
    'author'           => $author,
    'publisher'        => ['@id' => site_url('/#organization')],
    'image'            => site_url('/assets/img/og-default.png'),
    'inLanguage'       => 'en',
    'wordCount'        => str_word_count($plainBody),
];
if (!empty($post['category_name'])) {
    $article['articleSection'] = $post['category_name'];
}
$pageSchema = [$article];

$extraHead = '<meta property="article:published_time" content="' . e(date('c', $publishedTs)) . '">' . "\n"
           . '<meta property="article:modified_time" content="' . e(date('c', $modifiedTs)) . '">' . "\n";
if (!empty($post['category_name'])) {
    $extraHead .= '<meta property="article:section" content="' . e($post['category_name']) . '">' . "\n";
}

require __DIR__ . '/partials/header.php';
?>

<article class="post-article">
  <header>
    <?= render_breadcrumbs($pageBreadcrumbs) ?>
    <?php if (!empty($post['category_name'])): ?>
      <div class="post-cat"><?= e($post['category_name']) ?></div>
    <?php endif; ?>
    <h1><?= e($post['title']) ?></h1>
    <div class="post-meta">
      By <?= e($authorName !== '' ? $authorName : 'DevZila') ?> ·
      <time datetime="<?= e(date('Y-m-d', $publishedTs)) ?>"><?= e(date('F j, Y', $publishedTs)) ?></time>
    </div>
  </header>

  <div class="post-body">
    <?= $post['body'] /* trusted HTML authored in admin */ ?>
  </div>

  <?php if ($authorName !== '' && !empty($post['author_bio'])): ?>
  <div class="post-author">
    <strong><?= e($authorName) ?></strong>
    <?= e($post['author_bio']) ?>
  </div>
  <?php endif; ?>

  <a class="post-back" href="/blog" style="margin-top:2.5rem;">← All posts</a>
</article>

<?php if ($related): ?>
<section class="section section-sm">
  <div class="eyebrow">Keep reading</div>
  <h2 class="section-title">More from the blog</h2>
  <div class="link-grid">
    <?php foreach ($related as $r): ?>
    <a class="link-card" href="/blog/<?= e($r['slug']) ?>"><strong><?= e($r['title']) ?> <?= icon('arrow-right') ?></strong><span><?= e($r['excerpt'] ?? '') ?></span></a>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<div class="cta-banner">
  <h2>Working on a legacy Rails application?</h2>
  <p>We modernize Rails applications and make them AI-ready. Tell us about yours — we reply within 24 hours.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Hire us <?= icon('arrow-right') ?></a>
    <a href="/ai-readiness-assessment" class="btn-ghost">AI Readiness Assessment</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
