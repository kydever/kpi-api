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

class CreateClassifiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classifies', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->default(1)->comment('1: 常规工作 2: 管理工作');
            $table->string('name', 10)->nullable()->comment('分类名称');
            $table->unsignedTinyInteger('grade')->comment('分数');
            $table->timestamps();
            $table->comment('分类表');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classifies');
    }
}
