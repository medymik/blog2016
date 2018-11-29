-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2016 at 04:16 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `estAdmin` enum('0','1') DEFAULT '0',
  `pseudo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `mdp`, `estAdmin`, `pseudo`) VALUES
(1, 'admin@loc.fr', 'admin123', '1', 'admin'),
(4, 'anass@loc.fr', 'Anass123', '0', 'Anass'),
(5, 'contact@medymik.com', 'boBoux', '0', 'boBoux'),
(7, 'ppp@ppp.pp', 'pppp123', '0', 'pppp');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text,
  `path_image` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `visible` enum('0','1') DEFAULT '0',
  `idCategorie` int(11) DEFAULT NULL,
  `idAdmin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategorie` (`idCategorie`),
  KEY `idAdmin` (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `path_image`, `date`, `visible`, `idCategorie`, `idAdmin`) VALUES
(1, 'Maradona a prent la coupe du monde', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur orci vitae massa volutpat aliquet. Ut efficitur sodales leo quis hendrerit. Ut id libero sed elit ullamcorper faucibus eget congue purus. Donec eget felis magna. Fusce aliquet nunc gravida felis suscipit, ut faucibus eros commodo. Suspendisse pellentesque erat neque, lacinia porta erat lacinia in. Donec rutrum lectus non diam imperdiet euismod. Aliquam eu pharetra sapien. Nunc eu cursus enim, at imperdiet libero. Etiam laoreet, ligula eget tempor laoreet, lorem lectus sodales eros, quis venenatis libero est quis nisi. Sed tempus dapibus hendrerit.\r\n\r\nNam feugiat iaculis lorem, et pulvinar justo posuere ac. Mauris diam purus, dictum eu dignissim a, interdum nec lectus. Curabitur malesuada purus eget massa rutrum consequat. Sed nulla ante, feugiat in magna auctor, aliquet fermentum dolor. Aliquam volutpat maximus libero, sed tempus enim finibus quis. Fusce sagittis tellus non justo sodales, ut pellentesque leo dapibus. Maecenas id vulputate nibh.\r\n\r\nIn accumsan enim fringilla lacus iaculis dignissim. Nulla ac massa sit amet urna pretium hendrerit. Mauris in mi ut leo luctus elementum. Praesent sit amet massa massa. Aenean lobortis arcu sit amet volutpat ultrices. Proin ultricies nisi vehicula ex viverra, nec aliquam risus ultricies. Curabitur hendrerit laoreet mi, vitae finibus nunc scelerisque a.\r\n\r\nQuisque semper, sapien quis ullamcorper vestibulum, tellus nisl pretium ligula, vitae mattis velit velit et orci. Etiam euismod blandit eros, ac fermentum dui porttitor vehicula. Morbi congue, urna ornare dapibus ultrices, mi ante varius felis, et vestibulum ipsum ante at lectus. Maecenas ac tortor quis leo egestas dapibus. Vivamus sodales rhoncus arcu, rhoncus vehicula nulla efficitur eget. Vivamus dapibus tristique dui ut laoreet. Aliquam vitae sagittis quam, cursus facilisis enim. Duis dictum nibh sed erat vulputate, eu dapibus augue elementum. Morbi bibendum sem non sagittis vestibulum.\r\n\r\nNullam vitae augue aliquet, sollicitudin orci sed, feugiat nunc. Vivamus in risus nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean ornare magna vitae imperdiet consequat. Etiam mauris mauris, vestibulum a metus eu, fermentum pharetra lacus. Suspendisse non odio a purus aliquam molestie. Sed egestas, odio vel rhoncus blandit, turpis leo molestie ante, in tincidunt est ligula et mauris. Quisque vestibulum urna lorem, quis malesuada justo tempus aliquet. Donec blandit turpis id magna vestibulum tempor. Maecenas commodo ipsum vel lorem condimentum, vestibulum sodales ligula lobortis. ', 'image/post.png', '2016-05-14 15:12:02', '1', 1, 1),
(2, 'Lorem Ipsum', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id commodo sem. Maecenas sagittis iaculis libero sit amet auctor. Quisque ligula enim, malesuada non euismod at, commodo in neque. Vivamus sagittis, sem et ultricies fermentum, sapien ligula iaculis odio, vel aliquam lorem diam non magna. Nulla massa diam, tempus ac nibh quis, venenatis placerat diam. Donec feugiat pulvinar justo non lacinia. Phasellus finibus venenatis enim sed bibendum. Suspendisse ac dolor eu velit egestas porttitor. Praesent a nisl pellentesque, malesuada ex et, fringilla libero. Pellentesque sed aliquet turpis. Sed ultricies ante quis tempus hendrerit. Aenean eu urna sed sapien ultrices congue. Proin aliquam tellus eget euismod ultrices. Praesent tempor orci at lacus vulputate elementum.\r\n\r\nPraesent vitae fermentum est. Etiam ut dolor diam. Phasellus convallis lorem sapien, at luctus est fermentum vel. Curabitur quis tortor quis sem gravida faucibus sit amet nec quam. Nullam cursus fermentum auctor. Sed eget nisi augue. Nulla eu rutrum leo. Nullam hendrerit tincidunt felis, vel tristique mauris mattis ut. Nam tempus vestibulum euismod. Donec vestibulum tortor erat. Etiam vitae eros laoreet, fringilla dui non, porttitor ante. Fusce faucibus pellentesque odio, nec viverra lacus egestas quis. Praesent eros ligula, molestie non hendrerit ac, vestibulum sollicitudin nisi. Integer ut eros nec tortor facilisis pharetra vel ultrices arcu. Aliquam efficitur dui quis justo tincidunt tempus.\r\n\r\nVestibulum aliquam dui nec laoreet sodales. Aenean eget feugiat ante. Proin euismod sapien tellus, non suscipit felis commodo fringilla. Pellentesque ex ex, tempus vel metus et, luctus auctor felis. In hac habitasse platea dictumst. Integer diam diam, luctus eu neque nec, maximus lobortis est. Pellentesque dictum orci nulla, id aliquam turpis interdum et.\r\n\r\nDuis lobortis mauris porttitor ipsum euismod, id vestibulum est ornare. Etiam sed mi sollicitudin, interdum dolor sit amet, dictum mi. Ut luctus, odio quis elementum aliquam, odio massa malesuada ex, ut vehicula purus tellus in eros. Nunc nec facilisis sem, sit amet cursus justo. Donec venenatis sapien in nulla rutrum tempus. Quisque eu laoreet ante. In hac habitasse platea dictumst. Vivamus et aliquet nisl, in placerat nisl.\r\n\r\nNullam gravida ex ut iaculis congue. Quisque eget porttitor nisi, sit amet tincidunt dui. Aliquam non venenatis enim. Cras mollis id tellus quis efficitur. Sed porta lacinia auctor. Fusce efficitur quam massa, eu rhoncus libero ultricies at. Proin iaculis aliquam augue sit amet bibendum. Integer posuere odio orci, non placerat ex pharetra nec. ', 'image/post.png', '2016-05-14 15:13:54', '1', 2, 1),
(3, 'Lorem Ipsum', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper risus dui, at luctus erat ultricies a. Nullam sodales magna vitae urna fermentum ornare. Suspendisse arcu ligula, congue in lacus in, aliquet eleifend turpis. Nam dui dolor, posuere sollicitudin ligula et, vulputate lacinia nulla. Duis molestie laoreet diam, quis viverra est semper sed. Aliquam fringilla nisl non orci vulputate maximus. Donec pretium sed velit et condimentum. Praesent in vulputate lorem, id vulputate elit. Nam blandit dictum finibus. Pellentesque auctor dui non nulla vulputate consectetur. Ut sed aliquam felis.\r\n\r\nNam ornare consequat venenatis. Nulla ut vehicula justo. Vivamus ultrices volutpat purus, quis commodo justo laoreet in. Nunc blandit ac risus et viverra. Nunc dui dolor, lobortis vel tincidunt eu, finibus sit amet orci. Sed aliquet diam ac velit molestie, eu convallis augue consectetur. Nam accumsan bibendum velit et tincidunt. Pellentesque faucibus vel erat sed finibus.\r\n\r\nAliquam erat volutpat. Phasellus mi ex, ultricies et commodo sed, venenatis at nulla. Vivamus auctor massa ut ligula tincidunt sodales. Quisque consectetur nisl et massa faucibus, nec ornare justo commodo. Curabitur et sapien augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent pretium varius pharetra. Etiam vel placerat nisi, ac luctus mauris.\r\n\r\nMorbi interdum lacinia eleifend. Aliquam nisi nulla, placerat sed rutrum nec, tempor in metus. Maecenas sed lectus eu nisi mattis mattis id id mi. Aliquam lacus lectus, tempus id scelerisque gravida, posuere at diam. Etiam rutrum velit augue, et porttitor neque sollicitudin nec. Mauris vitae sapien diam. Nulla laoreet lacus fermentum, posuere lorem a, bibendum lorem. Praesent a ullamcorper nisl, eget ornare purus. Cras in nisi vel nulla tristique ultricies. Vivamus dapibus erat a elit consectetur egestas. Phasellus ultrices orci enim, a ultrices lectus commodo sed.\r\n\r\nMauris eu dui mi. Nulla vel vulputate dui. Mauris sodales ex magna. Ut aliquet in risus eu tempus. Proin mollis consequat ante eget bibendum. Pellentesque in diam vel enim elementum efficitur ut vitae quam. Donec vitae tincidunt libero. Phasellus sit amet sodales felis, vitae consectetur tellus. Suspendisse cursus nunc massa, imperdiet eleifend sapien tincidunt at. Etiam cursus nisl mauris, volutpat congue purus lacinia eget. Quisque vitae massa quis orci efficitur commodo. Donec tempus nisi lectus, ac rhoncus sem mattis sed. In euismod nisi vel scelerisque sodales. ', 'image/post.png', '2016-05-14 15:16:22', '1', 2, 5),
(4, 'Lorem Ipsum Lorem Ipsum', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in velit eros. Aliquam erat volutpat. Quisque feugiat euismod tincidunt. Curabitur maximus enim neque, sit amet blandit diam lacinia a. Etiam a malesuada massa. Nulla sit amet nunc eu ex viverra aliquam. Nulla vestibulum mi et leo rutrum, at semper nunc efficitur. Praesent mauris nunc, elementum ut lacus eu, ultrices aliquam lacus. Nullam eu dui facilisis tellus ullamcorper bibendum eget sed elit. Ut in fermentum tortor. Nulla rutrum quis nibh sed dignissim. Cras maximus lorem ac enim suscipit, id placerat orci dignissim. Integer congue congue sodales. Duis suscipit felis non dolor consequat, quis consequat metus viverra. Sed tincidunt nibh rhoncus nisi bibendum tincidunt.\r\n\r\nNullam aliquam auctor felis, sed maximus augue consectetur a. Donec condimentum tortor vehicula sapien viverra, id consectetur erat consequat. Nam a venenatis quam, a semper purus. Mauris in fermentum est. Nunc interdum odio at sagittis venenatis. Cras a venenatis tellus. Vivamus nec ligula porta, lacinia nunc pellentesque, rutrum turpis.\r\n\r\nVestibulum sit amet facilisis odio. Integer iaculis, augue id mollis maximus, turpis sem consectetur massa, eget scelerisque leo risus sollicitudin tellus. Etiam congue cursus urna, vitae fermentum elit feugiat nec. Nulla volutpat risus metus, ut rhoncus ex sagittis in. Suspendisse iaculis metus non libero maximus interdum. Fusce blandit mi quis tempus interdum. Curabitur lorem orci, bibendum in tortor vitae, pretium tincidunt odio. Integer mattis felis a lacinia convallis. Donec odio odio, pharetra sagittis purus et, pellentesque blandit erat. Proin rutrum nisi ut posuere blandit. Aliquam et consectetur velit, et posuere massa. Vestibulum scelerisque hendrerit tempor. Nullam enim orci, feugiat sed magna ut, lobortis elementum nisl. Nullam non elit non augue pellentesque porta vitae sit amet nunc. Phasellus eu pulvinar dui.\r\n\r\nCurabitur scelerisque mollis ex sed ultricies. Mauris id ligula ut lorem varius scelerisque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras nisi purus, gravida et felis a, lacinia cursus lorem. Nulla vel accumsan nibh, et pellentesque libero. Donec porta neque non diam venenatis molestie. Pellentesque sollicitudin sem quam, sit amet porttitor massa fringilla in. Fusce tincidunt molestie diam. Nam id dolor porta, efficitur ipsum et, rutrum quam. Nullam id nunc posuere ligula malesuada tempus.\r\n\r\nDonec in sapien eu erat varius lacinia. Mauris lobortis mi a risus mattis pellentesque. Donec ultrices mauris massa, feugiat accumsan est aliquam et. In euismod velit ut nulla volutpat elementum. In consequat nulla at tortor sodales, vitae fringilla neque sagittis. Donec rutrum id felis non rutrum. Fusce dapibus dolor sem, vel condimentum ex feugiat vitae. Maecenas lacinia arcu vitae enim molestie, id laoreet risus viverra. Quisque et blandit purus, sit amet ultricies ante. ', 'image/post.png', '2016-05-14 15:16:22', '1', 3, 4),
(5, 'Neque porro quisquam est qui dolorem ', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec elit dui, molestie sed pulvinar eget, convallis non ligula. Fusce sodales elit ut erat volutpat, ut vestibulum mi malesuada. Fusce ullamcorper, lectus sed mattis cursus, sem justo sodales tellus, eu semper ipsum diam eu nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet dui aliquet, dictum neque in, vehicula augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. In vel finibus dolor, quis sollicitudin est. Vestibulum ut tincidunt augue. Maecenas dictum, ante vel vulputate porttitor, massa mi molestie mi, vitae dictum odio lacus ac arcu. Integer fermentum tortor erat, sit amet pretium tortor dapibus id.\r\n\r\nEtiam sit amet semper metus, sed pulvinar nulla. Donec bibendum maximus pharetra. Proin nisi tortor, rutrum nec imperdiet ut, sagittis eget augue. In posuere ante elit, at lacinia nunc volutpat in. Pellentesque aliquam hendrerit dolor, eu maximus velit hendrerit quis. Donec luctus lacinia justo, eu sagittis odio elementum vel. Aliquam semper tempus metus eget malesuada. Integer imperdiet, quam non fringilla aliquet, nunc arcu consectetur ipsum, sed pretium nulla ipsum id leo. Integer vel tincidunt diam.\r\n\r\nInteger hendrerit arcu at nibh bibendum, vitae accumsan elit lobortis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec vitae lorem nec ipsum rutrum efficitur. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum tincidunt sem ut leo eleifend, sit amet bibendum dolor egestas. Phasellus sit amet purus eleifend, lobortis nunc vitae, dignissim leo. Mauris ultrices urna quis velit lobortis, porttitor efficitur magna suscipit. Nam vitae diam in nibh condimentum elementum sit amet eu neque. Nam eget tellus sed lorem euismod venenatis sit amet at ligula. Praesent pharetra nibh id nulla ultrices elementum id in dolor. Aliquam tempus sapien nisi. Fusce fermentum ut enim non euismod.\r\n\r\nDuis fringilla ante massa, et mollis nunc consectetur a. Sed vel metus vulputate quam volutpat feugiat ut non libero. Maecenas posuere hendrerit eros ut congue. Nunc a efficitur nisl, vitae aliquam lorem. Aliquam quis vulputate sem. Integer in sem justo. Nam dui erat, euismod quis vulputate et, gravida a sem.\r\n\r\nNam tempor iaculis venenatis. Sed convallis dolor sed imperdiet ullamcorper. Pellentesque sit amet est felis. Donec et sapien sed purus finibus malesuada. Fusce eu ex eu mauris rhoncus facilisis et sed sapien. Vestibulum vulputate lacus at elit pretium vestibulum. Integer at urna massa. ', 'image/post.png', '2016-05-15 23:28:57', '1', 2, 4),
(6, 'montes, nascetur ridiculus mus. la placerat ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In volutpat libero nec enim sodales suscipit. Suspendisse porta, nisi eu ultricies ultrices, dolorus interdum massa, et consequat massa mauris vitae lorem. Mauris imperdiet sit amet nulla sed tempor. Nullam sed nisi ut enim gravida sodales vitae quis lorem. Duis molestie lacus dolor, ac p  ulvinar odio malesuada at. Vestibulum vehicula nisl vel nisi interdum semper sed at odio. Fusce eu ullamcorper risus, cursus bibendum leo. Pellentesque efficitur est lobortis, sollicitudin urna eu, congue turpis. Curabitur faucibus ipsum varius porttitor iaculis. Integer blandit tristique ullamcorper. Mauris vitae magna eros. Etiam sapien ligula, volutpat et ex a, maximus bibendum metus. Nulla tempor, augue in blandit vehicula, urna nibh aliquam lacus, eu bibendum mauris magna et mi.\r\n\r\nUt imperdiet velit non volutpat auctor. Sed vel gravida neque. Nullam tempor augue eget ligula dictum, eget tincidunt orci rutrum. Curabitur pharetra ultricies egestas. Aenean id efficitur lorem. Aliquam convallis ante eu turpis fringilla, ac placerat ante tincidunt. Aliquam accumsan magna quis libero imperdiet, sed cursus erat molestie. Sed euismod placerat erat nec porta. Nam non placerat lacus.\r\n\r\nMorbi sit amet dui mauris. Nullam vestibulum ante ut orci finibus placerat. Aliquam erat volutpat. Fusce vitae finibus lorem. Phasellus congue malesuada semper. Quisque neque eros, facilisis ut magna non, ultricies vulputate ligula. Vivamus pretium ex in egestas varius. Curabitur quis posuere justo. Suspendisse potenti. Phasellus sit amet justo mauris. Cras convallis molestie pellentesque. Fusce nec libero euismod, finibus tortor eget, facilisis ipsum. Nunc vitae mollis urna.\r\n\r\nIn nec mollis lectus. Nullam sed cursus sem, sed facilisis mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc egestas vitae ex eu interdum. Proin vitae urna ac purus tristique tristique sed vitae massa. Proin vitae tempus diam. Cras porta eros eleifend gravida hendrerit. Sed iaculis ante ante, sed vestibulum erat mattis ut. Vestibulum vitae nisi eleifend purus finibus fringilla. Sed lobortis nunc risus, ac eleifend nibh imperdiet ut. Phasellus fringilla elit odio, vitae elementum quam consequat ut. Morbi commodo at diam vitae viverra. Fusce aliquet et elit eu sagittis. Pellentesque pharetra vehicula felis ac tempus. Mauris ex nibh, blandit id pretium ornare, dignissim id sem. Nullam tincidunt eu velit nec viverra.\r\n\r\nProin venenatis magna in ante tincidunt, ac sagittis felis efficitur. Maecenas id tempor augue. In vehicula blandit venenatis. In elementum lorem dui, a fermentum lectus ultricies in. Ut tellus velit, dictum interdum pulvinar ut, maximus et tellus. In eu tempor lorem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla placerat viverra quam. Nunc vulputate, nisi sit amet luctus rutrum, metus est lobortis ipsum, eu volutpat metus magna eu tellus. Nam lobortis lorem eget lacus vestibulum, nec consectetur mauris dapibus. Integer quis arcu eget ipsum egestas sodales id id nibh. Nulla condimentum velit volutpat justo bibendum, eu posuere tortor sollicitudin. Fusce finibus, lacus vehicula lacinia viverra, lorem turpis hendrerit ligula, eget imperdiet massa dolor non risus. Ut pharetra porta sem, eget gravida dui elementum et. ', 'image/post.png', '2016-05-15 23:28:57', '1', 1, 1),
(8, 'titire one', 'qsqsqqssqs\r\nqsqss\r\nqsqsqs\r\nqs\r\nqs\r\nqsqs', 'image/post.png', '2016-05-31 11:05:38', '1', 9, 1),
(9, 'lolo', 'sdsd\r\nsdsds\r\nsdsd\r\n\r\n\r\nd\r\nsdddddddddddddddd\r\nddddddddddd dddddddddddddd\r\nddd', 'image/post.png', '2016-05-31 11:08:06', '1', 9, 1),
(10, 'kkkk', 'sqqdqd\r\nsdsds\r\nsdsdsd\r\nsdsdsdsd\r\n', 'image/post.png', '2016-05-31 11:09:36', '1', 9, 1),
(11, 'kkkk', 'sqqdqd\r\nsdsds\r\nsdsdsd\r\nsdsdsdsd\r\n', 'image/post.png', '2016-05-31 11:40:19', '1', 9, 1),
(12, 'kkkk', 'sqqdqd\r\nsdsds\r\nsdsdsd\r\nsdsdsdsd\r\n', 'image/post.png', '2016-05-31 11:41:38', '1', 9, 1),
(13, 'kkkk', 'sqqdqd\r\nsdsds\r\nsdsdsd\r\nsdsdsdsd\r\n', 'image/post.png', '2016-05-31 11:42:11', '1', 9, 1),
(14, 'qsqss', 'sqsqs\r\nqsq\r\nsq\r\nq\r\ns\r\ns\r\nsssssssssssssssss\r\nqs\r\nqs\r\n\r\nqqqqqqqqqqqqqqqqqqqqqqqs\r\nqsq\r\nqsqsqsqs\r\nqs\r\nq\r\nsq\r\ns\r\ns', 'image/574db84977df56.93908530.png', '2016-05-31 16:14:01', '1', 9, 1),
(15, 'Les voiture de lux 2016', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'image/574edd69edd406.80045449.jpg', '2016-06-01 13:04:41', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `article_tag`
--

DROP TABLE IF EXISTS `article_tag`;
CREATE TABLE IF NOT EXISTS `article_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idArticle` int(11) DEFAULT NULL,
  `idTag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idArticle` (`idArticle`),
  KEY `idTag` (`idTag`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_tag`
