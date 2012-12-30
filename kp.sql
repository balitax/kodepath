-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 26. Desember 2012 jam 12:24
-- Versi Server: 5.5.8
-- Versi PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kp_2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `ci_sessions`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`comment_id`, `name`, `url`, `comment`) VALUES
(8, 'akungery', 'wurldiwide.web.id', 'import javax.swing.*;\r\nclass deretfibonacci {\r\npublic static void main(String[] args) {\r\nint a = 0, b = 1, hasil = 0;\r\nString s = JOptionPane.showInputDialog("Masukkan banyaknya deret Fibonacci: ");\r\nint x = Integer.parseInt(s);\r\nfor (int i = 0; i <= x; i++) {\r\na = b;\r\nb = hasil;\r\nhasil = a + b;\r\nSystem.out.print(hasil + " ");\r\n}}}\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `content_ckeditor`
--

CREATE TABLE IF NOT EXISTS `content_ckeditor` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `content_ckeditor`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `hits`
--

CREATE TABLE IF NOT EXISTS `hits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` char(100) NOT NULL DEFAULT '',
  `ip` varchar(24) NOT NULL,
  `lastdate` varchar(25) NOT NULL,
  `count` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data untuk tabel `hits`
--

INSERT INTO `hits` (`id`, `page`, `ip`, `lastdate`, `count`) VALUES
(41, '13id562en7695ti76955', '127.0.0.1', '2012/12/25 11:20:30', 10),
(42, 'close.png', '127.0.0.1', '2012/12/26 11:05:16', 17),
(43, 'css', '127.0.0.1', '2012/12/26 11:05:16', 17),
(44, '13id551en0894ti08942', '127.0.0.1', '2012/12/25 11:20:45', 3),
(45, '13id562en7666ti76669', '127.0.0.1', '2012/12/24 20:12:59', 3),
(46, '13id534en6387ti63876', '127.0.0.1', '2012/12/25 07:29:05', 3),
(47, '13id544en7002ti70029', '127.0.0.1', '2012/12/24 16:25:58', 1),
(48, '13id544en6830ti68307', '127.0.0.1', '2012/12/24 19:10:59', 2),
(49, '13id563en4654ti46549', '127.0.0.1', '2012/12/26 11:05:15', 7),
(50, '13id545en8602ti86025', '127.0.0.1', '2012/12/24 22:34:18', 1),
(51, '13id544en7000ti70000', '127.0.0.1', '2012/12/26 11:23:48', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(30) DEFAULT NULL,
  `user_agent` varchar(50) DEFAULT NULL,
  `datetime` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`id`, `ip_address`, `user_agent`, `datetime`) VALUES
(6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko', '2012/12/24 08:58:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '192.168.1.2', 'akan.gery@gmail.com', '2012-12-04 16:12:33'),
(2, '127.0.0.1', 'admin', '2012-12-04 20:01:06'),
(3, '192.168.1.9', 'akun.gery@yahoo.co.id', '2012-12-20 20:13:55'),
(4, '127.0.0.1', 'akun.gery@gmail.com', '2012-12-26 12:15:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `identifier` varchar(50) NOT NULL,
  `question` text NOT NULL,
  `chronology` varchar(55) NOT NULL,
  `time_created` date NOT NULL,
  PRIMARY KEY (`q_id`),
  UNIQUE KEY `identifier` (`identifier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `questions`
--

INSERT INTO `questions` (`q_id`, `user_id`, `identifier`, `question`, `chronology`, `time_created`) VALUES
(1, 11, '13id510en5487ti54872', 'Beatiful where ever you are', '<p>testing kode</p>', '2012-10-24'),
(2, 11, '13id510en5503ti55035', 'you huuuuu', '<blockquote>\r\n<p style="text-align: center;"><strong>sa', '2012-10-24'),
(3, 15, '13id510en4635ti46358', 'wkiikikiki?', 'wkokokokop?', '2012-10-25'),
(4, 11, '13id510en5649ti56496', 'aasfasdfdsaf11', '<p>1111</p>', '2012-10-24'),
(5, 11, '13id510en6447ti64478', 'Coba Tanta Soal masalalaha nin', '<p>asfkklsdagkls;jgl;adsgjlsdfgsdfghjjj</p>', '2012-10-24'),
(6, 11, '13id511en6064ti60641', 'Google donts qwower form m,e,?? HELP', '<p>Why Why why why ....... why</p>', '2012-10-25'),
(7, 11, '13id511en6414ti64147', 'iku bantale no gak penak?', '<p>kok iso gak penak piye? emboh takono bakule</p>', '2012-10-25'),
(8, 11, '13id511en6929ti69292', 'fafggttt', '<p>sdagdgdfsghfdsg</p>', '2012-10-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `srt_movie`
--

CREATE TABLE IF NOT EXISTS `srt_movie` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mtitle` varchar(80) NOT NULL,
  `mtitle_identifier` varchar(80) NOT NULL,
  `msinopsis` text,
  `mrelease_date` datetime DEFAULT NULL,
  `mtags` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mid`),
  UNIQUE KEY `identifier` (`mtitle_identifier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=108 ;

--
-- Dumping data untuk tabel `srt_movie`
--

INSERT INTO `srt_movie` (`mid`, `user_id`, `mtitle`, `mtitle_identifier`, `msinopsis`, `mrelease_date`, `mtags`) VALUES
(95, 11, 'Test ke tiga tag slicing seharusnya berhasil..', '13id534en6387ti63876', '<pre class="brush: php;fontsize: 100; first-line: 1; ">[Date]\r\n; Defines the default timezone used by the date functions\r\n; http://php.net/date.timezone\r\ndate.timezone = Asia/Dubai\r\n\r\n; http://php.net/date.default-latitude\r\n;date.default_latitude = 31.7667\r\n\r\n; http://php.net/date.default-longitude\r\n;date.default_longitude = 35.2333\r\n\r\n; http://php.net/date.sunrise-zenith\r\n;date.sunrise_zenith = 90.583333\r\n\r\n; http://php.net/date.sunset-zenith\r\n;date.sunset_zenith = 90.583333  </pre>', '2012-11-21 09:11:16', 'array php looping'),
(98, 11, 'Matlab Code for Cropping the Image', '13id544en6823ti68239', '<p>Duster is a sophisticated theme designed and developed by Automattic, offering a unique page template to turn your blog into a showcase of different kinds of posts &ndash; Featured with an image, Asides, Link posts, and more. It also supports customization options like custom backgrounds, headers, menus, and widgets.</p>', '2012-12-03 00:10:39', 'php java lamp'),
(99, 11, 'php dari beberaap kode', '13id544en6830ti68307', '<pre class="brush: php;fontsize: 100; first-line: 1; ">&lt;?php\r\n	$grav=$this-&gt;Search_email-&gt;get_email("$user_id");\r\n	$profil_gravatar = $this-&gt;gravatar-&gt;get_gravatar($grav);\r\n	$this-&gt;notifications-&gt;notify(''This is a notification.'');\r\n?&gt;\r\n&lt;?php echo $this-&gt;notifications-&gt;display_js(); ?&gt;</pre>', '2012-12-03 00:11:47', 'php'),
(100, 11, 'Ali kok panggah delok naruto ae?', '13id544en7000ti70000', '<p>Your configuration file contains settings (root with no password) that correspond to the default MySQL privileged account. Your MySQL server is running with this default, is open to intrusion, and you really should fix this security hole by setting a password for user ''root''.</p>', '2012-12-03 00:40:00', 'greasemonkey namespace memory'),
(101, 11, 'wordpress mysql_num_rows query', '13id544en7002ti70029', '<p>The additional features for working with linked tables have been deactivated. To find out why click <a href="../../../phpmyadmin/chk_rel.php?token=daa10abb194668c9c8964123e6c5b361">here</a>.</p>', '2012-12-03 00:40:29', 'array php looping'),
(103, 12, 'Dynamic rows of divs (boxes) using CSS?', '13id545en8602ti86025', '<p>I have a variable number of boxes and I''d like to display as many as I can without forcing the viewer to scroll horizontally, there should also be a certain space in between them. This means that the boxes will have to move to the next or previous "row" if the browser is resized.</p>\r\n<p>How do I achieve this using divs and CSS?</p>\r\n<p>Thanks in advance :-)</p>', '2012-12-04 08:53:45', 'html css div'),
(104, 10, 'Ini kode CSS yang saya curi dari website ini, bagaimana cara memasukkan css ini ', '13id551en0894ti08942', '<p>Ini kode CSS yang saya curi dari website ini</p>\r\n<pre class="brush: css;fontsize: 100; first-line: 1; ">select:focus, input[type="file"]:focus, input[type="radio"]:focus, input[type="checkbox"]:focus {\r\n    outline: thin dotted #333333;\r\n    outline-offset: -2px;\r\n}</pre>', '2012-12-10 10:09:02', 'array php java'),
(106, 10, 'why would you do this?', '13id562en7695ti76955', '<h2><strong>why would you do this?</strong></h2>\r\n<p>While iOS and Android offer OpenGL for adding rich graphics to native apps, you may want to add similar (albeit more primitive) capabilities to your web-based app. I had recently come to this problem while doing some prototypical gesture recognition work which I wanted to test using the iPad&rsquo;s screen. Since I just needed to trace and capture the path of a finger on the screen, it seemed like a more attractive option to quickly throw together such an interface in a web browser using html &amp; javascript.</p>\r\n<pre class="brush: php;fontsize: 100; first-line: 1; ">// create a drawer which tracks touch movements\r\nvar drawer = {\r\n   isDrawing: false,\r\n   touchstart: function(coors){\r\n      context.beginPath();\r\n      context.moveTo(coors.x, coors.y);\r\n      this.isDrawing = true;\r\n   },\r\n   touchmove: function(coors){\r\n      if (this.isDrawing) {\r\n         context.lineTo(coors.x, coors.y);\r\n         context.stroke();\r\n      }\r\n   },\r\n   touchend: function(coors){\r\n      if (this.isDrawing) {\r\n         this.touchmove(coors);\r\n         this.isDrawing = false;\r\n      }\r\n   }\r\n};</pre>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '2012-12-23 22:35:55', 'javascript autocomplete'),
(107, 12, 'I''ve seen a solution for not having to rework usage of the ereg function for PHP', '13id563en4654ti46549', '<pre class="brush: php;fontsize: 100; first-line: 1; ">::-webkit-scrollbar-track-piece  {\r\nbackground-color: #C2D2E4;\r\n}</pre>', '2012-12-24 17:55:49', 'greasemonkey namespace memory');

-- --------------------------------------------------------

--
-- Struktur dari tabel `srt_movie_comments`
--

CREATE TABLE IF NOT EXISTS `srt_movie_comments` (
  `comid` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `identifi` varchar(30) NOT NULL,
  `comvisitor` varchar(20) NOT NULL,
  `comemail` varchar(50) NOT NULL,
  `comcomment` varchar(1500) NOT NULL,
  `comdate_create` datetime NOT NULL,
  `kode` text NOT NULL,
  `comapprove` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`comid`),
  KEY `FK_movie_id_num` (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabel komentar khsus untuk Film' AUTO_INCREMENT=24 ;

--
-- Dumping data untuk tabel `srt_movie_comments`
--

INSERT INTO `srt_movie_comments` (`comid`, `mid`, `identifi`, `comvisitor`, `comemail`, `comcomment`, `comdate_create`, `kode`, `comapprove`) VALUES
(13, 104, '13id551en0894ti08942', 'Gery', 'akun.gery@gmail.com', '<p>Answer 2</p>', '2012-12-14 01:07:33', '0', 0),
(14, 104, '13id551en0894ti08942', 'monk3y', 'monk3y.mars@gmail.com', '<p><a href="http://glyphicons.com/">Glyphicons</a> Halflings are normally not available for free, but an arrangement between Bootstrap and the Glyphicons creators have made this possible at no cost to you as developers. As a thank you, we ask you to include an optional link back to <a href="http://glyphicons.com/">Glyphicons</a> whenever practical.</p>', '2012-12-14 01:08:31', '0', 0),
(15, 101, '13id544en7002ti70029', 'monk3y', 'monk3y.mars@gmail.com', '<p><strong>Make buttons look unclickable by fading them back 50%.</strong></p>\r\n<pre class="brush: xml;fontsize: 100; first-line: 1; ">    &lt;a class="btn" href=""&gt;Link&lt;/a&gt;\r\n    &lt;button class="btn" type="submit"&gt;Button&lt;/button&gt;\r\n    &lt;input class="btn" type="button" value="Input"&gt;\r\n    &lt;input class="btn" type="submit" value="Submit"&gt;</pre>\r\n<p>Make buttons look unclickable by fading them back 50%.</p>\r\n<p>&nbsp;</p>', '2012-12-14 01:27:58', '0', 0),
(16, 101, '13id544en7002ti70029', 'monk3y', 'monk3y.mars@gmail.com', '<p>But that not the main</p>\r\n<div id="footer">\r\n<p>Copyrioht &copy; Kodepath 2012 All Rights Reserved</p>\r\n<p>Powered by <a title="kodepath" href="../../" target="_blank">Kodepath</a></p>\r\n</div>', '2012-12-14 01:28:48', '0', 0),
(17, 99, '13id544en6830ti68307', 'akungery', 'akun.gery@yahoo.co.id', '<p>The fluid grid system uses percents instead of pixels for column widths. It has the same responsive capabilities as our fixed grid system, ensuring proper proportions for key screen resolutions and devices.</p>\r\n<pre class="brush: bash;fontsize: 100; first-line: 1; ">    &lt;div class="btn-group"&gt;\r\n    &lt;button class="btn btn-mini"&gt;Action&lt;/button&gt;\r\n    &lt;button class="btn btn-mini dropdown-toggle" data-toggle="dropdown"&gt;\r\n    &lt;span class="caret"&gt;&lt;/span&gt;\r\n    &lt;/button&gt;\r\n    &lt;ul class="dropdown-menu"&gt;\r\n    &lt;!-- dropdown menu links --&gt;\r\n    &lt;/ul&gt;\r\n    &lt;/div&gt;</pre>\r\n<p>Thats would be <strong>nice</strong> :D</p>\r\n<p>&nbsp;</p>', '2012-12-17 13:15:38', '0', 0),
(18, 100, '13id544en7000ti70000', 'akungery', 'akun.gery@yahoo.co.id', '<pre class="brush: plain;fontsize: 100; first-line: 1; ">(or set this for the last TD as Sander suggested instead).\r\n\r\nThis forces the inline-LIs not to break. Unfortunately this does not lead to a new width calculation in the containing UL (and this parent TD), and therefore does not autosize the last TD.\r\n\r\nThis means: if an inline element has no given width, a TD''s width is always computed automatically first (if not specified). Then its inline content with this calculated width gets rendered and the white-space-property is applied, stretching its content beyond the calculated boundaries.\r\n\r\nSo I guess it''s not possible without having an element within the last TD with a specific width. </pre>', '2012-12-19 17:31:28', '0', 0),
(19, 95, '13id534en6387ti63876', 'akungery', 'akun.gery@yahoo.co.id', '<p>Atau coba menggunakan kode ini : sekedar referensi anda</p>\r\n<pre class="brush: xml;fontsize: 100; first-line: 1; ">&lt;head&gt;&lt;META HTTP-EQUIV="Refresh" C /><br /></pre>', '2012-12-20 20:18:18', '0', 0),
(20, 104, '13id551en0894ti08942', 'akungery', 'akun.gery@yahoo.co.id', '<p>Test Post Answer Button :D</p>', '2012-12-23 05:19:45', '0', 0),
(21, 98, '13id544en6823ti68239', 'akungery', 'akun.gery@yahoo.co.id', '<p><strong><abbr title="attribute">Duster is a sophisticated theme designed and developed by Automattic, offering a unique page template to turn your blog into a showcase of different kinds of posts &ndash; Featured with an image, Asides, Link posts, and more. It also supports customization options like custom backgrounds, headers, menus, and widgets.</abbr></strong></p>', '2012-12-23 05:45:11', '0', 0),
(22, 103, '13id545en8602ti86025', 'akungery', 'akun.gery@yahoo.co.id', '<p><span  underline;">test</span> <em>Post</em> <strong>Answer</strong></p>', '2012-12-23 19:45:55', '0', 0),
(23, 106, '13id562en7695ti76955', 'akungery', 'akun.gery@yahoo.co.id', '<pre class="brush: jscript;fontsize: 100; first-line: 1; ">function person(firstname,lastname,age,eyecolor)\r\n{\r\nthis.firstname=firstname;\r\nthis.lastname=lastname;\r\nthis.age=age;\r\nthis.eyecolor=eyecolor;\r\n\r\nthis.changeName=changeName;\r\nfunction changeName(name)\r\n{\r\nthis.lastname=name;\r\n}\r\n}</pre>', '2012-12-23 22:36:56', '0', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `srt_movie_litlecomment`
--

CREATE TABLE IF NOT EXISTS `srt_movie_litlecomment` (
  `lilcomid` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `identifi` varchar(30) NOT NULL,
  `lilcomvisitor` varchar(20) NOT NULL,
  `lilcomemail` varchar(50) NOT NULL,
  `lilcomment` varchar(150) NOT NULL,
  `lilcomdate` datetime NOT NULL,
  `lilcomapprove` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`lilcomid`),
  KEY `FK_movie_id_num` (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Table Komentar Kecil' AUTO_INCREMENT=49 ;

--
-- Dumping data untuk tabel `srt_movie_litlecomment`
--

INSERT INTO `srt_movie_litlecomment` (`lilcomid`, `mid`, `identifi`, `lilcomvisitor`, `lilcomemail`, `lilcomment`, `lilcomdate`, `lilcomapprove`) VALUES
(24, 103, '13id545en8602ti86025', 'Gery', 'akun.gery@gmail.com', 'bwahahahahahah ye yey', '2012-12-13 21:34:06', 0),
(25, 101, '13id544en7002ti70029', 'monk3y', 'monk3y.mars@gmail.com', 'this site more simple and clear', '2012-12-14 01:28:18', 0),
(26, 101, '13id544en7002ti70029', 'monk3y', 'monk3y.mars@gmail.com', 'bwahahahahahah ye yey', '2012-12-14 01:29:06', 0),
(27, 101, '13id544en7002ti70029', 'monk3y', 'monk3y.mars@gmail.com', 'ini akan di ganti dengan ajax', '2012-12-14 01:29:16', 0),
(33, 104, '13id551en0894ti08942', 'Gery', 'akun.gery@gmail.com', 'Halflings are normally not available for free, but an arrangement between Bootstrap and the Glyphicons Halflings are normally not available for free, ', '2012-12-17 01:08:50', 0),
(34, 104, '13id551en0894ti08942', 'Gery', 'akun.gery@gmail.com', 'Answer Komentar*minimal 3 karakter, maksimal 250 karakter', '2012-12-17 01:13:03', 0),
(36, 104, '13id551en0894ti08942', 'monk3y', 'monk3y.mars@gmail.com', 'Nice. I made simple comment form using bootrap. i have no idea if i make it from the start :)', '2012-12-17 10:15:13', 0),
(38, 99, '13id544en6830ti68307', 'monk3y', 'monk3y.mars@gmail.com', 'Nice. I made simple comment form using bootrap. i have no idea if i make it from the start :)', '2012-12-17 13:12:32', 0),
(39, 99, '13id544en6830ti68307', 'akungery', 'akun.gery@yahoo.co.id', 'monkey, why dont you learn aobout css? it easy. a loot of article about css on google. googling it!', '2012-12-17 13:14:21', 0),
(40, 104, '13id551en0894ti08942', 'monk3y', 'monk3y.mars@gmail.com', 'add new comment then the number comments would be 4 :D', '2012-12-17 16:58:10', 0),
(41, 100, '13id544en7000ti70000', 'akungery', 'akun.gery@yahoo.co.id', 'fuck off all of you guys. you fuckin waste my time', '2012-12-19 17:24:33', 0),
(42, 100, '13id544en7000ti70000', 'akungery', 'akun.gery@yahoo.co.id', 'Your configuration file contains settings (root with no password) that correspond to the default MySQL privileged account. Your MySQL server is runnin', '2012-12-19 18:41:35', 0),
(43, 100, '13id544en7000ti70000', 'Gery', 'akun.gery@gmail.com', 'Your configuration file contains settings (root with no password)', '2012-12-20 10:12:24', 0),
(44, 100, '13id544en7000ti70000', 'Gery', 'akun.gery@gmail.com', 'by setting a password for user ''root''.', '2012-12-20 10:12:47', 0),
(45, 95, '13id534en6387ti63876', 'akungery', 'akun.gery@yahoo.co.id', 'mungkin kesalahan ada pada penulisan tag htmlnya', '2012-12-20 20:17:04', 0),
(46, 104, '13id551en0894ti08942', 'akungery', 'akun.gery@yahoo.co.id', 'looks great', '2012-12-23 05:19:57', 0),
(47, 106, '13id562en7695ti76955', 'akungery', 'akun.gery@yahoo.co.id', 'Nice. I made simple comment form using bootrap. i have no idea if i make it from the start :)', '2012-12-23 22:36:33', 0),
(48, 107, '13id563en4654ti46549', 'monk3y', 'monk3y.mars@gmail.com', 'Ini komentar ke3 yang di coba untuk test redirect php ke data detail', '2012-12-24 22:44:56', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(30) NOT NULL,
  `tag_description` varchar(55) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15416 ;

--
-- Dumping data untuk tabel `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`, `tag_description`) VALUES
(15363, 'js', ''),
(15364, 'css3', ''),
(15365, 'greasemonkey', ''),
(15366, 'howto', ''),
(15367, 'java', ''),
(15368, 'javascript', ''),
(15369, 'java', ''),
(15370, 'brush.js', ''),
(15371, 'java', ''),
(15372, 'java', ''),
(15373, 'java', ''),
(15374, 'css3', ''),
(15375, 'codeigniter', ''),
(15376, 'php', ''),
(15377, 'codeigniter', ''),
(15378, 'php', ''),
(15379, 'php', ''),
(15380, 'array', ''),
(15381, 'html', ''),
(15382, 'sql', ''),
(15383, 'php', ''),
(15384, 'array', ''),
(15385, 'php', ''),
(15386, 'looping', ''),
(15387, 'hack', ''),
(15388, 'keycodes', ''),
(15389, 'java', ''),
(15390, 'performance', ''),
(15391, 'matlab', ''),
(15392, 'programming', ''),
(15393, 'hack', ''),
(15394, 'keycodes', ''),
(15395, 'java', ''),
(15396, 'performance', ''),
(15397, 'html', ''),
(15398, 'css', ''),
(15399, 'div', ''),
(15400, 'array', ''),
(15401, 'php', ''),
(15402, 'java', ''),
(15403, 'php', ''),
(15404, 'java', ''),
(15405, 'greasemonkey', ''),
(15406, 'namespace', ''),
(15407, 'memory', ''),
(15408, 'html', ''),
(15409, 'css', ''),
(15410, 'div', ''),
(15411, 'javascript', ''),
(15412, 'autocomplete', ''),
(15413, 'greasemonkey', ''),
(15414, 'namespace', ''),
(15415, 'memory', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tagging`
--
CREATE TABLE IF NOT EXISTS `tagging` (
`tag_name` varchar(30)
,`tag_id` int(11)
,`ctag` bigint(21)
);
-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_map`
--

CREATE TABLE IF NOT EXISTS `tag_map` (
  `tagmap_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`tagmap_id`),
  KEY `q_id` (`q_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tag_map`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(10, 'akungery', '$2a$08$i2qe8jZIA6giA/OP9REkM.y6OEqzhyqNBySoeY1369ftlqQG1Pr5q', 'akun.gery@yahoo.co.id', 0, 0, NULL, NULL, NULL, NULL, '76846704dce6e4f2ccb1e4a8a542f48e', '127.0.0.1', '0000-00-00 00:00:00', '2012-08-30 20:20:43', '2012-08-31 01:20:43'),
(11, 'monk3y', '$2a$08$kjaKhioafHsH/QmcAerrEet29buj/4tjw2UDm5tO9H4uOmF3xxTRy', 'monk3y.mars@gmail.com', 0, 0, NULL, NULL, NULL, NULL, '53612dd8fa45806b995f09b9aafdd457', '127.0.0.1', '0000-00-00 00:00:00', '2012-08-31 04:12:55', '2012-08-31 09:12:55'),
(12, 'Gery', '$2a$08$9upPO74bVuNd0HMzEOJ4guiTyy.OT2423JRFcFoTmlCs4mpqE/Aue', 'akun.gery@gmail.com', 0, 0, NULL, NULL, NULL, NULL, '7d8d80b69aecf698a2a869f2137d7f0f', '127.0.0.1', '0000-00-00 00:00:00', '2012-09-21 16:10:25', '2012-09-21 21:10:25'),
(13, 'gading', '$2a$08$JBT5e3Ig5NITAd1WDhRDuO3KMw7/vt2Bv.LxmYZ3whEDJmVzzmoNe', 'gading@gmail.com', 0, 0, NULL, NULL, NULL, NULL, '26791ca9bc289cfd94b8724ab655d87e', '::1', '0000-00-00 00:00:00', '2012-10-27 09:41:35', '2012-10-27 14:41:35'),
(14, 'freeman', '$2a$08$SWKTFvFtgZs1.2SKF9peUu2JUdvpaA/FleL8WlEBGCI6wWK4QctN.', 'freeman@gmail.com', 0, 0, NULL, NULL, NULL, NULL, '293ef4c3da12d73a5d6b32afec1b4a80', '::1', '0000-00-00 00:00:00', '2012-10-27 11:24:51', '2012-10-27 16:24:51'),
(15, 'novianto', '$2a$08$xTCUXE8iDg8bfheoS2UF.Oq9WK2dsakc6QrAS7zS8Rgz3fr0mkihq', 'novianto74@gmail.com', 0, 0, NULL, NULL, NULL, NULL, '796ecbf524e8adcdff350a90f95c728f', '192.168.1.2', '0000-00-00 00:00:00', '2012-11-05 06:17:06', '2012-11-05 12:17:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `user_autologin`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `real_name` varchar(35) COLLATE utf8_bin NOT NULL,
  `profile_email` varchar(35) COLLATE utf8_bin NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `department` varchar(35) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `real_name`, `profile_email`, `country`, `website`, `department`) VALUES
(8, 10, 'Wibowo', 'akun.gery@yahoo.co.id', 'indonesia', 'http://kodepath.co.id', 'Programming'),
(9, 12, 'Gery 2', 'akun.gery@gmail.com', 'indonesia', 'http://wuwewe.co.id', 'Design');

-- --------------------------------------------------------

--
-- Structure for view `tagging`
--
DROP TABLE IF EXISTS `tagging`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tagging` AS select `t`.`tag_name` AS `tag_name`,`t`.`tag_id` AS `tag_id`,count(0) AS `ctag` from `tag` `t` group by `t`.`tag_name` order by count(0) desc,`t`.`tag_name` desc;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `srt_movie_comments`
--
ALTER TABLE `srt_movie_comments`
  ADD CONSTRAINT `FK_movie_id_num` FOREIGN KEY (`mid`) REFERENCES `srt_movie` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `srt_movie_litlecomment`
--
ALTER TABLE `srt_movie_litlecomment`
  ADD CONSTRAINT `srt_movie_litlecomment_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `srt_movie` (`mid`);
