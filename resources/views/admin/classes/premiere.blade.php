@extends('admin.dashboard')
@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
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
                            <th colspan="2" >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $classe)
                            
                        <tr>
                            <td>
                                <img src="{{url('uploads/parent/'.$classe->image)}}" width="60px" height="60px" alt="">
                            </td>
                            <td>{{$classe->matricule}}</td>
                            <td>{{$classe->nom}}</td>
                            <td>{{$classe->prenom}}</td>
                            <td>{{$classe->sexe}}</td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                            <td>{{$classe->date_de_naissance}}</td>
                            <td>{{$classe->lieu_de_naissance}}</td>
                            <td>{{$classe->regime}}</td>
                            <td>{{$classe->niveaux->niveau}}</td>
                            <td>{{$classe->classe->libelle}}</td>
                            <td>{{$classe->parents->nom}} {{$classe->parents->prenom}}</td>
                            <td class="text-center">
                                <a href="#"  value="" ><i class='fas fa-info-circle' style='font-size:20px;color:#0050e3' title="Détails"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

@endsection