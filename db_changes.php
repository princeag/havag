CREATE TABLE `user_records` (
  `email` varchar(150) COLLATE 'utf8_unicode_ci' NOT NULL PRIMARY KEY COMMENT 'User Email',
  `name` varchar(150) COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'User Full Name',
  `mobile` varchar(15) COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'User Mobile No',
  `occupation` varchar(150) COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'User Occupation',
  `short_bio` varchar(255) COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'About user',
  `gender` smallint(1) NOT NULL COMMENT 'Gender, 1=> Male, 2=> Female, 3=> Other',
  `password` varchar(15) COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'User Password',
  `profile` varchar(255) COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'User Profile Img',
  `resume_file` varchar(255) COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'User Resume File',
  `dob` varchar(10) COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'User Date of birth',
  `user_note` text COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'User note added by admin',
  `user_tags` varchar(255) COLLATE 'utf8_unicode_ci' NOT NULL COMMENT 'User tags added by admin.',
  `date_add` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'User record create date and time',
  `date_upd` datetime NULL COMMENT 'User record update date and time'
) ENGINE='InnoDB' COLLATE 'utf8_unicode_ci';