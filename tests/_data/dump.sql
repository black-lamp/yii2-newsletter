PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: newsletter_client
DROP TABLE IF EXISTS newsletter_client;
CREATE TABLE newsletter_client (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  email STRING (256),
  phone INTEGER,
  created_at INTEGER,
  updated_at INTEGER
);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
