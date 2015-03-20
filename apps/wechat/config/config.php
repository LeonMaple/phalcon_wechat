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
        'modelsDir' => __DIR__ . '/../models/',
        'viewsDir' => __DIR__ . '/../views/',
        'baseUri' => '/wechat2/'
    ),
//    'default' => array(
//        'token'          => 'weixin',
//        'encodingaeskey' => '7KwhE0lujwKp6QlqFa8MAjicMJwMbandxwV4FByJOEu',
//        'appid'          => 'wxdeed10a72a696a11',
//        'appsecret'      => '958fb87facfd51760457fb66a08feaae',
//        'debug'          => false,
//        'logcallback'    => false,
//    )
));
