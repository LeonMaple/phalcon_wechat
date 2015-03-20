<?php

namespace Wechat2\Admin;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Logger, Phalcon\Db\Adapter\Pdo\Mysql as Connection, Phalcon\Events\Manager as EventsManager;


class Module implements ModuleDefinitionInterface
{

    /**
     * Registers the module auto-loader
     */
    public function registerAutoloaders()
    {
    }

    /**
     * Registers the module-only services
     *
     * @param Phalcon\DI $di
     */
    public function registerServices($di)
    {
        $di['logger']->log('Register service for module Admin');
        /**
         * Read configuration
         */
        $config = include __DIR__ . "/config/config.php";

        /**
         * Setting up the view component
         */
        $di->set('view', function () use (&$di) {
//            $logger = $di['logger'];
//            $logger->log('Create view service for module Admin');

            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');

            //Create an events manager
//            $eventsManager = new EventsManager();
//            //Attach a listener for type "view"
//            $eventsManager->attach(
//                'view',
//                function ($event, $view) use( &$logger) {
//                    $logger->log(
//                        $event->getType() .
//                        ' - ' .
//                        $view->getActiveRenderPath() .
//                        PHP_EOL
//                    );
//                }
//            );
//            //Bind the eventsManager to the view component
//            $view->setEventsManager($eventsManager);
            return $view;
        }, true);

        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $di['db'] = function () use ($config, &$di) {
//            $logger = $di['logger'];
//            $logger->log('Create database service for module Admin');
//            $eventsManager = new EventsManager();
//
//
//            //Listen all the database events
//            $eventsManager->attach(
//                'db',
//                function ($event, Connection $connection) use ($logger) {
//                    $logger->log('DB event ' . $event->getType());
//                    if ($event->getType() == 'beforeQuery') {
//                        $logger->log(
//                            $connection->getSQLStatement(),
//                            Logger::INFO
//                        );
//                    }
//                }
//            );

            $adaptor =  new DbAdapter(array(
                "host" => $config->database->host,
                "username" => $config->database->username,
                "password" => $config->database->password,
                "dbname" => $config->database->dbname,
                "charset" => $config->database->charset
            ));

//            $adaptor->setEventsManager($eventsManager);
            return $adaptor;
        };

        /**
         * AUTOMATIC GENERATED START
         */

        /**
         * AUTOMATIC GENERATED END
         */
    }
}
