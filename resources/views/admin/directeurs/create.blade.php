@extends('layouts.admin')
@section('content')


<div class="container-fluid px-4">
           

    <div class="card mt-4">
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
        <div class="card-header text-white" style="background-color: #0050e3;">
            <h4>Renseigner ce formulaire pour ajouter un directeur
                <a href="{{ url('admin/directeurs')}}" class="btn btn-success btn-sm float-end text-white" >Liste directeurs</a>
            </h4>
        </div>

        <div class="card-body">
            <form action="{{url('admin/directeurs/create')}}" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="">Nom</label> -->
                                <input type="text" class="form-control" name="nom" placeholder="Nom">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="">Prénom</label> -->
                                <input type="text" class="form-control" name="prenom" placeholder="Prénom">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group mt-3">
                                <label class="input-group-text" for="inputGroupSelect02">Sexe</label>
                                <select name="sexe" class="form-select" id="inputGroupSelect02">
                                    <option selected>-------Selectionner------</option>
                                    <option value="Masculin">Masculin</option>
                                    <option value="Féminin">Féminin</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <!-- <label for="">Email</label> -->
                                <input type="email" class="form-control" name="email" placeholder="Adresse email">
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="form-group">
                                <!-- <label for="">Email</label> -->
                                <input type="text" class="form-control" name="phone" placeholder="Numéro de Téléphone">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                        
                        <div class="col-md-3 mt-4">
                            <div class="form-group">
                                <!-- <label for="">Adresse</label> -->
                                <input type="adresse" class="form-control" name="adresse" placeholder="Lieu de résidence">
                            </div>
                        </div>
                   

                   
                        <div class="col-md-3">
                            <div class="input-group mt-4">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" class="form-control" placeholder="Username" name="username" aria-label="Username" aria-describedby="basic-addon1" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group mt-4">
                                <!-- <span for="">@</span> -->
                                <input type="password" class="form-control" @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mt-4">
                                <!-- <span for="">@</span> -->
                                <input type="password" class="form-control" name="password"  placeholder="Confirmer le mot de passe" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6  mt-5">
                            <button type="submit" class="btn btn-primary float-start text-white" >Enregistrer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection