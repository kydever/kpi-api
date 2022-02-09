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
use App\Model\Classify;
use Han\Utils\Service;

class ClassifyDao extends Service
{
    public function findById(int $id): ?Classify
    {
        return Classify::find($id);
    }

    public function createOrUpdate(int $userId, array $attributes, int $id = 0): Classify
    {
        $this->isLoader($userId);
        $model = $this->findById($id);
        if (empty($model)) {
            $model = new Classify();
        }
        $model->work_id = $attributes['work_id'];
        $model->name = $attributes['name'];
        $model->grade = $attributes['grade'];
        $model->save();

        return $model;
    }

    protected function isLoader(int $userId): bool
    {
        if (! di(UserDao::class)->isLeader($userId)) {
            throw new BusinessException(ErrorCode::OPERATION_INVALID);
        }

        return true;
    }
}
