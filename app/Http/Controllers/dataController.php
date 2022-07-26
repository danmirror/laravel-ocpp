<?php

namespace App\Http\Controllers;
use App\Models\BootNotification;
use App\Models\Setting;
use App\Models\Heartbeat;
use Illuminate\Http\Request;
use App\Models\StatusNotification;

use Illuminate\Support\Facades\Session;

class dataController extends Controller
{
    public function index(Request $request)
    {
		$status = [];
		
		$data = BootNotification::all();
		$statusNotification = StatusNotification::all();

		foreach($data as $dt)
        {
			foreach($statusNotification as $st)
        	{
				if($dt->idHW == $st->idHW)
				{
					$status = [$st->idHW =>$st->status];

				}
			}
			// dd($rt->updated_at->timestamp, $rt->updated_at->timestamp+1000, now()->timestamp);
			// dd();
			// if($rt->updated_at->timestamp+1000 > now()->timestamp)
			// {
			// }
			// else{
			// 	$status = [$rt->idHW =>'disabled'];
			// }

        }
		// dd($status);s


        return view('index',[
			'data' => $data,
			'status' => $status,
		]);

    }
    public function store(Request $request)
    {	
    }

	public function show($id)
    {
		$data = BootNotification::all();
		$settings = Setting::where('idHW',$id)->first();
		$dataSelection = BootNotification::where('idHW',$id)->first();
		$routine = Heartbeat::where('idHW',$id)->first();

		// dd($dataSelection);
        return view('detail',[
			'data' => $data,
			'dataSelection'=>$dataSelection,
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
		$data = BootNotification::all();
		return view('setting',[
			'data' => $data
		]);
    }

	public function settingStore(Request $request)
	{
		// dd($request->idHW);
		$checkSet = Setting::where('idHW',$request->idHW)->first();
		if(!$checkSet){
			$data = new Setting();
			$data->idHW = $request->idHW;
			$data->long = $request->long;
			$data->lat = $request->lat;
			$data->save();
			return redirect('/')->with('succes','done');
		}
		else{
			$checkSet->idHW = $request->idHW;
			$checkSet->long = $request->long;
			$checkSet->lat = $request->lat;
			$checkSet->save();
			return redirect('/')->with('succes','done');
		}

	}
}
