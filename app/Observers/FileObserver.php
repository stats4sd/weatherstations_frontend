<?php

namespace App\Observers;

use App\File;
use Illuminate\Support\Facades\Storage;

class FileObserver
{
	public function created (File $file)
	{
		//dd($file);
		$client = new \GuzzleHttp\Client();
        
        //$res = $client->request('POST','https://us-central1-mcknight-ccrp.cloudfunctions.net/weatherStation', [
        $res = $client->request('POST',env('POST_URL'), [
            'multipart' => [
                [
                    'name' => 'FileContents',
                    'contents' => Storage::get($file->path),
                    'filename' => $file->name

                ],

                [   'name' => 'station',
                    'contents' => $file->station_id

            ]
            ]
        ]);
        //dd($res);

       

        if($res->getStatusCode() != 200) exit("File transfer failed, see logs");

        return $res;
	}
}
