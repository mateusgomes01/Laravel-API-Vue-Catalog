<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('plan_id')->constrained();
            $table->integer('installments');
            $table->decimal('visa_master', 4, 2);
            $table->decimal('others', 4, 2);
            $table->decimal('mup', 4, 2);
        });
        /*
        Schema::table('plan_details', function(Blueprint $table) {
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_details');
    }
}
