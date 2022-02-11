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
use App\Request\PaginationRequest;
use App\Service\DimensionService;
use App\Service\Formatter\DimensionFormatter;
use Hyperf\Di\Annotation\Inject;

class DimensionController extends Controller
{
    #[Inject]
    protected DimensionService $service;

    #[Inject]
    protected DimensionFormatter $formatter;

    public function index(PaginationRequest $page)
    {
        $review = $this->request->input('review');
        [ $count, $items ] = $this->service->getWhereByAll($this->getCurrentUserId(), $review, $page->offset(), $page->limit());

        return $this->response->success([
            'count' => $count,
            'items' => $items,
        ]);
    }

    public function store(DimensionRequest $request)
    {
        $model = $this->service->createOrUpdate($this->getCurrentUserId(), $request->all());

        return $this->response->success($this->formatter->base($model));
    }

    public function update(DimensionRequest $request, int $id)
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
