<?php
namespace App;

use App\Core\AbstractApplication;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\JsonConfig;
use Cake\Core\Configure\Engine\PhpConfig;
use Exception;
use RuntimeException;
use Slim\Factory\AppFactory;
use Slim\App as SlimApp;

class Application extends AbstractApplication
{
    private SlimApp $app;

    public function __construct(SlimApp $app)
    {
        $this->initialize();

        $app = $this->registerRoutes($app);
        $app = $this->registerMiddleware($app);

        //$app->add(SessionMiddleware::class);
        $this->app = $app;
    }

    /**
     * Startup Application
     *
     * @return SlimApp
     * @throws RuntimeException
     */
    public static function startup() : SlimApp
    {
        return (new Application(AppFactory::create()))->getApp();
    }

    /**
     * Register routes
     *
     * Registers routes from config/routes.php
     *
     * @param SlimApp $app
     * @return SlimApp
     */
    private function registerRoutes(SlimApp $app): SlimApp
    {
        $routes = [];

        if (!file_exists(CONFIG . 'routes.php')) {
            throw new Exception('Routes not found.');
        }

        /** @var Closure $routes */
        $routes = require_once CONFIG . 'routes.php';
        $app = $routes($app);

        return $app;
    }

    public function getApp() : SlimApp
    {
        return $this->app;
    }

    protected function initializeConfig() : void
    {
        try {
            Configure::config('default', new PhpConfig());
            Configure::load('app', 'default', false);

            Configure::config('default', new JsonConfig(DATA));
        } catch (Exception $e) {
            exit($e->getMessage() . "\n");
        }
    }

    private function registerMiddleware(SlimApp $app): SlimApp
    {
        //$app->add(RoutesLoaderMiddleware::class);
        return $app;
    }
}
