<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer("app_user_id");
            $table->string("title");
            $table->dateTime("startTime");
            $table->dateTime("endTime");
            $table->string("entryFee")->nullable();
            $table->decimal("lat")->nullable();
            $table->decimal("long")->nullable();
            $table->text("description")->nullable();
            $table->text("tags")->nullable();
            $table->boolean("feature")->default(false);
            $table->string("bannerImage")->nullable();
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
        Schema::dropIfExists('events');
    }
}
