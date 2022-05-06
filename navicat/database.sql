CREATE TABLE `CALENDAR`  (
  `subject_id` varchar(16) NOT NULL,
  `calendar_time` datetime NOT NULL,
  `calendar_start` varchar(255) NOT NULL,
  `subject_weekstart` int NOT NULL,
  `subject_weekend` int NOT NULL,
  PRIMARY KEY (`subject_id`, `calendar_time`, `calendar_start`)
);

CREATE TABLE `CHAT`  (
  `chat_id` int NOT NULL,
  `user_name` varchar(16) NOT NULL,
  `friend_user` varchar(16) NOT NULL,
  PRIMARY KEY (`chat_id`, `user_name`, `friend_user`)
);

CREATE TABLE `CHAT_GROUP`  (
  `chatgroup_id` int NOT NULL,
  `chatgroup_name` varchar(255) NOT NULL,
  `user_name` varchar(16) NOT NULL,
  PRIMARY KEY (`chatgroup_id`)
);

CREATE TABLE `CLASS`  (
  `class_id` varchar(16) NOT NULL,
  `user_name` varchar(16) NOT NULL,
  `class_name` varchar(255) NULL,
  PRIMARY KEY (`class_id`, `user_name`)
);

CREATE TABLE `COMMENT`  (
  `comment_id` int NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `comment_time` datetime NOT NULL,
  `user_name` varchar(16) NOT NULL,
  `homework_id` varchar(16) NOT NULL,
  PRIMARY KEY (`comment_id`)
);

CREATE TABLE `DOCUMENT`  (
  `document_id` int NOT NULL,
  `doucument_directory` varchar(255) NOT NULL,
  `user_name` varchar(16) NOT NULL,
  `subject_id` varchar(16) NOT NULL,
  `homework_id` varchar(16) NOT NULL,
  PRIMARY KEY (`document_id`)
);

CREATE TABLE `FRIEND`  (
  `friend_user` varchar(16) NOT NULL,
  `user_name` varchar(16) NOT NULL,
  `friend_status` int NOT NULL,
  PRIMARY KEY (`friend_user`, `user_name`)
);

CREATE TABLE `HOMEWORK`  (
  `homework_id` varchar(16) NOT NULL,
  `subject_id` varchar(16) NOT NULL,
  `homework_content` text NOT NULL,
  `homework_time` datetime NOT NULL,
  `homework_finish` datetime NOT NULL,
  PRIMARY KEY (`homework_id`, `subject_id`)
);

CREATE TABLE `MESSAGE`  (
  `mess_id` int NOT NULL,
  `mess_content` text NOT NULL,
  `mess_time` datetime NOT NULL,
  `mess_type` int NOT NULL,
  `chat_id` int NOT NULL,
  PRIMARY KEY (`mess_id`)
);

CREATE TABLE `MESSAGE_GROUP`  (
  `messgroup_id` int NOT NULL,
  `messgroup_content` text NOT NULL,
  `messgroup_time` datetime NOT NULL,
  `user_name` varchar(16) NOT NULL,
  `chatgroup_id` int NOT NULL,
  PRIMARY KEY (`messgroup_id`)
);

CREATE TABLE `NOTIFICATION`  (
  `noti_id` int NOT NULL,
  `noti_content` varchar(255) NULL,
  `noti_status` bit NULL,
  `noti_time` datetime NULL,
  `user_name` varchar(16) NULL,
  PRIMARY KEY (`noti_id`)
);

CREATE TABLE `REGISTRY`  (
  `subject_id` varchar(16) NOT NULL,
  `user_name` varchar(16) NOT NULL,
  PRIMARY KEY (`subject_id`, `user_name`)
);

CREATE TABLE `SCORE`  (
  `user_name` varchar(16) NOT NULL,
  `subject_id` varchar(16) NOT NULL,
  `homework_id` int NOT NULL,
  `score_level` varchar(8) NOT NULL,
  PRIMARY KEY (`user_name`, `homework_id`, `subject_id`)
);

CREATE TABLE `SUBJECT`  (
  `subject_id` varchar(16) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_image` varchar(22) NOT NULL,
  `user_name` varchar(16) NOT NULL,
  PRIMARY KEY (`subject_id`)
);

CREATE TABLE `USER`  (
  `user_name` varchar(16) NOT NULL,
  `user_password` varchar(24) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone` varchar(16) NOT NULL,
  `user_sex` bit NOT NULL DEFAULT '',
  `user_major` varchar(80) NULL,
  `user_type` varchar(255) NULL,
  `user_image` varchar(255) NOT NULL,
  PRIMARY KEY (`user_name`)
);

CREATE TABLE `WEEK`  (
  `subject_id` int NOT NULL,
  `week_start` varchar(255) NULL,
  `week_end` varchar(255) NULL,
  `week_none` varchar(255) NULL,
  PRIMARY KEY (`subject_id`)
);

ALTER TABLE `CALENDAR` ADD CONSTRAINT `fk_CALENDAR_SUBJECT_1` FOREIGN KEY (`subject_id`) REFERENCES `SUBJECT` (`subject_id`);
ALTER TABLE `CHAT` ADD CONSTRAINT `fk_CHAT_USER_1` FOREIGN KEY (`user_name`) REFERENCES `USER` (`user_name`);
ALTER TABLE `CHAT` ADD CONSTRAINT `fk_CHAT_USER_2` FOREIGN KEY (`friend_user`) REFERENCES `USER` (`user_name`);
ALTER TABLE `CHAT_GROUP` ADD CONSTRAINT `fk_CHAT_GROUP_USER_1` FOREIGN KEY (`user_name`) REFERENCES `USER` (`user_name`);
ALTER TABLE `CLASS` ADD CONSTRAINT `fk_REGISTRY_USER_1` FOREIGN KEY (`user_name`) REFERENCES `USER` (`user_name`);
ALTER TABLE `COMMENT` ADD CONSTRAINT `fk_COMMENT_HOMEWORK_1` FOREIGN KEY (`homework_id`) REFERENCES `HOMEWORK` (`homework_id`);
ALTER TABLE `COMMENT` ADD CONSTRAINT `fk_COMMENT_USER_1` FOREIGN KEY (`user_name`) REFERENCES `USER` (`user_name`);
ALTER TABLE `DOCUMENT` ADD CONSTRAINT `fk_DOCUMENT_USER_1` FOREIGN KEY (`user_name`) REFERENCES `USER` (`user_name`);
ALTER TABLE `DOCUMENT` ADD CONSTRAINT `fk_DOCUMENT_HOMEWORK_1` FOREIGN KEY (`homework_id`) REFERENCES `HOMEWORK` (`homework_id`);
ALTER TABLE `DOCUMENT` ADD CONSTRAINT `fk_DOCUMENT_SUBJECT_1` FOREIGN KEY (`subject_id`) REFERENCES `SUBJECT` (`subject_id`);
ALTER TABLE `FRIEND` ADD CONSTRAINT `fk_FRIEND_USER_1` FOREIGN KEY (`user_name`) REFERENCES `USER` (`user_name`);
ALTER TABLE `FRIEND` ADD CONSTRAINT `fk_FRIEND_USER_2` FOREIGN KEY (`friend_user`) REFERENCES `USER` (`user_name`);
ALTER TABLE `HOMEWORK` ADD CONSTRAINT `fk_HOMEWORK_SUBJECT_1` FOREIGN KEY (`subject_id`) REFERENCES `SUBJECT` (`subject_id`);
ALTER TABLE `MESSAGE` ADD CONSTRAINT `fk_MESSAGE_CHAT_1` FOREIGN KEY (`chat_id`) REFERENCES `CHAT` (`chat_id`);
ALTER TABLE `MESSAGE_GROUP` ADD CONSTRAINT `fk_MESSAGE_GROUP_CHAT_GROUP_1` FOREIGN KEY (`chatgroup_id`) REFERENCES `CHAT_GROUP` (`chatgroup_id`);
ALTER TABLE `MESSAGE_GROUP` ADD CONSTRAINT `fk_MESSAGE_GROUP_USER_1` FOREIGN KEY (`user_name`) REFERENCES `USER` (`user_name`);
ALTER TABLE `NOTIFICATION` ADD CONSTRAINT `fk_NOTIFICATION_USER_1` FOREIGN KEY (`user_name`) REFERENCES `USER` (`user_name`);
ALTER TABLE `REGISTRY` ADD CONSTRAINT `fk_USER_SUBJECT_USER_1` FOREIGN KEY (`user_name`) REFERENCES `USER` (`user_name`);
ALTER TABLE `REGISTRY` ADD CONSTRAINT `fk_USER_SUBJECT_SUBJECT_1` FOREIGN KEY (`subject_id`) REFERENCES `SUBJECT` (`subject_id`);
ALTER TABLE `SCORE` ADD CONSTRAINT `fk_SCORE_REGISTRY_1` FOREIGN KEY (`subject_id`) REFERENCES `REGISTRY` (`subject_id`);
ALTER TABLE `SCORE` ADD CONSTRAINT `fk_SCORE_USER_1` FOREIGN KEY (`user_name`) REFERENCES `USER` (`user_name`);

