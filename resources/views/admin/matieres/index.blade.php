@extends('admin.dashboard')
@section('content')

     <!-- ####### Modal pour ajouter une matiere  ##########  -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #0050e3;">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Renseigner ces champs svp !</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{url('admin/matieres/create')}}" method="post">
                        @csrf
                        <div class="modal-body">
                
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <label for="">Nom</label> -->
                                            <input type="text" class="form-control" name="code_matiere" placeholder="Code matière">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <label for="">Prénom</label> -->
                                            <input type="text" class="form-control" name="libelle" placeholder="Libellé">
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <label for="">Prénom</label> -->
                                            <input type="text" class="form-control" name="coefficient" placeholder="Coefficient">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label for="niveau_id" class="float-start mb-2">Niveau</label>
                                            <select name="niveau_id" class="form-select">
                                                @foreach ($niveau as $new)
                                                    <option value="{{$new->id}}">{{ $new->niveau}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="niveau_id" class="float-start mb-2">Classe</label>
                                        <select name="classe_id" class="form-select">
                                            @foreach ($classe as $new)
                                                <option value="{{$new->id}}">{{ $new->libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="enseignant_id" class="float-start mb-2">Enseignant</label>
                                        <select name="enseignant_id" class="form-select">
                                            @foreach ($enseignant as $new)
                                                <option value="{{$new->id}}">{{ $new->nom}} {{ $new->prenom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-success text-white">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

     <!-- ####### Fin du Modal pour ajouter une matiere  ##########  -->


     <!-- ####### Début Modal pour modifier une matiere  ##########  -->

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #0050e3;">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Renseigner ces champs svp !</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{url('admin/matieres/create')}}" id="editForm" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <label for="">Nom</label> -->
                                            <input type="text" class="form-control" name="code_matiere" id="code_matiere" placeholder="Code matière">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <label for="">Prénom</label> -->
                                            <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Libellé">
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <label for="">Prénom</label> -->
                                            <input type="text" class="form-control" name="coefficient" id="coefficient" placeholder="Coefficient">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label for="niveau_id" class="float-start mb-2">Niveau</label>
                                            <select name="niveau_id" id="niveau_id" class="form-select">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="niveau_id" class="float-start mb-2">Classe</label>
                                        <select name="classe_id" id="classe_id" class="form-select">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="enseignant_id" class="float-start mb-2">Enseignant</label>
                                        <select name="enseignant_id" id="enseignant_id" class="form-select">                                                    
                                            <option value=""></option>                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-success text-white">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

     <!-- ####### Fin Modal pour ajouter une matiere  ##########  -->


      <!-- ####### Début Modal pour supprimer une matiere  ##########  -->

      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #0050e3;">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Renseigner ces champs svp !</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{url('admin/delete-matieres')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <h4>Voulez-vous vraiment archiver cette matière ?</h4>
                                <input type="hidden" name="matiere_delete_id" id="matiere_id">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Non</button>
                                <button type="submit" class="btn btn-success text-white">Oui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

     <!-- ####### Modal pour supprimer une matiere  ##########  -->

<div class="container-fluid px-4">
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

    <div class="card mt-4">
        <div class="card-header">
            <h4>La liste de matières
                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary btn-sm text-white float-end" >Ajouter une matière</a>
            </h4>
        </div>

        <div class="card-body">
        
            <table id="myDataTable" class="table table-bordered">
                <thead class="gb-dark">
                    <tr>
                        <th>Id</th>
                        <th>Code Matière</th>
                        <th>Libellé</th>
                        <th>Coefficient</th>
                        <th>Niveau</th>
                        <th>Classe</th>
                        <th>Enseignant</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matieres as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->code_matiere }}</td>
                        <td>{{ $item->libelle }}</td>
                        <td>{{ $item->coefficient }}</td>
                        <td>{{ $item->niveaux->niveau}}</td>
                        <td>{{ $item->classe->libelle }}</td>
                        <td>{{ $item->enseignant->nom}} {{ $item->enseignant->prenom}}</td>
                        <td>
                            <a href="#"  data-bs-toggle="modal" data-bs-target="#editModal" title="Modifier cette matière"><i class="fa fa-edit" style="font-size:20px; color:#0B6623;"></i></a>          
                        </td>
                        <td>
                            <a href="#" class=" editbtn deletematierebtn" value="{{$item->id}}" title="Archiver cette matière"><i class="fa fa-trash" style="font-size:20px; color:red;"></i></a>          
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" 
integrity="sha512-6UofPqm0QupIL0kzS/UIzekR73/luZdC6i/kXDbWnLOJoqwklBK6519iUnShaYceJ0y4FaiPtX/hRnV/X/xlUQ==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js" 
integrity="sha512-8Y8eGK92dzouwpROIppwr+0kPauu0qqtnzZZNEF8Pat5tuRNJxJXCkbQfJ0HlUG3y1HB3z18CSKmUo7i2zcPpg==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" 
integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" 
 integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" 
 crossorigin="anonymous" referrerpolicy="no-referrer"></script>




@endsection()

@section('scripts')

<script>

    
    $(document).ready(function(){

        $('.editbtn').on('click',  function(){
        $('#editModal').modal('show');


        $tr = $(this).closest('tr');

        if ($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var data = $tr.children('tr').map( function(){
            return $(this).text();
        });
        console.log(data);
        $('#code_matiere').val(data[0]);
        $('#code_matiere').val(data[1]);
        $('#libelle').val(data[2]);
        $('#coefficient').val(data[3]);
        $('#niveau_id').val(data[4]);
        $('#classe_id').val(data[5]);
        $('#enseignant_id').val(data[6]);

       });
    });



</script>



    <script>






        $(document).ready(function(){

            $('.editbtn').on('click',  function(e){
                $('#editModal').modal('show');
                e.preventDefault();
                
                var vol_id = $(this).val();
                $('#matiere_id').val(vol_id);
                $('#deleteModal').modal('show');
            });
        });
        // first method
        // $('.deletevolbtn').click(function(e){
            // e.preventDefault();

        // the second one.
    </script>


@endsection()