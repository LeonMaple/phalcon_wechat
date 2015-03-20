<?php

return new \Phalcon\Config(
    array(
        'database'    => array(
            'adapter'  => 'Mysql',
            'host'     => '192.168.2.102',
            'username' => 'wechat_dev',
            'password' => 'edu123',
            'dbname'   => 'wechat2_dev',
            'charset'  => 'utf8',
        ),
        'application' => array(
            'controllersDir' => __DIR__ . '/../controllers/',
            'modelsDir'      => __DIR__ . '/../models/',
            'viewsDir'       => __DIR__ . '/../views/',
            'baseUri'        => '/wechat2/'
        )
    )
);
