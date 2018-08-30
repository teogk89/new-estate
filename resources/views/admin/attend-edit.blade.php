@extends('layouts.app')


@section("title",'Sales')
@push('custom-css')
 
<link rel="stylesheet" href="/assets/js/plugins/datatables/jquery.dataTables.min.css">

@endpush

@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
              {{$event->name}}
                
            </h1>
        </div>
        
    </div>
</div>


<div class="content">
	<div class="block">
		<div class="block-content">
			<div class="row">
		
		<div class="col-md-12">
			<form action="{{route('admin-attend-save')}}" method="POST">
			      {{ csrf_field() }}
			 <input type="hidden" name="id" value="{{$event->id}}"/>     	
			<table  id="my-table" class="table table-bordered table-striped js-dataTable-full-pagination">
				
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Attend</th>
						
					</tr>

				</thead>
				<tbody>
				@foreach($users as $t)
				<tr>
					<td>
						{{$t->id}}
					</td>
					<td>
						{{$t->Fname}} {{$t->Lname}}
					</td>
					<td>
						<input type="checkbox" name="user[{{$t->id}}]"value="{{$t->id}}"

						<?php 
							if(in_array($t->id,$users_id)){

								echo "checked";
							}

						?>

						/>
					</td>
					
				</tr>

				@endforeach	

				</tbody>
			</table>
			<button class="btn btn-minw btn-primary" type="submit">Update</button>
			</form>
		</div>
	</div>
		</div>
	</div>
	
</div>

@endsection

@push('scripts')
<script src="/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/js/pages/base_tables_datatables.js"></script>
<script>


</script>

@endpush