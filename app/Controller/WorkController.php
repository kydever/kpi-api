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

use App\Request\WorkRequest;
use App\Service\Formatter\WorkFormatter;
use App\Service\WorkService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class WorkController extends Controller
{
    #[Inject]
    protected WorkService $service;

    #[Inject]
    protected WorkFormatter $formatter;

    public function index(RequestInterface $request, ResponseInterface $response)
    {
        return $response->raw('Hello Hyperf!');
    }

    public function store(WorkRequest $request)
    {
        $model = $this->service->createOrUpdate($this->getCurrentUserId(), $request->all());

        return $this->response->success($this->formatter->base($model));
    }

    public function update(WorkRequest $request, int $id)
    {
        $model = $this->service->createOrUpdate($this->getCurrentUserId(), $request->all(), $id);

        return $this->response->success($this->formatter->base($model));
    }

    public function destroy(int $id)
    {
        $this->service->delete($this->getCurrentUserId(), $id);

        return $this->response->success(true);
    }
}
