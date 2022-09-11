@extends('enseignants.dashboard')
@section('content')


 <!-- ################### Début  Modal pour ajouter une classe    ############################## -->

<div class="modal fade col-md-12" id="ajouter_note" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0050e3;">
                <h5 class="modal-title text-white" id="exampleModalLabel">Ajouter une note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('enseignant/notes/create')}}" method="post">
                @csrf
                <div class="modal-body">
                
                    <div class="container">

                        <div class="row">
                            <div class="col-md-12">
                                <label for="libelle" class="float-start mt-2">Note</label><br>
                                <input type="text" name="note" class="form-control">
                                @error('note') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="niveau" class="float-start">Matière</label>
                                <select name="matiere_id" class="form-control">
                                @foreach ($matieres as $new)
                                    <option value="{{$new->id}}">{{ $new->libelle}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="eleve" class="float-start">Elève</label>
                                <select name="eleve_id" class="form-control">
                                @foreach ($kalanden as $new)
                                    <option value="{{$new->id}}">{{ $new->nom}} {{ $new->prenom}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="niveau" class="float-start">Trimestre</label>
                                <select name="trimestre_id" class="form-control">
                                @foreach ($trimestre as $new)
                                    <option value="{{$new->id}}">{{ $new->nom_trimestre}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="aprreciations" class="float-start mt-2">Appréciation</label><br>
                                <input type="text" name="appreciations" class="form-control">
                                @error('aprreciations') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Affecter</button>
                </div>
            </form>
        </div>
    </div>
</div>

   <!-- ###################  Fin du Modal pour ajouter une classe    ############################## -->


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

                <h5>Notes des élèves dans ma classe <a href="" data-bs-toggle="modal" data-bs-target="#ajouter_note" class="btn btn-success btn-sm text-white float-end" >Ajouter une Note</a></h5>
                    
                </div>
                <div class="card-body">
                    <table id="example1" class=" table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th colspan="2">Elève</th>
                                <th>Matière</th>
                                <th>Coefficient</th>
                                <th>Trimestre</th>
                                <th>Note</th>
                                <th>Appréciation</th>
                                <th colspan="2" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kalanden as $display )
                            <tr>
                                <td>{{$display->nom}}</td>
                                <td>{{$display->prenom}}</td>
                                <td>{{$display->libelle}}</td>
                                <td>{{$display->coefficient}}</td>
                                <td>{{$display->nom_trimestre}}</td>
                                <td>{{$display->note}}</td>
                                <td>{{$display->appreciation}}</td>
                                <td class="text-center">
                                    <a href="{{url('enseignant/edit-enseignant/'.$display->id)}}" title="Modifier cette classe"><i class="fa fa-edit" style="font-size:20px; color:#30c93e;"></i></a>          
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