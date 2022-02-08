<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string ( 'chat_id', 80 );
            $table->string ( 'department_id', 50 );
            $table->string ( 'leader_user_id', 80 );
            $table->unsignedBigInteger ( 'member_count' )->default ( 0 );
            $table->string ( 'name', 30 )->comment ( '部门名称' );
            $table->string ( 'open_department_id', 80 );
            $table->integer ( 'order' )->comment ( '排序' );
            $table->unsignedBigInteger( 'parent_department_id' );
            $table->json ( 'status' )->comment ( '状态' );
            $table->timestamps();
            $table->comment ( '部门表' );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
}
