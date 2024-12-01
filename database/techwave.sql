-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: techwave
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `advices`
--

DROP TABLE IF EXISTS `advices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `advices` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `thong_tin` varchar(1000) NOT NULL,
  `tinh_thanh` varchar(50) DEFAULT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advices`
--

LOCK TABLES `advices` WRITE;
/*!40000 ALTER TABLE `advices` DISABLE KEYS */;
INSERT INTO `advices` VALUES (196,'Khóa học Java sẽ mở khi nào?','Hà Nội','Nguyễn Văn An','0912345678',1),(197,'Tôi muốn biết thêm chi tiết về khóa học Python.','Hồ Chí Minh','Trần Thị Bình','0923456789',1),(198,'Lịch khai giảng gần nhất của lớp học SQL là khi nào?','Đà Nẵng','Lê Văn Cao','0934567890',1),(199,'Tôi cần tư vấn về khóa học quản trị mạng.','Cần Thơ','Phạm Minh Dĩ','0945678901',2),(200,'Khóa học thiết kế web có cần kiến thức nền tảng không?','Hải Phòng','Đỗ Thị Én','0956789012',2),(201,'Lệ phí đăng ký học Data Science là bao nhiêu?','Thanh Hóa','Ngô Văn Phùng','0967890123',2),(202,'Khóa học lập trình PHP kéo dài bao lâu?','Nghệ An','Bùi Văn Giang','0978901234',4),(203,'Tôi muốn học trực tuyến, có khóa nào phù hợp không?','Huế','Nguyễn Thị Huệ','0989012345',4),(204,'Khóa học AI có cần kiến thức toán nâng cao không?','Khánh Hòa','Trần Văn Linh','0990123456',4),(205,'Thời gian học lập trình Frontend trong bao lâu?','Bắc Ninh','Lý Nam Thư','0901234567',5),(206,'Tôi muốn đăng ký lớp học Machine Learning.','Quảng Ninh','Vũ Văn Kiệt','0913456789',5),(207,'Có lớp học nào vào buổi tối không?','Lâm Đồng','Hà Thị Lụa','0925678901',5),(208,'Khóa học ReactJS có bao nhiêu buổi?','Bình Dương','Hoàng Văn Minh','0936789012',6),(209,'Học phí của khóa học Python cơ bản là bao nhiêu?','Đắk Lắk','Phan Thị Ngọc','0947890123',6),(210,'Có chương trình ưu đãi nào khi đăng ký nhóm không?','Hà Tĩnh','Nguyễn Văn Tâm','0958901234',6);
/*!40000 ALTER TABLE `advices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_post` int DEFAULT NULL,
  `id_course` int DEFAULT NULL,
  `id_parent` int DEFAULT NULL,
  `id_user` int NOT NULL,
  `content` varchar(1000) NOT NULL,
  `report_count` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rate` tinyint(1) DEFAULT NULL,
  `show` tinyint DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (3,NULL,11,NULL,4,'Khóa học rất hữu ích, bài giảng dễ hiểu.',0,'2024-12-01 14:34:08','2024-12-01 14:34:08',5,1),(4,NULL,15,NULL,5,'Phần nội dung hơi sơ sài, cần chi tiết hơn.',0,'2024-12-01 14:34:08','2024-12-01 14:34:08',3,1),(5,NULL,20,NULL,6,'Hướng dẫn rất kỹ lưỡng, cảm ơn thầy!',0,'2024-12-01 14:34:08','2024-12-01 14:34:08',4,1),(6,NULL,23,NULL,7,'Thời lượng video hơi ngắn, cần bổ sung thêm.',0,'2024-12-01 14:34:08','2024-12-01 14:34:08',2,1),(7,NULL,28,NULL,8,'Bài tập thực hành rất thú vị!',0,'2024-12-01 14:34:08','2024-12-01 14:34:08',5,1),(8,NULL,31,NULL,9,'Cần cải thiện âm thanh, hơi khó nghe.',0,'2024-12-01 14:34:08','2024-12-01 14:34:08',3,1),(9,NULL,35,NULL,4,'Cảm thấy hài lòng với chất lượng khóa học.',0,'2024-12-01 14:34:08','2024-12-01 14:34:08',4,1),(10,NULL,42,NULL,5,'Giảng viên rất tận tâm, giải đáp đầy đủ.',0,'2024-12-01 14:34:08','2024-12-01 14:34:08',5,1),(11,NULL,45,NULL,6,'Khóa học này giúp tôi nắm chắc kiến thức cơ bản.',0,'2024-12-01 14:34:08','2024-12-01 14:34:08',4,1),(12,NULL,49,NULL,7,'Khóa học hơi khó hiểu ở phần nâng cao.',0,'2024-12-01 14:34:08','2024-12-01 14:34:08',2,1),(13,40,NULL,NULL,8,'Bài viết rất chi tiết, cảm ơn admin!',2,'2024-12-01 14:34:45','2024-12-01 14:34:45',NULL,1),(14,41,NULL,NULL,9,'Hình ảnh minh họa rất sinh động.',1,'2024-12-01 14:34:45','2024-12-01 14:34:45',NULL,1),(15,42,NULL,NULL,4,'Mong có thêm các bài viết về chủ đề tương tự.',3,'2024-12-01 14:34:45','2024-12-01 14:34:45',NULL,1),(16,43,NULL,NULL,5,'Cần sửa lỗi chính tả trong bài viết.',5,'2024-12-01 14:34:45','2024-12-01 14:34:45',NULL,1),(17,44,NULL,NULL,6,'Tôi đã học được nhiều kiến thức mới từ bài viết.',4,'2024-12-01 14:34:45','2024-12-01 14:34:45',NULL,1),(18,45,NULL,NULL,7,'Một bài viết rất hay và bổ ích.',6,'2024-12-01 14:34:45','2024-12-01 14:34:45',NULL,1),(19,46,NULL,NULL,8,'Mong thêm các bài viết nâng cao hơn.',8,'2024-12-01 14:34:45','2024-12-01 14:34:45',NULL,1),(20,40,NULL,NULL,9,'Bài viết hơi chung chung, cần thêm chi tiết.',7,'2024-12-01 14:34:45','2024-12-01 14:34:45',NULL,1),(21,42,NULL,NULL,4,'Tôi rất thích cách trình bày trong bài viết.',2,'2024-12-01 14:34:45','2024-12-01 14:34:45',NULL,1),(22,44,NULL,NULL,5,'Phần kết luận chưa được rõ ràng.',9,'2024-12-01 14:34:45','2024-12-01 14:34:45',NULL,1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_categories`
--

DROP TABLE IF EXISTS `course_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_categories`
--

LOCK TABLES `course_categories` WRITE;
/*!40000 ALTER TABLE `course_categories` DISABLE KEYS */;
INSERT INTO `course_categories` VALUES (2,'Front-End Development','front-end'),(3,'Back-End Development','back-end'),(4,'Full Stack Development','full-stack'),(5,'Lập trình C#','lap-trinh-c-sharp'),(6,'Lập trình Java','lap-trinh-java'),(7,'Lập trình Python','lap-trinh-python'),(8,'Cấu trúc dữ liệu & Giải thuật','cau-truc-du-lieu-giai-thuat'),(9,'Git & Version Control','git-version-control'),(10,'Adobe Photoshop','adobe-photoshop'),(11,'Adobe Illustrator','adobe-illustrator'),(12,'UI/UX Design','ui-ux-design'),(13,'Machine Learning','machine-learning'),(14,'Data Science','data-science'),(15,'DevOps','devops'),(16,'Cyber Security','cyber-security'),(17,'Cloud Computing','cloud-computing'),(18,'Mobile App Development','mobile-development'),(19,'Artificial Intelligence','artificial-intelligence'),(20,'Blockchain Development','blockchain-development'),(21,'Internet of Things (IoT)','internet-of-things'),(22,'Game Development','game-development'),(23,'Digital Marketing','digital-marketing'),(24,'Web Design','web-design'),(25,'Augmented Reality (AR)','augmented-reality'),(26,'Virtual Reality (VR)','virtual-reality');
/*!40000 ALTER TABLE `course_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_author` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `view_count` int DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia_goc` int NOT NULL,
  `gia_giam` int NOT NULL,
  `category` int DEFAULT NULL,
  `average_rate` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (11,5,'Giải ngố AI','http://127.0.0.1:8000/images/2024-11-30-1732964869-post_img.jpg','Series này sẽ tập trung vào ứng dụng AI, train AI bằng ngôn ngữ lập trình python. Có thể dùng google colab để tăng tốc train.','<h2>Thảo luận</h2><p>Nếu bạn c&oacute; bất kỳ kh&oacute; khăn hay thắc mắc g&igrave; về kh&oacute;a học, đừng ngần ngại đặt c&acirc;u hỏi trong phần&nbsp;<button class=\"btn-link border-0 bg-transparent p-0\" data-toggle=\"scroll-to\" data-target=\"#comment-wrapper\" data-speed=\"fast\">B&Igrave;NH LUẬN</button>&nbsp;b&ecirc;n dưới hoặc trong mục&nbsp;<a href=\"https://howkteam.vn/question\" target=\"_blank\" rel=\"noopener\">HỎI &amp; Đ&Aacute;P</a>&nbsp;tr&ecirc;n thư viện&nbsp;<a class=\"font-w600\" href=\"https://howkteam.vn/\" target=\"_blank\" rel=\"noopener\">Howkteam.com</a>&nbsp;để nhận được sự hỗ trợ từ cộng đồng.</p><div class=\"media mb-10\"><img class=\"mr-10\" src=\"https://f.howkteam.vn/Upload/cke/images/1_LOGO%20SHOW%20WEB/minisize/kteam.png\" /><div class=\"media-body align-self-center font-w600\"><a href=\"https://howkteam.vn/question\" target=\"_blank\" rel=\"noopener\">CỘNG ĐỒNG HỎI Đ&Aacute;P HOWKTEAM.COM</a></div></div><div class=\"media mb-10\"><img class=\"mr-10\" src=\"https://f.howkteam.vn/Upload/cke/images/1_LOGO%20SHOW%20WEB/minisize/fb_kteam.png\" /><div class=\"media-body align-self-center font-w600\"><a href=\"https://www.facebook.com/groups/howkteam/\" target=\"_blank\" rel=\"noopener\">GROUP THẢO LUẬN FACEBOOK</a></div></div><p>Cảm ơn c&aacute;c bạn đ&atilde; lu&ocirc;n đồng h&agrave;nh c&ugrave;ng Kteam. H&atilde;y để lại b&igrave;nh luận hoặc g&oacute;p &yacute; của m&igrave;nh để ph&aacute;t triển b&agrave;i viết tốt hơn. Đừng qu&ecirc;n&nbsp;<strong>\"Luyện tập &ndash; Thử Th&aacute;ch &ndash; Kh&ocirc;ng ngại kh&oacute;\"</strong></p><div class=\"text-center my-50\">&nbsp;</div>',0,'2024-11-29 23:07:49','2024-11-29 23:07:49','giai-ngo-ai',2000000,1500000,NULL,NULL),(12,5,'Khóa học JavaScript cơ bản','http://127.0.0.1:8000/images/2024-11-30-1732965253-post_img.png','JavaScript là một trong những ngôn ngữ lập trình phổ biến nhất thế giới, được sử dụng để phát triển các ứng dụng web và game','<h2>Giới thiệu kh&oacute;a học</h2><p><strong>JavaScript&nbsp;</strong>l&agrave; một trong những ng&ocirc;n ngữ lập tr&igrave;nh phổ biến nhất thế giới, được sử dụng để ph&aacute;t triển c&aacute;c ứng dụng web v&agrave; game, cũng như nhiều loại c&ocirc;ng việc kh&aacute;c. Cụ thể như:</p><ul dir=\"ltr\"><li>Tạo v&agrave; quản l&yacute; trang web động: JavaScript l&agrave; một trong những c&ocirc;ng nghệ cơ bản cho c&aacute;c trang web động. Với JS, bạn c&oacute; thể tạo ra c&aacute;c hiệu ứng h&igrave;nh ảnh, hiệu ứng chuyển động v&agrave; c&aacute;c tr&ograve; chơi tr&ecirc;n tr&igrave;nh duyệt web.&nbsp;</li><li>Ph&aacute;t triển ứng dụng web frontend: JavaScript được sử dụng để ph&aacute;t triển c&aacute;c ứng dụng web ph&iacute;a frontend. N&oacute; cho ph&eacute;p c&aacute;c nh&agrave; ph&aacute;t triển tạo ra c&aacute;c giao diện người d&ugrave;ng đ&aacute;p ứng v&agrave; tương t&aacute;c với c&aacute;c trang web.&nbsp;</li><li>Xử l&yacute; dữ liệu: JavaScript l&agrave; một c&ocirc;ng nghệ rất mạnh trong việc xử l&yacute; dữ liệu. Bạn c&oacute; thể sử dụng JS để thực hiện c&aacute;c t&iacute;nh to&aacute;n phức tạp v&agrave; truy xuất dữ liệu từ cơ sở dữ liệu.&nbsp;</li><li>Ph&aacute;t triển ứng dụng di động: JavaScript c&oacute; thể được sử dụng để ph&aacute;t triển c&aacute;c ứng dụng di động bằng c&aacute;c nền tảng như React Native, Ionic Framework hoặc Cordova.&nbsp;</li><li>Ph&aacute;t triển tr&ograve; chơi: JavaScript được sử dụng để tạo ra c&aacute;c tr&ograve; chơi tr&ecirc;n tr&igrave;nh duyệt web. Với c&aacute;c thư viện như Phaser, Three.js, hoặc Babylon.js, bạn c&oacute; thể tạo ra c&aacute;c tr&ograve; chơi 2D v&agrave; 3D phức tạp tr&ecirc;n tr&igrave;nh duyệt.&nbsp;</li><li>Xử l&yacute; c&aacute;c t&aacute;c vụ m&aacute;y chủ (server): JavaScript cũng c&oacute; thể được sử dụng để xử l&yacute; c&aacute;c t&aacute;c vụ m&aacute;y chủ bằng c&aacute;ch sử dụng Node.js. Node.js l&agrave; một nền tảng lập tr&igrave;nh m&aacute;y chủ được x&acirc;y dựng dựa tr&ecirc;n JavaScript, cho ph&eacute;p c&aacute;c nh&agrave; ph&aacute;t triển x&acirc;y dựng c&aacute;c ứng dụng m&aacute;y chủ hiệu quả.</li></ul><p>Trong kh&oacute;a học n&agrave;y, Kteam sẽ cung cấp cho những&nbsp;kiến thức cơ bản nhất m&ocirc;̣t cách đơn giản và chi ti&ecirc;́t nh&acirc;́t có th&ecirc;̉ v&ecirc;̀&nbsp;ng&ocirc;n ngữ&nbsp;<strong>lập tr&igrave;nh JavaScript</strong>.</p><hr /><h2 dir=\"ltr\">Đối tượng tham gia</h2><p>Kh&oacute;a học n&agrave;y kh&ocirc;ng đ&ograve;i hỏi kiến thức nền tảng nhiều, n&ecirc;n giả sử như bạn chưa biết g&igrave; về lập tr&igrave;nh, bạn vẫn c&oacute; thể tham gia. Do đ&oacute; d&ugrave; bạn c&oacute; l&agrave; một người trái ngành cũng c&oacute; thể tiếp cận - Đồng thời bạn cũng kh&ocirc;ng cần phải l&agrave; một thi&ecirc;n t&agrave;i to&aacute;n học để tham gia kh&oacute;a học n&agrave;y ?.</p><p>Nếu bạn đang muốn bắt đ&acirc;̀u học l&acirc;̣p trình với&nbsp;<strong>JavaScript&nbsp;</strong>th&igrave; đ&acirc;y chính là kh&oacute;a học dành&nbsp;cho bạn.</p><hr /><h2 dir=\"ltr\">Kiến thức truyền tải</h2><p>Bằng việc tham gia kh&oacute;a học n&agrave;y, bạn sẽ được học c&aacute;c kh&aacute;i niệm như biến, h&agrave;m, v&ograve;ng lặp, điều kiện, c&aacute;c sự kiện, h&agrave;m trong JavaScript, v&agrave; rất nhiều kh&aacute;i niệm cơ bản đến chuy&ecirc;n s&acirc;u kh&aacute;c.</p><p>Ngo&agrave;i ra t&aacute;c giả sẽ hướng dẫn bạn c&aacute;c kh&aacute;i niệm cơ bản v&agrave; cung cấp c&aacute;c b&agrave;i tập thực h&agrave;nh để gi&uacute;p bạn nắm vững kiến thức.</p>',1,'2024-11-29 23:14:13','2024-11-29 23:14:13','khoa-hoc-javascript-co-ban',100000,0,4,NULL),(13,5,'Python Nâng cao','http://127.0.0.1:8000/images/2024-11-30-1732965336-post_img.png','Chào mừng các bạn đã đến với khoá học Lập trình Python nâng cao','<h2>Python n&acirc;ng cao có gì?</h2><p>Khác với các khóa PYTHON CƠ BẢN hay BÀI T&Acirc;̣P PYTHON. Với khóa Python n&acirc;ng cao bạn kh&ocirc;ng chỉ&nbsp;sẽ được làm quen với nhi&ecirc;̀u kỹ thu&acirc;̣t ở mức đ&ocirc;̣ cao hơn, khó hơn mà còn được giải thích v&ecirc;̀ nguy&ecirc;n lý hoạt đ&ocirc;̣ng, cách sử dụng cũng như nhi&ecirc;̀u kinh nghi&ecirc;̣m đ&ecirc;́n từ anh Kim Long - founder và là tác giả của nhi&ecirc;̀u khóa học tại Howkteam.com</p><p>Ch&agrave;o mừng c&aacute;c bạn đ&atilde; đến với kho&aacute; học&nbsp;<strong>Lập tr&igrave;nh Python&nbsp;n&acirc;ng cao</strong></p>',0,'2024-11-29 23:15:36','2024-11-29 23:15:36','python-nang-cao',1200000,1000000,3,NULL),(14,5,'Lập trình phần mềm Quản lý quán cafe với C# Winform','http://127.0.0.1:8000/images/2024-12-01-1733061539-post_img.jpg','Trong khóa học này, bạn sẽ được học cách để tạo một Phần mềm quản lý quán café ở mức cơ bản','<h2>Giới thiệu kh&oacute;a học</h2><p>Bạn đ&atilde; học qua&nbsp;<a href=\"https://www.howkteam.vn/course/khoa-hoc-lap-trinh-c-can-ban-1\" target=\"_blank\" rel=\"noopener\">L&Acirc;̣P TRÌNH C# CƠ BẢN</a>? Xong nốt cả&nbsp;<a href=\"https://www.howkteam.vn/course/lap-trinh-winform-co-ban-27\" target=\"_blank\" rel=\"noopener\">L&Acirc;̣P TRÌNH WINFORM</a>&nbsp;lẫn&nbsp;<a href=\"https://www.howkteam.vn/course/su-dung-sql-server-31\" target=\"_blank\" rel=\"noopener\">SQL</a>?</p><p>Bạn đã chán các bài t&acirc;̣p căn bản, muốn thực h&agrave;nh c&aacute;c kiến thức đ&atilde; học v&agrave;o một dự &aacute;n thực tế?</p><p>Hay đơn giản bạn l&agrave; chủ qu&aacute;n caf&eacute;, mong muốn tự tạo n&ecirc;n phần mềm d&agrave;nh cho ch&iacute;nh m&igrave;nh sử dụng?</p><p>Vậy c&ograve;n chần chừ g&igrave; kh&ocirc;ng tham gia ngay kh&oacute;a học&nbsp;<strong>LẬP TR&Igrave;NH PHẦN MỀM QU&Aacute;N CAF&Eacute; VỚI C# WINFORM</strong>?</p><hr /><p><strong>Tham gia đ&oacute;ng g&oacute;p kh&oacute;a học cộng đồng</strong></p><blockquote><p>Nếu bạn muốn gửi đến cộng đồng những kh&oacute;a học do ch&iacute;nh bạn/ team của bạn thực hiện. Đừng ngần ngại&nbsp;<a href=\"https://www.facebook.com/howkteam/\" target=\"_blank\" rel=\"noopener\">li&ecirc;n hệ với Kteam</a>&nbsp;để được hỗ trợ nh&eacute;!</p></blockquote><hr /><h2>N&ocirc;̣i dung khóa học</h2><p>Trong kh&oacute;a học n&agrave;y, bạn sẽ được học c&aacute;ch để tạo một Phần mềm quản l&yacute; qu&aacute;n caf&eacute; ở mức cơ bản. Tuy nhi&ecirc;n, cũng kh&ocirc;ng &iacute;t kỹ thuật th&uacute; vị như:</p><ul><li>Kỹ thuật sử dụng Combobox, NumericUpdown, DataGrid View, DataSet, DataTable, DataRow DataBiding cơ bản &amp; N&acirc;ng cao,&hellip;</li><li>Sử dụng c&aacute;c control cơ bản v&agrave; n&acirc;ng cao trong Winform.</li><li>Ph&acirc;n t&iacute;ch thiết kế cơ sở dữ liệu,&nbsp; ph&acirc;n t&iacute;ch thiết kế m&agrave;n h&igrave;nh.</li><li>Ở SQL bạn sẽ được tiếp cận những thứ rất thực tế như trigger, procedure, function, T-SQL, t&igrave;m kiếm gần đ&uacute;ng, kết nối SQL với ứng dụng Winform d&ugrave;ng ADO.net,&hellip;.</li><li>Ngo&agrave;i ra bạn c&ograve;n được t&igrave;m hiểu về event v&agrave; event n&acirc;ng cao, Chuyển data giữa c&aacute;c form, Ngăn việc đ&oacute;ng chương tr&igrave;nh, thủ thuật giấu control</li><li>Tạo form đăng nhập v&agrave; ph&acirc;n quyền người d&ugrave;ng tr&ecirc;n ứng dụng, th&ecirc;m x&uacute;a sửa dữ liệu từ trang quản trị,&hellip;.</li></ul><p>V&agrave; rất nhiều thủ thuật c&aacute; nh&acirc;n c&ugrave;ng kinh nghiệm thực tế trong qu&aacute; tr&igrave;nh l&agrave;m dự &aacute;n của Kteam</p><p>Nghe rất hấp dẫn cho một dự &aacute;n c&aacute; nh&acirc;n đấy nhỉ?</p><hr /><h2>Đối tượng tham gia</h2><p>Serial d&agrave;nh cho những bạn muốn t&igrave;m hiểu v&agrave; tự tay x&acirc;y dựng một phần mềm quản l&yacute;&nbsp;bằng Winform, cũng như trau dồi v&agrave; thực h&agrave;nh th&ecirc;m c&aacute;c kinh nghiệm sử dụng c&aacute;c kỹ thuật kh&oacute; trong lập tr&igrave;nh C#.</p><p>Sẽ rất ưu thế nếu bạn đ&atilde; nắm vững qua c&aacute;c kiến thức đề cập ở phần giới thiệu, tuy nhi&ecirc;n nếu chưa c&oacute; kinh nghiệm trong c&aacute;c phần đ&oacute;, th&igrave; h&atilde;y đảm bảo bạn c&oacute; đủ c&aacute;c kiến thức nền tảng về C# &amp; SQL như:</p><ul><li><a href=\"https://www.howkteam.vn/course/khoa-hoc-lap-trinh-c-can-ban-1\" target=\"_blank\" rel=\"noopener\">Lập tr&igrave;nh C# Cơ bản</a></li></ul><p><img src=\"https://f.howkteam.vn/Upload/cke/images/1_LOGO%20SHOW%20WEB/1_C%23_AutoC%23/1_C%23%20C%C4%83n%20b%E1%BA%A3n/Thumbnail.jpg\" alt=\"\" /></p><ul><li><a href=\"https://www.howkteam.vn/course/lap-trinh-oop-voi-c-32\" target=\"_blank\" rel=\"noopener\">Lập tr&igrave;nh OOP C#</a></li></ul><p><img src=\"https://f.howkteam.vn/Upload/cke/images/1_LOGO%20SHOW%20WEB/1_C%23_AutoC%23/4_C%23%20H%C6%B0%E1%BB%9Bng%20%C4%91%E1%BB%91i%20t%C6%B0%E1%BB%A3ng%20(OOP)/C%23%20OOP%20howkteam%20course.jpg\" alt=\"\" /></p><ul><li><a href=\"https://www.howkteam.vn/course/khoa-hoc-lap-trinh-c-nang-cao-39\" target=\"_blank\" rel=\"noopener\">Lập trình C# n&acirc;ng cao</a></li></ul><p><img src=\"https://f.howkteam.vn/Upload/cke/images/1_LOGO%20SHOW%20WEB/1_C%23_AutoC%23/3_C%23%20N%C3%A2ng%20cao%20(Advanced)/C%23%20advanced%20HowKteam41.jpg\" alt=\"\" /></p><p>&nbsp;</p><ul><li><a href=\"https://www.howkteam.vn/course/su-dung-sql-server-31\" target=\"_blank\" rel=\"noopener\">Sử dụng SQL &amp; T - SQL</a></li></ul><p><img src=\"https://f.howkteam.vn/Upload/cke/images/1_LOGO%20SHOW%20WEB/11_SQL/S%E1%BB%AD%20d%E1%BB%A5ng%20SQL/SQL-Tutorials.png\" alt=\"\" /></p><ul><li><a href=\"https://www.howkteam.vn/course/lap-trinh-winform-co-ban-27\" target=\"_blank\" rel=\"noopener\">Lập tr&igrave;nh Winform</a></li></ul><p><img src=\"https://f.howkteam.vn/Upload/cke/images/1_LOGO%20SHOW%20WEB/1_C%23_AutoC%23/5_C%23%20Winform/C%23%20Windows%20Forms%20HowKteam%20Course.jpg\" alt=\"\" /></p><p>L&agrave; một trong những kh&oacute;a hướng dẫn về dự &aacute;n thực tế c&oacute; t&iacute;nh &aacute;p dụng cao, đ&ograve;i hỏi nắm chắc kiến thức cơ bản cũng như truyền tải kh&aacute; nhiều kinh nghiệm, kỹ năng kh&oacute;. V&igrave; vậy, h&atilde;y đảm bảo bạn kh&ocirc;ng l&agrave;&nbsp;<strong>newbie &ldquo;</strong>lạc tr&ocirc;i&rdquo;&nbsp;v&agrave;o chốn n&agrave;y nh&eacute;!</p><hr /><h2>Thời lượng khóa học</h2><p>T&ocirc;̉ng thời lượng khóa học kéo dài đ&ecirc;́n 12h, được chia nhỏ thành các bài học ngắn từ 10 &ndash; 80 phút nhằm chi ti&ecirc;́t quá trình thực hi&ecirc;̣n, truy&ecirc;̀n đạt kinh nghi&ecirc;̣m thực t&ecirc;́, giúp bạn ti&ecirc;́p thu li&ecirc;̀n mạch và ứng dụng t&ocirc;́t nh&acirc;́t source code h&ocirc;̃ trợ từ thư vi&ecirc;̣n&nbsp;<a href=\"http://howkteam.com/\" target=\"_blank\" rel=\"noopener\">Howkteam.com</a></p><hr /><h2>Tải Project</h2><p>Trong m&ocirc;̣t s&ocirc;́ trường hợp, vi&ecirc;̣c thực hành của bạn có th&ecirc;̉ kh&ocirc;ng di&ecirc;̃n ra su&ocirc;n sẻ như hướng d&acirc;̃n. Đừng lo lắng!&nbsp; Bạn hoàn toàn có th&ecirc;̉ tham khảo&nbsp;<strong>PROJECT PH&Acirc;̀N M&Ecirc;̀M QUẢN LÝ QUÁN CAFE</strong>&nbsp;trong link b&ecirc;n dưới</p><p><a href=\"https://f.howkteam.vn/Upload/cke/images/2_IMAGE%20TUTORIAL/1_C%23_AutoC%23/10_Qu%E1%BA%A3n%20l%C3%BD%20qu%C3%A1n%20Cafe%20C%23%20Winform/Ph%E1%BA%A7n%20m%E1%BB%81m%20Qu%E1%BA%A3n%20L%C3%BD%20Qu%C3%A1n%20Cafe.zip\" target=\"_blank\" rel=\"noopener\"><img src=\"https://f.howkteam.vn/Upload/cke/images/button/project.png\" alt=\"\" /></a></p><p>N&ecirc;́u bạn th&acirc;́y y&ecirc;u thích ph&acirc;̀n m&ecirc;̀m tr&ecirc;n và mong mu&ocirc;́n x&acirc;y dựng giải pháp ph&acirc;̀n m&ecirc;̀m thi&ecirc;́t thực, chính xác với nhu c&acirc;̀u quán cafe của bạn. Đừng ngại&nbsp;<a href=\"https://www.howkteam.vn/about\" target=\"_blank\" rel=\"noopener\"><strong>li&ecirc;n h&ecirc;̣ đ&ecirc;̉ hợp tác&nbsp;</strong></a>cùng Kteam!</p><hr /><h2>K&ecirc;́t</h2><p>Nếu bạn c&oacute; bất kỳ kh&oacute; khăn hay thắc mắc g&igrave; về kh&oacute;a học, đừng ngần ngại đặt&nbsp;c&acirc;u hỏi trong phần&nbsp;B&Igrave;NH LUẬN&nbsp;b&ecirc;n dưới hoặc trong mục&nbsp;<strong><a href=\"https://www.howkteam.com/questions\" target=\"_blank\" rel=\"noopener\">HỎI &amp; Đ&Aacute;P</a></strong>&nbsp;tr&ecirc;n thư viện&nbsp;<a href=\"http://howkteam.com/\" target=\"_blank\" rel=\"noopener\">Howkteam.com</a>&nbsp;để nhận được sự hỗ trợ từ cộng đồng.</p><blockquote><p>Đừng qu&ecirc;n&nbsp;<strong>Like&nbsp;Facebook</strong>&nbsp;hoặc&nbsp;<strong>+1 Google&nbsp;</strong>cho b&agrave;i học m&agrave; bạn y&ecirc;u th&iacute;ch!&nbsp;</p></blockquote><p>Bạn cũng có th&ecirc;̉&nbsp;<a href=\"https://www.howkteam.vn/donate\" target=\"_blank\" rel=\"noopener\">mời tác giả&nbsp;</a>khóa học m&ocirc;̣t ly cafe hoặc&nbsp;<strong><a href=\"https://www.howkteam.vn/requests\" target=\"_blank\" rel=\"noopener\">Tài trợ&nbsp;</a></strong>cho các khóa học khác, giúp ai cũng có cơ h&ocirc;̣i ti&ecirc;́p c&acirc;̣n GIÁO DỤC MI&Ecirc;̃N PHÍ qua link b&ecirc;n dưới!</p><blockquote><p><strong>https://www.howkteam.vn/donate</strong></p></blockquote><p>Cảm ơn c&aacute;c bạn đ&atilde; lu&ocirc;n đồng h&agrave;nh c&ugrave;ng Kteam. H&atilde;y để lại b&igrave;nh luận hoặc g&oacute;p &yacute; của m&igrave;nh để ph&aacute;t triển b&agrave;i viết tốt hơn. Đừng qu&ecirc;n &ldquo;<strong>Luyện tập &ndash; Thử Th&aacute;ch &ndash; Kh&ocirc;ng ngại kh&oacute;</strong>&rdquo;</p>',0,'2024-12-01 01:58:59','2024-12-01 01:58:59','lap-trinh-phan-mem-quan-ly-quan-cafe-voi-c-winform',2000000,1300000,5,0),(15,5,'Cấu trúc dữ liệu và giải thuật','http://127.0.0.1:8000/images/2024-12-01-1733061876-post_img.png','rong khoá học này, chúng ta sẽ cùng nhau tìm hiểu một cách đơn giản nhất về cấu trúc dữ liệu và giải thuật','<h2>Giới thiệu kh&oacute;a học</h2><p>Bạn đ&atilde; từng đau đầu với c&aacute;c cấu tr&uacute;c stack, queue,.. hoặc cảm thấy cực kỳ kh&oacute; khăn với c&aacute;c thuật to&aacute;n sắp xếp, t&igrave;m kiếm được sử dụng trong lập tr&igrave;nh. Đừng lo lắng!&nbsp;Trong kho&aacute; học n&agrave;y, ch&uacute;ng ta sẽ c&ugrave;ng nhau t&igrave;m hiểu một c&aacute;ch đơn giản nhất&nbsp;về cấu tr&uacute;c dữ liệu v&agrave; giải thuật, cũng như gi&uacute;p bạn nắm r&otilde; hơn về c&aacute;c kiến thức n&agrave;y.</p><p>H&atilde;y c&ugrave;ng&nbsp;xem cấu tr&uacute;c dữ liệu v&agrave; giải thuật c&oacute; g&igrave; đ&aacute;ng sợ kh&ocirc;ng&nbsp;nh&eacute;!</p><hr /><h2>Đối tượng tham gia</h2><p>Kh&oacute;a học n&agrave;y d&agrave;nh cho c&aacute;c bạn vừa học xong một ng&ocirc;n ngữ lập tr&igrave;nh, đang học v&agrave; t&igrave;m hiểu về CTDL &amp; GT, đang mong muốn củng cố kiến thức của m&igrave;nh về vấn đề n&agrave;y hoặc muốn n&acirc;ng cấp khả năng code, r&egrave;n luyện tư duy bản th&acirc;n&hellip;.</p><p>Bạn sẽ l&agrave; người n&ecirc;n học kh&oacute;a học n&agrave;y nếu bạn đang mong muốn những điều sau:</p><ul><li>C&oacute; nhiều lựa chọn hơn trong giải quyết c&aacute;c vấn đề gặp phải</li><li>Hiểu được c&aacute;ch một số h&agrave;m c&oacute; sẵn trong c&aacute;c ng&ocirc;n ngữ lập tr&igrave;nh hoạt động</li><li>R&egrave;n luyện tư duy giải quyết vấn đề kh&ocirc;ng chỉ trong Tin học m&agrave; c&ograve;n trong cuộc sống</li><li>Sử dụng trong phỏng vấn xin việc, đặc biệt l&agrave; c&aacute;c c&ocirc;ng ty lớn như Google, Facebook, Amazon, &hellip;</li></ul><hr /><h2>Kiến thức cần c&oacute;</h2><p>Để c&oacute; thể theo d&otilde;i kho&aacute; học n&agrave;y một c&aacute;ch tốt nhất, bạn n&ecirc;n c&oacute; kiến thức cơ bản về c&aacute;c phần:</p><ul><li>Biến, kiểu dữ liệu, to&aacute;n tử trong C++</li><li>C&acirc;u điều kiện, v&ograve;ng lặp, h&agrave;m trong C++</li><li>Mảng trong C++</li><li>Lập tr&igrave;nh hướng đối tượng trong C++</li><li>Nhập, xuất dữ liệu th&ocirc;ng qua file trong C++</li></ul><hr /><h2>Kiến thức sẽ học trong kho&aacute; học</h2><p>Trong kho&aacute; học n&agrave;y, m&igrave;nh sẽ dạy c&aacute;c bạn về:</p><ul><li>Độ phức tạp thời gian BigO</li><li>Cấu tr&uacute;c dữ liệu: stack, queue, deque, graph, tree, trie, &hellip;</li></ul><ul><li>Thuật to&aacute;n: sắp xếp, t&igrave;m kiếm nhị ph&acirc;n, t&igrave;m đường đi ngắn nhất tr&ecirc;n đồ thị, &hellip;</li></ul>',0,'2024-12-01 02:04:36','2024-12-01 02:04:36','cau-truc-du-lieu-va-giai-thuat',1800000,0,NULL,0),(16,5,'Bài tập Python tự luyện','http://127.0.0.1:8000/images/2024-12-01-1733061993-post_img.png','Serial dành cho những bạn cần luyện tập phương pháp, tu duy lập trìn','<h2>Tổng quan Serial</h2><p>Serial d&agrave;nh cho những bạn cần luyện tập phương ph&aacute;p, tu duy lập tr&igrave;nh. L&agrave;m quen với c&aacute;c b&agrave;i to&aacute;n trong lập tr&igrave;nh, ngẫu nhi&ecirc;n&nbsp;từ cơ bản đến n&acirc;ng cao. Nội dung Serial n&agrave;y được ph&acirc;n t&aacute;ch&nbsp;<strong>chi tiết nhất</strong>&nbsp;c&oacute; thể, nhằm gi&uacute;p c&aacute;c bạn&nbsp;<strong>dễ hiểu</strong>&nbsp;v&agrave;&nbsp;<strong>thực h&agrave;nh được ngay</strong>.</p><p>Bạn n&ecirc;n tự l&agrave;m lại&nbsp;từng b&agrave;i tập tr&ecirc;n&nbsp;video để c&oacute; kết quả tốt nhất.</p>',0,'2024-12-01 02:06:33','2024-12-01 02:06:33','bai-tap-python-tu-luyen',0,0,NULL,0),(17,5,'Lập trình Http Request với C#','http://127.0.0.1:8000/images/2024-12-01-1733062101-post_img.png','Chào mừng các bạn đến với khóa học LẬP TRÌNH HTTP REQUEST VỚI C#','<h2>Giới thiệu kh&oacute;a học</h2><p>Ch&agrave;o mừng c&aacute;c bạn đến với kh&oacute;a học&nbsp;<strong>LẬP TR&Igrave;NH&nbsp;HTTP REQUEST VỚI C#</strong>, kh&oacute;a học đầu ti&ecirc;n trong cụm kh&oacute;a học về&nbsp;<strong>Auto C#&nbsp;</strong>của&nbsp;<a href=\"http://howkteam.com/\" target=\"_blank\" rel=\"noopener\">Howkteam.com</a>. Mục đ&iacute;ch hướng tới l&agrave; c&aacute;c bạn c&oacute; thể l&agrave;m auto bằng C# m&agrave; kh&ocirc;ng cần d&ugrave;ng tới c&aacute;c ng&ocirc;n ngữ như AutoIT, C++,&hellip;</p><blockquote><p><strong>Tham gia đ&oacute;ng g&oacute;p kh&oacute;a học cộng đồng</strong></p><p>Nếu bạn muốn gửi đến cộng đồng những kh&oacute;a học do ch&iacute;nh bạn/ team của bạn thực hiện. Đừng ngần ngại&nbsp;<a href=\"https://www.facebook.com/howkteam/\" target=\"_blank\" rel=\"noopener\">li&ecirc;n hệ với Kteam</a>&nbsp;để được hỗ trợ nh&eacute;!</p></blockquote><hr /><h2>Nội dung kh&oacute;a học</h2><p>Trong kho&aacute; học n&agrave;y c&aacute;c bạn sẽ được hướng dẫn về:</p><ul><li>C&aacute;ch lấy dữ liệu từ một website.</li><li>Get &amp; post dữ liệu (v&iacute; dụ: chấp nhận bạn b&egrave; facebook; lấy dữ liệu từ website nghe nhạc)</li><li>Kỹ thuật vượt normal captcha, re-captcha.</li><li>Upload file l&ecirc;n website hoặc hệ thống bất kỳ</li><li>Tải h&igrave;nh ảnh, file, video&hellip;</li><li>Verify email, fake IP</li></ul><p>V&agrave; rất nhiều thủ thuật c&aacute; nh&acirc;n c&ugrave;ng kinh nghiệm thực tế từ t&aacute;c giả.</p><hr /><h2>Đối tượng tham gia</h2><p>Serial n&agrave;y d&agrave;nh cho tất cả những bạn l&agrave; d&acirc;n MMO &nbsp;v&agrave; c&aacute;c bạn muốn học, t&igrave;m hiểu s&acirc;u hơn về lập tr&igrave;nh tools (chương tr&igrave;nh tự động) sử dụng C#.</p><p>Hoặc muốn tự động h&oacute;a c&aacute;c phần mềm, chức năng, chương tr&igrave;nh cho doanh nghiệp của m&igrave;nh.</p><hr /><h2>Kiến thức cần c&oacute;</h2><p>Để c&oacute; đủ khả năng học hiểu c&aacute;c nội dung được đề cập đến trong kh&oacute;a học. Bạn n&ecirc;n c&oacute; tối thiểu kiến thức về c&aacute;c phần:</p><ul><li><a href=\"https://www.howkteam.vn/course/khoa-hoc-lap-trinh-c-can-ban-1\" target=\"_blank\" rel=\"noopener\">LẬP TR&Igrave;NH C# CƠ BẢN</a></li></ul><p><a href=\"https://www.howkteam.vn/course/khoa-hoc-lap-trinh-c-can-ban-1\" target=\"_blank\" rel=\"noopener\"><img src=\"https://lh3.googleusercontent.com/d/0BwqtkOhv7GE-cGdkV2Y0b09fZDQ\" alt=\"\" /></a></p><ul><li><a href=\"https://www.howkteam.vn/course/lap-trinh-keylogger-voi-c-application-25\" target=\"_blank\" rel=\"noopener\">LẬP TR&Igrave;NH KEYLOGGER VỚI C#</a></li></ul><p><a href=\"https://www.howkteam.vn/course/lap-trinh-keylogger-voi-c-application-25\" target=\"_blank\" rel=\"noopener\"><img src=\"https://lh3.googleusercontent.com/d/0BwqtkOhv7GE-c2l3NHk5M09sUDA\" alt=\"\" /></a></p><ul><li><a href=\"https://www.howkteam.vn/course/lap-trinh-winform-co-ban-27\" target=\"_blank\" rel=\"noopener\">LẬP TR&Igrave;NH WINFORM CƠ BẢN</a></li></ul><p><a href=\"https://www.howkteam.vn/course/lap-trinh-winform-co-ban-27\" target=\"_blank\" rel=\"noopener\"><img src=\"https://lh3.googleusercontent.com/d/0BwqtkOhv7GE-RkZ4ZkFENHVfUFk\" /></a></p><p>Ngo&agrave;i ra, cũng n&ecirc;n trau dồi th&ecirc;m kiến thức kh&aacute;c qua c&aacute;c project thực tế như:</p><ul><li><a href=\"https://www.howkteam.vn/course/lap-trinh-tu-dien-noi-voi-c-winform-16\" target=\"_blank\" rel=\"noopener\">LẬP TR&Igrave;NH TỪ ĐIỂN N&Oacute;I VỚI C# WINFORM</a></li></ul><p><a href=\"https://www.howkteam.vn/course/lap-trinh-tu-dien-noi-voi-c-winform-16\" target=\"_blank\" rel=\"noopener\"><img src=\"https://lh3.googleusercontent.com/d/0BwqtkOhv7GE-SXc4ek9qanFmaWM\" alt=\"\" /></a></p><ul><li><a href=\"https://www.howkteam.vn/course/lap-trinh-game-caro-voi-c-winform-14\" target=\"_blank\" rel=\"noopener\">LẬP TR&Igrave;NH GAME CARO VỚI C# WINFORM</a></li></ul><p><a href=\"https://www.howkteam.vn/course/lap-trinh-game-caro-voi-c-winform-14\" target=\"_blank\" rel=\"noopener\"><img src=\"https://lh3.googleusercontent.com/d/0BwqtkOhv7GE-SktyMG1YdXZMQkE\" alt=\"\" /></a></p><ul><li><a href=\"https://www.howkteam.vn/course/lap-trinh-ung-dung-lap-lich-voi-c-winform-17\" target=\"_blank\" rel=\"noopener\">LẬP TR&Igrave;NH ỨNG DỤNG LẬP LỊCH BẰNG C# WINFORM</a></li></ul><p><a href=\"https://www.howkteam.vn/course/lap-trinh-ung-dung-lap-lich-voi-c-winform-17\" target=\"_blank\" rel=\"noopener\"><img src=\"https://lh3.googleusercontent.com/d/0BwqtkOhv7GE-aHFPUTYzNFVQcVk\" alt=\"\" /></a></p><p>Thời lượng mỗi video từ 3 &ndash;&nbsp;30 ph&uacute;t nhằm chia nhỏ qu&aacute; tr&igrave;nh thực hiện, gi&uacute;p bạn dễ tiếp thu v&agrave; ứng dụng source code hỗ trợ từ thư viện<a href=\"http://howkteam.com/\" target=\"_blank\" rel=\"noopener\">&nbsp;Howkteam.com</a></p><hr /><h2>Phần mềm sử dụng</h2><p>Để việc thao t&aacute;c theo hướng dẫn được tốt nhất bạn n&ecirc;n c&agrave;i đặt c&aacute;c phần mềm</p><ul><li><a href=\"https://www.howkteam.vn/Course/C-Basics/Cai-dat-moi-truong-phat-trien-IDE-Visual-studio-2015-19\" target=\"_blank\" rel=\"noopener\">Visual Sutdio mới nhất (2015 hoặc 2017 community)&nbsp;</a></li><li>Tr&igrave;nh duyệt web (n&ecirc;n chọn Google Chrome c&oacute; hỗ trợ phần devtools kh&aacute; hữu &iacute;ch)</li><li><a href=\"https://drive.google.com/open?id=1a48sGlQkqJ8qIWCc9tfbOulLTExezdiB\" target=\"_blank\" rel=\"noopener\">Phần mềm Regex Test</a>&nbsp;</li></ul><hr /><h2>T&agrave;i liệu tham khảo</h2><p>Nếu qu&aacute; tr&igrave;nh thực h&agrave;nh của bạn&nbsp;kh&ocirc;ng diễn ra su&ocirc;n sẻ như b&agrave;i hướng dẫn thực hiện, đừng lo lắng!</p><p>Bạn c&oacute; thể tham khảo Project mẫu của Kteam ở mỗi b&agrave;i bao gồm nội dung t&oacute;m tắt b&agrave;i học, source code tham khảo v&agrave; project tải xuống.</p>',0,'2024-12-01 02:08:21','2024-12-01 02:08:21','lap-trinh-http-request-voi-c',1500000,1000000,NULL,0),(18,5,'Khóa học lập trình C# căn bản','http://127.0.0.1:8000/images/2024-12-01-1733062149-post_img.jpg','Bạn mới bắt đầu học lập trình? Bạn đang muốn học thêm ngôn ngữ lập trình mới? C# là lựa chọn hoàn hảo để đáp ứng các nhu cầu trên.','<h2>Giới thiệu kh&oacute;a học</h2><p>Bạn mới bắt đầu học lập tr&igrave;nh? Bạn đang muốn học th&ecirc;m ng&ocirc;n ngữ lập tr&igrave;nh mới? C# l&agrave; lựa chọn ho&agrave;n hảo để đ&aacute;p ứng c&aacute;c nhu cầu tr&ecirc;n.</p><p><strong>Ng&ocirc;n ngữ C#&nbsp;</strong>l&agrave; một ng&ocirc;n ngữ mới, cấu tr&uacute;c r&otilde; r&agrave;ng, dễ hiểu v&agrave; dễ học. C# thừa hưởng những ưu việt từ ng&ocirc;n ngữ Java, C, C++ cũng như khắc phục được những hạn chế của c&aacute;c ng&ocirc;n ngữ n&agrave;y. C# l&agrave; ng&ocirc;n ngữ lập tr&igrave;nh hướng đối tượng được ph&aacute;t triển bởi Microsoft, được x&acirc;y dựng dựa tr&ecirc;n C++ v&agrave; Java.</p><p>Kho&aacute; học lần n&agrave;y sẽ mang đến to&agrave;n bộ những kiến thức cơ bản về C#. Ch&agrave;o mừng c&aacute;c bạn đ&atilde; đến với kho&aacute; học&nbsp;<strong>LẬP TR&Igrave;NH C# CƠ BẢN</strong>&nbsp;của Kteam.</p><hr /><p><strong>Tham gia đ&oacute;ng g&oacute;p kh&oacute;a học cộng đồng</strong></p><blockquote><p>Nếu bạn muốn gửi đến cộng đồng những kh&oacute;a học do ch&iacute;nh bạn/ team của bạn thực hiện. Đừng ngần ngại&nbsp;<a href=\"https://www.facebook.com/howkteam/\" target=\"_blank\" rel=\"noopener\">li&ecirc;n hệ với Kteam</a>&nbsp;để được hỗ trợ nh&eacute;!</p></blockquote><hr /><h2>Đối tượng tham gia</h2><p>Serial n&agrave;y d&agrave;nh cho tất cả c&aacute;c bạn y&ecirc;u th&iacute;ch lập tr&igrave;nh v&agrave; mong muốn bắt đầu với một ng&ocirc;n ngữ cơ bản. Dĩ nhi&ecirc;n nếu bạn c&oacute; một ch&uacute;t kiến thức cơ bản về lập tr&igrave;nh hoặc đ&atilde; từng học qua ng&ocirc;n ngữ kh&aacute;c sẽ l&agrave; một lợi thế.</p><p>Thời lượng mỗi video từ 3 &ndash;&nbsp;30 ph&uacute;t nhằm chia nhỏ qu&aacute; tr&igrave;nh thực hiện, gi&uacute;p bạn dễ tiếp thu v&agrave; ứng dụng source code hỗ trợ từ thư viện<a href=\"http://howkteam.com/\" target=\"_blank\" rel=\"noopener\">&nbsp;Howkteam.com</a></p><hr /><h2>Kiến thức truyền tải</h2><p>Kho&aacute; học tập trung v&agrave;o:</p><ul><li>L&agrave;m quen với ng&ocirc;n ngữ lập tr&igrave;nh C# v&agrave; c&ocirc;ng cụ lập tr&igrave;nh Visual Studio.</li><li>C&aacute;c kh&aacute;i niệm nền tảng trong C#.</li><li>Một số từ kho&aacute;, c&uacute; ph&aacute;p v&agrave; cấu tr&uacute;c cơ bản trong C#.</li><li>N&acirc;ng cao tư duy bằng c&aacute;ch sử dụng C# để giải một số thuật to&aacute;n cơ bản.</li><li>V&agrave; nhiều kỹ thuật hay ho kh&aacute;c.</li></ul>',0,'2024-12-01 02:09:09','2024-12-01 02:09:09','khoa-hoc-lap-trinh-c-can-ban',0,0,NULL,0),(19,5,'Lập trình Python cơ bản','http://127.0.0.1:8000/images/2024-12-01-1733062299-post_img.png','Với mục đích giới thiệu đến mọi người NGÔN NGỮ PYTHON, một ngôn ngữ lập trình khá mới mẻ so với C, C++, Java, PHP ở Việt Nam.','<h2>Giới thiệu kh&oacute;a học</h2><p>Với mục đ&iacute;ch giới thiệu đến mọi người&nbsp;<a href=\"https://www.howkteam.com/learn/lap-trinh/lap-trinh-python-7-37\" target=\"_blank\" rel=\"noopener\"><strong>NG&Ocirc;N NGỮ PYTHON</strong></a>, một ng&ocirc;n ngữ lập tr&igrave;nh kh&aacute; mới mẻ so với C, C++, Java, PHP ở Việt Nam.</p><p>Th&ocirc;ng qua kh&oacute;a học&nbsp;<strong>LẬP TR&Igrave;NH PYTHON CƠ BẢN</strong>, Kteam sẽ hướng dẫn c&aacute;c bạn kiến thức cơ bản của Python. Để từ đ&oacute;,&nbsp;c&oacute; được nền tảng cho ph&eacute;p bạn tiếp tục t&igrave;m hiểu những kiến thức tuyệt vời kh&aacute;c của Python hoặc l&agrave; một ng&ocirc;n ngữ kh&aacute;c.</p><p>Cụ thể trong kh&oacute;a học n&agrave;y, Kteam sẽ giới thiệu với c&aacute;c bạn Python ở phi&ecirc;n bản&nbsp;<strong>Python 3.X&nbsp;</strong>(3.10)</p><hr /><p><strong>Tham gia đ&oacute;ng g&oacute;p kh&oacute;a học cộng đồng</strong></p><blockquote><p>Nếu bạn muốn gửi đến cộng đồng những kh&oacute;a học do ch&iacute;nh bạn/ team của bạn thực hiện. Đừng ngần ngại&nbsp;<a href=\"https://www.facebook.com/howkteam/\" target=\"_blank\" rel=\"noopener\">li&ecirc;n hệ với Kteam</a>&nbsp;để được hỗ trợ nh&eacute;!</p></blockquote><hr /><h2>Đối tượng tham gia</h2><p>Serial n&agrave;y d&agrave;nh cho c&aacute;c bạn muốn học, t&igrave;m hiểu về lập tr&igrave;nh v&agrave; muốn t&igrave;m một ng&ocirc;n ngữ dễ học cho người mới bắt đầu, c&oacute; khuynh hướng l&agrave;m về mảng &ldquo;Khoa học m&aacute;y t&iacute;nh&rdquo;.&nbsp;</p><p>Ngo&agrave;i ra, kh&oacute;a&nbsp;<strong>LẬP TR&Igrave;NH PYTHON CƠ BẢN</strong>&nbsp;cũng d&agrave;nh cho những bạn c&oacute; nhiều &yacute; tưởng nhưng thiếu kiến thức về lập tr&igrave;nh, muốn c&oacute; một ng&ocirc;n ngữ đơn giản, dễ học cho việc hiện thực h&oacute;a &yacute; tưởng đ&oacute;.</p><p>Kh&oacute;a học n&agrave;y kh&ocirc;ng c&oacute; những y&ecirc;u cầu khắt khe về kiến thức nền. Do đ&oacute; nếu bạn l&agrave; một người kh&ocirc;ng biết nhiều về lập tr&igrave;nh cũng c&oacute; thể tiếp cận - Bạn cũng kh&ocirc;ng cần phải l&agrave; một thi&ecirc;n t&agrave;i to&aacute;n học</p>',0,'2024-12-01 02:11:39','2024-12-01 02:11:39','lap-trinh-python-co-ban',100000,500000,NULL,0);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorite_courses`
--

DROP TABLE IF EXISTS `favorite_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `favorite_courses` (
  `id_user` int NOT NULL,
  `id_course` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`,`id_course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorite_courses`
--

LOCK TABLES `favorite_courses` WRITE;
/*!40000 ALTER TABLE `favorite_courses` DISABLE KEYS */;
INSERT INTO `favorite_courses` VALUES (5,11,'2024-12-01 09:30:33','2024-12-01 09:30:33'),(5,12,'2024-12-01 09:30:17','2024-12-01 09:30:17'),(5,13,'2024-12-01 09:30:36','2024-12-01 09:30:36');
/*!40000 ALTER TABLE `favorite_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_relationships`
--

DROP TABLE IF EXISTS `invoice_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_relationships` (
  `id_invoice` int NOT NULL,
  `id_course` int NOT NULL,
  PRIMARY KEY (`id_invoice`,`id_course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_relationships`
--

LOCK TABLES `invoice_relationships` WRITE;
/*!40000 ALTER TABLE `invoice_relationships` DISABLE KEYS */;
INSERT INTO `invoice_relationships` VALUES (15,11);
/*!40000 ALTER TABLE `invoice_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ho_ten` varchar(255) DEFAULT NULL,
  `gia_goc` int NOT NULL,
  `gia_giam` int NOT NULL,
  `ghi_chu` varchar(1000) DEFAULT NULL,
  `trang_thai` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `so_dien_thoai` varchar(45) DEFAULT NULL,
  `id_user` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (15,'admin',2000000,1500000,NULL,'Đã thanh toán','admin',NULL,5,'2024-12-01 12:21:48','2024-12-01 12:21:48');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson_relationships`
--

DROP TABLE IF EXISTS `lesson_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lesson_relationships` (
  `id_course` int NOT NULL,
  `id_lesson` int NOT NULL,
  PRIMARY KEY (`id_course`,`id_lesson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson_relationships`
--

LOCK TABLES `lesson_relationships` WRITE;
/*!40000 ALTER TABLE `lesson_relationships` DISABLE KEYS */;
/*!40000 ALTER TABLE `lesson_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lessons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lesson_title` varchar(200) NOT NULL,
  `video_id` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_author` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lessons`
--

LOCK TABLES `lessons` WRITE;
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` VALUES (2,'Bài 1: Winform - Chương trình quản lý sinh viên.','Nf3u_3BCGG0','2023-10-29 21:42:54','2023-10-31 05:17:38',2),(6,'Bài 2: Ứng dụng ChatGPT Đọc và Ghi Đối Tượng Dưới Dạng XML','OXq9jCfUw7o','2023-10-31 05:18:30','2023-10-31 05:18:30',2),(7,'Bài 3.1: Ứng dụng LINQ+GPT Thêm, Sửa, Xóa, Tìm kiếm','i8xxhUPgc-w','2023-10-31 05:19:57','2023-10-31 05:19:57',2),(8,'Bài 3.2: Ứng dụng LINQ+GPT Thêm, Sửa, Xóa, Tìm kiếm','fKOFO9v5BUM','2023-10-31 05:21:11','2024-09-27 00:35:53',1);
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pictures` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `picture_name` varchar(255) DEFAULT NULL,
  `id_author` int unsigned NOT NULL DEFAULT '0',
  `picture_image` varchar(1000) NOT NULL,
  `picture_type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `slug` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_categories`
--

LOCK TABLES `post_categories` WRITE;
/*!40000 ALTER TABLE `post_categories` DISABLE KEYS */;
INSERT INTO `post_categories` VALUES (7,'Microsoft Office','microsoft-office'),(8,'Lập trình','lap-trinh'),(9,'Photoshop','photoshop'),(10,'Adobe','adobe'),(11,'Phần cứng','phan-cung'),(12,'Xu hướng công nghệ','xu-huong-cong-nghe'),(13,'Tư vấn lộ trình','tu-van-lo-trinh'),(14,'Công cụ phát triển','cong-cu-phat-trien'),(15,'Học trực tuyến','hoc-truc-tuyen'),(16,'Kỹ năng mềm','ky-nang-mem'),(17,'Bảo mật thông tin','bao-mat-thong-tin'),(18,'Internet và mạng','internet-va-mang'),(19,'Công nghệ AI','cong-nghe-ai'),(20,'Data Science','data-science'),(21,'Thiết kế đồ họa','thiet-ke-do-hoa'),(22,'SEO & Digital Marketing','seo-digital-marketing'),(23,'Ứng dụng di động','ung-dung-di-dong'),(24,'Hướng dẫn sử dụng phần mềm','huong-dan-su-dung-phan-mem'),(25,'Game & Giải trí','game-giai-tri'),(26,'Phát triển cá nhân','phat-trien-ca-nhan');
/*!40000 ALTER TABLE `post_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `post_author` int unsigned NOT NULL DEFAULT '0',
  `post_title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_image` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `comment_count` int NOT NULL DEFAULT '0',
  `post_view` int DEFAULT '0',
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `category` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_author` (`post_author`),
  KEY `type_status_date` (`post_date`,`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (40,5,'Mệnh đề WHERE trong SQL','<p>Nếu đang học lập tr&igrave;nh, ắt hẳn SQL kh&ocirc;ng c&ograve;n qu&aacute; xa lạ với bạn. Đ&acirc;y l&agrave; ng&ocirc;n ngữ truy vấn c&oacute; cấu tr&uacute;c, gi&uacute;p người d&ugrave;ng xử l&yacute; th&ocirc;ng tin đơn giản v&agrave; dễ d&agrave;ng hơn. Ch&iacute;nh v&igrave; thế, b&ecirc;n cạnh học ng&ocirc;n ngữ lập tr&igrave;nh, bất cứ ai muốn ph&aacute;t triển trong ng&agrave;nh n&agrave;y đều cần biết SQL.</p><p>Học SQL kh&ocirc;ng kh&oacute;. Quantrimang.com sẽ cung cấp cho bạn những b&agrave;i học cơ bản nhất. Ở b&agrave;i viết n&agrave;y, ch&uacute;ng ta h&atilde;y c&ugrave;ng nhau t&igrave;m hiểu về WHERE trong SQL nh&eacute;!</p><p>Mệnh đề WHERE trong&nbsp;<a title=\"Học SQL tr&ecirc;n Quantrimang.com\" href=\"https://quantrimang.com/cong-nghe/sql\" target=\"_blank\" rel=\"noopener\">SQL</a>&nbsp;được sử dụng để chỉ định điều kiện khi lấy dữ liệu từ một bảng hoặc nối nhiều bảng với nhau. Nếu điều kiện được thỏa m&atilde;n th&igrave; n&oacute; chỉ trả về những gi&aacute; trị cụ thể trong bảng.</p><p>Mệnh đề WHERE cũng được sử dụng để lọc c&aacute;c bản ghi v&agrave; chỉ lấy những bản ghi ph&ugrave; hợp với y&ecirc;u cầu hoặc thực sự cần thiết.</p><p>WHERE kh&ocirc;ng đi một m&igrave;nh m&agrave; thường được sử dụng kết hợp với&nbsp;<a href=\"https://quantrimang.com/hoc/lenh-select-trong-sql-143756\">lệnh SELECT</a>,&nbsp;<a title=\"Lệnh UPDATE trong SQL\" href=\"https://quantrimang.com/hoc/lenh-update-trong-sql-143766\" target=\"_blank\" rel=\"noopener\">lệnh UPDATE</a>,&nbsp;<a href=\"https://quantrimang.com/hoc/lenh-delete-trong-sql-157812\">lệnh DELETE</a>&nbsp;v&agrave; rất nhiều lệnh kh&aacute;c. Bạn sẽ được nh&igrave;n thấy v&iacute; dụ về sự kết hợp n&agrave;y trong những b&agrave;i tiếp theo.</p><h2><strong>C&uacute; ph&aacute;p mệnh đề WHERE</strong></h2><p>Như đ&atilde; n&oacute;i ở tr&ecirc;n, mệnh đề WHERE được d&ugrave;ng với c&aacute;c lệnh li&ecirc;n quan đến việc xử l&yacute; dữ liệu, v&igrave; vậy ta sẽ xem x&eacute;t mệnh đề n&agrave;y trong lệnh SELECT, một sự kết hợp thường xuy&ecirc;n được nh&igrave;n thấy nhất trong SQL.</p><div class=\"codebar\">&nbsp;</div><pre id=\"pre0\" class=\"prettyprint hljs language-sql\"><code>SELECT cot1, cot2,.... cotN FROM TEN_BANGWHERE [DIEU_KIEN]</code></pre><p>Bạn c&oacute; thể chỉ định điều kiện bằng c&aacute;ch sử dụng c&aacute;c to&aacute;n tử logic hoặc so s&aacute;nh như &gt;, &lt;, LIKE, NOT,...</p><h2>C&aacute;c to&aacute;n tử trong Mệnh đề WHERE</h2><p>C&aacute;c to&aacute;n tử sau c&oacute; thể được sử dụng trong mệnh đề WHERE:</p><table class=\"table-striped\" dir=\"ltr\" border=\"1\" cellpadding=\"5\"><thead><tr><td><strong>To&aacute;n tử</strong></td><td><strong>M&ocirc; tả</strong></td></tr></thead><tbody><tr><td>=</td><td>Bằng</td></tr><tr><td>&gt;</td><td>Lớn hơn</td></tr><tr><td>&lt;</td><td>Nhỏ hơn</td></tr><tr><td>&gt;=</td><td>Lớn hơn hoặc bằng</td></tr><tr><td>&lt;=</td><td>Nhỏ hơn hoặc bằng</td></tr><tr><td>&lt;&gt;</td><td>Kh&ocirc;ng c&ocirc;ng bằng.&nbsp;<strong>Lưu &yacute;</strong>:&nbsp;<em>Trong một số phi&ecirc;n bản SQL, to&aacute;n tử n&agrave;y c&oacute; thể được viết l&agrave;</em>&nbsp;!=</td></tr><tr><td>BETWEEN</td><td>Giữa một phạm vi nhất định</td></tr><tr><td>LIKE</td><td>T&igrave;m kiếm dựa tr&ecirc;n mẫu tương tự</td></tr><tr><td>IN</td><td><div><div>Để chỉ định nhiều gi&aacute; trị c&oacute; thể c&oacute; cho một cột</div></div></td></tr></tbody></table><h2><strong>V&iacute; dụ về mệnh đề WHERE</strong></h2><p>Ta tiếp tục sử dụng lại bảng NHANVIEN đ&atilde; d&ugrave;ng trong c&aacute;c v&iacute; dụ trước:</p><div class=\"codebar\">&nbsp;</div><pre id=\"pre1\" class=\"language- prettyprint language-none\"><code>+----+----------+-----+-----------+---------+| ID |   TEN    | TUOI|  DIACHI   |   LUONG | +----+----------+-----+-----------+---------+ | 1  | Thanh    |  24 | Haiphong  | 2000.00 | | 2  | Loan     |  26 | Hanoi     | 1500.00 | | 3  | Nga      |  24 | Hanam     | 2000.00 | | 4  | Mạnh     |  29 | Hue       | 6500.00 | | 5  | Huy      |  28 | Hatinh    | 8500.00 | | 6  | Cao      |  23 | HCM       | 4500.00 | | 7  | Lam      |  29 | Hanoi     | 15000.00| +----+----------+-----+-----------+---------+</code></pre><h3>V&iacute; dụ 1:</h3><p>Giờ ta sẽ d&ugrave;ng WHERE kết hợp với SELECT để lọc ra những nh&acirc;n vi&ecirc;n c&oacute; lương cao hơn 4500:</p><div class=\"codebar\">&nbsp;</div><pre id=\"pre2\" class=\"prettyprint hljs language-sql\"><code>SQL&gt; SELECT ID, TEN, LUONG FROM NHANVIENWHERE LUONG &gt; 4500;</code></pre><p>Kh&ocirc;ng c&oacute; lỗi n&agrave;o xảy ra th&igrave; kết quả trả về sẽ l&agrave;:</p><div class=\"codebar\">&nbsp;</div><pre id=\"pre3\" class=\"language- prettyprint language-none\"><code>+----+----------+-----+-----------+---------+| ID |   TEN    | TUOI|  DIACHI   |   LUONG | +----+----------+-----+-----------+---------+  | 4  | Mạnh     |  29 | Hue       | 6500.00 | | 5  | Huy      |  28 | Hatinh    | 8500.00 |  | 7  | Lam      |  29 | Hanoi     | 15000.00| +----+----------+-----+-----------+---------+</code></pre><h3>V&iacute; dụ 2:</h3><p>B&acirc;y giờ ta sẽ chỉ lấy ID, TEN, LUONG từ bảng NHANVIEN cho nh&acirc;n vi&ecirc;n c&oacute; t&ecirc;n l&agrave; Mạnh. C&oacute; một lưu &yacute; cho bạn trong phần n&agrave;y l&agrave; tất cả c&aacute;c chuỗi cần được đặt trong cặp dấu \' \', nhưng gi&aacute; trị l&agrave; số th&igrave; lại kh&ocirc;ng cần cho v&agrave;o dấu nh&aacute;y đơn, giống như v&iacute; dụ 1.</p><div class=\"codebar\">&nbsp;</div><pre id=\"pre4\" class=\"prettyprint hljs language-sql\"><code>SQL&gt; SELECT ID, TEN, LUONG FROM NHANVIENWHERE TEN = \'Mạnh\';</code></pre><p>Kết quả trả về sẽ l&agrave;:</p><div class=\"codebar\">&nbsp;</div><pre id=\"pre5\" class=\"language- prettyprint language-none\"><code>+----+----------+-----+-----------+---------+| ID |   TEN    | TUOI|  DIACHI   |   LUONG | +----+----------+-----+-----------+---------+  | 4  | Mạnh     |  29 | Hue       | 6500.00 | +----+----------+-----+-----------+---------+</code></pre><div id=\"articleads2\" class=\"adbox in-article adsense\"><div id=\"fzid_4889239415\" class=\"adsfallback adswrapper adsviewed\" data-bid=\"12468\" data-zid=\"468\">Mệnh đề WHERE với to&aacute;n tử AND, OR</div></div><p>Bạn c&oacute; thể d&ugrave;ng to&aacute;n tử AND v&agrave; OR với nhau trong SQL để kết hợp nhiều điều kiện trong một mệnh đề WHERE để lọc c&aacute;c h&agrave;ng đ&aacute;p ứng ti&ecirc;u ch&iacute; cụ thể. To&aacute;n tử AND sẽ đảm bảo chỉ lọc c&aacute;c h&agrave;ng được chọn, đ&aacute;p ứng tất cả điều kiện. To&aacute;n tử OR sẽ lọc bản ghi thỏa m&atilde;n một điều kiện cụ thể. Tuy nhi&ecirc;n, điều n&agrave;y chỉ được d&ugrave;ng khi một điều kiện kh&ocirc;ng đủ để lọc tất cả c&aacute;c h&agrave;ng cần thiết.</p><p>C&uacute; ph&aacute;p sau đang d&ugrave;ng to&aacute;n tử AND v&agrave; OR trong điều kiện WHERE của SQL.</p><div class=\"codebar\">&nbsp;</div><pre id=\"pre6\" class=\"prettyprint hljs language-sql\"><code>WHERE (condition1 OR condition2) AND condition3;</code></pre><p>V&iacute; dụ:</p><p>Truy vấn sau cần truy xuất to&agrave;n bộ h&agrave;ng từ bảng CUSTOMER dựa tr&ecirc;n một số điều kiện. C&aacute;c dấu ngoặc đơn kiểm so&aacute;t thứ tự đ&aacute;nh gi&aacute; để to&aacute;n tử OR được &aacute;p dụng đầu ti&ecirc;n, theo sau l&agrave; to&aacute;n tử AND:</p><div class=\"codebar\">&nbsp;</div><pre id=\"pre7\" class=\"prettyprint hljs language-sql\"><code>SELECT * FROM CUSTOMERSWHERE (AGE = 25 OR salary &lt; 4500) AND (name = \'Komal\' OR name = \'Kaushik\');</code></pre><p>Kết quả:</p><div class=\"blockbox\"><div class=\"codebar\">&nbsp;</div><pre id=\"pre8\" class=\"result notranslate prettyprint hljs language-diff\"><code>+----+----------+-----+-----------+----------+| ID | NAME     | AGE | ADDRESS   | SALARY   |+----+----------+-----+-----------+----------+|  3 | kaushik  |  23 | Kota      |  2000.00 |+----+----------+-----+-----------+----------+   </code></pre></div><h3>Mệnh đề WHERE với to&aacute;n tử LIKE</h3><p>Mệnh đề WHERE với to&aacute;n tử LIKE cho ph&eacute;p bạn lọc c&aacute;c h&agrave;ng khớp với một mẫu cụ thể. Mẫu n&agrave;y được thể hiện bằng c&aacute;c k&yacute; tự đại diện (chẳng hạn như %, _, []). Sau đ&acirc;y l&agrave; c&uacute; ph&aacute;p của n&oacute;:</p><div class=\"codebar\">&nbsp;</div><pre id=\"pre9\" class=\"prettyprint hljs language-sql\"><code>WHERE column_name LIKE pattern;</code></pre><p>Trong đ&oacute;, column_name l&agrave; cột m&agrave; bạn muốn so s&aacute;nh với mẫu, c&ograve;n pattern l&agrave; một chuỗi c&oacute; thể chứa c&aacute;c k&yacute; tự đại diện (như %, _, []).</p><p>V&iacute; dụ:</p><p>Sau đ&acirc;y l&agrave; truy vấn m&agrave; sẽ hiển thị tất cả bản ghi tại nơi c&oacute; t&ecirc;n bắt đầu bằng K v&agrave; d&agrave;i &iacute;t nhất 4 chữ c&aacute;i:</p><div class=\"codebar\">&nbsp;</div><pre id=\"pre10\" class=\"prettyprint hljs language-sql\"><code>SELECT * FROM CUSTOMERS WHERE NAME LIKE \'K___%\';</code></pre><p>Kết quả:</p><table class=\"table table-bordered\" cellspacing=\"3\" cellpadding=\"3\"><tbody><tr><th>ID</th><th>NAME</th><th>AGE</th><th>ADDRESS</th><th>SALARY</th></tr><tr><td>2</td><td>Khilan</td><td>25</td><td>Delhi</td><td>1500.00</td></tr><tr><td>3</td><td>Kaushik</td><td>23</td><td>Kota</td><td>2000.00</td></tr><tr><td>6</td><td>Komal</td><td>22</td><td>Hyderabad</td><td>4500.00</td></tr></tbody></table><p>Vậy l&agrave; bạn đ&atilde; nắm được c&aacute;ch sử dụng mệnh đề WHERE v&agrave; c&aacute;ch kết hợp SELECT với WHERE để chỉ lấy những dữ liệu ph&ugrave; hợp với điều kiện nhất định.</p>','menh-de-where-trong-sql','http://127.0.0.1:8000/images/2024-11-30-1732962995-post_img.png','2024-11-30 05:36:35',0,0,'WHERE trong SQL được sử dụng như thế nào? Dưới đây là mọi điều bạn cần biết về câu lệnh WHERE trong SQL.',7),(41,5,'Hàm max() trong Python','<p>Nếu hỏi ng&agrave;nh n&agrave;o đang được săn đ&oacute;n nhất hiện nay, chắc chắn c&acirc;u trả lời bạn nhận được nhiều nhất sẽ l&agrave; lập tr&igrave;nh. C&ocirc;ng nghệ ng&agrave;y c&agrave;ng ph&aacute;t triển, ch&uacute;ng ta c&agrave;ng thấy r&otilde; được tầm quan trọng của lập tr&igrave;nh. Đ&acirc;y l&agrave; c&aacute;i gốc của &ldquo;c&ocirc;ng nghệ&rdquo;. Rất nhiều sản phẩm, chương tr&igrave;nh tuyệt vời đ&atilde; ra đời từ lĩnh vực n&agrave;y.</p><p>Lập tr&igrave;nh thực sự kh&ocirc;ng phải m&ocirc;n học &ldquo;dễ nuốt&rdquo; nhưng cũng kh&ocirc;ng qu&aacute; kh&oacute; nếu bạn thực sự đam m&ecirc; v&agrave; quyết t&acirc;m theo đuổi. Lập tr&igrave;nh c&oacute; rất nhiều ng&ocirc;n ngữ kh&aacute;c nhau cho bạn lựa chọn, nổi bật trong số đ&oacute; ch&iacute;nh l&agrave; Python.</p><p>Python rất được ưa th&iacute;ch bởi n&oacute; l&agrave; ng&ocirc;n ngữ lập tr&igrave;nh dễ học v&agrave; dễ sử dụng ngay cả với người mới bắt đầu. Ngo&agrave;i ra, n&oacute; c&ograve;n mang tới những thư viện v&agrave; m&ocirc; đun chuẩn, gi&uacute;p việc lập tr&igrave;nh ứng dụng nhanh ch&oacute;ng hơn.</p><p>Tương tự như những ng&ocirc;n ngữ lập tr&igrave;nh kh&aacute;c, để nắm được c&aacute;ch d&ugrave;ng Python, bạn phải hiểu những h&agrave;m cơ bản của n&oacute;. Quantrimang.com sẽ cung cấp cho bạn kiến thức cơ bản về từng h&agrave;m. Ở b&agrave;i viết n&agrave;y, ch&uacute;ng ta sẽ c&ugrave;ng nhau t&igrave;m hiểu về&nbsp;<strong>h&agrave;m max() trong Python</strong>&nbsp;nh&eacute;!</p><p><strong>H&agrave;m max()</strong>&nbsp;được t&iacute;ch hợp sẵn trong Python trả về phần tử lớn nhất trong một iterable hoặc lớn nhất trong những tham số truyền v&agrave;o.</p><p>Nếu c&aacute;c gi&aacute; trị l&agrave; c&aacute;c chuỗi sẽ so s&aacute;nh theo thứ tự chữ c&aacute;i alphabet.</p><figure><img class=\"lazy lightbox loaded\" src=\"https://st.quantrimang.com/photos/image/2019/07/31/ham-max-python-640-1.jpg\" alt=\"H&agrave;m max() trong Python\" width=\"640\" height=\"335\" data-src=\"https://st.quantrimang.com/photos/image/2019/07/31/ham-max-python-640-1.jpg\" data-i=\"0\" data-adbro-processed=\"true\" data-was-processed=\"true\" /></figure><div id=\"articleads\" class=\"adbox adsense in-article\"><ins class=\"adsbygoogle\" data-ad-format=\"fluid\" data-ad-layout=\"in-article\" data-ad-client=\"ca-pub-9275417305531302\" data-ad-slot=\"2079243249\" data-adsbygoogle-status=\"done\" data-ad-status=\"filled\"><div id=\"aswift_1_host\">C&uacute; ph&aacute;p h&agrave;m max() trong Python</div></ins></div><p>H&agrave;m max() trong Python c&oacute; 2 dạng:</p><div class=\"codebar\">&nbsp;</div><pre id=\"pre0\" class=\"prettyprint hljs language-html\"><code>max(iterable, *iterables[,key, default])</code></pre><p>Hoặc:</p><div class=\"codebar\">&nbsp;</div><pre id=\"pre1\" class=\"prettyprint hljs language-html\"><code>max(item1, item2, *item[, key])</code></pre><h3>C&aacute;c tham số của h&agrave;m max()</h3><p><strong>H&agrave;m max()</strong>&nbsp;l&agrave;m việc với hai dạng tham số tương ứng với hai c&uacute; ph&aacute;p đ&atilde; n&ecirc;u ở tr&ecirc;n:</p><p>1.&nbsp;<code>max(iterable, *iterables[, key, default])</code></p><ul><li><code>iterable</code>: Bắt buộc. C&aacute;c tuple, string, set, dictionary hoặc đối tượng iterator m&agrave; bạn cần t&igrave;m phần tử lớn nhất trong đ&oacute;.</li><li><code>*iterables</code>: T&ugrave;y chọn. Iterable n&agrave;o lớn nhất sẽ được trả về.</li><li><code>key</code>: T&ugrave;y chọn. Key function, nơi c&aacute;c iterable đi qua. Ph&eacute;p so s&aacute;nh được thực hiện dựa tr&ecirc;n kết quả trả về sau khi đi qua key function.</li><li><code>default</code>: T&ugrave;y chọn. Gi&aacute; trị mặc định khi iterable trống.</li></ul><p>2.&nbsp;<code>max(item1, item2, *item[, key])</code></p><ul><li><code>item1</code>,&nbsp;<code>item2</code>: Bắt buộc. Đối tượng để so s&aacute;nh, c&oacute; thể l&agrave; number, string...</li><li><code>*item</code>: T&ugrave;y chọn. C&aacute;c đối tượng kh&aacute;c để so s&aacute;nh.<br />&rarr; Cần &iacute;t nhất hai đối tượng để thực hiện so s&aacute;nh với h&agrave;m max().</li><li><code>key</code>: T&ugrave;y chọn. Key function, nơi c&aacute;c item đi qua. Ph&eacute;p so s&aacute;nh được thực hiện tr&ecirc;n kết quả trả về sau khi đi qua key function.</li></ul><h3>Gi&aacute; trị trả về từ max()</h3><p>H&agrave;m max trả về kết quả kh&aacute;c nhau tương ứng với hai loại như tr&ecirc;n:</p><p>1.&nbsp;<code>max(iterable, *iterables[, key, default])</code></p><table class=\"table-striped\" border=\"1\"><thead><tr><td><strong>Trường hợp</strong></td><td><strong>Key</strong></td><td><strong>Default</strong></td><td><strong>Gi&aacute; trị trả về</strong></td></tr></thead><tbody><tr><td>Iterable trống</td><td>C&oacute; hoặc Kh&ocirc;ng</td><td>Kh&ocirc;ng c&oacute;</td><td>Sinh ra ngoại lệ&nbsp;<strong>ValueError</strong></td></tr><tr><td>Iterable trống</td><td>C&oacute;</td><td>C&oacute;</td><td>Trả về gi&aacute; trị Default</td></tr><tr><td>Một iterable (kh&ocirc;ng trống)</td><td>Kh&ocirc;ng</td><td>C&oacute; hoặc Kh&ocirc;ng</td><td>Trả về số lớn nhất trong iterable</td></tr><tr><td>Một iterable (kh&ocirc;ng trống)</td><td>C&oacute;</td><td>C&oacute; hoặc Kh&ocirc;ng</td><td>Truyền từng phần tử trong iterable cho h&agrave;m key, kết quả trả về l&agrave; phần tử lớn nhất dựa tr&ecirc;n gi&aacute; trị trả về từ h&agrave;m key</td></tr><tr><td>Nhiều iterable (kh&ocirc;ng trống)</td><td>Kh&ocirc;ng</td><td>C&oacute; hoặc Kh&ocirc;ng</td><td>Trả về iterable lớn nhất</td></tr><tr><td>Nhiều iterable (kh&ocirc;ng trống)</td><td>C&oacute;</td><td>C&oacute; hoặc Kh&ocirc;ng</td><td>Truyền từng iterable cho h&agrave;m key. Kết quả trả về l&agrave; iterable lớn nhất dựa tr&ecirc;n gi&aacute; trị trả về từ h&agrave;m key</td></tr></tbody></table><p>2.&nbsp;<code>max(item1, item2, *item[, key])</code></p><table class=\"table-striped\" border=\"1\"><thead><tr><td><strong>Trường hợp</strong></td><td><strong>Key</strong></td><td><strong>Gi&aacute; trị trả về</strong></td></tr></thead><tbody><tr><td>2 item</td><td>Kh&ocirc;ng</td><td>Trả về tham số lớn hơn</td></tr><tr><td>2 item</td><td>C&oacute;</td><td>Truyền từng tham số cho h&agrave;m key, kết quả trả về l&agrave; phần tử lớn hơn dựa tr&ecirc;n gi&aacute; trị trả về từ h&agrave;m key</td></tr><tr><td>Nhiều item</td><td>Kh&ocirc;ng</td><td>Trả về tham số lớn nhất</td></tr><tr><td>Nhiều item</td><td>C&oacute;</td><td>Truyền từng tham số cho h&agrave;m key, kết quả trả về l&agrave; phần tử lớn nhất dựa tr&ecirc;n gi&aacute; trị trả về từ h&agrave;m key</td></tr></tbody></table>','ham-max-trong-python','http://127.0.0.1:8000/images/2024-11-30-1732963463-post_img.jpg','2024-11-30 05:44:23',0,0,'Hàm Max trong Python được dùng như thế nào? Ở bài viết này, hãy cùng tìm hiểu mọi điều bạn cần biết về hàm max Python nhé!',8),(42,5,'Sự khác biệt giữa hàm IF và Switch trong Excel','<h2>Lệnh IF trong Microsoft Excel l&agrave; g&igrave;?</h2><p>C&acirc;u lệnh IF trong Excel l&agrave; một h&agrave;m thực hiện kiểm tra logic để x&aacute;c định xem điều kiện được chỉ định l&agrave; đ&uacute;ng hay sai. N&oacute; trả về một gi&aacute; trị dựa tr&ecirc;n kết quả đ&aacute;nh gi&aacute;, cho ph&eacute;p bạn đưa ra quyết định dựa tr&ecirc;n c&aacute;c kết quả.</p><h3>C&acirc;u lệnh IF cơ bản</h3><p>Ch&uacute;ng ta h&atilde;y bắt đầu bằng c&aacute;ch xem x&eacute;t c&acirc;u lệnh IF cơ bản trước khi t&igrave;m hiểu s&acirc;u hơn vấn đề m&agrave; SWITCH cố gắng giải quyết.</p><p>C&uacute; ph&aacute;p cho c&acirc;u lệnh IF cơ bản l&agrave;:</p><p><code>IF (logical_test, result_if_true, [result_if_false])</code></p><p>Tham số logical_test l&agrave; điều kiện m&agrave; h&agrave;m sẽ kiểm tra v&agrave; result_if_true l&agrave; kết quả m&agrave; h&agrave;m trả về nếu đ&aacute;nh gi&aacute; l&agrave; Đ&Uacute;NG. Tham số result_if_false l&agrave; kết quả m&agrave; h&agrave;m trả về nếu kết quả l&agrave; SAI.</p><p>Trong ảnh chụp m&agrave;n h&igrave;nh b&ecirc;n dưới, ch&uacute;ng ta muốn trả về Đạt hoặc Kh&ocirc;ng đạt cho Điểm số, t&ugrave;y thuộc v&agrave;o gi&aacute; trị điểm kiểm tra trong cột C c&oacute; lớn hơn hoặc bằng 50 hay kh&ocirc;ng.</p><p><img class=\"lazy lightbox loaded\" src=\"https://st.quantrimang.com/photos/image/2024/11/14/vi-du-ham-if.jpg\" alt=\"V&iacute; dụ d&ugrave;ng h&agrave;m IF\" width=\"650\" height=\"325\" data-src=\"https://st.quantrimang.com/photos/image/2024/11/14/vi-du-ham-if.jpg\" data-adbro-processed=\"true\" data-i=\"1\" data-was-processed=\"true\" /></p><p>C&ocirc;ng thức b&ecirc;n dưới sẽ được viết v&agrave;o &ocirc; C2:</p><p><code>IF(C2 &gt;= 50, \"Pass\", \"Fail\")</code></p><p>V&agrave; đ&acirc;y l&agrave; kết quả nhận được:</p><p><img class=\"lazy lightbox loaded\" src=\"https://st.quantrimang.com/photos/image/2024/11/14/ket-qua-dung-ham-if.jpg\" alt=\"Kết quả khi d&ugrave;ng h&agrave;m IF\" width=\"650\" height=\"325\" data-src=\"https://st.quantrimang.com/photos/image/2024/11/14/ket-qua-dung-ham-if.jpg\" data-i=\"2\" data-was-processed=\"true\" /></p><h3>Lệnh IF lồng nhau</h3><p>Nếu muốn kiểm tra nhiều điều kiện c&ugrave;ng l&uacute;c, bạn c&oacute; thể đặt c&aacute;c c&acirc;u lệnh IF b&ecirc;n trong một c&acirc;u lệnh kh&aacute;c.</p><p>Ch&uacute;ng được gọi l&agrave; c&aacute;c c&acirc;u lệnh IF lồng nhau với c&uacute; ph&aacute;p cơ bản l&agrave;:</p><p><code>=IF(logical_test1, result_if_true1, IF(logical_test2, result_if_true2, result_if_false2))</code></p><p>H&atilde;y xem x&eacute;t v&iacute; dụ b&ecirc;n dưới, trong đ&oacute; mỗi m&agrave;u trong cột A (Đỏ, V&agrave;ng hoặc Xanh l&aacute; c&acirc;y) cần c&oacute; trạng th&aacute;i tương ứng trong cột B (v&iacute; dụ: Dừng lại, Thận trọng, Đi v&agrave; Kh&ocirc;ng x&aacute;c định).</p><p><img class=\"lazy lightbox loaded\" src=\"https://st.quantrimang.com/photos/image/2024/11/14/vi-du-ham-if-2.jpg\" alt=\"V&iacute; dụ d&ugrave;ng lệnh IF lồng nhau\" width=\"650\" height=\"325\" data-src=\"https://st.quantrimang.com/photos/image/2024/11/14/vi-du-ham-if-2.jpg\" data-i=\"3\" data-was-processed=\"true\" /></p><p>Đầu ti&ecirc;n, ch&uacute;ng ta sẽ nhập c&ocirc;ng thức sau v&agrave;o &ocirc; B2 cho m&agrave;u sắc trong &ocirc; A2:</p><p><code>=IF(A2 = \"Red\", \"Stop\", IF(A2 = \"Yellow\", \"Caution\", IF(A2 = \"Green\", \"Go\", \"Unknown\")))</code></p><p>V&igrave; A2 l&agrave; Đỏ, n&oacute; sẽ trả về Stop, theo c&ocirc;ng thức ở tr&ecirc;n. Khi ch&uacute;ng ta sao ch&eacute;p n&oacute; v&agrave;o c&aacute;c &ocirc; kh&aacute;c, mỗi m&agrave;u sẽ c&oacute; một trạng th&aacute;i.</p><p><img class=\"lazy lightbox loaded\" src=\"https://st.quantrimang.com/photos/image/2024/11/14/vi-du-ham-if-3.jpg\" alt=\"Kết quả v&iacute; dụ d&ugrave;ng h&agrave;m IF lồng nhau\" width=\"650\" height=\"325\" data-src=\"https://st.quantrimang.com/photos/image/2024/11/14/vi-du-ham-if-3.jpg\" data-i=\"4\" data-was-processed=\"true\" /></p><p>Như bạn thấy, logic c&oacute; thể nhanh ch&oacute;ng trở n&ecirc;n kh&oacute; hiểu khi bạn lồng c&aacute;c c&acirc;u lệnh IF. Đ&oacute; l&agrave; l&uacute;c c&acirc;u lệnh SWITCH xuất hiện để đơn giản h&oacute;a mọi thứ một ch&uacute;t.</p><h2>C&acirc;u lệnh Switch trong Excel l&agrave; g&igrave;?</h2><p>C&acirc;u lệnh SWITCH trong Excel l&agrave; một h&agrave;m tương đối mới. N&oacute; lấy một biểu thức v&agrave; kiểm tra n&oacute; với nhiều kết quả theo định dạng dễ đọc v&agrave; c&oacute; cấu tr&uacute;c hơn so với c&aacute;c c&acirc;u lệnh IF lồng nhau.</p><p>C&uacute; ph&aacute;p cơ bản của C&acirc;u lệnh SWITCH l&agrave;:</p><p><code>SWITCH (expression_to_test, test_value1, result_if_true1, [test_value2, result_if_true2,&amp;hellip;], [value_if_no_match])</code></p><p>expression_to_test l&agrave; gi&aacute; trị sẽ được đ&aacute;nh gi&aacute; so với c&aacute;c gi&aacute; trị kiểm tra (test_value1, test_value2, v.v.). Nếu một gi&aacute; trị khớp, n&oacute; sẽ trả về kết quả tương ứng. V&iacute; dụ, nếu test_value1 khớp với biểu thức, n&oacute; sẽ trả về result_if_true1.</p><p>Bạn c&oacute; thể chỉ định tham số value_if_no_match để trả về gi&aacute; trị trong trường hợp kh&ocirc;ng t&igrave;m thấy kết quả khớp.</p><p>V&igrave; c&acirc;u lệnh SWITCH c&oacute; thể đơn giản h&oacute;a IF lồng nhau, ch&uacute;ng ta c&oacute; thể sử dụng v&iacute; dụ m&agrave;u từ if lồng nhau. Sau đ&acirc;y l&agrave; phi&ecirc;n bản SWITCH:</p><p><code>=SWITCH(A2, \"Red\", \"Stop\", \"Yellow\", \"Caution\", \"Green\", \"Go\", \"Unknown\")</code></p><p>Như bạn thấy, c&ocirc;ng thức giờ đ&acirc;y dễ đọc hơn dưới dạng c&acirc;u lệnh SWITCH v&agrave; hoạt động giống như phi&ecirc;n bản IF.</p><h2>So s&aacute;nh IF v&agrave; Switch: C&aacute;c trường hợp sử dụng</h2><p>Khi so s&aacute;nh với c&acirc;u lệnh SWITCH, IF được sử dụng tốt nhất khi thực hiện c&aacute;c b&agrave;i kiểm tra logic phức tạp li&ecirc;n quan đến nhiều điều kiện. N&oacute; cũng hoạt động tốt với c&aacute;c b&agrave;i kiểm tra sử dụng to&aacute;n tử logic kh&aacute;c nhau trong Excel (v&iacute; dụ: &gt;, &lt;, =, &lt;&gt;, AND v&agrave; OR). Do đ&oacute;, n&oacute; linh hoạt hơn v&agrave; c&oacute; thể xử l&yacute; nhiều t&igrave;nh huống hơn so với c&acirc;u lệnh SWITCH.</p><p>Mặt kh&aacute;c, c&acirc;u lệnh SWITCH hoạt động tốt khi c&aacute;c b&agrave;i kiểm tra logic li&ecirc;n quan đến ph&eacute;p to&aacute;n ngang bằng đơn giản v&agrave; c&aacute;c gi&aacute; trị cố định, x&eacute;t đến dạng cơ bản của n&oacute; chỉ đ&aacute;nh gi&aacute; to&aacute;n tử bằng. Nếu bạn sử dụng c&acirc;u lệnh SWITCH cho c&aacute;c b&agrave;i kiểm tra logic phức tạp, th&igrave; n&oacute; kh&ocirc;ng kh&aacute;c g&igrave; sử dụng c&acirc;u lệnh IF.</p><p>V&iacute; dụ về c&acirc;u lệnh IF lồng nhau phức tạp n&agrave;y:</p><p><code>=IF(A1 &gt;= 90, \"Grade A\", IF(A1 &gt;= 75, \"Grade B\", \"Grade C\"))</code></p><p>Bạn c&oacute; thể viết lệnh SWITCH như sau:</p><p><code>=SWITCH(TRUE, A1 &gt;= 90, \"Grade A\", A1 &gt;= 75, \"Grade B\", A1 &lt; 75, \"Grade C\")</code></p><p>Ở đ&acirc;y, ch&uacute;ng ta đ&atilde; đặt biểu thức cần kiểm tra th&agrave;nh TRUE, cho ph&eacute;p kiểm tra nhiều điều kiện bằng c&aacute;ch sử dụng nhiều to&aacute;n tử hơn l&agrave; to&aacute;n tử bằng. Nhưng b&acirc;y giờ logic c&oacute; vẻ &iacute;t gọn nhẹ v&agrave; dễ đọc hơn so với c&acirc;u lệnh SWITCH cơ bản.</p>','su-khac-biet-giua-ham-if-va-switch-trong-excel','http://127.0.0.1:8000/images/2024-11-30-1732964206-post_img.jpg','2024-11-30 05:56:46',0,0,'Câu lệnh IF là một hàm logic phổ biến trong Excel. Câu lệnh SWITCH ít được biết đến hơn,',7),(43,5,'Lệnh DROP TABLE hay DELETE TABLE trong SQL','<p><strong>X&oacute;a bảng trong SQL</strong>&nbsp;được sử dụng kh&aacute; nhiều. Thuật ngữ n&agrave;y c&ograve;n được gọi l&agrave;<strong>&nbsp;drop table trong SQL</strong>. Dưới đ&acirc;y l&agrave; mọi điều bạn cần biết về<strong>&nbsp;x&oacute;a table trong SQL</strong>.</p><p>Lập tr&igrave;nh đang l&agrave; ng&agrave;nh được nhiều người săn đ&oacute;n khi c&ocirc;ng nghệ ng&agrave;y c&agrave;ng ph&aacute;t triển, nhu cầu sử dụng ứng dụng, phần mềm, chương tr&igrave;nh th&ocirc;ng minh ng&agrave;y c&agrave;ng cao. Hiện ng&agrave;nh n&agrave;y cũng đang rất &ldquo;kh&aacute;t&rdquo; nh&acirc;n lực c&oacute; chuy&ecirc;n m&ocirc;n giỏi. Ch&iacute;nh v&igrave; thế, nếu nắm vững kiến thức lập tr&igrave;nh v&agrave; biết vận dụng ch&uacute;ng v&agrave;o thực tế, bạn sẽ kh&ocirc;ng lo thiếu việc l&agrave;m khi ra trường.</p><p>Lập tr&igrave;nh l&agrave; lĩnh vực c&oacute; nhiều ng&ocirc;n ngữ. Bạn chỉ cần chọn một ng&ocirc;n ngữ ph&ugrave; hợp với mục ti&ecirc;u để t&igrave;m hiểu. D&ugrave; học ng&ocirc;n ngữ n&agrave;o th&igrave; kiến thức về SQL đều cần thiết.</p><p>Delete table trong SQL l&agrave; một trong số to&aacute;n tử phổ biến nhất khi bạn phải xử l&yacute; database. Ch&iacute;nh v&igrave; thế, hiểu c&aacute;ch d&ugrave;ng lệnh drop trong SQL thật sự cần thiết. Nếu kh&ocirc;ng l&agrave;m theo đ&uacute;ng quy tr&igrave;nh hay biết những lưu &yacute;, bạn c&oacute; thể gặp phải sự cố mất dữ liệu.</p><p>B&agrave;i viết n&agrave;y sẽ cung cấp cho bạn th&ocirc;ng tin chi tiết về c&aacute;ch d&ugrave;ng lệnh x&oacute;a bảng trong SQL, bao gồm những kh&aacute;i niệm cơ bản v&agrave; c&uacute; ph&aacute;p. Tất cả sẽ gi&uacute;p bạn d&ugrave;ng lệnh drop hay delete table trong SQL mượt m&agrave; v&agrave; hiệu quả.</p><p><strong>Lưu &yacute;:</strong></p><ul><li>Bạn n&ecirc;n thận trọng khi d&ugrave;ng lệnh n&agrave;y bởi khi x&oacute;a một bảng, tất cả th&ocirc;ng tin c&oacute; sẵn b&ecirc;n trong n&oacute; sẽ mất vĩnh viễn.</li><li>Để x&oacute;a bảng SQL trong database, bạn cần quyền ALTER (thay đổi) tr&ecirc;n bảng được đề cập v&agrave; quyền CONTROL (kiểm so&aacute;t) tr&ecirc;n sơ đồ bảng.</li><li>Mặc d&ugrave; l&agrave; lệnh ng&ocirc;n ngữ định nghĩa dữ liệu, n&oacute; kh&aacute;c với lệnh TRUNCATE TABLE v&igrave; lệnh DROP ho&agrave;n to&agrave;n x&oacute;a bảng khỏi bộ nhớ.</li></ul><p>C&uacute; ph&aacute;p cơ bản của lệnh x&oacute;a table trong SQL:</p><p><code>DROP TABLE [IF EXISTS] [database_name.][schema_name.]table_name;</code></p><p>Trong c&uacute; ph&aacute;p n&agrave;y:</p><ul><li>Đầu ti&ecirc;n, chọn t&ecirc;n của bảng được x&oacute;a.</li><li>Thứ hai, chọn t&ecirc;n của database trong bảng được tạo v&agrave; t&ecirc;n của lược đồ m&agrave; bảng thuộc về. T&ecirc;n database l&agrave; t&ugrave;y chọn. Nếu bỏ qua n&oacute;, lệnh drop table sẽ x&oacute;a bảng trong database được kết nối hiện tại.</li><li>Thứ ba, d&ugrave;ng If Exists để chỉ loại bỏ bảng nếu n&oacute; tồn tại.</li></ul>','lenh-drop-table-hay-delete-table-trong-sql','http://127.0.0.1:8000/images/2024-12-01-1733062550-post_img.png','2024-12-01 09:15:50',0,0,'Dưới đây là mọi điều bạn cần biết về xóa table trong SQL',7),(44,5,'Vòng lặp trong C++','<p>C&oacute; một t&igrave;nh huống m&agrave; bạn cần phải thực hiện một đoạn code một v&agrave;i lần. Nh&igrave;n chung, c&aacute;c c&acirc;u lệnh được thực hiện một c&aacute;ch tuần tự. C&acirc;u lệnh đầu ti&ecirc;n của h&agrave;m được thực hiện trước, sau đ&oacute; đến c&acirc;u thứ 2 v&agrave; tiếp tục.</p><p>Ng&ocirc;n ngữ lập tr&igrave;nh cung cấp cho ch&uacute;ng ta nhiều cấu tr&uacute;c điều khiển v&agrave; cho ph&eacute;p bạn thực hiện những phần phức tạp.</p><p>V&ograve;ng lặp cho ph&eacute;p thực hiện một lệnh v&agrave; một nh&oacute;m lệnh nhiều lần, dưới đ&acirc;y l&agrave; dạng tổng qu&aacute;t:</p><p><a title=\"Lập tr&igrave;nh C++ \" href=\"https://quantrimang.com/hoc/cplusplus\">C++</a>&nbsp;hỗ trợ v&ograve;ng lặp sau đ&acirc;y. Click chuột v&agrave;o link để xem chi tiết.</p><table class=\"table table-bordered\" border=\"2\"><tbody><tr><th width=\"30%\">V&ograve;ng lặp</th><th>Mi&ecirc;u tả</th></tr><tr><td><p>V&ograve;ng lặp while trong C++</p></td><td>Lặp lại một hoặc một nh&oacute;m c&aacute;c lệnh trong khi điều kiện đ&atilde; cho l&agrave; đ&uacute;ng. N&oacute; kiểm tra điều kiện trước khi thực hiện th&acirc;n v&ograve;ng lặp.</td></tr><tr><td><p>V&ograve;ng lặp for trong C++</p></td><td>Thực thi một d&atilde;y c&aacute;c lệnh nhiều lần v&agrave; t&oacute;m tắt đoạn code m&agrave; quản l&yacute; biến v&ograve;ng lặp.</td></tr><tr><td><p>V&ograve;ng lặp do...while trong C++</p></td><td>Giống lệnh While, ngoại trừ ở điểm l&agrave; n&oacute; kiểm tra điều kiện ở cuối th&acirc;n v&ograve;ng lặp.</td></tr><tr><td><p>Lồng v&ograve;ng lặp trong C++</p></td><td>Bạn c&oacute; thể sử dụng một hoặc nhiều v&ograve;ng lặp trong c&aacute;c v&ograve;ng lặp while, for hoặc do..while kh&aacute;c.</td></tr></tbody></table><h2>V&ograve;ng lặp while trong C/C++</h2><p>Một lệnh v&ograve;ng lặp while trong Ng&ocirc;n ngữ chương tr&igrave;nh C/C++ thực hiện lặp đi lặp lại một lệnh mục ti&ecirc;u đến khi n&agrave;o điều kiện đ&atilde; cho c&ograve;n l&agrave; đ&uacute;ng.</p><p><strong>C&uacute; ph&aacute;p</strong></p><p>C&uacute; ph&aacute;p của v&ograve;ng lặp while trong Ng&ocirc;n ngữ chương tr&igrave;nh C/C++ l&agrave;:</p><div class=\"codebar\">&nbsp;</div><pre id=\"pre0\" class=\"prettyprint hljs language-cpp\"><code>while(dieu_kien) {   cac_lenh; }</code></pre><p>Ở đ&acirc;y, cac_lenh c&oacute; thể l&agrave; lệnh đơn hoặc một khối c&aacute;c lệnh. dieu_kien c&oacute; thể l&agrave; bất kỳ biểu thức n&agrave;o, v&agrave; gi&aacute; trị true l&agrave; bất kỳ gi&aacute; trị n&agrave;o kh&aacute;c 0. V&ograve;ng lặp lặp đi lặp lại trong khi dieu_kien l&agrave; true.</p>','vong-lap-trong-c','http://127.0.0.1:8000/images/2024-12-01-1733062625-post_img.jpg','2024-12-01 09:17:05',0,0,'Ngôn ngữ lập trình cung cấp cho chúng ta nhiều cấu trúc điều khiển và cho phép bạn thực hiện những phần phức tạp.',8),(45,5,'Lập trình hướng đối tượng trong Python','<p><a title=\"Python\" href=\"https://quantrimang.com/hoc/hoc-python\" target=\"_blank\" rel=\"noopener\" data-type=\"internal\">Python</a>&nbsp;l&agrave; một trong số ng&ocirc;n ngữ lập tr&igrave;nh phổ biến nhất hiện nay. Bạn dễ d&agrave;ng t&igrave;m thấy n&oacute; trong c&aacute;c ứng dụng, phần mềm hay trang web th&ocirc;ng dụng. Điểm nổi bật của Python l&agrave; n&oacute; c&oacute; t&iacute;nh hướng đối tượng mạnh. Dưới đ&acirc;y l&agrave; những điều bạn cần biết về lập tr&igrave;nh hướng đối tượng trong Python.</p><h2>Giới thiệu về OOP trong Python</h2><p>Lập tr&igrave;nh hướng đối tượng Python (OOP) l&agrave; một m&ocirc; h&igrave;nh lập tr&igrave;nh sử dụng c&aacute;c đối tượng v&agrave; lớp trong lập tr&igrave;nh. N&oacute; nhằm mục đ&iacute;ch triển khai c&aacute;c thực thể trong thế giới thực như kế thừa, đa h&igrave;nh, đ&oacute;ng g&oacute;i, v.v. bằng lập tr&igrave;nh. Kh&aacute;i niệm ch&iacute;nh của OOP l&agrave; li&ecirc;n kết dữ liệu v&agrave; c&aacute;c chức năng hoạt động tr&ecirc;n dữ liệu đ&oacute; với nhau th&agrave;nh một đơn vị duy nhất để kh&ocirc;ng phần n&agrave;o kh&aacute;c của m&atilde; c&oacute; thể truy cập dữ liệu n&agrave;y.</p><p>C&aacute;c kh&aacute;i niệm cơ bản trong lập tr&igrave;nh Python hướng đối tượng:</p><ul><li>Class</li><li>Objects</li><li>Polymorphism</li><li>Encapsulation</li><li>Inheritance</li><li>Data Abstraction</li></ul><p>Kh&aacute;i niệm về OOP trong Python tập trung v&agrave;o việc tạo code sử dụng lại. Kh&aacute;i niệm n&agrave;y c&ograve;n được gọi l&agrave; DRY (Don\'t Repeat Yourself).</p><p>Giờ h&atilde;y c&ugrave;ng nhau t&igrave;m hiểu chi tiết nh&eacute;!</p><h2>C&aacute;c nguy&ecirc;n l&yacute;</h2><p>Trong Python, kh&aacute;i niệm về OOP tu&acirc;n theo một số nguy&ecirc;n l&yacute; cơ bản l&agrave;&nbsp;<em>t&iacute;nh đ&oacute;ng g&oacute;i, t&iacute;nh kế thừa v&agrave; t&iacute;nh đa h&igrave;nh</em>.</p><ul><li><strong>T&iacute;nh kế thừa (Inheritance)</strong>: cho ph&eacute;p một lớp (class) c&oacute; thể kế thừa c&aacute;c thuộc t&iacute;nh v&agrave; phương thức từ c&aacute;c lớp kh&aacute;c đ&atilde; được định nghĩa.</li><li><strong>T&iacute;nh đ&oacute;ng g&oacute;i (Encapsulation)</strong>: l&agrave; quy tắc y&ecirc;u cầu trạng th&aacute;i b&ecirc;n trong của một đối tượng được bảo vệ v&agrave; tr&aacute;nh truy cập được từ code b&ecirc;n ngo&agrave;i (tức l&agrave; code b&ecirc;n ngo&agrave;i kh&ocirc;ng thể trực tiếp nh&igrave;n thấy v&agrave; thay đổi trạng th&aacute;i của đối tượng đ&oacute;).</li><li><strong>T&iacute;nh đa h&igrave;nh (Polymorphism)</strong><em>:</em>&nbsp;l&agrave; kh&aacute;i niệm m&agrave; hai hoặc nhiều lớp c&oacute; những phương thức giống nhau nhưng c&oacute; thể thực thi theo những c&aacute;ch thức kh&aacute;c nhau.</li></ul>','lap-trinh-huong-doi-tuong-trong-python','http://127.0.0.1:8000/images/2024-12-01-1733062689-post_img.jpg','2024-12-01 09:18:09',0,0,'Lập trình hướng đối tượng Python là gì? Hay dùng OOP Python như thế nào? Hãy cùng tìm hiểu mọi điều bạn cần biết về OOP trong Python nhé!',8),(46,5,'Cách sử dụng Visual Intensity trong Adobe Firefly','<p>Adobe Firefly c&oacute; nhiều t&ugrave;y chọn c&oacute; thể kết hợp với prompt của bạn để điều chỉnh giao diện v&agrave; phong c&aacute;ch của h&igrave;nh ảnh AI. Nhưng c&oacute; một t&ugrave;y chọn trong Adobe Firefly c&oacute; t&ecirc;n l&agrave; Visual Intensity c&oacute; t&aacute;c động lớn nhất đến lượng chi tiết v&agrave; độ phức tạp trong h&igrave;nh ảnh. Theo mặc định, Visual Intensity được đặt th&agrave;nh 50%, đ&oacute; l&agrave; l&yacute; do tại sao kết quả của Firefly kh&ocirc;ng phải l&uacute;c n&agrave;o cũng chi tiết hoặc ấn tượng như bạn mong đợi.</p><p>Hướng dẫn n&agrave;y sẽ chỉ cho bạn nơi t&igrave;m Visual Intensity trong Firefly v&agrave; c&aacute;ch điều chỉnh n&oacute;. Sau đ&oacute; sẽ thử một v&agrave;i prompt để xem c&agrave;i đặt Visual Intensity ảnh hưởng đến kết quả như thế n&agrave;o, bao gồm c&aacute;ch th&ecirc;m chi tiết v&agrave; kịch t&iacute;nh hơn v&agrave;o h&igrave;nh ảnh hoặc tạo h&igrave;nh ảnh đơn giản v&agrave; &iacute;t chi tiết hơn khi bạn cần.</p><h2>C&aacute;ch truy cập Adobe Firefly</h2><p>Để sử dụng tr&igrave;nh biến văn bản th&agrave;nh h&igrave;nh ảnh của Adobe Firefly, h&atilde;y mở tr&igrave;nh duyệt web v&agrave; truy cập trang web Firefly (firefly.adobe.com). Sau đ&oacute;, cuộn xuống trang v&agrave; chọn m&ocirc;-đun chuyển văn bản th&agrave;nh h&igrave;nh ảnh.</p><p>Bạn sẽ cần g&oacute;i Firefly miễn ph&iacute;, cao cấp hoặc đăng k&yacute; Creative Cloud đang hoạt động để sử dụng Adobe Firefly.</p><h2>T&igrave;m t&ugrave;y chọn Visual Intensity của Adobe Firefly ở đ&acirc;u?</h2><p>Tất cả c&aacute;c t&ugrave;y chọn của Adobe Firefly để điều chỉnh giao diện v&agrave; kiểu d&aacute;ng h&igrave;nh ảnh đều nằm trong cột b&ecirc;n tr&aacute;i.</p><figure><img class=\"lazy lightbox loaded\" src=\"https://st.quantrimang.com/photos/image/2024/09/28/su-dung-visual-intensity-trong-adobe-firefly-1.jpg\" alt=\"C&aacute;c t&ugrave;y chọn h&igrave;nh ảnh của Adobe Firefly.\" width=\"809\" height=\"459\" data-src=\"https://st.quantrimang.com/photos/image/2024/09/28/su-dung-visual-intensity-trong-adobe-firefly-1.jpg\" data-i=\"0\" data-was-processed=\"true\" /><figcaption>C&aacute;c t&ugrave;y chọn h&igrave;nh ảnh của Adobe Firefly.</figcaption></figure>','cach-su-dung-visual-intensity-trong-adobe-firefly','http://127.0.0.1:8000/images/2024-12-01-1733062761-post_img.jpg','2024-12-01 09:19:21',0,0,'Adobe Firefly có nhiều tùy chọn có thể kết hợp với prompt của bạn để điều chỉnh giao diện và phong cách của hình ảnh AI',10);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_quiz` int NOT NULL,
  `question` varchar(255) NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_option` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,1,'Ngôn ngữ lập trình nào thường được sử dụng để xây dựng ứng dụng web?','Python','HTML','C++','PHP','A'),(2,1,'Câu lệnh nào được dùng để in ra màn hình trong Python?','print()','echo','cout','System.out.println','A'),(3,1,'Cấu trúc vòng lặp nào là vô hạn?','for','while(true)','do while','if-else','B'),(4,1,'Biến nào được sử dụng để lưu trữ chuỗi ký tự trong Java?','int','char','String','float','C'),(5,1,'Hàm nào trả về số lượng phần tử trong mảng?','length()','size()','count()','len()','D'),(6,2,'Cấu trúc dữ liệu nào sử dụng nguyên lý LIFO?','Array','Queue','Stack','Linked List','C'),(7,2,'Cấu trúc dữ liệu nào tốt nhất để tìm kiếm nhanh?','Hash Table','Array','Tree','Graph','A'),(8,2,'Câu lệnh nào chèn phần tử vào cuối mảng trong Python?','append()','push()','insert()','add()','A'),(9,2,'Linked List có lợi thế gì so với Array?','Độ dài cố định','Truy cập nhanh hơn','Tốn ít bộ nhớ','Dễ chèn và xóa phần tử','D'),(10,2,'Tree nào có tối đa 2 con?','Binary Tree','Heap','Graph','Binary Search Tree','A'),(11,3,'Thuật toán nào sử dụng phương pháp chia để trị?','Bubble Sort','Quick Sort','Linear Search','DFS','B'),(12,3,'Độ phức tạp tốt nhất của thuật toán sắp xếp nổi bọt là gì?','O(n)','O(n^2)','O(log n)','O(n log n)','A'),(13,3,'Thuật toán Dijkstra giải quyết bài toán gì?','Sắp xếp','Tìm đường đi ngắn nhất','Tìm kiếm','Tối ưu hóa','B'),(14,3,'Binary Search hoạt động trên loại dữ liệu nào?','Không sắp xếp','Dữ liệu sắp xếp','Dữ liệu ngẫu nhiên','Không có điều kiện','B'),(15,3,'Đâu là một thuật toán quay lui?','Merge Sort','DFS','Backtracking','Dijkstra','C'),(16,4,'Hàm nào dùng để lấy dữ liệu người dùng trong Python?','input()','get()','scanf()','fetch()','A'),(17,4,'Kết quả của 5//2 trong Python là gì?','2.5','2','3','Lỗi','B'),(18,4,'Phương thức nào thêm phần tử vào danh sách?','add()','append()','insert()','push()','B'),(19,4,'Kiểu dữ liệu nào trong Python không thay đổi được?','List','Set','Tuple','Dictionary','C'),(20,4,'Từ khóa nào để khai báo hàm?','function','def','lambda','func','B'),(21,5,'Thư viện nào chứa hàm printf trong C?','math.h','stdio.h','string.h','stdlib.h','B'),(22,5,'Đâu là kiểu dữ liệu nguyên trong C?','float','int','double','char','B'),(23,5,'Hàm nào kết thúc chương trình trong C?','main()','return','exit()','break','C'),(24,5,'Để đọc giá trị từ bàn phím, ta dùng hàm nào?','scanf()','gets()','cin','input()','A'),(25,5,'Dòng nào là comment đúng trong C?','/* Comment */','// Comment','# Comment','<!-- Comment -->','A'),(26,6,'Câu lệnh nào dùng để chọn tất cả các cột?','SELECT ALL','SELECT *','SELECT ALL COLUMNS','SELECT FROM','B'),(27,6,'Khóa chính trong SQL là gì?','Key của bảng','Cột duy nhất','ID','Cột không rỗng','B'),(28,6,'Hàm nào trả về tổng giá trị trong cột?','SUM()','COUNT()','AVG()','MAX()','A'),(29,6,'Câu lệnh nào xóa bảng trong SQL?','DROP TABLE','DELETE TABLE','REMOVE TABLE','CLEAR TABLE','A'),(30,6,'Câu lệnh thêm dữ liệu vào bảng?','INSERT INTO','ADD ROW','ADD INTO','PUSH DATA','A'),(31,7,'Thuật toán nào có độ phức tạp tốt nhất?','Bubble Sort','Selection Sort','Quick Sort','Merge Sort','C'),(32,7,'Insertion Sort thuộc loại thuật toán nào?','Sắp xếp so sánh','Không so sánh','Sắp xếp nhanh','Quay lui','A'),(33,7,'Thuật toán Heap Sort sử dụng cấu trúc nào?','Array','Heap','Graph','Queue','B'),(34,7,'Thuật toán sắp xếp nào phù hợp cho dữ liệu nhỏ?','Merge Sort','Quick Sort','Bubble Sort','Radix Sort','C'),(35,7,'Sắp xếp chèn (Insertion Sort) có độ phức tạp trung bình là gì?','O(n)','O(n log n)','O(n^2)','O(log n)','C');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_histories`
