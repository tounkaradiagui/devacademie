@extends('parents.dashboard')
@section('content')

<div class="card">
    <div class="card-header" style="background-color: #0B6623 ;">
        <h4 style="text-align: center; color: white;">Formulaire de Pré-inscription <a href="{{url('parent/list-signup')}}" class="btn btn-danger float-end text-white btn-sm">retour</a></h4> 
    </div>

    <div class="card-body">
        <form action="{{url('parent/signup')}}" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="float-start mb-2">Nom</label>
                            <input type="text" name="nom" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="float-start mb-2">Prénom</label>
                            <input type="text" name="prenom" class="form-control">
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect02">Sexe</label>
                            <select name="sexe" class="form-select" id="inputGroupSelect02">
                                <option selected>-------Selectionner------</option>
                                <option value="{{}}">Masculin</option>
                                <option value="{{}}">Féminin</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="float-start">Date de naissance</label>
                            <input type="date" name="date_de_naissance" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="float-start">Lieu de naissance</label>
                            <input type="date" name="lieu_de_naissance" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="float-start mb-2">Lieu de résidence</label>
                            <input type="text" name="localite" class="form-control">
                        </div>


                        <div class="form-group mb-3">
                            <a href="#" type="submit" class="btn btn-sm text-white float-start" style="background-color: #0B6623;" >Soumettre</a>                            
                        </div>

                        
                    </div>

                    <div class="col-md-6">
        
                        <div class="form-group ">
                            <label for="" class="float-start">Image</label>
                            <input type="file" name="image" class="form-control float-start">
                        </div>
    
                        <div class="form-group">
                            <label for="" class="float-start mt-4">Acte de naissance</label>
                            <input type="file" name="acte" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="" class="float-start ">Adresse email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="float-start">Niveau demandé</label>
                            <select name="niveau" class="form-control mt-3">
                            @foreach ($niveau as $new)
                                <option value="{{$new->niveau}}">{{ $new->niveau}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="float-start">Classe</label>
                            <select name="classe" class="form-control mt-3">
                            @foreach ($classe as $new)
                                <option value="{{$new->libelle}}">{{ $new->libelle}}</option>
                            @endforeach
                        </div>

                        
        
                    </div>



                </div>
                
            </div>
        </form>
    </div>
</div>

@endsection