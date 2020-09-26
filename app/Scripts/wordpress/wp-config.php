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
define( 'DB_NAME', 'wp_pradig' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'TJsiyr)]7S2aPKtrTpdoRRhkc?:9=tp@6g=0[ErQL}&gkB^vb[:0N]NM;28pY2qo' );
define( 'SECURE_AUTH_KEY',  '&}`zB(Q yi#q%]u4PqkfFUWwZS3UYRxGrec6,8~U~2=>(HXx%SlHxfwpeo{wy/tL' );
define( 'LOGGED_IN_KEY',    '_v`&EQv~z|hR<.]9WJh^+M6<m`S!i8Gwp%b]H{vCRBMp.+JfWI$4,7nE~<AeZT9U' );
define( 'NONCE_KEY',        '$_K(}]7F>}a};o_3ZA9{x}2uD@bjD.&T{+~P0F}f f1r{EW}wUs38P?gTYr4x0xF' );
define( 'AUTH_SALT',        'Z*v5>1Il9S]>(ns-j`G+tIK+}:7Db6!aq 29bA7CdAm1Va)${nR#z9sKiwK tHmE' );
define( 'SECURE_AUTH_SALT', 'E:qR}TPLykx-r=)uMi6Alxax~8lY&6_7R`4<E@,F{LCqeO@$+3AR6sF*mbOQ(XIU' );
define( 'LOGGED_IN_SALT',   '}G!_dSM%F@s@.CH/J9L0]YatFe8xg ~Osvv)a{vhb10}9o7wI6WM:2.^{Ss9cM] ' );
define( 'NONCE_SALT',       'cv~b8_>!!FR1)`eL5w0Q^nD:+js-t2l#A/nGz`_a|mz5))4X/fw32QUwL:Jurd>-' );

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
