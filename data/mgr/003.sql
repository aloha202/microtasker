CREATE TABLE backlog (id BIGINT AUTO_INCREMENT, description VARCHAR(255) NOT NULL, user_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE backlog ADD CONSTRAINT backlog_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;

CREATE TABLE thread (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, is_main TINYINT(1) DEFAULT '0', user_id BIGINT, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE microtask ADD COLUMN thread_id BIGINT AFTER id;
ALTER TABLE microtask ADD INDEX thread_id_idx (thread_id);
ALTER TABLE thread ADD CONSTRAINT thread_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE microtask ADD CONSTRAINT microtask_thread_id_thread_id FOREIGN KEY (thread_id) REFERENCES thread(id) ON DELETE SET NULL;