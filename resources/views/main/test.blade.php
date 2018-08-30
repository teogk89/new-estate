@extends('layouts.app')


@section('content')


<div class="col-md-5">
	<div class="progress">
    <div id="my-bar" class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 0%">30%</div>
                                    </div>
<form  id="my-form" method="POST" action="/upload" enctype="multipart/form-data">
	{{ csrf_field() }}

	<input id="fileinput" type="file" name="test" />
	<input id="my-click" type="submit" value="Send"/> 
</form>
</div>
@endsection

@push('scripts')

<script>

	$('input[type=file]').on('change', prepareUpload);

// Grab the files and set them to our variable
function prepareUpload(event)
{
  files = event.target.files;
}

(function( $ ) {
 
    $.fn.kFormUpload = function(options) {
 		
 		var settings = $.extend({
            // These are the defaults.
            color: "#556b2f",
            backgroundColor: "white"
        }, options );	
 		var method = $(this).attr('method');

 		var main = this;

        this.filter( "a" ).each(function() {
            var link = $( this );
            link.append( " (" + link.attr( "href" ) + ")" );
        });
        this.hello = function(e){
        	e.preventDefault();
        	console.log(settings.color);
        };
        this.test = function(e){
        	console.log(this);
        	e.preventDefault();
        	//console.log(method);
        	//main.hello();
        };
        console.log(this);

       	this.find('input[type="submit"]').eq(0).click(this.hello);
        
        $('#my-click').click(function(e){
                e.preventDefault();

                $('#my-form').submit();

        });
        return this;
 
    };
 
}( jQuery ));
	

$('#my-form').kFormUpload();



$("#my-clickk").click(function(e){
	e.preventDefault();
	//var file = document.getElementById('fileinput');
	var file = $('#fileinput').get();
	console.log(file);
	
	var form_data = new FormData();
     //	form_data.append('test', file);
    form_data.append('_token', '{{csrf_token()}}');
    form_data.append('test',file[0].files[0]);
    $.each(files, function(key, value)
    {
    	console.log(value);
      //  form_data.append('test', value);
    });

   // return false;
        console.log(form_data);
        $.ajax({
            url: "/upload",
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            xhr:function(){

            	var xhr = $.ajaxSettings.xhr();
		        if (xhr.upload) {
		            xhr.upload.addEventListener('progress', function(event) {
		                var percent = 0;
		                var position = event.loaded || event.position;
		                var total = event.total;
		                if (event.lengthComputable) {
		                    percent = Math.ceil(position / total * 100);
		                }
		                //update progressbar
		                $('#my-bar').css("width", + percent +"%");
		                $('#my-bar').text(percent +"%");
		            }, true);
		        }
		        return xhr;
            },
            success: function (data) {}

        });
});

</script>

@endpush

