<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        $users = array(
            'user_1' => [
                'name'     => 'Ali',
                'email'    => 'ali@gmail.com',
                'password' => Hash::make(123456),
            ],
            'user_2' => [
                'name'     => 'Ahmed',
                'email'    => 'ahmed@gmail.com',
                'password' => Hash::make(123456),
            ],
            'user_3' => [
                'name'     => 'zahid',
                'email'    => 'zahid@gmail.com',
                'password' => Hash::make(123456),
            ]
            );

        foreach($users as $user){
            $object           = new User;
            $object->name     = $user['name'];
            $object->email    = $user['email'];
            $object->password = $user['password'];
            $object->save();
        }
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
