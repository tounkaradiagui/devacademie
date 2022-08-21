@extends('layouts.admin')
@section('content')

@if (session('message'))
        <div class="alert alert-success" >{{session('massage')}}</div>
    @endif
    <!-- debut de la card  -->
    <div class="card">
   
    <div class="card-header">
    <a href="{{url('admin/annee/create')}}" class="btn btn-primary btn-sm float-start text-white" >Ajouter une classe</a> <a href="{{url('admin/annee/create')}}" class="btn btn-primary btn-sm float-end text-white" >Ajouter une année</a>
    </div>
    
    <div class="card-body">
        <table id="datatable" class=" table table-bordered">
            <thead>
              <tr>
                  <!-- <th>Id</th> -->
                <th>Niveau</th>
                <th>Libellé</th>
                <th colspan="2" >Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($classe as $display )
                <tr>
                    <!-- <td>{{$display->id}}</td>    -->
                    <td>{{$display->niveau_id}}</td>
                    <td>{{$display->libelle}}</td>
                    <td><a href="#" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#editModal">Mofifier</a></td>
                    <td><a href="#" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    <!-- fin de la card -->

@endsection