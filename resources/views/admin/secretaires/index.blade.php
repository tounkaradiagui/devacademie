@extends('admin.dashboard')
@section('content')


<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header text-white" style="background-color: #0050e3;">
            <h4>La liste de secrétaires
                <a href="{{ url('admin/secretaires/create')}}" class="btn btn-success btn-sm text-white float-end" >Ajouter un (e) secrétaire</a>
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

            <table id="example1" class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        
                        <th colspan="4">Actions</th>
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
                            <a href="{{url('admin/edit-enseignant/'.$item->id)}}" title="Modifier ce secretaire"><i class="fa fa-edit" style="font-size:20px; color:#30c93e;"></i></a>          
                        </td>
                        <td>
                            <a href="#" ><i class='fas fa-comment-dots' style='font-size:20px;color:#30c93e' title="Contacter"></i></a>
                        </td>
                        <td>
                            <a href="#"  value="" ><i class='fas fa-info-circle' style='font-size:20px;color:#0050e3' title="Détails"></i></a>
                        </td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" title="archiver ce secretaire" ><i class="fa fa-archive" style="font-size:20px; color:red;"></i></a>          
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    
</div>



@endsection