<?php

/**
 * Register application modules
 */
$application->registerModules(
    array(
    // ARCH DO NOT REMOVE THIS LINE
    'admin' => array(
        'className' => 'Wechat2\Admin\Module',
        'path' => __DIR__ . '/../apps/admin/Module.php'
    ),
    'web' => array(
        'className' => 'Wechat2\Web\Module',
        'path' => __DIR__ . '/../apps/web/Module.php'
    ),
    'wechat' => array(
        'className' => 'Wechat2\Wechat\Module',
        'path' => __DIR__ . '/../apps/wechat/Module.php'
    ),
    'mobile' => array(
        'className' => 'Wechat2\Mobile\Module',
        'path' => __DIR__ . '/../apps/mobile/Module.php'
    ),
)
);
