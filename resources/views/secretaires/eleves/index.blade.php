@extends('secretaires.dashboard')
@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">


                <div class="card-header text-white" style="background-color: #0050e3;">
                    La liste des élèves
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="bg-dark">
                            <tr>
                                <th>Photo</th>
                                <th>N° Matricule</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Sexe</th>
                                <th>Date de naissance</th>
                                <th>Lieu de naissance</th>
                                <th>Régime</th>
                                <th>Niveau</th>
                                <th>Classe</th>
                                <th>Parent</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student as $eleves )
                            <tr>
                                <td><img src="{{url('uploads/parent/'.$eleves->image)}}" width="60px" height="60px" alt=""> </td>
                                <td>{{$eleves->matricule}}</td>
                                <td>{{$eleves->nom}}</td>
                                <td>{{$eleves->prenom}}</td>
                                <td>{{$eleves->sexe}}</td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                                <td>{{$eleves->date_de_naissance}}</td>
                                <td>{{$eleves->lieu_de_naissance}}</td>
                                <td>{{$eleves->regime}}</td>
                                <td>{{$eleves->niveaux->niveau}}</td>
                                <td>{{$eleves->classe->libelle}}</td>
                                <td>{{$eleves->parents->nom}} {{$eleves->parents->prenom}}</td>
                                <td class="text-center">
                                    <a href="#"  value="" ><i class='fas fa-info-circle' style='font-size:20px;color:#0050e3' title="Détails"></i></a>
                                </td>
                            
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>

                           



    
@endsection