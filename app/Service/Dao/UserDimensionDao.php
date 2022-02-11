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

use App\Model\Dimension;
use App\Service\Formatter\DimensionFormatter;
use Han\Utils\Service;
use Hyperf\Di\Annotation\Inject;

class UserDimensionDao extends Service
{
    #[Inject]
    protected DimensionFormatter $formatter;

    public function getWhereByUserId(int $userId, ?string $review, int $offset = 0, int $limit = 10, array $columns = ['*']): array
    {
        $builder = Dimension::query()->where('user_id', $userId)
            ->where('review', 'like', "%{$review}%")
            ->orderBy('id', 'desc');

        [ $count, $models ] = $this->factory->model->pagination($builder, $offset, $limit, $columns);
        $items = $this->formatter->formatList($models);

        return [$count, $items];
    }
}
