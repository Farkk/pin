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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'j27119254_pin' );

/** Database username */
define( 'DB_USER', 'j27119254_pin' );

/** Database password */
define( 'DB_PASSWORD', 'j27119254_pin' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'mQfW:+Xy8:`4)*eB{+t]kqXdnklln#2$#9SIS2kNo15n,Nz7CQf1><@no]c9~|XX' );
define( 'SECURE_AUTH_KEY',   '9t3PXdNp{Q-PXMgpIMPC>8 7x!8& lXv}Yj|)^Ce$8{1TE(9qUT`O)u?et@eiG0|' );
define( 'LOGGED_IN_KEY',     'x^F[MTfG 59F^{TTln;Q~J-#]Q`IrJjk7VIXwEqA{*qWA4N,fu.3`?<sbk3Ty=uh' );
define( 'NONCE_KEY',         '[(*:P{+Vg?TgK%)@M8rgp}]y2DGx[:6ewP6{(;|f60+:p=2^/p;L&L:1CKm.>+Zx' );
define( 'AUTH_SALT',         'dI5{?]`iK@ku!&1-yauoCk{xB1?SZ4Umx/{h0D;b5*=}D-6j%]%%i=GA%HCbXmA3' );
define( 'SECURE_AUTH_SALT',  '9;/dyGBE)/e:CudroHhoz]9>C9y@s!o1QZJyPi#A^R*IP32k5QXDqKK<xf u(9J7' );
define( 'LOGGED_IN_SALT',    'IZhGR#ACtvvNo&wp`1gv>pZNj8eI[aII/`6s|KGv&>+}daI!j=mtztNzjx(7(jQ(' );
define( 'NONCE_SALT',        'HAGUY[Dgkq&z/6sY$y$:^>t;u0^BG#V~RLa1d +!`2K}*0IZ+AfU1CZRMGAf8<rx' );
define( 'WP_CACHE_KEY_SALT', 'S2!*vni*-8Cyzpu?{SKgYd#*/#0h9A?]#h+s.f4oL}2XC5Hl@|dFXf/#tll@G_Q_' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
