<?php
require_once __DIR__ . '/lib/site.php';

$pageTitle = 'AI Use Cases for Ruby on Rails Applications — DevZila';
$pageDescription = 'Practical AI use cases for Rails apps: copilots, semantic search and RAG, document processing, workflow agents, support automation — and how each is built.';
$pagePath = '/ai-use-cases';
$pageBreadcrumbs = [['Home', '/'], ['AI Use Cases']];
$pageSchemaType = 'CollectionPage';
$pageFaqs = [
    [
        'q' => 'What AI features can be added to a Ruby on Rails application?',
        'a' => 'The most common are in-app copilots and assistants, semantic search and question answering over your own data (RAG), document and data extraction, workflow agents that automate back-office tasks, support automation, natural-language reporting, and an MCP server that makes your product usable from AI assistants.',
    ],
    [
        'q' => 'What is the best first AI use case for a SaaS product?',
        'a' => 'One where the data already lives in your application, a person reviews the output, and success is easy to measure. Drafting replies, summarizing long records and extracting data from documents usually qualify. Fully autonomous actions are better as a second or third project.',
    ],
    [
        'q' => 'Do we need a lot of data to use AI?',
        'a' => 'Not for most of these use cases. Modern language models are already trained; what they need from you is context — the relevant records or documents at the moment of the request. A few hundred real examples are enough to build a meaningful evaluation suite.',
    ],
    [
        'q' => 'How do we know whether an AI feature is working?',
        'a' => 'By measuring a baseline before it ships and tracking the same metric after: handling time, resolution rate, error rate or conversion. Alongside that, an evaluation suite scores output quality on every change, and users can flag bad answers from the interface.',
    ],
];

