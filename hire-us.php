<?php
require_once __DIR__ . '/lib/site.php';

/** Topics a visitor can pre-select, e.g. /hire-us?interest=ai-readiness-assessment */
$interests = [
    'ai-readiness-assessment' => 'AI Readiness Assessment',
    'ai-strategy'             => 'AI Transformation & Strategy',
    'ai-integration'          => 'AI Integration & Automation',
    'rails-modernization'     => 'Legacy Rails Modernization / Upgrade',
    'rails-development'       => 'Ruby on Rails Development',
    'workshop'                => 'Workshop or Mentoring',
    'other'                   => 'Something else',
];
$selectedInterest = isset($_GET['interest']) ? (string) $_GET['interest'] : '';
if (!isset($interests[$selectedInterest])) {
    $selectedInterest = '';
}

$pageTitle = 'Hire DevZila — AI Enablement & Ruby on Rails Experts';
$pageDescription = 'Tell us about your Rails application and your AI or modernization goals. We reply within 24 hours with a brief and an estimate. Or book a 15-minute call.';
$pagePath = '/hire-us';
$pageSchemaType = 'ContactPage';
$pageBreadcrumbs = [['Home', '/'], ['Hire Us']];
require __DIR__ . '/partials/header.php';
?>

<header class="page-hero">
  <?= render_breadcrumbs($pageBreadcrumbs) ?>
  <div class="eyebrow">Hire Us</div>
  <h1>We're ready to help you</h1>
  <p class="lede">Every cooperation starts with a conversation. Let's talk about your Rails application, your goals and how AI and modernization can bring value to your business.</p>
</header>

<div class="hireus-wrap">
  <section class="card" aria-labelledby="form-title">
    <h2 id="form-title">Tell us about your project</h2>
    <p class="card-sub">Fill out the form below and we'll get back to you within 24 hours.</p>

    <div id="formStatus" class="form-status" role="status" aria-live="polite"></div>

    <form id="hireForm" action="/submit-hire" method="post" novalidate>
      <!-- honeypot anti-spam field -->
      <div class="hp-field" aria-hidden="true">
        <label>Leave this field empty
          <input type="text" name="website" tabindex="-1" autocomplete="off">
        </label>
      </div>

      <div class="form-group">
        <label for="name">Your name <span class="req">*</span></label>
        <input type="text" id="name" name="name" placeholder="Jane Doe" autocomplete="name" required>
      </div>

      <div class="form-group">
        <label for="email">Your email <span class="req">*</span></label>
        <input type="email" id="email" name="email" placeholder="jane@company.com" autocomplete="email" required>
      </div>

      <div class="form-group">
        <label for="phone">Your phone number</label>
        <input type="tel" id="phone" name="phone" placeholder="+1 555 123 4567" autocomplete="tel">
      </div>

      <div class="form-group">
        <label for="interest">What can we help with?</label>
        <select id="interest" name="interest">
          <option value="">Select a topic (optional)</option>
          <?php foreach ($interests as $key => $label): ?>
          <option value="<?= e($label) ?>"<?= $key === $selectedInterest ? ' selected' : '' ?>><?= e($label) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-group">
        <label for="message">Tell us what you need – we're listening! <span class="req">*</span></label>
        <textarea id="message" name="message" placeholder="Describe your application, its Ruby and Rails versions if you know them, and what you'd like to achieve…" required></textarea>
      </div>

      <div class="form-group">
        <label for="budget">Do you have a budget in mind?</label>
        <select id="budget" name="budget">
          <option value="">Select a range (optional)</option>
          <option value="< $10k">Less than $10k</option>
          <option value="$10k – $25k">$10k – $25k</option>
          <option value="$25k – $50k">$25k – $50k</option>
          <option value="$50k – $100k">$50k – $100k</option>
          <option value="$100k+">$100k+</option>
          <option value="Not sure yet">Not sure yet</option>
        </select>
      </div>

      <div class="form-group">
        <label for="source">How did you hear about DevZila?</label>
        <select id="source" name="source">
          <option value="">Select an option (optional)</option>
          <option value="Google / Search">Google / Search</option>
          <option value="AI assistant (ChatGPT, Claude, Perplexity…)">AI assistant (ChatGPT, Claude, Perplexity…)</option>
          <option value="LinkedIn">LinkedIn</option>
          <option value="Referral">Referral</option>
          <option value="Blog / Article">Blog / Article</option>
          <option value="GitHub">GitHub</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <button type="submit" class="btn-primary" id="submitBtn">Send your request <?= icon('arrow-right') ?></button>
      <p class="form-note">This site is protected against spam. By submitting, you agree to be contacted about your enquiry.</p>
    </form>
  </section>

  <div class="aside-stack">
    <aside class="card aside-card">
      <h3>Book a meeting with us</h3>
      <p>If you're interested in cooperating with us, feel free to schedule a call with our team.</p>
      <p>You can ask any questions regarding our skills, practices, experience, techniques, availability and financial aspects.</p>
      <a href="<?= e(SITE_BOOKING) ?>" target="_blank" rel="noopener noreferrer" class="btn-primary">Schedule a meeting <?= icon('arrow-right') ?></a>
      <div class="rate">
        <strong>DevZila hourly rate is competitive and project-based.</strong><br>
        Each project is handled by at least two of our senior developers.
      </div>
    </aside>

    <aside class="card aside-card">
      <h3>What happens next</h3>
      <ul class="dot-list">
        <li>We reply within 24 hours.</li>
        <li>A short call to understand your application and goals.</li>
        <li>You receive a brief and an estimate.</li>
        <li>We start with a small, well-defined first step.</li>
      </ul>
      <p>Prefer email? Write to <a class="text-link" href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a>.</p>
    </aside>

    <aside class="card aside-card">
      <h3>Not sure where to start?</h3>
      <p>The AI Readiness Assessment is a fixed-scope review of one Rails application that ends with a scorecard and a prioritized roadmap.</p>
      <a class="text-link is-mint" href="/ai-readiness-assessment">See what's included <?= icon('arrow-right') ?></a>
    </aside>
  </div>
</div>

<script>
(function () {
  const form = document.getElementById('hireForm');
  const statusEl = document.getElementById('formStatus');
  const submitBtn = document.getElementById('submitBtn');

  function showStatus(type, msg) {
    statusEl.className = 'form-status ' + type;
    statusEl.textContent = msg;
    statusEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
  }

  form.addEventListener('submit', async function (e) {
    e.preventDefault();
    statusEl.className = 'form-status';

    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    submitBtn.disabled = true;
    const originalLabel = submitBtn.innerHTML;
    submitBtn.textContent = 'Sending…';

    try {
      const res = await fetch(form.action, {
        method: 'POST',
        headers: { 'Accept': 'application/json' },
        body: new FormData(form),
      });
      const data = await res.json().catch(() => ({}));

      if (res.ok && data.success) {
        showStatus('success', data.message || "Thanks! Your request has been received. We'll be in touch within 24 hours.");
        form.reset();
      } else {
        showStatus('error', data.message || 'Something went wrong. Please try again or email hello@devzila.com.');
      }
    } catch (err) {
      showStatus('error', 'Network error. Please try again or email hello@devzila.com.');
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerHTML = originalLabel;
    }
  });
})();
</script>

<?php require __DIR__ . '/partials/footer.php'; ?>
