<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();
        
            $table->foreign('parent_id')->references('id')->on('families')->onDelete('cascade');
        });
        
    }
    
    public function down()
    {
        Schema::dropIfExists('families');
    }
    
};
