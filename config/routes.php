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

Router::get('/classifies', [App\Controller\ClassifyController::class, 'index']);
Router::post('/classifies', [App\Controller\ClassifyController::class, 'store']);
Router::put('/classifies/{id:\d+}', [App\Controller\ClassifyController::class, 'update']);
Router::delete('/classifies/{id:\d+}', [App\Controller\ClassifyController::class, 'destroy']);

Router::get('/dimensions', [App\Controller\DimensionController::class, 'index']);
Router::post('/dimensions', [App\Controller\DimensionController::class, 'store']);
Router::put('/dimensions/{id:\d+}', [App\Controller\DimensionController::class, 'update']);
Router::delete('/dimensions/{id:\d+}', [App\Controller\DimensionController::class, 'destroy']);

Router::get('/user/dimensions', [App\Controller\UserDimensionController::class, 'index']);
