@extends('layouts.admin')
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

    <h5 class="card-header">
        Ajout de niveaux <a href="{{url('admin/niveaux')}}" class="btn btn-danger btn-sm float-end text-white" >Retour</a>
    </h5>

    <div class="card-body">
        <form action="{{url('admin/niveaux/create')}}" method="post" >
                @csrf
                
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="niveau">Niveau</label>
                    <input type="text" name="niveau" class="form-control"><br>
                    @error('name') <small class="text-danger">{{$message}}</small>@enderror
                   
                    <button type="submit" class="btn btn-primary text-white float-start" >Enregistrer</button>
                </div>
                
            </div>

        </form>
    </div>
</div>
@endsection