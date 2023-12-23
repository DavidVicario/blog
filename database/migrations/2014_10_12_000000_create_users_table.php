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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //Integer Unsigned Increment
            $table->string('name'); //Varchar (default 255) Puedes especificar menos ('name', 100)
            //$table->text('name'); Igual que el String pero con mas de 255 caracteres
            $table->string('email')->unique();//Al añadir unique, decimos que tiene que ser unico
            $table->timestamp('email_verified_at')->nullable();/*Para introducir fechas, se usa para verificar los correos y 
            guardara la hora a la que se verifico. El nullable es por si este campo puede quedar vacio.*/
            $table->string('password');//Un string normal, para pass
            $table->rememberToken();/*Es otro varchar pero de tamaño 100, que va a guardar un token siempre que el usuario 
            marque la casilla de recordar*/
            $table->timestamps();/*Crea dos columnas de timestamps (created_at y updated_at) se registra la fecha y hora de 
            cuando se creo ese registro. Si se actualiza se guarda tambien*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');//Este metodo hace que se revierta todo lo creado en la funcion Up de arriba
    }
};
