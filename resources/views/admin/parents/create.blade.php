@extends('layouts.admin')
@section('content')


<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4>La liste de passagers ayant reservés un vol
                <a href="{{ url('admin/ajouter-reservation')}}" class="btn btn-primary btn-sm float-end" >Reserver un vol</a>
            </h4>
        </div>

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
    
</div>


@endsection