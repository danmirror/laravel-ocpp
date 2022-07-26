<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\Heartbeat;
use App\Models\BootNotification;
use App\Models\StatusNotification;

use Illuminate\Http\Request;

class ocppCOntroller extends Controller
{
    public function boot_notification(Request $request)
    {
        $check = BootNotification::where('idHW',$request->header('id'))->first();
		
		if(!$check && $request->header('id')){
			$data =  new BootNotification();
			$data->idHW = $request->header('id');
			$data->model = $request->header('model');
			$data->vendor = $request->header('vendor');
			$data->series = $request->header('series');
			$data->firmware = $request->header('firmware');
			
			$setting = new Setting();
			$setting->idHW = $request->header('id');
			$setting->save();

			$log = new Heartbeat();
			$log->idHW = $request->header('id');
			$log->save();

			$ST = new StatusNotification();
			$ST->idHW = $request->header('id');
			$ST->save();

			if($data->save()){
				return response()->json([
					'id' => $request->header(),
					'description' => 'success',
					],200);
			}
		
		}

    }
    public function status_notification(Request $request)
    {
        $data = heartbeat::where('idHW',$request->header('idST'))->first();

        if($request->header('idST')){
		
                $data->connectorId      = $request->header('connectorId');
                $data->info             = $request->header('info');
                $data->status           = $request->header('status');
                $data->vendorId         = $request->header('vendorId');
                $data->vendorErrorCode  = $request->header('vendorErrorCode');
				$data->updated_at       = now();
				if($data->save()){
					return response()->json([
						'id' => $request->header('idST'),
						'description' => 'update status_notification success',
						],200);
				}
		}

    }
    public function heartbeat(Request $request)
    {
        $checkLog = Heartbeat::where('idHW',$request->header('idlog'))->first();

		if($request->header('idlog')){
			if(!$checkLog){
				$log = new Heartbeat();
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
}
