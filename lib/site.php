<?php
declare(strict_types=1);

/**
 * Site-wide helpers: canonical URLs, cache-busted assets, structured data
 * (JSON-LD), breadcrumbs, FAQ blocks and the inline SVG icon set.
 *
 * Loaded by partials/header.php, so every public page can use these.
 */

require_once __DIR__ . '/db.php'; // app_config(), e()

const SITE_NAME    = 'DevZila';
const SITE_EMAIL   = 'hello@devzila.com';
const SITE_TAGLINE = 'AI-first Ruby on Rails consultancy';
const SITE_BOOKING = 'https://calendly.com/nilayanand/15min';

const SITE_PUNCH = 'Excellence always';

/** The DevZila mark, traced from the brand logo. Color comes from CSS (currentColor). */
function logo_mark(): string
{
    return '<svg class="logo-icon" viewBox="0 0 649 763" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">'
        . '<g transform="translate(0,763) scale(0.1,-0.1)">'
        . '<path fill="currentColor" d="M1965 7320 c-902 -6 -1124 -10 -1285 -24 -107 -10 -218 -24 -247 -32 -95 -26 -139 -114 -129 -256 4 -46 10 -450 15 -898 5 -564 12 -826 19 -851 15 -46 50 -78 99 -91 25 -6 684 -12 1883 -17 l1845 -6 45 -27 c55 -32 159 -139 305 -313 60 -71 186 -220 280 -330 94 -110 292 -342 439 -515 562 -661 789 -920 822 -940 43 -27 81 -23 108 13 21 28 21 38 24 543 4 655 -13 1585 -33 1759 -30 268 -70 416 -171 621 -73 149 -230 392 -328 506 -165 193 -488 424 -821 588 -265 130 -492 203 -749 241 -144 21 -604 40 -896 37 -74 -1 -625 -5 -1225 -8z M441 4856 c-55 -18 -88 -50 -101 -95 -14 -47 -24 -1446 -13 -1721 8 -191 10 -207 31 -238 46 -63 54 -65 402 -70 173 -2 401 0 507 6 216 11 240 19 271 91 22 51 34 733 24 1400 -7 484 -9 518 -27 556 -40 80 -25 78 -569 82 -397 2 -489 1 -525 -11z M4259 4661 c-28 -23 -26 54 -37 -1277 l-7 -811 -28 -41 c-16 -22 -43 -46 -60 -53 -25 -10 -392 -13 -1747 -15 -943 -2 -1770 -7 -1838 -12 -138 -9 -163 -21 -197 -88 -18 -38 -19 -68 -23 -819 -2 -429 0 -867 5 -973 l9 -193 37 -37 37 -37 1818 0 1817 0 130 28 c433 95 813 265 1197 537 362 256 675 717 751 1105 63 322 70 491 25 580 -24 46 -247 319 -563 691 -66 77 -221 259 -345 404 -124 146 -306 359 -405 475 -99 115 -212 248 -250 295 -212 256 -262 293 -326 241z"/>'
        . '</g></svg>';
}

/** Wordmark: the mark, the name, and the punch line. */
function logo_link(): string
{
    return '<a href="/" class="nav-logo" aria-label="' . e(SITE_NAME . ' — ' . SITE_PUNCH) . '">'
        . logo_mark()
        . '<span class="logo-lockup">'
        . '<span class="logo-text">' . e(SITE_NAME) . '</span>'
        . '<span class="logo-tag">' . e(SITE_PUNCH) . '</span>'
        . '</span></a>';
}


/** Canonical origin, e.g. "https://devzila.com" (override via config 'site' => ['url' => …]). */
function site_base_url(): string
{
    static $base = null;
    if ($base === null) {
        $base = rtrim((string) (app_config()['site']['url'] ?? 'https://devzila.com'), '/');
    }
    return $base;
}

/** Absolute URL for a site path ("/blog" → "https://devzila.com/blog"). */
function site_url(string $path = '/'): string
{
    if (preg_match('~^https?://~i', $path)) {
        return $path;
    }
    return site_base_url() . '/' . ltrim($path, '/');
}

