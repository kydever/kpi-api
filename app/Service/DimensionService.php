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

use App\Service\Dao\DimensionDao;
use Han\Utils\Service;
use Hyperf\Di\Annotation\Inject;

class DimensionService extends Service
{
    #[Inject]
    protected DimensionDao $dao;

    public function createOrUpdate(int $currentUserId, array $attributes, int $id = 0)
    {
        return $this->dao->createOrUpdate($currentUserId, $attributes, $id);
    }

    public function delete(int $currentUserId, int $id)
    {
        return $this->dao->delete($currentUserId, $id);
    }

    public function getWhereByAll(int $currentUserId, ?string $review, int $offset = 0, int $limit = 10, array $columns = ['*'])
    {
        return $this->dao->getWhereByAll($currentUserId, $review, $offset, $limit, $columns);
    }
}
