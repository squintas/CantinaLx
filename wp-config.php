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
define( 'DB_NAME', 'wpcantinalx' );

/** MySQL database username */
define( 'DB_USER', 'wpcantinalx' );

/** MySQL database password */
define( 'DB_PASSWORD', 'presunto1' );

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
define( 'AUTH_KEY',         '0@w}5kAZFdFgG:)ZDUQmht3SYC:p~tDJEC>@c<MwvESR9:n bt}#l)YIo.9e7V}y' );
define( 'SECURE_AUTH_KEY',  'opJ@:-xkV)rpYdK=[,i`u0l34pA<%cG8}JrD0<-&p;;fZ0KD_ U}OPYR9A2%IKT:' );
define( 'LOGGED_IN_KEY',    '<0EKn]6X0^sV>NxqoP,Brh.?Ij`DsYAITi6MXG358fv^`Is`+@q[xcz+}gC_=dR!' );
define( 'NONCE_KEY',        'B)3 A#5R02QFO?Cg?%NU|E8s6tU15brN=`0)SeFw8PnhpLg}C}{aj%+jsDxNp5w(' );
define( 'AUTH_SALT',        'bw),|6^wSi_JB#e$@&!I1#^ChrHn[?QNVfcK(ZGMsKV9)v[A K,Wf&n_nx||?.=N' );
define( 'SECURE_AUTH_SALT', '@5.hl(zhmgTFr8-pI/[i$l9=*K|WuqDTV32 ),98STW2$vWW6<&=>.?mE+7R2:Mr' );
define( 'LOGGED_IN_SALT',   'MRAH-wCokF~epk*S3gjGC2(+,m0t`8>+,ju7T_4QiKGAw=MzxA754m 0se~;e}0L' );
define( 'NONCE_SALT',       'w7]Nhpgx8@lW|N;A{1E8#b-=Me.s*U$ZS;kak]d=c~pjVxx(2W8}U<3/smHLN$E$' );

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

// SQ Comentei a linha 84 para desativar WARNING. 


// define( 'WP_DEBUG', false );

ini_set('log_errors','On');
ini_set('display_errors','Off');
ini_set('error_reporting', E_ERROR );
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
