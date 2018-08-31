<table class=" table table-bordered table-striped js-dataTable-full dataTable no-footer">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th></th>
							<th>Date upload</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
					@foreach($forms as $f)
					<tr>
						<td>{{$f->id}}</td>
						<td>{{$f->name}}</td>
						<td>
							<a target="_blank" href="/storage/{{$f->path}}" class="btn btn-minw btn-primary" type="button">View</a>
						</td>
						<td>{{$f->created_at}}</td>
						<td>{{$f->des}}</td>
					</tr>

					@endforeach	

					</tbody>
				</table>