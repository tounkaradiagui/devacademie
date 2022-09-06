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
    <div class="card-header">
        <h4 style="text-align: center; color: white;"> <marquee behavior="" direction="">
                        <h6 class="text-danger">Voulez-vous vraiment validé cette candidature</h6>
                    </marquee>
    </h4> 
    </div>

    <div class="card-body">
        <form action="{{ url('admin/inscrit/'.$inscrit->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">
                <!-- <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="float-start mt-4">Nom</label>
                            <input type="text" name="nom" class="form-control" value="{{ $inscrit->nom }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="float-start mt-4">Prénom</label>
                            <input type="text" name="prenom" class="form-control" value="{{ $inscrit->prenom }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="float-start mt-4">Sexe</label>
                            <input type="text" name="sexe" class="form-control" value="{{ $inscrit->sexe }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="float-start mt-4">Date de naissance</label>
                            <input type="date" name="date_de_naissance" class="form-control" value="{{ $inscrit->date_de_naissance }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="float-start mt-4">Niveau demandé</label>
                            <input type="text" name="niveau" class="form-control" value="{{ $inscrit->niveaux->niveau }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="float-start mt-4">Classe</label>
                            <input type="text" name="classe" class="form-control" value="{{ $inscrit->classe->libelle }}" readonly>
                        </div>
                    </div>

                </div> -->
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

                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <button type="submit" class="btn text-white float-start" style="background-color: #0B6623;" >Valider les informations</a>                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection










