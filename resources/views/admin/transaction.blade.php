@extends('layouts.app')


@section("title",'Dashboard')


@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
              All transaction
                
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
						<th>Sales</th>
						<th>Client</th>
						<th>Type</th>
						<th>Condition expiry date</th>
						<th>status</th>
					</tr>

				</thead>
				<tbody>
				@foreach($trans as $t)
				<tr>
					<td>
						<a target="_blank" href="{{ route('admin-tranction-view-single',['id'=>$t->id]) }}">{{$t->id}}
						</a>
					</td>	
					<td>{!! ($t->address != null ? $t->address->transAddress():"") !!}</td>	
					<td>{{ $t->user->Fname." ".$t->user->Lname}}</td>
					<td>{{($t->client != null ? $t->client->name():"") }}</td>	
					<td></td>	
					<td>{{$t->condition_expire}}</td>
					<td><a target="_blank" href="{{ route('admin-tranction-view-single',['id'=>$t->id]) }}" class="label label-info">{{$t->status}}</a></td>
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



@endpush