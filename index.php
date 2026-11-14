<?php
$pageTitle = 'DevZila — AI Enablement for Legacy Ruby on Rails Applications';
$pageDescription = 'DevZila is an AI-first Ruby on Rails consultancy. We modernize legacy Rails apps and make them AI-ready with AI strategy, LLM integration and automation.';
$pagePath = '/';
$navServicesHref = '#services';

$pageFaqs = [
    [
        'q' => 'What does DevZila do?',
        'a' => 'DevZila is an AI-first Ruby on Rails consultancy. We help companies that run on a Rails application do three things: decide where AI creates real business value, integrate LLM-powered features and automation into the existing app, and modernize the codebase — upgrades, tests and architecture — so it is safe to build on.',
    ],
    [
        'q' => 'Can you add AI to a legacy Rails application without rewriting it?',
        'a' => 'Yes. In most cases AI features are added as a layer on top of the application you already have: service objects that call a language model, background jobs for long-running work, and a vector index inside your existing PostgreSQL database. Where an outdated Ruby or Rails version blocks progress, we <a href="/rails-upgrades">upgrade incrementally</a> in parallel instead of starting over.',
    ],
    [
        'q' => 'What is AI enablement?',
        'a' => 'AI enablement is the work of making a company and its software able to use AI productively. It covers choosing use cases with measurable value, preparing data, integrating models into existing workflows, adding evaluation and guardrails, and training the team that will own the result.',
    ],
    [
        'q' => 'Which AI models and tools do you work with?',
        'a' => 'We are model-agnostic. We work with OpenAI, Anthropic Claude, Google Gemini and open-weight models, and pick per use case based on quality, latency, cost and data-privacy constraints. On the Rails side we use PostgreSQL with pgvector, background jobs, Turbo Streams for streaming responses, and Ruby libraries such as RubyLLM, ruby-openai and langchainrb.',
    ],
    [
        'q' => 'How do we get started?',
        'a' => 'Most teams start with an <a href="/ai-readiness-assessment">AI Readiness Assessment</a>: a short, fixed-scope review of your codebase, data and workflows that ends with a ranked list of AI opportunities and a delivery plan. If you already know what you want to build, we can go straight to a pilot.',
    ],
    [
        'q' => 'Is our data safe when you integrate language models?',
        'a' => 'We design every integration around data minimization: only the fields a task needs are sent to a model, personal data can be redacted first, and retrieval respects your existing permission rules. We help you choose providers and settings that match your privacy requirements, including self-hosted open-weight models when data must not leave your infrastructure.',
    ],
];

$integrationRows = [
    [
        ['OpenAI', '#10a37f', 'AI'], ['Anthropic', '#b5543e', 'An'], ['Google Gemini', '#4285f4', 'Ge'],
        ['pgvector', '#336791', 'pv'], ['Pinecone', '#1c1c2e', 'Pi'], ['LangChain', '#1c3c3c', 'LC'],
        ['n8n', '#ea4b71', 'n8'], ['Zapier', '#ff4a00', 'Za'], ['Make', '#6d04d7', 'Mk'],
        ['Slack', '#4a154b', 'Sl'], ['HubSpot', '#ff7a59', 'HS'], ['Stripe', '#635bff', 'St'],
    ],
    [
        ['PostgreSQL', '#336791', 'PG'], ['Redis', '#dc382d', 'Re'], ['Sidekiq', '#b01e1e', 'Sq'],
        ['GitHub', '#24292e', 'GH'], ['AWS', '#ff9900', 'AW'], ['Heroku', '#430098', 'Hk'],
        ['Docker', '#2496ed', 'Dk'], ['Sentry', '#362d59', 'Se'], ['Datadog', '#632ca6', 'DD'],
        ['Twilio', '#f22f46', 'Tw'], ['SendGrid', '#1a82e2', 'SG'], ['Algolia', '#003dff', 'Al'],
    ],
];

