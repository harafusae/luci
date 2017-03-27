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
 * @link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'wp_bakusui');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'root');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', '');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'zi,RwFL5pZ/])4Ic/j^Sx>be;* y>Lu~?7~`S|*%a|^]ZC^8HJ/;=x&_wVN9{>8*');
define('SECURE_AUTH_KEY',  'eiKfpbMA<|~iwvSSaYRdvn(03_iy?;c(Qdcjy#=~ZWCccfu)Gl%SDQa$9.y*Z^q_');
define('LOGGED_IN_KEY',    '@zJ}Gm2,j#N{f:BKUI{<0+E}EA_KIO!N8+FqzOUVo`{:HXUSm<xrbDZdP8|h@mwz');
define('NONCE_KEY',        'o5GT8lc:C8 #>h{)LeQ`eovb|)3ZJU2tRoKi=Eg9LZW/_4 (w^nKYHw#vZ.)DZ}3');
define('AUTH_SALT',        '?nRw03da|ynJ?K3Qw6f :pt%ujBW:Z=p^Q|J/k$mhSIDs0(}.9Y<ag{O]BKy9J[0');
define('SECURE_AUTH_SALT', ':5%N?rmo_q~U1}b1 &]m3bhIoGj!MIj (_R]B{X?e=GtM$bic3am$-?mBwed1jvI');
define('LOGGED_IN_SALT',   '0T#Dn8w;OEGbLnP}CS75NvlBYTIJ%YUn~83NjuD/<p7?iihJD?<},KX@fjP3YF6G');
define('NONCE_SALT',       '_m}}bmA[Y+7l)rqL>wT98v s{={^#@/d2tY6enC)KvEK4HxlX/7{]dOB|/yhYKU!');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
