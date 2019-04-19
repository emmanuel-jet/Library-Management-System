<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->text('book_name');
            $table->string('book_author');
						$table->string('pop');
						$table->integer('yop');
						$table->string('collation');
						$table->string('isbn');
						$table->string('bar_num');
						$table->string('call_mark')->unique();
            $table->integer('book_category');
						$table->string('book_location');
            $table->integer('stock_qty')->default('0');
            $table->integer('borrow_qty')->default('0');        
        $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
           $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