require __DIR__ . '/partials/header.php';
?>
<!-- HERO -->
<section class="hero">
  <div class="hero-badge">
    <span class="hero-badge-dot"></span>
    AI-first Ruby on Rails consultancy
  </div>
  <h1>Turn your legacy Rails app into an <span class="grad-text"><span class="nowrap">AI-powered</span> product</span></h1>
  <p class="hero-sub">
    DevZila combines AI transformation strategy, AI integration and automation, and deep Ruby on Rails engineering. We modernize the application you already have and make it AI-ready — without a rewrite.
  </p>
  <div class="hero-actions">
    <a href="/ai-readiness-assessment" class="btn-primary">Get an AI readiness assessment <?= icon('arrow-right') ?></a>
    <a href="#services" class="btn-ghost">Explore services</a>
  </div>
  <ul class="hero-proof">
    <li><?= icon('check') ?> No rewrite required</li>
    <li><?= icon('check') ?> Senior Rails engineers</li>
    <li><?= icon('check') ?> Model-agnostic: Claude, GPT, Gemini, open-weight</li>
  </ul>

  <!-- Transformation track -->
  <div class="xform" aria-label="How DevZila transforms a legacy Rails application">
    <div class="xform-stage is-legacy">
      <span class="xform-tag">Where you are</span>
      <h2><?= icon('box') ?> Legacy Rails app</h2>
      <ul>
        <li>Rails 4–6 and aging gems</li>
        <li>Thin test coverage, risky deploys</li>
        <li>Manual, repetitive workflows</li>
        <li>Valuable data locked in tables</li>
      </ul>
    </div>
    <div class="xform-arrow" aria-hidden="true">
      <svg viewBox="0 0 40 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path class="flow" d="M2 12h30"/><path d="M28 6l7 6-7 6"/></svg>
    </div>
    <div class="xform-stage is-ready">
      <span class="xform-tag">What we build first</span>
      <h2><?= icon('layers') ?> AI-ready foundation</h2>
      <ul>
        <li>Current Ruby and Rails versions</li>
        <li>Tests and CI as a safety net</li>
        <li>Clear domain boundaries and events</li>
        <li>PostgreSQL + pgvector data layer</li>
      </ul>
    </div>
    <div class="xform-arrow" aria-hidden="true">
      <svg viewBox="0 0 40 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path class="flow" d="M2 12h30"/><path d="M28 6l7 6-7 6"/></svg>
    </div>
    <div class="xform-stage is-ai">
      <span class="xform-tag">Where you land</span>
      <h2><?= icon('sparkles') ?> AI-native product</h2>
      <ul>
        <li>Copilots and assistants in your app</li>
        <li>Agents automating back-office work</li>
        <li>Semantic search over your own data</li>
        <li>Evals, guardrails and cost controls</li>
      </ul>
    </div>
  </div>
</section>

<!-- TECH STRIP -->
<ul class="tech-strip" aria-label="Core technologies">
  <li class="tech-pill"><span class="tech-dot" style="background:#cc342d;"></span>Ruby on Rails 8</li>
  <li class="tech-pill"><span class="tech-dot" style="background:#4ad6bc;"></span>LLM integration</li>
  <li class="tech-pill"><span class="tech-dot" style="background:#86a9ee;"></span>RAG + pgvector</li>
  <li class="tech-pill"><span class="tech-dot" style="background:#a78bfa;"></span>AI agents + MCP</li>
  <li class="tech-pill"><span class="tech-dot" style="background:#34d399;"></span>PostgreSQL</li>
  <li class="tech-pill"><span class="tech-dot" style="background:#f59e0b;"></span>Hotwire / Turbo</li>
  <li class="tech-pill"><span class="tech-dot" style="background:#4f8ef7;"></span>React</li>
</ul>

