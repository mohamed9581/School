<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradesTable extends Migration {

	public function up()
	{
		Schema::create('grades', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->json('Name')->nullable();
        	$table->text('Notes')->nullable();
             $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
		});
	}

	public function down()
	{
		Schema::drop('grades');
	}
}
