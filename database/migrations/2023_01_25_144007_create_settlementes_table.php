<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettlementesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlementes', function (Blueprint $table) {
            $table->id();
            $table->string('key', 20)->index();
            $table->integer('zip_code')->index();
            $table->text('name');
            $table->enum('zone_type', ['URBANO', 'RURAL', 'SEMIURBANO']);
            $table->string('type', 150);
            $table->unsignedBigInteger('municipalities_id')->index();
            $table->foreign('municipalities_id')->references('id')->on('municipalities');
            $table->unsignedBigInteger('localities_id')->index();
            $table->string('entities_key', 20)->index();
            $table->foreign('entities_key')->references('key')->on('entities');
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
        Schema::dropIfExists('settlementes');
    }
}
