@extends('enseignants.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="container">
                <div class="card">
                    <div class="card-header text-white" style="background-color: #0050e3;">
                        <h5>Liste de notes<a href="{{ url('enseignant/notes') }}"  class="btn btn-success btn-sm text-white float-end" >Retour</a></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('enseignant/update-notes/'.$note->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nom_trimestre" class="float-start mt-2">Note</label><br>
                                                <input type="text" name="note" value="{{$note->note}}" class="form-control">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="nom_trimestre" class="float-start mt-2">Matière</label><br>
                                                <input type="text" name="note" value="{{$note->matiere}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nom_trimestre" class="float-start mt-2">Elève</label><br>
                                                <input type="text" name="note" value="{{$note->note}}" class="form-control">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="nom_trimestre" class="float-start mt-2">Trimestre</label><br>
                                                <input type="text" name="note" value="{{$note->note}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="nom_trimestre" class="float-start mt-2">Appréciation</label><br>
                                                <input type="text" name="note" value="{{$note->note}}" class="form-control">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="nom_trimestre" class="float-start mt-2">Trimestre</label><br>
                                                <input type="text" name="note" value="{{$note->note}}" class="form-control">
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