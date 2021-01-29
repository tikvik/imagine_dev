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
define( 'DB_NAME', 'images' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '4C/+Y)c5ysNa`W9dzP&=U~g,,;D=0o$U/Xt;{!Pr&,! TG;4BpeE<m2iSA:^[2%A' );
define( 'SECURE_AUTH_KEY',  'MgH{7m.q_&t{Vy<Jn<Cy=.hK-zI][i&=$dBARV;DXmses6(o@p-i+:8(:Q~JbDvp' );
define( 'LOGGED_IN_KEY',    '82<]xCSRLiTVU]J}495Yp|kX|w]g6H_!kHUt7Pl$<tc^+,,Z8E*vt*_|7Px$>uZ6' );
define( 'NONCE_KEY',        '_6K51c_].44~45C,Nx__(K.h!)aXHDpdfAA}pF]ju)0ybnl-Nea%>gPqQ3y{fz!u' );
define( 'AUTH_SALT',        'g9PcyPs&7^gE$1r92$}FK9xHpb.daQxvd(W HKH=$.$k66Ir2%pmM21.Y sTwD>3' );
define( 'SECURE_AUTH_SALT', 'ogd-{Y9=IYm-Ifwl{h=Yc@d#<hi]>KeM}3n!,5W3T9GQhw>,Uv;%$~9ik@4RMiwH' );
define( 'LOGGED_IN_SALT',   'iP{HA?g.V00e+bQd%sc$Yf,tJ)bzzTEBZX^E6 (se:niA1 {Rx96nB0kDT1tXI|7' );
define( 'NONCE_SALT',       '%D6~VC,,jd3+ .i*yu&p?18zh3/]0)-{!cHR`,|qwS c%.r5AnURr!qfQzK k4jS' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
