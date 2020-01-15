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
define( 'AUTH_KEY',         '`0zUAWW);QMs{BO`?&Ecd,XKqZa{-MFhU3JqFey6*`K.T!j:}),fGVuS/whW aT/' );
define( 'SECURE_AUTH_KEY',  'ec]~/`7|:|ONuJS=6Uz]Pr~0T~my0BxZ!8fW*#|+W&vVw<M2(ajI4y`~KpHhjF~y' );
define( 'LOGGED_IN_KEY',    '1oN(/=pd=$jvqqGov3UA9y}c_r.Ah2bRMsi<hPpQU@CoEkxKq%bnv1k8Yj>JG]|+' );
define( 'NONCE_KEY',        'lh N.%/z]w!!D2lyb/<*?c)gIzm.-t>Kcl)r<73q[><`#g9W7[;x:PZ5)6d^/I?E' );
define( 'AUTH_SALT',        'UW32=-YV|mjGN[D,J#Api7%cPs|pn<#q1(.sC+4!]0,&{3P@I!@9yjR.]_PWlX&H' );
define( 'SECURE_AUTH_SALT', '[ z-mt`RwO!2*>^]^|ds_bfG 2. GMKvmK >+V|gSxEh9N;z~}S3:5&/w{*}fPpC' );
define( 'LOGGED_IN_SALT',   '^U3k4t;RN7:{gs=b;LK/&5pz!Ct8k5},dzstMte[l.mgRFE=96/F?1?|aoj>FThw' );
define( 'NONCE_SALT',       'ni;J#HPBrcUP^1lB^7#a_mEN<,;PB<i<FYnd%#O&-#WN25Z_2og_cWc$y|eSRhu1' );

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
