<?php

declare(strict_types=1);

/*
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once __DIR__.'/../vendor/autoload.php';

$request = Sonata\PageBundle\Request\RequestFactory::createFromGlobals('host_with_path');

$kernel = new AppKernel('prod', false);

$response = $kernel->handle($request);
$response->send();

$kernel->terminate($request, $response);
