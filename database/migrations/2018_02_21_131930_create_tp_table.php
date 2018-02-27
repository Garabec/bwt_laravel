<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tp', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('tag_id')->unsigned();;
            $table->integer('product_id')->unsigned();
            
            
             $table->foreign('tag_id')
                   ->references('id')->on('tags')
                   ->onUpdate('cascade')
                   ->onDelete('cascade');
                   
             $table->foreign('product_id')
                   ->references('id')->on('products')
                   ->onUpdate('cascade')
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
        Schema::table('tp', function (Blueprint $table) {
            
          $table->dropForeign(['tag_id']);
          $table->dropForeign(['product_id']);  
            
         });
        
        Schema::drop('tp');
    }
}
