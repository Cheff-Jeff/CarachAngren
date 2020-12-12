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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cheffjeff_nlcarachangren' );

/** MySQL database username */
define( 'DB_USER', 'cheffjeff_nlcarachangren' );

/** MySQL database password */
define( 'DB_PASSWORD', 'carachangren#data' );

/** MySQL hostname */
define( 'DB_HOST', 'cheffjeff.nl.mysql' );

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
define( 'AUTH_KEY',         'B3l@hPk6T%fVKOVAL-edyTn&s`VMQf@tAj&}O>vULKd8s]^t-8e6V0J$L{LuHXX*' );
define( 'SECURE_AUTH_KEY',  ';7TT F:vq{JYtAV1<1uj8bPQ{POl9}AAO3XK|j>w/,S7<nnz5z//j*:%h1q#3N$*' );
define( 'LOGGED_IN_KEY',    '*-#OBZU`Dt(9b0.h264lte(q7ehc(7nwiU$l_WEO89/e!5l?q{ 8<a .-uS0i)sU' );
define( 'NONCE_KEY',        'KPa_3oIDGgWD7ADeU/U.KUHh?0|X!s{ABe?m0EOangFETfC};Y85MLG_Le@2l^<n' );
define( 'AUTH_SALT',        'f3a+(NHF1<av*b.f*-,)^|~u_p^CyXcRTy@v/DRNn#|J! G@65Bb>o5a(By{X@eV' );
define( 'SECURE_AUTH_SALT', 'bH[:O:rNfj.N[B/9`C^r!rj5o6G%52Yt/ed2Ina~prUW}!(#Sm5$rRh2n~@:@>U`' );
define( 'LOGGED_IN_SALT',   'KS;!ewMc~OhqHu!Hxe4|jB^hXYulP_Se^LHVd{),Pq&NT_gNDMhiL * a4ql1J`(' );
define( 'NONCE_SALT',       'uVRyUCn2nbGf&{5HEs~B|48M m65rZ%NJCv[0H7)S[:kr2PP>UrA[o35YA8eTojc' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
