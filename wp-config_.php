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
define('AUTH_KEY',         'srqyzg2ryayagy4tqjsm7capm2n1btmcpjdanbnmevuo5qs86edwjq2fdbioj1ba');
define('SECURE_AUTH_KEY',  'iiydpy6szfh72yadv8ltd1jahryhienjuzi3htqugl9wblwxirxmjbkdnwe0vbmn');
define('LOGGED_IN_KEY',    'cpi3vdoakqd2tcr169uxxjhb3lso9rwp9okwjfodbvtvicxdklrsjhhhvdckpqlt');
define('NONCE_KEY',        '1s7pd20gpw8vkdlelut8pdsjy1irmfi4ugngu0rkao7ur6gfurkwfjfxtgbyhxmv');
define('AUTH_SALT',        'wsgcu2vebqxy2czkmlyndxj88wlmrau9yosznlytca33ikkn3amqba8mdtc4tydc');
define('SECURE_AUTH_SALT', 'ugcgeojyojrzb7ojtknsw3bi00tuv72fq3qhyfgvc860gpilazgjwfpuge8e8bov');
define('LOGGED_IN_SALT',   'dnqxezgk85ynwzk15pwkvhljbzv4tr6zkmtghusvjxbjxh6k1guhhkhrhilml6r4');
define('NONCE_SALT',       '7o1bqjoaxu7dyghkfrm6dg2cucshvi7xmyjzueivvhhbb5elhvgbciipeiyuqwrf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpu4_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
