@extends('admin.dashboard')
@section('content')


<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4>La liste de secrétaires
                <a href="{{ url('admin/secretaires/create')}}" class="btn btn-primary btn-sm text-white float-end" >Ajouter un (e) secrétaire</a>
            </h4>
        </div>

        <div class="card-body">
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

            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($secretaires as $item)
                    <tr>
                        <td>{{ $item->nom }}</td>
                        <td>{{ $item->prenom }}</td>
                        <td>{{ $item->sexe }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->adresse }}</td>
                        <td>{{ $item->phone }}</td>
                        
                        <td>
                            <a href="{{url('admin/edit-secrétaire/'.$item->id)}}" title="Modifier ce secrétaire"><i class="fa fa-edit" style="font-size:20px; color:#0B6623;"></i></a>          
                        </td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" title="Archiver ce secretaire" ><i class="fa fa-trash" style="font-size:20px; color:red;"></i></a>          
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    
</div>



@endsection