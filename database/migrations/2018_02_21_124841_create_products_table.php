<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
    //

        Schema::create('products', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->text('description');
            $table->integer('user_id')->unsigned();;
            $table->date('created_at')->format('Y-m-d');
            $table->date('updated_at')->format('Y-m-d');
            
             $table->foreign('user_id')
                   ->references('id')->on('users')
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
        
         Schema::table('products', function (Blueprint $table) {
            
          $table->dropForeign(['user_id']);  
            
         });
        
        Schema::drop('products');
    }
}