<!-- PILLARS -->
<section class="section" id="services">
  <div class="eyebrow">What we do</div>
  <h2 class="section-title">Three capabilities, one team</h2>
  <p class="section-sub">AI projects fail when strategy, integration and the underlying codebase are handled by different vendors. We do all three, so the plan we write is the plan we ship.</p>

  <div class="pillar-grid">
    <article class="pillar is-ai">
      <?= icon_badge('compass', 'mint') ?>
      <div class="pillar-kicker">01 · Decide</div>
      <h3><a href="/ai-transformation-strategy">AI Transformation &amp; Strategy</a></h3>
      <p>Find where AI pays off in your product and operations, and turn it into a roadmap your team can actually deliver.</p>
      <ul class="dot-list">
        <li>AI opportunity mapping and prioritization</li>
        <li>Data, architecture and risk readiness</li>
        <li>Build-vs-buy and model selection</li>
        <li>Governance, guardrails and team enablement</li>
      </ul>
      <span class="text-link is-mint">AI transformation &amp; strategy <?= icon('arrow-right') ?></span>
    </article>

    <article class="pillar is-ai">
      <?= icon_badge('workflow', 'mint') ?>
      <div class="pillar-kicker">02 · Build</div>
      <h3><a href="/ai-integration-automation">AI Integration &amp; Automation</a></h3>
      <p>Ship LLM-powered features and automated workflows inside your existing Rails application — tested, observable and cost-controlled.</p>
      <ul class="dot-list">
        <li>Copilots, assistants and chat interfaces</li>
        <li>RAG and semantic search with pgvector</li>
        <li>AI agents, tool calling and MCP servers</li>
        <li>Document processing and workflow automation</li>
      </ul>
      <span class="text-link is-mint">AI integration &amp; automation <?= icon('arrow-right') ?></span>
    </article>

    <article class="pillar">
      <?= icon_badge('code', 'blue') ?>
      <div class="pillar-kicker">03 · Foundation</div>
      <h3><a href="/legacy-rails-modernization">Ruby on Rails Engineering</a></h3>
      <p>Our core craft. We rescue, upgrade and modernize legacy Rails codebases so new capabilities land on solid ground.</p>
      <ul class="dot-list">
        <li>Legacy Rails rescue and modernization</li>
        <li>Ruby and Rails version upgrades</li>
        <li>Domain-Driven Design and event sourcing</li>
        <li>Performance, testing and CI/CD</li>
      </ul>
      <span class="text-link">Legacy Rails modernization <?= icon('arrow-right') ?></span>
    </article>
  </div>
</section>

<!-- WHY RAILS + AI -->
<div class="band">
  <section class="section">
    <div class="split">
      <div>
        <div class="eyebrow is-mint">Why it works</div>
        <h2 class="section-title">Your Rails monolith is an AI asset, not a liability</h2>
        <p class="section-sub">Language models are only as useful as the context and actions you give them. A mature Rails application already holds both: years of business rules in its models and a clean history of everything your customers did.</p>
        <div class="answer" style="margin-top:2rem;">
          <div class="answer-label">In short</div>
          <p><strong>AI enablement for a Rails application</strong> means adding an AI layer — retrieval, model calls, tools and guardrails — on top of the domain logic and data you already have, while modernizing the code underneath so it stays safe to change.</p>
        </div>
      </div>
      <ul class="icon-rows">
        <li class="icon-row">
          <?= icon_badge('database', 'mint') ?>
          <div>
            <h3>Your data model is the moat</h3>
            <p>Structured records in PostgreSQL are ideal raw material for retrieval, classification and summarization. With pgvector, embeddings live next to the data they describe.</p>
          </div>
        </li>
        <li class="icon-row">
          <?= icon_badge('git-branch', 'mint') ?>
          <div>
            <h3>Business rules become AI tools</h3>
            <p>Existing service objects and model methods can be exposed to agents as tools, so AI acts through the same validations and permissions as your users.</p>
          </div>
        </li>
        <li class="icon-row">
          <?= icon_badge('zap', 'mint') ?>
          <div>
            <h3>Rails already has the plumbing</h3>
            <p>Background jobs for long-running model calls, Turbo Streams for streaming answers, Active Storage for documents. Less new infrastructure, faster delivery.</p>
          </div>
        </li>
        <li class="icon-row">
          <?= icon_badge('shield', 'mint') ?>
          <div>
            <h3>No big-bang rewrite</h3>
            <p>We add AI where it earns its keep and modernize incrementally underneath. Your team keeps shipping the whole time.</p>
          </div>
        </li>
      </ul>
    </div>
  </section>
