<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #0E4C92">
    <!-- Brand Logo -->
    <!-- <a href="{{url('parent/dashboard')}}" class="brand-link">
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dev académie</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('uploads/profile/' .Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          <span class="nav-profile-name">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</span>
          </a>
        </div>
      </div>

      
      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{url('eleve/dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          </li>
         
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar <small>+ Custom Area</small></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
            </ul> -->
          </li>
          
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Consulter
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('parents/emplois')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Emploi du temps</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('parents/list-enseignants')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des enseignants</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('parents/matieres')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste de matières</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('parents/absences')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste d'absences</p>
                </a>
              </li>

            </ul>
          </li>


          
          <li class="nav-item">
            <a href="parents/calendrier" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Voir le Calendrier
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>

        
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Messages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('parent/mail')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Envoyer un message</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('parent/messages')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste de message</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('parent/brouillon')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brouillon</p>
                </a>
              </li>
            </ul>
          </li>


         <li class="nav-item">
            <a href="{{url('parent/bulletins')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Liste de Bulletins</p>
            </a>
          </li>
         
          
          <li class="nav-item">
            <a href="{{url('parent/reclamations')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Liste de reclamations</p>
            </a>
          </li>

           
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Mon Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('eleve/mon-profile')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modifier mon profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                 <i class="far fa-circle nav-icon"></i>
                  {{ __('Déconnexion') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
             
            </ul>
          </li>


          <li class="nav-item">
            <a href="{{url('eleve/ressources')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Ressources</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="www.dev-academie.ml" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="https://www.dev-academie.ml" class="nav-link">
              <i class="nav-icon fas fa-server"></i>
              <p>Visitez le site web</p>
            </a>
          </li>

          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
