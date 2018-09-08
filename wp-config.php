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
define('DB_NAME', 'newves');

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
define('AUTH_KEY',         'C6Xx,Wl[!dggb~$O@e3sp!8XhUM@31cKhz] Aa,u]H!H[[nKDQtzrA%0a<rbuEx?');
define('SECURE_AUTH_KEY',  '%/=>p_0_ :-5H|0Qr~ky]i2-;X@,;ro{<s#9Q~dy.$tvb3,X-rL3C@s(yWfe&~ZV');
define('LOGGED_IN_KEY',    '|e:Xqy{[n.l`+z55z/e_*K(F*UDcO9adHTy1?+n``_EFZdItNhI7QD8u,)739,Zu');
define('NONCE_KEY',        'T,7`DGtIwwC`kW97<tF/Z{Y{;{Sv}>iz@}?fWc46C#mdLgbTM!k^s9x^ag$>Rw0A');
define('AUTH_SALT',        '=/kql[!P5~lnY[YPJ<QKOJY~8i@#KpAe:6||b0IbEcLSR3hXhdv.8=3zd/ 6Q-En');
define('SECURE_AUTH_SALT', 'Vp?f6lA3u C#%w`D$Izc`@znSf={8-3*?mP{giV,MSOst.Hqq:7AWIh*z4B#zV]_');
define('LOGGED_IN_SALT',   'c6:}`1hY|Gj,:&YU6WKV>v7H^6n^TK,=Ip<=;t2eB?_5QE1mf c)3sVks,R[q-@*');
define('NONCE_SALT',       '%7]#tfw~iR]0k3gt-.NG-N6y4Yn6JmqF6~H<Rr]AzE{s*b`QsdgZKxr_`Olco1gw');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