</div>

<!-- WHAT WE BUILD -->
<section class="section">
  <div class="eyebrow">What we build</div>
  <h2 class="section-title">AI features that fit the way your product already works</h2>
  <p class="section-sub">Practical patterns we design and build inside Ruby on Rails applications. Each one starts small, ships behind a feature flag and is measured against a baseline.</p>

  <div class="feature-grid">
    <a class="feature-card" href="/ai-use-cases#copilots">
      <?= icon_badge('message', 'mint') ?>
      <h3>In-app copilots and assistants</h3>
      <p>Assistants that answer questions and take actions using your application's own data, business rules and permissions.</p>
    </a>
    <a class="feature-card" href="/ai-use-cases#semantic-search">
      <?= icon_badge('search', 'mint') ?>
      <h3>Semantic search and RAG</h3>
      <p>Search records, documents and tickets by meaning. Answers are grounded in your data and cite their sources.</p>
    </a>
    <a class="feature-card" href="/ai-use-cases#document-processing">
      <?= icon_badge('file-text', 'mint') ?>
      <h3>Document and data extraction</h3>
      <p>Turn invoices, contracts and forms into validated, structured records that flow straight into your models.</p>
    </a>
    <a class="feature-card" href="/ai-use-cases#workflow-agents">
      <?= icon_badge('bot', 'mint') ?>
      <h3>Workflow agents</h3>
      <p>Agents that triage, route, reconcile and follow up as background jobs — with human approval where it matters.</p>
    </a>
    <a class="feature-card" href="/ai-use-cases#support-automation">
      <?= icon_badge('inbox', 'mint') ?>
      <h3>Support and operations automation</h3>
      <p>Draft replies, summarize long threads, classify and tag incoming requests, and surface the next best action.</p>
    </a>
    <a class="feature-card" href="/legacy-rails-modernization#ai-accelerated">
      <?= icon_badge('refresh', 'mint') ?>
      <h3>AI-accelerated modernization</h3>
      <p>AI-assisted code audits, test backfill and upgrade work, reviewed line by line by senior Rails engineers.</p>
    </a>
  </div>
  <p style="margin-top:1.75rem;"><a class="text-link" href="/ai-use-cases">See all AI use cases for Rails applications <?= icon('arrow-right') ?></a></p>
</section>

<!-- ALL SERVICES -->
<div class="band">
  <section class="section">
    <div class="eyebrow">Services</div>
    <h2 class="section-title">Everything a Rails product needs to modernize and grow</h2>

    <div class="feature-grid">
      <a class="feature-card" href="/legacy-rails-modernization">
        <?= icon_badge('layers') ?>
        <h3>Legacy Rails Modernization</h3>
        <p>Stabilize, refactor and re-architect aging Rails applications so they are ready for AI and for the next decade.</p>
        <span class="tag">Audit · Refactor · AI-ready</span>
      </a>
      <a class="feature-card" href="/rails-upgrades">
        <?= icon_badge('arrow-up') ?>
        <h3>Ruby on Rails Upgrades</h3>
        <p>Incremental, low-risk upgrades to current Ruby and Rails versions with dual-booting and zero-downtime deploys.</p>
        <span class="tag">Rails 4 → 8 · Dual boot</span>
      </a>
      <a class="feature-card" href="/rails-development">
        <?= icon_badge('code') ?>
        <h3>Ruby on Rails Development</h3>
        <p>Senior engineers for new features, APIs, performance work and long-term maintenance of business-critical apps.</p>
        <span class="tag">Rails · Hotwire · Sidekiq</span>
      </a>
      <a class="feature-card" href="/ai-readiness-assessment">
        <?= icon_badge('target', 'mint') ?>
        <h3>AI Readiness Assessment</h3>
        <p>A fixed-scope review of your codebase, data and workflows that ends with a ranked AI roadmap and estimate.</p>
        <span class="tag">Fixed scope · Roadmap</span>
      </a>
      <a class="feature-card" href="/frontend-development">
        <?= icon_badge('layout') ?>
        <h3>Frontend Development</h3>
        <p>Hotwire and React interfaces for Rails backends, including streaming AI chat and assistant experiences.</p>
        <span class="tag">Hotwire · React · TypeScript</span>
      </a>
      <a class="feature-card" href="/fintech-solutions">
        <?= icon_badge('credit-card') ?>
        <h3>Fintech Solutions</h3>
        <p>Event-driven financial software with accurate accounting, full audit trails and AI you can explain to an auditor.</p>
        <span class="tag">Ledgers · Event sourcing</span>
      </a>
    </div>
  </section>
