<?php

use App\Models\CityHall;
use App\Models\ContactType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('term')->nullable();
            $table->foreignIdFor(ContactType::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(CityHall::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}