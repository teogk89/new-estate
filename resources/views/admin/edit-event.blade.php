@extends('layouts.app')

@push('custom-css')
<link rel="stylesheet" href="/assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css"/>

@endpush

@section("title",'Forms')


@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
              # {{ $event->id or 'Event' }}
                
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
			<form id="my-form" class="form-horizontal" action="{{route('admin-event-save')}}" method="post"">
				   {{ csrf_field() }}
				<input type="hidden" name="id" value="{{$event->id}}"/>  
				<input type="hidden" name="mode" value="{{$mode}}"/>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Name</label>
                    <div class="col-md-7">
                        <input class="form-control" type="text" name="name" placeholder="Event name"


                        value="<?php 

                        if(old('name')){

                        	echo old('name');
                        }else{


                        	echo $event->name;
                        }

                        ?>"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Require</label>
                    <div class="col-md-7">
                        <input class="form-control" type="text" name="require" placeholder=""


                        value="<?php 

                        if(old('require')){

                            echo old('require');
                        }else{


                            echo $event->require;
                        }

                        ?>"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Date time</label>
                    <div class="col-md-7">
                        <input id="my-date" class="form-control" type="text" name="when" placeholder="Event name"


                        value="<?php 

                        if(old('when')){

                            echo old('when');

                        }else{


                            echo $event->getWhen2();
                        }

                        ?>"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Description</label>
                    <div class="col-md-7">
                        <textarea name="des" class="form-control"><?php 

                        if(old('des')){

                            echo old('des');
                        }else{


                            echo $event->des;
                        }

                        ?></textarea>     
                        
                      
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button class="btn btn-sm btn-primary" type="submit">Save</button>


                        @if($mode == 'edit')
                           <button class="btn btn-sm btn-danger" type="submit" name="submit" value="delete">Delete</button>
                        @endif
                     
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
<script src="/assets/js/plugins/bootstrap-datetimepicker/moment.min.js"></script>
<script src="/assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="/assets/js/plugins/bootbox/bootbox.min.js"></script>

<script>
    
    
   $('#my-date').datetimepicker();
    
</script>

@endpush