</div>

<!-- ENGAGEMENTS -->
<section class="section" id="engagements">
  <div class="eyebrow">How to work with us</div>
  <h2 class="section-title">Start small, scale what works</h2>
  <p class="section-sub">Pick the entry point that matches where you are. Each engagement produces something you can use on its own, with no long-term lock-in.</p>

  <div class="offer-grid">
    <a href="/ai-readiness-assessment" class="offer-card is-ai">
      <span class="offer-flag">Start here</span>
      <span class="offer-badge"><?= icon('target') ?> Assess</span>
      <h3>AI Readiness Assessment</h3>
      <div class="tagline">Fixed scope · About two weeks</div>
      <p>We review your Rails codebase, data and workflows, then hand you a ranked list of AI opportunities with an architecture and delivery plan.</p>
      <ul class="dot-list">
        <li>Codebase, upgrade and data audit</li>
        <li>AI use cases ranked by value and feasibility</li>
        <li>Target architecture and risk register</li>
        <li>Roadmap with effort estimates</li>
      </ul>
      <span class="text-link is-mint">See what is included <?= icon('arrow-right') ?></span>
    </a>

    <a href="/ai-integration-automation" class="offer-card is-ai">
      <span class="offer-badge"><?= icon('rocket') ?> Pilot</span>
      <h3>AI Feature Pilot</h3>
      <div class="tagline">One use case · Production-ready</div>
      <p>We take the highest-value use case and build it end to end inside your Rails app, with evaluation, guardrails and monitoring from day one.</p>
      <ul class="dot-list">
        <li>Working feature behind a feature flag</li>
        <li>Evaluation suite and quality baseline</li>
        <li>Cost, latency and usage dashboards</li>
        <li>Go / no-go review with real numbers</li>
      </ul>
      <span class="text-link is-mint">How we integrate AI <?= icon('arrow-right') ?></span>
    </a>

    <a href="/legacy-rails-modernization" class="offer-card is-full">
      <span class="offer-badge"><?= icon('users') ?> Team</span>
      <h3>Modernize &amp; Enable</h3>
      <div class="tagline">Dedicated team · Ongoing</div>
      <p>A dedicated senior team that upgrades and refactors your legacy Rails application while delivering AI features on a steady cadence.</p>
      <ul class="dot-list">
        <li>Dedicated team of 2–4 developers</li>
        <li>Weekly sprints with demos</li>
        <li>Upgrades, refactoring and new AI features</li>
        <li>Post-launch support included</li>
      </ul>
      <span class="text-link">Legacy Rails modernization <?= icon('arrow-right') ?></span>
    </a>

    <a href="/ai-for-rails-workshop" class="offer-card">
      <span class="offer-badge"><?= icon('book') ?> Upskill</span>
      <h3>Team Enablement</h3>
      <div class="tagline">Workshops · Mentoring</div>
      <p>Hands-on training that leaves the knowledge in your team: building AI features in Rails, Domain-Driven Design, Hotwire and code mentoring.</p>
      <ul class="dot-list">
        <li>AI for Rails teams workshop</li>
        <li>DDD and Event Storming workshops</li>
        <li>Hotwire workshop</li>
        <li>Pairing, reviews and mentoring</li>
      </ul>
      <span class="text-link">Explore workshops <?= icon('arrow-right') ?></span>
    </a>
  </div>
</section>

