<?php
$pageTitle = 'FAQ: AI Enablement and Ruby on Rails Modernization — DevZila';
$pageDescription = 'Answers to common questions about adding AI to Ruby on Rails applications, legacy Rails modernization, and how DevZila works, charges and gets started.';
$pagePath = '/faq';
$pageBreadcrumbs = [['Home', '/'], ['FAQ']];

$faqGroups = [
    'About DevZila' => [
        [
            'q' => 'What is DevZila?',
            'a' => 'DevZila is an AI-first Ruby on Rails consultancy. We modernize legacy Rails applications and add AI capabilities to them — <a href="/ai-transformation-strategy">strategy</a>, <a href="/ai-integration-automation">integration and automation</a> — on top of senior Rails engineering.',
        ],
        [
            'q' => 'How is DevZila different from a general AI agency?',
            'a' => 'General AI agencies tend to build something new next to your system. We work inside the Rails application you already have — its data model, business rules and permissions — because that is where most of the value and most of the risk are.',
        ],
        [
            'q' => 'How is DevZila different from a traditional Rails agency?',
            'a' => 'We treat AI as a first-class part of Rails engineering. Every modernization we plan aims at an AI-ready codebase, AI features are built with the same testing discipline as any other code, and we use AI in our own delivery with senior engineers reviewing the result.',
        ],
        [
            'q' => 'Do you only take on AI projects?',
            'a' => 'No. <a href="/rails-development">Ruby on Rails development</a>, <a href="/rails-upgrades">upgrades</a>, performance work and <a href="/ddd-workshops">Domain-Driven Design workshops</a> remain our core. Many clients start with plain Rails work and add AI later.',
        ],
        [
            'q' => 'Which kinds of companies do you work with?',
            'a' => 'Companies whose business runs on a Ruby on Rails application: SaaS products, marketplaces, internal platforms. We have particular depth in complex, rule-heavy domains such as <a href="/fintech-solutions">fintech</a>, where Domain-Driven Design and event sourcing matter.',
        ],
    ],
    'AI enablement' => [
        [
            'q' => 'Is our Rails application too old for AI?',
            'a' => 'No. Age decides where we start, not whether it is possible. Some AI features can be added through a small, isolated integration even before an upgrade. Most benefit from bringing Ruby and Rails up to supported versions first, and an <a href="/ai-readiness-assessment">assessment</a> tells you which case you are in.',
        ],
        [
            'q' => 'Is Ruby on Rails a good choice for AI applications?',
            'a' => 'Yes. Most AI features in business software are about orchestrating calls to hosted models, managing data, running background work and presenting results — all things Rails is very good at. Training custom models is a different job, usually done in Python, and rarely needed for product features.',
        ],
        [
            'q' => 'Do you train custom AI models?',
            'a' => 'Rarely, because it is rarely necessary. Existing foundation models given the right context and tools cover the large majority of product use cases. We consider fine-tuning only when evaluation results show that prompting and retrieval are not enough.',
        ],
        [
            'q' => 'How do you measure the return on an AI feature?',
            'a' => 'We agree on one business metric before building — handling time, turnaround, error rate, conversion — and measure a baseline. After launch we track the same metric together with the running cost per outcome, so the decision to expand, adjust or stop is based on numbers.',
        ],
        [
            'q' => 'How do you handle data privacy and compliance?',
            'a' => 'We design for data minimization, redact personal data where possible, respect your permission model during retrieval, and choose providers, regions and retention settings to match your requirements, including self-hosted models. We are engineers rather than lawyers: we implement what your compliance team requires and document the data flows so their review is straightforward.',
        ],
        [
            'q' => 'Do you use AI coding tools on client projects?',
            'a' => 'Yes, where they help and where your policies allow it. They speed up code audits, test writing and repetitive upgrade work. A senior engineer reviews every change, and nothing is merged without passing your CI.',
        ],
    ],
    'Legacy Rails and upgrades' => [
        [
            'q' => 'Can you take over an application from another agency or a developer who has left?',
            'a' => 'Yes. We start with an audit to understand the codebase and its risks, stabilize what is fragile, and then take on regular delivery. See <a href="/legacy-rails-modernization">legacy Rails modernization</a>.',
        ],
        [
            'q' => 'Do we have to finish upgrading before adding AI features?',
            'a' => 'Not necessarily. Upgrades and AI work can run in parallel when the feature touches a stable part of the system. We sequence the roadmap so the first AI feature ships as early as it safely can.',
        ],
        [
            'q' => 'Do you work with React frontends as well as Hotwire?',
            'a' => 'Yes. Our <a href="/frontend-development">frontend work</a> covers both React and Hotwire, including migrations from React to Hotwire where a simpler architecture is the goal.',
        ],
    ],
    'Working with us' => [
        [
            'q' => 'How do you charge for your services?',
            'a' => 'Ongoing work is typically time and materials, billed monthly, with no long-term lock-in. The AI Readiness Assessment is a fixed-price engagement agreed up front.',
        ],
        [
            'q' => 'Can we start with something small?',
            'a' => 'Absolutely. Many long-term collaborations began with a small upgrade, a refactor or a code audit. The <a href="/ai-readiness-assessment">AI Readiness Assessment</a> was designed as a small first step for AI.',
        ],
        [
            'q' => 'Who will work on our project?',
            'a' => 'Experienced developers. Each project is handled by at least two of our senior engineers, so knowledge is never held by one person.',
        ],
        [
            'q' => 'Do you work alongside in-house teams?',
            'a' => 'Yes. On many projects we work with existing developers — contributing code, supporting architecture decisions and mentoring. We use your project management and communication tools rather than imposing ours.',
        ],
        [
            'q' => 'How quickly will we hear back after contacting you?',
            'a' => 'Within 24 hours. You can also <a href="https://calendly.com/nilayanand/15min" target="_blank" rel="noopener noreferrer">book a 15-minute call</a> directly.',
        ],
    ],
];

