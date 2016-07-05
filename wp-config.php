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
define('DB_NAME', 'healgvnf_wp766');

/** MySQL database username */
define('DB_USER', 'healgvnf_wp766');

/** MySQL database password */
define('DB_PASSWORD', 'S233[g2U(P');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'l4zdmwq5xcvp37cchjilud4ptdhaauwnuxltzutstadp2pedx9rvnrbuss4znehf');
define('SECURE_AUTH_KEY',  'tlor0xmx5qbv2bzfkry4fok1timnirszhyoyag6yxqmeqmnvioopk8zhqseluc8h');
define('LOGGED_IN_KEY',    'ra8hifnouuji0ez9oqxz5rr12rivvwkaovcpm67tnwlvepma86icqygifl0snynx');
define('NONCE_KEY',        '7lwjk752nzr0opq5wls83h3aiiyfj47v81uqzx2jk3ja41go9i58qqto6bqoxoxx');
define('AUTH_SALT',        'robfhs4tbwsjbvx60qz64jdejvquagf5qhl0vm2ddhng0aetjm6ndmodwlvmuskv');
define('SECURE_AUTH_SALT', 'mpekicokyof9wfubbytlrqusnuscuk28q82xdxioxwob8ahtfvnmzskxxq4mdrre');
define('LOGGED_IN_SALT',   '2b5x25fmkbmtcu9belflzxtspeazfaslorl1nmwgqlezpina8utlv7jpq7e38i4j');
define('NONCE_SALT',       'kzgfkpx48udjvrgig4xxjrbjm9tjctkejt0gtpnc1xxur0tc1n2qauzzcyh6unjw');

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