--

DROP TABLE IF EXISTS `quiz_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_histories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_quiz` int NOT NULL,
  `id_user` int NOT NULL,
  `score` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_histories`
--

LOCK TABLES `quiz_histories` WRITE;
/*!40000 ALTER TABLE `quiz_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `quiz_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quizzes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `id_author` int DEFAULT NULL,
  `duration` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizzes`
--

LOCK TABLES `quizzes` WRITE;
/*!40000 ALTER TABLE `quizzes` DISABLE KEYS */;
INSERT INTO `quizzes` VALUES (1,'Lập trình cơ bản - Phần 1',1,30,'Kiến thức cơ bản về lập trình','2024-12-01 21:40:30','2024-12-01 21:40:30',NULL),(2,'Cấu trúc dữ liệu - Phần 1',2,40,'Nhập môn cấu trúc dữ liệu','2024-12-01 21:40:30','2024-12-01 21:40:30',NULL),(3,'Giải thuật - Phần 1',3,45,'Các thuật toán cơ bản','2024-12-01 21:40:30','2024-12-01 21:40:30',NULL),(4,'Lập trình Python cơ bản',4,30,'Làm quen với Python','2024-12-01 21:40:30','2024-12-01 21:40:30',NULL),(5,'Lập trình C cơ bản',5,30,'Học các khái niệm cơ bản trong ngôn ngữ C','2024-12-01 21:40:30','2024-12-01 21:40:30',NULL),(6,'Hệ quản trị cơ sở dữ liệu',6,50,'Câu hỏi về cơ sở dữ liệu','2024-12-01 21:40:30','2024-12-01 21:40:30',NULL),(7,'Thuật toán sắp xếp',7,40,'Tìm hiểu các thuật toán sắp xếp','2024-12-01 21:40:30','2024-12-01 21:40:30',NULL);
/*!40000 ALTER TABLE `quizzes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `avatar` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ADmin2','Admin','tat424517@gmail.com',NULL,'123456','2022-12-13 08:28:20','2022-12-13 08:28:20','admin',NULL),(2,'ptahome','PTA','namvu@gmail.com',NULL,'123456','2023-02-23 23:22:34','2023-02-23 23:22:34','admin',NULL),(4,'TuanAnh','anhtuan891997@gmail.com','anhtuan891997@gmail.com',NULL,'123456','2023-10-29 19:28:36','2023-10-29 19:28:36','user',NULL),(5,'admin','admin','admin',NULL,'123456','2023-11-29 02:33:27','2023-11-29 02:33:27','admin',NULL),(6,'luutientam','luutientam','luutientam1@gmail.com',NULL,'mot23456789','2023-12-06 03:37:52','2023-12-06 03:37:52','user',NULL),(7,'tienthanh','thanh','tienthanh892@gmail.com',NULL,'tienthanh8925','2023-12-09 03:52:40','2023-12-09 03:52:40','user',NULL),(8,'phamnguyenhz11','Phạm Nguyên','phamnguyenleesin0331@gmail.com',NULL,'nguyen123','2023-12-28 03:04:34','2023-12-28 03:04:34','user',NULL),(9,'lee.haloo','lee.haloo','hailong16072000@gmail.com',NULL,'123456','2024-09-27 00:42:50','2024-09-27 00:42:50','user',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-01 21:42:25
