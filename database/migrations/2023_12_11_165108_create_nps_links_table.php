<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNpsLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nps_links', function (Blueprint $table) {
            $table->id();
            $table->text("uuid")->nullable();
            $table->string("campaign_name");
            $table->text("client_name");
            $table->string("client_document");
            $table->text("client_representant");
            $table->char("client_uf", 2);
            $table->text("client_city");
            $table->string("order_company");
            $table->string("order_number");
            $table->decimal("order_value", 10, 2);
            $table->date("order_date");
            $table->datetime("config_process_in");
            $table->string("config_gateway");
            $table->string("config_number");
            $table->integer("vote")->nullable();
            $table->datetime("voted_at")->nullable();
            $table->text("reason_channel")->nullable();
            $table->text("reason_description")->nullable();
            $table->json("response")->nullable();
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
        Schema::dropIfExists('nps_links');
    }
}
