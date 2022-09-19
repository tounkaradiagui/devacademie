@extends('enseignants.dashboard')
@section('content')


 <!-- ################### Début  Modal pour ajouter une absence    ############################## -->

<div class="modal fade col-md-12" id="ajouter_absence" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0050e3;">
                <h5 class="modal-title text-white" id="exampleModalLabel">Ajouter une absence</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('enseignant/absences')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="eleve_id" class="float-start">Nom de l'élève</label>
                                <select name="eleve_id" class="form-control">
                                @foreach ($kalanden as $new)
                                    <option value="{{$new->id}}">{{ $new->nom}} {{ $new->prenom}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="niveau" class="float-start">Nom du cours</label>
                                <select name="cours_id" class="form-control">
                                @foreach ($cours as $new)
                                    <option value="{{$new->id}}">{{ $new->nom_du_cours}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="nombre_heures" class="float-start mt-2">Motifs</label><br>
                                <input type="text" name="motifs" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="avertissements" class="float-start mt-2">Avertissement</label><br>
                                <textarea name="avertissements" id="" cols="30" rows="5" class="form-control"></textarea>
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

                <h5>Liste des élèves ayant absentés aux cours suivants <a href="" data-bs-toggle="modal" data-bs-target="#ajouter_absence" class="btn btn-success btn-sm text-white float-end" >Ajouter une absence</a></h5>
                    
                </div>
                <div class="card-body">
                    <table id="example1" class=" table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th colspan="2">Nom des élèves</th>
                                <th>Cours</th>
                                <th>Motifs</th>
                                <th>Avertissements</th>
                                <th>Date d'absences</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absences as $display )
                            <tr>
                                <td>{{$display->eleve->nom}}</td>
                                <td>{{$display->eleve->prenom}}</td>
                                <td>{{$display->cours->nom_du_cours}}</td>
                                <td>{{$display->motifs}}</td>
                                <td>{{$display->avertissements}}</td>
                                <td>{{$display->created_at}}</td>
                                <td class="text-center">
                                    <a href="{{url('enseignant/edit-absences/'.$display->id)}}" title="Modifier cette classe"><i class="fa fa-edit" style="font-size:20px; color:#30c93e;"></i></a>          
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