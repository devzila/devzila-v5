<?php
$pageTitle = 'Code Mentoring — DevZila';
$pageDescription = 'One-on-one and team mentoring to level up your developers in Rails, testing, and DDD.';
$navServicesHref = '/#services';
require __DIR__ . '/partials/header.php';
?>

<header class="svc-header">
  <div class="breadcrumb"><a href="/">Home</a> · <a href="/#services">Services</a> · Code Mentoring</div>
  <div class="svc-label">Workshops &amp; Mentoring</div>
  <h1>Code Mentoring</h1>
  <p>Level up your developers with hands-on mentoring from senior engineers. We work alongside your team — pairing, reviewing, and guiding — so good practices stick long after the engagement ends.</p>
  <div class="header-actions">
    <a href="hire-us" class="btn-primary">Start mentoring →</a>
    <a href="#what" class="btn-ghost">What we do</a>
  </div>
</header>

<section class="svc-section" id="what">
  <h2>What we do</h2>
  <p>Mentoring is tailored to your team's goals — whether that's mastering testing, adopting DDD, taming legacy code, or growing more confident senior engineers.</p>
  <div class="feature-grid">
    <div class="feature-card">
      <div class="ic">👥</div>
      <h3>Pair Programming</h3>
      <p>Real-time, hands-on guidance on your actual codebase and problems.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🔍</div>
      <h3>Code Reviews</h3>
      <p>Constructive, in-depth reviews that teach principles, not just fixes.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🧹</div>
      <h3>Refactoring Techniques</h3>
      <p>Practical, safe refactoring patterns for improving legacy code incrementally.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🧪</div>
      <h3>Testing Practices</h3>
      <p>Build confidence with effective unit, integration, and end-to-end testing.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🏛️</div>
      <h3>Architecture Guidance</h3>
      <p>Apply DDD, CQRS, and event sourcing appropriately for your domain.</p>
    </div>
    <div class="feature-card">
      <div class="ic">💬</div>
      <h3>Ongoing Support</h3>
      <p>Stay connected via a shared Slack channel to confirm decisions and unblock quickly.</p>
    </div>
  </div>
</section>

<section class="svc-section">
  <h2>What your team gains</h2>
  <ul class="check-list">
    <li>Faster ramp-up and more confident, autonomous developers.</li>
    <li>Higher code quality and consistent practices across the team.</li>
    <li>Knowledge that stays in-house, not locked in a consultant's head.</li>
    <li>Flexible formats — one-on-one, team sessions, or solo, as you prefer.</li>
  </ul>
</section>

<div class="svc-cta">
  <h2>Invest in your developers</h2>
  <p>Let's design a mentoring plan that fits your team's goals and schedule.</p>
  <div class="cta-actions">
    <a href="hire-us" class="btn-primary">Hire Us →</a>
    <a href="https://calendly.com/nilayanand/15min" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
