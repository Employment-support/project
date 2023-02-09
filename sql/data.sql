-- 学科
INSERT INTO `departments`(`id`, `department`) VALUES ('1', 'スーパーゲームIT科');
INSERT INTO `departments`(`id`, `department`) VALUES ('2', 'ゲーム・CGクリエーター科');
INSERT INTO `departments`(`id`, `department`) VALUES ('3', 'e-sports科');
INSERT INTO `departments`(`id`, `department`) VALUES ('4', 'クリエーター科');

-- 専攻
INSERT INTO `majors`(`id`, `major`) VALUES ('1', "AIエンジニア専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('2', "データサイエンティスト専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('3', "ホワイトハッカー専攻 ホワイトハッカーコース");
INSERT INTO `majors`(`id`, `major`) VALUES ('4', "ホワイトハッカー専攻 デジタルフォレンジックコース");
INSERT INTO `majors`(`id`, `major`) VALUES ('5', "ITエンジニア専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('6', "ITスタートアップ専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('7', "スーパーゲームクリエーター専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('8', "スーパーCG・映像クリエーター専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('9', "CGクリエーター専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('10', "ゲームプログラマー専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('11', "キャラクター専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('12', "sportsイベント・マネジメント専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('13', "sportsプロゲーマー専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('14', "ネット動画クリエーター専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('15', "イラスト専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('16', "シナリオ＆コンテンツ企画専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('17', "コミックイラスト＆マンガ専攻");
INSERT INTO `majors`(`id`, `major`) VALUES ('18', "アニメーション専攻");

INSERT INTO `belongs`(`id`, `type`) VALUES ('1', "担任");
INSERT INTO `belongs`(`id`, `type`) VALUES ('2', "学生");

-- 業界
INSERT INTO `corporations`(`id`, `genre`) VALUES ('1', "IT・エンジニア業界");
INSERT INTO `corporations`(`id`, `genre`) VALUES ('2', "ゲーム・CG業界");
INSERT INTO `corporations`(`id`, `genre`) VALUES ('3', "e-sports業界");
INSERT INTO `corporations`(`id`, `genre`) VALUES ('4', "WEB・デザイン・出版業界");
INSERT INTO `corporations`(`id`, `genre`) VALUES ('5', "アニメ業界");


-- スキルセット一覧
INSERT INTO `skill_sortings`(`id`, `sorting_name`) VALUES ('1', 'os');
INSERT INTO `skill_sortings`(`id`, `sorting_name`) VALUES ('2', '言語');
INSERT INTO `skill_sortings`(`id`, `sorting_name`) VALUES ('3', 'db');
INSERT INTO `skill_sortings`(`id`, `sorting_name`) VALUES ('4', 'Office');
INSERT INTO `skill_sortings`(`id`, `sorting_name`) VALUES ('5', 'ネットワーク');
INSERT INTO `skill_sortings`(`id`, `sorting_name`) VALUES ('6', 'その他');





-- テストユーザ担任(管理者権限あり)
-- ナンバー
-- 963852741
-- パスワード
-- 1519689856
-- INSERT INTO `users` (`id`, `email`, `password`, `admin`, `created_at`, `update_at`, `delete_at`, `name`, `name_hiragana`, `gender`, `student_number`, `type_id`, `department_id`, `major_id`) VALUES
-- (1, 'test123@test.com', '$2y$10$o4/gluD/Jd09TIaPmGncXuGnSN5kmct1aK0.qSIDBcYSNSDoViccW', 0, '2022-09-24 01:11:40', '2022-09-24 01:11:40', '2022-09-24 01:11:40', '佐藤 淳', 'さとう じゅん', '1', '963852741', 2, 1, 1);

INSERT INTO `users` (`id`, `email`, `password`, `admin`, `created_at`, `update_at`, `delete_at`, `name`, `name_hiragana`, `gender`, `student_number`, `type_id`, `department_id`, `major_id`) VALUES
(1, 'test123@test.com', '$2y$10$o4/gluD/Jd09TIaPmGncXuGnSN5kmct1aK0.qSIDBcYSNSDoViccW', 1, '2022-09-24 01:11:40', '2022-09-24 01:11:40', '2022-09-24 01:11:40', '佐藤 淳', 'さとう じゅん', '1', '963852741', 1, 1, 1);

-- テストユーザ学生(管理者権限なし)
-- ナンバー
-- 789789456258
-- パスワード
-- 1371802371
-- INSERT INTO `users` (`id`, `email`, `password`, `admin`, `created_at`, `update_at`, `delete_at`, `name`, `name_hiragana`, `gender`, `student_number`, `type_id`, `department_id`, `major_id`) VALUES 
-- (2, 'test321@test.com', '$2y$10$DV7LDU04hHGqG3nbA20yuOdPebgNbY5pXNPQZv4UxaeP4Xjc/DioW', 0, '2022-09-29 03:54:44', '2022-09-29 03:54:44', '2022-09-29 03:54:44', '松本 真奈美', 'まつもと まなみ', '2', '789789456258', 1, 2, 1);
INSERT INTO `users` (`id`, `email`, `password`, `admin`, `created_at`, `update_at`, `delete_at`, `name`, `name_hiragana`, `gender`, `student_number`, `type_id`, `department_id`, `major_id`) VALUES 
(2, 'test321@test.com', '$2y$10$DV7LDU04hHGqG3nbA20yuOdPebgNbY5pXNPQZv4UxaeP4Xjc/DioW', 0, '2022-09-29 03:54:44', '2022-09-29 03:54:44', '2022-09-29 03:54:44', '松本 真奈美', 'まつもと まなみ', '2', '789789456258', 2, 2, 1);


--
-- テーブルのデータのダンプ `skill_items`
--
INSERT INTO `skill_items` (`id`, `name`, `skill_sortings_id`) VALUES
(1, 'Windows', 1),
(2, 'Linux', 1),
(3, 'Mac', 1),
(4, 'Python', 2),
(5, 'PHP', 2),
(6, 'MySQL', 3),
(7, 'MariaDB', 3),
(8, 'Word', 4),
(9, 'Excel', 4),
(10, 'PowerPoint', 4),
(11, 'ネットワーク', 5);


--
-- テーブルのデータのダンプ `abilities`
--
INSERT INTO `abilities` (`id`, `ability`) VALUES
(11, 'ITサービスマネージャ試験'),
(5, 'ITストラテジスト試験'),
(1, 'ITパスポート試験'),
(10, 'エンベデッドシステムスペシャリスト試験'),
(6, 'システムアーキテクト試験'),
(12, 'システム監査技術者試験'),
(9, 'データベーススペシャリスト試験'),
(8, 'ネットワークスペシャリスト試験'),
(7, 'プロジェクトマネージャ試験'),
(3, '基本情報技術者試験'),
(4, '応用情報技術者試験'),
(2, '情報セキュリティマネジメント試験'),
(13, '情報処理安全確保支援士試験');


--
-- テーブルのデータのダンプ `portfolio`
--
INSERT INTO `portfolio` (`id`, `title`, `contents`, `item_url`, `img_path`, `top`, `user_id`, `created_at`, `update_at`, `delete_at`) VALUES
(1, '通販サイト', '通販サイトを制作しました', 'https://www.amazon.co.jp/', '', 0, 1, '2022-10-11 05:16:16', '2022-10-11 12:17:07', '2022-10-11 05:16:16'),
(2, '動画投稿サイト', '動画投稿サイトを制作しました', 'https://www.youtube.com/', '', 0, 2, '2022-10-11 05:17:26', '2022-10-11 12:18:25', '2022-10-11 05:17:26');


--
-- テーブルのデータのダンプ `shares`
--
INSERT INTO `shares` (`title`, `contents`, `user_id`, `created_at`, `update_at`, `delete_at`. `department_id`, `major_id`) VALUES
('共有情報1', '概要1', 1, '2022-10-11 06:29:40', '2022-10-11 13:30:05', '2022-10-11 06:29:40', 1, 1),
('共有情報2', '概要2', 2, '2022-10-11 06:29:40', '2022-10-11 13:30:05', '2022-10-11 06:29:40', 1, 1),
('共有情報3', '概要3', 2, '2022-10-11 06:29:40', '2022-10-11 13:30:05', '2022-10-11 06:29:40', 1, 1);


--
-- テーブルのデータのダンプ `briefings`
--
INSERT INTO `briefings` (`corporate`, `contents`, `corporate_url`, `info`, `img_path`, `corporation_id`, `user_id`, `created_at`, `update_at`, `delete_at`) VALUES
('アマゾンジャパン', 'ソフトウェア開発エンジニア 2024', 'https://www.amazon.jobs/jp/jobs/2211245/2024', '説明\r\nJob summary\r\n*新卒採用のポジションです*\r\nAmazonの技術開発チームは日本のみならず、グローバルに展開できるウェブサイトやソフトウェア開発を目指しています。\r\n\r\n私たちのチームの開発エンジニアの出身は世界各国さまざま。考え方やカルチャーのダイバーシティがそのままチームの働きやすさや革新的なシステムやサービスを作りだす原動力となっています。\r\n\r\nモバイル、タブレット端末、デスクトップのUIデザイン、大規模なシステム、マシンラーニングやクラウドコンピューティングを駆使して、お客様を起点としてどのようにお客様満足をいかにお届けできるかを日夜考えているのが私たちのチームです。\r\n\r\n私たちJapan Development Centerでは、同僚とともにたくさんのプロジェクトに携わることで技術面のみならず技術以外のスキルについてもみなさんに成長機会を提供します。新卒採用ではソフトウェア開発エンジニアを採用します。\r\n\r\nAmazonのウェブサイトは訪問されるお客様が非常に多いだけでなく、新たなビジネスのローンチにより、多くの機能を日々追加しています。この技術職は、早い成長を続けているAmazon.co.jpの大規模なウェブサイトの運営構築するポジションです。当ポジションでは日常会話以上の英語力、またプログラミングの経験、もしくはコンピュータサイエンス専攻であることが必須要件となります。\r\n\r\n当ポジションは、Amazon.co.jp上の機能を構築・運営する「ソフトウェア開発エンジニア」となります。', '../app/static/imgs/logo/1.png', 1, 1, '2022-10-11 06:09:45', '2022-10-11 04:11:36', '2022-10-11 06:09:45'),
('P.A.WORKS', 'アニメーター（動画）', 'https://www.pa-works.jp/', '動画は原画からのアウトプットとして、非常に重要なセクションです。\r\nプロの動画マンとして、作品の品質を支えてくれる方を求めています。\r\nデジタル作画経験の有る無しに関わらず、動画マンとしての基礎が備わっている方、\r\nこれからデジタルに移行していきたいと思っている方なども歓迎致します。', '../app/static/imgs/logo/2.png', 5, 1, '2022-10-11 06:11:49', '2022-10-11 04:17:13', '2022-10-11 06:11:49'),
('株式会社KADOKAWA', 'KADOKAWA・夏の長期インターンシップ', 'https://group.kadokawa.co.jp/recruit/kadokawa/2023/intern/', 'KADOKAWA・夏の長期インターンシップがはじまります。人気作品はどうやって生まれているのか、世界的ヒットの裏側にはどんな戦略があったのか、編集者・プロデューサーはどんな情熱を抱いて仕事と向き合っているのか、まだ見ぬ未来のコンテンツビジネスのあり方とは……。KADOKAWAでの実際の業務を通じて、進化し続けるコンテンツビジネスの仕事を知るチャンス。インターンシップとはいえ、皆さんには各部門のコア業務を担っていただきます。難易度の高い業務もなかにはあると思いますが、“好き”にまみれ、“好き”に埋もれる日々をぜひ堪能してください。コミック、アニメ、文芸、映画、デジタル、海外、営業ほか、全22部門で受け入れ決定。あなたがもっとも愛するコースに、エントリーを！', '../app/static/imgs/logo/4.png', 4, 2, '2022-10-11 06:20:53', '2022-10-11 04:23:34', '2022-10-11 06:20:53'),
('東日本電信電話株式会社', 'eスポーツプロジェクト', 'https://www.ntt-east.co.jp/recruit/new-grad/', '現在、世界中で盛り上がりを見せているeスポーツ。日本でもイベントや大会が日本各地で開催され、さらに地域活性化の手段としても注目を集めている。NTT東日本では、高品質な通信インフラ設備や充実したICTソリューション、各地域に保有するアセットを軸に、2019年の春から本格的にeスポーツ事業に参画した。', '../app/static/imgs/logo/5.png', 3, 2, '2022-10-11 06:20:53', '2022-10-11 04:28:04', '2022-10-11 06:20:53');
-- ('ロックスター・ゲームス', 'ROCKSTAR INTERNATIONAL . MARKETING\r\nMARKETING & COMMUNICATIONS MANAGER: JAPAN', 'https://www.rockstargames.com/careers/openings/position/5161720003', 'At Rockstar Games, we create world-class entertainment experiences.\r\n\r\nA career at Rockstar Games is about being part of a team working on some of the most creatively rewarding and ambitious projects to be found in any entertainment medium. You would be welcomed to a dedicated and inclusive environment where you can learn, and collaborate with some of the most talented people in the industry.\r\n\r\nRockstar Games International is seeking an Marketing & Communications manager to assist in the growth of our business in Japan. Reporting to the Marketing and Communications Director, who is based in Singapore; this candidate will have a deep understanding of Japanese players alongside a breadth of experience bringing western products and live services to market.  \r\n\r\nThis is a full-time permanent position based in our Take-Two Tokyo office.\r\n\r\nWHAT WE DO\r\nThe Rockstar International publishing team in Singapore support the growth of the business in Asia in addition to the day-to-day management of our regional markets.\r\nWe collaborate closely with our regional Take-Two Sales, Operations, finance, legal and HR counterparts to support all facets of the Rockstar business in Asia.\r\nWe manage product launches for high-profile console, PC and portable gaming titles as well as our live service offerings – Grand Theft Auto & Red Dead Online.\r\nRESPONSIBILITIES\r\nSupport the growth of the Rockstar business in Japan. Build and develop a roadmap that leads to enhanced awareness of our brand, products and live services with Japanese players.\r\nBy extension, create tailored product marketing strategies, focused on messaging and positioning, for our titles and live services in Japan.\r\nWork on a cross-functional basis with our European and International counterparts to deliver best in class campaigns that resonate with Japanese players.\r\nMaintain and leverage relationships with local partners, including but not limited to: Media, First-Party, Agencies (media, communications, licensing) and distributors.\r\nRepresent and advocate for Rockstar in Japan – both internally and externally, as a core member of the Rockstar Asia team.\r\nBe our local expert on gaming and entertainment industry\'s trends, technologies and the competitive landscape.\r\nSupport in the execution of media, lifestyle, industry and community events for the Japanese market.\r\nQUALIFICATIONS\r\nNative level Japanese, fluency in English (IELTS qualification or equivalent here are a plus).\r\nSubject matter expert, with a Degree &/or 5+years of professional experience in consumer marketing, preferably interactive entertainment.\r\nSKILLS\r\nExpertise launching &/or managing Western brands/IP in the Japanese domestic market.\r\nDeep knowledge of regional/cultural landscape differences and similarities in the gaming communities of Japan and North America.\r\nAble to contribute towards our strategic planning efforts whilst also managing day-to-day domestic execution with excellence.\r\nA collaborative ethos working on multiple projects over extended periods, both in-person and on a remote basis.\r\nAbility to work autonomously as well as part of a team\r\nAble to communicate effectively within a large publishing organisation with an action oriented mind-set.\r\nStrong presentation and organizational skills, in order to eloquently convey local insights and inform key decision makers.\r\nCreative thinker with the skills to analyse marketing challenges and develop effective marketing solutions.\r\nDetail and results-oriented self-starter with disciplined workflow practices.\r\nComfortable providing actionable insight from internal data and consumer research.\r\nA passion for video games, the landscape and industry.\r\nHOW TO APPLY\r\nPlease apply with a resume and cover letter demonstrating how you meet the skills above. If we would like to move forward with your application, a Rockstar recruiter will reach out to you to explain next steps and guide you through the process.\r\n\r\nRockstar is proud to be an equal opportunity employer, and we are committed to hiring, promoting, and compensating employees based on their qualifications and demonstrated ability to perform job responsibilities.\r\n\r\nIf you’ve got the right skills for the job, we want to hear from you. We encourage applications from all suitable candidates regardless of age, disability, gender identity, sexual orientation, religion, belief, or race.', '../app/static/imgs/logo/3.png', 2, 2, '2022-10-11 06:17:26', '2022-10-11 04:20:40', '2022-10-11 06:17:26'),
