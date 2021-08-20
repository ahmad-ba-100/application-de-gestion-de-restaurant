<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("servant_id")->unsigned();
            $table->integer("quantite");
            $table->decimal("prix_total")->default(0);
            $table->decimal("total_reçu")->default(0);
            $table->decimal("reste")->default(0);
            $table->string("type_paiement")->default("cash");
            $table->string("status_payment")->default("paid");        
            $table->timestamps();
            $table->foreign('servant_id')
                  ->references("id")
                  ->on("servants")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
