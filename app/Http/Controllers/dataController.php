<?php

namespace App\Http\Controllers;
use App\Models\Data;
use App\Models\Setting;
use App\Models\Routine;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class dataController extends Controller
{
    public function index(Request $request)
    {
		$status = [];
		
		$data = Data::all();
		$routine = Routine::all();

		foreach($routine as $rt)
        {
			// dd($rt->updated_at->timestamp, $rt->updated_at->timestamp+1000, now()->timestamp);
			// dd();
			if($rt->updated_at->timestamp+1000 > now()->timestamp)
			{
				$status = [$rt->idHW =>'enabled'];
			}
			else{
				$status = [$rt->idHW =>'disabled'];
			}
        }
		// dd($status);s


        return view('index',[
			'data' => $data,
			'status' => $status
		]);

    }
    public function store(Request $request)
    {
	
		
		$check = Data::where('idHW',$request->header('id'))->first();
		$checkLog = Routine::where('idHW',$request->header('idlog'))->first();
		
		if(!$check && $request->header('id')){
			$data =  new Data();
			$data->idHW = $request->header('id');
			$data->model = $request->header('model');
			$data->vendor = $request->header('vendor');
			$data->series = $request->header('series');
			$data->firmware = $request->header('firmware');
			$data->meterType = $request->header('meterType');
			$data->meterSN = $request->header('meterSerialNumber');
			
			if($data->save()){
				return response()->json([
					'id' => $request->header(),
					'description' => 'success',
					],200);
			}
		}
		if($request->header('idlog')){
			if(!$checkLog){
				$log = new Routine();
				$log->idHW = $request->header('idlog');

				if($log->save()){
					return response()->json([
						'id' => $request->header('idlog'),
						'description' => 'log success',
						],200);
				}
				
			}
			else{
				//just update time
				$checkLog->updated_at = now();
				if($checkLog->save()){
					return response()->json([
						'id' => $request->header('idlog'),
						'description' => 'update Log success',
						],200);
				}
			}
		}
    }

	public function show($id)
    {
		$settings = Setting::where('idHW',$id)->first();
		$data = Data::where('idHW',$id)->first();
		$routine = Routine::where('idHW',$id)->first();

		// dd($data);
        return view('detail',[
			'data'=>$data,
			'routine'=>$routine,
			'settings'=>$settings
		]);
    }

	public function setting()
    {
		if(!Session::get('name'))
		{
			return redirect('/')->with('alert','login');
		}
		$data = Data::all();
		return view('setting',[
			'data' => $data
		]);
    }

	public function settingStore(Request $request)
	{
		// dd($request->idHW);
		$check = Setting::where('idHW',$request->idHW)->first();
		if(!$check){
			$data = new Setting();
			$data->idHW = $request->idHW;
			$data->long = $request->long;
			$data->lat = $request->lat;
			$data->save();
			return redirect('/')->with('succes','done');
		}
		else{
			$check->idHW = $request->idHW;
			$check->long = $request->long;
			$check->lat = $request->lat;
			$check->save();
			return redirect('/')->with('succes','done');
		}

	}
}
