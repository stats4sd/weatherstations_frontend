<?php
namespace App\Http\Controllers;

use \GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Excel;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Retrieve file from POST request
        //
        $station = $_POST['weatherstation'];
        //dd($request);
     

        //dd($station);

            if($request->hasFile('data-file')){

                // handle file and store it for prosperity
                $file = $request->file('data-file');
             

                $name = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('rawfiles',$name);


                $client = new \GuzzleHttp\Client();
               

                //$res = $client->request('POST','https://us-central1-mcknight-ccrp.cloudfunctions.net/weatherStation', [
                $res = $client->request('POST','http://localhost:8010/soil/us-central1/uploadFile', [
                    'multipart' => [
                        [
                            'name' => 'FileContents',
                            'contents' => Storage::get($path),
                            'filename' => $name

                        ],

                        [   'name' => 'station',
                            'contents' => $station

                    ]
                    ]
                ]);
                //dd($res);

               

                if($res->getStatusCode() != 200) exit("File transfer failed, see logs");

                return $res;

            }

            return "no file";
        


        // Send file onto cloud function
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
