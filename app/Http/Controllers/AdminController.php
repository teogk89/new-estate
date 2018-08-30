<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Transaction;
use App\Model\Address;
use App\Model\TransactionType;
use App\User;
use App\Model\Form;

class AdminController extends Controller
{
    //

    public function calendar(Request $request){



        return view('admin.calendar-event',[
            
        ]);
    }


    public function adminDelete($type,$id){

        switch($type){


            case "event":
                \App\Model\MyEvent::find($id)->delete();
            break;

            case "form":
                \App\Model\Form::find($id)->delete();
            break;
            
            case "sale":
                \App\User::find($id)->delete();    

            break;    
        }
        
    }
    public function calendarFeed(Request $request){

        $start = $request->input('start');

        $end = $request->input('end');

        $result = [];

        $events = \App\Model\MyEvent::where("when",">=",$start." 00:00:01")
                                    ->where("when","<=",$end." 23:59:59")->get();


        foreach($events as $e){

            $new_date = new \DateTime($e->when);
            $result[] = [
                'title'=>$e->name,
                'id'=>$e->id,
                'start'=>$new_date->format(\DateTime::ATOM),
                'name'=>$e->des
            ];
         }

         return $result;
                                    

    }
    public function transaction(Request $request){

    	$trans = Transaction::all();


    	return view('admin.transaction',[
    		'trans'=>$trans
    	]);


    }

    public function attendEdit(Request $request, $id){

        $event = \App\Model\MyEvent::find($id);

       


        $user_id =  \App\Model\EventAttend::where("event_id",$id)->pluck('user_id')->toArray();


        return view('admin.attend-edit',[
            'event' =>$event,
            'users' => \App\User::where("role","user")->get(),
            'users_id' =>$user_id

        ]);

    }

    public function attendSave(Request $request){

        $id = $request->input("id");
        $events = \App\Model\EventAttend::where("event_id",$id)->get();
        $users = $request->input("user");


        if($users == null){

            \App\Model\EventAttend::where("event_id",$id)->delete();

        }else{

            $id_users = array_values($users);
            foreach($events as $e){

                if(in_array($e->id,$id_users)){

                    continue;
                }

                else{

                   $e->forceDelete(); 
                }


            }
            foreach($id_users as $u){

                 $event = \App\Model\EventAttend::where("event_id",$id)->where("user_id",$u)->first();

                 if($event == null){

                    $event = new \App\Model\EventAttend();
                    $event->user_id = $u;
                    $event->event_id = $id;
                    $event->save();
                 }

            }


        }
        return redirect()->route('admin-attend-edit',['id'=>$id])->with('success','Attendances have been saved');           

      
    }

    public function form(Request $request){




        return view('admin.form',[
            'forms'=>\App\Model\Form::all()
        ]);



    }
    public function eventSave(Request $request){

        $mode = $request->input("mode");

        $valid = [
            'name' =>'required',
            'when' =>'required',
        ];

     //   dd($request->all());    

        $event = new \App\Model\MyEvent();

        if($mode == "edit"){

            $event = \App\Model\MyEvent::find($request->input('id'));

        }


        $event->fill($request->all());

     

        $event->save();
        return redirect()->route('admin-event-edit',['id'=>$event->id])->with('success','Event '.$event->name.' has been saved');

    }

    public function salesEdit(Request $request,$id = null){

        $forms = collect([]);
        if ($id == null){

            $user = new \App\User();
            
        }else{

            $user = \App\User::find($id);
            $forms = \App\Model\Form::where("user_id",$user->id)->get();
        }
        
        
        return view('admin.sale-edit',[
            'user' =>$user,
            'forms' =>$forms,
            'form'  => new \App\Model\Form(),
            'mode' => ($id == null ?"new":"edit")
        ]);
    }


