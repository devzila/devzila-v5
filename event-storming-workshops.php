<?php
$pageTitle = 'Event Storming Workshop for Domain & AI Discovery — DevZila';
$pageDescription = 'Facilitated Event Storming workshops that map your business domain in hours, align business and engineering, and reveal where AI and automation fit.';
$pagePath = '/event-storming-workshops';
$pageBreadcrumbs = [['Home', '/'], ['Workshops', '/#services'], ['Event Storming Workshops']];
$pageService = [
    'name'     => 'Event Storming Workshop',
    'type'     => 'Facilitated domain modeling workshop',
    'audience' => 'Product, business and engineering teams',
    'offers'   => [
        'Big Picture Event Storming',
        'Process-level modeling',
        'Design-level modeling',
        'Bounded context discovery',
        'AI and automation opportunity mapping',
    ],
];
$pageFaqs = [
    [
        'q' => 'What is Event Storming?',
        'a' => 'Event Storming is a collaborative workshop technique in which business experts and developers map a business process as a timeline of domain events — things that happen, such as "order placed" or "invoice paid". It quickly builds a shared understanding of how the business actually works.',
    ],
    [
        'q' => 'Who should attend an Event Storming session?',
        'a' => 'The people who know the business and the people who build the software, in the same room: domain experts, product owners, operations or support staff, and developers. The mix is the point — each group knows things the others do not.',
    ],
    [
        'q' => 'Can Event Storming be done remotely?',
        'a' => 'Yes. We facilitate sessions on-site or remotely using an online whiteboard.',
    ],
    [
        'q' => 'How does Event Storming help find AI use cases?',
        'a' => 'With the whole process on the wall, the manual steps, hand-offs, waiting times and judgment calls become visible. Those are the places where AI and automation pay off — and where a human approval step belongs. It is the method we use for opportunity mapping in our AI strategy work.',
    ],
];
require __DIR__ . '/partials/header.php';
?>

<header class="page-hero">
  <?= render_breadcrumbs($pageBreadcrumbs) ?>
  <div class="eyebrow">Workshops &amp; Mentoring</div>
  <h1>Event Storming Workshop</h1>
  <p class="lede">Event Storming is a fast, collaborative modeling technique that brings developers and domain experts together to explore a business domain — often discovering more in a few hours than weeks of documents ever could.</p>
  <div class="header-actions">
    <a href="/hire-us" class="btn-primary">Book this workshop <?= icon('arrow-right') ?></a>
    <a href="#what" class="btn-ghost">What we do</a>
  </div>
</header>

<section class="section section-sm" id="what">
  <div class="eyebrow">What we do</div>
  <h2 class="section-title">Shared understanding, fast</h2>
  <p class="section-sub">We facilitate Event Storming sessions that surface domain knowledge, reveal hidden complexity and align everyone around a shared understanding of how the business actually works.</p>
  <div class="feature-grid">
    <div class="feature-card">
      <?= icon_badge('globe') ?>
      <h3>Big Picture exploration</h3>
      <p>Map the entire business flow as a timeline of domain events to see the whole system at a glance.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('workflow') ?>
      <h3>Process modeling</h3>
      <p>Drill into key processes — commands, policies and reactions — to understand cause and effect.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('layers') ?>
      <h3>Design level</h3>
      <p>Move toward aggregates and read models that translate directly into software design.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('map') ?>
      <h3>Bounded contexts</h3>
      <p>Identify natural seams in the domain to define clear context boundaries.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('users') ?>
      <h3>Team alignment</h3>
      <p>Build a shared language and shared understanding between business and engineering.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('check-circle') ?>
      <h3>Actionable backlog</h3>
      <p>Leave with concrete next steps, risks surfaced and a prioritized direction.</p>
    </div>
  </div>
</section>

<div class="band">
  <section class="section section-sm" id="ai-discovery">
    <div class="eyebrow is-mint">AI opportunity discovery</div>
    <h2 class="section-title">The fastest way to find where AI belongs</h2>
    <p class="section-sub">Good AI use cases are found in the process, not in a brainstorm about technology. Event Storming puts the process on the wall.</p>
    <div class="feature-grid">
      <div class="feature-card">
        <?= icon_badge('search', 'mint') ?>
        <h3>Spot the manual work</h3>
        <p>Re-typing, reading documents, routing requests, chasing status: the repetitive steps stand out on the timeline.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('target', 'mint') ?>
        <h3>Mark the judgment calls</h3>
        <p>Decisions that need context and language are candidates for AI assistance — with a person approving the result.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('flag', 'mint') ?>
        <h3>Prioritize by value</h3>
        <p>Each candidate is tied to a process step and an owner, which makes value and effort far easier to estimate.</p>
      </div>
    </div>
    <p style="margin-top:1.75rem;"><a class="text-link is-mint" href="/ai-transformation-strategy">How this feeds an AI strategy <?= icon('arrow-right') ?></a></p>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">Audience</div>
  <h2 class="section-title">Who it's for</h2>
  <ul class="check-list">
    <li>Teams starting a new product or a major new feature.</li>
    <li>Organizations untangling a complex or poorly understood domain.</li>
    <li>Groups adopting DDD and event-driven architecture.</li>
    <li>Leaders looking for the right places to apply AI and automation.</li>
    <li>Any team that wants business and engineering truly aligned.</li>
  </ul>
</section>

<div class="band">
  <section class="section section-sm" id="faq">
    <div class="eyebrow">FAQ</div>
    <h2 class="section-title">Event Storming questions, answered</h2>
    <?= render_faq($pageFaqs) ?>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">Related</div>
  <h2 class="section-title">Keep exploring</h2>
  <div class="link-grid">
    <a class="link-card" href="/ddd-workshops"><strong>DDD Workshops <?= icon('arrow-right') ?></strong><span>Turn the model into working Rails code.</span></a>
    <a class="link-card" href="/ai-transformation-strategy"><strong>AI Transformation &amp; Strategy <?= icon('arrow-right') ?></strong><span>From opportunity map to roadmap.</span></a>
    <a class="link-card" href="/ai-readiness-assessment"><strong>AI Readiness Assessment <?= icon('arrow-right') ?></strong><span>A fixed-scope first step.</span></a>
  </div>
</section>

<div class="cta-banner">
  <h2>Discover your domain in hours, not weeks</h2>
  <p>Let's run an Event Storming session with your team — remote or on-site.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Hire us <?= icon('arrow-right') ?></a>
    <a href="<?= e(SITE_BOOKING) ?>" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
