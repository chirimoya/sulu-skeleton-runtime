<?php

/*
 * This file is part of Sulu.
 *
 * (c) Sulu GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use App\Kernel;
use Sulu\Component\HttpKernel\SuluKernel;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function (array $context) {
    $kernel = new Kernel($context['APP_ENV'], (bool)$context['APP_DEBUG'], SuluKernel::CONTEXT_WEBSITE);

    // Comment this line if you want to use the "varnish" http
    // caching strategy. See http://sulu.readthedocs.org/en/latest/cookbook/caching-with-varnish.html
    if ('dev' !== $context['APP_ENV']) {
        $kernel = $kernel->getHttpCache();
    }

    return $kernel;
};