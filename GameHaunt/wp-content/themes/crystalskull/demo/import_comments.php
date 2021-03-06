<?php
$wpdb->query("DROP TABLE IF EXISTS {$table_prefix}comments");
$wpdb->query("CREATE TABLE {$table_prefix}comments (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8");
$wpdb->query("
INSERT INTO {$table_prefix}comments VALUES
('2', '4', 'Bob', '', '', '93.144.91.232', '2013-10-24 13:37:44', '2013-10-24 13:37:44', 'Nice theme!', '0', '1', '', '', '0', '0'),
('3', '4', 'Peter', '', '', '93.144.91.232', '2013-10-24 13:38:11', '2013-10-24 13:38:11', 'Looking sweet, keep it up!', '0', '1', '', '', '0', '0'),
('4', '4', 'Anthony', '', '', '93.144.91.232', '2013-10-24 13:38:27', '2013-10-24 13:38:27', 'Wow amazing', '0', '1', '', '', '0', '0'),
('6', '1042', 'gamer85', '', '', '27.153.251.136', '2013-08-31 12:17:02', '2013-08-31 12:17:02', 'How is the new FF?', '0', '1', '', '', '0', '0'),
('7', '1042', 'admin', 'spam@asdasd.com', '', '93.144.79.247', '2013-08-31 13:27:00', '2013-08-31 13:27:00', 'Hi there!', '0', '1', '', '', '0', '1'),
('8', '1042', 'admin', 'spam@asdasd.com', '', '93.144.79.247', '2013-08-31 13:27:10', '2013-08-31 13:27:10', 'hey cool', '0', '1', '', '', '0', '1'),
('9', '1042', 'admin', 'spam@asdasd.com', '', '93.144.79.247', '2013-08-31 13:27:20', '2013-08-31 13:27:20', 'Hey how is it going?', '0', '1', '', '', '0', '1'),
('10', '1042', 'admin', 'spam@asdasd.com', '', '93.144.79.247', '2013-08-31 13:27:27', '2013-08-31 13:27:27', 'Even more testing', '0', '1', '', '', '0', '1'),
('11', '1042', 'admin', 'spam@asdasd.com', '', '93.144.79.247', '2013-08-31 13:27:37', '2013-08-31 13:27:37', 'Looking forward to the next update!', '0', '1', '', '', '0', '1'),
('12', '1042', 'Frags', '', '', '93.144.79.247', '2013-08-31 13:28:06', '2013-08-31 13:28:06', 'Any good CS:GO servers?', '0', '1', '', '', '0', '0'),
('13', '1042', 'admin', 'spam@asdasd.com', '', '93.144.79.247', '2013-08-31 16:06:18', '2013-08-31 16:06:18', 'Sow what games do you play?', '0', '1', '', '', '0', '1'),
('14', '1042', 'admin', 'spam@asdasd.com', '', '178.221.114.52', '2013-08-31 16:07:38', '2013-08-31 16:07:38', 'Nice site', '0', '1', '', '', '0', '1'),
('15', '1042', 'admin', 'spam@asdasd.com', '', '178.221.114.52', '2013-08-31 16:08:35', '2013-08-31 16:08:35', 'Testing the wall!', '0', '1', '', '', '0', '1'),
('17', '75', 'Nikola', 'nikola@gmail.com', '', '178.223.55.38', '2013-05-04 21:31:56', '2013-05-04 21:31:56', 'Lorem ipsum dolor sit amet', '0', '1', '', '', '0', '0'),
('18', '75', 'Nikola', 'nikola@gmail.com', '', '178.223.55.38', '2013-05-04 21:35:37', '2013-05-04 21:35:37', 'Even more comment testing', '0', '1', '', '', '0', '0'),
('19', '75', 'Marko', 'marko@gamil.com', '', '93.86.222.15', '2013-05-06 13:26:05', '2013-05-06 13:26:05', 'Hey cool website man', '0', '1', '', '', '0', '0'),
('20', '75', 'admin', 'f_marinkovic@yahoo.com', '', '216.166.7.6', '2013-06-13 15:30:32', '2013-06-13 15:30:32', 'Testing the blog comments', '0', '1', '', '', '18', '1'),
('21', '78', 'admin', 'f_marinkovic@yahoo.com', '', '209.99.59.232', '2013-06-17 11:44:24', '2013-06-17 11:44:24', 'Wow amazing theme :D', '0', '1', '', '', '0', '1'),
('22', '78', 'admin', 'f_marinkovic@yahoo.com', '', '209.99.59.232', '2013-06-17 11:44:36', '2013-06-17 11:44:36', 'Cool cool!', '0', '1', '', '', '21', '1'),
('23', '1330', 'admin', 'f_marinkovic@yahoo.com', '', '209.99.59.232', '2013-06-18 04:54:58', '2013-06-18 04:54:58', 'Nice!', '0', '1', '', '', '0', '1'),
('24', '491', 'admin', 'f_marinkovic@yahoo.com', '', '209.99.59.232', '2013-06-18 08:53:33', '2013-06-18 08:53:33', 'Awesome theme!', '0', '1', '', '', '0', '1'),
('25', '491', 'admin', 'f_marinkovic@yahoo.com', '', '209.99.59.232', '2013-06-18 08:54:04', '2013-06-18 08:54:04', 'Yeah so cool', '0', '1', '', '', '24', '1'),
('26', '496', 'admin', 'f_marinkovic@yahoo.com', '', '209.99.59.232', '2013-06-18 08:53:35', '2013-06-18 08:53:35', 'Awesome theme!', '0', 'post-trashed', '', '', '0', '1'),
('27', '496', 'admin', 'f_marinkovic@yahoo.com', '', '209.99.59.232', '2013-06-18 08:53:51', '2013-06-18 08:53:51', 'Yeah so cool', '0', 'post-trashed', '', '', '0', '1'),
('28', '499', 'admin', 'f_marinkovic@yahoo.com', '', '209.99.59.232', '2013-06-18 08:53:32', '2013-06-18 08:53:32', 'Awesome theme!', '0', '1', '', '', '0', '1'),
('29', '499', 'admin', 'f_marinkovic@yahoo.com', '', '209.99.59.232', '2013-06-18 08:53:54', '2013-06-18 08:53:54', 'Yeah so cool', '0', '1', '', '', '28', '1'),
('30', '1485', 'Bob', 'dgf@gmail.com', '', '93.87.129.242', '2014-03-02 17:00:30', '2014-03-02 17:00:30', 'Wow awesome post', '0', '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:27.0) Gecko/20100101 Firefox/27.0 FirePHP/0.7.4', '', '0', '0')");
?>