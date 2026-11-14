<?php
$pageTitle = 'AI Integration & Automation for Ruby on Rails Apps — DevZila';
$pageDescription = 'We integrate LLMs, RAG, AI agents and workflow automation into existing Ruby on Rails applications — tested, observable, cost-controlled and model-agnostic.';
$pagePath = '/ai-integration-automation';
$pageBreadcrumbs = [['Home', '/'], ['Services', '/#services'], ['AI Integration & Automation']];
$pageService = [
    'name'     => 'AI Integration & Automation',
    'type'     => 'AI integration and workflow automation for Ruby on Rails applications',
    'audience' => 'Engineering and product teams with an existing Ruby on Rails application',
    'offers'   => [
        'LLM integration for Ruby on Rails',
        'Retrieval-augmented generation (RAG) with pgvector',
        'AI agent and tool-calling development',
        'Model Context Protocol (MCP) server development',
        'AI document processing and data extraction',
        'AI workflow automation',
        'LLM evaluation, guardrails and observability',
    ],
];
$pageFaqs = [
    [
        'q' => 'How do you add AI to a Ruby on Rails application?',
        'a' => 'We pick one workflow, define how success is measured, and build the feature as ordinary Rails code: a service object that calls a language model, a background job for anything slow, and database tables for prompts, traces and embeddings. It ships behind a feature flag with an evaluation suite, then rolls out gradually.',
    ],
    [
        'q' => 'Do we need Python or a separate AI service?',
        'a' => 'Usually not. Rails can call model APIs directly, run long tasks in background jobs and store embeddings in PostgreSQL with pgvector. A separate Python service makes sense for custom model training or heavy data-science pipelines, and we will say so when that is the case.',
    ],
    [
        'q' => 'What is RAG and when do we need it?',
        'a' => 'Retrieval-augmented generation (RAG) means fetching relevant records or documents from your own data and giving them to the model along with the question. You need it whenever answers must be based on your content — help articles, contracts, tickets, product data — rather than on what the model learned in training.',
    ],
    [
        'q' => 'Which language model should we use?',
        'a' => 'It depends on the task. We compare candidates on your own examples for quality, latency, cost and privacy. Many products end up using more than one: a small, fast model for classification and a stronger model for reasoning or drafting. The gateway we build makes that a configuration choice.',
    ],
    [
        'q' => 'How do you keep LLM costs under control?',
        'a' => 'By measuring them from the first day. Every call is logged with its token usage and cost. We set budgets per feature and per customer, cache repeated work, trim prompts, and route simple tasks to cheaper models. You see cost per outcome, not a surprise invoice.',
    ],
    [
        'q' => 'How do you deal with hallucinations?',
        'a' => 'We reduce them by grounding answers in retrieved data, asking for structured output that is validated before use, and showing sources to the user. We detect them with evaluation suites built from real examples. And for decisions that matter, a person approves the result before anything changes.',
    ],
    [
        'q' => 'Can AI agents take actions in our application safely?',
        'a' => 'Yes, when their tools are your existing service objects. An agent then goes through the same validations and authorization checks as a user would. We give each agent the minimum set of tools, require approval for destructive or financial actions, and log every step.',
    ],
    [
        'q' => 'What is an MCP server and should our product have one?',
        'a' => 'Model Context Protocol (MCP) is an open standard that lets AI assistants connect to external systems. An MCP server for your Rails application lets your customers use your product from assistants such as Claude or ChatGPT. It is worth considering if your users already work inside those tools.',
    ],
];
require __DIR__ . '/partials/header.php';
?>

<header class="page-hero is-ai">
  <?= render_breadcrumbs($pageBreadcrumbs) ?>
  <div class="eyebrow is-mint">AI Enablement</div>
  <h1>AI Integration &amp; Automation for Rails applications</h1>
  <p class="lede">We build LLM-powered features and automated workflows directly into your existing Ruby on Rails application. No parallel platform, no rewrite — just well-tested Rails code that happens to be intelligent.</p>
  <div class="header-actions">
    <a href="/hire-us" class="btn-primary">Plan an AI pilot <?= icon('arrow-right') ?></a>
    <a href="#what" class="btn-ghost">What we integrate</a>
  </div>
</header>

<section class="section section-sm">
  <div class="answer">
    <div class="answer-label">In short</div>
    <h2>What are AI integration and AI automation?</h2>
    <p><strong>AI integration</strong> is the engineering work of connecting language models to an application's data, business logic and user interface. <strong>AI automation</strong> uses those integrations to run multi-step workflows with little or no manual effort. In a Rails application, both live in ordinary service objects, background jobs and database tables.</p>
  </div>
</section>

