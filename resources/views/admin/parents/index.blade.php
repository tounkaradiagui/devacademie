@extends('admin.dashboard')
@section('content')


<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4>La liste de parents d'élèves
                <a href="{{ url('admin/parents/create')}}" class="btn btn-primary btn-sm text-white float-end" >Ajouter un parent</a>
            </h4>
        </div>

        <div class="card-body">
                    
            @if (session('message'))
                <div class="alert alert-success" >{{session('message')}}</div>
            @endif

            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parents as $item)
                        <tr>
                            <td>{{ $item->nom }}</td>
                            <td>{{ $item->prenom }}</td>
                            <td>{{ $item->sexe }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->adresse }}</td>
                            <td>
                                <!-- <a href="{{url('admin/delete-reservation/'.$item->id)}}" class="btn btn-danger btn-sm" >Supprimer</a> -->
                                <!-- <button type="submit" class="btn btn-danger btn-sm deletereservationBtn" value="{{$item->id}}" >Supprimer</button> -->
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    
</div>

@endsection