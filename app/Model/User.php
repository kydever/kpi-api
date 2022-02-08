<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $id 
 * @property string $avatar 
 * @property string $department_ids 
 * @property string $email 
 * @property int $employee_type 
 * @property int $gender 
 * @property int $is_tenant_manager 
 * @property string $job_title 
 * @property int $join_time 
 * @property string $mobile 
 * @property int $mobile_visible 
 * @property string $name 
 * @property string $open_id 
 * @property string $orders 
 * @property string $status 
 * @property string $union_id 
 * @property string $user_id 
 * @property int $is_leader 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class User extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'users';
    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['id', 'avatar', 'department_ids', 'email', 'employee_type', 'gender', 'is_tenant_manager', 'job_title', 'join_time', 'mobile', 'mobile_visible', 'name', 'open_id', 'orders', 'status', 'union_id', 'user_id', 'is_leader', 'created_at', 'updated_at'];
    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'employee_type' => 'integer', 'gender' => 'integer', 'is_tenant_manager' => 'integer', 'join_time' => 'integer', 'mobile_visible' => 'integer', 'is_leader' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}