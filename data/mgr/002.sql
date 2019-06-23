CREATE TABLE report (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, microtask_count BIGINT UNSIGNED, info TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE report ADD CONSTRAINT report_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE microtask ADD COLUMN is_reported TINYINT(1) DEFAULT '0' AFTER is_blocker;



ALTER TABLE `user_settings`
	DROP FOREIGN KEY `user_settings_user_id_sf_guard_user_id`;
ALTER TABLE user_settings ADD CONSTRAINT user_settings_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;

UPDATE `page` SET `special_mark`='about' WHERE  `id`=2 LIMIT 1;