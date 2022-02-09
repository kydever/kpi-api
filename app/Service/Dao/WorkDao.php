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

use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use App\Model\Work;
use Han\Utils\Service;

class WorkDao extends Service
{
    public function findById(int $id): ?Work
    {
        return Work::find($id);
    }

    public function createOrUpdate(int $userId, array $attributes, int $id = 0): Work
    {
        $this->isLoader($userId);
        $model = $this->findById($id);
        if (empty($model)) {
            $model = new Work();
        }
        $model->name = $attributes['name'];
        $model->grade = $attributes['grade'];
        $model->save();

        return $model;
    }

    public function delete(int $userId, int $id): bool
    {
        $this->isLoader($userId);
        $model = $this->findById($id);
        if (empty($model)) {
            return true;
        }
        $model->delete();

        return true;
    }

    protected function isLoader(int $userId): bool
    {
        if (! di(UserDao::class)->isLeader($userId)) {
            throw new BusinessException(ErrorCode::OPERATION_INVALID);
        }

        return true;
    }
}
