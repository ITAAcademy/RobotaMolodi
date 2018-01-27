<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsBlockedByBlockedTimeToTablesCompanyVacancyResumes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function(Blueprint $table){
            $table->string('blocked_by')->nullable();
            $table->date('blocked_time')->nullable();
        });
        
        Schema::table('vacancies', function(Blueprint $table){
            $table->string('blocked_by')->nullable();
            $table->date('blocked_time')->nullable();
        });
        
        Schema::table('resumes', function(Blueprint $table){
            $table->string('blocked_by')->nullable();
            $table->date('blocked_time')->nullable();
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
            $table->dropColumn('blocked_by');
            $table->dropColumn('blocked_time');
        });
        
        Schema::table('vacancies', function ($table) {
            $table->dropColumn('blocked_by');
            $table->dropColumn('blocked_time');
        });
        
        Schema::table('resumes', function ($table) {
            $table->dropColumn('blocked_by');
            $table->dropColumn('blocked_time');
        });
    }
}
