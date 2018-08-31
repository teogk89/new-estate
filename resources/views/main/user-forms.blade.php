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
		
			@include('table.form-table',['forms'=>$forms])
			</div>
		</div>
	</div>
	
</div>
@endsection

@push('scripts')
<script src="/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>


@endpush