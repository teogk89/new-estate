

<?php

$file = null;

if(isset($trans_type->id)){


		$file = \App\Model\TransactionFile::where("transaction_id",$trans_type->id)->where("file_name",$name)->first();
}
?>

@if($file != null)

<div class="row">
	<div class="col-md-12">
		<a target="_blank" data-name="{{$file->file_name}}" class="btn btn-info" href="/storage/{{$file->path}}"><i class="fa fa-download"></i> Download</a>   
		<button data-id="{{$file->id}}" class="del-btn btn btn-danger" type="button"><i class="fa fa-times"></i> Delete</button>
	</div>	

</div>
<input style="display:none" name="{{$name}}" type="file" class="form-control"/>
@else
<input name="{{$name}}" type="file" class="form-control"/>
@endif