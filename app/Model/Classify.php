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

use Hyperf\Database\Model\Relations\HasMany;

/**
 * @property int $id
 * @property int $type
 * @property string $name
 * @property int $grade
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Classify extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'classifies';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'type', 'name', 'grade', 'created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'type' => 'integer', 'grade' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    public function dimensions(): HasMany
    {
        return $this->hasMany(Dimension::class, 'classify_id', 'id');
    }
}