    public function salesSave(Request $request){

        $valid_form = [
            'name'=>'required',
            'file_path' =>'required'
        ];


        if($request->has('name')){

            $user_id = $request->input("user_id");
            $request->validate($valid_form);
            $form = new \App\Model\Form();
            $form = $this->formInSave($form,$request,"new","user");


            return redirect()->route('admin-sale-edit',['id'=>$user_id])->with('success','Form #'.$form->id.' has been save');


        }

        if($request->has("Fname")){

            $mode = $request->input('mode');
            $valid_user = [
                'Fname' =>'required',
                'Lname' =>'required',
                'email' => 'required'

            ];

            $user = new \App\User();
            $user->role ="user";
            if($mode == "edit"){

                $user_id = $request->input("id");
                unset($valid_user['email']);
                $user = \App\User::find($user_id);
            }

            if($mode == "new" || ($request->has('password') && $request->input('password') != null)){

                $valid_user['password'] = "required|min:6";
                $valid_user['confirm']  = "required|min:6|same:password";
            }

            $request->validate($valid_user);
            if($request->has("password")){

                $user->password = bcrypt($request->input("password"));
            }
            $user->fill($request->all());
            $user->save();
            //dd($request->all());

           
        }

       


    }

    public function eventEdit(Request $request,$id = null){


        $form = new \App\Model\MyEvent();

        if($id != null){

            $form = \App\Model\MyEvent::find($id);
        }


        return view("admin.edit-event",[
            'event' =>$form,
            'mode'=>($id == null ? 'new':'edit')
        ]);
    }
    public function viewEvents(Request $request){



        return view("admin.view-events",[
            'events' => \App\Model\MyEvent::all()
        ]);
    }

    public function formEdit(Request $request,$id = null){

       
        $form = new \App\Model\Form();

        if($id != null){

            $form = \App\Model\Form::find($id);
        }
       

        return view('admin.form-edit',[
            'form'=>$form,
            'mode'=>($id == null ? 'new':'edit')
        ]);
    }

    private function formInSave(Form $form,Request $request,$mode,$type){

        $file_path = "file_path";
        $form->fill($request->all());

        if(!$request->has('active')){

            $form->active = 0;
        }else{

            $form->active = 1;
        }

        $form->type = $type;

        if($request->hasFile($file_path)){

        
            $filename = time().'.'.$request->file($file_path)->getClientOriginalExtension();

            $test = $request->file($file_path)->storeAs("content",$filename,'public');
            $form->path = $test;        

                
        }
    
        $form->save();

        return $form;

    }

    public function formSave(Request $request){
   
        $mode = $request->input("mode");

        $file_path = "file_path";
        $valid = [
            'name'=>'required'
        ];

        if($mode == 'new'){

            $valid[$file_path] = 'required';
        }

        $request->validate($valid);

        $form = new \App\Model\Form();

        if($mode == "edit"){

            $form = \App\Model\Form::find($request->input('id'));

        }

        /*$form->name = $request->input('name');

        if(!$request->has('active')){

            $form->active = 0;
        }else{

            $form->active = 1;
        }
        if($mode == "new"){
            $form->type = "admin";
            $form->user_id = \Auth::user()->id;
        }
        $form->des = $request->input('des');
        if($request->hasFile($file_path)){

        
            $filename = time().'.'.$request->file($file_path)->getClientOriginalExtension();

            $test = $request->file($file_path)->storeAs("content",$filename,'public');
            $form->path = $test;        

                
        }
   
        $form->save();*/

        $form = $this->formInSave($form,$request,$mode,"admin");
        return redirect()->route('admin-form-edit',['id'=>$form->id])->with('success','Form #'.$form->id.' has been save');
       

    }

    public function viewSales(Request $request){


        return view('admin.sales',[
            'sales'=>User::where("role","user")->get()
        ]);
    }

    public function viewTrans(Request $request,$id){


    	
    	$trans = Transaction::find($id);
        $add = new Address();
        if($trans == null){

            abort(404);
        }

        if($trans->address_id != null){

            $add = Address::find($trans->address_id);
        }

        $trans_type = TransactionType::where('transaction_id',$trans->id)->first();

        $mode = "view";
        return view('main.transaction',[
            'mode'=>$mode,
            'trans'=>$trans,
            'clients'=>\App\Model\Client::all(),
            'add'=>$add,
            'trans_type'=>$trans_type,

        ]
        );


    }
}
