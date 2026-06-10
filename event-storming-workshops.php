<?php
$pageTitle = 'Event Storming Workshop — DevZila';
$pageDescription = 'Collaborative Event Storming workshops to rapidly explore and model your business domain.';
$navServicesHref = 'index.php#services';
require __DIR__ . '/partials/header.php';
?>

<header class="svc-header">
  <div class="breadcrumb"><a href="index.php">Home</a> · <a href="index.php#services">Services</a> · Event Storming Workshops</div>
  <div class="svc-label">Workshops &amp; Mentoring</div>
  <h1>Event Storming Workshop</h1>
  <p>Event Storming is a fast, collaborative modeling technique that brings developers and domain experts together to explore a business domain — often discovering more in a few hours than weeks of documents ever could.</p>
  <div class="header-actions">
    <a href="hire-us.php" class="btn-primary">Book this workshop →</a>
    <a href="#what" class="btn-ghost">What we do</a>
  </div>
</header>

<section class="svc-section" id="what">
  <h2>What we do</h2>
  <p>We facilitate Event Storming sessions that surface domain knowledge, reveal hidden complexity, and align everyone around a shared understanding of how the business actually works.</p>
  <div class="feature-grid">
    <div class="feature-card">
      <div class="ic">🌍</div>
      <h3>Big Picture Exploration</h3>
      <p>Map the entire business flow as a timeline of domain events to see the whole system at a glance.</p>
    </div>
    <div class="feature-card">
      <div class="ic">⚙️</div>
      <h3>Process Modeling</h3>
      <p>Drill into key processes — commands, policies, and reactions — to understand cause and effect.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🧩</div>
      <h3>Design Level</h3>
      <p>Move toward aggregates and read models that translate directly into software design.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🗺️</div>
      <h3>Bounded Contexts</h3>
      <p>Identify natural seams in the domain to define clear context boundaries.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🤝</div>
      <h3>Team Alignment</h3>
      <p>Build a shared language and shared understanding between business and engineering.</p>
    </div>
    <div class="feature-card">
      <div class="ic">✅</div>
      <h3>Actionable Backlog</h3>
      <p>Leave with concrete next steps, risks surfaced, and a prioritized direction.</p>
    </div>
  </div>
</section>

<section class="svc-section">
  <h2>Who it's for</h2>
  <ul class="check-list">
    <li>Teams starting a new product or a major new feature.</li>
    <li>Organizations untangling a complex or poorly understood domain.</li>
    <li>Groups adopting DDD and event-driven architecture.</li>
    <li>Any team that wants business and engineering truly aligned.</li>
  </ul>
</section>

<div class="svc-cta">
  <h2>Discover your domain in hours, not weeks</h2>
  <p>Let's run an Event Storming session with your team — remote or on-site.</p>
  <div class="cta-actions">
    <a href="hire-us.php" class="btn-primary">Hire Us →</a>
    <a href="https://calendly.com/nilayanand/15min" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
