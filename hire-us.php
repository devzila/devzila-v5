<?php
$pageTitle = 'Hire Us — DevZila Ruby on Rails Development Team';
$pageDescription = "Tell us about your project. We'll get back within 24 hours with a brief and estimate.";
$useSiteCss = false;
$extraHead = '<link rel="stylesheet" href="/assets/hire-us.css">';
$navServicesHref = '/#services';
require __DIR__ . '/partials/header.php';
?>
<!-- HEADER -->
<header class="page-header">
  <div class="section-label">Hire Us</div>
  <h1>We're ready to help you</h1>
  <p>Every cooperation starts with a conversation. Let's talk about your project, your goals, and how we can bring value to your business.</p>
</header>

<!-- HIRE FORM -->
<div class="hireus-wrap">
  <section class="card">
    <h2>Tell Us About Your Project</h2>
    <p class="card-sub">Fill out the form below and we'll get back to you within 24 hours.</p>

    <div id="formStatus" class="form-status"></div>

    <form id="hireForm" action="submit-hire" method="post" novalidate>
      <!-- honeypot anti-spam field -->
      <div class="hp-field" aria-hidden="true">
        <label>Leave this field empty
          <input type="text" name="website" tabindex="-1" autocomplete="off">
        </label>
      </div>

      <div class="form-group">
        <label for="name">Your Name <span class="req">*</span></label>
        <input type="text" id="name" name="name" placeholder="Jane Doe" required>
      </div>

      <div class="form-group">
        <label for="email">Your Email <span class="req">*</span></label>
        <input type="email" id="email" name="email" placeholder="jane@company.com" required>
      </div>

      <div class="form-group">
        <label for="phone">Your Phone Number</label>
        <input type="tel" id="phone" name="phone" placeholder="+1 555 123 4567">
      </div>

      <div class="form-group">
        <label for="message">Tell Us What You Need – We're Listening! <span class="req">*</span></label>
        <textarea id="message" name="message" placeholder="Describe your project, current stack, and what you'd like to achieve…" required></textarea>
      </div>

      <div class="form-group">
        <label for="budget">Do You Have a Budget in Mind?</label>
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
          <option value="LinkedIn">LinkedIn</option>
          <option value="Referral">Referral</option>
          <option value="Blog / Article">Blog / Article</option>
          <option value="GitHub">GitHub</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <button type="submit" class="btn-primary" id="submitBtn">Send Your Request →</button>
      <p class="form-note">This site is protected against spam. By submitting, you agree to be contacted about your enquiry.</p>
    </form>
  </section>

  <aside class="card aside-card">
    <h3>Book a meeting with us</h3>
    <p>If you're interested in cooperating with us, feel free to schedule a call with our team.</p>
    <p>You can ask any questions regarding our skills, practices, experience, techniques, availability and financial aspects.</p>
    <a href="https://calendly.com/nilayanand/15min" target="_blank" rel="noopener noreferrer" class="btn-primary" style="display:inline-block;">Schedule a meeting →</a>
    <div class="rate">
      <strong>DevZila hourly rate is competitive and project-based.</strong><br>
      Each project is handled by at least two of our senior developers.
    </div>
  </aside>
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
    const originalLabel = submitBtn.textContent;
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
      submitBtn.textContent = originalLabel;
    }
  });
})();
</script>

<?php require __DIR__ . '/partials/footer.php'; ?>
