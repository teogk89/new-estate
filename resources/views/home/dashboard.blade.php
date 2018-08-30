@extends('layouts.app')


@section("title",'Dashboard')


@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
              Dashboard
                
            </h1>
        </div>
        
    </div>
</div>


<div class="content">
	<div class="block">
		<div class="block-content">
			<div class="row">
		
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
						<th>Address</th>
						<th>Client</th>
						<th>Type</th>
						<th>Condition expiry date</th>
						<th>status</th>
						<th></th>
					</tr>

				</thead>
				<tbody>
				@foreach($trans as $t)
				<tr>
					<td>
						<a target="_blank" href="{{ route('edit-transaction',['id'=>$t->id]) }}">{{$t->id}}
						</a>
					</td>	
					<td>{!! ($t->address != null ? $t->address->transAddress():"") !!}</td>	
					<td>{{($t->client != null ? $t->client->name():"") }}</td>	
					<td></td>	
					<td>{{$t->condition_expire}}</td>
					@if($t->status != null)
					<td>
					
						<a target="_blank" href="{{ route('edit-transaction',['id'=>$t->id]) }}"><span class="btn btn-sm btn-info">{{$t->status}}</span></a>
					</td>
					<td></td>
					@else
					<td>
						<a target="_blank" href="{{ route('edit-transaction',['id'=>$t->id]) }}"><span class="btn btn-sm btn-info">Saved</span></a>
					</td>
					<td><button data-url="{{route('api-delete',['id'=>$t->id,'type'=>'trans'])}}" class="del btn btn-sm btn-danger push-5-r push-10" type="button"><i class="fa fa-trash-o"></i></button></td>	
					@endif
					
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