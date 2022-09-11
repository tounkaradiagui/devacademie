@extends('secretaires.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="container">
                <div class="card">
                    <div class="card-header text-white" style="background-color: #0050e3;">
                        <h5>Liste de Trimestre<a href="{{ url('secretaire/trimestres/create') }}"  class="btn btn-success btn-sm text-white float-end" >Retour</a></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('secretaire/update-trimestres/'.$trimestre->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-5">
                                                <label for="nom_trimestre" class="float-start mt-2">Libellé du Trimestre</label><br>
                                                <input type="text" name="nom_trimestre" value="{{$trimestre->nom_trimestre}}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-3">
                                        <button type="submit" class="btn btn-success float-start">Modifié</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()