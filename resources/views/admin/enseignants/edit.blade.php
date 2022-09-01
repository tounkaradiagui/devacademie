@extends('layouts.admin')
@section('content')


<div class="container-fluid px-4">

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

    <div class="card mt-4">
        <div class="card-header">
            <h4>La liste des enseignants
                <a href="{{ url('admin/enseignants')}}" class="btn btn-primary btn-sm text-white float-end" >Liste enseignant </a>
            </h4>
        </div>

        <div class="card-body">
            <form action="{{ url('admin/update-enseignant/'.$enseignant->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="">Nom</label> -->
                                <input type="text" class="form-control" name="nom" placeholder="Nom" value="{{$enseignant->nom}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="">Prénom</label> -->
                                <input type="text" class="form-control" name="prenom" placeholder="Prénom" value="{{$enseignant->prenom}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group mt-3">
                                <label class="input-group-text" for="inputGroupSelect02">Sexe</label>
                                <select name="sexe" class="form-select" id="inputGroupSelect02">
                                    <option value="{{$enseignant->sexe}}">{{$enseignant->sexe}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <!-- <label for="">Email</label> -->
                                <input type="email" class="form-control" name="email" placeholder="Adresse email" value="{{$enseignant->email}}">
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <!-- <label for="">Email</label> -->
                                <input type="text" class="form-control" name="phone" placeholder="Numéro de Téléphone" value="{{$enseignant->phone}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        

                        <div class="col-md-4 mt-4">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2">Date d'embauche</span>
                                <input type="date" class="form-select" name="date_dembauche" aria-label="Username" aria-describedby="basic-addon2" value="{{$enseignant->date_dembauche}}">
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-4">
                            <div class="form-group">
                                <!-- <label for="">Adresse</label> -->
                                <input type="adresse" class="form-control" name="adresse" placeholder="Lieu de résidence" value="{{$enseignant->adresse}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mt-4">
                            <label for="niveau_id" class="float-start mb-2">Niveau</label>
                            <select name="niveau_id" class="form-select">
                                @foreach ( $niveau as $niveaux )
                                <option value="{{$niveaux->id}}">{{$niveaux->id}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mt-4">
                            <label for="niveau_id" class="float-start mb-2">Classe</label>
                            <select name="classe_id" class="form-select">
                                @foreach ( $classe as $classes )
                                <option value="{{$classes->id}}">{{$classes->id}}</option>
                                @endforeach
                            </select>
                           
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 float-start mt-4">
                            <button type="submit" class="btn btn-primary float-start text-white" >Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection