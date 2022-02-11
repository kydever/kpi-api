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

use App\Model\Classify;
use Hyperf\DbConnection\Db;
use Hyperf\Utils\Collection;

class ClassifyDao extends Dao
{
    public function findById(int $id): ?Classify
    {
        return Classify::find($id);
    }

    public function createOrUpdate(int $userId, array $attributes, int $id = 0): Classify
    {
        $this->isLeader($userId);
        $model = $this->findById($id);
        if (empty($model)) {
            $model = new Classify();
        }
        $model->type = $attributes['type'];
        $model->name = $attributes['name'] ?? null;
        $model->grade = $attributes['grade'];
        $model->save();

        return $model;
    }

    public function delete(int $userId, int $id): bool
    {
        $this->isLeader($userId);
        $model = $this->findById($id);
        if (empty($model)) {
            return true;
        }
        Db::transaction(function () use ($model, $id) {
            $model->delete();
            Db::select('delete from `dimensions` where `classify_id` = ?', [$id]);
        });

        return true;
    }

    public function all(int $userId): Collection
    {
        $this->isLeader($userId);

        return Classify::orderByDesc('id')->get();
    }
}