$useCases = [
    [
        'id'    => 'copilots',
        'icon'  => 'message',
        'title' => 'In-app copilots and assistants',
        'meta'  => 'SaaS · B2B platforms · Internal tools',
        'body'  => 'An assistant inside your product that can answer questions about the user\'s own account and carry out tasks on request: "show overdue invoices for this customer", "draft a renewal email", "create a project from this brief".',
        'how'   => 'A chat panel streamed with Turbo Streams or React. The model receives tools that wrap your existing service objects, and every action runs under the current user\'s permissions.',
        'value' => 'Fewer clicks for expert users, faster onboarding for new ones, and a visible product differentiator.',
        'guard' => 'Scoped tools, confirmation before any change, full audit log of what the assistant did and why.',
    ],
    [
        'id'    => 'semantic-search',
        'icon'  => 'search',
        'title' => 'Semantic search and RAG knowledge assistants',
        'meta'  => 'Knowledge bases · Marketplaces · Document-heavy products',
        'body'  => 'Search that understands meaning, not just keywords, and a question-answering layer that responds in plain language with links to the records it used.',
        'how'   => 'Records are chunked and embedded in background jobs; vectors are stored with pgvector next to the source rows. Queries combine vector similarity with full-text search and your existing scopes.',
        'value' => 'Users find what they need on the first try. Support and operations teams stop answering the same questions.',
        'guard' => 'Permission-aware retrieval, cited sources, and "I do not know" when nothing relevant is found.',
    ],
    [
        'id'    => 'document-processing',
        'icon'  => 'file-text',
        'title' => 'Document processing and data extraction',
        'meta'  => 'Fintech · Insurance · Logistics · Legal',
        'body'  => 'Invoices, contracts, identity documents, purchase orders and emails turned into structured records without manual data entry.',
        'how'   => 'Uploads go through Active Storage into a job pipeline: text extraction, a model call that returns structured output, then validation against your Active Record models before anything is saved.',
        'value' => 'Hours of data entry removed, shorter turnaround and fewer keying errors.',
        'guard' => 'Schema validation, confidence thresholds, and a review queue for anything uncertain.',
    ],
    [
        'id'    => 'workflow-agents',
        'icon'  => 'bot',
        'title' => 'Workflow agents for back-office automation',
        'meta'  => 'Operations · Finance · Customer success',
        'body'  => 'Agents that handle multi-step routine work: triaging incoming requests, reconciling records, chasing missing information, preparing a case for a human decision.',
        'how'   => 'Each agent is a background job with a small set of tools and a clear stopping condition. State is stored in the database, so every run can be inspected and resumed.',
        'value' => 'Teams spend their time on exceptions and judgment calls instead of routine steps.',
        'guard' => 'Least-privilege tools, spending and step limits, human approval for irreversible actions.',
    ],
    [
        'id'    => 'support-automation',
        'icon'  => 'inbox',
        'title' => 'Customer support automation',
        'meta'  => 'SaaS · E-commerce · Marketplaces',
        'body'  => 'Suggested replies grounded in your help content and the customer\'s history, automatic summaries of long threads, and classification that routes each ticket to the right queue.',
        'how'   => 'Incoming messages trigger jobs that classify, retrieve relevant articles and account data, and draft a response for an agent to approve — inside your existing support screens.',
        'value' => 'Shorter response times and more consistent answers, with agents staying in control.',
        'guard' => 'Drafts, not auto-send, until quality is proven; tone and policy checks; easy feedback from agents.',
    ],
    [
        'id'    => 'reporting',
        'icon'  => 'bar-chart',
        'title' => 'Natural-language reporting',
        'meta'  => 'Analytics · Admin panels · Executive dashboards',
        'body'  => 'Let people ask questions of their data in plain language — "which plans churned most last quarter?" — and get a table, a chart and the query behind it.',
        'how'   => 'The model translates questions into queries against a curated, read-only set of views, never the raw schema. Results render with your existing reporting components.',
        'value' => 'Fewer ad-hoc report requests to engineering and faster decisions for everyone else.',
        'guard' => 'Read-only database role, tenant scoping enforced in the query layer, query review for expensive requests.',
    ],
    [
        'id'    => 'content',
        'icon'  => 'edit',
        'title' => 'Content generation and personalization',
        'meta'  => 'E-commerce · Marketplaces · Marketing platforms',
        'body'  => 'Product descriptions, listing summaries, outreach emails and notifications drafted in your brand voice and tailored to each recipient.',
        'how'   => 'Prompt templates are versioned in the codebase, filled from your records and run in batches through background jobs, with results stored for review and reuse.',
        'value' => 'Consistent content at a volume no team could write by hand.',
        'guard' => 'Brand and policy checks, human review for anything public, and clear labeling where required.',
    ],
    [
        'id'    => 'mcp',
        'icon'  => 'share',
        'title' => 'MCP server for your product',
        'meta'  => 'Developer tools · B2B SaaS · Platforms with an API',
        'body'  => 'Make your product usable from AI assistants. With a Model Context Protocol server, your customers can query and operate their account from the assistant they already use.',
        'how'   => 'An MCP endpoint in your Rails application exposes a curated set of resources and tools, authenticated with your existing OAuth or API tokens.',
        'value' => 'Your product shows up where your users increasingly work, without building another client.',
        'guard' => 'Per-token scopes, rate limits and the same authorization rules as your public API.',
    ],
    [
        'id'    => 'fintech',
        'icon'  => 'credit-card',
        'title' => 'AI for fintech operations',
        'meta'  => 'Payments · Lending · Accounting',
        'body'  => 'Transaction categorization, reconciliation suggestions, anomaly flags and document checks — in a domain where every decision must be explainable.',
        'how'   => 'Models propose; your ledger and domain rules decide. Suggestions are recorded as events alongside the reasoning and the data that supported them.',
        'value' => 'Faster month-end, earlier detection of problems and less manual matching.',
        'guard' => 'Deterministic rules for money movement, full audit trail, human sign-off on exceptions.',
    ],
];

$pageSchema = [[
    '@type'           => 'ItemList',
    '@id'             => site_url('/ai-use-cases') . '#use-cases',
    'name'            => 'AI use cases for Ruby on Rails applications',
    'itemListElement' => array_map(
        static fn (array $uc, int $i): array => [
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $uc['title'],
            'url'      => site_url('/ai-use-cases#' . $uc['id']),
        ],
        $useCases,
        array_keys($useCases)
    ),
]];
require __DIR__ . '/partials/header.php';
?>

<header class="page-hero is-ai">
  <?= render_breadcrumbs($pageBreadcrumbs) ?>
  <div class="eyebrow is-mint">AI Enablement</div>
  <h1>AI use cases for Ruby on Rails applications</h1>
  <p class="lede">Nine practical ways to put AI to work inside an existing Rails product — what each one does, how it is built in Rails, where it pays off and how to keep it safe.</p>
  <div class="header-actions">
    <a href="/ai-readiness-assessment" class="btn-primary">Find your first use case <?= icon('arrow-right') ?></a>
    <a href="#copilots" class="btn-ghost">Browse use cases</a>
  </div>
</header>

<section class="section section-sm">
  <div class="answer">
    <div class="answer-label">Good to know</div>
    <p>These are <strong>solution patterns</strong>: descriptions of what we design and build and how it works in a Rails codebase. They are not client case studies. The right first project for you depends on your data, your workflows and your appetite for risk — that is what the <a href="/ai-readiness-assessment">AI Readiness Assessment</a> determines.</p>
  </div>

  <ul class="glossary-index" aria-label="Use cases on this page">
    <?php foreach ($useCases as $uc): ?>
    <li><a href="#<?= e($uc['id']) ?>"><?= e($uc['title']) ?></a></li>
    <?php endforeach; ?>
  </ul>
</section>

<section class="section section-sm" style="padding-top:0;">
  <?php foreach ($useCases as $uc): ?>
  <article class="usecase" id="<?= e($uc['id']) ?>">
    <div>
      <?= icon_badge($uc['icon'], 'mint') ?>
      <h2 class="usecase-title"><?= e($uc['title']) ?></h2>
      <div class="usecase-meta"><?= e($uc['meta']) ?></div>
    </div>
    <div>
      <p><?= e($uc['body']) ?></p>
      <dl>
        <div>
          <dt>How it works in Rails</dt>
          <dd><?= e($uc['how']) ?></dd>
        </div>
        <div>
          <dt>Where it pays off</dt>
          <dd><?= e($uc['value']) ?></dd>
        </div>
        <div style="grid-column:1 / -1;">
          <dt>Guardrails</dt>
          <dd><?= e($uc['guard']) ?></dd>
        </div>
      </dl>
    </div>
  </article>
  <?php endforeach; ?>
</section>

<div class="band">
  <section class="section section-sm">
    <div class="eyebrow">Choosing</div>
    <h2 class="section-title">How to pick your first AI use case</h2>
    <p class="section-sub">The first project sets the tone for everything after it. Choose one that is likely to succeed and easy to measure.</p>
    <ul class="check-list">
      <li><strong>The data is already in your application.</strong> No new data collection before you can start.</li>
      <li><strong>A person reviews the output.</strong> Drafts and suggestions before autonomous actions.</li>
      <li><strong>Mistakes are cheap.</strong> Easy to spot and easy to undo.</li>
      <li><strong>There is a number to move.</strong> Handling time, turnaround, error rate or conversion.</li>
      <li><strong>The code involved is healthy.</strong> Tested and on a supported Rails version — or scheduled for <a href="/legacy-rails-modernization">modernization</a> first.</li>
    </ul>
  </section>
</div>

<section class="section section-sm" id="faq">
  <div class="eyebrow">FAQ</div>
  <h2 class="section-title">Questions about AI use cases</h2>
  <?= render_faq($pageFaqs) ?>
</section>

<section class="section section-sm">
  <div class="eyebrow">Next steps</div>
  <h2 class="section-title">From idea to production</h2>
  <div class="link-grid">
    <a class="link-card" href="/ai-readiness-assessment"><strong>AI Readiness Assessment <?= icon('arrow-right') ?></strong><span>Rank these use cases against your own application.</span></a>
    <a class="link-card" href="/ai-integration-automation"><strong>AI Integration &amp; Automation <?= icon('arrow-right') ?></strong><span>How we build and harden AI features in Rails.</span></a>
    <a class="link-card" href="/ai-glossary"><strong>AI Glossary for Rails Teams <?= icon('arrow-right') ?></strong><span>Plain-language definitions of the terms used here.</span></a>
  </div>
</section>

<div class="cta-banner">
  <h2>Which of these fits your product?</h2>
  <p>Tell us what your application does and where your team loses the most time. We will suggest where AI would help first.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Start a conversation <?= icon('arrow-right') ?></a>
    <a href="<?= e(SITE_BOOKING) ?>" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a 15-minute call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
