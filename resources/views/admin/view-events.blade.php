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
						<th>Time</th>
						<th></th>
						<th></th>
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
						{{$t->name}}
					</td>
					<td>
						{{$t->when}}
					</td>
					<td>
						<a href="{{route('admin-event-edit',['id'=>$t->id])}}" class="btn btn-minw btn-primary" type="button">Edit</a>
					</td>
					<td>
				<button data-name="	{{$t->name}}" data-toggle="modal" data-target="#exampleModal" data-url="{{route('admin-event-attend',['id'=>$t->id])}}" class="btn btn-minw btn-primary" type="button">Attendances</button>
					<a href="{{route('admin-attend-edit',['id'=>$t->id])}}" class="btn btn-minw btn-primary" type="button">Edit</a>
					</td>

					<td>
						
						<button data-url="{{route('admin-delete',['id'=>$t->id,'type'=>'event'])}}" class="del btn btn-sm btn-danger" type="button"><i class="fa fa-trash-o"></i></button>
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
<div id="exampleModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <table class="table">
        	<thead>
        		<tr>
        			<th>#</th>
        			<th>Name</th>
        		</tr>
        	</thead>	
        	<tbody></tbody>
        </table>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/js/plugins/bootbox/bootbox.min.js"></script>

<script>
	$('#exampleModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('url') // Extract info from data-* attributes
			var name = button.data("name");

		var table = $(this).find("table").first();
		var modal = $(this);
		var tbody = table.find('tbody').first();
		modal.find('.modal-title').first().html(name);
		tbody.empty();
		
		$.get(recipient,function(data){

			tbody.append(data);
			
		});

		 
		 
		
	});
	
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