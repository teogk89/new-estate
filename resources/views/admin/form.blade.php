@extends('layouts.app')


@section("title",'Forms')


@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
              Forms
                
            </h1>
        </div>
        
    </div>
</div>


<div class="content">
	<div class="block">
		<div class="block-content">
		<div class="row">
		<div class="col-md-3 push-15">
			
			<a href="{{route('admin-form-edit')}}" class="btn btn-sm btn-primary" type="submit">Create new form</a>
		</div>
		<div class="col-md-12">
			<select>
				
				<option>All</option>
				<option>Open transaction</option>
				<option>Terminated transaction</option>
			</select>

			<table class="table table-borderless">
				
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Path</th>
					
						<th></th>
						<th></th>
					</tr>

				</thead>
				<tbody>
				@foreach($forms as $t)
				<tr <?php echo ($t->active == 0 ? "class='warning'":"") ?>>
					<td>
						{{$t->id}}
					</td>
					<td>
						{{$t->name}}
					</td>
					<td><a target="_blank" href="{{config('filesystems.disks.public.url').$t->path}}"class="btn btn-minw btn-primary" type="button">View</a></td>
					<td><a href="{{ route('admin-form-edit',['id'=>$t->id])}}"class="btn btn-minw btn-primary" type="button">Edit</a></td>

					<td>
						<button data-url="{{route('admin-delete',['id'=>$t->id,'type'=>'form'])}}" class="del btn btn-sm btn-danger" type="button"><i class="fa fa-trash-o"></i></button>
					</td>

				</tr>

				@endforeach	

				</tbody>
			</table>
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
	
var token = '{{csrf_token()}}';	
$('.del').click(function(){

	var tr = $(this).closest('tr');
	var url = $(this).attr('data-url');
	bootbox.confirm('Are you sure to delete ?',function(result){

		if(result){

			var token = '{{csrf_token()}}';
			$.post(url,{_token:token});

			tr.remove();

		}
		
	});


});
</script>

@endpush