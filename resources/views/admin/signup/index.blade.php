@extends('admin.dashboard')
@section('content')



      <!-- ################### Début  Modal pour ajouter une année    ############################## -->

      <div class="modal fade col-md-12" id="configModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #0050e3;">
                <h5 class="modal-title text-white" id="exampleModalLabel">Voulez-vous valider cette candidature ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <form action="{{url('admin/inscrit/')}}" method="post">
              @csrf
              <div class="modal-body">
                <div class="container">
                  <div class="row">
                    <input type="text"  id="idok" class="form-control">
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <input type="hidden" class="form-control" name="" id="nom">
                    </div>
                    <div class="col-md-6">
                      <input type="hidden" class="form-control" name="" id="prenom">
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <input type="hidden" class="form-control" name="" id="sexe">
                    </div>
                    <div class="col-md-6">
                      <input type="hidden" class="form-control" name="" id="">
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <input type="hidden" class="form-control" name="" id="">
                    </div>
                    <div class="col-md-6">
                      <input type="hidden" class="form-control" name="" id="">
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <input type="hidden" class="form-control" name="" id="">
                    </div>
                    <div class="col-md-6">
                      <input type="hidden" class="form-control" name="" id="">
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <input type="hidden" class="form-control" name="" id="">
                    </div>
                    <div class="col-md-6">
                      <input type="hidden" class="form-control" name="" id="">
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <input type="hidden" class="form-control" name="" id="">
                    </div>
                    <div class="col-md-6">
                      <input type="hidden" class="form-control" name="" id="">
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

   <!-- ###################  Fin du Modal pour ajouter une annee    ############################## -->


<div class="card">
    <div class="card-header text-white" style="background-color: #0050e3;">
        <h4 >La liste de pré-inscriptions 
          <!-- <a href="#"  class="btn btn-success btn-sm float-end text-white" >Ajouter</a> -->
        </h4>
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
            <table id="Datatables" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Niveau</th>
                    <th>Classe</th>
                    <th>Document</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inscrit as $display)
                <tr>
                  <td> <img src="{{url('uploads/parent/'.$display->image)}}" width="60px" height="60px" alt=""> </td>
                  <td>{{$display->nom}}</td>
                  <td>{{$display->prenom}}</td>
                  <td>{{$display->niveaux->niveau}}</td>
                  <td>{{$display->classe->libelle}}</td>
                  <td class="text-center">
                    <a href="{{url('uploads/documents/' .$display->acte_de_naissance)}}" download title="Télécharger les documents" > <i class="material-icons" style="font-size:30px">cloud_download</i> </a>
                  </td>
                  <td>{{$display->statut}}</td>
                  <td class="text-center">
                    <a href="{{url('admin/edit-candidat/'.$display->id)}}" title="Valider la candidature"><i class='fas fa-check-circle' style='font-size:20px; color:#0B6623 '></i></a>
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
      </div>
  </div>

</div>


  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> -->

 
@endsection

