@extends('layouts.app')


@section("title",'Commission')

@push('custom-css')
 
<link rel="stylesheet" href="/assets/js/plugins/datatables/jquery.dataTables.min.css">

@endpush

@section('content')

<?php

$com = \DB::table("transaction")->sum('commission');

$hst = \DB::table("transaction")->sum('hst_number');

$total = $com + $hst;
?>
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
              Commission
                
            </h1>
        </div>
        
    </div>
</div>


<div class="content">
	<div class="col-md-6">
		<div class="block">
			
			<div class="block-content">
				<table class="table table-borderless table-striped table-vcenter">
					<tr>
						<td><strong>Total commission</strong></td>
						<td><strong>{{$com}}</strong></td>
					</tr>
					<tr>
						<td><strong>Total HST</strong></td>
						<td><strong>{{$hst}}</strong></td>
					</tr>
					<tr>
						<td><strong>Total </strong></td>
						<td><strong>{{$total}}</strong></td>
					</tr>
				</table>

			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="block">
			<div class="block-content">
				
				<table class="js-dataTable-full mytable table table-borderless table-striped table-vcenter">
					<thead>
						<tr>
							<th>#</th>
							<th>Address</th>
							<th>Client</th>
							<th>Price</th>
							<th>Close date</th>
							<th>Commission</th>
							<th>HST</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach($trans as $t)
						<tr>
							<td>{{$t->id}}</td>
							<td>{!! ($t->address != null ? $t->address->transAddress():"") !!}</td>
							<td>{{($t->client != null ? $t->client->name():"") }}</td>	
							<td>{{$t->price}}</td>
							<td>{{$t->close_date}}</td>
							<td>{{$t->commission}}</td>
							<td>{{$t->hst_number}}</td>
							<td><?php echo ($t->hst_number + $t->commission) ?></td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>

		</div>
		
	</div>
	
</div>
@endsection

@push('scripts')
<script src="/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/js/pages/base_tables_datatables.js"></script>
<script>
	
$('.mytddable').dataTable({
	columnDefs: [ { orderable: false, targets: [ 1 ] } ],
	 pageLength: 10,
            lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]]
});

</script>

@endpush