$pageFaqs = array_merge(...array_values($faqGroups));
require __DIR__ . '/partials/header.php';
?>

<header class="page-hero">
  <?= render_breadcrumbs($pageBreadcrumbs) ?>
  <div class="eyebrow">FAQ</div>
  <h1>Frequently asked questions</h1>
  <p class="lede">Straight answers about adding AI to Ruby on Rails applications, modernizing legacy codebases, and what it is like to work with DevZila.</p>
</header>

<?php foreach ($faqGroups as $group => $faqs): ?>
<section class="section section-sm" id="<?= e(slugify($group)) ?>">
  <h2 class="section-title"><?= e($group) ?></h2>
  <?= render_faq($faqs) ?>
</section>
<?php endforeach; ?>

<section class="section section-sm">
  <div class="eyebrow">More answers</div>
  <h2 class="section-title">Topic-specific questions</h2>
  <div class="link-grid">
    <a class="link-card" href="/ai-integration-automation#faq"><strong>AI integration FAQ <?= icon('arrow-right') ?></strong><span>RAG, model choice, costs, hallucinations and agents.</span></a>
    <a class="link-card" href="/ai-transformation-strategy#faq"><strong>AI strategy FAQ <?= icon('arrow-right') ?></strong><span>Scope, duration, data and vendor lock-in.</span></a>
    <a class="link-card" href="/legacy-rails-modernization#faq"><strong>Modernization FAQ <?= icon('arrow-right') ?></strong><span>Rewrite versus modernize, timelines and AI readiness.</span></a>
    <a class="link-card" href="/rails-upgrades#faq"><strong>Rails upgrades FAQ <?= icon('arrow-right') ?></strong><span>Upgrade paths, downtime and risk.</span></a>
    <a class="link-card" href="/why-devzila#faq"><strong>Collaboration FAQ <?= icon('arrow-right') ?></strong><span>How day-to-day work with us looks.</span></a>
    <a class="link-card" href="/ai-glossary"><strong>AI glossary <?= icon('arrow-right') ?></strong><span>Definitions of the terms used across this site.</span></a>
  </div>
</section>

<div class="cta-banner">
  <h2>Did not find your question?</h2>
  <p>Ask us directly. We reply within 24 hours.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Contact us <?= icon('arrow-right') ?></a>
    <a href="mailto:<?= e(SITE_EMAIL) ?>" class="btn-ghost"><?= e(SITE_EMAIL) ?></a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
