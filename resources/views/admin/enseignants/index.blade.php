@extends('admin.dashboard')
@section('content')
      <!-- ################### Début  Modal pour ajouter un enseignant    ############################## -->

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
        <div class="card-header text-white" style="background-color: #0050e3;">
            <h4>La liste des ensegnants
                <a href="{{ url('admin/enseignant/create')}}" class="btn btn-success btn-sm text-white float-end" >Ajouter un enseignant</a>
            </h4>
        </div>

        <div class="card-body">
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

            <table id="example1" class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Niveau</th>
                        <th>Classe</th>
                        <th colspan="4">Actions</th>
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
                                <a href="{{url('admin/edit-enseignant/'.$item->id)}}" title="Modifier cet enseignant"><i class="fa fa-edit" style="font-size:20px; color:#30c93e;"></i></a>          
                            </td>
                            <td>
                                <a href="#" ><i class='fas fa-comment-dots' style='font-size:20px;color:#30c93e' title="Contacter"></i></a>
                            </td>
                            <td>
                                <a href="#"  value="" ><i class='fas fa-info-circle' style='font-size:20px;color:#0050e3' title="Détails"></i></a>
                            </td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" title="archiver cet enseignant" ><i class="fa fa-archive" style="font-size:20px; color:red;"></i></a>          
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    
</div>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
 -->

@endsection