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
use App\Model\Dimension;
use App\Service\Formatter\DimensionFormatter;
use Hyperf\Di\Annotation\Inject;

class DimensionDao extends Dao
{
    #[Inject]
    protected DimensionFormatter $formatter;

    public function findById(int $id): ?Dimension
    {
        return Dimension::find($id);
    }

    public function createOrUpdate(int $userId, array $attributes, int $id = 0): Dimension
    {
        $this->isLeader($userId);
        $model = $this->findById($id);
        if (empty($model)) {
            $model = new Dimension();
            $model->leader_id = $userId;
        }
        if (! $model->own($userId)) {
            throw new BusinessException(ErrorCode::OPERATION_INVALID);
        }
        $model->classify_id = $attributes['classify_id'];
        $model->review = $attributes['review'];
        $model->score = $attributes['score'];
        $model->review_description = $attributes['review_description'] ?? null;
        $model->user_id = $attributes['user_id'];
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
        if (! $model->own($userId)) {
            throw new BusinessException(ErrorCode::OPERATION_INVALID);
        }
        $model->delete();

        return true;
    }

    public function getWhereByAll(int $userId, ?string $review, int $offset = 0, int $limit = 10, array $columns = ['*']): array
    {
        $this->isLeader($userId);
        $builder = Dimension::where('leader_id', $userId)
            ->where('review', 'like', '%' . $review . '%')
            ->orderBy('id', 'desc');

        [ $count, $models ] = $this->factory->model->pagination($builder, $offset, $limit, $columns);
        $items = $this->formatter->formatList($models);

        return [$count, $items];
    }
}
