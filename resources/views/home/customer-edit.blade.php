@extends('layouts.app')


@section("title",'Customer')


@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
              # {{$cus->id}}
                
            </h1>
        </div>
        
    </div>
</div>


<div class="content">
	<div class="block">
		<div class="block-content">

		<div class="row">
        @if(session('success'))
        <div class="col-md-12">
                                    <!-- Success Alert -->
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h3 class="font-w300 push-15">Success</h3>
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                    <!-- END Success Alert -->
                                </div>

        @endif   
		@if($errors->any())
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h3 class="font-w300 push-15">Error</h3>
                @foreach ($errors->all() as $key=>$error)

                
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
        @endif
		<div class="col-md-12">
			<form id="my-form" enctype="" class="form-horizontal" action="{{route('customer-save')}}" method="post">

				 {{ csrf_field() }}
				<input type="hidden" value="{{$mode}}" name="mode"/>
				<input type="hidden" value="{{$cus->id}}" name="id"/>
				<input type="hidden" value="{{$add->id}}" name="add_id"/>
				<div class="form-group col-md-6 ">
                    <label class="col-md-4 control-label" for="example-maxlength1">First name</label>
                    <div class="col-md-6">
                        <input name="Fname" class="form-control" type="text" placeholder="" value="{{$cus->Fname}}"/>
                        
                                            
                      
                    </div>
                </div>
                <div class="form-group col-md-6 ">
                    <label class="col-md-4 control-label" for="example-maxlength1">Firm</label>
                    <div class="col-md-6">
                        <input name="firm" class="form-control" type="text" placeholder="" value="{{$cus->firm}}"/>
                        
                                            
                      
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6 ">
                    <label class="col-md-4 control-label" for="example-maxlength1">Last name</label>
                    <div class="col-md-6">
                        <input name="Lname" class="form-control" type="text" placeholder="" value="{{$cus->Lname}}"/>
                        
                                            
                      
                    </div>
                </div>
                <div class="form-group col-md-6 ">
                    <label class="col-md-4 control-label" for="example-maxlength1">Side</label>
                    <div class="col-md-6">
                        <input name="side" class="form-control" type="text" placeholder="" value="{{$cus->side}}"/>
                        
                                            
                      
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6 ">
                    <label class="col-md-4 control-label" for="example-maxlength1">Email</label>
                    <div class="col-md-6">
                        <input name="email" class="form-control" type="text" placeholder="" value="{{$cus->email}}"/>
                        
                                            
                      
                    </div>
                </div>
                <div class="form-group col-md-6 ">
                    <label class="col-md-4 control-label" for="example-maxlength1">Brokerage</label>
                    <div class="col-md-6">
                        <input name="broker" class="form-control" type="text" placeholder="" value="{{$cus->broker}}"/>
                        
                                            
                      
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6 ">
                    <label class="col-md-4 control-label" for="example-maxlength1">Phone</label>
                    <div class="col-md-6">
                        <input name="phone" class="form-control" type="text" placeholder="" value="{{$cus->phone}}"/>
                        
                                            
                      
                    </div>
                </div>
                <div class="form-group col-md-6"></div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-6">
                    <label class="col-md-4 control-label" for="example-maxlength1">Suite number</label>
                    <div class="col-md-6">
                        <input name="suite" class="form-control" type="text" id="" placeholder="" value="{{$add->suite}}">
                       
                    </div>
                    
                </div>
                <div class="form-group  col-md-6 ">
                    <label class="col-md-4 control-label" for="example-maxlength1">City/Town</label>
                    <div class="col-md-6">
                        <input name="city" class="form-control" type="text" id="" placeholder="" value="{{$add->city}}">
                            
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-6 ">
                    <label class="col-md-4 control-label" for="example-maxlength1">Street number</label>
                    <div class="col-md-6">
                        <input name="street" class="form-control" type="text" id="" placeholder="" value="{{$add->street}}">
                          
                    </div>
                     
                </div>
                <div class="form-group  col-md-6 ">
                    <label class="col-md-4 control-label" for="example-maxlength1">Province</label>
                    <div class="col-md-6">
                        <input name="province" class="form-control" type="text" id="" placeholder="" value="{{$add->province}}">
                            
                    </div>
                   
                </div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-6 ">
                    <label class="col-md-4 control-label" for="example-maxlength1">Street name</label>
                    <div class="col-md-6">
                        <input name="street_name" class="form-control" type="text" id="" placeholder="" value="{{$add->street_name}}">
                            
                    </div>
                   
                </div>
                <div class="form-group  col-md-6 ">
                    <label class="col-md-4 control-label" for="example-maxlength1">Postal code</label>
                    <div class="col-md-6">
                        <input name="postal" class="form-control" type="text" id="" placeholder="" value="{{$add->postal}}">
                            
                    </div>
              
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <div class="col-md-6 col-md-offset-4">
                        <button class="btn btn-sm btn-primary" type="submit">Save</button>


                                             
                    </div>
                </div>
         	</form>

		

		</div>
	</div>
		</div>
	</div>
	
</div>
@endsection

@push('scripts')
<script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="/assets/js/plugins/bootbox/bootbox.min.js"></script>

<script>
    
    

    
</script>

@endpush