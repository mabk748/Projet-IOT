-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2023 at 08:01 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeotics`
--

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE `Clients` (
  `idClient` int NOT NULL COMMENT 'Identifiant client',
  `nom` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL COMMENT 'Nom client',
  `prenom` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL COMMENT 'Prénom client',
  `nomUtilisateur` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL COMMENT 'Nom d''utilisateur du opte client.',
  `motDePasse` char(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL COMMENT 'Mot de passe du compte client.',
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL COMMENT 'Adresse email du client.',
  `imageProfil` mediumblob COMMENT 'Photo de profil du client à afficher sur le site web.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `Clients`
--

INSERT INTO `Clients` (`idClient`, `nom`, `prenom`, `nomUtilisateur`, `motDePasse`, `email`, `imageProfil`) VALUES
(1, 'Bonhomme', 'Patrice', 'PB', '$1$/Hgscl5B$KWiU3B0sS1eceQSG4T6rn1', 'patrice.b@insa-cvl.fr', 0xffd8ffe000104a46494600010101006000600000ffdb0043000a07070907060a0908090b0b0a0c0f19100f0e0e0f1e161712192420262523202322282d3930282a362b2223324432363b3d4040402630464b453e4a393f403dffdb0043010b0b0b0f0d0f1d10101d3d2923293d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3d3dffc0001108011200b403012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00f39294dd95608a4228020db8a763152eda6e280198a314f228228022c518a79141140116da4db5251401152edcd3f146280198a3152628c500460504548450050046052814f2282280198a5a7e2931400cc64d48285e29e06548f5a004d9453f145003c8cd34f34fc6693ad0037a518c529142d0034f14018a7119a4a006e7348462971411c81dcd003334018cd6ce97e1abbd4d5996368a2c7fac64f94fb0e7ad681f01dfba9fb2b09655fbc8cb83f811c50072a01a315d88f879ab46146d89c38cb67f879e3ae3eb4b278127581dc07631aee608319efde8038e0bef46dc55c92cd8ee11a481a327cc59011b075079ed8fe550985d238e465011d8857072091d4500421714b4e3d2900a00422802948a00a004c525388a53da800029c05005380a0028a5a2801f8a6e2a6c5348a008b14a453c8c500628023618a4db9a931525b5b35ccc88b8193f79cf02801f6da64b7568f323a8da784fe26f715d5787fc152cb324d7b6bcc672a8c7218e3afa62aee81e19b7ba55b884cad85d8b2b280a571c800d7a0d8d9c5676e88cc582ae32c7a0a00aba4e8cd6f6eaa540e3a28c019ebfcab516c4a73211b7f954c93607ca005ec40eb4019f5a00431c5c798a1b1d3351490c5b4fcb81e8475156047bbbd35a1a00c0d5bc39677c012aaa71800ae548231820d73577f0eec9a27861636c8c77150a58038c641ea2bbd7841eb9aab2c654120b1fd6803c9b56f03dd69e19a284cbb47cde51dd91fde00f3fad730d11e580241fe223ad7bcbca027ceaabe8db78ae37c4be178ae964b8b16f2a661cc4a7e46efb80ec6803cd36d153cd13c52b47202307041f5a8f6d003314b8a7e2971400d02940a7014e02801b8a2a4c514012eda695a9caeda6eddd40106d3dc62936d4c5690ad0034c6122572ca54f5c7553e86ba9f0d684d7ecaeb20303a0c8232411c71dfa7f5ae76d20692745590a12786c74fad7a878574d3676ad2160e64e4151da80372d6da3b4b648e15d91aae1507f08ff001a940df8f3327db3d2a3120e8bcf6a9a35ca93de802d264019391536738a85530a067a539a5283903f134013e767a9fa5383e7ef051f5359b25ce4f6fce9a6eb6f71f89a00bf2106aacb112321b8a885d96ce07eb5179f8cf1c76dc3fad00472a039033cf5e7afe154dac92688c6ae2266fbbb8700ff003156f25dcb118f4151330523271401e77e33f0fdde9f7066921631b0c974195cd726506719e457bdb2a5e5998e550eac3182335e61e2cf0b1d3a769ed941b72d9ff77da80392a5230a4fa53c2151861823b7a5215a004c669c0629d8cd39571400dc7b5153628a0090ae69a462a42b8a0d0043b6936d4856936e4f2714017f40b38eeb544f3266458fe60a07de3f5af5b44fb3d847b8fef25e83d05717e05d1999fed6ca8616184743924e7907e95dcdd1dd74100f9517834011c29deae202a411c0a8e2552c171927a559da71c9a00466e2aacac46395ebeb568807a827ea6a0b8c2853b4925b0303a500549381fc3f9543b89506a7900c7cc39f4f4aaaff002875a006c92e0920d43f6c20aa927ea0d4523fcac7d2b2eee761b429c62803705e07527f8c7e66a296e37227033ef581f6cd8e412db7e9d6a792e8951cf6a00e9b4dbac6416e3ba8359be20816f6ce4839276e704f4aa16979e528c93f81e6adcb7a25ced11e5f84624827d47a500799de366ea41b15307eee3a5407e95bbe22b6f26e9bf7484b73e629ebfd2b180a006019a78e69718a38ec73400fdb452e28a007e29a453c0c5230cd004645206dad938e9de9e68455f357cc6da9dce2803d43c17b1743b5380085ec3826b61cefba909e9dfdeb9cf0d5c3c7a5468f9040c02c7915b90924927bd005f8f8506a60d9a823f4f7ab017340066a22334f9171cd468fba403fd93fe14015dd739ff77354dfa3568301bc0ec4e2ab5c460274f94fe94018ef190ac3aeeacfb8848fbc3ad6d4ab85000aceb991461642ab86c0c9eb40187709b5890180639c834d12b73b81017deaf4acaec460023a5509e22b3ab83f263a7bd0021906e382ca768e57bd4d05d8687c973f38cbae5ba11e9555369dc58e30715cf6bda8dcd9dddac96285d6363bd877f6fd2803575a92492ce0ddd89c93fc42b12ba3bc59f52d122bb581a411e4b9231b7fc6b9fc02011e9400839a900cd22d3945002ecf7a29d8a28014d21a5349400dc5496d72f6adba3203762467151b0a43f2e2803b5d175492e6cd1256500824b640c1fa0e9ffd7aeae1194240f7f94579ef84ed6eafb54905bcab1c31c7be5662001d8574ba5590ba4965d42692f6dd25648a3662228d41e38e371f527d78a00df7d52ced98add5e5ac38ed24c83f426a0ff84c346898afdb51c8ff009e6ad27fe820d21b68e36916deded614c0c18a245c7e43d2ab3b2a90a6f2591d57e658d3705e3b9a009dbc6da3b7596ef03a91653903ff001cab161ab586a0d0cf637514d13ee0195ba1f423a83ec6b981abdbc9742d5ae424cdf723990c7bbe87a1a96d74fb683548f5391cc124dfb99562c1170c7eee47f781e87d322803a6bb99606057a672707a567ea3aea35c4b6f64b1caf0ed334b2b1091923217804b360e703a0c73599ae6b17169685ed6c5ae95471b9b683ee4e315cd5af8aa04d02ebece002eeedb186e3e63b648cfd4f07d00a00d8d46ff00528d899af45b283c08ad40fd5c9f5f4ae72e6f6595832dd6a72ae49de0e029ff0080802ac40f16a72c5324e5938f325b93bd15bbaa2f56352eafe22d2b4e44b36d42e7cd40724c454673df1d3f2a00cc5bb550737778ec3b7dae4047e46afda39977335edccb06c2764bfbd60dd8ab1c1c7b1f6ae72499259e3b991e374660048bf797dc8ee2b7ac4485e308772938c2f20d004de55adc42820b99a43229dc6440bb1b38c6013f5a961d36048fcb74055b9196fe2f5fd69346842e93079993b5a54196c9203b01fcaafc7f2ea0832369e5b23f0c50067c97b258bdbdaa9022797611db9ac174d92bafa31fe75a3aea62069530f25bdda49c1e8338feb55af576df4e3d2434010014a0d2629c0d003f6fbd14628a005c525388a69a006914d34fa6914017f419664bd9a1b73fbe9ede48e339eafb49518efcd769e12bbfb6e94b237dede73ee08c8e3e86bcfade77b6b88658c90d148187d41aee7408fec3adde5946b886402e201d8c6dcf1f4395fc0500696a96f71080119cc59f99579247a0c562eab16b9796322d948967198d9041190acc48c06ddebed5d6b48ca09e491ef5564770adb791e8073f9d00799c1e1dbfb5887f686a3bee03afeecb99303bf2720135d16b12bdadb69c91c272f3f9bb15b38f2d18ff00361f98adb4d39a69f7aab2313d41aaf6b6aba8ebcf3a7cf676286d558f467c83211ebc855ff8035006c6a6fe4e928ac819428047a71cd78d35fa596b17760f0234334819188e41000c7bf4af68d5d40b32a39f978af20f13690d732971f24ca72adeb401ade1e482dee3ed31b8dc8e700e005fa7a5686aba1586b339babab506527739472aae7d4802b9cd13578619145e1fb34ac36b33f08c7d43741f435d60bfd3f61df7f678c7fcfc0ff1a00e7afb44b69311342228c1ea89b7f53566ded27b08d9e1927368a3258386c01ea41a9dafb4f959d21b88ee1f3c2c11b4cdfa645482c4cd6f2a7d964b38655d92caee048cbdc2a2e40c8e0963d09e2802b690b2c3a4dbac8993320972aec08ddf3723bf5abf6cfe7dea3ab9dbb06e1524711da727a1fe118507b103b7a11eb51c570b04a0050a59fef13da8030e0819753d4b4f60c442393d8f422a295b7c8cdeae6babb88512d56eadd53339dd3bf56200e0fe98ae4c9249cfa9a006eda705a50b4e0b40098a29f8a2800a434ea69a004a69a71a69a0045db9ce0e07bd775a040758d16c9c5c1b7bab52e629d06e2a7a10c0f0ca4751ec3a1ae1719e077aebfc06f241733dbc8cbb5977aa96e7f2a00ea233abc51fcf6563395fe286e4c40ffc05d4e3f334c126ace484d16d57febadeff004086b5164db9f4a6cf7be5407af03b1a00ca9edb54b88f6dc5ddb592b0c15b3525cfb798dd3f05cfbd69dad9dbd9db416f6d12c70c4a11557b0acad3ccdaa5d4970e4a5bc6fb40fef1f5ada8b6aba647c83f4a00a9a9440c6ce472071ed5c26af20e508048ef8af41d5197c873db15e67ac4e0deb2a92140ea0f5a00cf172b032cb3228467da4e3a1ae8ac7ec33a8786ded9cff796219ae575678e5b0f243619a657f94f5c75ab9a04c224dc030efd7f5a00ebb6a282150007b0a8a4921d9b5d429ed8ef4c69ff0077953ef5817f781c1c1391ef401ae244f3638f7128c70aca7a7b7f9f4acaba79239a38bb339cb1fe1e40aa76da93162245e54e0f3d48eff911f955fd554323b840738653e87ad001718b3d2a48189124842e335903a0a9679a49dc1918b6d1819ed511a00514e14da75003a8a4a28025a69a71a69fba47ad0034d2118a5a4e9400cc55dd1b507d33548ae01c2ee0afc755279aa6452100f5a00f5bf33e5c753ebeb54afb324423538f30ec1ed9ef557c397c750d26091b99231e5bfd47ff005b15a33c6165b77278dc47e247140134089696c5148586218fa562ea5afdddadd22c76e8d1b3052a4fcc4773ff00d7aafaf6ba34e602f62db1630153e66cfd3a93cd64a2ea3aac62e6ce1b89ec4a92de6aed62d91c1cf3d68035f52f12446d598310b203b08f5e98af31d52e753b8be78e00d0c6aaccd263a81d7e9debb8bed0afe3587367281112efb9703939e719eb8ed559d105b3acf6f3321819257111e7924e3fcf6a00e12d2d27dea18ca660013bfa9248e39f635b963786374555da319c7f4a9bc432ab4924b6f05c450c215de5316d2beff9f358d1eacba9dca456f6efe5e369623bf6e9d062803a782ff127960b6d232b83f98acfd55c086766caa84dd9f4abd63a6cad3c5924118c83d48008273f8d52bd6fb5df471001a252377be2802b27eee7dc5c12dd011d7fc8fe55ad7b74645f2958e0019c77e2b2e705656942ee108691954724019349637a2fad967e85ba8f4340164d369c69b400e340141140a005dbef452d14013123b1cd4678a908a8cf3400da4a5a4a00434869705bee826acc7a6dc4aa095541fed1a00d1f0a6adf60d4cc12b010dc9c1c9fbafd8ff4aefe5513c2e9c06c579b2e971aff00ac90e7d16bb0d0f53fb55b1825389e2f53f797a67fc68035ad50ca73222960396619cd55bed12d673334b1b85b84f2e4922959199739c120d5eb4392dfd6acb8e8578a00c13a46b96a92bda789e464947ca9770a4863c74c1e335997567ac49135bdf788ae5a12a432dbc31424e7fdac123f0ae9ae65762018c63d8d645d4cec5be4c0f4ed401c76b1a3db39f2d7cc7790056924999f81d3249e4d363b3874e8c9b6055625fbd8fbc6af6a3e74ec22882819feed3afacbecda388cf5614004ba9c5a7f87e4ba0434a63f9077c9edf9d7336e8d69003272e47273f8d3b5160eb6d1ee25119723b66ab5edc7ef5c2f2adefd2803b0f87da725d8d46ea66674485a1f9ba12c096fd2bcebc3d74238ca3fdc6279fc6bd6fc3910d13e1f5c5c48305ade4b87cffba71fa5788d8b98a342b82371ce7b50076e7e6008e9499aa76376645d84e481c55da005a51494e1400ea28a2802630c8fd118fd0548b613c9ff002cc8adc16e07dd0bf81a7337634018aba34ffc4d8153c7a2c2ac0c92330ee3a55e66cfe150bcb9faf73400cd90db7091af34d92424e4938ee3d290beedac6983073839a006bfcd11e7ad45a7cbe5eaf6877b2b35c247907b13834e918aa9c8a82318d634a853866bb8bf1f985007a74b0b69d721253fbb638573dfff00af56863cbdc0835a57d6c2ead1a3c0c9e413d8d60c3398902b020038209e87b834016d911c1dc2b1750b742a7683d7d6b51ae1029c6067dea8ca632877b0e09a00e7acd965d692d9d42eee40f5c52f8aee618c2c67f847ad56d4750b6d36e45d64195061706b8fd5f5b9351959d89c678a00a977725a67dbc0dc6a6d0b4b7d635682d5558a3b6e94ff00754726b34333965556676e155064b1f41ef5ea5e11d01744b02d70435f4dcc98fe01d9450045f12b535d2bc0925ac5847b92b04607a756fd07eb5e290b946183c7f77d6badf8a3ad0bff00112d946d982c176707ac8796fe83f0ae3a23cd006bd9ddb09570715b96da80721641b78eb5cbc3b4b0e73c55a79498ce0b0c1ee6803ae52186e0739efeb4a2b0b4dbb9976a06c8f7adf8d9645e301bdcf0680176fbd14bb68a00e8848698d20dc4018c52160072715148db5377ad002bcd9522a22c6404e3e51fad43129b9948dfb514f3ef571e324fca71401095ce28651dc5484ed15139c2939e8680209410a5b700075cd57b16f33c51a3360022fa23d3dea791f839c01db1dea0d214dcf8b3498c8c137487eb839fe9401ee679c83d2b1352b568273305cc1263ccc7f09f5fa56df734305652ac01c8e9401e7baa3cf6b2aac4d9463ce7f4a8ae2d2f24b391a1ba0acab929e5ff005cd743ade9de502d6f1b4ea0e4c518dce9f41e95970bc85a44782e6324701a1719fd2803caf511706eb64982c09c83cd66c227bdba4b5b489ae2e5dbe548bb7d4f615ea7aaf806ff00546c4063b6494fef666fbcabdc2afa9f7ad5d0fc1d67a1daf956310dc7fd64acb977fa9a00e73c2de0f5d142dd5e379da8b8e587dd8f3d97fc6b4fc47ad8f0ee8d35eb8064036c4bfde90f4ff1fc2b7a78443cb1fae6bc5be227880eb1ac7d9ad981b3b438041e19fb9fe9401c94f349717124933167762cc4f724f3444b9a6468c5802319ef5623879eb4012c2b9703356d909b6932377cb9a6456e7697e7ea475ab71c6cdf2e09047734009624fc9d87735b96f311f7880b9e327ad61da80214dc7a8c7f8d6944c7e551c7a2f71401ac256c7de145540c71d07e545007552eeda400071c1f4acfbcb968e238e5bbd59bb955338edef5ceea174642082467d0d004f06a12c1748d182133fbc523a8ade8ee3cd5de9920f4c9e95cdd8465c9dc41cfa9ad9811add3e4fe23f77d2802ccb322291905dbd05559581500f34c670188f9431fd69cabdd413f53400d641e5971f37b7a559f08c2d71e32d3ca8f9237de7db83556672b18c0c835d07c32b513ebd733919f223ebee4e3fc6803d481c64d61ebbac47a6b436f0bc66feec95b68dcf048eac7d80ebf856c48cb1c4cee4055192c7b579c6b904baa6bd1eaad133456e0aa123ee29f6fe7401047aa6afe1bd6a6945e1bf86e9d65b8330ddec4a631800741d38ad487e202ff00c25161652cb6ff0061bb06307cb6574938db9278c1e47e22b2b53b5cde868258e4ca2a18d5fa1ee00eb5e75e3c79e1d421468e488a8dca70473ed401f4a3f5aace5598018ac2f077894788fc2f677ecc3cd23ca9c7f7645ebf9f07f1ad18a60b3952680397f1eeacd616460838b89cf968c3f87d4fe55e317d60231f203e529ea4f27eb5e93f106e55f572aa72f128040ed9e6bcf2ee46967383b80e817a13ef40194b07276fcbce2ad436a7a8e0f73eb5712d7bbae3d2adc48a7195fc7d2802b2419453c038cf03bd4aa8c14370723b8ab3122901c02a14f38343e325704f19cb374a00ca84ecbc96176f954f1c7af5ad785b7211803e4db93592e546b28ca38963d8bee456f004203b4018fc28016393f76bf2f6a2938f44fca8a00bdaadd8451b30323b573caed752a45182ce4f1839a9753ba62e14b13f535b1e1db58adb4d4b90a1a79f24b1ec3b0140172d2cc5a85322e5b1c0f4a9583cac0eec28edeb521463f3b0e47a0eb4dc120e4d00308e0f73e9eb474207cb83d41a178242e18efe40ed4a38600f7a00ab76c04449c715dd7c27b429a2de5d9e3cf9f6afd147f8935e7bad4b1c36c482327a926bd53c071987c0da6228dad3a1909f4c9273f95006bea1149a830b78895891b3237f7bda9e9650aed4118d98c10475156645115b84518029d0a63926803c5a5d066d3353d5acddcb2c1392adfc4cadf3027f035c3f887c4179a86cb49e4678e0ca824e73e9f957acf8ced447e2cbb9e33b4bd9c2e48ee4171d3f015e47a81b4974e864c34523b3951b413236ee727b0a00ee3e0c6a8d15cde68efb8a5c209e338e1641c11f8aff002af43d4eebec5b2762762862df8579c785ed9347b3b496138b83b64ddef5d5f8f6ff00cab0b7119c7da97cc207f001ff00d73fa50079e6b97ef797d24b21c48cc58e7b7b564c118612103ef9c8352dcb0b862e09dc4e4e07eb4e4e15db04718e45003c8036296fccd58c6c2afc7270703b7ad56b6413cc83236af5c8a9af2f96206154323fdd450783efed4004926d98b8932a7b1a82eafe38172ecbd7a67a8ac5bf9aee370252515ba6de8477a6c167e73a966ddbbb93d680346d58eadaac12431958e162ccded5d294c8e40fc6aae9902c56a3cb0bcff738c55bdbb980e47d680182188a83b3a8cf5a29e051401cc4d3f9d28da47247515ddd8a795a65a449c00b5c15a46d7172b81ce70057a1c230918519da833400e62c460039ee01a695655254f19c54a0a8c907683dfd69b9ce79fccd0044370661d39fcea37c8fad48387cd24b9dbf30c11401cdf88e5c4291b1059d80c03d2bdafc0d6274ff00095846589cc7b8027ee83d00af0fbf41a8788ac6d57259e4000afa32de116d670c23a46817f21400b37cc31eb4f41c546c726a4ce173ed401e5fe38bdf3b5dd452dd70d690246e49cee382dc7a603578e6af1c0b7de65a2aac122891577162b9ea09fae6bd3b56b917ba8eb135ba34a2e267f2c05fbc07ca3f957966a30b5bdc6d6cee0a3208236fb7e1d2803bc82ff0f6912901b0831f854be29d4cdedeb91c47811a73d00eff009d721a45d4d7faadb260e635f98fb01d6b52fe4324847451d280294836b0dbce78e3d6a74c0187393e84f4a862e1f39207b8eb52800b31008fa8a00916658637ce39a82d2017378f75213b5461702908f300c8ed9ab511114276139071d38a00abab429728caabf363e4f63543421ba731370c3b1ad7119377b8aee193bb03f3acfbd4369a82de2709b80908edef401d3a80880293f963b518f9cf5e066923c3206c9c3f2063ad3987ce40ea0f14013ace8aa01881ff007cf345343be3ff00ad450064786ac199cb91d0f7aeb59886214e38acfd32d9628b2b8dbdf8abfe5f20e318fd680115b39ce78f7a6b8f941069d8e0b762791492b657000193d85003186ec53656db1b67d29ea0f619a86ec811b925871ce3b5006678421fed1f89766b8dc9112d8f4c57bfb9fd6bc47e13c1e7f8ceeae7b2a1c1af6c5e491e9400b1a6339ae63c71ad9d334a3044479f3ae3e8bdff003e9f9d755c0049e31dcd78d6a9aabebbe2cba321223126d546e8aabc01f9f3f8d007473047b358e33832aaed1fdd2460e08f6af1bf14ea516a1abdc7963263629e6f39603dbb735e8faadca69fe1a56b59235b86120da63ce01e3393debc70c723dc6c1f3333638ee6803a4f0c5b882ca7bd63cbfc8a0f70393fae3f2a74ce1d88e370ea08e957eea3167a6436b0edf9005e4753dff5accfbe76e40c8cf1da8016353ce462a78d32c18b10a3b8ee69b180c4e09217a93d2a6452cc082383d08eb400f8940915a44040eb9ef4d0177055e40e8c7a7e15280543313b4fdd5dbce3dff3a5408d1a02c724f04f63f41400b0260332e581ec7b5656b218225aab6e9a538db8e9cd6bcb2ac365be53e59c64e4550d2a07b9ba7bfb81f786d8031e83b9ff003ef401b56f179512c5bf88c0507d70314e2541e4e29f8e704a823af34c68f2c467a500482711fcbbb38ef8a2a020fa51401b369ff1e42a47e9451400e87a1ff7e931d68a2801abd7fe0754b5ae2d5b1e945140173e0e7fc84af8fbd7b247d0d1450056d50e34cb8c7a7f5af19bbe3c43a9638f9c7f2a28a008fc51f708ed935c0689cf886d73ff003d8d1450074dab7fae359ebd3fe0228a28026b4eaffee9a953fd4a7d28a2801dff003c7ea2a57fbd1ffc0a8a28033fc424fd84ff009ef5ad663fd022ff0071a8a2802fb744ff0074d443ee8a28a0098018e945145007ffd9),
(2, 'Reglade', 'Stéphanie', 'StephR', '$1$/Hgscl5B$KWiU3B0sS1eceQSG4T6rn1', 'stephanie.r@insa.fr', NULL),
(4, 'Gates', 'Bill', 'BillGates', '$1$/Hgscl5B$KWiU3B0sS1eceQSG4T6rn1', 'bill.gates@microsoft.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Detection`
--