<section class="section section-sm" id="what">
  <div class="eyebrow">What we integrate</div>
  <h2 class="section-title">From a single smart feature to autonomous workflows</h2>
  <div class="feature-grid">
    <div class="feature-card">
      <?= icon_badge('message', 'mint') ?>
      <h3>LLM features and copilots</h3>
      <p>Drafting, summarizing, classifying and question answering inside the screens your users already work in.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('search', 'mint') ?>
      <h3>RAG and semantic search</h3>
      <p>Embeddings stored with pgvector in your PostgreSQL database, hybrid search and answers that cite their sources.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('bot', 'mint') ?>
      <h3>AI agents and tool calling</h3>
      <p>Agents that plan and act through your existing service objects, with scoped permissions and approval steps.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('share', 'mint') ?>
      <h3>MCP servers</h3>
      <p>Expose your Rails application to AI assistants through the Model Context Protocol, so customers can use it from Claude or ChatGPT.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('file-text', 'mint') ?>
      <h3>Document processing</h3>
      <p>Extract structured, validated data from PDFs, scans and emails, and write it straight into your models.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('workflow', 'mint') ?>
      <h3>Workflow automation</h3>
      <p>Triage, routing, enrichment and follow-ups as background jobs, or orchestrated with n8n, Zapier and Make.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('radio', 'mint') ?>
      <h3>Streaming interfaces</h3>
      <p>Chat and assistant experiences that stream token by token using Turbo Streams or React.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('bar-chart', 'mint') ?>
      <h3>Evals and observability</h3>
      <p>Evaluation suites that run in CI, plus tracing of every model call: prompt, model, tokens, latency and outcome.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('shield', 'mint') ?>
      <h3>Guardrails and cost control</h3>
      <p>Prompt-injection defenses, PII redaction, output validation, rate limits and per-feature budgets.</p>
    </div>
  </div>
</section>

<div class="band">
  <section class="section section-sm">
    <div class="eyebrow is-mint">Reference architecture</div>
    <h2 class="section-title">An AI layer inside your Rails application</h2>
    <p class="section-sub">We do not build a separate AI platform next to your product. The AI layer is a thin, well-defined part of the monolith, sitting between your interface and the domain logic you already trust.</p>

    <figure class="arch">
      <div class="arch-layer">
        <div class="arch-label"><strong>Experience</strong><span>What users see</span></div>
        <ul class="arch-nodes">
          <li>In-app copilot</li><li>Streaming chat</li><li>Semantic search</li><li>Smart forms</li><li>Admin automations</li>
        </ul>
      </div>
      <div class="arch-layer is-ai">
        <div class="arch-label"><strong>AI layer</strong><span>What we add</span></div>
        <ul class="arch-nodes">
          <li>LLM gateway</li><li>Prompt registry</li><li>Retrieval (RAG)</li><li>Tools and agents</li><li>MCP server</li><li>Guardrails</li><li>Evals and tracing</li>
        </ul>
      </div>
      <div class="arch-layer is-core">
        <div class="arch-label"><strong>Rails core</strong><span>What you already have</span></div>
        <ul class="arch-nodes">
          <li>Models and business rules</li><li>Service objects</li><li>Background jobs</li><li>Authorization</li><li>Domain events</li>
        </ul>
      </div>
      <div class="arch-layer">
        <div class="arch-label"><strong>Data and providers</strong><span>Where it runs</span></div>
        <ul class="arch-nodes">
          <li>PostgreSQL + pgvector</li><li>Redis</li><li>Object storage</li><li>Claude</li><li>GPT</li><li>Gemini</li><li>Open-weight models</li>
        </ul>
      </div>
      <figcaption>Reference architecture for AI integration in a Ruby on Rails monolith. The AI layer calls into existing service objects, so models act under the same validations and permissions as users.</figcaption>
    </figure>
  </section>
</div>

<section class="section section-sm">
  <div class="split">
    <div>
      <div class="eyebrow">In your codebase</div>
      <h2 class="section-title">It looks like Rails, because it is</h2>
      <ul class="icon-rows" style="margin-top:1.75rem;">
        <li class="icon-row">
          <?= icon_badge('code') ?>
          <div>
            <h3>Plain Ruby objects</h3>
            <p>AI features are service objects and jobs your team can read, test and change. No framework lock-in.</p>
          </div>
        </li>
        <li class="icon-row">
          <?= icon_badge('lock') ?>
          <div>
            <h3>Permission-aware retrieval</h3>
            <p>Retrieval runs through your existing scopes, so a model never sees a record the current user could not open.</p>
          </div>
        </li>
        <li class="icon-row">
          <?= icon_badge('clock') ?>
          <div>
            <h3>Async by default</h3>
            <p>Slow model calls run in Sidekiq or Solid Queue with retries, timeouts and provider fallback.</p>
          </div>
        </li>
        <li class="icon-row">
          <?= icon_badge('check-circle') ?>
          <div>
            <h3>Tested like everything else</h3>
            <p>Unit tests with recorded responses, plus evaluation suites that score real outputs on every change.</p>
          </div>
        </li>
      </ul>
    </div>
    <div>
      <div class="code-card">
        <div class="code-card-bar"><i></i><i></i><i></i><span>app/services/support/answer_question.rb</span></div>
