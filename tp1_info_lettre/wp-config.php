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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tp1_info_lettre' );

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
define( 'AUTH_KEY',         'J+a]ODOqSJ1:7(]YQg+tCENIflM$>&w?|&$rxt0qo9Ck$atPn)U*z!*HWLFd{Yl)' );
define( 'SECURE_AUTH_KEY',  '|9}?Vb1SKZypks;9r`#gx-(}Z.c8vi-0E5PL8YHEG|P|uCs^>2Ox&YVcQaoN5471' );
define( 'LOGGED_IN_KEY',    'a3FYa8RJe$S:Q$s>zs6cNccwjI0ho8^^nJ._mLqaiO`*eaW3V0EryAC}k86qcaD&' );
define( 'NONCE_KEY',        'YStVve7{J+tk?)i_2`kezWyuTT1_1HR:D~v11G}%o+`1 B>H5TJQZHebT,l>g)*]' );
define( 'AUTH_SALT',        'nlBL?$ATSHvNqssGOO|91i@1u_+P,1.bz?)WZ `{ ABV`vv;ILNc56V$$Y`{qnkX' );
define( 'SECURE_AUTH_SALT', 'kT?{ Y9+{rUb]|7*MxnpR^83c}6Qbj*-boj ^C>b=q0USN;vq8k%M{@A_UBQ:&io' );
define( 'LOGGED_IN_SALT',   'Ne`}SolzJ9mW,KtlkK~bH;vas:#y$Eeo(AX</E/H7-+tGfJx*DZR1/FG+.&Yb^87' );
define( 'NONCE_SALT',       'V,=F~3T~5gtafX0yd:NVLfKyu;/4d*S#F/U-`[s;dl<k9A&,[,^GMJ&o|ElpdkU#' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
