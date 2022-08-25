@extends('layouts.admin')
@section('content')

    <!-- debut d'ajout de classes -->

<div class="card bg-dark">
    <h5 class="card-header">
        Ajout des classes <a href="{{url('admin/classes')}}" class="btn btn-danger btn-sm float-end text-white" >Retour</a>
    </h5>

    <div class="card-body">
        <form action="{{url('admin/classes/create')}}" method="post">
                @csrf
                
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="niveau" class="float-start">Niveau</label>
                    <select name="niveau" class="form-control mt-3">
                        @foreach ($niveau as $new)
                        
                            <option value="{{$new->niveau}}">{{ $new->niveau}}</option>
                        
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-4 mb- 3">
                    <label for="libelle" class="float-start">Libelle</label><br>
                    <input type="text" name="libelle" class="form-control mt-3">
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

    <!-- fin d'ajout de classes -->

@endsection