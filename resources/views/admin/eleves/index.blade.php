@extends('layouts.admin')
@section('content')

<div class="card">
    @if (session('message'))
        <div class="alert alert-success" >{{session('massage')}}</div>
    @endif
    
    <div class="card-header">
        La liste des élèves
    </div>

    <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                    <th>Photo</th>
                    <th>N° Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Sexe</th>
                    <th>Date de naissance</th>
                    <th>Lieu de naissance</th>
                    <th>Parent</th>
                    <!-- <th>Régime</th>
                    <th>Niveau</th>
                    <th>Classe</th>
                    <th>Parent</th> -->
                    <th colspan="2" >Actions</th>
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
                    <td>{{$eleves->signupes->nom}}</td>
                    <!-- <td>{{$eleves->regime}}</td>
                    <td>{{$eleves->niveaux->niveau}}</td>
                    <td>{{$eleves->classe->libelle}}</td>
                    <td>{{$eleves->parent}}</td> -->
                    <td class="text-center">
                        <a href="#" title="Voir les détails" ><i class="fa fa-edit " style="font-size:20px; color:#0B6623;"></i></a>          
                    </td>
                   
                </tr>
                @endforeach
                    
           
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    
@endsection