

@if($attends->count() > 0)

@foreach($attends as $a)


<tr>
	<td>{{$a->user->id}}</td>
	<td>{{$a->user->Fname}} {{$a->user->Lname}}</td>
</tr>

@endforeach

@else

<tr>
	<td></td>
	<td>There is no result</td>
</tr>

@endif

