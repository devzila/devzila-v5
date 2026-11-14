<?php
$pageTitle = 'Why DevZila — AI-First Ruby on Rails Engineers';
$pageDescription = 'Senior engineers who pair deep Ruby on Rails experience with practical AI enablement. How we work: daily communication, small releases, long-term partnership.';
$pagePath = '/why-devzila';
$pageSchemaType = 'AboutPage';
$pageBreadcrumbs = [['Home', '/'], ['Why DevZila']];
$pageFaqs = [
    [
        'q' => 'Do I need technical knowledge to work with you?',
        'a' => 'Not at all. We\'ve worked directly with non-technical founders, COOs, product managers and domain experts. We translate tech into business terms and make sure you always understand what\'s going on.',
    ],
    [
        'q' => 'Can we start small?',
        'a' => 'Absolutely. Many of our long-term collaborations started with a small upgrade or refactor. We can begin with a specific goal, a code audit or an <a href="/ai-readiness-assessment">AI Readiness Assessment</a>, and build from there.',
    ],
    [
        'q' => 'Do you work with in-house teams?',
        'a' => 'Yes. On many projects we work alongside existing developers — contributing code, supporting architecture decisions and mentoring less experienced team members.',
    ],
    [
        'q' => 'How do you charge for your services?',
        'a' => 'We typically work on a time &amp; materials basis, billed monthly. No long-term lock-ins, no surprises.',
    ],
    [
        'q' => 'How will you work with my current team?',
        'a' => 'We use your existing project management and communication tools, keeping everything visible and transparent. Our goal is to blend seamlessly — no "us vs. them," just "we."',
    ],
    [
        'q' => 'What if our codebase is messy?',
        'a' => 'We\'ve seen worse. We follow a simple rule: leave the code better than we found it. Small improvements, every time we touch it.',
    ],
    [
        'q' => 'What does the first week look like?',
        'a' => 'From day one we dive into your most important task — asking questions, learning the code and aiming to ship changes immediately. Then we repeat daily: pick the top priority, break it down, finish and deploy.',
    ],
    [
        'q' => 'Are your developers senior?',
        'a' => 'Yes — our team is made up of experienced developers. You get people who\'ve worked on complex applications for years, not juniors learning on your project.',
    ],
    [
        'q' => 'What does "AI-first" mean at DevZila?',
        'a' => 'It means we look at every legacy Rails application with one question in mind: what would it take for this system to use AI well? Sometimes the answer is a new feature; often it starts with an upgrade, tests or cleaner data. It does not mean adding AI where a simple rule would do the job better.',
    ],
];
require __DIR__ . '/partials/header.php';
?>

<header class="page-hero">
  <?= render_breadcrumbs($pageBreadcrumbs) ?>
  <div class="eyebrow">Why DevZila</div>
  <h1>Your business goals. <span class="grad-text">Our technical expertise.</span></h1>
  <p class="lede">We do more than just write code — we work alongside you to refine your vision, shape upcoming features and maximize value at every step, from the first Rails upgrade to AI in production.</p>
  <div class="header-actions">
    <a href="/hire-us" class="btn-primary">Let's work together <?= icon('arrow-right') ?></a>
    <a href="#faq" class="btn-ghost">Read FAQ</a>
  </div>
</header>

<section class="section section-sm">
  <div class="split is-top">
    <div>
      <div class="eyebrow">Who we are</div>
      <h2 class="section-title">Technical excellence, business focus</h2>
    </div>
    <div class="prose">
      <p>We're dedicated to building solutions that make a real impact, combining technical excellence with a deep understanding of your goals. We're not self-proclaimed "ninjas" or "gurus" — just experienced, mindful developers with a broad, versatile skillset.</p>
      <p>Our proficiency spans both frontend and backend, so we quickly understand your entire application and deliver cohesive, end-to-end features — not just isolated tasks. This holistic approach lets us introduce meaningful changes across every layer of your product, always with your business objectives in mind.</p>
    </div>
  </div>
</section>

<div class="band">
  <section class="section section-sm" id="ai-first">
    <div class="eyebrow is-mint">AI-first, Rails-native</div>
    <h2 class="section-title">Why an AI partner should know your framework</h2>
    <p class="section-sub">Most AI projects stall on everything around the model: old dependencies, untested code, messy data and unclear ownership. That is the work we have always done.</p>
    <div class="feature-grid">
      <div class="feature-card">
        <?= icon_badge('layers', 'mint') ?>
        <h3>We start from the system you have</h3>
        <p>Your Rails application already holds the data, rules and workflows AI needs. We build on it rather than around it.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('target', 'mint') ?>
        <h3>Use cases before technology</h3>
        <p>We begin with the business process and the value at stake, and recommend a simple rule whenever it beats a model.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('shield', 'mint') ?>
        <h3>Production standards</h3>
        <p>Evaluations, guardrails, cost limits, fallbacks and human approval are part of the first release, not an afterthought.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('shuffle', 'mint') ?>
        <h3>Model-agnostic</h3>
        <p>We work with Anthropic, OpenAI, Google and open-weight models, and keep your code independent of any one provider.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('user-check', 'mint') ?>
        <h3>AI-assisted, senior-reviewed</h3>
        <p>We use AI tools in our own delivery to move faster. Every change is still reviewed and owned by a senior engineer.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('book', 'mint') ?>
        <h3>Your team learns it too</h3>
        <p>Through pairing, documentation and workshops, the knowledge stays with your developers.</p>
      </div>
    </div>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">How we work</div>
  <h2 class="section-title">How we collaborate</h2>
  <p class="section-sub">We blend into your team, work in your tools and keep you fully in the loop — without adding overhead.</p>
  <div class="feature-grid">
    <div class="feature-card">
      <?= icon_badge('mail') ?>
      <h3>Daily communication</h3>
      <p>You'll hear from us every day — what we did, what we're working on and what's next. No micromanagement required.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('rocket') ?>
      <h3>Ship real value daily</h3>
      <p>We focus on the most important tasks first, split them into small shippable parts and aim to deploy to production every day.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('tool') ?>
      <h3>We adapt to you</h3>
      <p>We use your existing project management and communication tools, fitting into your way of working — not the other way around.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('sparkles') ?>
      <h3>Thoughtful suggestions</h3>
      <p>When we spot ways to improve your code or processes, we'll suggest them — always with context, examples and clear reasoning.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('refresh') ?>
      <h3>Leave code better</h3>
      <p>Messy codebase? We've seen worse. We follow a simple rule: leave the code better than we found it, every time we touch it.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('users') ?>
      <h3>Long-term partners</h3>
      <p>We won't disappear after a few months. Many clients work with us for years — we treat your project like it's our own.</p>
    </div>
  </div>
</section>

<div class="band">
  <section class="section section-sm" id="faq">
    <div class="eyebrow">FAQ</div>
    <h2 class="section-title">Frequently asked questions</h2>
    <?= render_faq($pageFaqs) ?>
    <p style="margin-top:1.75rem;"><a class="text-link" href="/faq">More answers about AI enablement and Rails modernization <?= icon('arrow-right') ?></a></p>
  </section>
</div>

<div class="cta-banner">
  <h2>Want developers who deliver real business value?</h2>
  <p>Let's talk about how our experienced team can help you ship features faster and achieve your goals.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Contact us today <?= icon('arrow-right') ?></a>
    <a href="<?= e(SITE_BOOKING) ?>" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
