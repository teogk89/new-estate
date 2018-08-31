@extends('layouts.app')


@section("title",$status)


@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
              {{$status}}
                
            </h1>
        </div>
        
    </div>
</div>


<div class="content">
	<div class="block">
		<div class="block-content">
			<div class="row">
		
		<div class="col-md-12">
			
			@if($trans->count() > 0)




			<table class="table table-bordered table-striped js-dataTable-full dataTable no-footer">
				
				<thead>
					<tr>
						<th>#</th>
						<th>Address</th>
						
						<th>Client</th>
						<th>Closed Date</th>
						<th>Type</th>

						@if($status == "open")
						<th>Condition expiry date</th>

						@elseif($status == "closed")
							<th>Price</th>
						@elseif($status == "terminated")
							<th>Reason</th>
						@else
							<th></th>
						@endif
						
						<th>Status</th>
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
					@if($status == "open")
					<td>{{$t->condition_expire}}</td>
					@elseif($status == "closed")
					<td>{{$t->price}}</td>	
					@elseif($status == "terminated")
						<td>{{ $t->reason_status }}</td>
					@else
						<th></th>
					@endif
					<td><a target="_blank" href="{{ route('admin-tranction-view-single',['id'=>$t->id]) }}" class="label label-info">{{$t->status}}</a></td>
				</tr>

				@endforeach	

				</tbody>
			</table>

			@else
			<p>There is no results</p>

			@endif
		</div>
	</div>
		</div>
	</div>
	
</div>
@endsection

@push('scripts')
<script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>



@endpush