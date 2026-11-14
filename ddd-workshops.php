<?php
$pageTitle = 'Rails + Domain-Driven Design (DDD) Workshop — DevZila';
$pageDescription = 'Hands-on two-day Rails + Domain-Driven Design workshop: bounded contexts, aggregates, domain events, event sourcing, sagas and read models on real code.';
$pagePath = '/ddd-workshops';
$pageBreadcrumbs = [['Home', '/'], ['Workshops', '/#services'], ['DDD Workshops']];
$pageService = [
    'name'     => 'Rails + Domain-Driven Design Workshop',
    'type'     => 'Software engineering workshop',
    'audience' => 'Ruby on Rails development teams',
    'offers'   => [
        'Bounded contexts',
        'Aggregates and value objects',
        'Domain events',
        'Event sourcing',
        'Sagas',
        'Read models and CQRS',
    ],
];
$pageFaqs = [
    [
        'q' => 'Who is the DDD workshop for?',
        'a' => 'Ruby on Rails developers and tech leads who work on applications with complex business rules and feel that "the Rails way" is no longer enough. Working knowledge of Rails is assumed; no prior DDD experience is needed.',
    ],
    [
        'q' => 'Is the workshop remote or on-site?',
        'a' => 'Either. We run it in-house or remotely, and tailor the examples to your domain.',
    ],
    [
        'q' => 'How long is the workshop?',
        'a' => 'Two days. Most of the time is spent writing code against a workshop application, with constant mentor support.',
    ],
    [
        'q' => 'How does Domain-Driven Design help with AI?',
        'a' => 'AI agents work through well-defined operations. Bounded contexts, explicit commands and domain events give an application exactly that: clear tools an agent can call, clear boundaries for what it may touch, and an event history that explains what happened. Teams that model their domain well find AI integration much simpler.',
    ],
];
require __DIR__ . '/partials/header.php';
?>

<header class="page-hero">
  <?= render_breadcrumbs($pageBreadcrumbs) ?>
  <div class="eyebrow">Workshops &amp; Mentoring</div>
  <h1>Rails + Domain-Driven Design Workshop</h1>
  <p class="lede">Make your development team understand the principles of Domain-Driven Design and master the most powerful design approach in today's world of complex business rules. A practical, hands-on workshop built around real code.</p>
  <div class="header-actions">
    <a href="/hire-us" class="btn-primary">Book this workshop <?= icon('arrow-right') ?></a>
    <a href="#agenda" class="btn-ghost">See agenda</a>
  </div>
</header>

<section class="section section-sm" id="what">
  <div class="eyebrow">Curriculum</div>
  <h2 class="section-title">What you'll learn</h2>
  <p class="section-sub">Attendees learn DDD principles and a trending architecture approach for complex business domains — event sourcing — applying them directly to a workshop application.</p>
  <div class="feature-grid">
    <div class="feature-card">
      <?= icon_badge('map') ?>
      <h3>Bounded contexts</h3>
      <p>Split a large domain into clear, decoupled contexts with well-defined boundaries.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('box') ?>
      <h3>Aggregates &amp; value objects</h3>
      <p>Model entities, value objects and aggregate roots that protect business invariants.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('radio') ?>
      <h3>Domain events</h3>
      <p>Publish and consume domain events to decouple behavior across your system.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('list') ?>
      <h3>Event sourcing</h3>
      <p>Persist state as a sequence of events and rebuild it reliably on demand.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('git-merge') ?>
      <h3>Sagas</h3>
      <p>Coordinate long-running processes across aggregates and contexts.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('book') ?>
      <h3>Read models</h3>
      <p>Build fast, purpose-built read models (CQRS) for your queries and views.</p>
    </div>
  </div>
</section>

<div class="band">
  <section class="section section-sm" id="agenda">
    <div class="eyebrow">Agenda</div>
    <h2 class="section-title">Two days, mostly code</h2>
    <p class="section-sub">Most of the time is spent writing code and crunching domain knowledge to make it as practical as possible.</p>
    <ol class="timeline">
      <li>
        <div class="timeline-when">Day 1</div>
        <h3>Modeling the domain</h3>
        <p>Bounded contexts · Entity, value object and aggregate · Application and domain services · Publishing domain events.</p>
      </li>
      <li>
        <div class="timeline-when">Day 2</div>
        <h3>Events all the way</h3>
        <p>Consuming domain events · Event sourcing · Sagas · Read models.</p>
      </li>
    </ol>
    <ul class="check-list" style="margin-top:2rem;">
      <li>Exercises against a workshop application with constant mentor support.</li>
      <li>The result is a complete app built with event sourcing, plus techniques to move from "the Rails way" to a DDD app.</li>
    </ul>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow is-mint">DDD and AI</div>
  <h2 class="section-title">Why DDD matters more in the age of AI</h2>
  <div class="feature-grid">
    <div class="feature-card">
      <?= icon_badge('tool', 'mint') ?>
      <h3>Commands become tools</h3>
      <p>Explicit commands with validated inputs are precisely what an AI agent needs to act safely inside your application.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('map', 'mint') ?>
      <h3>Contexts become boundaries</h3>
      <p>Bounded contexts define what an agent may read and change, and give models a consistent vocabulary to work with.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('eye', 'mint') ?>
      <h3>Events become the audit trail</h3>
      <p>A stream of domain events records what an automation did and why — and is ideal context for models to reason over.</p>
    </div>
  </div>
  <p style="margin-top:1.75rem;"><a class="text-link is-mint" href="/ai-for-rails-workshop">See the AI for Rails Teams workshop <?= icon('arrow-right') ?></a></p>
</section>

<div class="band">
  <section class="section section-sm" id="faq">
    <div class="eyebrow">FAQ</div>
    <h2 class="section-title">Workshop questions, answered</h2>
    <?= render_faq($pageFaqs) ?>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">Related</div>
  <h2 class="section-title">Keep exploring</h2>
  <div class="link-grid">
    <a class="link-card" href="/event-storming-workshops"><strong>Event Storming Workshops <?= icon('arrow-right') ?></strong><span>Discover the domain before modeling it.</span></a>
    <a class="link-card" href="/code-mentoring"><strong>Code Mentoring <?= icon('arrow-right') ?></strong><span>Apply DDD in your own codebase with guidance.</span></a>
    <a class="link-card" href="/fintech-solutions"><strong>Fintech Solutions <?= icon('arrow-right') ?></strong><span>Event sourcing where it matters most.</span></a>
  </div>
</section>

<div class="cta-banner">
  <h2>Level up your team with DDD</h2>
  <p>Run this workshop for your team, in-house or remote. Let's tailor it to your domain.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Hire us <?= icon('arrow-right') ?></a>
    <a href="<?= e(SITE_BOOKING) ?>" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
