<?php
$pageTitle = 'Frontend Development for Rails: Hotwire & React — DevZila';
$pageDescription = 'Modern, responsive frontends for Rails with Hotwire and React, including streaming AI interfaces, React-to-Hotwire migrations and design systems.';
$pagePath = '/frontend-development';
$pageBreadcrumbs = [['Home', '/'], ['Services', '/#services'], ['Frontend Development']];
$pageService = [
    'name'     => 'Frontend Development',
    'type'     => 'Frontend development for Ruby on Rails applications',
    'audience' => 'Product teams with Ruby on Rails backends',
    'offers'   => [
        'React and Next.js interfaces',
        'Hotwire and Turbo interfaces',
        'React to Hotwire migration',
        'Design systems',
        'Streaming AI chat and copilot interfaces',
    ],
];
$pageFaqs = [
    [
        'q' => 'Should we use Hotwire or React with Rails?',
        'a' => 'It depends on the product. Hotwire keeps rendering on the server, so most Rails applications get fast, interactive pages with very little JavaScript and one codebase to maintain. React is the better fit for highly interactive, offline-capable or app-like interfaces. We work with both and recommend based on your team and product, not preference.',
    ],
    [
        'q' => 'Can you migrate our frontend from React to Hotwire?',
        'a' => 'Yes. We migrate screen by screen, starting where the single-page app adds the most complexity for the least benefit. Both approaches run side by side during the transition, so there is no big-bang switch.',
    ],
    [
        'q' => 'How do you build AI chat or copilot interfaces in Rails?',
        'a' => 'Model responses are generated in a background job and streamed to the browser over Turbo Streams, so text appears as it is written. The same pattern works with React over a streaming endpoint. We also design the states that matter in AI interfaces: loading, sources and citations, low confidence, errors and feedback.',
    ],
];
require __DIR__ . '/partials/header.php';
?>

<header class="page-hero">
  <?= render_breadcrumbs($pageBreadcrumbs) ?>
  <div class="eyebrow">Ruby on Rails Engineering</div>
  <h1>Frontend Development</h1>
  <p class="lede">We craft modern, responsive UIs that integrate seamlessly with Rails backends. Our expertise covers both React and Hotwire — and we help teams transition from React to Hotwire to simplify their frontend architecture while keeping a great user experience.</p>
  <div class="header-actions">
    <a href="/hire-us" class="btn-primary">Start a project <?= icon('arrow-right') ?></a>
    <a href="#what" class="btn-ghost">What we do</a>
  </div>
</header>

<section class="section section-sm" id="what">
  <div class="eyebrow">What we do</div>
  <h2 class="section-title">The right frontend for the job</h2>
  <p class="section-sub">From rich React applications to server-rendered Hotwire interfaces, we choose the right tool for the job and deliver fast, accessible, maintainable frontends.</p>
  <div class="feature-grid">
    <div class="feature-card">
      <?= icon_badge('code') ?>
      <h3>React &amp; Next.js</h3>
      <p>Component-driven, type-safe interfaces for complex, highly interactive products.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('wind') ?>
      <h3>Hotwire / Turbo</h3>
      <p>Reactive, server-rendered UIs with minimal JavaScript — fast to build and easy to maintain.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('repeat') ?>
      <h3>React → Hotwire</h3>
      <p>Migrate away from heavy SPA complexity to a simpler Hotwire architecture without losing UX.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('layout') ?>
      <h3>Design systems</h3>
      <p>Consistent, reusable component libraries that keep your product cohesive as it grows.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('zap') ?>
      <h3>Performance</h3>
      <p>Fast load times, smooth interactions and optimized rendering for real-world devices.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('user-check') ?>
      <h3>Accessibility</h3>
      <p>Inclusive, standards-compliant interfaces that work for every user.</p>
    </div>
  </div>
</section>

<div class="band">
  <section class="section section-sm" id="ai-interfaces">
    <div class="eyebrow is-mint">AI interfaces</div>
    <h2 class="section-title">Interfaces for AI features people actually use</h2>
    <p class="section-sub">A model is only as useful as the interface around it. We design and build the parts users see and trust.</p>
    <div class="feature-grid">
      <div class="feature-card">
        <?= icon_badge('radio', 'mint') ?>
        <h3>Streaming responses</h3>
        <p>Answers that appear as they are generated, delivered with Turbo Streams or a streaming endpoint for React.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('message', 'mint') ?>
        <h3>In-app copilots</h3>
        <p>Assistants embedded in the screens where work happens, aware of the record the user is looking at.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('link', 'mint') ?>
        <h3>Sources and citations</h3>
        <p>Every answer linked to the records and documents it came from, so users can verify it.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('user-check', 'mint') ?>
        <h3>Review and approve</h3>
        <p>Clear accept, edit and reject flows for AI suggestions — the human stays in control.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('search', 'mint') ?>
        <h3>Semantic search UI</h3>
        <p>Search that understands meaning, with filters, highlights and sensible empty states.</p>
      </div>
      <div class="feature-card">
        <?= icon_badge('activity', 'mint') ?>
        <h3>Feedback capture</h3>
        <p>Lightweight thumbs-up and correction controls that feed your evaluation set.</p>
      </div>
    </div>
    <p style="margin-top:1.75rem;"><a class="text-link is-mint" href="/ai-use-cases#copilots">See the in-app copilot use case <?= icon('arrow-right') ?></a></p>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">Results</div>
  <h2 class="section-title">What you get</h2>
  <ul class="check-list">
    <li>A frontend architecture matched to your team and product — not dogma.</li>
    <li>Seamless integration with your Rails backend and APIs.</li>
    <li>Reusable components and a maintainable design system.</li>
    <li>Fast, accessible, mobile-friendly interfaces your users love.</li>
  </ul>
</section>

<div class="band">
  <section class="section section-sm" id="faq">
    <div class="eyebrow">FAQ</div>
    <h2 class="section-title">Frontend questions, answered</h2>
    <?= render_faq($pageFaqs) ?>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">Related services</div>
  <h2 class="section-title">Keep exploring</h2>
  <div class="link-grid">
    <a class="link-card" href="/hotwire-workshop"><strong>Hotwire Workshop <?= icon('arrow-right') ?></strong><span>Train your team on Turbo and Stimulus.</span></a>
    <a class="link-card" href="/ai-integration-automation"><strong>AI Integration &amp; Automation <?= icon('arrow-right') ?></strong><span>The backend behind AI interfaces.</span></a>
    <a class="link-card" href="/rails-development"><strong>Ruby on Rails Development <?= icon('arrow-right') ?></strong><span>Full-stack senior Rails engineering.</span></a>
  </div>
</section>

<div class="cta-banner">
  <h2>Need a frontend that keeps up with your backend?</h2>
  <p>Let's build an interface that's fast, polished and easy to maintain.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Hire us <?= icon('arrow-right') ?></a>
    <a href="<?= e(SITE_BOOKING) ?>" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
