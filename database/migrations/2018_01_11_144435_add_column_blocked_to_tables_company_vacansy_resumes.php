<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnBlockedToTablesCompanyVacansyResumes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function(Blueprint $table){
            $table->boolean('blocked')->default(false);
        });
        
        Schema::table('vacancies', function(Blueprint $table){
            $table->boolean('blocked')->default(false);
        });
        
        Schema::table('resumes', function(Blueprint $table){
            $table->boolean('blocked')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function ($table) {
            $table->dropColumn('blocked');
        });
        
        Schema::table('vacancies', function ($table) {
            $table->dropColumn('blocked');
        });
    
        Schema::table('resumes', function ($table) {
            $table->dropColumn('blocked');
        });
    }
}
