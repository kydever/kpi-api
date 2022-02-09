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

use App\Service\Dao\WorkDao;
use Han\Utils\Service;
use Hyperf\Di\Annotation\Inject;

class WorkService extends Service
{
    #[Inject]
    protected WorkDao $dao;

    public function createOrUpdate(int $currentUserId, array $attributes, int $id = 0)
    {
        return $this->dao->createOrUpdate($currentUserId, $attributes, $id);
    }

    public function delete(int $userId, int $id)
    {
        return $this->dao->delete($userId, $id);
    }
}
