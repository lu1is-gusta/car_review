<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Person;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Person::class, 'person_id')->constrained()->onDelete('cascade');
            $table->string('model');
            $table->string('brand');
            $table->integer('year');
            $table->string('plate')->unique();
            $table->string('color');
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
        Schema::table('cars', function (Blueprint $table) {
            $table->dropforeignIdFor(Person::class);
        });

        Schema::dropIfExists('cars');
    }
};