CREATE TABLE `Detection` (
  `idMesure` int NOT NULL COMMENT 'Identifiant de la mesure.',
  `refProduit` int NOT NULL COMMENT 'Référence produit possédant le capteur.',
  `horodatage` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date et heure de la mesure.',
  `detection` tinyint(1) NOT NULL COMMENT 'Bool de detection'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `Detection`
--

INSERT INTO `Detection` (`idMesure`, `refProduit`, `horodatage`, `detection`) VALUES
(1, 987654321, '2023-01-08 19:48:25', 0),
(2, 987654321, '2023-01-08 19:48:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `MesureAir`
--

CREATE TABLE `MesureAir` (
  `idMesure` int NOT NULL COMMENT 'Identifiant de la mesure.',
  `refProduit` int NOT NULL COMMENT 'Référence produit possédant le capteur.',
  `horodatage` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date et heure de la mesure.',
  `valeur` int NOT NULL COMMENT 'Valeur de la mesure.'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `MesuresTemperature`
--

CREATE TABLE `MesuresTemperature` (
  `idMesure` int NOT NULL COMMENT 'Identifiant de la mesure.',
  `refProduit` int NOT NULL COMMENT 'Référence produit possédant le capteur.',
  `horodatage` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date et heure de la mesure.',
  `temperature` int NOT NULL COMMENT 'Valeur de la mesure de temperature.',
  `humidite` int NOT NULL COMMENT 'Valeur de la mesure d''humidite.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `MesuresTemperature`
--

INSERT INTO `MesuresTemperature` (`idMesure`, `refProduit`, `horodatage`, `temperature`, `humidite`) VALUES
(4, 123456789, '2023-01-08 18:21:17', 15, 10),
(5, 123456789, '2023-01-08 18:21:32', 22, 7);

-- --------------------------------------------------------

--
-- Table structure for table `Produits`
--

CREATE TABLE `Produits` (
  `idProduit` int NOT NULL COMMENT 'Identifiant du produit.',
  `nom` varchar(50) NOT NULL COMMENT 'Nom du produit.',
  `piece` enum('CHAMBRE','CUISINE','SALON','ENTREE','SALLE_DE_BAIN','TOILETTES','MAISON') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL COMMENT 'Pièce de la maison associée au produit.',
  `mesures` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL COMMENT 'Grandeurs que le produit est capale de mesurer.',
  `cheminImage` varchar(535) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL COMMENT 'Chemin vers l''image associée au produit à afficher sur le site web.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `Produits`
--

INSERT INTO `Produits` (`idProduit`, `nom`, `piece`, `mesures`, `cheminImage`) VALUES
(1, 'Station météo', 'MAISON', 'temperature, humidite', 'product_images/reveil_connecte.jpeg'),
(2, 'Radiateur connecté', 'MAISON', 'temperature', 'product_images/radiateur_connecte.jpeg'),
(3, 'Détecteur de présence', 'MAISON', 'detection', 'product_images/seche_serviettes_connecte.jpeg'),
(4, 'VMC', 'MAISON', 'air', 'product_images/couette_connectee.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `ProduitsEnService`
--

CREATE TABLE `ProduitsEnService` (
  `refProduit` int NOT NULL COMMENT 'Référence du produit.',
  `idProduit` int NOT NULL COMMENT 'Type de produit (identifiant dans la table Produits).',
  `refClient` int NOT NULL COMMENT 'Référence du client possédant le produit.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ProduitsEnService`
--

INSERT INTO `ProduitsEnService` (`refProduit`, `idProduit`, `refClient`) VALUES
(123456789, 1, 1),
(987654321, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`idClient`);

--
-- Indexes for table `Detection`
--
ALTER TABLE `Detection`
  ADD PRIMARY KEY (`idMesure`),
  ADD KEY `Produit associé` (`refProduit`);

--
-- Indexes for table `MesureAir`
--
ALTER TABLE `MesureAir`
  ADD PRIMARY KEY (`idMesure`),
  ADD KEY `Produit associé` (`refProduit`);

--
-- Indexes for table `MesuresTemperature`
--
ALTER TABLE `MesuresTemperature`
  ADD PRIMARY KEY (`idMesure`),
  ADD KEY `Produit Associé` (`refProduit`);

--
-- Indexes for table `Produits`
--
ALTER TABLE `Produits`
  ADD PRIMARY KEY (`idProduit`);

--
-- Indexes for table `ProduitsEnService`
--
ALTER TABLE `ProduitsEnService`
  ADD PRIMARY KEY (`refProduit`),
  ADD KEY `TypeDeProduit` (`idProduit`),
  ADD KEY `Appartenance` (`refClient`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `idClient` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant client', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Detection`
--
ALTER TABLE `Detection`
  MODIFY `idMesure` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de la mesure.', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `MesureAir`
--
ALTER TABLE `MesureAir`
  MODIFY `idMesure` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de la mesure.';

--
-- AUTO_INCREMENT for table `MesuresTemperature`
--
ALTER TABLE `MesuresTemperature`
  MODIFY `idMesure` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de la mesure.', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Produits`
--
ALTER TABLE `Produits`
  MODIFY `idProduit` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant du produit.', AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `MesuresTemperature`
--
ALTER TABLE `MesuresTemperature`
  ADD CONSTRAINT `Produit Associé` FOREIGN KEY (`refProduit`) REFERENCES `ProduitsEnService` (`refProduit`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `ProduitsEnService`
--
ALTER TABLE `ProduitsEnService`
  ADD CONSTRAINT `Appartenance` FOREIGN KEY (`refClient`) REFERENCES `Clients` (`idClient`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `TypeDeProduit` FOREIGN KEY (`idProduit`) REFERENCES `Produits` (`idProduit`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
