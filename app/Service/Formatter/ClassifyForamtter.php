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

use App\Model\Classify;

class ClassifyForamtter extends Formatter
{
    public function base(Classify $model)
    {
        return [
            'id' => $model->id,
            'work_id' => $model->work_id,
            'name' => $model->name,
            'grade' => $model->grade,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }

    public function formatList($models)
    {
        $results = [];
        foreach ($models as $model) {
            $results[] = $model;
        }

        return $results;
    }
}