<!-- INTEGRATIONS -->
<div class="band">
  <section class="integrations" id="integrations" aria-label="Models, data stores and tools we integrate with">
    <div class="integrations-label">Models, data stores and tools we integrate with</div>
    <div class="marquee-wrapper">
      <?php foreach ($integrationRows as $i => $row): ?>
      <div class="marquee-row<?= $i === 1 ? ' reverse' : '' ?>">
        <?php foreach ([false, true] as $isDuplicate): ?>
        <ul<?= $isDuplicate ? ' aria-hidden="true"' : '' ?>>
          <?php foreach ($row as [$name, $color, $letters]): ?>
          <li class="integration-chip"><span class="int-icon" style="background:<?= e($color) ?>;"><?= e($letters) ?></span><?= e($name) ?></li>
          <?php endforeach; ?>
        </ul>
        <?php endforeach; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </section>
</div>

<!-- STACK -->
<section class="section" id="stack">
  <div class="eyebrow">Tech stack</div>
  <h2 class="section-title">Boring foundations, modern AI layer</h2>
  <p class="section-sub">We pair battle-tested Rails infrastructure with an AI layer that is deliberately thin, swappable and observable — so a model change is a configuration change, not a rewrite.</p>

  <div class="split" style="margin-top:3rem;">
    <div class="code-card">
      <div class="code-card-bar"><i></i><i></i><i></i><span>ai_ready_rails.rb</span></div>
<pre><span class="tok-k">stack</span> = {
  <span class="tok-s">core</span>: {
    <span class="tok-s">framework</span>: <span class="tok-v">"Ruby on Rails 8"</span>,
    <span class="tok-s">database</span>:  <span class="tok-v">"PostgreSQL + pgvector"</span>,
    <span class="tok-s">jobs</span>:      <span class="tok-v">"Sidekiq / Solid Queue"</span>,
    <span class="tok-s">realtime</span>:  <span class="tok-v">"Hotwire · Turbo Streams"</span>,
  },

  <span class="tok-a">ai_layer</span>: {
    <span class="tok-s">models</span>:     [<span class="tok-v">"Claude"</span>, <span class="tok-v">"GPT"</span>, <span class="tok-v">"Gemini"</span>, <span class="tok-v">"open-weight"</span>],
    <span class="tok-s">retrieval</span>:  <span class="tok-v">"RAG over your own data"</span>,
    <span class="tok-s">agents</span>:     <span class="tok-v">"tool calling · MCP"</span>,
    <span class="tok-s">safeguards</span>: [<span class="tok-v">"evals"</span>, <span class="tok-v">"guardrails"</span>, <span class="tok-v">"budgets"</span>],
  },

  <span class="tok-s">frontend</span>: [<span class="tok-v">"Hotwire"</span>, <span class="tok-v">"React"</span>, <span class="tok-v">"TypeScript"</span>],
  <span class="tok-s">infra</span>:    [<span class="tok-v">"AWS"</span>, <span class="tok-v">"Heroku"</span>, <span class="tok-v">"Fly.io"</span>, <span class="tok-v">"Kamal"</span>]
}</pre>
    </div>
    <ul class="icon-rows">
      <li class="icon-row">
        <?= icon_badge('code') ?>
        <div>
          <h3>Rails: convention over configuration</h3>
          <p>Opinionated, fast to ship and maintainable long-term. We keep AI code in plain service objects and jobs — no parallel framework to learn.</p>
        </div>
      </li>
      <li class="icon-row">
        <?= icon_badge('cpu', 'mint') ?>
        <div>
          <h3>AI: integrated, not bolted on</h3>
          <p>Streaming, tool calling, retrieval and agentic workflows woven into your data model and permission system from the first commit.</p>
        </div>
      </li>
      <li class="icon-row">
        <?= icon_badge('sliders', 'mint') ?>
        <div>
          <h3>Model-agnostic by design</h3>
          <p>Providers sit behind a small gateway. Swap or mix models per task as quality, price and privacy requirements change.</p>
        </div>
      </li>
      <li class="icon-row">
        <?= icon_badge('lock') ?>
        <div>
          <h3>Security and performance first</h3>
          <p>N+1 queries eliminated, rate limiting, OWASP-aligned practices, prompt-injection defenses and automated security scanning in CI.</p>
        </div>
      </li>
    </ul>
  </div>
