/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : farmers

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-11-10 13:52:13
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'Audrey', 'Barasa', 'Admin', 'admin@gmail.com', 'admin12');

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', '3', '0', 'hello', 'abraham_kipsang_497855', '2020-10-22 16:36:28');
INSERT INTO `comments` VALUES ('2', '3', '2', 'Kindly?', 'abraham_kipsang_497855', '2020-10-22 16:50:59');
INSERT INTO `comments` VALUES ('3', '8', '2', 'use dumuzas', 'audrey_tallam_985903', '2020-11-01 15:22:07');

-- ----------------------------
-- Table structure for `posts`
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('3', '2', 'Help with best tomatoes seedlings', '', '2020-10-22 14:30:34');
INSERT INTO `posts` VALUES ('5', '1', 'Hello world?', '', '2020-10-23 14:08:05');
INSERT INTO `posts` VALUES ('6', '1', 'Help please?', '', '2020-10-23 14:08:55');
INSERT INTO `posts` VALUES ('7', '2', 'Sanitize please', 'image1.jpeg.74', '2020-10-26 18:29:45');
INSERT INTO `posts` VALUES ('8', '2', 'Hello guys can someone tell me how to get rid of rodents', '', '2020-10-26 18:31:20');
INSERT INTO `posts` VALUES ('9', '3', 'how to raise pigs', '', '2020-11-01 15:23:35');
INSERT INTO `posts` VALUES ('10', '2', 'hello', '', '2020-11-04 10:56:19');

-- ----------------------------
-- Table structure for `user_messages`
-- ----------------------------
DROP TABLE IF EXISTS `user_messages`;
CREATE TABLE `user_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `msg_body` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `msg_seen` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_messages
-- ----------------------------
INSERT INTO `user_messages` VALUES ('1', '1', '2', 'hello', '2020-10-25 19:28:47', 'no');
INSERT INTO `user_messages` VALUES ('2', '1', '2', 'hey', '2020-10-26 12:25:12', 'no');
INSERT INTO `user_messages` VALUES ('3', '1', '2', 'hey', '2020-10-26 12:25:20', 'no');
INSERT INTO `user_messages` VALUES ('4', '2', '2', 'hello', '2020-10-26 12:27:29', 'no');
INSERT INTO `user_messages` VALUES ('5', '2', '1', 'Hello', '2020-10-26 12:30:17', 'no');
INSERT INTO `user_messages` VALUES ('6', '1', '2', 'what can do for you?', '2020-10-26 12:42:13', 'no');
INSERT INTO `user_messages` VALUES ('7', '2', '1', 'just wanted to more about the seeds', '2020-10-26 12:43:07', 'no');
INSERT INTO `user_messages` VALUES ('8', '1', '2', 'You just buy the seeds\r\n', '2020-10-26 12:43:55', 'no');
INSERT INTO `user_messages` VALUES ('9', '1', '2', 'Then we do the planting', '2020-10-26 12:44:18', 'no');
INSERT INTO `user_messages` VALUES ('10', '2', '1', 'okay, see you soon', '2020-10-26 12:45:05', 'no');
INSERT INTO `user_messages` VALUES ('11', '1', '3', '167', '2020-11-01 15:25:34', 'no');
INSERT INTO `user_messages` VALUES ('12', '1', '3', '167', '2020-11-01 15:25:46', 'no');
INSERT INTO `user_messages` VALUES ('13', '2', '0', 'hello', '2020-11-04 17:46:57', 'no');
INSERT INTO `user_messages` VALUES ('14', '2', '0', 'hello', '2020-11-04 17:47:03', 'no');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `user_name` text NOT NULL,
  `describe_user` varchar(255) NOT NULL,
  `Relationship` text NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_county` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birthday` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_cover` varchar(255) NOT NULL,
  `user_reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL,
  `posts` text NOT NULL,
  `recovery_account` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Philip', 'Otieno', 'philip_otieno_04959', 'Hello.am philip', 'Married', 'philip1234', 'philip@gmail.com', 'Uasingishu', 'Male', '1996-02-25', 'dummy2.png.93', 'default_cover.jpg', '2020-10-21 22:27:55', 'verified', 'yes', 'Iwanttoputading intheuniverse.');
INSERT INTO `users` VALUES ('2', 'Ellena', 'Audrey', 'ellena_audrey_497855', 'Hello.am Ellena.', 'Single', 'ellena12', 'ellena@gmail.com', 'Kakamega', 'Female', '1996-02-25', 'audrey.jpg.59', 'default_cover.jpg', '2020-10-22 00:09:22', 'verified', 'yes', 'Mose');
INSERT INTO `users` VALUES ('3', 'audrey', 'tallam', 'audrey_tallam_985903', 'Hello.This is my default status!', '...', 'mohammed1', 'audrey@gmail.com', 'Bungoma', 'Male', '1986-05-17', 'dummy2.png', 'default_cover.jpg', '2020-11-01 15:20:14', 'verified', 'yes', 'Iwanttoputading intheuniverse.');