--

INSERT INTO `article_tag` (`id`, `idArticle`, `idTag`) VALUES
(1, 5, 1),
(2, 5, 2),
(3, 5, 1),
(4, 5, 2),
(5, 5, 1),
(6, 5, 2),
(7, 5, 3),
(8, 5, 4),
(10, 8, 7),
(11, 9, 8),
(12, 9, 9),
(13, 10, 10),
(14, 10, 11),
(15, 11, 10),
(16, 11, 11),
(17, 12, 10),
(18, 12, 11),
(19, 13, 10),
(20, 13, 11),
(21, 14, 12),
(22, 15, 13),
(23, 15, 14),
(24, 15, 15),
(25, 15, 16);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `categorie`) VALUES
(1, 'Sport'),
(2, 'News'),
(3, 'Livre'),
(8, 'Google'),
(9, 'programation');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `idArticle` int(11) DEFAULT NULL,
  `contenu` varchar(155) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idArticle` (`idArticle`)
) ENGINE=InnoDB AUTO_INCREMENT=414 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id`, `nom`, `date`, `idArticle`, `contenu`) VALUES
(1, 'amine', '2016-05-15 17:15:35', 2, 'ndaaa o hlawa mgarda'),
(2, 'hassane', '2016-05-15 17:16:19', 2, 'ndaaa o hlawa mgarda'),
(3, 'bo3oo', '2016-05-15 17:16:19', 2, 'ndaaa o hlawa mgarda'),
(4, 'kamal', '2016-05-15 17:51:41', 2, 'hassane'),
(5, 'qqq', '2016-05-15 17:51:49', 2, 'qqqqqqqq qqqq'),
(6, 'qqq', '2016-05-15 17:52:12', 2, 'qqqqqqqq qqqq'),
(7, 'amine', '2016-05-15 17:52:25', 2, 'lolo'),
(8, 'amine', '2016-05-15 17:52:30', 2, 'lolo'),
(9, 'amine', '2016-05-15 20:25:24', 1, 'bien dit'),
(10, 'amine', '2016-05-15 20:25:29', 1, 'bien dit'),
(11, 'hamid', '2016-05-15 22:18:53', 1, 'moroo'),
(12, 'hamid', '2016-05-15 22:18:58', 1, 'moroo'),
(13, 'gg', '2016-05-25 09:29:34', 2, 'jhgjhgj'),
(14, 'gg', '2016-05-25 09:29:39', 2, 'jhgjhgj'),
(15, 'amuee ', '2016-05-26 11:47:44', 4, 'aaa aaaa aaaaaa'),
(16, 'hasanne', '2016-05-26 11:52:54', 1, 'maniale'),
(17, 'hasanne', '2016-05-26 11:55:05', 1, 'maniale'),
(18, 'kalim', '2016-05-26 11:56:03', 1, 'marina'),
(19, 'testoo', '2016-05-26 11:57:30', 1, 'testooootestooo'),
(20, 'Mohammed', '2016-05-26 11:59:47', 1, 'Ceci est une commentaire'),
(21, 'hasanned', '2016-05-26 12:08:45', 4, 'koko lala'),
(26, 'hasanned', '2016-05-26 12:08:56', 4, 'koko lala'),
(393, 'hasanne', '2016-05-26 12:53:23', 4, 'kjhdslfljkdsjklfjdsljkjlkjk'),
(394, 'hasanne', '2016-05-26 12:54:00', 4, 'hilgfdmjgfdl\r\n'),
(395, 'hasanne', '2016-05-26 12:54:29', 4, 'kjhlffdsjlfsjml\r\n'),
(396, 'jhfdkjlfjsk', '2016-05-26 12:56:30', 4, 'kdsfdhkfshjk'),
(397, 'gg', '2016-05-26 12:57:52', 4, 'khfiklfsljdgfkj'),
(398, 'hasanne', '2016-05-26 12:58:22', 4, 'hdffiljgfldjdl'),
(399, 'kalim', '2016-05-26 12:59:20', NULL, 'idhklmgfdkjlj'),
(400, 'hasanne', '2016-05-26 12:59:51', NULL, 'kkjfkfsjlksfdjlk'),
(401, 'hasanne', '2016-05-26 13:01:51', NULL, 'hkfgjlgkdf'),
(402, 'hasanne', '2016-05-26 13:02:04', NULL, 'kfshlkfdshlsfdhklsdhflkdsk'),
(403, 'hasanne', '2016-05-26 13:03:39', 3, 'hfslfhfslfksdjkfdk'),
(404, 'hasanne2hkdfj', '2016-05-26 13:04:05', 3, 'kfshglfjkfdjhhk'),
(405, '', '2016-05-26 14:53:22', 3, ''),
(406, '', '2016-05-26 14:55:32', 5, ''),
(409, 'amine', '2016-05-31 16:18:01', 8, 'ajajja sasashjashja'),
(410, 'Mohammed', '2016-06-01 13:05:28', 15, 'J''aime bien cette voiture de lux'),
(411, 'aaa', '2016-06-01 14:18:31', 15, 'aaaa aaaa aaaa aaa aaa aaaa '),
(412, 'hasmm', '2016-06-02 14:28:27', 15, 'mara7baba '),
(413, 'ddd', '2016-06-02 15:40:17', 14, 'dddd');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `WEBSITENAME` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`WEBSITENAME`) VALUES
('web site');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag`) VALUES
(1, 'html'),
(2, 'css'),
(3, 'js'),
(4, 'programation lovly'),
(5, 'qq'),
(6, 'qqqqqq'),
(7, 'qsqsq'),
(8, 'lolo'),
(9, 'lo'),
(10, 'kk'),
(11, 'mmm'),
(12, 'sqsqs'),
(13, 'voiture'),
(14, 'car'),
(15, 'voiture 2016'),
(16, 'automobile');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`id`);

--
-- Constraints for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD CONSTRAINT `article_tag_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `article_tag_ibfk_2` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`);

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
