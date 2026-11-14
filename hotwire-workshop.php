<?php
$pageTitle = 'Hotwire Workshop: Turbo & Stimulus for Rails Teams — DevZila';
$pageDescription = 'Hands-on Hotwire workshop for Rails teams: Turbo Drive, Turbo Frames, Turbo Streams and Stimulus — plus streaming AI responses without a heavy SPA.';
$pagePath = '/hotwire-workshop';
$pageBreadcrumbs = [['Home', '/'], ['Workshops', '/#services'], ['Hotwire Workshop']];
$pageService = [
    'name'     => 'Hotwire Workshop',
    'type'     => 'Software engineering workshop',
    'audience' => 'Ruby on Rails development teams',
    'offers'   => [
        'Turbo Drive',
        'Turbo Frames',
        'Turbo Streams',
        'Stimulus',
        'Real-time updates',
        'React to Hotwire migration strategies',
    ],
];
$pageFaqs = [
    [
        'q' => 'What is Hotwire?',
        'a' => 'Hotwire is the default frontend approach in modern Ruby on Rails. It sends HTML instead of JSON over the wire: Turbo handles navigation, partial page updates and real-time streams, and Stimulus adds small amounts of JavaScript where needed. The result is a reactive interface without a separate single-page application.',
    ],
    [
        'q' => 'Do attendees need JavaScript experience?',
        'a' => 'Basic familiarity helps, but the workshop is aimed at Rails developers. Most of what you build uses server-rendered HTML, with small Stimulus controllers where interactivity needs it.',
    ],
    [
        'q' => 'Is Hotwire a good fit for AI features?',
        'a' => 'Yes. Turbo Streams can push a model\'s response to the page as it is generated, which gives you a streaming chat or copilot interface with very little custom JavaScript. We can cover this pattern in the workshop.',
    ],
    [
        'q' => 'Is the workshop remote or on-site?',
        'a' => 'Either. We run it with your team remotely or on-site.',
    ],
];
require __DIR__ . '/partials/header.php';
?>

<header class="page-hero">
  <?= render_breadcrumbs($pageBreadcrumbs) ?>
  <div class="eyebrow">Workshops &amp; Mentoring</div>
  <h1>Hotwire Workshop</h1>
  <p class="lede">Build fast, reactive Rails applications with Hotwire — Turbo and Stimulus — and minimal custom JavaScript. Learn how to deliver modern UX while keeping your frontend simple and maintainable.</p>
  <div class="header-actions">
    <a href="/hire-us" class="btn-primary">Book this workshop <?= icon('arrow-right') ?></a>
    <a href="#what" class="btn-ghost">What you'll learn</a>
  </div>
</header>

<section class="section section-sm" id="what">
  <div class="eyebrow">Curriculum</div>
  <h2 class="section-title">What you'll learn</h2>
  <p class="section-sub">From static pages to reactive interfaces, this hands-on workshop covers the full Hotwire toolset and how to apply it in real Rails apps.</p>
  <div class="feature-grid">
    <div class="feature-card">
      <?= icon_badge('zap') ?>
      <h3>Turbo Drive</h3>
      <p>Make full-page navigation feel instant without writing a single line of JavaScript.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('layout') ?>
      <h3>Turbo Frames</h3>
      <p>Update independent parts of a page seamlessly with scoped, lazy-loaded frames.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('radio') ?>
      <h3>Turbo Streams</h3>
      <p>Push real-time changes to the DOM over WebSockets for live, multi-user updates.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('sliders') ?>
      <h3>Stimulus</h3>
      <p>Add just enough JavaScript with a lightweight, organized controller framework.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('activity') ?>
      <h3>Real-time updates</h3>
      <p>Build notifications, live lists and collaborative features the Rails way.</p>
    </div>
    <div class="feature-card">
      <?= icon_badge('repeat') ?>
      <h3>React → Hotwire</h3>
      <p>Strategies for simplifying an SPA by moving suitable features to Hotwire.</p>
    </div>
  </div>
</section>

<div class="band">
  <section class="section section-sm" id="ai-interfaces">
    <div class="split">
      <div>
        <div class="eyebrow is-mint">Hotwire and AI</div>
        <h2 class="section-title">Streaming AI interfaces, the Rails way</h2>
        <p class="section-sub">A chat or copilot interface is a stream of HTML fragments arriving over time — exactly what Turbo Streams was built for. The workshop can include a module on building one.</p>
        <ul class="check-list">
          <li>Generate model responses in a background job.</li>
          <li>Broadcast each chunk to the page with Turbo Streams.</li>
          <li>Handle loading, errors and retries gracefully.</li>
          <li>Keep everything server-rendered, tested and simple.</li>
        </ul>
      </div>
      <div class="code-card" aria-label="Example: streaming a model response with Turbo Streams">
        <div class="code-card-bar"><i></i><i></i><i></i><span>app/jobs/stream_answer_job.rb</span></div>
<pre><span class="tok-k">class</span> StreamAnswerJob &lt; ApplicationJob
  <span class="tok-k">def</span> perform(message)
    LLM.stream(message.prompt) <span class="tok-k">do</span> |chunk|
      message.content &lt;&lt; chunk

      <span class="tok-c"># Push the new text to the browser</span>
      message.broadcast_update_to(
        message.conversation,
        <span class="tok-s">target:</span> <span class="tok-v">"message_#{message.id}"</span>,
        <span class="tok-s">html:</span> message.content
      )
    <span class="tok-k">end</span>

    message.save!
  <span class="tok-k">end</span>
<span class="tok-k">end</span></pre>
      </div>
    </div>
    <p class="form-note">Simplified for illustration. <code>LLM</code> stands for the application's own model gateway.</p>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">Audience</div>
  <h2 class="section-title">Who it's for</h2>
  <ul class="check-list">
    <li>Rails developers who want modern UX without a heavy SPA.</li>
    <li>Teams looking to reduce frontend complexity and maintenance cost.</li>
    <li>Anyone curious about migrating from React to Hotwire.</li>
    <li>Teams planning chat, copilot or other real-time AI interfaces.</li>
    <li>Hands-on exercises with mentor support throughout.</li>
  </ul>
</section>

<div class="band">
  <section class="section section-sm" id="faq">
    <div class="eyebrow">FAQ</div>
    <h2 class="section-title">Hotwire questions, answered</h2>
    <?= render_faq($pageFaqs) ?>
  </section>
</div>

<section class="section section-sm">
  <div class="eyebrow">Related</div>
  <h2 class="section-title">Keep exploring</h2>
  <div class="link-grid">
    <a class="link-card" href="/frontend-development"><strong>Frontend Development <?= icon('arrow-right') ?></strong><span>We can build it with you, too.</span></a>
    <a class="link-card" href="/ai-for-rails-workshop"><strong>AI for Rails Teams Workshop <?= icon('arrow-right') ?></strong><span>The backend side of AI features.</span></a>
    <a class="link-card" href="/code-mentoring"><strong>Code Mentoring <?= icon('arrow-right') ?></strong><span>Ongoing guidance after the workshop.</span></a>
  </div>
</section>

<div class="cta-banner">
  <h2>Make your Rails app reactive — the simple way</h2>
  <p>Run this Hotwire workshop with your team, remote or on-site.</p>
  <div class="cta-actions">
    <a href="/hire-us" class="btn-primary">Hire us <?= icon('arrow-right') ?></a>
    <a href="<?= e(SITE_BOOKING) ?>" target="_blank" rel="noopener noreferrer" class="btn-ghost">Book a call</a>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
