<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'youcode' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'HEzA~3!>jh7hxXRq=|B23rg$$ MLrI-Bd&(YX?hq=wTgn;f{P._eKNPv2`M5QK:J' );
define( 'SECURE_AUTH_KEY',  '`[bjW7 >(S4R;(9Jn#3^oL`4QA@s[{vBLo*H33P]aNS}[9`=|[feY:tA;e4ry?vY' );
define( 'LOGGED_IN_KEY',    'oy>sg$1[Y]Md*iLT[fy)uvc}.J1:d;s^WbyFOBpG+snumJ.C^,SE_q=uzl~W`H#1' );
define( 'NONCE_KEY',        '*Ah]*MM59rbnVb~_s|3g8[K-|r{]mgUJLAP]7.S*[wq1XPs@B62xZj4|g@p*)8pl' );
define( 'AUTH_SALT',        'E[:V&EAvRkc8WQ7%6cEM2;>I.r@XIFN;OxCG}VU7#uk!fKN!I6$bcoDOZM;k;03x' );
define( 'SECURE_AUTH_SALT', 'PEz)O8ZBf.4EX&cLE#lG^_-o,ehRhb:U`i@J/L={!^^ol)x(Yn]peWo+AB5pijtB' );
define( 'LOGGED_IN_SALT',   '$I.kjP2QN{ZH[]2E 4t?i1{&Rt@S)r[n5+fG|IIbE#7-xE$8$Ce!6a.CDD9DnVLt' );
define( 'NONCE_SALT',       'd*M5k^S!+ax 5+tgnMBCNwA<n`~^Z!mex4pp){wUyI[S,O5V$mE vh/0C,$da<lg' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
