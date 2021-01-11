<?php

use App\Models\Admin\Barangay;
use App\Models\Admin\Evacuation;
use App\Models\User;
use App\Models\Volunteer\Constituents;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Constituents::class);
            $table->foreignIdFor(Barangay::class);
            $table->foreignIdFor(Evacuation::class);
            $table->integer('status_id');
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
        Schema::dropIfExists('details');
    }
}

