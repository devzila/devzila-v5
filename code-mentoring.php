<?php
$pageTitle = 'Code Mentoring for Rails Teams: Pairing & Reviews — DevZila';
$pageDescription = 'Senior Rails engineers mentor your developers through pair programming, code reviews, testing, DDD and responsible AI-assisted development.';
$pagePath = '/code-mentoring';
$pageBreadcrumbs = [['Home', '/'], ['Workshops', '/#services'], ['Code Mentoring']];
$pageService = [
    'name'     => 'Code Mentoring',
    'type'     => 'Software engineering mentoring',
    'audience' => 'Ruby on Rails developers and engineering teams',
    'offers'   => [
        'Pair programming',
        'Code reviews',
        'Refactoring techniques',
        'Testing practices',
        'Architecture guidance',
        'AI-assisted development practices',
    ],
];
$pageFaqs = [
    [
        'q' => 'How does code mentoring work?',
        'a' => 'A senior engineer works alongside your developers on your actual codebase: pairing on real tasks, reviewing pull requests in depth and guiding architecture decisions. Between sessions we stay available in a shared Slack channel to confirm decisions and unblock quickly.',
    ],
    [
        'q' => 'Is mentoring one-on-one or for the whole team?',
        'a' => 'Either. Formats are flexible — one-on-one, team sessions or a mix — and are tailored to your team\'s goals and schedule.',
    ],
    [
        'q' => 'Can you help our developers use AI coding assistants well?',
        'a' => 'Yes. We show teams where assistants genuinely help — tests, refactoring, exploring unfamiliar code — and where they need a careful reviewer. We help you set shared conventions, review standards and data rules, so AI makes the team faster without lowering quality.',
    ],
];
require __DIR__ . '/partials/header.php';
?>

<header class="page-hero">
  <?= render_breadcrumbs($pageBreadcrumbs) ?>
  <div class="eyebrow">Workshops &amp; Mentoring</div>
  <h1>Code Mentoring</h1>
  <p class="lede">Level up your developers with hands-on mentoring from senior engineers. We work alongside your team — pairing, reviewing and guiding — so good practices stick long after the engagement ends.</p>
  <div class="header-actions">
    <a href="/hire-us" class="btn-primary">Start mentoring <?= icon('arrow-right') ?></a>
    <a href="#what" class="btn-ghost">What we do</a>
  </div>
</header>

<section class="section section-sm" id="what">
  <div class="eyebrow">What we do</div>
  <h2 class="section-title">Mentoring on your code, for your goals</h2>
  <p class="section-sub">Mentoring is tailored to your team's goals — whether that's mastering testing, adopting DDD, taming legacy code, or growing more confident senior engineers.</p>
  <div class="feature-grid">
    <div class="feature-card">
      <?= icon_badge('users') ?>
      <h3>Pair programming</h3>
      <p>Real-time, hands-on guidance on your actual codebase and problems.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('search') ?>
      <h3>Code reviews</h3>
      <p>Constructive, in-depth reviews that teach principles, not just fixes.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('refresh') ?>
      <h3>Refactoring techniques</h3>
      <p>Practical, safe refactoring patterns for improving legacy code incrementally.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('check-circle') ?>
      <h3>Testing practices</h3>
      <p>Build confidence with effective unit, integration and end-to-end testing.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('layers') ?>
      <h3>Architecture guidance</h3>
      <p>Apply DDD, CQRS and event sourcing appropriately for your domain.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('message') ?>
      <h3>Ongoing support</h3>
      <p>Stay connected via a shared Slack channel to confirm decisions and unblock quickly.</p>
    </div>
  </div>
</section>

<div class="band">
  <section class="section section-sm" id="ai-workflows">
    <div class="eyebrow is-mint">AI-assisted development</div>
    <h2 class="section-title">Help your team use AI well, not just often</h2>
    <p class="section-sub">AI coding assistants make good engineers faster and can make careless work faster too. We mentor teams on the habits that keep quality high.</p>
    <div class="feature-grid">
      <div class="feature-card">
        <?= icon_badge('terminal', 'mint') ?>
        <h3>Working with assistants</h3>
        <p>Giving an assistant the right context, breaking work into reviewable steps, and knowing when to take over.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('eye', 'mint') ?>
        <h3>Reviewing AI-written code</h3>
        <p>What to look for in generated code: hidden assumptions, missing edge cases, security and unnecessary complexity.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('file-text', 'mint') ?>
        <h3>Team conventions</h3>
        <p>Shared project instructions, test-first workflows and rules for what data may be sent to a model.</p>
      </div>
    </div>
    <p style="margin-top:1.75rem;"><a class="text-link is-mint" href="/ai-for-rails-workshop">Prefer a structured format? See the AI for Rails Teams workshop <?= icon('arrow-right') ?></a></p>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">Results</div>
  <h2 class="section-title">What your team gains</h2>
  <ul class="check-list">
    <li>Faster ramp-up and more confident, autonomous developers.</li>
    <li>Higher code quality and consistent practices across the team.</li>
    <li>Knowledge that stays in-house, not locked in a consultant's head.</li>
    <li>Flexible formats — one-on-one, team sessions, or solo, as you prefer.</li>
  </ul>
</section>

<div class="band">
  <section class="section section-sm" id="faq">
    <div class="eyebrow">FAQ</div>
    <h2 class="section-title">Mentoring questions, answered</h2>
    <?= render_faq($pageFaqs) ?>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">Related</div>
  <h2 class="section-title">Keep exploring</h2>
  <div class="link-grid">
    <a class="link-card" href="/ai-for-rails-workshop"><strong>AI for Rails Teams Workshop <?= icon('arrow-right') ?></strong><span>Two days of hands-on AI engineering.</span></a>
    <a class="link-card" href="/ddd-workshops"><strong>DDD Workshops <?= icon('arrow-right') ?></strong><span>Domain-Driven Design on real code.</span></a>
    <a class="link-card" href="/hotwire-workshop"><strong>Hotwire Workshop <?= icon('arrow-right') ?></strong><span>Reactive Rails with little JavaScript.</span></a>
  </div>
</section>

<div class="cta-banner">
  <h2>Invest in your developers</h2>
  <p>Let's design a mentoring plan that fits your team's goals and schedule.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Hire us <?= icon('arrow-right') ?></a>
    <a href="<?= e(SITE_BOOKING) ?>" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
