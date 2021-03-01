<?php
/*
 * @Author: your name
 * @Date: 2021-02-27 13:11:08
 * @LastEditTime: 2021-02-28 16:22:43
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \blog\database\migrations\2014_10_12_000000_create_users_table.php
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('用户名');
            $table->integer('phone')->unique()->comment('手机号码');
            $table->string('email')->unique()->nullable()->comment('邮箱');
            $table->string('icon')->default('')->comment('用户头像');
            $table->string('password')->commit('密码');
            $table->string('token')->default('')->comment('验证邮箱用户有效性');
            $table->tinyInteger('active')->default(0)->comment('是否激活1 激活 0 未激活');
            $table->rememberToken()->comment('七天登录');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
