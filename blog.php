<?php
declare(strict_types=1);

require_once __DIR__ . '/lib/site.php';

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

if ($activeCategory) {
    $pageTitle = "{$activeCategory} Articles — DevZila Blog";
    $pageDescription = "Articles about {$activeCategory} from DevZila, the AI-first Ruby on Rails consultancy: practical guides and lessons from real projects.";
    $pagePath = '/blog?category=' . rawurlencode($categorySlug);
    $pageBreadcrumbs = [['Home', '/'], ['Blog', '/blog'], [$activeCategory]];
} else {
    $pageTitle = 'Blog: AI in Rails, Legacy Modernization & DDD — DevZila';
    $pageDescription = 'Practical articles on adding AI to Ruby on Rails applications, modernizing legacy Rails, Domain-Driven Design and frontend, from the DevZila team.';
    $pagePath = '/blog';
    $pageBreadcrumbs = [['Home', '/'], ['Blog']];
}

// Category filters repeat the blog index. Keep them usable, but do not ask
// search engines to index a second URL for the same posts.
if ($categorySlug !== '' || $dbError) {
    $pageRobots = 'noindex, follow';
}

$pageSchemaType = 'CollectionPage';
if ($posts) {
    $pageSchema = [[
        '@type'     => 'Blog',
        '@id'       => site_url('/blog#blog'),
        'name'      => 'DevZila Blog',
        'url'       => site_url('/blog'),
        'publisher' => ['@id' => site_url('/#organization')],
        'blogPost'  => array_map(
            static fn (array $p): array => [
                '@type'         => 'BlogPosting',
                'headline'      => $p['title'],
                'url'           => site_url('/blog/' . $p['slug']),
                'datePublished' => date('c', (int) strtotime((string) ($p['published_at'] ?? $p['created_at']))),
            ],
            array_slice($posts, 0, 20)
        ),
    ]];
}

require __DIR__ . '/partials/header.php';
?>

<header class="page-hero">
  <?= render_breadcrumbs($pageBreadcrumbs) ?>
  <div class="eyebrow">DevZila Blog</div>
  <h1><?= $activeCategory ? e($activeCategory) : 'Notes on building better software' ?></h1>
  <p class="lede">Practical insights on AI in Ruby on Rails applications, legacy modernization, Domain-Driven Design, frontend and lessons from shipping real products.</p>
</header>

<div class="blog-wrap">
  <?php if ($categories): ?>
  <nav class="cat-pills" aria-label="Blog categories">
    <a class="cat-pill <?= $categorySlug === '' ? 'active' : '' ?>" href="/blog">All</a>
    <?php foreach ($categories as $c): ?>
      <a class="cat-pill <?= $categorySlug === $c['slug'] ? 'active' : '' ?>" href="/blog?category=<?= e(rawurlencode($c['slug'])) ?>"><?= e($c['name']) ?></a>
    <?php endforeach; ?>
  </nav>
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

<section class="section section-sm">
  <div class="eyebrow">Guides</div>
  <h2 class="section-title">Start with the essentials</h2>
  <div class="link-grid">
    <a class="link-card" href="/ai-use-cases"><strong>AI Use Cases for Rails <?= icon('arrow-right') ?></strong><span>Nine patterns, how each is built, and its guardrails.</span></a>
    <a class="link-card" href="/legacy-rails-modernization"><strong>Legacy Rails Modernization <?= icon('arrow-right') ?></strong><span>Rewrite or modernize? A side-by-side comparison.</span></a>
    <a class="link-card" href="/ai-glossary"><strong>AI Glossary for Rails Teams <?= icon('arrow-right') ?></strong><span>RAG, embeddings, agents and MCP in plain language.</span></a>
  </div>
</section>

<div class="cta-banner">
  <h2>Have a Rails application that should be doing more?</h2>
  <p>Tell us about it. We reply within 24 hours.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Hire us <?= icon('arrow-right') ?></a>
    <a href="<?= e(SITE_BOOKING) ?>" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
