<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property int $work_id 
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
    protected array $fillable = ['id', 'work_id', 'name', 'grade', 'created_at', 'updated_at'];
    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'work_id' => 'integer', 'grade' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}