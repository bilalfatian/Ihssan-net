<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publisher_id');
            $table->string('title');
            $table->text('description');
            $table->string('photo_url'); // You may want to adjust this if you have multiple photos
            $table->decimal('needed_money', 8, 2);
            $table->decimal('raised_money', 8, 2)->default(0.00);
            $table->timestamps();
    
            $table->foreign('publisher_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
};
