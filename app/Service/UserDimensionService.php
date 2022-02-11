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
namespace App\Service;

use App\Service\Dao\UserDimensionDao;
use Han\Utils\Service;
use Hyperf\Di\Annotation\Inject;

class UserDimensionService extends Service
{
    #[Inject]
    protected UserDimensionDao $dao;

    public function getWhereByUserId(int $currentUserId, ?string $review, int $offset = 0, int $limit = 10, array $columns = ['*'])
    {
        return $this->dao->getWhereByUserId($currentUserId, $review, $offset, $limit, $columns);
    }
}
