<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'  => 'Mysql',
        'host'     => 'localhost',
        'username' => 'root',
        'password' => 'helinfeng',
        'dbname'   => 'phalcon',
        'charset'  => 'utf8',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../controllers/',
        'modelsDir' => __DIR__ . '/../models/entities',
        'viewsDir' => __DIR__ . '/../views/',
        'baseUri' => '/wechat2/'
    )
));
