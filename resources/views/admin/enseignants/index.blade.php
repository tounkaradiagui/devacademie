@extends('admin.dashboard')
@section('content')



      <!-- ################### Début  Modal pour ajouter un enseignant    ############################## -->

      <div class="modal fade col-md-12" id="ajouter_classe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une classe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="{{url('admin/classes/create')}}" method="post">
                    @csrf
                    <div class="modal-body">
                      
                        <div class="container">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nom</label>
                                        <input type="text" class="form-control" name="nom">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Prénom</label>
                                        <input type="text" class="form-control" name="prenom">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <label for="">Sexe</label>
                                        <select name="sexe" id="">
                                            <option value="" selected>-----Selectionner-----</option>
                                            <option value="">Masculin</option>
                                            <option value="">Féminin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Date d'embauche</label>
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <label for="">Sexe</label>
                                        <select name="sexe" id="">
                                            <option value="" selected>-----Selectionner-----</option>
                                            <option value="">Masculin</option>
                                            <option value="">Féminin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Date d'embauche</label>
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                </div>
                            </div>

                            








                        <div class="row">

                          <div class="col-md-12">
                            <label for="niveau" class="float-start">Niveau</label>
                            
                          </div>

                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <label for="libelle" class="float-start">Libelle</label><br>
                            <input type="text" name="libelle" class="form-control mt-3">
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

   <!-- ###################  Fin du Modal pour ajouter un enseignant    ############################## -->



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter un niveau</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <form action= "{{ URL('admin/niveaux') }}" method="POST">
                    @csrf

                    <div class="modal-body">
                                                    
                        <div class="mb-3">
                            <label for="name" class="form-label"> Nom </label>
                            <input type="text" class="form-control" name="niveau">
                        </div>   
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>

            </div>
       
        </div>
    </div>
</div>

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4>La liste des ensegnants
                <a href="{{ url('admin/enseignant/create')}}" class="btn btn-primary btn-sm text-white float-end" >Ajouter un enseignant</a>
            </h4>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success" >{{session('success')}}</div>
            @endif

            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Niveau</th>
                        <th>Classe</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enseignants as $item)
                        <tr>
                            <td>{{ $item->nom }}</td>
                            <td>{{ $item->prenom }}</td>
                            <td>{{ $item->sexe }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->adresse }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->niveaux->niveau}}</td>
                            <td>{{ $item->classes->libelle }}</td>
                            <td>
                                <a href="{{url('admin/edit-enseignant/'.$item->id)}}" title="Modifier cet enseignant"><i class="fa fa-edit" style="font-size:20px; color:#0B6623;"></i></a>          
                            </td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" title="supprimer cet enseignant" ><i class="fa fa-trash" style="font-size:20px; color:red;"></i></a>          
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    
</div>

@endsection