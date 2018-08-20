-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 août 2018 à 10:17
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_jean_forteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(155) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `reporting` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `content` text NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) CHARACTER SET latin1 NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `content`, `date_creation`) VALUES
(1, 'Jean Forteroche', 'Chapitre 1- Au cœur de l’Alaska', 'Je t’écris de Fairbanks ! Ce sont les dernières nouvelles que tu recevras de moi, Wayne. Je suis arrivé il y a deux jours. Ça n’a pas été\r\nfacile de faire du stop dans le Yukon. Mais finalement, je suis parvenu jusqu’ici.S’il te plaît, retourne tout mon courrier à l’expéditeur. Il peut s’écouler beaucoup de temps avant que je redescende dans le Sud. Si cette aventure tourne mal et que tu n’entendes plus parler de moi, je\r\nveux que tu saches que je te considère comme quelqu’un de formidable. Maintenant, je m’enfonce dans la forêt.\r\nAlex.\r\nCarte postale reçue par Wayne Westerberg à Carthage, Dakota du Sud.À 6,5 kilomètres après Fairbanks, Jim Gallien aperçut un autostoppeur\r\nqui se tenait dans la neige au bord de la route, le pouce levé très haut et grelottant dans l’aube grise de l’Alaska. Il n’avait pas l’air bien vieux ; dix-huit ans, dix-neuf peut-être, pas plus. Une carabine dépassait de son sac à dos, mais il avait l’air d’un bon garçon. Dans le 49e État, une carabine Remington semi-automatique n’étonne personne. Gallien gara sa camionnette Ford sur le bas-côté et dit au jeune homme de monter. L’auto-stoppeur balança son sac sur la banquette et se présenta :\r\n— Alex.\r\n— Alex ? interrogea Gallien qui attendait un nom de famille.\r\n— Simplement Alex, répondit l’auto-stoppeur.\r\nC’était un garçon d’environ un mètre soixante-dix, élancé et robuste. Il disait qu’il avait vingt-quatre ans et qu’il venait du Dakota du Sud.Il voulait se faire conduire jusqu’aux confins du parc national du Denali. De là, il avait l’intention de s’enfoncer dans le sous-bois et de « vivre à l’écart pendant quelques mois ».\r\nGallien, électricien de son état, se rendait à Anchorage, c’est-à-dire à plus de 350 kilomètres au-delà du Denali par l’autoroute George Parks. Il répondit à Alex qu’il le déposerait là où celui-ci le voudrait.', '2018-07-01 20:21:18'),
(2, 'Jean Forteroche', 'chapitre 2- La piste Stampede\r\n', 'Inscription gravée sur une pièce de bois trouvée à l’endroit où mourut Chris McCandless.\r\nUne sombre forêt d’épicéas obscurcissait les deux rives du cours d’eau pris par les glaces. Un coup de vent récent avait dépouillé les arbres de leur blanche couverture de givre et, dans la lumière déclinante, ils semblaient se courber les uns vers les autres, noirs et menaçants. Un grand silence régnait sur la terre et cette terre était désolée, sans vie, sans mouvement, si vide et si froide qu’elle n’exprimait même pas la tristesse. Quelque chose en elle suggérait le rire, mais un rire plus terrible que toute tristesse – un rire morne comme le sourire d’un sphinx, un rire froid comme le gel et d’une infaillibilité sinistre. C’était la sagesse puissante et incommunicable de l’éternité qui riait de la futilité de la vie et de l’effort de vivre. C’était la forêt sauvage, la forêt gelée du grand Nord.\r\n\r\nJack London, Croc-blanc.\r\n\r\n Sur la frange nord de la chaîne de l’Alaska, juste avant que le rempart imposant du mont McKinley et de ses satellites ne laisse place à la plaine de la Kantishna, une série de sommets de moindre importance – connue sous le nom de Chaîne Extérieure – descend vers les étendues planes comme une couverture plissée sur un lit défait. Entre les arêtes siliceuses des deux derniers escarpements de cette Chaîne Extérieure il y a une combe d’environ huit kilomètres que recouvre un amalgame bourbeux de marécages, de groupes d’aulnes et d’alignements d’épicéas chétifs. La piste Stampede y serpente sur un terrain ondulant et touffu : c’est le chemin que suivit Chris McCandless pour s’enfoncer dans cette terre inhabitée.\r\n\r\nCette piste a été tracée dans les années 1930 par un célèbre mineur nommé Earl Pilgrim. Elle conduit à des concessions d’antimoine qu’il possédait à la cluse de Stampede, en amont de la fourche de Clearwater sur la rivière Toklat. En 1961, une société de Fairbanks, la Yutan Construction, fut choisie par le nouvel Etat d’Alaska (l’accession au statut d’Etat datait d’à peine deux ans) pour transformer la piste en une route que les camions pourraient emprunter tout au long de l’année pour transporter le minerai. Afin de loger les ouvriers pendant les travaux, la Yutan acheta trois autobus hors d’usage, les équipa de couchettes et d’un simple poêle et les fit remorquer par un tracteur dans cette contrée déserte et sauvage.\r\n\r\n', '2018-07-03 07:00:26'),
(3, 'Jean Forteroche', 'Chapitre 3-Carthage', 'Je désirais le mouvement et non une existence au cours paisible. Je voulais l’excitation et le danger, et le risque de me sacrifier pour mon amour. Je sentais en moi une énergie surabondante qui ne trouvait aucun exutoire dans notre vie tranquille.\r\nLéon Tolstoï, Le Bonheur conjugal.\r\nPassage souligné dans l’un des livres trouvés parmi les affaires de Chris McCandless.On ne devrait pas nier que la liberté de mouvement nous a toujours exaltés. Dans notre esprit, nous l’associons à la fuite devant l’histoire,l’oppression, la loi et les obligations irritantes, nous l’associons à la liberté absolue, et pour trouver celle-ci nous avons toujours pris le chemin de l’Ouest.Wallace Stenger,L’Ouest américain comme espace vital.Carthage, dans le Dakota du Sud, a 274 habitants. C’est un petit agglomérat assoupi de maisons en bardeaux – avec des cours proprettes et des façades en briques usées par les intempéries – qui s’élèvent humblement dans l’immensité des plaines du Nord, à l’écart du temps. Des rangées de peupliers majestueux ombragent un quadrilatère de rues rarement troublées par la circulation. Il y a une épicerie, une banque, une seule station-service, un bar solitaire – le Cabaret – dans lequel Westerberg sirote un cocktail et mâchonne un petit cigare tout en se remémorant l’étrange jeune homme qu’il connaissait sous le nom d’Alex.Les murs recouverts de contreplaqué du Cabaret portent des bois de cerf, des publicités pour la bière Old Milwaukee et des peintures naïves représentant l’envol de gibier à plumes. Des cercles de fumée de cigarette s’élèvent au-dessus de groupes de fermiers vêtus de salopettes et coiffés de casquettes fourrées pleines de poussière. Les visages fatigués de ces hommes sont aussi crasseux que ceux des mineurs. En phrases courtes, terre à terre, ils se plaignent bruyamment du temps incertain, des champs de tournesols encore trop humides pour être moissonnés, tandis qu’au-dessus de leurs têtes la figure grimaçante de Ross Perrot clignote sur l’écran muet d’un téléviseur. Dans huit jours, la nation élira Clinton à la présidence. Cela fait maintenant presque deux mois que le corps de Chris McCandless a été retrouvé en Alaska.', '2018-07-05 14:21:43'),
(4, 'Jean Forteroche', 'Chapitre 4-Detrital Wash', 'Le désert est le milieu de la révélation.\r\nIl est sensoriellement austère esthétiquement abstrait, historiquement hostile… Ses formes sont puissantes et suggestives. L’esprit est cerné par la lumière et l’espace, par la nouveauté cénesthésique de la sécheresse, par la température et par le vent. Le ciel du désert nous entoure de toute part, majestueux, terrible. Dans d’autres lieux, la ligne d’horizon est brisée ou cachée ; ici, unie à ce qui se trouve au-dessus de notre tête, elle est infiniment plus vaste que dans les paysages ondoyants et les régions de forêts. Quand le ciel est dégagé, les nuages paraissent plus massifs et parfois ils donnent sur leur surface inférieure concave un reflet grandiose de la courbure de la terre…\r\nLes prophètes et les ermites vont dans le désert. Les exilés et les pèlerins le traversent. C’est ici que les fondateurs des grandes religions ont cherché les vertus spirituelles et thérapeutiques de la retraite, non pour fuir mais pour trouver le réel. Paul Shepard, L’Homme dans le paysage, un aperçu historique de l’esthétique de la natur', '2018-07-06 23:38:15'),
(5, 'Jean Forteroche', 'Chapitre 5-Bullhead Cit', 'En Buck, la bête primaire et dominatrice était puissante, et dans les dures conditions de sa vie errante, elle ne fit que grandir encore. Mais c’était une croissance cachée. Sa toute nouvelle aptitude à la ruse lui donnait aisance et maîtrise de soi.\r\nJack London, L’Appel de la forêt.\r\nTous acclament la bête primaire et dominatrice ! Et aussi le capitaine Achab !\r\n......Alexandre Supertramp. Mai 1992.\r\nInscription trouvée dans l’autobus abandonné sur la piste Stampede. Quand son appareil photo fut devenu inutilisable, et qu’il cessa de\r\nprendre des photos, McCandless cessa également de tenir son journal. Il ne le reprit que l’année suivante lorsqu’il alla en Alaska. Par conséquent, on sait peu de chose sur ses voyages après son départ de Las Vegas en mai 1991.Nous apprenons cependant par une lettre qu’il écrivit à Jan Burres qu’il passa les mois de juillet et août sur la côte de l’Oregon, probablement aux environs d’Astoria. Il se plaignait que « le brouillard et la pluie soient souvent insupportables ». En septembre, il descendit en Californie en faisant du stop sur l’autoroute 101 puis, bifurquant vers l’est, il entra à nouveau dans le désert. Et, au début d’octobre, il s’était établi à Bullhead City en Arizona.\r\nL’idiome trompeur de la fin du XXe siècle désigne Bullhead City comme une « commune ». En réalité, la ville – dépourvue de centre – est\r\nun conglomérat désordonné de quartiers et d’avenues qui s’étendent sur treize ou quatorze kilomètres le long de la rive du Colorado, juste en face des grands buildings où sont installés les hôtels et les casinos de Laughlin, dans le Nevada. Le trait distinctif de Bullhead, c’est son\r\nautoroute de Mohave Valley : quatre voies d’asphalte avec des stationsservice et des fast-foods franchisés, des chiropracteurs et des boutiques de vidéo, des magasins de pièces détachées pour automobiles et des pièges à touristes.', '2018-07-09 16:30:15'),
(6, 'Jean Forteroche', 'Chapitre 6-Anza-Borrego', 'Aucun homme n’a jamais suivi son propre génie jusqu’au point où il l’égare. Bien qu’il en résultât une faiblesse physique, personne sans doute ne peut dire qu’il fallait en déplorer les conséquences, car celles-ci correspondaient à une vie en conformité avec des principes plus élevés. Si le jour et la nuit deviennent tels que vous les saluez joyeusement, et si la vie produit une senteur pareille à celle des fleurs et des plantes aromatiques, si elle est plus souple, plus étincelante, plus immortelle, en cela réside votre réussite. La nature tout entière vous acclame et vous devez momentanément vous accorder à vous-même votre bénédiction. Les plus grands biens et les plus grandes valeurs sont loin d’avoir été reconnus. Nous en venons facilement à en douter. Bientôt, nous les oublions. Ils sont pourtant la plus haute réalité… La vraie moisson de ma vie quotidienne est quelque chose d’aussi intangible et d’aussi indescriptible que les teintes du matin et du soir. C’est un peu de poussière d’étoile, c’est un morceau d’arc-en-ciel que j’ai attrapé.\r\n...............Henry David Thoreau, Walden ou la vie dans les bois.\r\nPassage souligné dans l’un des livres trouvés parmi les affaires de Chris McCandless.Le 4 janvier 1993, l’auteur de ce livre reçut une lettre inhabituelle,d’une écriture tremblée, vieillotte, qui faisait penser à celle d’un homme âgé. Cette lettre commençait par : « À celui que ça intéresse. »Je souhaiterais recevoir un exemplaire du magazine qui a raconté l’histoire de la mort du jeune homme (Alex McCandless) en Alaska.\r\nJ’aimerais écrire à celui qui a enquêté sur ce fait divers. Je l’ai conduit de Salton City Calif… en mars 1992… jusqu’à Grand Junction Co… C’est là que j’ai laissé Alex pour qu’il fasse du stop jusqu’au S. D. [Dakota duSud]. Il disait qu’il donnerait de ses nouvelles. La dernière fois que j’en ai eu, c’était une lettre, la première semaine d’avril 1992. Pendant notre trajet, Alex m’a pris en photo sur son appareil et moi je l’ai filmé avec mon Caméscope.Si vous avez un exemplaire de ce magazine, dites-moi combien il coûte. D’après ce que j’ai compris, il était malade. Si c’est bien le cas, je voudrais savoir comment ça s’est produit, parce qu’il avait toujours une bonne quantité de riz dans son sac à dos + des vêtements + plein d’argent.\r\n....Sincèrement Ronald A. Franz.', '2018-07-12 04:32:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(155) NOT NULL,
  `pass` varchar(155) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `pass`) VALUES
(1, 'admin', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
