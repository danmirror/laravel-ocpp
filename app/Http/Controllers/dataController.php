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
		$check = Data::where('idHW',$request->header('id'))->first();
		
		if(!$check)
		{
			$data =  new Data();
			$data->idHW = $request->header('id');
			$data->model = $request->header('model');
			$data->vendor = $request->header('vendor');
			$data->series = $request->header('series');
			$data->firmware = $request->header('firmware');
			$data->meterType = $request->header('meterType');
			$data->meterSN = $request->header('meterSerialNumber');
			$data->save();

			return response()->json([
				'id' => $request->header('id'),
				'description' => 'success',
				],200);
		}
		else{
			return response()->json([
				'id' => $request->header('id'),
				'description' => 'already exist',
				],200);
		}
    }
}
