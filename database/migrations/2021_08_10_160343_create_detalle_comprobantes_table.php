<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_comprobantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comprobante_id')->constrained();
            $table->integer('cantidad');
            $table->string('descripcion',70);
            $table->double('punitario',10,2);
            $table->double('importe',10,2);
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
        Schema::dropIfExists('detalle_comprobantes');
    }
}
