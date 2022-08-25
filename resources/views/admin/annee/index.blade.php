@extends('admin.dashboard')
@section('content')

<div class="card">
    <div class="container">
        @if (session('message'))
                    <div class="alert alert-success" >{{session('massage')}}</div>
                @endif

        <div class="row">
            <div class="card-header">

                        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Launch demo modal
            </button>

             Modal
             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
            
                <a href="{{url('admin/annee/create')}}" class="btn btn-primary btn-sm float-end text-white" >Ajouter</a>
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