</section>

<!-- PROCESS -->
<div class="band">
  <section class="section">
    <div class="eyebrow">How we work</div>
    <h2 class="section-title">From legacy to AI-enabled in four steps</h2>

    <ol class="steps">
      <li class="step">
        <div class="step-num">01 — Assess</div>
        <h3>Audit and prioritize</h3>
        <p>We audit your codebase, data and workflows, then rank AI opportunities by value and feasibility. No code is written before we agree on a brief.</p>
      </li>
      <li class="step">
        <div class="step-num">02 — Stabilize</div>
        <h3>Make change safe</h3>
        <p>We upgrade Ruby and Rails where it is blocking, and put tests and CI around the parts of the system AI will touch.</p>
      </li>
      <li class="step">
        <div class="step-num">03 — Enable</div>
        <h3>Ship the first AI feature</h3>
        <p>Weekly sprints with a demo at the end of each. The feature ships behind a flag with evals, guardrails and cost monitoring.</p>
      </li>
      <li class="step">
        <div class="step-num">04 — Scale</div>
        <h3>Measure and extend</h3>
        <p>Zero-downtime rollout, monitoring and a 30-day support window after launch. Then we extend what works to the next use case.</p>
      </li>
    </ol>
  </section>
</div>

<!-- WHY CHOOSE -->
<section class="section">
  <div class="eyebrow">Why DevZila</div>
  <h2 class="section-title">Rails depth first. AI on top.</h2>
  <p class="section-sub">Plenty of firms can call a model API. Very few can do it safely inside a ten-year-old Rails codebase. That intersection is where we work.</p>

  <div class="feature-grid">
    <div class="feature-card">
      <?= icon_badge('award') ?>
      <h3>20+ years of Rails</h3>
      <p>Deep Rails expertise, pioneering remote-first consulting and sharing knowledge through books, blogs and courses since the framework's inception.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('grid') ?>
      <h3>DDD pioneers</h3>
      <p>Domain-Driven Design pioneers in Ruby on Rails. Clear domain boundaries are also what make AI agents predictable.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('users') ?>
      <h3>Proven track record</h3>
      <p>Delivering open and closed workshops that have empowered dozens of developers to master Domain-Driven Design.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('check-circle', 'mint') ?>
      <h3>AI with engineering discipline</h3>
      <p>Every AI feature ships with tests, evaluations, cost budgets and a rollback path — the same standard as the rest of your code.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('user-check', 'mint') ?>
      <h3>Humans stay in the loop</h3>
      <p>AI speeds up our audits, test writing and upgrades. Senior engineers review every change before it reaches your main branch.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('briefcase', 'mint') ?>
      <h3>Business first</h3>
      <p>We start from the workflow and the metric, not the model. If a simple rule beats an LLM, we will tell you.</p>
    </div>
  </div>
  <p style="margin-top:1.75rem;"><a class="text-link" href="/why-devzila">More about how we work <?= icon('arrow-right') ?></a></p>
</section>

<!-- FAQ -->
<div class="band">
  <section class="section" id="faq">
    <div class="eyebrow">FAQ</div>
    <h2 class="section-title">Questions teams ask before they start</h2>
    <?= render_faq($pageFaqs) ?>
    <p style="margin-top:2.25rem;"><a class="text-link" href="/faq">Read the full FAQ <?= icon('arrow-right') ?></a></p>
  </section>
</div>

<!-- CTA -->
<div class="cta-banner" id="contact" style="margin-top:6rem;">
  <h2>Ready to make your Rails application AI-ready?</h2>
  <p>Tell us about your application and what you want AI to do for it. We reply within 24 hours.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Start a conversation <?= icon('arrow-right') ?></a>
    <a href="<?= e(SITE_BOOKING) ?>" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a 15-minute call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
