<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Calendrier</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

 <!-- ################### Début  Modal pour ajouter   ############################## -->

 <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-white" style="background-color: #0050e3;">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un évènement</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" placeholder="Saisir le nom de l'évènement" id="title">
        <span id="titleError" class="text-danger"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" id="saveBtn" class="btn btn-success">Ajouter</button>
      </div>
    </div>
  </div>
</div>

   <!-- ###################  Fin du Modal pour ajouter   ############################## -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #0050e3;">
                    <h3 class="text-center mt-4 text-white"> Calendrier scolaire</h3>
                </div>
                <div class="card-body" style="background-color: #30c93e;">
                    <div class="col-md-12">
                        <div id="calendrier" class="text-white">
    
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $(document).ready(function() {
        var booking = @json($events);

        $('#calendrier').fullCalendar({
            header: {
                left:'prev, next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay',

            },
            events: booking,
            selectable: true,
            selectHlper:true,
            select:function(start, end, allDays)
            {
                $('#bookingModal').modal('toggle');

                $('#saveBtn').click(function(){
                    var title = $('#title').val();
                    var start_date = moment(start).format('YYYY-MM-DD');
                    var end_date = moment(end).format('YYYY-MM-DD');

                    $.ajax({
                        url:"{{route('calendrier.store')}}",
                        type:"POST",
                        dataType:'json',
                        data:{ title, start_date, end_date},
                        success:function(response)
                        {   $('#bookingModal').modal('hide');
                            $('#calendrier').fullCalendar('renderEvent',{
                                'title': response.title,
                                'start': response.start_date,
                                'end': response.end_date
                            });
                        },

                        error:function(error)
                        {
                            if(error.responseJSON.errors)
                            {
                                $('#titleError').html(error.responseJSON.errors.title);
                            }
                        },

                    });
                   
                });
            },
            editable:true,
            eventDrop:function(event) {
                var id = event.id;
                var start_date = moment(event.start).format('YYYY-MM-DD');
                var end_date = moment(event.end).format('YYYY-MM-DD');

                $.ajax({
                    url:"{{route('calendrier.update', '')}}" +'/'+ id,
                    type:"PATCH",
                    dataType:'json',
                    data:{start_date, end_date},
                    success:function(response)
                    {   
                        swal("Félicitations !", "Evenement mise à jour avec succès", "success");
                    },

                    error:function(error)
                    {
                        console.log(error)
                    },

                });
            }

        })
    });
</script>


</body>
</html>