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
use App\Model\User;
use Hyperf\Database\Seeders\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'avatar' => 1,
            'department_ids' => 1,
            'email' => 'test@qq.com',
            'employee_type' => 1,
            'gender' => 1,
            'is_tenant_manager' => 1,
            'job_title' => 1,
            'join_time' => 1,
            'mobile' => 1,
            'mobile_visible' => 1,
            'name' => 1,
            'open_id' => 1,
            'orders' => 1,
            'status' => 1,
            'union_id' => 1,
            'user_id' => 1,
            'is_leader' => 1,
        ]);
    }
}
