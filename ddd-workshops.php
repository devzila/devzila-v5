<?php
$pageTitle = 'Domain-Driven Design Workshop — DevZila';
$pageDescription = 'A hands-on Rails + Domain-Driven Design workshop covering aggregates, domain events, and event sourcing.';
$navServicesHref = '/#services';
require __DIR__ . '/partials/header.php';
?>

<header class="svc-header">
  <div class="breadcrumb"><a href="/">Home</a> · <a href="/#services">Services</a> · DDD Workshops</div>
  <div class="svc-label">Workshops &amp; Mentoring</div>
  <h1>Rails + Domain-Driven Design Workshop</h1>
  <p>Make your development team understand the principles of Domain-Driven Design and master the most powerful design approach in today's world of complex business rules. A practical, hands-on workshop built around real code.</p>
  <div class="header-actions">
    <a href="hire-us" class="btn-primary">Book this workshop →</a>
    <a href="#agenda" class="btn-ghost">See agenda</a>
  </div>
</header>

<section class="svc-section" id="what">
  <h2>What you'll learn</h2>
  <p>Attendees learn DDD principles and a trending architecture approach for complex business domains — event sourcing — applying them directly to a workshop application.</p>
  <div class="feature-grid">
    <div class="feature-card">
      <div class="ic">🗺️</div>
      <h3>Bounded Contexts</h3>
      <p>Split a large domain into clear, decoupled contexts with well-defined boundaries.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🧱</div>
      <h3>Aggregates &amp; Value Objects</h3>
      <p>Model entities, value objects, and aggregate roots that protect business invariants.</p>
    </div>
    <div class="feature-card">
      <div class="ic">📣</div>
      <h3>Domain Events</h3>
      <p>Publish and consume domain events to decouple behavior across your system.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🧾</div>
      <h3>Event Sourcing</h3>
      <p>Persist state as a sequence of events and rebuild it reliably on demand.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🔀</div>
      <h3>Sagas</h3>
      <p>Coordinate long-running processes across aggregates and contexts.</p>
    </div>
    <div class="feature-card">
      <div class="ic">📚</div>
      <h3>Read Models</h3>
      <p>Build fast, purpose-built read models (CQRS) for your queries and views.</p>
    </div>
  </div>
</section>

<section class="svc-section" id="agenda">
  <h2>Agenda — two days</h2>
  <p>Most of the time is spent writing code and crunching domain knowledge to make it as practical as possible.</p>
  <ul class="check-list">
    <li><strong>Day 1:</strong> Bounded Contexts · Entity, Value Object &amp; Aggregate · Application &amp; Domain Services · Publishing Domain Events.</li>
    <li><strong>Day 2:</strong> Consuming Domain Events · Event Sourcing · Sagas · Read Models.</li>
    <li>Exercises against a workshop application with constant mentor support.</li>
    <li>The result is a complete app built with event sourcing, plus techniques to move from "the Rails way" to a DDD app.</li>
  </ul>
</section>

<div class="svc-cta">
  <h2>Level up your team with DDD</h2>
  <p>Run this workshop for your team, in-house or remote. Let's tailor it to your domain.</p>
  <div class="cta-actions">
    <a href="hire-us" class="btn-primary">Hire Us →</a>
    <a href="https://calendly.com/nilayanand/15min" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
