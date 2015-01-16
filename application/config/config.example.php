<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set("display_errors", 1);

/**
 * Configuration for: Project URL
 * Put your URL here, for local development "127.0.0.1" or "localhost" (plus sub-folder) is fine
 */
define('URL', 'http://example.com/Website/');
 
/**
 * Configuration for: Number of shown News
 * on the main-page
 */
define('NEWS_COUNT', 3);
 
/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'mjs-2014');
define('DB_USER', 'root');
define('DB_PASS', '');

/**
 * Base Path
 */
define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../'));
define('LIBS_PATH', realpath(APPLICATION_PATH . '/libs/'));