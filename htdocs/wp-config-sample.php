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
define( 'AUTH_KEY',         '8C&F.%#c?2c_UVuDf}E]qI{6*=x[@-Y+_E0_PZ8{;FOUzpi1-t_~W{e|VTCz+dUf' );
define( 'SECURE_AUTH_KEY',  'ioiG;[tT;66kjxbv&o$^lZ4Ai3q?$#%(qieoGk@#e&_Wk7g8XRI(*:L#[A4>wEmy' );
define( 'LOGGED_IN_KEY',    '&ilGnNMO:Dd ?X4:Ru6gv0C%|S@UVL][TvGOm^9,T-tjPvE;]TUE3 2Hb_p[FQoP' );
define( 'NONCE_KEY',        'S|Cy?m`&EjLlgh-[zB{]0>IY U/2,.*r9C*a@w:Q3.rz*)RgNoXOTH .kcQS#OqG' );
define( 'AUTH_SALT',        'e,%itB|c8){{]E_zA37ej][xQm<ew+:t^GO_m,;~&VICZV zOp*bD4fTQj}1[Z$3' );
define( 'SECURE_AUTH_SALT', '9R#U6F/*jUB=rHnj~6nPuCuhC4bVz{kx&|m64!iqp,/)z$k~P%}.x*Y)mT3ED|9J' );
define( 'LOGGED_IN_SALT',   'DpnD &(C5?Ytzy[N@[L4C:pe<06^XrbPn{>QM(2A|&sRee>NQGtbuG_=8sZDn<f/' );
define( 'NONCE_SALT',       'Yv:Yd$E.-903?M(:<~]%u~5*?:L;|tY#F6V>xD>A=`YeP$ns+R_LfwD,W)-VF?Gr' );

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
