@extends('enseignants.dashboard')
@section('content')


 <!-- ################### Début  Modal pour ajouter un cours    ############################## -->

<div class="modal fade col-md-12" id="ajouter_note" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0050e3;">
                <h5 class="modal-title text-white" id="exampleModalLabel">Ajouter un cours</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('enseignant/cours')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                
                    <div class="container">

                        <div class="row">
                            <div class="col-md-12">
                                <label for="nom_du_cours" class="float-start mt-2">Nom du cours</label><br>
                                <input type="text" name="nom_du_cours" class="form-control">
                                @error('nom_du_cours') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="niveau" class="float-start">Nom de la matière</label>
                                <select name="matiere_id" class="form-control">
                                @foreach ($matieres as $new)
                                    <option value="{{$new->id}}">{{ $new->libelle}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                       
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nombre_heures" class="float-start mt-2">Nombre d'heures</label><br>
                                <input type="text" name="nombre_heures" class="form-control">
                                @error('nombre_heures') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="float-start">Support</label>
                                    <input type="file" name="support" class="form-control">
                                </div>
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

   <!-- ###################  Fin du Modal pour ajouter un cours    ############################## -->


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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white" style="background-color: #0050e3;">

                <h5>Mes cours <a href="" data-bs-toggle="modal" data-bs-target="#ajouter_note" class="btn btn-success btn-sm text-white float-end" >Ajouter un cours</a></h5>
                    
                </div>
                <div class="card-body">
                    <table id="example1" class=" table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>Nom du cours</th>
                                <th>Matière</th>
                                <th>Nombre d'heures</th>
                                <th>Support</th>
                                <th>Date d'ajout</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cours as $display )
                            <tr>
                                <td>{{$display->nom_du_cours}}</td>
                                <td>{{$display->matiere->libelle}}</td>
                                <td>{{$display->nombre_heures}}</td>
                                <td >
                                    <a href="{{url('uploads/cours/' .$display->support)}}" download title="Télécharger vos documents" > <i class="material-icons" style="font-size:30px">cloud_download</i> </a>
                                </td>
                                <td>{{$display->created_at}}</td>
                                <td class="text-center">
                                    <a href="{{url('enseignant/edit-cours/'.$display->id)}}" title="Modifier cette classe"><i class="fa fa-edit" style="font-size:20px; color:#30c93e;"></i></a>          
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
</div>

@endsection()