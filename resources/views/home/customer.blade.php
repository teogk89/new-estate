@extends('layouts.app')


@section("title",'Dashboard')


@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
              Customer
                
            </h1>
        </div>
        
    </div>
</div>


<div class="content">
	<div class="block">
		<div class="block-content">
		<div class="row">
		<div class="col-md-3 push-15">
			
			<a href="{{route('customer-edit')}}" class="btn btn-sm btn-primary" type="submit">Create new customer</a>
		</div>
		<div class="col-md-12">
			<select>
				
				<option>All</option>
				<option>Open transaction</option>
				<option>Terminated transaction</option>
			</select>

			<table class="table table-bordered table-striped js-dataTable-full dataTable no-footer">
				
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th></th>
						<th></th>
					</tr>

				</thead>
				<tbody>
				@foreach($clients as $t)
				<tr>
					<td>
						<a>{{$t->id}}
						</a>
					</td>	
					<td>{{ $t->Fname." ".$t->Lname }}</td>
					<td>{{ $t->email}}</td>
					<td><a href="{{route('customer-edit',['id'=>$t->id])}}" class="btn btn-sm btn-info">Edit</a></td>
					<td><button data-url="{{route('api-delete',['id'=>$t->id,'type'=>'cus'])}}" class="del btn btn-sm btn-danger" type="button"><i class="fa fa-trash-o"></i></button></td>	
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

		var token = '{{csrf_token()}}';
		$.post(url,{_token:token});

		tr.remove();
	});


});
</script>


@endpush