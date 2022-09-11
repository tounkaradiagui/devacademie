@extends('secretaires.dashboard')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header text-white" style="background-color: #0050e3;">
            <h4>La liste de parents d'élèves
            </h4>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center bg-dark">
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
                                <a href="#" ><i class='fas fa-comment-dots' style='font-size:20px;color:#30c93e' title="Contacter"></i></a>
                            </td>
                            <td>
                                <a href="#"  value="" ><i class='fas fa-info-circle' style='font-size:20px;color:#0050e3' title="Détails"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection