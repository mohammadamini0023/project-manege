<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('password');
            $table->enum('admin_role',['0', '1', '2']);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'first_name' => 'first name admin',
            'last_name' => 'last name admin',
            'phone' => '+1 854125789',
            'email' => 'admin@admin.com',
            'address' => 'american',
            'password' =>  Hash::make('123456789'),
            'admin_role' =>  '2',
            'created_at' =>  Carbon::now(),
            'updated_at' =>  Carbon::now(),
        ]);
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