<pre><span class="tok-k">class</span> Support::AnswerQuestion
  <span class="tok-k">def</span> call(question, user:)
    <span class="tok-c"># 1. Retrieve: only records this user may see</span>
    sources = Article.visible_to(user)
      .nearest_neighbors(<span class="tok-s">:embedding</span>, embed(question),
                         <span class="tok-s">distance:</span> <span class="tok-v">"cosine"</span>)
      .first(<span class="tok-v">5</span>)

    <span class="tok-c"># 2. Generate: grounded in those sources</span>
    answer = <span class="tok-a">LLM</span>.chat(<span class="tok-s">task:</span> <span class="tok-s">:support_answer</span>)
      .ask(prompt_for(question, sources))

    <span class="tok-c"># 3. Record: every call is traced and scored</span>
    <span class="tok-a">AiTrace</span>.record!(user:, question:, sources:, answer:)
    answer
  <span class="tok-k">end</span>
<span class="tok-k">end</span></pre>
      </div>
      <p class="ladder-caption">Simplified example. <code>LLM</code> is a thin gateway in your application that wraps the provider SDKs; <code>nearest_neighbors</code> comes from the neighbor gem, which adds pgvector support to Active Record.</p>
    </div>
  </div>
</section>

<div class="band">
  <section class="section section-sm">
    <div class="eyebrow is-mint">Production readiness</div>
    <h2 class="section-title">What separates a demo from a feature you can rely on</h2>
    <p class="section-sub">A prototype that answers correctly most of the time is easy. These are the concerns we design for before anything reaches your users.</p>
    <div class="table-wrap">
      <table class="compare">
        <thead>
          <tr><th scope="col">Concern</th><th scope="col">How we handle it</th></tr>
        </thead>
        <tbody>
          <tr><th scope="row">Answer quality</th><td>Evaluation suites built from real examples, run in CI and tracked over time against a baseline.</td></tr>
          <tr><th scope="row">Hallucinations</th><td>Grounding in retrieved data, source citations, validated structured output and a human fallback path.</td></tr>
          <tr><th scope="row">Security</th><td>Prompt-injection defenses, least-privilege tools, escaped output and approval steps for sensitive actions.</td></tr>
          <tr><th scope="row">Privacy</th><td>Data minimization, PII redaction before prompts, and provider settings chosen to match your retention requirements.</td></tr>
          <tr><th scope="row">Cost</th><td>Token budgets per feature, caching, prompt trimming and routing simple tasks to smaller models.</td></tr>
          <tr><th scope="row">Latency</th><td>Streaming responses, background jobs for long work and the fastest model that meets the quality bar.</td></tr>
          <tr><th scope="row">Reliability</th><td>Timeouts, retries, idempotent jobs and automatic fallback to a second provider.</td></tr>
          <tr><th scope="row">Observability</th><td>A trace for every call: prompt version, model, tokens, latency, cost and user feedback.</td></tr>
        </tbody>
      </table>
    </div>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">Process</div>
  <h2 class="section-title">How an AI pilot runs</h2>
  <ol class="steps cols-5">
    <li class="step">
      <div class="step-num">01</div>
      <h3>Frame</h3>
      <p>One workflow, one success metric, and a baseline measured before we change anything.</p>
    </li>
    <li class="step">
      <div class="step-num">02</div>
      <h3>Prototype</h3>
      <p>A working version on your real data, so quality is judged on facts, not a demo script.</p>
    </li>
    <li class="step">
      <div class="step-num">03</div>
      <h3>Harden</h3>
      <p>Evals, guardrails, error handling, cost limits and monitoring.</p>
    </li>
    <li class="step">
      <div class="step-num">04</div>
      <h3>Ship</h3>
      <p>Release behind a feature flag to a small group, then widen.</p>
    </li>
    <li class="step">
      <div class="step-num">05</div>
      <h3>Measure</h3>
      <p>Compare against the baseline and decide together what comes next.</p>
    </li>
  </ol>
</section>

<div class="band">
  <section class="section section-sm" id="faq">
    <div class="eyebrow">FAQ</div>
    <h2 class="section-title">AI integration questions, answered</h2>
    <?= render_faq($pageFaqs) ?>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">Related services</div>
  <h2 class="section-title">Keep exploring</h2>
  <div class="link-grid">
    <a class="link-card" href="/ai-use-cases"><strong>AI Use Cases for Rails <?= icon('arrow-right') ?></strong><span>Concrete patterns and how each one is built.</span></a>
    <a class="link-card" href="/ai-transformation-strategy"><strong>AI Transformation &amp; Strategy <?= icon('arrow-right') ?></strong><span>Decide what to build first, and why.</span></a>
    <a class="link-card" href="/legacy-rails-modernization"><strong>Legacy Rails Modernization <?= icon('arrow-right') ?></strong><span>Get an older codebase ready for AI features.</span></a>
  </div>
</section>

<div class="cta-banner">
  <h2>Have a workflow in mind?</h2>
  <p>Describe it in a few sentences. We will tell you how we would build it into your Rails application and what it would take.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Start a conversation <?= icon('arrow-right') ?></a>
    <a href="<?= e(SITE_BOOKING) ?>" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a 15-minute call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
