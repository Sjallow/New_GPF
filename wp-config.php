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
define( 'DB_NAME', 'new_gpf' );

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
define( 'AUTH_KEY',         '63FGS(`5!=au%</r%b-v ?m[0t{F@7+3w k/+;409~ez3a?d42@Wwncr=7wUZM.h' );
define( 'SECURE_AUTH_KEY',  'Ov~6g}o=8YpkBp0+8|![5o>sSU*R$X83TXr$s<1=Wk _f*s9)5Yyu)f7ydb1qq*d' );
define( 'LOGGED_IN_KEY',    'Avc=|<rR+(P>[g#=]J+/gZ,Xlz.}u8Z(5LfXu1cASTVNP70IlU&>!L<:[,4Vr]g+' );
define( 'NONCE_KEY',        '<&b,}.!I HsyD7~hGn75Ck#$w0d>Sv2xe1gsWXg1O3c</CF`U }c=]f@~wt{gVSJ' );
define( 'AUTH_SALT',        'DB)V_ Z(0I,]o&nqIFo0=z`%m3L!=5YN@Ba}>B`[a5IH%? TW%C|t21h)E<GZNI ' );
define( 'SECURE_AUTH_SALT', '*$OsS}itoEiJUGkM[w>e`e=8pd/Z+RL~Q$LArP#iE{5Dqw}Y-X`q[1Ow1:Q#GS*e' );
define( 'LOGGED_IN_SALT',   '(XZw]Q%~N94+!;;co6SG$+f&mLAdMaS;hIKL2hy-mQi6NH^7Il{L}l; hov&mm-(' );
define( 'NONCE_SALT',       'j[zd:3pgA%+3PiP-{PF*8/4=$HQcB:RYJ}hI46}oyB;8[PS1bxQ[#|@U7piq];m-' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
