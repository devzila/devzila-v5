<?php
/**
 * Common site footer.
 *
 * Pages may define before including this file:
 *   $extraScripts  string  markup injected before </body> (e.g. page scripts)
 */
$extraScripts = $extraScripts ?? '';
?>
</main>

<!-- FOOTER -->
<footer class="site-footer">
  <div class="footer-inner">
    <div class="footer-top">
      <div class="footer-brand">
        <?= logo_link() ?>
        <p>The AI-first Ruby on Rails consultancy. We modernize legacy Rails applications and make them AI-ready — with strategy, integration and automation built on senior Rails engineering.</p>
        <a class="footer-mail" href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a>
      </div>
      <div class="footer-col">
        <p class="footer-title">AI Enablement</p>
        <ul>
          <li><a href="/ai-transformation-strategy">AI Transformation &amp; Strategy</a></li>
          <li><a href="/ai-integration-automation">AI Integration &amp; Automation</a></li>
          <li><a href="/legacy-rails-modernization">Legacy Rails Modernization</a></li>
          <li><a href="/ai-readiness-assessment">AI Readiness Assessment</a></li>
          <li><a href="/ai-use-cases">AI Use Cases for Rails</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <p class="footer-title">Rails Engineering</p>
        <ul>
          <li><a href="/rails-development">Rails Development</a></li>
          <li><a href="/rails-upgrades">Rails Upgrades</a></li>
          <li><a href="/fintech-solutions">Fintech Solutions</a></li>
          <li><a href="/frontend-development">Frontend Development</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <p class="footer-title">Workshops</p>
        <ul>
          <li><a href="/ai-for-rails-workshop">AI for Rails Teams</a></li>
          <li><a href="/ddd-workshops">DDD Workshops</a></li>
          <li><a href="/event-storming-workshops">Event Storming</a></li>
          <li><a href="/hotwire-workshop">Hotwire Workshop</a></li>
          <li><a href="/code-mentoring">Code Mentoring</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <p class="footer-title">Company</p>
        <ul>
          <li><a href="/why-devzila">Why DevZila</a></li>
          <li><a href="/blog">Blog</a></li>
          <li><a href="/faq">FAQ</a></li>
          <li><a href="/ai-glossary">AI Glossary</a></li>
          <li><a href="/hire-us">Hire Us</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© <?= date('Y') ?> DevZila · AI enablement and Ruby on Rails engineering</span>
      <div class="footer-legal">
        <a href="/sitemap.xml">Sitemap</a>
        <a href="/llms.txt">llms.txt</a>
        <a href="mailto:<?= e(SITE_EMAIL) ?>">Contact</a>
      </div>
    </div>
  </div>
</footer>

<?= $extraScripts ?>
</body>
</html>
