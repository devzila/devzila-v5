<?php
/**
 * Common site footer.
 *
 * Pages may define before including this file:
 *   $extraScripts  string  markup injected before </body> (e.g. page scripts)
 */
$extraScripts = $extraScripts ?? '';
?>
<!-- FOOTER -->
<footer>
  <div class="footer-inner">
    <div class="footer-top">
      <div class="footer-brand">
        <a href="index.php" class="nav-logo" style="text-decoration:none;">
          <svg class="logo-icon" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="36" height="36" rx="8" fill="rgb(66 101 164)"/>
            <path d="M7 7h14c5 0 8 3 8 7s-3 7-8 7H7V7z" fill="white"/>
            <rect x="7" y="11" width="7" height="6" fill="rgb(66 101 164)"/>
            <path d="M7 24h8l8 5H7v-5z" fill="white"/>
          </svg>
          <span class="logo-text">Dev<span>Zila</span></span>
        </a>
        <p>Software development studio specializing in Ruby on Rails, React.js, and AI-powered web applications.</p>
      </div>
      <div class="footer-col">
        <h5>Development</h5>
        <ul>
          <li><a href="rails-development.php">Rails Development</a></li>
          <li><a href="rails-upgrades.php">Rails Upgrades</a></li>
          <li><a href="fintech-solutions.php">Fintech Solutions</a></li>
          <li><a href="frontend-development.php">Frontend Development</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Workshops</h5>
        <ul>
          <li><a href="ddd-workshops.php">DDD Workshops</a></li>
          <li><a href="event-storming-workshops.php">Event Storming</a></li>
          <li><a href="code-mentoring.php">Code Mentoring</a></li>
          <li><a href="hotwire-workshop.php">Hotwire Workshop</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Company</h5>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php#work">Our Work</a></li>
          <li><a href="hire-us.php">Hire Us</a></li>
          <li><a href="mailto:hello@devzila.com">Contact</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© <?= date('Y') ?> DevZila · devzila.com</span>
      <div class="footer-legal">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
        <a href="mailto:hello@devzila.com">hello@devzila.com</a>
      </div>
    </div>
  </div>
</footer>

<?= $extraScripts ?>
</body>
</html>
