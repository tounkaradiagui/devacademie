<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #0E4C92;">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/dashboard')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Utilisateurs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/eleves')}}">Elèves</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/enseignants')}}">Enseignants</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/parents')}}">Parents</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/secretaires')}}">Secrétaires</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basicc" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Gstion de l'école</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basicc">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/calendrier/index')}}">Emploi du temps</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/niveaux')}}">Niveaux</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/classes')}}">Classes</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/annee')}}">Année Scolaire</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/matieres')}}">Matières</a></li>  
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Comptabilité</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="basic">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/paiement')}}">Paiement</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/versement')}}">Versement</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/caisse')}}">Caisse</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#basice" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Inscriptions</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="basice">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/inscriptions')}}">Liste des inscriptions</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/inscrit')}}">Liste des candidatures</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#consulter" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Consulter</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="consulter">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/absences')}}">Absences</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/classes')}}">Classes</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/emploi_du_temps')}}">Emploi du temps</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/about')}}">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">A propos</span>
            </a>
          </li>
         
        </ul>
      </nav>