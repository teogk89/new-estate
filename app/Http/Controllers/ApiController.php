<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    //

    public function calendarFeed(Request $request){

        $start = $request->input('start');

        $end = $request->input('end');

        $result = [];

        $events = \App\Model\MyEvent::where("when",">=",$start." 00:00:01")
                                    ->where("when","<=",$end." 23:59:59")->get();

        $attend = \App\Model\EventAttend::where("user_id",\Auth::user()->id)->get();
        


        foreach($attend as $a){

            if($a->events->when >= $start && $a->events->when <= $end){

                $new_date = new \DateTime($a->events->when);
                $result[] = [
                'title'=>$a->events->name,
                'id'=>$a->events->id,
                'start'=>$new_date->format(\DateTime::ATOM),
                'name'=>$a->events->des
            ];

            }


        }                                
     

        return $result;
                                    

    }

    public function delete($type,$id){

        $user = \Auth::user();

       switch($type){

            case "trans":

                $trans = \App\Model\Transaction::find($id);

                if($trans->user_id != $user->id){

                    abort(404);
                }
                $transType = \App\Model\TransactionType::where("transaction_id",$trans->id)->first();

                if($transType != null){

                    $files =  \App\Model\TransactionFile::where("transaction_id",$transType->id)->get();

                    foreach($files as $f){
                  //  \Storage::disk('public')->delete($f->path);
                        $f->delete();
                    }

                }
                 
                
                
              
                \App\Model\TransactionType::where("transaction_id",$trans->id)->delete();
                $trans->delete();

            break;

            case "cus":
                $client = \App\Model\Client::find($id)->delete();

       } 
    }
    public function getClient($id){


    	$client = \App\Model\Client::find($id);

    	$address = \App\Model\Address::find($client->address_id);

    	$client->address = $address->fullAddress();
    	return $client->toJson();
    }

    public function deleteFile(Request $request){

    	$user = \Auth::user();
    	$id = $request->input('id');
    	$file = \App\Model\TransactionFile::find($id);

    	$trans = \App\Model\TransactionType::find($file->transaction_id);
    	if($trans->trans->user_id != $user->id){

    		return abort('404');
    	}
    	$file->forceDelete();
    	//Storage::disk('public')->delete($file->path);
    	return $file->toJson();
    }


    public function getAttend($id){


        $event = \App\Model\MyEvent::find($id);

        return (String)view('api.get-attend',[
            'attends' => $event->attends
        ]);
       
    }
}
