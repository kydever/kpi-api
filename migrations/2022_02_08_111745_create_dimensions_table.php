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

class CreateDimensionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dimensions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_id')->nullable()->comment('工作 ID');
            $table->unsignedBigInteger('classify_id')->nullable()->comment('分类 ID');
            $table->string('review', 50)->comment('评价维度');
            $table->unsignedTinyInteger('score')->comment('分值');
            $table->string('review_description', 100)->nullable()->comment('评价维度说明');
            $table->unsignedBigInteger('leader_id')->comment('领导 ID');
            $table->unsignedBigInteger('user_id')->comment('下属 ID');
            $table->timestamps();
            $table->comment('评价表');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dimensions');
    }
}
