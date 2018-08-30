@extends('layouts.app')


@section("title",'Sales')
@push('custom-css')
 
<link rel="stylesheet" href="/assets/js/plugins/fullcalendar/fullcalendar.min.css">

@endpush

@section('content')
<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
            	Calendar
                
            </h1>
        </div>
        
    </div>
</div>


<div class="content">
	<div class="block">
		<div class="block-content">
			<div class="row">
		
		<div class="col-md-12">
			<div class="js-calendar"></div>
		</div>
	</div>
		</div>
	</div>
	
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-titlee"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<h5 class="time"></h5>
        <h5>Description</h5>

        <p class="des"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script src="/assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/assets/js/plugins/fullcalendar/moment.min.js"></script>
<script src="/assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="/assets/js/plugins/fullcalendar/gcal.min.js"></script>
<script>

$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})

var BaseCompCalendar = function() {
    // Add new event in the event list
    var addEvent = function() {
        var $eventInput      = jQuery('.js-add-event');
        var $eventInputVal   = '';

        // When the add event form is submitted
        jQuery('.js-form-add-event').on('submit', function(){
            $eventInputVal = $eventInput.prop('value'); // Get input value

            // Check if the user entered something
            if ( $eventInputVal ) {
                // Add it to the events list
                jQuery('.js-events')
                    .prepend('<li class="animated fadeInDown">' +
                            jQuery('<div />').text($eventInputVal).html() +
                            '</li>');

                // Clear input field
                $eventInput.prop('value', '');

                // Re-Init Events
                initEvents();
            }

            return false;
        });
    };

    // Init drag and drop event functionality
    var initEvents = function() {
        jQuery('.js-events')
            .find('li')
            .each(function() {
                var $event = jQuery(this);

                // create an Event Object
                var $eventObject = {
                    title: jQuery.trim($event.text()),
                    color: $event.css('background-color') };

                // store the Event Object in the DOM element so we can get to it later
                jQuery(this).data('eventObject', $eventObject);

                // make the event draggable using jQuery UI
                jQuery(this).draggable({
                    zIndex: 999,
                    revert: true,
                    revertDuration: 0
                });
            });
    };

    // Init FullCalendar
    var initCalendar = function(){
        var $date    = new Date();
        var $d       = $date.getDate();
        var $m       = $date.getMonth();
        var $y       = $date.getFullYear();

        jQuery('.js-calendar').fullCalendar({
            firstDay: 1,
            editable: true,
            droppable: true,
            header: {
                left: 'title',
                right: 'prev,next month,agendaWeek,agendaDay'
            },
            eventClick:function(event,jsEvent,view){
            	var modal = $('#exampleModal');
            	console.log(event);
            	modal.find('.modal-titlee').html(event.title);
            	modal.find('h5.time').html(event.start.format("HH:mm"));
            	modal.find('.modal-body').find('p.des').html(event.name);
            	$('#exampleModal').modal('show');
          
            },
          
            drop: function($date, $allDay) { // this function is called when something is dropped
                // retrieve the dropped element's stored Event Object
                var $originalEventObject = jQuery(this).data('eventObject');

                // we need to copy it, so that multiple events don't have a reference to the same object
                var $copiedEventObject = jQuery.extend({}, $originalEventObject);

                // assign it the date that was reported
                $copiedEventObject.start = $date;

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                jQuery('.js-calendar').fullCalendar('renderEvent', $copiedEventObject, true);

                // remove the element from the "Draggable Events" list
                jQuery(this).remove();
            },
            events:'{{route("user-calendar-feed")}}',
        
        });
    };

    return {
        init: function () {
            // Add Event functionality
            addEvent();

            // FullCalendar, for more examples you can check out http://fullcalendar.io/
            initEvents();
            initCalendar();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BaseCompCalendar.init(); });

</script>

@endpush