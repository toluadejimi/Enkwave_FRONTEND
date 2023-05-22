<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'assorted_wp332' );

/** MySQL database username */
define( 'DB_USER', 'assorted_wp332' );

/** MySQL database password */
define( 'DB_PASSWORD', 'X7.0-1HpSW' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'zx7xjjtdx4mxqx3ylh28sulamaanormfgrhxou4jxohqvojahe3v6duogw96ggmf' );
define( 'SECURE_AUTH_KEY',  'fmrcxwtiaslmofta4u5ialiosmnsnltoek1pphkndyjsraql9qa4ctrliyajfvpn' );
define( 'LOGGED_IN_KEY',    'qfdnercs3cvuc6kgt7iumijivhgxgumebmevzo9gcduwkkcjkfsk2zmpek3rfpt9' );
define( 'NONCE_KEY',        '7hprgf4efzlbpiffmzsnt2obdcaafcn4mplrc6gpeyipfyai5anjs99tf8a251c9' );
define( 'AUTH_SALT',        'doy9rtfmhbihjwz57tdra2sxetb9x35dhb3fg5s8etzb2lpfk1nqc8nvh6ghz5e7' );
define( 'SECURE_AUTH_SALT', 'ddfsb5wrk1nutjgo4w8qrlsz4wj9cwb5hfhwryf0kyapnh4trdok8ufhioxddukw' );
define( 'LOGGED_IN_SALT',   'yyvb2sej5nlyakl59ooolkzyvrchth0ewtgl5b1librf0h23rulctzvefgjnqsdh' );
define( 'NONCE_SALT',       '1lthmucs2ssmokbwdfqfcbxpdggd3tyyrj9m1y7sltzulgor5oxbpepdlw116p9u' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpqr_';

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
