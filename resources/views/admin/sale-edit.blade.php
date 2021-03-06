@extends('layouts.app')


@section("title",'Sale edit')


@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
              # {{$user->id}}
                
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
            
            @include("form.user-form",[
                'user'=>$user,
                'action' =>route("admin-sale-save"),
                'mode' => $mode
            ])

        </div>
	</div>
		</div>
	</div>

    @if($mode == "edit")
    <div class="block">
        <div class="block-content">
            <h5 class="push-5">Documents</h5>
            <div class="row ">
                <table class=" table table-bordered table-striped js-dataTable-full dataTable no-footer">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th></th>
                            <th>Date upload</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($forms as $f)
                    <tr>
                        <td>{{$f->id}}</td>
                        <td>{{$f->name}}</td>
                        <td>
                            <a target="_blank" href="{{config('filesystems.disks.public.url').$f->path}}" class="btn btn-minw btn-primary" type="button">View</a>
                        </td>
                        <td>{{$f->created_at}}</td>
                        <td>{{$f->des}}</td>
                    </tr>

                    @endforeach 

                    </tbody>
                </table>
            </div>
        </div>
    </div>
	<div class="block">
        <div class="block-content">
            <div class="row">
                <div class="col-md-12">
                @include('form.upload-form',[
                    'user_id' => $user->id,
                    'action' => route('admin-sale-save'),
                    'mode'   => "new",
                    'form'   =>  $form,
                    'active' => false

                 ])
                </div>
            </div>
        </div>   
    </div>

    @endif
</div>

@endsection

@push('scripts')
<script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="/assets/js/plugins/bootbox/bootbox.min.js"></script>

<script>

@if($mode == "edit")    
$('input[name="email"').prop('readonly',true);    
@endif
    
</script>

@endpush