-- ログインするユーザーのテーブル clients
-- カラムはid, name, password, levelの4つ
-- levelで管理者権限レベルを管理
-- バリデーションチェックはそれぞれ()内を参照
CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 在庫のテーブル products
-- カラムはid, name, amount, price, statusの5つ
-- statusで在庫の発注状態を管理
-- バリデーションチェックはそれぞれ()内を参照
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `price` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- clients内にadminとしてユーザーを1人登録
-- ログイン ユーザー名: admin パスワード: 1111
INSERT INTO `clients` (
  `id`, `name`, `password`, `level`
) VALUES (
  20, 'admin', '$2y$10$0MlEnVP8c73v4gAFFMRyy..rtjdgOArDUV0d126pqWQgvO7x6JWFy', '1'
)
