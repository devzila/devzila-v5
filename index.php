<?php
$pageTitle = 'DevZila — Ruby on Rails · React.js · AI Integration';
$pageDescription = 'DevZila is a software development studio specializing in Ruby on Rails, React.js, and AI-powered web applications.';
$useSiteCss = false;
$extraHead = '<link rel="stylesheet" href="assets/home.css">';
$navServicesHref = '#services';
require __DIR__ . '/partials/header.php';
?>
<!-- HERO -->
<section class="hero">
  <!--<div class="hero-badge">
    <span class="hero-badge-dot"></span>
    Ruby on Rails · React.js · AI Integration
  </div>-->
  <h1>
    We rescue, <br>
    <span class="line-accent">modernize & scale </span><br>
    <span class="line-purple">Rails applications</span><br>
    <!--<span class="line-purple">AI-powered.</span>-->
  </h1>
  <p class="hero-sub">
    Deep expertise in Domain-Driven Design, event sourcing, and legacy code modernization. We go beyond code - we understand your business. We share our know-how through world-class Ruby on Rails education.
  </p>
  <div class="hero-actions">
    <a href="hire-us" class="btn-primary">Start a Project →</a>
    <a href="#services" class="btn-ghost">See Our Work</a>
  </div>
</section>

<!-- TECH STRIP -->
<div class="tech-strip">
  <div class="tech-pill"><span class="tech-dot" style="background:#c8372d;"></span>Ruby on Rails 8</div>
  <div class="tech-pill"><span class="tech-dot" style="background:#4f8ef7;"></span>React.js 19</div>
  <div class="tech-pill"><span class="tech-dot" style="background:#22d48a;"></span>AI / LLM Integration</div>
  <div class="tech-pill"><span class="tech-dot" style="background:#34d399;"></span>PostgreSQL</div>
  <div class="tech-pill"><span class="tech-dot" style="background:#f59e0b;"></span>Hotwire / Turbo</div>
  <div class="tech-pill"><span class="tech-dot" style="background:#818cf8;"></span>Sidekiq</div>
  <div class="tech-pill"><span class="tech-dot" style="background:#fb923c;"></span>AWS / Heroku</div>
</div>

<!-- STATS -->
 <!--
<div style="background:var(--bg-1); padding: 0 2rem;">
  <div style="max-width:1200px; margin:0 auto;">
    <div class="stats-row">
      <div class="stat-box">
        <div class="stat-num">80<span>+</span></div>
        <div class="stat-label">Projects delivered</div>
      </div>
      <div class="stat-box">
        <div class="stat-num">6<span>yr</span></div>
        <div class="stat-label">Rails expertise</div>
      </div>
      <div class="stat-box">
        <div class="stat-num">40<span>+</span></div>
        <div class="stat-label">AI integrations shipped</div>
      </div>
      <div class="stat-box">
        <div class="stat-num">98<span>%</span></div>
        <div class="stat-label">Client satisfaction</div>
      </div>
    </div>
  </div>
</div>-->

