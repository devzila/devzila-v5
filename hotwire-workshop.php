<?php
$pageTitle = 'Hotwire Workshop — DevZila';
$pageDescription = 'Learn to build reactive Rails apps with Hotwire — Turbo and Stimulus — and little custom JavaScript.';
$navServicesHref = 'index.php#services';
require __DIR__ . '/partials/header.php';
?>

<header class="svc-header">
  <div class="breadcrumb"><a href="index.php">Home</a> · <a href="index.php#services">Services</a> · Hotwire Workshop</div>
  <div class="svc-label">Workshops &amp; Mentoring</div>
  <h1>Hotwire Workshop</h1>
  <p>Build fast, reactive Rails applications with Hotwire — Turbo and Stimulus — and minimal custom JavaScript. Learn how to deliver modern UX while keeping your frontend simple and maintainable.</p>
  <div class="header-actions">
    <a href="hire-us.php" class="btn-primary">Book this workshop →</a>
    <a href="#what" class="btn-ghost">What we do</a>
  </div>
</header>

<section class="svc-section" id="what">
  <h2>What you'll learn</h2>
  <p>From static pages to reactive interfaces, this hands-on workshop covers the full Hotwire toolset and how to apply it in real Rails apps.</p>
  <div class="feature-grid">
    <div class="feature-card">
      <div class="ic">🚗</div>
      <h3>Turbo Drive</h3>
      <p>Make full-page navigation feel instant without writing a single line of JavaScript.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🖼️</div>
      <h3>Turbo Frames</h3>
      <p>Update independent parts of a page seamlessly with scoped, lazy-loaded frames.</p>
    </div>
    <div class="feature-card">
      <div class="ic">📡</div>
      <h3>Turbo Streams</h3>
      <p>Push real-time changes to the DOM over WebSockets for live, multi-user updates.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🎛️</div>
      <h3>Stimulus</h3>
      <p>Add just enough JavaScript with a lightweight, organized controller framework.</p>
    </div>
    <div class="feature-card">
      <div class="ic">⚡</div>
      <h3>Real-Time Updates</h3>
      <p>Build notifications, live lists, and collaborative features the Rails way.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🔄</div>
      <h3>React → Hotwire</h3>
      <p>Strategies for simplifying an SPA by moving suitable features to Hotwire.</p>
    </div>
  </div>
</section>

<section class="svc-section">
  <h2>Who it's for</h2>
  <ul class="check-list">
    <li>Rails developers who want modern UX without a heavy SPA.</li>
    <li>Teams looking to reduce frontend complexity and maintenance cost.</li>
    <li>Anyone curious about migrating from React to Hotwire.</li>
    <li>Hands-on exercises with mentor support throughout.</li>
  </ul>
</section>

<div class="svc-cta">
  <h2>Make your Rails app reactive — the simple way</h2>
  <p>Run this Hotwire workshop with your team, remote or on-site.</p>
  <div class="cta-actions">
    <a href="hire-us.php" class="btn-primary">Hire Us →</a>
    <a href="https://calendly.com/nilayanand/15min" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
