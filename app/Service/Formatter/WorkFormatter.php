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

use App\Model\Work;

class WorkFormatter extends Formatter
{
    public function base(Work $model)
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'grade' => $model->grade,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
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