<!-- SERVICES -->
<section class="section" id="services">
  <div class="section-label">What We Do</div>
  <h2 class="section-title">Use our skills to modernize legacy code, enable growth, and preserve stability</h2>
  <!--<p class="section-sub">Use our skills to modernize legacy code, enable growth, and preserve stability</p>-->

  <div class="services-grid">
    <div class="service-card">
      <div class="service-icon" style="background:rgba(200,55,45,0.15);">🛤️</div>
      <h3>Ruby on Rails Development</h3>
      <p>Bulletproof backends, RESTful and GraphQL APIs, complex business logic, background jobs, and full-stack Rails apps that scale gracefully.</p>
      <span class="service-tag" style="background:rgba(200,55,45,0.12); color:var(--rail-red);">Rails · Hotwire · Sidekiq</span>
    </div>
    <div class="service-card">
      <div class="service-icon" style="background:rgba(79,142,247,0.1);">⚛️</div>
      <h3>React.js Frontend</h3>
      <p>Pixel-perfect UIs, complex SPAs, component libraries, Next.js applications, and seamless Rails API integrations with TypeScript throughout.</p>
      <span class="service-tag" style="background:rgba(79,142,247,0.1); color:var(--closeos-blue);">React · Next.js · TypeScript</span>
    </div>
    <div class="service-card">
      <div class="service-icon" style="background:rgba(34,212,138,0.12);">🤖</div>
      <h3>AI Workflow Integration</h3>
      <p>LLM-powered features, RAG pipelines, OpenAI and Anthropic integrations, autonomous agents, and AI automation baked into your existing product.</p>
      <span class="service-tag" style="background:rgba(34,212,138,0.12); color:var(--closeos-green);">OpenAI · Claude · LangChain</span>
    </div>
    <div class="service-card">
      <div class="service-icon" style="background:rgba(52,211,153,0.12);">🗄️</div>
      <h3>Ruby on Rails Upgrades</h3>
      <p>Keeping your Rails app up-to-date is crucial for security and performance. We handle seamless migrations to the latest Ruby and Rails versions, ensuring minimal downtime and maximum reliability.</p>
      <span class="service-tag" style="background:rgba(52,211,153,0.12); color:#34d399;">PostgreSQL · Redis · ElasticSearch</span>
    </div>
    <div class="service-card">
      <div class="service-icon" style="background:rgba(251,146,60,0.12);">☁️</div>
      <h3>DevOps & Deployment</h3>
      <p>CI/CD pipelines, containerization, AWS and Heroku deployment, monitoring, logging, and auto-scaling configurations that just work.</p>
      <span class="service-tag" style="background:rgba(251,146,60,0.12); color:#fb923c;">Docker · AWS · GitHub Actions</span>
    </div>
    <div class="service-card">
      <div class="service-icon" style="background:rgba(129,140,248,0.12);">🔄</div>
      <h3>Legacy Modernization</h3>
      <p>Upgrade aging Rails apps, extract monoliths into services, refactor spaghetti code, and migrate jQuery frontends to modern React.</p>
      <span class="service-tag" style="background:rgba(129,140,248,0.12); color:#818cf8;">Audit · Refactor · Migrate</span>
    </div>
  </div>
</section>

<!-- OFFERINGS -->
<div style="background:var(--bg-1); border-top:1px solid var(--border); border-bottom:1px solid var(--border); padding:7rem 2rem;">
  <div style="max-width:1200px; margin:0 auto;">
    <div class="section-label">Our Solutions</div>
    <h2 class="section-title">Choose your engagement</h2>
    <p class="section-sub">From focused Rails APIs to full AI-powered platforms — we have a delivery model that fits your stage and budget.</p>

    <div class="offerings-grid">
      <a href="#contact" class="offering-card rails">
        <div class="offering-badge" style="background:rgba(200,55,45,0.12); color:var(--rail-red);">
          <span>🛤</span> Rails Backend
        </div>
        <h3>DevZila Rails</h3>
        <div class="tagline">API · Business Logic · Performance</div>
        <p>A production-grade Ruby on Rails backend built to last. Ideal for SaaS MVPs, API platforms, and complex data-driven applications with high throughput requirements.</p>
        <ul class="offering-features">
          <li>RESTful or GraphQL API design</li>
          <li>Authentication, RBAC, and multi-tenancy</li>
          <li>Background processing with Sidekiq</li>
          <li>Automated testing (RSpec + Cypress)</li>
        </ul>
        <span class="offering-cta">Learn more →</span>
      </a>

      <a href="#contact" class="offering-card react">
        <div class="offering-badge" style="background:rgba(79,142,247,0.1); color:var(--closeos-blue);">
          <span>⚛</span> React Frontend
        </div>
        <h3>DevZila UI</h3>
        <div class="tagline">Components · SPA · Performance</div>
        <p>Modern, fast, and accessible React applications. We design and build complete frontends or drop into your existing product to add features or refactor legacy code.</p>
        <ul class="offering-features">
          <li>TypeScript-first component libraries</li>
          <li>Next.js with SSR and ISR</li>
          <li>Design-to-code pixel-perfect delivery</li>
          <li>Storybook documentation included</li>
        </ul>
        <span class="offering-cta">Learn more →</span>
      </a>

      <a href="#contact" class="offering-card ai">
        <span class="offering-new">New</span>
        <div class="offering-badge" style="background:rgba(34,212,138,0.12); color:var(--closeos-green);">
          <span>🤖</span> AI Integration
        </div>
        <h3>DevZila AI</h3>
        <div class="tagline">LLMs · Agents · Automation</div>
        <p>Embed intelligent automation directly into your Rails or React app. From chatbots to autonomous agents to document processing pipelines — we ship AI that delivers ROI.</p>
        <ul class="offering-features">
          <li>RAG pipelines with vector databases</li>
          <li>Multi-agent orchestration workflows</li>
          <li>OpenAI, Anthropic, Gemini integrations</li>
          <li>Streaming responses and tool calling</li>
        </ul>
        <span class="offering-cta">Explore AI features →</span>
      </a>

      <a href="#contact" class="offering-card full">
        <div class="offering-badge" style="background:rgba(255,255,255,0.06); color:var(--text-1);">
          <span>🚀</span> Full Stack
        </div>
        <h3>DevZila Complete</h3>
        <div class="tagline">End-to-End · Rails + React + AI</div>
        <p>From database schema to deployed product. We handle the entire stack — Rails backend, React frontend, AI integrations, DevOps, and ongoing maintenance. One team, full ownership.</p>
        <ul class="offering-features">
          <li>Dedicated team of 2–4 developers</li>
          <li>Weekly sprints with demos</li>
          <li>Managed infrastructure and monitoring</li>
          <li>Post-launch support included</li>
        </ul>
        <span class="offering-cta">Get started →</span>
      </a>
    </div>
  </div>
