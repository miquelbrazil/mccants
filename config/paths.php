<?php
/*
 * Use the DS to separate the directories in other defines
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

/*
 * The full path to the directory which holds "src", WITHOUT a trailing DS.
 */
define('ROOT', dirname(__DIR__));

/*
 * The actual directory name for the application directory. Normally
 * named 'src'.
 */
const APP_DIR = 'src';

/*
 * Path to the application's directory.
 */
const APP = ROOT . DS . APP_DIR . DS;

/*
 * Path to the config directory.
 */
const CONFIG = ROOT . DS . 'config' . DS;

/*
 * Path to the routes directory.
 */
const ROUTES = CONFIG . DS . 'routes' . DS;

/*
 * Path to the App Data directory
 */
const DATA = ROOT . DS . 'data' . DS;

/*
 * Path to the tests directory.
 */
const TESTS = ROOT . DS . 'tests' . DS;

/*
 * Path to the temporary files directory.
 */
const TMP = ROOT . DS . 'tmp' . DS;

/*
 * Path to the logs directory.
 */
const LOGS = ROOT . DS . 'logs' . DS;

/*
 * Path to the cache files directory. It can be shared between hosts in a multi-server setup.
 */
const CACHE = TMP . 'cache' . DS;

/*
 * Path to the cache files directory. It can be shared between hosts in a multi-server setup.
 */
const TEMPLATES = APP . 'Views';

/*
 * Path to the web root directory.
 */
const WEB_ROOT = ROOT . DS . 'web' . DS;
const WEB_ROOT_ASSETS = ROOT . DS . 'web' . DS . 'assets' . DS;
const WEB_ROOT_DATA = ROOT . DS . 'web' . DS . 'data' . DS;
const REGISTRY = WEB_ROOT_DATA . 'registry' . DS;

/*
 * The absolute path to the "cake" directory, WITHOUT a trailing DS.
 *
 * CakePHP should always be installed with composer, so look there.
 */
const CAKE_CORE_INCLUDE_PATH = ROOT . DS . 'vendor' . DS . 'cakephp' . DS . 'cakephp';

/*
 * Path to the cake directory.
 */
const CORE_PATH = CAKE_CORE_INCLUDE_PATH . DS;
const CAKE = CORE_PATH . 'src' . DS;
