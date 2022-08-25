@extends('layouts.admin')

@section('content')


<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4>La liste des enseignants
                <a href="{{ url('admin/enseignants')}}" class="btn btn-primary btn-sm text-white float-end" >Liste enseignant </a>
            </h4>
        </div>

        <div class="card-body">
                    
        <form action="{{url('admin/ensegnant/create')}}" method="post">
                @csrf
                
            <div class="row">

                <div class="col-md-4 mb- 3">
                    <label for="libelle" class="float-start">Nom</label><br>
                    <input type="text" name="nom" class="form-control mt-3">
                    @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-4 mb- 3">
                    <label for="libelle" class="float-start">Prénom</label><br>
                    <input type="text" name="prenom" class="form-control mt-3">
                    @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-4 mb- 3">
                    <label for="libelle" class="float-start">Sexe</label><br>
                    <input type="text" name="libelle" class="form-control mt-3">
                    @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-4 mb- 3">
                    <label for="libelle" class="float-start">Email</label><br>
                    <input type="email" name="email" class="form-control mt-3">
                    @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-4 mb- 3">
                    <label for="libelle" class="float-start">Date d'embauche</label><br>
                    <input type="text" name="date_dembauche" class="form-control mt-3">
                    @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-4 mb- 3">
                    <label for="adresse" class="float-start">Adresse</label><br>
                    <input type="text" name="adresse" class="form-control mt-3">
                    @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-4 mb- 3">
                    <label for="libelle" class="float-start">Username</label><br>
                    <input type="text" name="username" class="form-control mt-3">
                    @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-4 mb- 3">
                    <label for="libelle" class="float-start">Mot de passe</label><br>
                    <input type="text" name="password" class="form-control mt-3">
                    @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="niveau" class="float-start">Niveau</label>
                    <select name="niveau" class="form-control mt-3">
                        @foreach ($niveau as $new)
                            <option value="{{$new->id}}">{{ $new->niveau}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="niveau" class="float-start">Classe</label>
                    <select name="libelle" class="form-control mt-3">
                        @foreach ($classe as $new)
                            <option value="{{$new->id}}">{{ $new->libelle}}</option>
                        @endforeach
                    </select>
                </div>
                
               
            </div>
            <div class="row">
                 <div class="col-md-4 mt-3 float-start">
                    <button type="submit" class="btn btn-primary float-start text-white" >Enregistrer</button>
                </div>
            </div>
        </form>

           

        </div>
    </div>
    
</div>


@endsection