<?php
$pageTitle = 'Frontend Development — DevZila';
$pageDescription = 'Modern, responsive UIs with React and Hotwire that integrate seamlessly with Rails backends.';
$navServicesHref = 'index.php#services';
require __DIR__ . '/partials/header.php';
?>

<header class="svc-header">
  <div class="breadcrumb"><a href="index.php">Home</a> · <a href="index.php#services">Services</a> · Frontend Development</div>
  <div class="svc-label">Development</div>
  <h1>Frontend Development</h1>
  <p>We craft modern, responsive UIs that integrate seamlessly with Rails backends. Our expertise covers both React and Hotwire — and we help teams transition from React to Hotwire to simplify their frontend architecture while keeping a great user experience.</p>
  <div class="header-actions">
    <a href="hire-us.php" class="btn-primary">Start a Project →</a>
    <a href="#what" class="btn-ghost">What we do</a>
  </div>
</header>

<section class="svc-section" id="what">
  <h2>What we do</h2>
  <p>From rich React applications to server-rendered Hotwire interfaces, we choose the right tool for the job and deliver fast, accessible, maintainable frontends.</p>
  <div class="feature-grid">
    <div class="feature-card">
      <div class="ic">⚛️</div>
      <h3>React &amp; Next.js</h3>
      <p>Component-driven, type-safe interfaces for complex, highly interactive products.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🌀</div>
      <h3>Hotwire / Turbo</h3>
      <p>Reactive, server-rendered UIs with minimal JavaScript — fast to build and easy to maintain.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🔄</div>
      <h3>React → Hotwire</h3>
      <p>Migrate away from heavy SPA complexity to a simpler Hotwire architecture without losing UX.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🎨</div>
      <h3>Design Systems</h3>
      <p>Consistent, reusable component libraries that keep your product cohesive as it grows.</p>
    </div>
    <div class="feature-card">
      <div class="ic">⚡</div>
      <h3>Performance</h3>
      <p>Fast load times, smooth interactions, and optimized rendering for real-world devices.</p>
    </div>
    <div class="feature-card">
      <div class="ic">♿</div>
      <h3>Accessibility</h3>
      <p>Inclusive, standards-compliant interfaces that work for every user.</p>
    </div>
  </div>
</section>

<section class="svc-section">
  <h2>What you get</h2>
  <ul class="check-list">
    <li>A frontend architecture matched to your team and product — not dogma.</li>
    <li>Seamless integration with your Rails backend and APIs.</li>
    <li>Reusable components and a maintainable design system.</li>
    <li>Fast, accessible, mobile-friendly interfaces your users love.</li>
  </ul>
</section>

<div class="svc-cta">
  <h2>Need a frontend that keeps up with your backend?</h2>
  <p>Let's build an interface that's fast, polished, and easy to maintain.</p>
  <div class="cta-actions">
    <a href="hire-us.php" class="btn-primary">Hire Us →</a>
    <a href="https://calendly.com/nilayanand/15min" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
