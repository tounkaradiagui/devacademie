@extends('admin.dashboard')
@section('content')

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
    <div class="card-header" style="background-color: #0050e3;">
    <h4 style="text-align: center; color: white;"> <marquee behavior="" direction="">
            <h6 class="text-white">Veuillez vérifier attentivement les informations saisies avant d'envoyer la candidature. Une fois envoyées, vous ne pourrez plus les modifier.</h6>
        </marquee>
        <!-- <a href="{{url('parent/list-signup')}}" class="btn btn-danger float-end text-white btn-sm">retour</a> -->
    </div>

    <div class="card-body">
        <form action="{{url('admin/inscrit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="float-start">Nom</label>
                            <input type="text" name="nom" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="float-start">Prénom</label>
                            <input type="text" name="prenom" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="float-start ">Date de naissance</label>
                            <input type="date" name="date_de_naissance" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group ">
                            <label class="input-group-text mt-4" for="inputGroupSelect02">Sexe</label>
                            <select name="sexe" class="form-select mt-4" id="inputGroupSelect02">
                                <option selected>-------Selectionner------</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Féminin">Féminin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="float-start">Lieu de naissance</label>
                            <input type="text" name="lieu_de_naissance" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="float-start">Lieu de résidence</label>
                            <input type="text" name="localite" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="float-start">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="float-start mt-3">Acte de naissance</label>
                            <input type="file" name="acte_de_naissance" class="form-control">
                        </div>
                    
                        <div class="form-group">
                            <label for="" class="float-start">Niveau demandé</label>
                            <select name="niveau_id" class="form-control mt-3">
                            @foreach ($niveau as $new)
                                <option value="{{$new->id}}">{{ $new->niveau}}</option>
                            @endforeach
                            </select>
                        </div>

                        
                        <div class="form-group">
                            <label for="" class="float-start">Classe</label>
                            <select name="classe_id" class="form-control mt-3">
                            @foreach ($classe as $new)
                                <option value="{{$new->id}}">{{ $new->libelle}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="float-start">Année scolaire</label>
                            <select name="annee" class="form-control mt-3">
                            @foreach ($annee as $new)
                                <option value="{{$new->id}}">{{ $new->libelle}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mt-2 ">
                            <label for="" class="float-start">Image</label>
                            <input type="file" name="image" class="form-control float-start">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mt-4">
                            <button type="submit" class="btn text-white float-start" style="background-color: #0B6623;" >Soumettre</a>                            
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>

@endsection