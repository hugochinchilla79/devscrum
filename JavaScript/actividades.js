var base_url = $(".url").val();
$("#fecha").datepicker();
  $("#eliminar").dialog({
    autoOpen:false,
    width:420,
    buttons:{
      Si: function() {
          $.ajax({
            url: base_url+"actividades/deleteActividad/"+$("#registro").val(),
            type: "POST",
            success: function(){
              $(location).attr("href",base_url+"actividades/gestion_actividades");
            }
          })
      },
      No: function() {
        $(this).dialog("close");
      }
    }
  })

  $("#dialog").dialog({
    autoOpen: false,
    width: 420,
    buttons:{
      Modificar: function() {
          $(location).attr("href",base_url+"actividades/modificar_actividad/"+$("#numero").val());
      },
      Eliminar: function() {
          $("#registro").val($("#numero").val());
          $("#eliminar").dialog("open");
      }

    }
  })


  $('#calendar').fullCalendar({
      theme: true,
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      //editable: true,
      eventLimit: false, // allow "more" link when too many events
      eventSources: [eventos_0],
      eventRender: function(event, element) {
            element.find('.fc-content').off("click");
            element.find('.fc-content').on('click',function(){
              //alert(event.id);
                $("#numero").val(event.id);
                $("#dialog").empty();
                $("#dialog").append("<b>Nombre Actividad: </b>"+event.title+"<br/>");
                $("#dialog").append("<b>Descripci&oacute;n: </b>"+event.description+"<br/>");
                $("#dialog").dialog("open");

            });
          }
    });