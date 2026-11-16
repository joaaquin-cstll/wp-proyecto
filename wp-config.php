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
define( 'DB_NAME', 'wp' );

/** Database username */
define( 'DB_USER', 'wpuser' );

/** Database password */
define( 'DB_PASSWORD', 'wpuser' );

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
define( 'AUTH_KEY',         'rxxnEZ?t;E[q3R?R@!Kr60k3;cQ0C2R8}0dPTXv0:;=6%1FIklUHYkE6MKDNW}U{' );
define( 'SECURE_AUTH_KEY',  'H??6)v6h>;9zr.g2;8fq;ho{zO.smRZD#|,ex>MIF/clTe$_vlm8]tpcYM_#WJ,%' );
define( 'LOGGED_IN_KEY',    'IM0<8a=dU1OqO7{L?w{tLIHZIv+CXDPHv:^WF}$vQ3+onX{!:VUd@LfzT=S/AZMq' );
define( 'NONCE_KEY',        'c;C,NtS#F&r~Uag.mc=p;wF;Fttiun|.]{1k(OEkA;tgBacK,0Ww$O_AB<4Y7yx;' );
define( 'AUTH_SALT',        '{:cGf%!B*r6oKTA%aE4}zA$p9T?<?CNx1%T!3]vosw2D8o1O|2cToL_yJd/7oW?U' );
define( 'SECURE_AUTH_SALT', 'IJ6B#+;mJ?R4Rr_>6oxsyk.%KR*c8%G+WV>rMXn[1<]N^>A%*@_l3*t5h;m=Ar4w' );
define( 'LOGGED_IN_SALT',   '@<%h,/9$|{&pc01w.E1hFx8[p:rLSwMF^0>sAM[@X:A+<i^oN:?K>zM4LtDCqHVy' );
define( 'NONCE_SALT',       'A.M)uA~V?n:!5d9@F%z%6&I8N@2P!]>~B%[HK9$a!=!fA!-oODjjn~5YD_e^Q{eV' );

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
define( 'WP_DEBUG_LOG', true );      // escribe en wp-content/debug.log
define( 'WP_DEBUG_DISPLAY', false ); // no muestra errores en pantalla
@ini_set( 'display_errors', 0 );

/* Add any custom values between this line and the "stop editing" line. */

/* URL del sitio según el host con el que se accede (evita romper el sitio si cambia la IP). */
$barracuda_host   = isset( $_SERVER['HTTP_HOST'] ) ? preg_replace( '/[^a-zA-Z0-9.\-:]/', '', $_SERVER['HTTP_HOST'] ) : '54.167.77.34';
$barracuda_scheme = ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' ) ? 'https' : 'http';
define( 'WP_HOME', $barracuda_scheme . '://' . $barracuda_host );
define( 'WP_SITEURL', $barracuda_scheme . '://' . $barracuda_host );




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
