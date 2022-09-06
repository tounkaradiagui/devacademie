@extends('parents.dashboard')
@section('content')


<div class="card">

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
   
     <div class="card-header" style="background-color: #0B6623 ;">

         <h4 style="text-align: center; color: white;">La liste de pré-inscriptions </h4> 
     </div>
    <div class="container">
        <div class="row">
            <div class="card-body">
                <table id="myDataTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Niveau</th>
                            <th>Classe</th>
                            <th>Document</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inscrit as $display)
                        <tr>
                            <td> <img src="{{url('uploads/parent/'.$display->image)}}" width="60px" height="60px" alt=""> </td>
                            <td>{{$display->nom}}</td>
                            <td>{{$display->prenom}}</td>
                            <td>{{$display->niveaux->niveau}}</td>
                            <td>{{$display->classe->libelle}}</td>
                            <td>
                                <a href="{{url('uploads/documents/' .$display->acte_de_naissance)}}" download title="Télécharger vos documents" > <i class="material-icons">attachment</i> </a>
                            </td>
                            <td>{{$display->statut}}</td>
                            <td>
                                <a href="{{url('parent/edit-eleve/'.$display->id)}}" title="Modifier la candidature" ><i class="fa fa-edit" style="font-size:20px; color:#0B6623;"></i></a>          
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


@endsection

