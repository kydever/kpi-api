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

use App\Request\PaginationRequest;
use App\Service\UserDimensionService;
use Hyperf\Di\Annotation\Inject;

class UserDimensionController extends Controller
{
    #[Inject]
    protected UserDimensionService $service;

    public function index(PaginationRequest $request)
    {
        $review = $this->request->input('review');
        [ $count, $items ] = $this->service->getWhereByUserId($this->getCurrentUserId(), $review, $request->offset(), $request->limit());

        return $this->response->success([
            'count' => $count,
            'items' => $items,
        ]);
    }
}
