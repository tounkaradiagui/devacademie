@extends('layouts.admin')
@section('content')

<div class="container-fluid px-4">

    @if (session('message'))
        <div class="alert alert-success" >{{session('message')}}</div>
    @endif

    <div class="row">
        
   
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Modifier un Vol</h4>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

        <form action="{{ url('admin/update-niveau/'.$niveau->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for=""> Libelle</label>
                <input type="text" name="niveau" value="{{ $niveau->niveau}}" class="form-control">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-success float-start">Valider</button>
            </div>
        </form>

        </div>
    </div>
    
</div>
@endsection