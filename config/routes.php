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

Router::post('/classifies', [App\Controller\ClassifyController::class, 'store']);
Router::patch('/classifies/{id:\d+}', [App\Controller\ClassifyController::class, 'update']);
Router::delete('/classifies/{id:\d+}', [App\Controller\ClassifyController::class, 'destroy']);

Router::post('/dimensions', [App\Controller\DimensionController::class, 'store']);
Router::patch('/dimensions/{id:\d+}', [App\Controller\DimensionController::class, 'update']);
Router::delete('/dimensions/{id:\d+}', [App\Controller\DimensionController::class, 'destroy']);
