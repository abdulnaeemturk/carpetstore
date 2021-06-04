<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index()->comment("User Who stored the record");
            $table->enum('type_of_image', ['devaition', 'ractification'] ); 
            $table->string('imgname')->nullable()->comment("Name of the image stored in directory");
            $table->string('mime_type')->nullable()->comment("What type of file is being stored");
            $table->morphs('attachement');
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
        Schema::dropIfExists('attachments');
    }
}
