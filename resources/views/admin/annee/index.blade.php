@extends('admin.dashboard')
@section('content')

<div class="card">
    <div class="container">
       

        <div class="row">
            <div class="card-header">
                <a href="{{url('admin/annee/create')}}" class="btn btn-primary btn-sm float-end text-white" >Ajouter</a>
            </div>
            
            <div class="card-body">
                 @if (session('message'))
                    <div class="alert alert-success" >{{session('massage')}}</div>
                @endif
                <table id="datatable" class=" table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>libelle</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th colspan="2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($annee as $display )
                    <tr>
                        <td>{{$display->id}}</td>
                        <td>{{$display->libelle}}</td>
                        <td>{{$display->date_de_debut}}</td>
                        <td>{{$display->date_de_fin}}</td>   
                        <td><a href="#" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#editModal">Mofifier</a></td>
                        <td><a href="#" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</a> </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
   
</div>

@endsection