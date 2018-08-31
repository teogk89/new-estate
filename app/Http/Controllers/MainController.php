<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Transaction;
use App\Model\TransactionType;
use App\Model\Address;

use App\Http\Requests\SubmitTrans;
class MainController extends Controller
{
    //

    public function index(){


    	return view('main.index');
    }

    public function transaction(){

        $clients = \App\Model\Client::all();
    	return view('main.transaction',[
            'clients'=>$clients,
            'mode'=>'new'
        ]);
    }


    public function saveTransaction(Request $request){

        /*$validatedData = $request->validate([
            
            'mls_number' => 'required',
            'street'     => 'required',
            'street_name'=> 'required',
            'city'       => 'required',
            'province'   => 'required',
            'postal'     => 'required',
        ]);*/
       
        $trans = new Transaction();
        $add = new Address();
        $add->type="transaction";
        if($request->input('mode') == 'edit'){

            $trans = Transaction::find($request->input('id'));

        }

        if($request->has("add_id")){

            $add = Address::find($request->input('add_id'));
          
        }

        $trans->fill($request->all());
        $trans->getDate($request->all());
        $add->fill($request->all());
        $add->save();
      
        if(!$request->has("add_id")){

            $trans->address_id = $add->id;

        }
      
        $trans->user_id = \Auth::user()->id;
        $trans->save();

        return redirect()->route('edit-transaction',['id'=>$trans->id])->with('success','Transaction #'.$trans->id.' has been save');
     
        
    }

    public function submitTrans(SubmitTrans $request){

       
        $trans = Transaction::find($request->input('id'));
        $trans->fill($request->all());
        $trans->getDate($request->all());
        $trans->status = "review";
        $trans->save();
        return redirect()->route('dashboard')->with('success','The transaction is being review');


    }

    public function editTransaction(Request $request,$id){


        $trans = Transaction::find($id);
        $add = new Address();
        if($trans == null){

            abort(404);
        }

        if($trans->address_id != null){

            $add = Address::find($trans->address_id);
        }

        $trans_type = TransactionType::where('transaction_id',$trans->id)->first();

        $mode = ($trans->status == "review" ? "view":"edit");
        return view('main.transaction',[
            'mode'=>$mode,
            'trans'=>$trans,
            'clients'=>\App\Model\Client::all(),
            'add'=>$add,
            'trans_type'=>$trans_type,

        ]
        );

    }

    public function saveStep(Request $request){


    	$user = \Auth::user();

    	$trans = new \App\Model\TransactionType();

    	if($request->input('mode') == 'edit'){

    		$trans = \App\Model\TransactionType::find($request->input('id'));

    	}
		$trans->fill($request->all());

		//$trans->transaction_id = $request->input('trans_id');
		$trans->save();

		return $trans->toJson();
    	

    }


    public function uploadFile(Request $request){


    	$allow = [
    		'agreement-of-purchase-and-sale',
    	
    		'agreement-to-lease',
    		'deposit-receipt',
            'confirmation-of-cooperation-and-representation',
            'ontario-residential-tenancy-agreement',
            'buyer-representation-agreement',
            'working-with-a-realtor-buyer',
            'working-with-a-realtor-tenant',
            'fintrac-receipt-of-funds-record',
            'fintrac-individual-identification-information-record',
            'mls-listing-agreement',
            'exclusive-listing-agreement',
            'seller-customer-service-agreement',
            'working-with-a-realtor-seller',
            'working-with-a-realtor-landlor',
            'fintrac-individual-identification-information-record',
            'seller-commision-agreement-with-cooperating-brokerage',
            'buyer-customer-service-agreement',
            'working-with-a-realtor-tenant',
            'fintrac-individual-identification-information-record',
            'fintrac-receipt-of-funds-record'

    	];

    	foreach($allow as $a){

    		if($request->hasFile($a)){

    				$filename = time().'-'.$a.'.'.$request->file($a)->getClientOriginalExtension();
    				$test = $request->file($a)->storeAs("content",$filename,'public');
    				

    				$trans = new \App\Model\TransactionFile();
                    $trans->file_name = $a;
    				$trans->path = $test;
    				$trans->transaction_id = $request->input('id');
    				$trans->save();
    				
                    $my_trans = TransactionType::find($trans->transaction_id);

                    return 
                    [$test,
                        (String) view('main.file-box',
                            ['trans_type'=>$my_trans,
                            'name'=>$trans->file_name]
                        ),
                        $trans->file_name
                    ];

    		}

    	}
    	// $request->test->store('logos');
    	//$test =\Storage::disk('public')->put($request->test, 'Contents');
    	/*$filename = time().'.'.$request->test->getClientOriginalExtension();
    	$test = $request->test->storeAs("content",$filename,'public');
    	echo $test;*/

    }

    public function test(Request $request){


    	return view("main.test");
    }


    public function userForms(Request $request){

        return view("main.user-forms",[
            'forms'=>\App\Model\Form::where('type','admin')->get()
            ]
        );
    }
}