</div>

<!-- INTEGRATIONS (same as closeos.fr style) -->
<section class="integrations-section" id="integrations">
  <div class="integrations-label">Available Integrations</div>

  <div class="marquee-wrapper">
    <!-- Row 1 -->
    <div class="marquee-row" id="row1">
      <!-- duplicated for seamless loop -->
    </div>
    <!-- Row 2 -->
    <div class="marquee-row reverse" id="row2">
    </div>
  </div>
</section>

<!-- STACK -->
<section class="section" id="stack">
  <div class="section-label">Tech Stack</div>
  <h2 class="section-title">Boring in the best way</h2>
  <p class="section-sub">We use battle-tested tools that have stood the test of time — not hype-driven frameworks that'll be deprecated next quarter.</p>

  <div class="stack-grid">
    <div class="stack-visual">
<span class="code-comment"># devzila_stack.rb</span>

<span class="code-key">stack</span> = {
  <span class="code-str">backend</span>: {
    <span class="code-str">framework</span>: <span class="code-val">"Ruby on Rails 8"</span>,
    <span class="code-str">api</span>: [<span class="code-val">"REST"</span>, <span class="code-val">"GraphQL"</span>],
    <span class="code-str">jobs</span>: <span class="code-val">"Sidekiq + Redis"</span>,
    <span class="code-str">realtime</span>: <span class="code-val">"ActionCable / Turbo"</span>,
  },

  <span class="code-str">frontend</span>: {
    <span class="code-str">ui</span>: <span class="code-val">"React 19"</span>,
    <span class="code-str">framework</span>: <span class="code-val">"Next.js 15"</span>,
    <span class="code-str">language</span>: <span class="code-val">"TypeScript"</span>,
    <span class="code-str">styling</span>: <span class="code-val">"Tailwind CSS"</span>,
  },

  <span class="code-str">ai_layer</span>: {
    <span class="code-str">llms</span>: [<span class="code-val">"Claude"</span>, <span class="code-val">"GPT-4o"</span>],
    <span class="code-str">vectors</span>: <span class="code-val">"pgvector + Pinecone"</span>,
    <span class="code-accent">agents</span>: <span class="code-val">"LangChain · n8n · custom"</span>,
  },

  <span class="code-str">infra</span>: [<span class="code-val">"AWS"</span>, <span class="code-val">"Heroku"</span>, <span class="code-val">"Fly.io"</span>]
}
    </div>
    <ul class="stack-features">
      <li class="stack-feature">
        <div class="stack-feature-icon" style="background:rgba(200,55,45,0.12);">🛤️</div>
        <div class="stack-feature-text">
          <h4>Rails: convention over configuration</h4>
          <p>We embrace Rails the way DHH intended — opinionated, fast to ship, and maintainable long-term. No unnecessary abstraction layers.</p>
        </div>
      </li>
      <li class="stack-feature">
        <div class="stack-feature-icon" style="background:rgba(79,142,247,0.1);">⚛️</div>
        <div class="stack-feature-text">
          <h4>React: composable and typed</h4>
          <p>TypeScript-first, server component aware, and built with reusability in mind. We write React code you'll want to maintain a year later.</p>
        </div>
      </li>
      <li class="stack-feature">
        <div class="stack-feature-icon" style="background:rgba(34,212,138,0.12);">🧠</div>
        <div class="stack-feature-text">
          <h4>AI: integrated, not bolted on</h4>
          <p>We architect AI features from day one — not as an afterthought. Streaming, tool calling, RAG, and agentic workflows woven into your data model.</p>
        </div>
      </li>
      <li class="stack-feature">
        <div class="stack-feature-icon" style="background:rgba(52,211,153,0.1);">🔒</div>
        <div class="stack-feature-text">
          <h4>Security and performance first</h4>
          <p>N+1 queries eliminated, rate limiting, OWASP compliance, and automated security scanning in every CI pipeline we set up.</p>
        </div>
      </li>
    </ul>
  </div>
