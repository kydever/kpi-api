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
namespace App\Controller;

use App\Request\DimensionRequest;
use App\Service\DimensionService;
use App\Service\Formatter\DimensionFormatter;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class DimensionController extends Controller
{
    #[Inject]
    protected DimensionService $service;

    #[Inject]
    protected DimensionFormatter $formatter;

    public function index(RequestInterface $request, ResponseInterface $response)
    {
        return $response->raw('Hello Hyperf!');
    }

    public function store(DimensionRequest $request)
    {
        $model = $this->service->createOrUpdate($this->getCurrentUserId(), $request->all());

        return $this->response->success($this->formatter->base($model));
    }
}