/** Path of the current request without query string, ".php" or trailing slash. */
function current_path(): string
{
    $path = (string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    $path = preg_replace('~\.php$~i', '', $path) ?? $path;
    $path = rtrim($path, '/');
    if ($path === '' || $path === '/index') {
        return '/';
    }
    return $path;
}

/**
 * Asset URL with an automatic cache-busting version taken from the file's
 * modification time, so browsers always pick up a changed stylesheet.
 */
function asset(string $path): string
{
    $file = __DIR__ . '/..' . $path;
    $version = is_file($file) ? (string) filemtime($file) : '1';
    return $path . '?v=' . $version;
}

/** Render one or more schema.org nodes as a JSON-LD script tag. */
function json_ld(array $nodes): string
{
    if (!$nodes) {
        return '';
    }
    $doc = ['@context' => 'https://schema.org', '@graph' => array_values($nodes)];
    $json = json_encode(
        $doc,
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_PRETTY_PRINT
    );
    return '<script type="application/ld+json">' . "\n" . $json . "\n" . '</script>' . "\n";
}

/** Topics DevZila should be associated with by search and answer engines. */
function site_topics(): array
{
    return [
        'Ruby on Rails',
        'Legacy Ruby on Rails modernization',
        'Ruby on Rails upgrades',
        'AI enablement',
        'AI transformation strategy',
        'AI integration',
        'AI automation',
        'Large language model (LLM) integration',
        'Retrieval-augmented generation (RAG)',
        'AI agents',
        'Model Context Protocol (MCP)',
        'pgvector',
        'Domain-Driven Design',
        'Event sourcing',
        'Hotwire',
        'React',
        'Fintech software development',
    ];
}

function schema_organization(): array
{
    return [
        '@type'       => 'Organization',
        '@id'         => site_url('/#organization'),
        'name'        => SITE_NAME,
        'url'         => site_url('/'),
        'logo'        => [
            '@type'  => 'ImageObject',
            'url'    => site_url('/assets/img/logo-512.png'),
            'width'  => 512,
            'height' => 512,
        ],
        'image'       => site_url('/assets/img/og-default.png'),
        'email'       => SITE_EMAIL,
        'slogan'      => 'We turn legacy Ruby on Rails applications into AI-powered products.',
        'description' => 'DevZila is an AI-first Ruby on Rails consultancy. We combine AI transformation strategy, '
            . 'AI integration and automation, and senior Rails engineering to modernize legacy Ruby on Rails '
            . 'applications and make them AI-ready without a rewrite.',
        'knowsAbout'  => site_topics(),
        'areaServed'  => 'Worldwide',
        'contactPoint' => [
            '@type'             => 'ContactPoint',
            'contactType'       => 'sales',
            'email'             => SITE_EMAIL,
            'url'               => site_url('/hire-us'),
            'availableLanguage' => ['English'],
        ],
    ];
}

function schema_website(): array
{
    return [
        '@type'       => 'WebSite',
        '@id'         => site_url('/#website'),
        'url'         => site_url('/'),
        'name'        => SITE_NAME,
        'description' => SITE_TAGLINE,
        'inLanguage'  => 'en',
        'publisher'   => ['@id' => site_url('/#organization')],
    ];
}

function schema_webpage(string $url, string $title, string $description, string $type = 'WebPage'): array
{
    return [
        '@type'       => $type,
        '@id'         => $url . '#webpage',
        'url'         => $url,
        'name'        => $title,
        'description' => $description,
        'inLanguage'  => 'en',
        'isPartOf'    => ['@id' => site_url('/#website')],
        'about'       => ['@id' => site_url('/#organization')],
    ];
}

/**
 * @param array<int, array{0: string, 1?: string|null}> $crumbs  [label, path] pairs; the last item is the current page.
 */
function schema_breadcrumbs(array $crumbs, string $currentUrl): array
{
    $items = [];
    foreach (array_values($crumbs) as $i => $crumb) {
        $path = $crumb[1] ?? null;
        $items[] = [
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $crumb[0],
            'item'     => $path ? site_url($path) : $currentUrl,
        ];
    }
    return [
        '@type'           => 'BreadcrumbList',
        '@id'             => $currentUrl . '#breadcrumb',
        'itemListElement' => $items,
    ];
}

/**
 * @param array{name: string, type?: string, description?: string, audience?: string, offers?: string[]} $service
 */
function schema_service(array $service, string $url, string $fallbackDescription): array
{
    $node = [
        '@type'       => 'Service',
        '@id'         => $url . '#service',
        'name'        => $service['name'],
        'serviceType' => $service['type'] ?? $service['name'],
        'description' => $service['description'] ?? $fallbackDescription,
        'url'         => $url,
        'provider'    => ['@id' => site_url('/#organization')],
        'areaServed'  => 'Worldwide',
    ];
    if (!empty($service['audience'])) {
        $node['audience'] = ['@type' => 'Audience', 'audienceType' => $service['audience']];
    }
    if (!empty($service['offers'])) {
        $node['hasOfferCatalog'] = [
            '@type'           => 'OfferCatalog',
            'name'            => $service['name'],
            'itemListElement' => array_map(
                static fn (string $name): array => [
                    '@type'       => 'Offer',
                    'itemOffered' => ['@type' => 'Service', 'name' => $name],
                ],
                $service['offers']
            ),
        ];
    }
    return $node;
}

/**
 * @param array<int, array{q: string, a: string}> $faqs  Answers may contain simple inline HTML.
 */
function schema_faq(array $faqs, string $url): array
{
    return [
        '@type'      => 'FAQPage',
        '@id'        => $url . '#faq',
        'mainEntity' => array_map(
            static fn (array $faq): array => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => trim(html_entity_decode(strip_tags($faq['a']), ENT_QUOTES | ENT_HTML5, 'UTF-8')),
                ],
            ],
            $faqs
        ),
    ];
}

