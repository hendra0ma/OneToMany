$(document).ready(function () {
    $.ajaxSetup({
        dataType:'json',
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                
                    }
                })
  
  var SITEURL = "{{url('/')}}";
 var calendar = $('#calendar').fullCalendar({
          editable: true,
          eventLimit: true,
          events: "{{route('routeLoadEvents')}}",
          displayEventTime: true,
          editable: true,
          eventRender: function (event, element, view) {
              if (event.allDay === 'true') {
                  event.allDay = true;
              } else {
                  event.allDay = false;
              }
            },
            selectable: true,
          selectHelper: true,
      select: function (event) {
            var full = $.fullCalendar.formatDate(event,"Y-MM-DD")+' '+('{{date("H:i:s")}}')
            $('#input2').val(full)

            $('#insertModalTask').modal('show')
            
                $('#click').click(function () {
                  $('#click').attr('disabled',true)
                  $.ajax({
                url:'/home/create',
              data :$('#formInsert').serialize(),
              type:'GET',
              success:function (data) {
                if (data == true) {
                  
                  $('#insertModalTask').modal('hide')
                  window.location.reload()
                }
                
                
                }
              })    
            })

              calendar.fullCalendar('unselect');
            },
      eventDrop: function (event) {
          change = $.fullCalendar.formatDate(event.start,"Y-MM-DD")+' '+('{{date("H:i:s")}}')
          $.ajax({
            url:'/home/ChangeDate',
            data :'start='+change+'&id='+event.id,
            type:'GET',
            success:function () {
              alert('success change date')
            }
          })
        }
      })
    })