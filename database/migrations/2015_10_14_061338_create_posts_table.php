<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
            $table->char('id', 36);
			$table->primary('id');
			$table->index('id');
            $table -> integer('author_id')-> unsigned()-> default(1)  ;
            $table->foreign('author_id')
             ->references('id')->on('users')
             ->onDelete('cascade');
            $table->string('title');
            $table->text('body');
            $table->string('slug')->unique();
            $table->boolean('active')-> default(true);
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
		Schema::drop('posts');
	}

}
