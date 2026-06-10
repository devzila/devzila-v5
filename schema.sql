-- DevZila "Hire Us" form submissions
-- Run this once against your MySQL/MariaDB database.

CREATE TABLE IF NOT EXISTS hire_requests (
  id           BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name         VARCHAR(150)    NOT NULL,
  email        VARCHAR(200)    NOT NULL,
  phone        VARCHAR(50)     DEFAULT NULL,
  message      TEXT            NOT NULL,
  budget       VARCHAR(100)    DEFAULT NULL,
  source       VARCHAR(150)    DEFAULT NULL,
  ip_address   VARCHAR(45)     DEFAULT NULL,
  user_agent   VARCHAR(255)    DEFAULT NULL,
  created_at   DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY idx_email (email),
  KEY idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ──────────────────────────────────────────────
-- Blog module
-- ──────────────────────────────────────────────

CREATE TABLE IF NOT EXISTS blog_authors (
  id          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name        VARCHAR(150)    NOT NULL,
  email       VARCHAR(200)    DEFAULT NULL,
  bio         TEXT            DEFAULT NULL,
  created_at  DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS blog_categories (
  id          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name        VARCHAR(150)    NOT NULL,
  slug        VARCHAR(160)    NOT NULL,
  created_at  DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uniq_category_slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS blog_posts (
  id            BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  title         VARCHAR(220)    NOT NULL,
  slug          VARCHAR(240)    NOT NULL,
  excerpt       TEXT            DEFAULT NULL,
  body          MEDIUMTEXT      NOT NULL,
  author_id     BIGINT UNSIGNED DEFAULT NULL,
  category_id   BIGINT UNSIGNED DEFAULT NULL,
  status        ENUM('draft','published') NOT NULL DEFAULT 'draft',
  published_at  DATETIME        DEFAULT NULL,
  created_at    DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at    DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uniq_post_slug (slug),
  KEY idx_status (status),
  KEY idx_author (author_id),
  KEY idx_category (category_id),
  KEY idx_published_at (published_at),
  CONSTRAINT fk_post_author   FOREIGN KEY (author_id)   REFERENCES blog_authors(id)    ON DELETE SET NULL,
  CONSTRAINT fk_post_category FOREIGN KEY (category_id) REFERENCES blog_categories(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ── Seed data (safe to skip / edit) ──
INSERT INTO blog_authors (name, email, bio) VALUES
  ('DevZila Team', 'hello@devzila.com', 'Senior Ruby on Rails and React engineers at DevZila.');

INSERT INTO blog_categories (name, slug) VALUES
  ('Ruby on Rails', 'ruby-on-rails'),
  ('Domain-Driven Design', 'domain-driven-design'),
  ('Frontend', 'frontend'),
  ('Company News', 'company-news');

INSERT INTO blog_posts (title, slug, excerpt, body, author_id, category_id, status, published_at) VALUES
  ('Welcome to the DevZila Blog',
   'welcome-to-the-devzila-blog',
   'Insights on Ruby on Rails, Domain-Driven Design, and shipping maintainable software.',
   '<p>Welcome to the DevZila blog! Here we share what we learn building and rescuing Ruby on Rails applications, applying Domain-Driven Design, and shipping real value for our clients.</p><p>Stay tuned for deep dives, practical guides, and lessons from the trenches.</p>',
   1, 1, 'published', NOW());
