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
   
     <div class="card-header" style="background-color: #0050e3;">

         <h4 style="text-align: center; color: white;">La liste de pré-inscriptions </h4> 
     </div>
    <div class="container">
        <div class="row">
            <div class="card-body">
                <table id="example1" class="table table-striped table-bordered">
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
                        @foreach($candidatparent as $display)
                        <tr>
                            <td> <img src="{{url('uploads/parent/'.$display->image)}}" width="60px" height="60px" alt=""> </td>
                            <td>{{$display->nom}}</td>
                            <td>{{$display->prenom}}</td>
                            <td>{{$display->niveaux->niveau}}</td>
                            <td>{{$display->classe->libelle}}</td>
                            <td class="text-center">
                                <a href="{{url('uploads/documents/' .$display->acte_de_naissance)}}" download title="Télécharger vos documents" > <i class="material-icons" style="font-size:30px">cloud_download</i> </a>
                            </td>
                            <td>{{$display->statut}}</td>
                            <td class="text-center">
                                <a href="#"  value="" ><i class='fas fa-info-circle' style='font-size:30px;color:#0050e3' title="Détails"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

   
@endsection

