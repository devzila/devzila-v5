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
