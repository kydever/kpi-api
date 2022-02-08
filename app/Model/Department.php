<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property string $chat_id 
 * @property string $department_id 
 * @property string $leader_user_id 
 * @property int $member_count 
 * @property string $name 
 * @property string $open_department_id 
 * @property int $order 
 * @property int $parent_department_id 
 * @property string $status 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class Department extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'departments';
    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'chat_id', 'department_id', 'leader_user_id', 'member_count', 'name', 'open_department_id', 'order', 'parent_department_id', 'status', 'created_at', 'updated_at'];
    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'member_count' => 'integer', 'order' => 'integer', 'parent_department_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}