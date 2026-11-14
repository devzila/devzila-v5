<?php
$pageTitle = 'AI for Rails Teams Workshop: Build LLM Features — DevZila';
$pageDescription = 'A hands-on workshop for Ruby on Rails developers: LLM integration, RAG with pgvector, streaming with Turbo, AI agents, evals and guardrails — on real code.';
$pagePath = '/ai-for-rails-workshop';
$pageBreadcrumbs = [['Home', '/'], ['Services', '/#services'], ['AI for Rails Teams Workshop']];
$pageService = [
    'name'     => 'AI for Rails Teams Workshop',
    'type'     => 'Developer training workshop',
    'audience' => 'Ruby on Rails developers and engineering teams',
];
$pageFaqs = [
    [
        'q' => 'Who is the AI for Rails Teams workshop for?',
        'a' => 'Ruby on Rails developers who are comfortable with Rails and want to build AI features properly. No machine-learning background is needed. It works best when the whole team attends, including whoever reviews pull requests.',
    ],
    [
        'q' => 'Do attendees need experience with machine learning or Python?',
        'a' => 'No. The workshop treats language models as an API your application calls. Everything is done in Ruby and Rails, with PostgreSQL and pgvector for retrieval.',
    ],
    [
        'q' => 'Can the workshop use our own codebase?',
        'a' => 'Yes. The standard format uses a workshop application so everyone starts from the same place. For private sessions we can adapt the second day to a use case from your own product.',
    ],
    [
        'q' => 'Is the workshop remote or on-site?',
        'a' => 'Either. We run it remotely or in person for your team, and tailor the examples to your domain.',
    ],
];
require __DIR__ . '/partials/header.php';
?>

<header class="page-hero is-ai">
  <?= render_breadcrumbs($pageBreadcrumbs) ?>
  <div class="eyebrow is-mint">Workshops &amp; Mentoring</div>
  <h1>AI for Rails Teams Workshop</h1>
  <p class="lede">Teach your Rails developers to build AI features the way they build everything else: in plain Ruby, with tests, in production. Two practical days covering LLM integration, RAG, agents, evaluation and guardrails.</p>
  <div class="header-actions">
    <a href="/hire-us" class="btn-primary">Book this workshop <?= icon('arrow-right') ?></a>
    <a href="#agenda" class="btn-ghost">See agenda</a>
  </div>
</header>

<section class="section section-sm" id="what">
  <div class="eyebrow">What you will learn</div>
  <h2 class="section-title">Everything a Rails developer needs to ship AI features</h2>
  <p class="section-sub">Most of the time is spent writing code. Attendees extend a workshop application step by step until it has a working, tested AI feature set.</p>
  <div class="feature-grid">
    <div class="feature-card">
      <?= icon_badge('cpu', 'mint') ?>
      <h3>LLMs for application developers</h3>
      <p>Tokens, context windows, temperature and model families — only the theory you need to make good engineering decisions.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('code', 'mint') ?>
      <h3>Calling models from Rails</h3>
      <p>Service objects, prompts as versioned code, structured output and error handling with Ruby LLM libraries.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('radio', 'mint') ?>
      <h3>Streaming and background jobs</h3>
      <p>Streaming responses to the browser with Turbo Streams, and moving slow calls into jobs with retries.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('database', 'mint') ?>
      <h3>Embeddings and RAG</h3>
      <p>Chunking, embeddings and similarity search with pgvector, then a complete retrieval-augmented answer flow.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('bot', 'mint') ?>
      <h3>Tool calling and agents</h3>
      <p>Exposing service objects as tools, building a simple agent loop, and an introduction to MCP servers.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('shield', 'mint') ?>
      <h3>Evals and guardrails</h3>
      <p>Testing non-deterministic code, evaluation suites in CI, prompt-injection defenses, privacy and cost control.</p>
    </div>
  </div>
</section>

<div class="band">
  <section class="section section-sm" id="agenda">
    <div class="eyebrow">Agenda</div>
    <h2 class="section-title">Two days, hands-on</h2>
    <ol class="timeline">
      <li>
        <span class="timeline-when">Day 1 · Morning</span>
        <h3>Foundations and first integration</h3>
        <p>How language models behave, choosing a model, calling it from a Rails service object, prompts as code and structured output.</p>
      </li>
      <li>
        <span class="timeline-when">Day 1 · Afternoon</span>
        <h3>Production plumbing</h3>
        <p>Streaming with Turbo Streams, background jobs, retries and fallbacks, tracing every call, and writing tests for AI code.</p>
      </li>
      <li>
        <span class="timeline-when">Day 2 · Morning</span>
        <h3>Retrieval-augmented generation</h3>
        <p>Embeddings, pgvector, chunking strategies, hybrid search, permission-aware retrieval and answers that cite sources.</p>
      </li>
      <li>
        <span class="timeline-when">Day 2 · Afternoon</span>
        <h3>Agents, evals and safety</h3>
        <p>Tool calling, a simple agent, evaluation suites, guardrails, privacy and cost budgets — then a review of how to apply it all to your product.</p>
      </li>
    </ol>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">Who it is for</div>
  <h2 class="section-title">A good fit if your team</h2>
  <ul class="check-list">
    <li>Builds and maintains a Ruby on Rails product and has AI features on the roadmap.</li>
    <li>Has experimented with model APIs and wants a solid, shared way of working.</li>
    <li>Prefers to own AI features in-house rather than depend on an outside vendor.</li>
    <li>Wants hands-on exercises with mentor support throughout, not a slide deck.</li>
  </ul>
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
  <h2 class="section-title">More ways to level up your team</h2>
  <div class="link-grid">
    <a class="link-card" href="/ddd-workshops"><strong>DDD Workshops <?= icon('arrow-right') ?></strong><span>Clear domain boundaries make AI agents predictable.</span></a>
    <a class="link-card" href="/hotwire-workshop"><strong>Hotwire Workshop <?= icon('arrow-right') ?></strong><span>Reactive interfaces, including streaming AI responses.</span></a>
    <a class="link-card" href="/code-mentoring"><strong>Code Mentoring <?= icon('arrow-right') ?></strong><span>Ongoing pairing and review after the workshop.</span></a>
  </div>
</section>

<div class="cta-banner">
  <h2>Build AI skills inside your Rails team</h2>
  <p>Run this workshop for your team, remote or on-site. Tell us about your product and we will tailor the examples.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Book this workshop <?= icon('arrow-right') ?></a>
    <a href="<?= e(SITE_BOOKING) ?>" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a 15-minute call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
