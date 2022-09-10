@extends('layouts.admin')
@section('content')



      <!-- ################### Début  Modal pour ajouter une classe    ############################## -->

            <div class="modal fade col-md-12" id="ajouter_classe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #0050e3;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Ajouter une classe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{url('admin/classes/create')}}" method="post">
                    @csrf
                    <div class="modal-body">
                      
                      <div class="container">
                        <div class="row">

                          <div class="col-md-12">
                            <label for="niveau" class="float-start">Niveau</label>
                            <select name="niveau" class="form-control">
                              @foreach ($niveau as $new)
                                <option value="{{$new->id}}">{{ $new->niveau}}</option>
                              @endforeach
                            </select>
                          </div>

                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <label for="libelle" class="float-start mt-2">Libelle</label><br>
                            <input type="text" name="libelle" class="form-control">
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

   <!-- ###################  Fin du Modal pour ajouter une classe    ############################## -->





   <!-- ###################  Début Modal pour Modifier une classe    ############################## -->

   <div class="modal fade col-md-12" id="modifier_classe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter une classe</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ url('admin/edit-classe') }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
              
              <div class="container">
                <div class="row">

                  <div class="col-md-12">
                    <label for="niveau" class="float-start">Niveau</label>
                    <select name="niveau" class="form-control mt-3">
                      @foreach ($niveau as $new)
                        <option value="{{$new->id}}">{{ $new->niveau}}</option>
                      @endforeach
                    </select>
                  </div>

                </div>

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
              <button type="submit" class="btn btn-success">Modifier</button>
            </div>
          </form>
        </div>
      </div>
    </div>

   <!-- ###################  Fin  Modal pour Modifier une classe    ############################## -->

   
    <!-- debut de la card  -->
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
    <h5>La liste de classe
    <a href="#" class="btn btn-success btn-sm float-end text-white" data-bs-toggle="modal" data-bs-target="#ajouter_classe" >Ajouter une classe</a> 
    </h5>
  </div>
  <div class="card-body">
    <div class="container">
      <div class="row">

          <table id="example1" class=" table table-bordered">
            <thead class="text-center">
              <tr>
                <th>Niveau</th>
                <th>Libellé</th>
                <th colspan="3" >Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($classe as $display )
              <tr>
                <td>{{$display->niveau->niveau}}</td>
                <td>{{$display->libelle}}</td>
                <td class="text-center">
                    <a href="{{url('admin/edit-enseignant/'.$display->id)}}" title="Modifier cette classe"><i class="fa fa-edit" style="font-size:20px; color:#30c93e;"></i></a>          
                </td>
                
                <td class="text-center">
                    <a href="#"  value="" ><i class='fas fa-info-circle' style='font-size:20px;color:#0050e3' title="Détails"></i></a>
                </td>

                
              </tr>
              @endforeach
            </tbody>
          </table>
      </div> 
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          
          <div class="card">
            <div class="card-header text-white" style="background-color: #30c93e;">
                <h5>La liste des élèves par classe</h5>
            </div>

            <div class="card-body">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">1ère Année</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">2ème Année</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">3ème Année</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">7ème Année</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">8ème Année</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" >9ème Année</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" >10ème Année</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" >11ème Année</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" >Terminal</button>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>N° Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Sexe</th>
                            <th>Date de naissance</th>
                            <th>Lieu de naissance</th>
                            <th>Régime</th>
                            <th>Niveau</th>
                            <th>Classe</th>
                            <th>Parent</th>
                            <th colspan="2" >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classess as $display)
                            
                        <tr>
                            <td>
                                <img src="{{url('uploads/parent/'.$display->image)}}" width="60px" height="60px" alt="">
                            </td>
                            <td>{{$display->matricule}}</td>
                            <td>{{$display->nom}}</td>
                            <td>{{$display->prenom}}</td>
                            <td>{{$display->sexe}}</td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                            <td>{{$display->date_de_naissance}}</td>
                            <td>{{$display->lieu_de_naissance}}</td>
                            <td>{{$display->regime}}</td>
                            <td>{{$display->niveaux->niveau}}</td>
                            <td>{{$display->classe->libelle}}</td>
                            <td>{{$display->parents->nom}} {{$display->parents->prenom}}</td>
                            <td class="text-center">
                                <a href="#"  value="" ><i class='fas fa-info-circle' style='font-size:20px;color:#0050e3' title="Détails"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                                  
                  </table>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

                  <h1>Deuxième année</h1>


                </div>

                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">

                <h1>Troisième année</h1>

                </div>

                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">

                <h1>Quatrième année</h1>

                </div>

              </div>

            </div>
          </div>

        </div>
      </div>
  </div>
</section>







@endsection