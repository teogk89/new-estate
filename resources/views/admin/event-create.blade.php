@extends('layouts.app')


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
			<form id="my-form" enctype="multipart/form-data" class="form-horizontal" action="{{route('admin-form-save')}}" method="post"">
				   {{ csrf_field() }}
				<input type="hidden" name="id" value="{{$form->id}}"/>  
				<input type="hidden" name="mode" value="{{$mode}}"/>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Name</label>
                    <div class="col-md-7">
                        <input class="form-control" type="text" id="example-hf-email" name="name" placeholder="Form name"


                        value="<?php 

                        if(old('name')){

                        	echo old('name');
                        }else{


                        	echo $form->name;
                        }

                        ?>"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-select">Category</label>
                    <div class="col-md-3">
                        <select class="form-control" name="example-select" size="1">
                            <option value="0" disabled>Please select</option>
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-password">File</label>
                    <div class="col-md-7">

                        @if($form->path == null)
                        <input type="file" name="file_path">
                        @else

                        <a target="_blank" href="/storage/{{$form->path}}"class="btn btn-sm btn-primary" type="button">View</a>

                        @endif
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Description</label>
                    <div class="col-md-7">
                        <textarea name="des" class="form-control"><?php 

                        if(old('des')){

                            echo old('des');
                        }else{


                            echo $form->des;
                        }

                        ?></textarea>     
                        
                      
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-password">Active</label>
                    <div class="col-md-7">
                         <input style="text-align: left" class="" type="checkbox" name="active" value="1" 
                         <?php

                         echo ($form->active == 1 ? "checked":"");

                         ?>
                         >
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
<script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="/assets/js/plugins/bootbox/bootbox.min.js"></script>

<script>
    
    

    
</script>

@endpush