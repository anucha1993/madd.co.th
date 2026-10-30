<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'madd_wp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         'y;YFe3F+U}*~b?.XOu(yHqUZ>*^=VV<4O9O=JSN)+mr~S>]A4sodp~?L<~k(v/lj' );
define( 'SECURE_AUTH_KEY',  'oe:8VQM<R{-;NLTQ}&@D4[3sLK%EK;.sXJVK.WM!Yp_nVGG5mFA0]TqH_>5t?[F.' );
define( 'LOGGED_IN_KEY',    '=?,O!xgk<<Kv#O0.Eeyh1(IZ.TUCBZOuN^,-;2md4ppJ<y{!Ha|{Hm6jzSlchaHt' );
define( 'NONCE_KEY',        'vj90+4X]Mg8}_|RlK67HJO7>i:Hn@EG;W?[*aIq;75o)1p:L79/&%2~i}/+QSFsE' );
define( 'AUTH_SALT',        'C&CmnredBotiRd][TGq!E<|{}J]=+^jyqVlK4vczK*>Ifzo3zq2Ij~Y913z9!|*t' );
define( 'SECURE_AUTH_SALT', '&Y:ab4a>WMJ+f)06vsBxU@b1j!swgJT}UwoP||q;4s3e-#Vb(YA_NZRzDCJ@-r8V' );
define( 'LOGGED_IN_SALT',   'D7blUx-r#dE{TT)juFFU.M)iD;pE4!Xq>n,<uh9{)VeGz/A&@;k?Z&fPh5c58fG7' );
define( 'NONCE_SALT',       'lc/AE&oL0wg!qn4P;+Is?;R0fGcM{]8Y,|85I=/0%?h-*dh/Ykxh@//%X2jH,wtt' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
