@extends('parents.dashboard')
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
    <div class="card-header" style="background-color: #0B6623 ;">
        <h4 style="text-align: center; color: white;">Formulaire de Pré-inscription <a href="{{url('admin/list-signup')}}" class="btn btn-danger float-end text-white btn-sm">retour</a></h4> 
    </div>

    <div class="card-body">
        <form action="{{ url('parent/signup/'.$inscrit->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="" class="float-start mb-2">Nom</label>
                            <input type="text" name="nom" class="form-control" value="{{ $inscrit->nom}}">
                        </div>

                        <div class="form-group">
                            <label for="" class="float-start mb-2">Prénom</label>
                            <input type="text" name="prenom" class="form-control" value="{{ $inscrit->prenom}}">
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect02">Sexe</label>
                            <select name="sexe" class="form-select" id="inputGroupSelect02">
                                <option value="{{ $inscrit->id}}">{{ $inscrit->sexe}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="float-start">Date de naissance</label>
                            <input type="date" name="date_de_naissance" class="form-control" value="{{ $inscrit->date_de_naissance}}">
                        </div>

                        <div class="form-group">
                            <label for="" class="float-start">Lieu de naissance</label>
                            <input type="text" name="lieu_de_naissance" class="form-control" value="{{ $inscrit->lieu_de_naissance}}">
                        </div>

                        <div class="form-group">
                            <label for="" class="float-start mb-2">Lieu de résidence</label>
                            <input type="text" name="localite" class="form-control" value="{{ $inscrit->adresse}}">
                        </div>
                    </div>

                    <div class="col-md-6">
        
                        <div class="form-group ">
                            <label for="" class="float-start">Image</label>
                            <input type="file" name="image" class="form-control float-start">
                            <img src="{{url('uploads/parent/'.$display->image)}}" alt="" width="60" height="60">
                        </div>

    
                        <div class="form-group">
                            <label for="" class="float-start mt-4">Acte de naissance</label>
                            <input type="file" name="acte" class="form-control" value="{{ $inscrit->acte_de_naissance}}">
                            <a href="{{url('uploads/documents/' .$display->acte_de_naissance)}}" view>
                        </div>


                        <div class="form-group mb-3">
                            <label for="" class="float-start ">Adresse email</label>
                            <input type="email" name="email" class="form-control" value="{{ $inscrit->email}}">
                        </div>


                        <div class="form-group">
                            <label for="" class="float-start">Niveau demandé</label>
                            <select name="niveau_id" class="form-control mt-3">
                            @foreach ($niveau as $inscrit)
                                <option value="{{$inscrit->id}}">{{ $inscrit->niveau}}</option>
                            @endforeach
                            </select>
                        </div>

                        
                        <div class="form-group">
                            <label for="" class="float-start">Classe</label>
                            <select name="classe_id" class="form-control mt-3">
                            @foreach ($classe as $inscrit)
                                <option value="{{$inscrit->id}}">{{ $inscrit->libelle}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="float-start">Année scolaire</label>
                            <select name="annee" class="form-control mt-3">
                            @foreach ($annee as $inscrit)
                                <option value="{{$inscrit->id}}">{{ $inscrit->libelle}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="float-start mt-4">N° Matricule</label>
                            <input type="text" name="matricule" class="form-control" value="{{ $inscrit->matricule }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="float-start mt-4">Régime</label>
                            <input type="text" name="regime" class="form-control" value="{{ $inscrit->regime }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="float-start mt-4">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ $inscrit->username }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="float-start mt-4">Mot de passe</label>
                            <input type="password" name="password" class="form-control" value="{{ $inscrit->password }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-sm text-white float-start" style="background-color: #0B6623;" >Soumettre</a>                            
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection










