@extends('admin.dashboard')
@section('content')

      <!-- ################### Début  Modal pour ajouter une année    ############################## -->

      <div class="modal fade col-md-12" id="ajouter_annee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une année</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <form action="{{url('admin/annee/create')}}" method="post">
              @csrf
              <div class="modal-body">
                
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <label for="libelle" class="float-start mb-2">Libelle</label><br>
                      <input type="text" name="libelle" class="form-control">
                      @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <label for="libelle" class="float-start mb-2">Date de début</label><br>
                      <input type="date" name="date_de_debut" class="form-control">
                      @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <label for="libelle" class="float-start mb-2">Date de fin</label><br>
                      <input type="date" name="date_de_fin" class="form-control">
                      @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                  </div>
                </div>
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-success">Ajouter</button>
              </div>
            </form>
          </div>
        </div>
      </div>

   <!-- ###################  Fin du Modal pour ajouter une annee    ############################## -->


     

<div class="card">
    <div class="container">

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
       
        <div class="row">
            <div class="card-header">
            
                <a href="#" data-bs-toggle="modal" data-bs-target="#ajouter_annee" class="btn btn-primary btn-sm float-end text-white" >Ajouter</a>
            </div>
            
            <div class="card-body">
                
                <table id="myDataTable" class=" table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>libelle</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($annee as $display )
                    <tr>
                        <td>{{$display->id}}</td>
                        <td>{{$display->libelle}}</td>
                        <td>{{$display->date_de_debut}}</td>
                        <td>{{$display->date_de_fin}}</td>   
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" title="modifier les info" ><i class="fa fa-edit" style="font-size:20px; color:#0B6623;"></i></a>          
                        </td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" title="supprimer les info" ><i class="fa fa-trash" style="font-size:20px; color:red;"></i></a>          
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
   
</div>


    
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


@endsection