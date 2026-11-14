<?php
$pageTitle = 'AI Readiness Assessment for Ruby on Rails Applications — DevZila';
$pageDescription = 'A fixed-scope AI readiness assessment for your Rails app: codebase and data audit, ranked AI use cases, target architecture and a roadmap with estimates.';
$pagePath = '/ai-readiness-assessment';
$pageBreadcrumbs = [['Home', '/'], ['Services', '/#services'], ['AI Readiness Assessment']];
$pageService = [
    'name'     => 'AI Readiness Assessment for Ruby on Rails Applications',
    'type'     => 'AI readiness assessment',
    'audience' => 'CTOs, engineering leaders and founders with an existing Ruby on Rails application',
    'offers'   => [
        'Rails codebase and upgrade audit',
        'Data readiness review',
        'AI use case shortlist and scoring',
        'Target AI architecture',
        'AI roadmap with effort estimates',
    ],
];
$pageFaqs = [
    [
        'q' => 'What is an AI readiness assessment?',
        'a' => 'An AI readiness assessment evaluates whether an application, its data and its team are prepared to adopt AI, and what to fix first. Ours covers one Ruby on Rails application and ends with a scorecard, a ranked list of AI use cases, a target architecture and a roadmap with estimates.',
    ],
    [
        'q' => 'How much does the assessment cost?',
        'a' => 'It is a fixed-price engagement agreed before we start, so there are no surprises. The price depends on the size of the application. <a href="/hire-us">Tell us about your app</a> and we will send a quote.',
    ],
    [
        'q' => 'Do you need access to our production data?',
        'a' => 'No. Read access to the repository, the database schema and a small set of anonymized sample records is enough. We are happy to sign an NDA before we see anything.',
    ],
    [
        'q' => 'Our application is on a very old Rails version. Is it too early for this?',
        'a' => 'No — that is exactly the situation the assessment is designed for. You will learn which upgrades are true prerequisites for AI, which can wait, and which AI use cases are possible even before the upgrade is finished.',
    ],
    [
        'q' => 'What happens after the assessment?',
        'a' => 'You own the report and can act on it with your own team, with us, or with another vendor. If you continue with us, the usual next step is an <a href="/ai-integration-automation">AI pilot</a> for the top-ranked use case, alongside any <a href="/legacy-rails-modernization">modernization</a> work it depends on.',
    ],
    [
        'q' => 'Is the assessment only for Ruby on Rails applications?',
        'a' => 'It is designed for Rails, because that is where our depth is. Applications with a Rails backend and a React or mobile frontend are a good fit too.',
    ],
];
require __DIR__ . '/partials/header.php';
?>

<header class="page-hero is-ai">
  <?= render_breadcrumbs($pageBreadcrumbs) ?>
  <div class="eyebrow is-mint">AI Enablement · Start here</div>
  <h1>AI Readiness Assessment for Rails applications</h1>
  <p class="lede">In about two weeks, find out how ready your Ruby on Rails application is for AI, which use cases are worth building first, and exactly what it will take to ship them.</p>
  <div class="header-actions">
    <a href="/hire-us" class="btn-primary">Request an assessment <?= icon('arrow-right') ?></a>
    <a href="#deliverables" class="btn-ghost">See the deliverables</a>
  </div>
</header>

<section class="section section-sm">
  <div class="split is-top">
    <div>
      <div class="answer">
        <div class="answer-label">In short</div>
        <h2>What is an AI readiness assessment?</h2>
        <p>A short, fixed-scope review of one Rails application that answers three questions: <strong>Can we add AI to this safely? What should we build first? What will it take?</strong></p>
        <p>It is the lowest-risk way to start with AI: a small, fixed commitment that produces a plan you own.</p>
      </div>
    </div>
    <div class="scorecard" aria-label="Example AI readiness scorecard">
      <div class="scorecard-head"><strong>AI readiness scorecard</strong><span>Illustrative example</span></div>
      <ul>
        <li>Codebase<span class="scorecard-bar"><i style="width:55%"></i></span><b>2.8</b></li>
        <li>Data<span class="scorecard-bar"><i style="width:80%"></i></span><b>4.0</b></li>
        <li>Architecture<span class="scorecard-bar"><i style="width:60%"></i></span><b>3.0</b></li>
        <li>Infrastructure<span class="scorecard-bar"><i style="width:70%"></i></span><b>3.5</b></li>
        <li>Security &amp; privacy<span class="scorecard-bar"><i style="width:65%"></i></span><b>3.2</b></li>
        <li>Team &amp; process<span class="scorecard-bar"><i style="width:45%"></i></span><b>2.3</b></li>
      </ul>
      <p>Each dimension is scored from 1 to 5 with written findings and the specific fixes that would raise it.</p>
    </div>
  </div>
