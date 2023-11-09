<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('classes', function(Blueprint $table) {
			$table->foreign('grade_id')->references('id')->on('grades')
						->onDelete('cascade');
		});

        Schema::table('sections', function(Blueprint $table) {
            $table->foreign('grade_id')->references('id')->on('grades')
                ->onDelete('cascade');
        });
        Schema::table('sections', function(Blueprint $table) {
            $table->foreign('classe_id')->references('id')->on('classes')
                ->onDelete('cascade');
        });
        Schema::table('my_parents', function(Blueprint $table) {
            $table->foreign('nationality_Father_id')->references('id')->on('nationalities');
            $table->foreign('blood_Father_id')->references('id')->on('bloods');
            $table->foreign('religion_Father_id')->references('id')->on('religions');
            $table->foreign('nationality_Mother_id')->references('id')->on('nationalities');
            $table->foreign('blood_Mother_id')->references('id')->on('bloods');
            $table->foreign('religion_Mother_id')->references('id')->on('religions');
        });

        Schema::table('parent_attachements', function(Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('my_parents');
        });

	}

	public function down()
	{
		Schema::table('classes', function(Blueprint $table) {
			$table->dropForeign('classes_grade_id_foreign');
		});
        Schema::table('sections', function(Blueprint $table) {
            $table->dropForeign('sections_grade_id_foreign');
        });
        Schema::table('sections', function(Blueprint $table) {
            $table->dropForeign('sections_classe_id_foreign');
        });
	}
}
