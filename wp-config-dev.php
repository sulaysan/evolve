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
define('DB_NAME', 'evolve_dev');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         't.V?~j,^y^mQkTvYbP<kr:c>Q.{AqE_L<Fe#nBR3y:y3PQQ+[P_B#+G*Q+p%D$lF');
define('SECURE_AUTH_KEY',  '>rpZ@l@vi#}K*7*Y0Zrqc.n[,} w{EVx=cVL1/zoC/24nE~)y&(Wy!+Hoy4!}XT&');
define('LOGGED_IN_KEY',    'Pq<[<_s*aUb&LSVoTlFFaR(Umg~F.a#_jPCgC+JE&O^`rR*g[xhh+5tTSB<yP0X^');
define('NONCE_KEY',        '~Xz`7GqaRSOxG.GuiQ GzyV-F }c]VTgLeC:r0@cg/%)$^j;#kuXS6K^tyF]_:ce');
define('AUTH_SALT',        'Q_c~x5c)@J@z|3N{W)~_.UsRxJpqKqT+v[PET~BS{@]{ui3iP<=h0_A=1U:C<xse');
define('SECURE_AUTH_SALT', 'Jl3h/##6IY=(HDDtcvQ1I0&a}AlwDzx&FZbjPb|+na^{wWX00/=:p]e)RoKNiN5g');
define('LOGGED_IN_SALT',   'L)w0I|2J=/DjLFm0E<.s/IfD$bo/Ktrv3N y@b}rgPZ.f LB)aPtv+{B85%6.h!q');
define('NONCE_SALT',       'Q6s405RlX]o;%wZ?sWl{OC!8OLd[H#.Dw=|O 4Ju?q@W?:B>jao@6[Fg[FBy>Ik$');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpvx_';

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
define('WP_DEBUG', false);
//define( 'WC_REMOVE_ALL_DATA', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
