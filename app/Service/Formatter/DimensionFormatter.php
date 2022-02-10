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
namespace App\Service\Formatter;

use App\Model\Dimension;

class DimensionFormatter extends Formatter
{
    public function base(Dimension $model)
    {
        return [
            'id' => $model->id,
            'classify_id' => $model->classify_id,
            'review' => $model->review,
            'score' => $model->score,
            'review_description' => $model->review_description,
            'leader_id' => $model->leader_id,
            'user_id' => $model->user_id,
        ];
    }

    public function formatList($models)
    {
        $result = [];
        foreach ($models as $model) {
            $result[] = $model;
        }

        return $result;
    }
}
