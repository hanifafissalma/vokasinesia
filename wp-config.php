<?php
define('WP_AUTO_UPDATE_CORE', 'minor');// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
define('WP_CACHE', true);
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'skemavok_mainweb' );

/** MySQL database username */
define( 'DB_USER', 'skemavok_vokasi' );

/** MySQL database password */
define( 'DB_PASSWORD', 'JN)(UoiJsesd19' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '<1O>qt0p@HW>WKSxoZb{TsWh$LGT=[U|sDz@{oCqY 8>Y(e1r/A5ajKv }(js#n!' );
define( 'SECURE_AUTH_KEY',  '+,*vHVKx~Ni%M@0@yfU`x,Og]p+ahffQ`}$AKHn3+;%}^:UUB3zC!rKh2sXWYm14' );
define( 'LOGGED_IN_KEY',    ',_-=j(O,950-XAWd/Mh_qxZ{+@0pTk.3}lq(.Q*BGcV)*AhWP5A|Q|G1E5d1.y*n' );
define( 'NONCE_KEY',        'CMt!lfosFF<>S`:f6Uc`Ul7dPShfqah Y0^;hd%EO;U@x9EB_0J.{1OShLdNwk<Y' );
define( 'AUTH_SALT',        'T-{,|}d{pjOF;X)hxPD*-d)Yf</u9~DJjUmGU~AMNfY(Vv/I.-<voHR2aDC%gN]Y' );
define( 'SECURE_AUTH_SALT', 'nHb5Ed;InIP{VkLr|p14!7k[T,)1z AyPVi;<%{M1RJ=H)=GO_12t(CEQzz*/!Vq' );
define( 'LOGGED_IN_SALT',   'Qqa9&-clqOI&Bc{1^G;B4lXB=cUzK3Kcr6[GA~FJUE_$?56r !M1/H+K&@Um{foF' );
define( 'NONCE_SALT',       'Sy7s1*(ta>2wpjl$B&Jc55!<7%j~S$v1`=,|S:~~I=GM-ej*v7TGA7M1GL^fJKd7' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pv_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
