<?php

use Phalcon\Loader;

$loader = new Loader();
$loader->registerNamespaces(
    array(
// ARCH DO NOT REMOVE THIS LINE
'Wechat2\Admin\Controllers'   => __DIR__ . '/../apps/admin/controllers/',
'Wechat2\Admin\Models'        => __DIR__ . '/../apps/admin/models/',
'Wechat2\Web\Controllers'     => __DIR__ . '/../apps/web/controllers/',
'Wechat2\Web\Models'          => __DIR__ . '/../apps/web/models/',
'Wechat2\Web\Models\Entities' => __DIR__ . '/../apps/web/models/entities',
'Wechat2\Web\Services'        => __DIR__ . '/../apps/web/services/',
'Wechat2\Wechat\Controllers'  => __DIR__ . '/../apps/wechat/controllers/',
'Wechat2\Wechat\Models'       => __DIR__ . '/../apps/wechat/models/',
'Wechat2\Mobile\Controllers'  => __DIR__ . '/../apps/mobile/controllers/',
'Wechat2\Mobile\Models'       => __DIR__ . '/../apps/mobile/models/',
)
);
$loader->register();