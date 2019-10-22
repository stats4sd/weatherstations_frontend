<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Log;

class ProcessDataExport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $table;
    protected $params;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($table, $params)
    {
        $this->table = $table;
        $this->params = $params;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $scriptName = 'save_data_csv.py';
        $scriptPath = base_path() . '/scripts/' . $scriptName;
        $db_user = config('database.connections.mysql.username');
        $db_password = config('database.connections.mysql.password');
        $db_name = config('database.connections.mysql.database');
        $base_path = base_path();
        $table = $this->table;
        $params = $this->params;

        

        //python script accepts 4 arguments in this order: db_user db_password db_name base_path()
        $process = new Process("python {$scriptPath} {$db_user} {$db_password} {$db_name} {$base_path} {$table} {$params}");

        $process->run();
        if(!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        Log::info("python done.");
        Log::info($process->getOutput());
       
    }
}
