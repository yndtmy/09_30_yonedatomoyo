-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2019 at 05:08 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsf_d03_db30`
--
CREATE DATABASE IF NOT EXISTS `gsf_d03_db30` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `gsf_d03_db30`;

-- --------------------------------------------------------

--
-- Table structure for table `07_30_yonedatomoyo`
--

CREATE TABLE `07_30_yonedatomoyo` (
  `id` int(12) NOT NULL,
  `name1` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `address1` text COLLATE utf8_unicode_ci,
  `url1` text COLLATE utf8_unicode_ci,
  `toilet` int(11) NOT NULL,
  `toilet_comment` text COLLATE utf8_unicode_ci,
  `slide` int(11) NOT NULL,
  `sandbox` int(11) NOT NULL,
  `swing` int(11) NOT NULL,
  `ball` int(11) NOT NULL,
  `drink` int(11) NOT NULL,
  `date1` datetime NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `img` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `07_30_yonedatomoyo`
--

INSERT INTO `07_30_yonedatomoyo` (`id`, `name1`, `address1`, `url1`, `toilet`, `toilet_comment`, `slide`, `sandbox`, `swing`, `ball`, `drink`, `date1`, `comment`, `img`) VALUES
(10, '大濠公園 西側児童遊園（どんぐり公園）', '福岡県福岡市中央区大濠公園１', 'https://www.ohorikouen.jp/', 1, '通りを挟んで向かいにあり\r\nオムツ替えもできます！', 1, 1, 1, 2, 1, '2019-07-08 00:25:20', '大濠公園内にあります。\r\nクジラ公園より小さい子向けみたいです。\r\n砂場は2箇所あり、スコップなども自由に使えます。', '../upload/20190707152520d41d8cd98f00b204e9800998ecf8427e.jpg'),
(11, '大濠公園 東側児童遊園（くじら公園）', '福岡県福岡市中央区大濠公園１−１', 'https://www.ohorikouen.jp/', 1, '大濠公園内にあります\r\n綺麗さを求めるならスタバにもあります', 1, 2, 1, 2, 1, '2019-07-08 00:28:47', '同じ公園内にあるどんぐり公園より大きい子向け\r\n舞鶴公園につながっています。', '../upload/20190707152847d41d8cd98f00b204e9800998ecf8427e.JPG'),
(13, '舞鶴公園', '福岡県福岡市中央区城内１', 'https://www.midorimachi.jp/maiduru/abouts/', 1, 'とくになし', 1, 1, 2, 2, 2, '2019-07-08 00:38:48', '桜のシーズンはとてもきれいです。\r\n公園はシンプルなのであまり期待しないほうが良い', '../upload/20190707153848d41d8cd98f00b204e9800998ecf8427e.JPG'),
(14, '六本松公園', '福岡県福岡市中央区六本松４丁目９−１５', 'https://nippon1000parks.blogspot.com/2018/01/16981000.html', 1, 'きれいです', 1, 1, 2, 1, 1, '2019-07-08 00:42:06', '科学館の裏にあります。\r\n大きなロープピラミッドに子供達が群がっています。', '../upload/20190707154206d41d8cd98f00b204e9800998ecf8427e.JPG'),
(15, '舞鶴公園西広場', '福岡県福岡市中央区城内２−２', 'なし', 1, 'とくになし', 2, 2, 2, 1, 1, '2019-07-08 00:45:01', '桜のシーズンはとてもきれいです。 公園はシンプルなのであまり期待しないほうが良い', '../upload/20190707154501d41d8cd98f00b204e9800998ecf8427e.jpg'),
(16, 'テスト公園', '福岡県福岡市中央区鳥飼', 'なし', 2, 'テスト', 2, 2, 2, 2, 2, '2019-07-08 00:47:21', 'てすとだよ〜', '../upload/20190707154721d41d8cd98f00b204e9800998ecf8427e.png'),
(17, 'テスト2', '福岡県福岡市中央区鳥飼', 'なし', 2, 'テスト2', 2, 2, 2, 2, 2, '2019-07-08 00:50:05', 'テスト2だよ〜', '../upload/20190707155005d41d8cd98f00b204e9800998ecf8427e.png');

-- --------------------------------------------------------

--
-- Table structure for table `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `comment`, `indate`) VALUES
(1, 'みかづき', 'https://www.amazon.co.jp/みかづき-集英社文庫-森-絵都/dp/4087458067/ref=sr_1_1?__mk_ja_JP=カタカナ&keywords=みかづき&qid=1560000211&s=gateway&sr=8-1', '本屋大賞2017第2位\r\n学習塾の走り出し・経営3世代奮闘記', '2019-06-08 22:35:30'),
(2, '限界集落株式会社', 'https://www.amazon.co.jp/s?k=%E9%99%90%E7%95%8C%E9%9B%86%E8%90%BD&i=stripbooks&__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&ref=nb_sb_noss_1', 'ITおじさん→過疎・高齢化・雇用問題・食糧自給率→解決に奮闘', '2019-06-08 22:43:53'),
(3, '生きるぼくら', 'https://www.amazon.co.jp/%E7%94%9F%E3%81%8D%E3%82%8B%E3%81%BC%E3%81%8F%E3%82%89-%E5%8E%9F%E7%94%B0%E3%83%9E%E3%83%8F/dp/4198634718', 'ひきこもり→農業家', '2019-06-08 22:47:25'),
(4, '平成くんさようなら', 'https://www.amazon.co.jp/%E5%B9%B3%E6%88%90%E3%81%8F%E3%82%93%E3%80%81%E3%81%95%E3%82%88%E3%81%86%E3%81%AA%E3%82%89-%E5%8F%A4%E5%B8%82-%E6%86%B2%E5%AF%BF/dp/4163909230', 'おしゃれ生活切り取り小説\r\n安楽死\r\nGoogle Homeの宣伝', '2019-06-08 22:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `php02_table`
--

CREATE TABLE `php02_table` (
  `id` int(12) NOT NULL,
  `task` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `img` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `php02_table`
--

INSERT INTO `php02_table` (`id`, `task`, `deadline`, `comment`, `img`, `indate`) VALUES
(2, 'JavaScript課題', '2019-06-08', '余裕？', NULL, '2019-06-08 15:35:51'),
(3, 'スーパー', '2019-06-08', '醤油\r\n豚肉', NULL, '2019-06-08 15:38:27'),
(4, 'ツルハドラッグ', '2019-06-08', '箱ティッシュ', NULL, '2019-06-08 15:39:23'),
(5, '保育園', '2019-06-10', '箱ティッシュ(お名前書く)', NULL, '2019-06-08 15:41:51'),
(9, '100均', '2019-06-08', 'ビニール袋', NULL, '2019-06-08 15:44:55'),
(13, '123', '2019-07-06', 'てすと', 'upload/20190706082359d41d8cd98f00b204e9800998ecf8427e.png', '2019-07-06 17:23:59'),
(15, 'テスト1', '2019-07-06', 'っっw', 'upload/20190706085609d41d8cd98f00b204e9800998ecf8427e.png', '2019-07-06 17:56:09'),
(16, '献立', '2019-07-06', 'てすと', 'upload/20190706085724d41d8cd98f00b204e9800998ecf8427e.png', '2019-07-06 17:57:24'),
(17, 'php課題', '2019-07-06', '123', 'upload/20190706085800d41d8cd98f00b204e9800998ecf8427e.png', '2019-07-06 17:58:00'),
(18, 'テスト1', '2019-07-06', 'っっっt', 'upload/20190706085843d41d8cd98f00b204e9800998ecf8427e.png', '2019-07-06 17:58:43'),
(19, '献立', '2019-07-01', 'tttt', 'upload/20190706085921d41d8cd98f00b204e9800998ecf8427e.png', '2019-07-06 17:59:21'),
(20, 'php課題', '2019-07-06', 'rrrr', NULL, '2019-07-06 18:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(12) NOT NULL,
  `nn` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `nn`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(10, 'テストちゃん', '123', '123', 0, 0),
(12, '管理さん', '456', '456', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `07_30_yonedatomoyo`
--
ALTER TABLE `07_30_yonedatomoyo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php02_table`
--
ALTER TABLE `php02_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `07_30_yonedatomoyo`
--
ALTER TABLE `07_30_yonedatomoyo`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `php02_table`
--
ALTER TABLE `php02_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