/** Visible breadcrumb trail. Mirrors the BreadcrumbList emitted in <head>. */
function render_breadcrumbs(array $crumbs): string
{
    $parts = [];
    $last = count($crumbs) - 1;
    foreach (array_values($crumbs) as $i => $crumb) {
        $path = $crumb[1] ?? null;
        if ($i === $last || !$path) {
            $parts[] = '<span' . ($i === $last ? ' aria-current="page"' : '') . '>' . e($crumb[0]) . '</span>';
        } else {
            $parts[] = '<a href="' . e($path) . '">' . e($crumb[0]) . '</a>';
        }
    }
    return '<nav class="breadcrumb" aria-label="Breadcrumb">' . implode(' <span class="sep" aria-hidden="true">/</span> ', $parts) . '</nav>';
}

/**
 * Visible FAQ list. Answers are trusted, hand-written HTML fragments.
 *
 * @param array<int, array{q: string, a: string}> $faqs
 */
function render_faq(array $faqs): string
{
    $html = '<div class="faq">';
    foreach ($faqs as $faq) {
        $html .= '<div class="faq-item"><h3>' . e($faq['q']) . '</h3><p>' . $faq['a'] . '</p></div>';
    }
    return $html . '</div>';
}

/**
 * Inline SVG icon (24×24 stroke icons; Feather/Lucide geometry, MIT licensed).
 * Decorative by default, so it is hidden from assistive technology.
 */
