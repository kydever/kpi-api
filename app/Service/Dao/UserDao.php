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
namespace App\Service\Dao;

use App\Model\User;
use Han\Utils\Service;

class UserDao extends Service
{
    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    public function isLeader(int $id): bool
    {
        $model = $this->findById($id);

        return (bool) $model?->is_leader;
    }
}
