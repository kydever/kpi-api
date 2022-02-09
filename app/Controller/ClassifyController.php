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

use App\Request\ClassifyRequest;
use App\Service\ClassifyService;
use App\Service\Formatter\ClassifyForamtter;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class ClassifyController extends Controller
{
    #[Inject]
    protected ClassifyService $dao;

    #[Inject]
    protected ClassifyForamtter $foramtter;

    public function index(RequestInterface $request, ResponseInterface $response)
    {
        return $response->raw('Hello Hyperf!');
    }

    public function store(ClassifyRequest $request)
    {
        $model = $this->dao->createOrUpdate($this->getCurrentUserId(), $request->all());

        return $this->response->success($this->foramtter->base($model));
    }
}
