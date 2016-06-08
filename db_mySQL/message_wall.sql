-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 08 2016 г., 07:12
-- Версия сервера: 5.5.44-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `message_wall`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(111) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `name_user` varchar(30) NOT NULL,
  `gender_user` varchar(6) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `avatar_user` varchar(220) NOT NULL,
  `link_user` varchar(120) NOT NULL,
  `text` text NOT NULL,
  `time_create` int(11) NOT NULL,
  `indicator` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `id_parent`, `id_user`, `name_user`, `gender_user`, `email_user`, `avatar_user`, `link_user`, `text`, `time_create`, `indicator`) VALUES
(63, 28, '1158893490844793', 'Yaroslav Littus', 'male', 'athlonnus@gmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/11009084_877252589008886_2884895712536596269_n.jpg?oh=0afda967d7b175d245a7212937a7b428&oe=57C5E40E', 'https://www.facebook.com/app_scoped_user_id/1158893490844793/', 'Comment to Some Title for Topic...                                                07 Jun 2016, 09:52\r\nОтредактировано (!)', 1465282330, 0),
(67, 24, '1158893490844793', 'Yaroslav Littus', 'male', 'athlonnus@gmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/11009084_877252589008886_2884895712536596269_n.jpg?oh=0afda967d7b175d245a7212937a7b428&oe=57C5E40E', 'https://www.facebook.com/app_scoped_user_id/1158893490844793/', 'это коммент к Теме 1 (ID parent post #24)                                                07 Jun 2016, 12:53\r\n(!)тоже отредактировано 07:07', 1465293209, 0),
(68, 28, '609070152583536', 'Dmytro Otsaluk', 'male', 'it.otsaluk@gmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c15.0.50.50/p50x50/10354686_10150004552801856_220367501106153455_n.jpg?oh=b9886b51fbe1a2e256724fb9392c8005&oe=57D4EC2F', 'https://www.facebook.com/app_scoped_user_id/609070152583536/', '++ Lorem ipsum dolor sit amet, cu porro ipsum moderatius mea, graeco neglegentur definitionem ex quo, usu alienum dignissim voluptatum et. Eam in dicam animal. Te vix everti docendi, eu nec alii persecuti concludaturque. Purto accumsan moderatius sed in, qui et praesent democritum, et legere laoreet ad                                                08 Jun 2016, 03:28', 1465345689, 0),
(69, 27, '609070152583536', 'Dmytro Otsaluk', 'male', 'it.otsaluk@gmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c15.0.50.50/p50x50/10354686_10150004552801856_220367501106153455_n.jpg?oh=b9886b51fbe1a2e256724fb9392c8005&oe=57D4EC2F', 'https://www.facebook.com/app_scoped_user_id/609070152583536/', 'redaction(!) Et meis minim sed, ea adhuc ceteros verterem nec. Sed assum eligendi scriptorem ne, id mei mutat dicant expetendis. Ius ei utroque ponderum lucilius, ea graeci vidisse sit. In omnis dolor eleifend vim, explicari scribentur deterruisset vel eu. Vel ut fabellas molestiae, mel ignota eligendi reprehend                                                08 Jun 2016, 04:36', 1465349762, 0),
(70, 28, '1158893490844793', 'Yaroslav Littus', 'male', 'athlonnus@gmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/11009084_877252589008886_2884895712536596269_n.jpg?oh=0afda967d7b175d245a7212937a7b428&oe=57C5E40E', 'https://www.facebook.com/app_scoped_user_id/1158893490844793/', 'Cu idque diceret delectus cum, id dico torquatos efficiantur vis. Natum timeam maluisset est te. In nominati concludaturque per, ut cibo deleniti hendrerit duo, duo epicurei imperdiet ad. Falli ignota necessitatibus ex cum. Sea ei quodsi aliquam principes, nam ea essent quodsi deleniti. Pri nobis pe                                                08 Jun 2016, 07:02 ++', 1465358532, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(30) NOT NULL,
  `name_user` varchar(30) NOT NULL,
  `gender_user` varchar(6) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `avatar_user` varchar(220) NOT NULL,
  `link_user` varchar(120) NOT NULL,
  `title` varchar(40) NOT NULL,
  `text` text NOT NULL,
  `time_create` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `name_user`, `gender_user`, `email_user`, `avatar_user`, `link_user`, `title`, `text`, `time_create`) VALUES
(24, '1158893490844793', 'Yaroslav Littus', 'male', 'athlonnus@gmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/11009084_877252589008886_2884895712536596269_n.jpg?oh=0afda967d7b175d245a7212937a7b428&oe=57C5E40E', 'https://www.facebook.com/app_scoped_user_id/1158893490844793/', 'Title 1', 'TEXT for Title-1:                    Lorem ipsum dolor sit amet, duo atqui melius nominati ne, vis aperiam inimicus vulputate ex, oblique tincidunt conclusionemque mea te. Scripta albucius democritum eum ex, eam zril referrentur id, ipsum decore cu vix. Ad qui errem nostro.', 1465121771),
(25, '1158893490844793', 'Yaroslav Littus', 'male', 'athlonnus@gmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/11009084_877252589008886_2884895712536596269_n.jpg?oh=0afda967d7b175d245a7212937a7b428&oe=57C5E40E', 'https://www.facebook.com/app_scoped_user_id/1158893490844793/', 'Title 2', 'TEXT for Title-2:                    Lorem ipsum dolor sit amet, duo atqui melius nominati ne, vis aperiam inimicus vulputate ex, oblique tincidunt conclusionemque mea te. Scripta albucius democritum eum ex, eam zril referrentur id, ipsum decore cu vix. Ad qui errem nostro.', 1465121800),
(26, '609070152583536', 'Dmytro Otsaluk', 'male', 'it.otsaluk@gmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c15.0.50.50/p50x50/10354686_10150004552801856_220367501106153455_n.jpg?oh=b9886b51fbe1a2e256724fb9392c8005&oe=57D4EC2F', 'https://www.facebook.com/app_scoped_user_id/609070152583536/', 'Title 3', 'TEXT for Title-3:                    Lorem ipsum dolor sit amet, duo atqui melius nominati ne, vis aperiam inimicus vulputate ex, oblique tincidunt conclusionemque mea te. Scripta albucius democritum eum ex, eam zril referrentur id, ipsum decore cu vix. Ad qui errem nostro!', 1465121841),
(27, '1158893490844793', 'Yaroslav Littus', 'male', 'athlonnus@gmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/11009084_877252589008886_2884895712536596269_n.jpg?oh=0afda967d7b175d245a7212937a7b428&oe=57C5E40E', 'https://www.facebook.com/app_scoped_user_id/1158893490844793/', 'Title 4', 'TEXT for Title-4:                    Lorem ipsum dolor sit amet, duo atqui melius nominati ne, vis aperiam inimicus vulputate ex, oblique tincidunt conclusionemque mea te. Scripta albucius democritum eum ex, eam zril referrentur id, ipsum decore cu vix. Ad qui errem nostro.  ++', 1465145143),
(28, '1171651999563614', 'Мария Пальцева', 'female', 'masya.24@yandex.ru', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c33.33.414.414/s50x50/163754_131148420280649_2313957_n.jpg?oh=209797a0ed5eb3f4dccc64beb21a6adc&oe=58090BAC', 'https://www.facebook.com/app_scoped_user_id/1171651999563614/', 'Some Title for Topic', 'Всем привет !', 1465238198);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
