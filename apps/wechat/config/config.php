<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'  => 'Mysql',
        'host'     => 'localhost',
        'username' => 'xx',
        'password' => 'xx',
        'dbname'   => 'xx',
        'charset'  => 'utf8',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../controllers/',
        'modelsDir' => __DIR__ . '/../models/',
        'viewsDir' => __DIR__ . '/../views/',
        'baseUri' => '/wechat2/'
    ),
//    'default' => array(
//        'token'          => 'xx',
//        'encodingaeskey' => 'xx',
//        'appid'          => 'xx',
//        'appsecret'      => 'xx',
//        'debug'          => false,
//        'logcallback'    => false,
//    )
));
