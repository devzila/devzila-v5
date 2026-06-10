<?php
$pageTitle = 'Fintech Solutions — DevZila';
$pageDescription = 'Secure, compliant, event-driven financial software with accurate accounting and full audit trails.';
$navServicesHref = 'index.php#services';
require __DIR__ . '/partials/header.php';
?>

<header class="svc-header">
  <div class="breadcrumb"><a href="index.php">Home</a> · <a href="index.php#services">Services</a> · Fintech Solutions</div>
  <div class="svc-label">Development</div>
  <h1>Fintech Solutions</h1>
  <p>Financial software demands correctness, security, and a complete audit trail. We build event-driven fintech systems with accurate accounting and provable data integrity — the kind of rigor money requires.</p>
  <div class="header-actions">
    <a href="hire-us.php" class="btn-primary">Discuss your project →</a>
    <a href="#what" class="btn-ghost">What we do</a>
  </div>
</header>

<section class="svc-section" id="what">
  <h2>What we do</h2>
  <p>Our expertise in Domain-Driven Design and event sourcing is especially valuable in advanced, standardized domains like payments, accounting, and risk management.</p>
  <div class="feature-grid">
    <div class="feature-card">
      <div class="ic">📒</div>
      <h3>Double-Entry Accounting</h3>
      <p>Ledgers that always balance, with immutable records and a clear money trail end to end.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🧾</div>
      <h3>Event Sourcing</h3>
      <p>Store every change as a fact, giving you a complete, replayable history of what happened and when.</p>
    </div>
    <div class="feature-card">
      <div class="ic">💳</div>
      <h3>Payments &amp; Billing</h3>
      <p>Robust integrations with Stripe and other providers, including subscriptions, invoicing, and reconciliation.</p>
    </div>
    <div class="feature-card">
      <div class="ic">🛡️</div>
      <h3>Compliance &amp; Audit</h3>
      <p>Audit trails, access controls, and reporting that stand up to scrutiny from auditors and regulators.</p>
    </div>
    <div class="feature-card">
      <div class="ic">✅</div>
      <h3>Data Integrity</h3>
      <p>Strong consistency guarantees and invariants so financial data is never silently corrupted.</p>
    </div>
    <div class="feature-card">
      <div class="ic">📊</div>
      <h3>Scalable Architecture</h3>
      <p>Systems designed to handle growth in transactions, users, and reporting without compromising accuracy.</p>
    </div>
  </div>
</section>

<section class="svc-section">
  <h2>Why DevZila for fintech</h2>
  <ul class="check-list">
    <li>Battle-tested patterns from advanced domains: accounting, payments, and risk.</li>
    <li>Event-driven architecture for transparency, traceability, and resilience.</li>
    <li>Security-first engineering and rigorous, automated testing.</li>
    <li>Clear collaboration with your domain experts to encode business rules correctly.</li>
  </ul>
</section>

<div class="svc-cta">
  <h2>Building something in fintech?</h2>
  <p>Let's talk about correctness, compliance, and scale from day one.</p>
  <div class="cta-actions">
    <a href="hire-us.php" class="btn-primary">Hire Us →</a>
    <a href="https://calendly.com/nilayanand/15min" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
