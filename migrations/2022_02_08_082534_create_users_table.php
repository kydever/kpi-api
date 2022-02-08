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
use Hyperf\Database\Migrations\Migration;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Schema\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->json('avatar')->comment('头像');
            $table->json('department_ids')->comment('部门 ID');
            $table->string('email', 32)->comment('邮箱');
            $table->tinyInteger('employee_type')->comment('分配类型');
            $table->tinyInteger('gender')->comment('性别');
            $table->boolean('is_tenant_manager');
            $table->string('job_title', 20)->comment('职称');
            $table->integer('join_time')->default(0)->comment('工作时长');
            $table->char('mobile', 14)->comment('手机号码');
            $table->boolean('mobile_visible')->comment('手机号码是否可见');
            $table->string('name', 10)->comment('姓名');
            $table->string('open_id', 80);
            $table->json('orders');
            $table->json('status');
            $table->string('union_id', 80);
            $table->string('user_id', 30)->comment('用户 ID');
            $table->boolean('is_leader')->default(false)->comment('是否是领导');
            $table->timestamps();
            $table->comment('用户表');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
