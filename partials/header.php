<?php
/**
 * Common site header: <head> + top navigation.
 *
 * Pages may define these before including this file:
 *   $pageTitle        string  <title> text
 *   $pageDescription  string  meta description
 *   $useSiteCss       bool    link assets/site.css (default true)
 *   $extraHead        string  extra markup injected into <head> (e.g. page CSS)
 *   $navServicesHref  string  href for the "Services" parent link
 */
$pageTitle       = $pageTitle       ?? 'DevZila — Ruby on Rails · React.js · AI Integration';
$pageDescription = $pageDescription ?? 'DevZila is a software development studio specializing in Ruby on Rails, React.js, and AI-powered web applications.';
$useSiteCss      = $useSiteCss      ?? true;
$extraHead       = $extraHead       ?? '';
$navServicesHref = $navServicesHref ?? '/#services';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($pageTitle) ?></title>
<meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&family=DM+Mono:wght@400;500&family=Inter:wght@400;500;600;700;800;900&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<?php if ($useSiteCss): ?>
<link rel="stylesheet" href="assets/site.css">
<?php endif; ?>
<?= $extraHead ?>
</head>
<body>

<!-- NAV -->
<nav>
  <a href="/" class="nav-logo">
    <svg class="logo-icon" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect width="36" height="36" rx="8" fill="rgb(66 101 164)"/>
      <path d="M7 7h14c5 0 8 3 8 7s-3 7-8 7H7V7z" fill="white"/>
      <rect x="7" y="11" width="7" height="6" fill="rgb(66 101 164)"/>
      <path d="M7 24h8l8 5H7v-5z" fill="white"/>
    </svg>
    <span class="logo-text">Dev<span>Zila</span></span>
  </a>
  <ul class="nav-links">
    <li class="nav-dropdown">
      <a href="<?= htmlspecialchars($navServicesHref) ?>" aria-haspopup="true">Services</a>
      <div class="dropdown-menu">
        <div class="dropdown-group">
          <h6>Development</h6>
          <a href="rails-development">Ruby on Rails Development</a>
          <a href="rails-upgrades">Ruby on Rails Upgrades</a>
          <a href="fintech-solutions">Fintech Solutions</a>
          <a href="frontend-development">Frontend Development</a>
        </div>
        <div class="dropdown-group">
          <h6>Workshops &amp; Mentoring</h6>
          <a href="ddd-workshops">DDD Workshops</a>
          <a href="event-storming-workshops">Event Storming Workshops</a>
          <a href="code-mentoring">Code Mentoring</a>
          <a href="hotwire-workshop">Hotwire Workshop</a>
        </div>
      </div>
    </li>
    <li class="hide-mobile"><a href="why-devzila">Why DevZila</a></li>
    <li class="hide-mobile"><a href="blog">Blog</a></li>
    <li class="hide-mobile"><a href="/#work">Work</a></li>
    <li><a href="hire-us" class="nav-cta">Hire Us</a></li>
  </ul>
</nav>
