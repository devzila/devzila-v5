<?php
http_response_code(404);

$pageTitle = 'Page not found — DevZila';
$pageDescription = 'The page you are looking for does not exist or has moved.';
$pagePath = '/404';
$pageRobots = 'noindex, follow';
require __DIR__ . '/partials/header.php';
?>

<header class="page-hero">
  <div class="eyebrow">404</div>
  <h1>This page does not exist</h1>
  <p class="lede">The link may be outdated, or the page may have moved during our site update. Here are the places most people are looking for.</p>
  <div class="header-actions">
    <a href="/" class="btn-primary">Back to home <?= icon('arrow-right') ?></a>
    <a href="/hire-us" class="btn-ghost">Contact us</a>
  </div>
</header>

<section class="section section-sm">
  <div class="link-grid">
    <a class="link-card" href="/ai-transformation-strategy"><strong>AI Transformation &amp; Strategy <?= icon('arrow-right') ?></strong><span>Decide where AI pays off and in what order.</span></a>
    <a class="link-card" href="/ai-integration-automation"><strong>AI Integration &amp; Automation <?= icon('arrow-right') ?></strong><span>LLM features and automation inside your Rails app.</span></a>
    <a class="link-card" href="/legacy-rails-modernization"><strong>Legacy Rails Modernization <?= icon('arrow-right') ?></strong><span>Make an aging Rails codebase AI-ready.</span></a>
    <a class="link-card" href="/rails-upgrades"><strong>Ruby on Rails Upgrades <?= icon('arrow-right') ?></strong><span>Safe, incremental version upgrades.</span></a>
    <a class="link-card" href="/blog"><strong>Blog <?= icon('arrow-right') ?></strong><span>Notes on AI, Rails and maintainable software.</span></a>
    <a class="link-card" href="/faq"><strong>FAQ <?= icon('arrow-right') ?></strong><span>Answers to common questions.</span></a>
  </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>