function icon(string $name, string $class = ''): string
{
    static $icons = [
        'activity'      => '<polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>',
        'alert'         => '<path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/>',
        'arrow-right'   => '<line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>',
        'arrow-up'      => '<circle cx="12" cy="12" r="10"/><polyline points="16 12 12 8 8 12"/><line x1="12" y1="16" x2="12" y2="8"/>',
        'award'         => '<circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>',
        'bar-chart'     => '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>',
        'book'          => '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>',
        'bot'           => '<path d="M12 8V4H8"/><rect x="4" y="8" width="16" height="12" rx="2"/><path d="M2 14h2"/><path d="M20 14h2"/><path d="M15 13v2"/><path d="M9 13v2"/>',
        'box'           => '<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/>',
        'briefcase'     => '<rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
        'calendar'      => '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>',
        'check'         => '<polyline points="20 6 9 17 4 12"/>',
        'check-circle'  => '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>',
        'clock'         => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'cloud'         => '<path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"/>',
        'code'          => '<polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>',
        'compass'       => '<circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>',
        'cpu'           => '<rect x="4" y="4" width="16" height="16" rx="2" ry="2"/><rect x="9" y="9" width="6" height="6"/><line x1="9" y1="1" x2="9" y2="4"/><line x1="15" y1="1" x2="15" y2="4"/><line x1="9" y1="20" x2="9" y2="23"/><line x1="15" y1="20" x2="15" y2="23"/><line x1="20" y1="9" x2="23" y2="9"/><line x1="20" y1="14" x2="23" y2="14"/><line x1="1" y1="9" x2="4" y2="9"/><line x1="1" y1="14" x2="4" y2="14"/>',
        'credit-card'   => '<rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/>',
        'database'      => '<ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/>',
        'dollar'        => '<line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>',
        'edit'          => '<path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>',
        'eye'           => '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>',
        'file-text'     => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>',
        'filter'        => '<polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>',
        'flag'          => '<path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" y1="22" x2="4" y2="15"/>',
        'git-branch'    => '<line x1="6" y1="3" x2="6" y2="15"/><circle cx="18" cy="6" r="3"/><circle cx="6" cy="18" r="3"/><path d="M18 9a9 9 0 0 1-9 9"/>',
        'git-merge'     => '<circle cx="18" cy="18" r="3"/><circle cx="6" cy="6" r="3"/><path d="M6 21V9a9 9 0 0 0 9 9"/>',
        'globe'         => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>',
        'grid'          => '<rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>',
        'help'          => '<circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/>',
        'image'         => '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/>',
        'inbox'         => '<polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/>',
        'key'           => '<path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"/>',
        'layers'        => '<polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/>',
        'layout'        => '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/>',
        'life-buoy'     => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="4"/><line x1="4.93" y1="4.93" x2="9.17" y2="9.17"/><line x1="14.83" y1="14.83" x2="19.07" y2="19.07"/><line x1="14.83" y1="9.17" x2="19.07" y2="4.93"/><line x1="4.93" y1="19.07" x2="9.17" y2="14.83"/>',
        'link'          => '<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>',
        'list'          => '<line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/>',
        'lock'          => '<rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>',
        'mail'          => '<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>',
        'map'           => '<polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"/><line x1="8" y1="2" x2="8" y2="18"/><line x1="16" y1="6" x2="16" y2="22"/>',
        'message'       => '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>',
        'monitor'       => '<rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/>',
        'package'       => '<line x1="16.5" y1="9.4" x2="7.5" y2="4.21"/><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/>',
        'radio'         => '<circle cx="12" cy="12" r="2"/><path d="M16.24 7.76a6 6 0 0 1 0 8.49m-8.48-.01a6 6 0 0 1 0-8.49m11.31-2.82a10 10 0 0 1 0 14.14m-14.14 0a10 10 0 0 1 0-14.14"/>',
        'refresh'       => '<polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/>',
        'repeat'        => '<polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/>',
        'rocket'        => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
        'search'        => '<circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>',
        'send'          => '<line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/>',
        'server'        => '<rect x="2" y="2" width="20" height="8" rx="2" ry="2"/><rect x="2" y="14" width="20" height="8" rx="2" ry="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/>',
        'share'         => '<circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>',
        'shield'        => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
        'shuffle'       => '<polyline points="16 3 21 3 21 8"/><line x1="4" y1="20" x2="21" y2="3"/><polyline points="21 16 21 21 16 21"/><line x1="15" y1="15" x2="21" y2="21"/><line x1="4" y1="4" x2="9" y2="9"/>',
        'sliders'       => '<line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/>',
        'sparkles'      => '<path d="M11 3l1.9 5.1L18 10l-5.1 1.9L11 17l-1.9-5.1L4 10l5.1-1.9z"/><path d="M19 15l.8 2.2L22 18l-2.2.8L19 21l-.8-2.2L16 18l2.2-.8z"/><path d="M19 2.5l.5 1.5 1.5.5-1.5.5-.5 1.5-.5-1.5-1.5-.5 1.5-.5z"/>',
        'target'        => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
        'terminal'      => '<polyline points="4 17 10 11 4 5"/><line x1="12" y1="19" x2="20" y2="19"/>',
        'tool'          => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>',
        'trending-up'   => '<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/>',
        'user-check'    => '<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><polyline points="17 11 19 13 23 9"/>',
        'users'         => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'wind'          => '<path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2"/>',
        'workflow'      => '<rect x="3" y="3" width="8" height="8" rx="2"/><path d="M7 11v4a2 2 0 0 0 2 2h4"/><rect x="13" y="13" width="8" height="8" rx="2"/>',
        'zap'           => '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>',
    ];

    $body = $icons[$name] ?? $icons['sparkles'];
    $cls = trim('icon ' . $class);
    return '<svg class="' . e($cls) . '" viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" '
        . 'stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">'
        . $body . '</svg>';
}

/** Icon inside a tinted rounded badge. $tone: "blue" | "mint" | "plain". */
function icon_badge(string $name, string $tone = 'blue'): string
{
    $class = $tone === 'blue' ? 'icon-badge' : 'icon-badge is-' . $tone;

    return '<span class="' . e($class) . '">' . icon($name) . '</span>';
}
