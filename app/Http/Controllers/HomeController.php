<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function accountView(){

        $user = \Auth::user();
        $forms = \App\Model\Form::where("user_id",$user->id)->get();
        return view("home.account-view",[
            'forms' => $forms,
            'user'  => $user
        ]);
    }

    public function customerSave(Request $request){

        $mode = $request->input('mode');

        $cus = new \App\Model\Client();
        $add = new \App\Model\Address();

        $valide_date = [
            'Fname' =>'required',
            'Lname' =>"required"
        ];

        $request->validate($valide_date);
        $add->type ="client";
        $cus->role = "client";

        if($mode == "edit"){

            $cus = \App\Model\Client::find($request->input('id'));
            $add = \App\Model\Address::find($request->input('add_id'));


         
            
            
            

         
            
        }
        $cus->fill($request->all());
        $add->fill($request->all());
        $add->save();
       
        if($mode == "new"){
            $cus->user_id = \Auth::user()->id;
            $cus->address_id = $add->id;
        }
        $cus->save();

        return redirect()->route('customer-edit',['id'=>$cus->id])->with('success','Customer has been saved');
        
    }

    public function customerEdit(Request $request,$id = null){

        $mode = ($id == null ?  "new":"edit");
        $add = new \App\Model\Address();
        if($mode == "new"){

            $cus = new \App\Model\Client();
            
        }else{

            $cus = \App\Model\Client::find($id);

            if($cus->user_id != \Auth::user()->id){

                abort(404);
            }
            if($cus->address != null){

                $add = $cus->address;
            }   
        }

        return view('home.customer-edit',[
            'mode' =>$mode,
            'add' =>$add,
            'cus' =>$cus
        ]);
    }


    public function accountSave(Request $request){


        $valid_user['password'] = "required|min:6";
        $valid_user['confirm']  = "required|min:6|same:password";
        $request->validate($valid_user);

        $user = \Auth::user();

        $user->password = bcrypt($request->input('password'));
        return redirect()->route('user-account-view')->with('success','Password has been changed');
       
    }
    public function userCalendar(){


        return view('home.user-calendar');
    }
    public function dashboard(){

        $user = \Auth::user();

        $trans = \App\Model\Transaction::where("user_id",$user->id)->get();
        return view('home.dashboard',[
            'trans'=>$trans
        ]);
    }

    public function customers(Request $request){


        $user = \Auth::user();

        return view('home.customer',[
            'clients'=>Client::where("user_id",$user->id)->get()
        ]);    

    }

    public function logout(Request $request) {
        \Auth::logout();
        return redirect('/login');
    }
}
