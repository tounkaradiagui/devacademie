@extends('admin.dashboard')
@section('content')


<div class="card">
    @if (session('message'))
        <div class="alert alert-success" >{{session('massage')}}</div>
    @endif
    <div class="card-header" style="background-color: #0B6623 ;">

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #0B6623 ;">
              <h5 class="modal-title text-white" id="exampleModalLabel">Validation de la candidature</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Voulez-vous vraiment valider cette candidature ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-success">Valider</button>
            </div>
          </div>
        </div>
      </div>
    

        <h4 style="text-align: center; color: white;">La liste de pré-inscriptions </h4> 
    </div>
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

        <div class="card-body">
        <table id="myTable1" class="table table-bordered">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Niveau</th>
                    <th>Classe</th>
                    <th>Document</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inscrit as $display)
                <tr>
                  <td> <img src="{{url('uploads/parent/'.$display->image)}}" alt=""> </td>
                  <td>{{$display->nom}}</td>
                  <td>{{$display->prenom}}</td>
                  <td>{{$display->niveaux->niveau}}</td>
                  <td>{{$display->classe->libelle}}</td>
                  <td> <a href="{{url('uploads/documents/' .$display->acte_de_naissance)}}" download title="Acte de naissance" > <i class="material-icons">attachment</i> </a> </td>
                  <td>
                    <a href="{{url('admin/edit-eleve/'.$display->id)}}" title="Modifier la candidature" ><i class="fa fa-edit" style="font-size:20px; color:#0B6623;"></i></a>
                    <!-- <i class="fa fa-eye" style="font-size:20px; color:#0B6623;"></i>           -->
                  </td>
                  <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Valider la candidature" ><i class='fas fa-check-double' style='font-size:20px; color:#0B6623 '></i></a>
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

