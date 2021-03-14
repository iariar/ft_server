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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'pma' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'GPTnQct@bhXJ4@vL3C4KXv[=2)bJnXM se1?)i#vzH{2zHj{*c#v.7Br_?:0^F/`');
define('SECURE_AUTH_KEY',  'YWQtq|2z<-~>b+7V<yOo6ckm%OE=Y4f4]sagz@8*VQ]_!GRJePS%*#6 -1kP-evc');
define('LOGGED_IN_KEY',    '+8Lh{Ny|ifHZ`1q5,-*E*]eb^Nc-gEj}R^C/P-vfOP<&rr~J+WEP?O<d:QN&{RgZ');
define('NONCE_KEY',        '/G&-FC04slBT)I-!#1t-^C3@RYf|I$V+V,4Dg9)FtW^pBj!Qps@Urw?z3#Mm:2AV');
define('AUTH_SALT',        '{?3~!KsLuA+Ub+$x1>z6k!:JhN9t7q~8B+rnPaq|D^4.|.-0[36JfzbnU8.&(=^)');
define('SECURE_AUTH_SALT', '1}CC5FJh8>LBrQKf_*Ol+WT;V7:CTO-|cTW~y` G8}c)n5Y2C5JAxMM!<+U!/?kc');
define('LOGGED_IN_SALT',   '@TCuz!$rdH1xyQ ciD)#74+Q(BZ3.Dn*cmdN$b*)[w1ZX9eF_Wem{!9i}iW@X=xW');
define('NONCE_SALT',       '{k@trBe[`{+PQvzd5K#YB6in-fG+)xklt;bF1hxN_I|U-1Fn7Pz8>E;mT<1iGf24');

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