</section>

<!-- PROCESS -->
<div style="background:var(--bg-1); border-top:1px solid var(--border); border-bottom:1px solid var(--border); padding:7rem 2rem;">
  <div style="max-width:1200px; margin:0 auto;">
    <div class="section-label">How We Work</div>
    <h2 class="section-title">From brief to shipped</h2>

    <div class="process-steps">
      <div class="step">
        <div class="step-num">01 — DISCOVERY</div>
        <div class="step-line"></div>
        <h4>Scope & Architecture</h4>
        <p>We audit your requirements, map the data model, and write a technical brief before any code gets written. No surprises later.</p>
      </div>
      <div class="step">
        <div class="step-num">02 — BUILD</div>
        <div class="step-line"></div>
        <h4>Weekly Sprint Cycles</h4>
        <p>Two-week sprints with a demo at the end of each. You see working software constantly — not a big reveal at month three.</p>
      </div>
      <div class="step">
        <div class="step-num">03 — REVIEW</div>
        <div class="step-line"></div>
        <h4>Code Review & QA</h4>
        <p>Every PR reviewed, every feature tested. We write RSpec and Cypress tests alongside feature code — not as an afterthought.</p>
      </div>
      <div class="step">
        <div class="step-num">04 — SHIP</div>
        <div class="step-line"></div>
        <h4>Deploy & Support</h4>
        <p>Zero-downtime deploys, monitoring setup, and a 30-day support window after launch. We don't disappear after handover.</p>
      </div>
    </div>
  </div>
</div>

<!-- TESTIMONIALS -->
 <!--
<section class="section" id="work">
  <div class="section-label">Client Stories</div>
  <h2 class="section-title">What our clients say</h2>

  <div class="testimonials-grid">
    <div class="testimonial-card">
      <div class="testimonial-stars">★★★★★</div>
      <p>"DevZila took our messy Rails 5 app and turned it into a clean, fast Rails 8 platform in three months. The AI features they added have saved our team 20 hours a week."</p>
      <div class="testimonial-author">
        <div class="author-avatar" style="background:#c8372d;">SR</div>
        <div>
          <div class="author-name">Sarah R.</div>
          <div class="author-role">CTO, PropTech SaaS</div>
        </div>
      </div>
    </div>
    <div class="testimonial-card">
      <div class="testimonial-stars">★★★★★</div>
      <p>"The React component library they built for us is something I'm genuinely proud to show other engineers. TypeScript, Storybook, accessible — exactly what we needed."</p>
      <div class="testimonial-author">
        <div class="author-avatar" style="background:#4f8ef7;">JM</div>
        <div>
          <div class="author-name">James M.</div>
          <div class="author-role">VP Engineering, FinTech</div>
        </div>
      </div>
    </div>
    <div class="testimonial-card">
      <div class="testimonial-stars">★★★★★</div>
      <p>"We went from idea to live product in 8 weeks. The AI document processing pipeline they built is core to our business now. Couldn't have done it without DevZila."</p>
      <div class="testimonial-author">
        <div class="author-avatar" style="background:#22d48a;">AK</div>
        <div>
          <div class="author-name">Amara K.</div>
          <div class="author-role">Founder, LegalTech Startup</div>
        </div>
      </div>
    </div>
  </div>
