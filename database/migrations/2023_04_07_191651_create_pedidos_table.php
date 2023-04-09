<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->engine="InnoDB";

            $table->id();

            $table -> bigInteger('producto_id') -> unsigned(); //Este debe ser la foreign key
            $table -> string('cantidad'); //Cantidad del producto solicitado
            $table -> string('precio_unitario'); //Precio del producto
            $table -> string('precio_total'); //Precio total del pedido
            $table -> string('status');

            $table->timestamps();


            $table -> foreign('producto_id') -> references('id') -> on('productos') -> onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
