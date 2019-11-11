<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLabelToStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stations', function (Blueprint $table) {
            $table->string('label')->after('stations');
        });

        DB::table('stations')->where('id', 1)->update(['label' => 'Chojñapata Davis']);
        DB::table('stations')->where('id', 2)->update(['label' => 'Chinchaya Davis']);
        DB::table('stations')->where('id', 3)->update(['label' => 'Chinchaya Chinas']);
        DB::table('stations')->where('id', 4)->update(['label' => 'Calahuancane Davis']);
        DB::table('stations')->where('id', 5)->update(['label' => 'Cutusuma Davis']);
        DB::table('stations')->where('id', 6)->update(['label' => 'Iñacamaya Davis']);
        DB::table('stations')->where('id', 7)->update(['label' => 'Incamya Chinas']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
}