</section>
-->
<!-- CTA -->
 <!--
<div style="padding:4rem 2rem; max-width:1200px; margin:0 auto;" id="contact">
  <div class="cta-banner">
    <div class="section-label" style="margin-bottom:1rem;">Ready to build?</div>
    <h2>Let's ship something great<br>together.</h2>
    <p>Tell us what you're building and we'll get back within 24 hours with a brief + estimate.</p>
    <div class="cta-actions">
      <a href="mailto:hello@devzila.com" class="btn-primary">hello@devzila.com →</a>
      <a href="#services" class="btn-ghost">View Services</a>
    </div>
  </div>
</div>
-->

<!-- WHY CHOOSE -->
<section class="section">
  <div class="section-label">Why DevZila</div>
  <h2 class="section-title">Why choose DevZila?</h2>

  <div class="services-grid">
    <div class="service-card">
      <h3>20+ Years of Rails</h3>
      <p>Deep Rails expertise, pioneering remote-first consulting and sharing knowledge through books, blogs, and courses since the framework's inception.</p>
    </div>
    <div class="service-card">
      <h3>Proven Track Record</h3>
      <p>Delivering impactful open and closed workshops that have empowered dozens of developers to master Domain-Driven Design (DDD).</p>
    </div>
    <div class="service-card">
      <h3>DDD Pioneers</h3>
      <p>Domain-Driven Design pioneers in Ruby On Rails.</p>
    </div>
  </div>
</section>

<!-- CTA -->
<div style="padding: 0 0 7rem;" id="contact">
  <div class="cta-banner">
    <h2>Ready to dive deeper into your<br>Ruby on Rails based business?</h2>
    <p>Let's discuss how we can help you.</p>
    <div class="cta-actions">
      <a href="hire-us" class="btn-primary">Reach out to us now →</a>
    </div>
  </div>
</div>


<script>
// ── Integration chips data ──
const row1Integrations = [
  { name: "GitHub", color: "#24292e", letter: "GH" },
  { name: "Stripe", color: "#635bff", letter: "St" },
  { name: "HubSpot", color: "#ff7a59", letter: "HS" },
  { name: "OpenAI", color: "#10a37f", letter: "AI" },
  { name: "Anthropic", color: "#b5543e", letter: "An" },
  { name: "Slack", color: "#4a154b", letter: "Sl" },
  { name: "Zapier", color: "#ff4a00", letter: "Za" },
  { name: "Twilio", color: "#f22f46", letter: "Tw" },
  { name: "SendGrid", color: "#1a82e2", letter: "SG" },
  { name: "AWS S3", color: "#ff9900", letter: "S3" },
  { name: "Heroku", color: "#430098", letter: "Hk" },
  { name: "Cloudinary", color: "#3448c5", letter: "Cl" },
];

const row2Integrations = [
  { name: "PostgreSQL", color: "#336791", letter: "PG" },
  { name: "Redis", color: "#dc382d", letter: "Re" },
  { name: "Sidekiq", color: "#b01e1e", letter: "Sq" },
  { name: "n8n", color: "#ea4b71", letter: "n8" },
  { name: "Make", color: "#6d04d7", letter: "Mk" },
  { name: "Pinecone", color: "#1c1c2e", letter: "Pi" },
  { name: "Algolia", color: "#003dff", letter: "Al" },
  { name: "Mixpanel", color: "#7856ff", letter: "Mx" },
  { name: "Sentry", color: "#362d59", letter: "Se" },
  { name: "Datadog", color: "#632ca6", letter: "DD" },
  { name: "Docker", color: "#2496ed", letter: "Dk" },
  { name: "Figma", color: "#f24e1e", letter: "Fi" },
];

function buildChip(int) {
  return `<div class="integration-chip">
    <div class="int-icon" style="background:${int.color};">${int.letter}</div>
    ${int.name}
  </div>`;
}

function buildRow(integrations) {
  // duplicate for infinite scroll
  const chips = [...integrations, ...integrations].map(buildChip).join('');
  return chips;
}

document.getElementById('row1').innerHTML = buildRow(row1Integrations);
document.getElementById('row2').innerHTML = buildRow(row2Integrations);
</script>

<?php require __DIR__ . '/partials/footer.php'; ?>
