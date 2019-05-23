<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stations')->nullable();
            $table->timestamps();
        });
            //insert station name
            
            DB::table('stations')->insert([

                ['stations' => 'chojnapata_davis'],
                ['stations' => 'chinchaya_davis'],
                ['stations' => 'chinchaya_chinas'],
                ['stations' => 'calahuancane_davis'],
                ['stations' => 'cutusuma_davis'],
                ['stations' => 'inacamaya_davis'],
                ['stations' => 'incamya_chinas']

            ]
        );
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
