<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'wordpress' );

/** MySQL データベースのユーザー名 */
define( 'DB_USER', 'root' );

/** MySQL データベースのパスワード */
define( 'DB_PASSWORD', 'password' );

/** MySQL のホスト名 */
define( 'DB_HOST', 'mysql' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8mb4' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '|vpSPxFy9cthTa-<yr]-!PI <k9jI&7z6p7&4JMDq]$c_Er$7S,92c/C`v5fX)6T' );
define( 'SECURE_AUTH_KEY',  'r^>_2}d-Wp)l7MhC=ln7D/L;E?0[{Ui*L-wP69U#i=ri~pdey.U!0[U#9hbbe`<|' );
define( 'LOGGED_IN_KEY',    '~;{e]TN+Dp#Q7(`nYh+ rMp4Q=+MuXn?N:dn|Zs3~gc~cgeJAjHSG|3v7 ]nmnL*' );
define( 'NONCE_KEY',        'S0Au70(JV/y>k+]?hmKwN$8%bxwQJ~w[f.CgAUYELuLW<@{>4(h0njM/r]<=.Q3<' );
define( 'AUTH_SALT',        'SNAEKwC|2H0LA&2o^3Mo/i/]_Hu30p4cv}k!CgsxD-{a:}?X_@4ktq65{KI@IS&~' );
define( 'SECURE_AUTH_SALT', '3l,Ug_.Q?X41$=yIjX-)d<Q]!*U^<ae8fyq@()Hg_9dYaV>&wh3sVin5D`U:y$Gx' );
define( 'LOGGED_IN_SALT',   '7H-zgKP.jq^k[]EeifJ--+;Z7L{][qCml?ErC-V/OZJ(CT;yQ3o|Gmo*#a2,M#^F' );
define( 'NONCE_SALT',       '*Un0]]%Kb6|9iJMgwkOQ&Xpv/4>0WGt[Iq#$0q|HCZ#!S:[rc@Bg`YOCy@ZW#*N2' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define( 'WP_DEBUG', false );

/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
