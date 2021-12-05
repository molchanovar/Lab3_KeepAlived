<?php
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
define( 'DB_NAME', 'wp' );

/** MySQL database username */
define( 'DB_USER', 'wpuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Super1_wp' );

/** MySQL hostname */
define( 'DB_HOST', '192.168.1.16' );

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
define('AUTH_KEY',         ' -[H+r-0<:|3Sh,kYLCX1)=kqhaZYO|@Uf:lD`&+J&PxHuwW7cE&i{6SU:_K.|k!');
define('SECURE_AUTH_KEY',  'dS&n4^q|V;)bZ|Aq7}fjNOdE+_J=l>{xH,Ksd[Z`Sm>T_ u {{i^aO+LK)|79 dX');
define('LOGGED_IN_KEY',    'cmjF+54v+ k.+ZrVa@km,0srww~5dHI5VMY-&U!P4(ryokKYPb6iHW[R!@YK?:or');
define('NONCE_KEY',        '67PFo+49hwnN(U{ADC*:KT8-7UDEfAI^&k`G|tP(0-Ms/u9/xaCC%T}Rus=z4HsZ');
define('AUTH_SALT',        'nHDfupXt/cr#D:pquVnj$c-$ZdyA!|nM.{g/pAKS#!_jz#8NT_#[r)i!}-,m*xJ2');
define('SECURE_AUTH_SALT', 'O<Wb9H*>Tl3PfC+i7i)Xr.C?1V#XQ9[#ZQ6rgR: V,GnZR7F^9,{.tE)>-=aZ~kp');
define('LOGGED_IN_SALT',   'VoHiWQpo,ymkMA@?QEB[n>OZuW;b7+uHs&?8[-h)$r|E3L2GbrSiPL&Y5[ z6fdH');
define('NONCE_SALT',       'R|<e7{2Dr`z@DvNwn<{Z9Aw{|_{Yg`FQ>/t^hn-&R|5q6tpNsny!fuqk{EZ>)X2o');

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';