</section>

<div class="band">
  <section class="section section-sm" id="scope">
    <div class="eyebrow">Scope</div>
    <h2 class="section-title">Six dimensions we assess</h2>
    <div class="feature-grid">
      <div class="feature-card">
        <?= icon_badge('code', 'mint') ?>
        <h3>Codebase</h3>
        <p>Ruby and Rails versions, dependency health, test coverage, code hot spots and how hard it is to change safely.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('database', 'mint') ?>
        <h3>Data</h3>
        <p>What you have, how clean and complete it is, where it lives, and which parts are useful for retrieval or automation.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('layers', 'mint') ?>
        <h3>Architecture</h3>
        <p>Domain boundaries, service objects, events and the natural places where an AI layer can attach.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('server', 'mint') ?>
        <h3>Infrastructure</h3>
        <p>Background jobs, PostgreSQL and pgvector readiness, deployment pipeline, monitoring and environments.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('shield', 'mint') ?>
        <h3>Security and privacy</h3>
        <p>Personal data, permission model, compliance constraints and what may or may not be sent to a model provider.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('users', 'mint') ?>
        <h3>Team and process</h3>
        <p>Skills, delivery cadence, review practices and how AI tooling is already being used by your developers.</p>
      </div>
    </div>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">Timeline</div>
  <h2 class="section-title">How the two weeks run</h2>
  <ol class="timeline">
    <li>
      <span class="timeline-when">Week 1 · Start</span>
      <h3>Kickoff and discovery</h3>
      <p>We agree on goals, get read access to the repository, and interview the people who own the product, the code and the day-to-day workflows.</p>
    </li>
    <li>
      <span class="timeline-when">Week 1</span>
      <h3>Codebase and data audit</h3>
      <p>Senior Rails engineers go through the application hands-on: versions, dependencies, tests, architecture, data model and infrastructure.</p>
    </li>
    <li>
      <span class="timeline-when">Week 2</span>
      <h3>Opportunity workshop</h3>
      <p>Together with your team we list candidate AI use cases and score each one on value, feasibility, risk and time to first result.</p>
    </li>
    <li>
      <span class="timeline-when">Week 2</span>
      <h3>Architecture and roadmap</h3>
      <p>We design the target AI layer for your application and sequence the work, including any upgrades or refactoring that must come first.</p>
    </li>
    <li>
      <span class="timeline-when">Week 2 · End</span>
      <h3>Readout</h3>
      <p>A written report and a live session with your leadership and engineers to walk through findings, answer questions and agree next steps.</p>
    </li>
  </ol>
</section>

<div class="band">
  <section class="section section-sm" id="deliverables">
    <div class="eyebrow is-mint">Deliverables</div>
    <h2 class="section-title">What you walk away with</h2>
    <ul class="check-list">
      <li><strong>AI readiness scorecard</strong> across six dimensions, with written findings for each.</li>
      <li><strong>Ranked shortlist of AI use cases</strong> with value, feasibility and risk notes.</li>
      <li><strong>Target architecture</strong> for the AI layer inside your Rails application, including model and tooling recommendations.</li>
      <li><strong>Prerequisites list</strong>: the upgrades, tests and tech-debt fixes that genuinely block AI — and the ones that do not.</li>
      <li><strong>Roadmap with effort estimates</strong> for the first pilot and the steps after it.</li>
      <li><strong>Readout session</strong> with your leadership and engineering team.</li>
    </ul>
    <p class="section-sub" style="margin-top:1.5rem;">The report is yours to keep. Use it with us, with your in-house team or with another vendor.</p>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">What we need from you</div>
  <h2 class="section-title">Light on your team's time</h2>
  <ul class="check-list">
    <li>Read access to the repository.</li>
    <li>The database schema and a small set of anonymized sample data.</li>
    <li>A few hours of conversation with a product owner, a technical lead and one or two people who do the work AI might assist.</li>
    <li>A decision-maker at the readout.</li>
  </ul>
</section>

<div class="band">
  <section class="section section-sm" id="faq">
    <div class="eyebrow">FAQ</div>
    <h2 class="section-title">Assessment questions, answered</h2>
    <?= render_faq($pageFaqs) ?>
  </section>
</div>

<div class="cta-banner" style="margin-top:5rem;">
  <h2>Find out what AI can do for your Rails application</h2>
  <p>Tell us about your application. We will confirm scope and a fixed price before anything starts.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Request an assessment <?= icon('arrow-right') ?></a>
    <a href="<?= e(SITE_BOOKING) ?>" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a 15-minute call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
