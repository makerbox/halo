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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ACnY+VO1aG66tnGs9FOfw6We/FHPf42fRrKBPdi7KwjjqCPXktc9faAXpK3h+v5xgo6erVeKH4E0K2xJ8frowA==');
define('SECURE_AUTH_KEY',  'y9rUHMLRLDiQ1gaKtJuVXvI58wG9WBl3SFmA0Yb++qol4UDKD2hP/xoYTyNnWYRJfi+D44WH5GAw/S1GrE3Riw==');
define('LOGGED_IN_KEY',    'BWrNdfwqSjsH1XwJFn8MCYLbCU0LhiO1Gh1flavV4tL4Tti+o8awz+zuvS/+gjbY/yHNrcwHd5ChQj1XeC+QiQ==');
define('NONCE_KEY',        'ulitAceCIpSl9mwc687LlFBUsURdag9+kZt1iMgHaGuAfhzpx9LgRnYcK9vXHg7WCPjo9IaPhZfJPPCGAM4F8w==');
define('AUTH_SALT',        'iG4aWtpW7FY8zeWEUbCUT3/DPcnrKaDCS1hM6+zvOtQEWPzqinruF7F+wCP0YSMNrdcJ5+fKdWxIhqOS5VQojQ==');
define('SECURE_AUTH_SALT', 'ztHoziMTSzrcaPUpY+nPPHrExV8u0vRCiyyy6tTNlKO0/kMnbfHm7dh4SvMPpJs7hvJMKWEdWtWm90GpR+ABGg==');
define('LOGGED_IN_SALT',   'h8APRae/UHIWG1lTDA4PI4LM5OMVlPucEis9ojNZhgDmJqiFg4c1ZtiatZm+cb/bXyV8m8jUcJ8RKdWi9Y0xJA==');
define('NONCE_SALT',       'gnOFDesiOk6EPi6/bybh7Q1kmiWkNXy8yhpmnNd63GmPZiV8YdEyGO8PbStt0YL+kpvkmdr7xcZjSwfeXdXQ5w==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
