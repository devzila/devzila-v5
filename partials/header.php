<?php
/**
 * Common site header: <head> (SEO + structured data) and top navigation.
 *
 * Pages may define these before including this file:
 *   $pageTitle        string  <title> text (also used for Open Graph)
 *   $pageDescription  string  meta description
 *   $pagePath         string  canonical path, e.g. "/rails-upgrades" (defaults to the request path)
 *   $pageRobots       string  robots meta content (default: index, follow)
 *   $pageBreadcrumbs  array   [[label, path], …] — emitted as BreadcrumbList JSON-LD
 *   $pageService      array   ['name' => …, 'type' => …, 'offers' => […]] — emitted as Service JSON-LD
 *   $pageFaqs         array   [['q' => …, 'a' => …], …] — emitted as FAQPage JSON-LD
 *   $pageSchema       array   extra schema.org nodes for this page
 *   $pageSchemaType   string  schema.org type of the page itself (default: WebPage)
 *   $ogType           string  Open Graph type (default: website)
 *   $ogImage          string  Open Graph image path or URL
 *   $extraHead        string  extra markup injected into <head>
 *   $navServicesHref  string  href for the "Services" parent link
 */
require_once __DIR__ . '/../lib/site.php';

$pageTitle       = $pageTitle       ?? 'DevZila — AI Enablement for Legacy Ruby on Rails Applications';
$pageDescription = $pageDescription ?? 'DevZila is an AI-first Ruby on Rails consultancy. We modernize legacy Rails applications and make them AI-ready with AI strategy, integration and automation.';
$pagePath        = $pagePath        ?? current_path();
$pageRobots      = $pageRobots      ?? 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
$pageBreadcrumbs = $pageBreadcrumbs ?? [];
$pageService     = $pageService     ?? null;
$pageFaqs        = $pageFaqs        ?? [];
$pageSchema      = $pageSchema      ?? [];
$pageSchemaType  = $pageSchemaType  ?? 'WebPage';
$ogType          = $ogType          ?? 'website';
$ogImage         = $ogImage         ?? '/assets/img/og-default.png';
$extraHead       = $extraHead       ?? '';
$navServicesHref = $navServicesHref ?? '/#services';

$canonicalUrl = site_url($pagePath);
$ogImageUrl   = site_url($ogImage);
$statusCode   = http_response_code() ?: 200;
# A 404 must not name some other URL as its canonical. That is what Search
# Console reports as "Alternate page with proper canonical tag".
$emitCanonical = $statusCode < 400;
$isIndexable  = $emitCanonical && stripos($pageRobots, 'noindex') === false;

$schemaNodes = [schema_organization(), schema_website()];
if ($isIndexable) {
    $webPage = schema_webpage($canonicalUrl, $pageTitle, $pageDescription, $pageSchemaType);
    if ($pageBreadcrumbs) {
        $webPage['breadcrumb'] = ['@id' => $canonicalUrl . '#breadcrumb'];
        $schemaNodes[] = schema_breadcrumbs($pageBreadcrumbs, $canonicalUrl);
    }
    $schemaNodes[] = $webPage;
    if ($pageService) {
        $schemaNodes[] = schema_service($pageService, $canonicalUrl, $pageDescription);
    }
    if ($pageFaqs) {
        $schemaNodes[] = schema_faq($pageFaqs, $canonicalUrl);
    }
    foreach ($pageSchema as $node) {
        $schemaNodes[] = $node;
    }
}

$siteVerification = (string) (app_config()['site']['google_site_verification'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= e($pageTitle) ?></title>
<meta name="description" content="<?= e($pageDescription) ?>">
<meta name="robots" content="<?= e($pageRobots) ?>">
<?php if ($emitCanonical): ?>
<link rel="canonical" href="<?= e($canonicalUrl) ?>">
<link rel="alternate" type="text/plain" href="/llms.txt" title="LLM-readable site summary">
<?php endif; ?>
<meta name="author" content="<?= e(SITE_NAME) ?>">
<meta name="theme-color" content="#0a0a0b">
<?php if ($siteVerification !== ''): ?>
<meta name="google-site-verification" content="<?= e($siteVerification) ?>">
<?php endif; ?>

<meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
<meta property="og:type" content="<?= e($ogType) ?>">
<meta property="og:title" content="<?= e($pageTitle) ?>">
<meta property="og:description" content="<?= e($pageDescription) ?>">
<?php if ($emitCanonical): ?>
<meta property="og:url" content="<?= e($canonicalUrl) ?>">
<?php endif; ?>
<meta property="og:image" content="<?= e($ogImageUrl) ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="DevZila — AI-first Ruby on Rails consultancy">
<meta property="og:locale" content="en_US">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= e($pageTitle) ?>">
<meta name="twitter:description" content="<?= e($pageDescription) ?>">
<meta name="twitter:image" content="<?= e($ogImageUrl) ?>">

<link rel="icon" href="/favicon.png" type="image/png" sizes="120x120">
<link rel="icon" href="/favicon.ico" sizes="48x48">
<link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&family=DM+Mono:wght@400;500&family=Inter:wght@400;500;600;700;800;900&family=Space+Grotesk:wght@500;700&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= e(asset('/assets/site.css')) ?>">
<?= $extraHead ?>
<?= json_ld($schemaNodes) ?>
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>

<!-- NAV -->
<nav class="site-nav" aria-label="Primary">
  <?= logo_link() ?>
  <input type="checkbox" id="nav-toggle" class="nav-toggle" aria-label="Toggle menu">
  <label for="nav-toggle" class="nav-burger" aria-hidden="true">
    <span></span><span></span><span></span>
  </label>
  <ul class="nav-links">
    <li class="nav-dropdown">
      <a href="<?= e($navServicesHref) ?>" aria-haspopup="true">Services</a>
      <div class="dropdown-menu">
        <div class="dropdown-group is-ai">
          <p class="dropdown-title">AI Enablement</p>
          <a href="/ai-transformation-strategy">AI Transformation &amp; Strategy</a>
          <a href="/ai-integration-automation">AI Integration &amp; Automation</a>
          <a href="/legacy-rails-modernization">Legacy Rails Modernization</a>
          <a href="/ai-readiness-assessment">AI Readiness Assessment</a>
        </div>
        <div class="dropdown-group">
          <p class="dropdown-title">Ruby on Rails Engineering</p>
          <a href="/rails-development">Ruby on Rails Development</a>
          <a href="/rails-upgrades">Ruby on Rails Upgrades</a>
          <a href="/fintech-solutions">Fintech Solutions</a>
          <a href="/frontend-development">Frontend Development</a>
        </div>
        <div class="dropdown-group">
          <p class="dropdown-title">Workshops &amp; Mentoring</p>
          <a href="/ai-for-rails-workshop">AI for Rails Teams Workshop</a>
          <a href="/ddd-workshops">DDD Workshops</a>
          <a href="/event-storming-workshops">Event Storming Workshops</a>
          <a href="/hotwire-workshop">Hotwire Workshop</a>
          <a href="/code-mentoring">Code Mentoring</a>
        </div>
      </div>
    </li>
    <li><a href="/ai-use-cases">AI Use Cases</a></li>
    <li><a href="/why-devzila">Why DevZila</a></li>
    <li><a href="/blog">Blog</a></li>
    <li><a href="/hire-us" class="nav-cta">Hire Us</a></li>
  </ul>
</nav>

<main id="main">
