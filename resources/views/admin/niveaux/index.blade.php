@extends('layouts.admin')
@section('content')


<!-- ############# Début du Modal d'ajout   ############## -->

<div class="modal fade" id="ajouter_niveau" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #0050e3;">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un niveau</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <form action= "{{url('admin/niveaux/create')}}" method="POST">
                    @csrf

                    <div class="modal-body">
                                                    
                        <div class="mb-3">
                            <label for="name" class="form-label"> Nom </label>
                            <input type="text" class="form-control" name="niveau">
                        </div>   
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

  <!-- ############# Fin du Modal d'ajout   ############## -->


  
   <!-- ###################  Début Modal pour Modifier une classe    ############################## -->

   <div class="modal fade col-md-12" id="modifier_niveau" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-white" style="background-color: #0050e3;">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter un niveau</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ url('admin/edit-niveau') }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
              
              <div class="container">

                <div class="row">
                  <div class="col-md-12">
                    <label for="libelle" class="float-start">Libelle</label><br>
                    <input type="text" name="libelle" class="form-control mt-3" value="">
                    @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
                  </div>
                </div>
              </div>
            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-success">Valider</button>
            </div>
          </form>
        </div>
      </div>
    </div>

   <!-- ###################  Fin  Modal pour Modifier une classe    ############################## -->


<div class="card">
        @if (session()->has("success"))
                <div class="alert alert-success">
                    <h3>{{session()->get('success')}}</h3>
                </div>           
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul >               
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach              
                </ul>
            </div>
                
        @endif
    <div class="card-header text-white" style="background-color: #0050e3;">
        La liste de niveaux <a href="#" class="btn btn-success btn-sm float-end text-white" data-bs-toggle="modal" data-bs-target="#ajouter_niveau" > Ajouter un niveau</a>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered">
            <thead>
            
                
                <tr>
                    <th>Niveau</th>
                    <th colspan="2" >Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($niveau as $nom )
                <tr>
                    <td>{{$nom->niveau}}</td>
                    <td>
                        <a href="{{url('admin/edit-niveau/'.$nom->id)}}"  title="modifier les info"><i class="fa fa-edit" style="font-size:20px; color:#0B6623;"></i></a>          
                    </td>
                    <td>
                        <a href="#" value="{{$nom->id}}" data-bs-toggle="modal" data-bs-target="#deleteModal" title="supprimer les info" ><i class="fa fa-trash" style="font-size:20px; color:red;"></i></a>          
                    </td>
                
                </tr>
                    
            @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection


@section('scripts')

    <script>
        $(document).ready(function(){

            // first method
            // $('.deletevolbtn').click(function(e){
                // e.preventDefault();

            // the second one.
            $(document).on('click', '.deletevolbtn', function(e){
            e.preventDefault();

                var vol_id = $(this).val();
                $('#vol_id').val(vol_id);
                $('#deleteModal').modal('show');
            });
        });
    </script>

    
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


@endsection()