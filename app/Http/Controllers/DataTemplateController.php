<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\DataTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DataTemplateController extends Controller
{
    public function checkvalue()
    {
    
    	\Alert::success('You have successfully deleted the dataset ')->flash();
    	return Redirect::back();
    }
}
