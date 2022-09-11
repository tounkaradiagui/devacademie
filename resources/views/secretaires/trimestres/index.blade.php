@extends('secretaires.dashboard')
@section('content')


 <!-- ################### Début  Modal pour ajouter un trimestre    ############################## -->

<div class="modal fade col-md-12" id="ajouter_un_trimestre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0050e3;">
                <h5 class="modal-title text-white" id="exampleModalLabel">Ajouter une trimestre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('secretaire/trimestres/create')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nom_trimestre" class="float-start mt-2">Libellé du Trimestre</label><br>
                                <input type="text" name="nom_trimestre" class="form-control">
                                @error('nom_trimestre') <small class="text-danger">{{$message}}</small>@enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

   <!-- ###################  Fin du Modal pour ajouter un trimestre    ############################## -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="container">

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
    
                <div class="card">
                    <div class="card-header text-white" style="background-color: #0050e3;">
                        <h5>Liste de Trimestre<a href="" data-bs-toggle="modal" data-bs-target="#ajouter_un_trimestre" class="btn btn-success btn-sm text-white float-end" >Ajouter un Trimestre</a></h5>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center bg-dark">
                                <tr>
                                    <th>Nom</th>
                                    <th colspan="2" >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trimestre as $display )
                                <tr>
                                    <td>{{$display->nom_trimestre}}</td>
                                    <td class="text-center">
                                        <a href="{{url('secretaire/edit-trimestres/'.$display->id)}}" title="Modifier"><i class="fa fa-edit" style="font-size:20px; color:#30c93e;"></i></a>          
                                    </td>
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
</div>
@endsection()