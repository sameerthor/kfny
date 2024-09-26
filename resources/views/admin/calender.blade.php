@extends('layouts.app')
@section('content')
<style>
  .mds-tooltip {
    font-size: 15px;
    font-weight: 600;
  }

  .mds-tooltip-header {
    padding: 12px 16px;
    color: black;
  }

  .mds-tooltip-label {
    line-height: 32px;
  }

  .mds-tooltip-button.mbsc-button {
    font-size: 14px;
    margin: 0;
  }

  .mds-tooltip-button.mbsc-material {
    font-size: 12px;
  }
</style>
<link href="{{ asset('js/calender/css/mobiscroll.jquery.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/calender/js/mobiscroll.jquery.min.js') }}"></script>
<!-- main contaienr html start -->
<div class="main_container">
  <div class="invoic_section_header">
    <div class="row">

      <div id="demo-month-view"></div>
      <div id="demo-tooltip-popup" class="mds-tooltip mds-popup">
        <div id="demo-tooltip-header" class="mds-tooltip-header">
          <span id="demo-tooltip-info"></span>
          <span id="demo-tooltip-time" class="mbsc-pull-right"></span>
        </div>
        <div class="mbsc-padding">
        </div>
      </div>
    </div>
  </div>
</div>

<!-- main  container html end -->
@endsection
@push('custom-scripts')
<script>
  function toTitleCase(str) {
    return str.replace(
      /\w\S*/g,
      text => text.charAt(0).toUpperCase() + text.substring(1).toLowerCase()
    );
  }
  $(function() {
    function openTooltip(args) {
      var formatDate = mobiscroll.formatDate;
      var event = args.event;
      $("#demo-tooltip-info").text(event.title)
      $("#demo-tooltip-time").text(formatDate('DD MMM', new Date(event.start)))
      $("#demo-tooltip-popup").find(".mbsc-padding").html("");
      $.each(event.data, function(key, val) {
        $("#demo-tooltip-popup").find(".mbsc-padding").append('<div class="mds-tooltip-label mbsc-margin">' + toTitleCase(key.replace("_", " ")) + ': <span  class="mbsc-light">' + (val == null ? "N/A" : val) + '</span></div>');
      });
      $tooltipHeader.css('background-color', event.color);

      clearTimeout(timer);
      timer = null;

      tooltip.setOptions({
        anchor: args.domEvent.target.closest('.mbsc-timeline-event')
      });
      tooltip.open();
    }

    var $tooltip = $('#demo-tooltip-popup');
    var $tooltipHeader = $('#demo-tooltip-header');
    var timer;

    mobiscroll.setOptions({
      theme: 'ios',
      themeVariant: 'light'
    });

    var calendar = $('#demo-month-view')
      .mobiscroll()
      .eventcalendar({
      
        view: {
          timeline: {
            type: 'month',
            eventList: true
          },
        },
        resources: <?php echo json_encode($employees); ?>,
        clickToCreate: false,
        dragToCreate: false,
        dragToMove: true,
        dragToResize: false,
        dragInTime: false,
        dragBetweenResources: false,
        eventDelete: false,
        onEventUpdate: function(args, inst) {
          console.log(args.event);
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('update.calender.data') }}",
            async: false,
            data: {
              "appearance_model": args.event.appearance_model,
              "appearance_type": args.event.appearance_type,
              "appearance_column": args.event.appearance_column,
              "appearance_id": args.event.appearance_id,
              "from_date": dateFormat(args.event.start),
              "to_date": dateFormat(args.event.end),
              "employee_id": args.event.resource

            },
            type: 'POST',
            dataType: 'json',
            success: function(result) {

            }
          });
        },
        showEventTooltip: false,
        onEventDragStart: function() {
          tooltip.close();
        },
        onEventClick: openTooltip,
        onEventHoverIn: openTooltip,
        onEventHoverOut: function() {
          if (!timer) {
            timer = setTimeout(function() {
              tooltip.close();
            }, 200);
          }
        },
      }).mobiscroll('getInst');;

    $.getJSON(
      "{{route('calender.data')}}",
      function(events) {
        calendar.setEvents(events);
      },
      'jsonp',
    );

    var tooltip = $tooltip
      .mobiscroll()
      .popup({
        contentPadding: false,
        display: 'anchored',
        scrollLock: false,
        showOverlay: false,
        touchUi: false,
        width: 350,
      })
      .mobiscroll('getInst');

    $tooltip.on('mouseenter', function() {
      if (timer) {
        clearTimeout(timer);
        timer = null;
      }
    });

    $tooltip.on('mouseleave', function() {
      timer = setTimeout(function() {
        tooltip.close();
      }, 200);
    });

    function dateFormat(d) {
      const padL = (nr, len = 2, chr = `0`) => `${nr}`.padStart(2, chr);
      var dt = new Date(d);
      var new_date = `${dt.getFullYear()}-${padL(dt.getMonth() + 1)}-${padL(dt.getDate())}T${padL(dt.getHours())}:${padL(dt.getMinutes())}`
      return new_date;
    }

  });
</script>
@endpush