<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->integer('final_price')->after('snap_token'); // sesuaikan posisi jika perlu
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn('final_price');
    });
}

};
