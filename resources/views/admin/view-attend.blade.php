@extends('layouts.app')


@section("title",'Sales')


@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
              Events
                
            </h1>
        </div>
        
    </div>
</div>


<div class="content">
	<div class="block">
		<div class="block-content">
			<div class="row">
		
		<div class="col-md-12">
				<a href="{{route('admin-event-edit')}}" class="btn  btn-primary push-5" type="submit">Create new event</a>
			<table class="table table-bordered table-striped js-dataTable-full dataTable no-footer">
				
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th></th>
						
					</tr>

				</thead>
				<tbody>
				@foreach($events as $t)
				<tr>
					<td>
						{{$t->id}}
					</td>
					<td>
						{{$t->Fname}} {{$t->Lname}}
					</td>
					<td>
						<input type="checkbox" value=""/>
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

<script>


</script>

@endpush