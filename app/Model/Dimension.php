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
namespace App\Model;

/**
 * @property int $id
 * @property int $work_id
 * @property int $classify_id
 * @property string $review
 * @property int $score
 * @property string $review_description
 * @property int $leader_id
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Dimension extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'dimensions';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'work_id', 'classify_id', 'review', 'score', 'review_description', 'leader_id', 'user_id', 'created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'work_id' => 'integer', 'classify_id' => 'integer', 'score' => 'integer', 'leader_id' => 'integer', 'user_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
