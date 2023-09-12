<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('contact', 9)->nullable(false);
            $table->string('email')->nullable(false)->unique();
            $table->boolean('public')->default(false);
            $table->unsignedBigInteger('user_id'); 

            $table->timestamps();

            $table->foreign('user_id') 
                ->references('id')
                ->on('users') 
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('contacts');
    }
}
