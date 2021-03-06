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

use App\Service\Dao\ClassifyDao;
use Han\Utils\Service;
use Hyperf\Di\Annotation\Inject;

class ClassifyService extends Service
{
    #[Inject]
    protected ClassifyDao $dao;

    public function createOrUpdate(int $currentUserId, array $attributes, int $id = 0)
    {
        return $this->dao->createOrUpdate($currentUserId, $attributes, $id);
    }

    public function delete(int $currentUserId, int $id)
    {
        return $this->dao->delete($currentUserId, $id);
    }

    public function all(int $currentUserId)
    {
        return $this->dao->all($currentUserId);
    }
}
