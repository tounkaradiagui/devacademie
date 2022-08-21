@extends('admin.dashboard')
@section('content')

<div class="card">
    <h5 class="card-header">
        Ajout d'une année scolaire <a href="{{url('admin/annee')}}" class="btn btn-danger btn-sm float-end text-white" >Retour</a>
    </h5>

    <div class="card-body">
        <form action="{{url('admin/annee/create')}}" method="post">
                @csrf
                
            <div class="row">
                
                <div class="col-md-4 mb- 3">
                    <label for="libelle" class="float-start">Libelle</label><br>
                    <input type="text" name="libelle" class="form-control mt-3">
                    @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-4 mb- 3">
                    <label for="libelle" class="float-start">Date de début</label><br>
                    <input type="date" name="date_de_debut" class="form-control mt-3">
                    @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
                </div>

                <div class="col-md-4 mb- 3">
                    <label for="libelle" class="float-start">Date de fin</label><br>
                    <input type="date" name="date_de_fin" class="form-control mt-3">
                    @error('libelle') <small class="text-danger">{{$message}}</small>@enderror
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

@endsection