<?php
require_once __DIR__ . '/lib/site.php';

$pageTitle = 'AI Glossary for Ruby on Rails Teams — DevZila';
$pageDescription = 'Plain-language definitions of AI and modernization terms for Rails teams: LLM, RAG, embeddings, pgvector, AI agents, MCP, evals, guardrails, dual booting and more.';
$pagePath = '/ai-glossary';
$pageBreadcrumbs = [['Home', '/'], ['AI Glossary']];

/**
 * Each term: [anchor id, term, definition, optional "in a Rails app" note].
 * Definitions are plain text; notes may contain simple inline HTML.
 */
$glossary = [
    'Strategy' => [
        ['ai-enablement', 'AI enablement',
            'The work of making a company and its software able to use AI productively: choosing use cases with measurable value, preparing data, integrating models into existing workflows, adding guardrails and training the team that will own the result.',
            'It usually means adding an AI layer to the existing monolith rather than building a separate system. See <a href="/ai-integration-automation">AI integration and automation</a>.'],
        ['ai-transformation', 'AI transformation',
            'A sustained, organization-wide change in how products are built and operations run, driven by AI. Enablement is how it starts; transformation is the cumulative result of many successful use cases.',
            'See <a href="/ai-transformation-strategy">AI transformation and strategy</a>.'],
        ['ai-readiness', 'AI readiness',
            'How prepared an application, its data and its team are to adopt AI. It is typically assessed across codebase, data, architecture, infrastructure, security and team.',
            'Outdated Ruby and Rails versions and missing tests are the most common blockers. See the <a href="/ai-readiness-assessment">AI Readiness Assessment</a>.'],
        ['ai-native', 'AI-native',
            'A product or company in which AI is part of the core workflow rather than an add-on feature, and which improves continuously from real usage.',
            null],
    ],
    'Models' => [
        ['llm', 'Large language model (LLM)',
            'A neural network trained on large amounts of text that can generate and transform language. Applications use LLMs through an API to draft, summarize, classify, extract and reason over text.',
            'Models are called from service objects or background jobs, through a provider SDK or a Ruby library such as RubyLLM, ruby-openai or langchainrb.'],
        ['token', 'Token',
            'The unit of text a language model reads and writes — roughly a short word or a piece of a longer one. Model usage is both priced and limited in tokens.',
            null],
        ['context-window', 'Context window',
            'The maximum amount of text, measured in tokens, that a model can consider in a single request. It includes the instructions, any retrieved data and the conversation so far.',
            null],
        ['prompt', 'Prompt',
            'The instructions and data sent to a model for one request. Prompt quality has a large effect on output quality.',
            'Treat prompts as code: keep them in the repository, version them, review changes and cover them with evals.'],
        ['structured-output', 'Structured output',
            'A model response constrained to a defined schema, usually JSON, so that software can consume it reliably instead of parsing free text.',
            'Validate the result with your normal model validations before saving anything.'],
        ['streaming', 'Streaming',
            'Sending a model response to the user piece by piece as it is generated, instead of waiting for the full answer. It makes AI features feel much faster.',
            'Turbo Streams over Action Cable handles this without a separate frontend framework.'],
        ['open-weight-model', 'Open-weight model',
            'A model whose trained weights are published, so it can be run on your own infrastructure. Used when data must not leave your environment or to control cost at high volume.',
            null],
        ['fine-tuning', 'Fine-tuning',
            'Further training an existing model on your own examples to specialize its behaviour. It is usually considered only after better prompts and retrieval have been tried.',
            null],
    ],
    'Retrieval' => [
        ['embedding', 'Embedding',
            'A list of numbers (a vector) that represents the meaning of a piece of text, so that texts with similar meaning end up close together. Embeddings are the basis of semantic search and RAG.',
            'Embeddings are generated in background jobs and stored in a vector column on the record they describe.'],
        ['vector-database', 'Vector database',
            'A database that stores embeddings and quickly finds the ones nearest to a query vector.',
            'PostgreSQL with pgvector is usually enough, which avoids running and syncing a separate system.'],
        ['pgvector', 'pgvector',
            'An open-source PostgreSQL extension that adds a vector column type and similarity search, turning an existing Postgres database into a vector database.',
            'With the neighbor gem, Active Record models can run nearest-neighbor queries and combine them with ordinary scopes.'],
        ['rag', 'Retrieval-augmented generation (RAG)',
            'A technique in which relevant documents or records are retrieved from your own data and supplied to the model together with the question, so the answer is grounded in that data rather than only in what the model learned during training.',
            'Retrieval should run through your existing authorization scopes so users only get answers from records they are allowed to see.'],
        ['chunking', 'Chunking',
            'Splitting long documents into smaller passages before embedding them, so retrieval can return the precise part that answers a question.',
            null],
        ['semantic-search', 'Semantic search',
            'Search by meaning rather than exact keywords, using embeddings. A query for "cancel my plan" can find an article titled "Ending your subscription".',
            null],
        ['hybrid-search', 'Hybrid search',
            'Combining semantic (vector) search with traditional keyword search and merging the results. It handles both vague questions and exact terms such as product codes.',
            'PostgreSQL full-text search and pgvector can be combined in a single query.'],
    ],
    'Agents and automation' => [
        ['ai-agent', 'AI agent',
            'A system in which a language model decides which steps to take and which tools to call, in a loop, to accomplish a goal.',
            'An agent run is a background job with a clear stopping condition. Its tools are your existing service objects.'],
        ['tool-calling', 'Tool calling (function calling)',
            'A model capability in which the model asks the application to run a named function with specific arguments, then uses the result to continue. It is how models take actions and fetch live data.',
            null],
        ['mcp', 'Model Context Protocol (MCP)',
            'An open standard for connecting AI assistants to external tools and data. An MCP server exposes tools and resources; MCP clients such as AI assistants and code editors can then use them.',
            'A Rails application can expose an MCP server alongside its regular API, so customers can use the product from their AI assistant.'],
        ['ai-automation', 'AI automation',
            'Running multi-step business processes with little or no manual effort, including steps that used to need human judgment such as classifying, extracting or drafting.',
            null],
        ['human-in-the-loop', 'Human-in-the-loop',
            'A design in which a person reviews or approves AI output before it takes effect. It is the standard safeguard for decisions that are costly or hard to undo.',
            null],
    ],
    'Quality and safety' => [
        ['evals', 'Evals (evaluations)',
            'Automated tests that score the quality of AI output against a set of examples. Evals are to AI features what a test suite is to regular code.',
            'Evals run in CI next to your RSpec or Minitest suite, so a prompt or model change cannot silently lower quality.'],
        ['guardrails', 'Guardrails',
            'Checks around a model that constrain what goes in and what comes out: input validation, permission checks, output validation, content filters, and rate and cost limits.',
            null],
        ['hallucination', 'Hallucination',
            'Model output that is fluent and confident but false or unsupported by the available data. It is reduced with retrieval, validation and citations, and caught with evals and human review.',
            null],
        ['prompt-injection', 'Prompt injection',
            'An attack in which text the model reads — a user message, a web page, an uploaded document — contains instructions that hijack its behaviour. Defenses include least-privilege tools, separating instructions from data, and approval for sensitive actions.',
            null],
        ['llm-observability', 'LLM observability',
            'Recording every model call — prompt version, model, tokens, latency, cost and outcome — so that quality and spend can be monitored and problems debugged.',
            null],
    ],
    'Modernization' => [
        ['legacy-application', 'Legacy application',
            'A system that is still valuable to the business but has become costly or risky to change, typically because of outdated versions, missing tests and accumulated technical debt.',
            null],
        ['legacy-modernization', 'Legacy modernization',
            'The incremental process of bringing an aging application up to current standards — supported versions, reliable tests, clear architecture — without stopping feature delivery or rewriting it from scratch.',
            'See <a href="/legacy-rails-modernization">legacy Rails modernization</a>.'],
        ['technical-debt', 'Technical debt',
            'The accumulated cost of earlier shortcuts and outdated decisions in a codebase, paid as slower and riskier changes later.',
            null],
        ['dual-booting', 'Dual booting',
            'Running the same application against two versions of a framework from one codebase, so an upgrade can be worked on incrementally while production stays on the current version.',
            'It is the standard technique for low-risk <a href="/rails-upgrades">Rails upgrades</a>.'],
        ['strangler-fig', 'Strangler fig pattern',
            'Replacing a legacy system gradually by building new functionality around it and moving behaviour to the new code piece by piece, until the old part can be removed.',
            null],
        ['characterization-test', 'Characterization test',
            'A test that records what existing code actually does today, rather than what it should do. It makes refactoring untested legacy code safe.',
            null],
        ['ddd', 'Domain-Driven Design (DDD)',
            'An approach to software design that models code around the business domain, using a shared language between developers and domain experts and explicit boundaries called bounded contexts.',
            'Clear bounded contexts also give AI agents a well-defined, safe set of operations to work with. See <a href="/ddd-workshops">DDD workshops</a>.'],
        ['event-sourcing', 'Event sourcing',
            'Storing the state of a system as an append-only sequence of events instead of only the current values. It provides a complete audit trail of what happened and why.',
            'An event log is valuable context for AI and makes AI-assisted decisions traceable.'],
    ],
];

$termNodes = [];
foreach ($glossary as $terms) {
    foreach ($terms as [$id, $term, $definition]) {
        $termNodes[] = [
            '@type'            => 'DefinedTerm',
            '@id'              => site_url('/ai-glossary#' . $id),
            'name'             => $term,
            'description'      => $definition,
            'url'              => site_url('/ai-glossary#' . $id),
            'inDefinedTermSet' => ['@id' => site_url('/ai-glossary#glossary')],
        ];
    }
}
$pageSchema = [[
    '@type'          => 'DefinedTermSet',
    '@id'            => site_url('/ai-glossary#glossary'),
    'name'           => 'AI Glossary for Ruby on Rails Teams',
    'description'    => $pageDescription,
    'url'            => site_url('/ai-glossary'),
    'publisher'      => ['@id' => site_url('/#organization')],
    'hasDefinedTerm' => $termNodes,
]];

require __DIR__ . '/partials/header.php';
?>

<header class="page-hero is-ai">
  <?= render_breadcrumbs($pageBreadcrumbs) ?>
  <div class="eyebrow is-mint">Reference</div>
  <h1>AI glossary for Ruby on Rails teams</h1>
  <p class="lede">The vocabulary of AI enablement and legacy modernization, defined in plain language — with a note on what each term means inside a Rails application.</p>
</header>

<section class="section section-sm">
  <?php foreach ($glossary as $group => $terms): ?>
  <h2 class="glossary-group" id="<?= e(slugify($group)) ?>"><?= e($group) ?></h2>
  <dl class="glossary">
    <?php foreach ($terms as [$id, $term, $definition, $railsNote]): ?>
    <div class="term" id="<?= e($id) ?>">
      <dt><?= e($term) ?></dt>
      <dd><?= e($definition) ?></dd>
      <?php if ($railsNote): ?>
      <dd class="in-rails"><b>In a Rails app:</b> <?= $railsNote ?></dd>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </dl>
  <?php endforeach; ?>
</section>

<section class="section section-sm">
  <div class="eyebrow">Put it to work</div>
  <h2 class="section-title">From vocabulary to a working feature</h2>
  <div class="link-grid">
    <a class="link-card" href="/ai-use-cases"><strong>AI Use Cases for Rails <?= icon('arrow-right') ?></strong><span>See these concepts applied to real product features.</span></a>
    <a class="link-card" href="/ai-integration-automation"><strong>AI Integration &amp; Automation <?= icon('arrow-right') ?></strong><span>How we build AI features into Rails applications.</span></a>
    <a class="link-card" href="/faq"><strong>Frequently asked questions <?= icon('arrow-right') ?></strong><span>Answers about AI, Rails and working with DevZila.</span></a>
  </div>
</section>

<div class="cta-banner">
  <h2>Prefer a conversation to a glossary?</h2>
  <p>Tell us about your Rails application and we will explain, in plain language, what AI could do for it.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Talk to us <?= icon('arrow-right') ?></a>
    <a href="<?= e(SITE_BOOKING) ?>" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a 15-minute call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
