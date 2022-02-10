<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController::index');

Router::post('/works', [App\Controller\WorkController::class, 'store']);
Router::patch('/works/{id:\d+}', [App\Controller\WorkController::class, 'update']);
Router::delete('/works/{id:\d+}', [App\Controller\WorkController::class, 'destroy']);
Router::post('/classifies', [App\Controller\ClassifyController::class, 'store']);
Router::patch('/classifies/{id:\d+}', [App\Controller\ClassifyController::class, 'update']);
