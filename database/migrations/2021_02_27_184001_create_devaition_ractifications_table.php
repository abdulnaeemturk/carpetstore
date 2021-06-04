<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevaitionRactificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devaition_ractifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->comment('this is the project id from projects table');
            $table->unsignedBigInteger('devaition_user_id')->nullable()->index()->comment('added devaition user id');
            $table->string('kobo_record_id')->nullable()->index()->comment('Kobo record id');
            $table->text('devaition_remarks')->nullable()->comment('devaition remarks');
            $table->unsignedBigInteger('ractification_user_id')->index()->nullable()->comment('added ractification user id');
            $table->text('ractification_remarks')->nullable()->comment('ractification remarks');
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
        Schema::dropIfExists('devaition_ractifications');
    }
}
