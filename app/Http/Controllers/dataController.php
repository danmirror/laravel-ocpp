<?php

namespace App\Http\Controllers;
use App\Models\Data;
use Illuminate\Http\Request;

class dataController extends Controller
{
    public function index(Request $request)
    {
		$data = Data::all();
        return view('index',[
			'data' => $data
		]);

    }
    public function store(Request $request)
    {
		$data =  new Data();
		$data->model = $request->header('model');
		$data->firmware = $request->header('firmware');
		$data->save();
		return response()->json([
		'id' => 1,
		'description' => 'success',
		],200);
    }
}
