 <div class="navbar-header">
     <div class="d-flex">

         <!-- LOGO -->
         <div class="navbar-brand-box">
             <a href="index.html" class="logo logo-dark">
                 <span class="logo-sm">
                     <img src="{{ asset('assetts/images/logo-sm-dark.png') }}" alt="" height="40">
                 </span>
                 <span class="logo-lg">
                     <img src="{{ asset('assetts/images/logo-dark.png') }}" alt="" height="42">
                 </span>
             </a>

             <a href="index.html" class="logo logo-light">
                 <span class="logo-sm">
                     <img src="{{ asset('assetts/images/logo-sm-light.png') }}" alt="" height="22">
                 </span>
                 <span class="logo-lg">
                     <img src="{{ asset('assetts/images/logo-light.png') }}" alt="" height="24">
                 </span>
             </a>
         </div>

         <!-- Menu Icon -->

         <button type="button" class="btn px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
             <i class="mdi mdi-menu"></i>
         </button>

     </div>

     <div class="d-flex">



         <!-- User -->
         <div class="dropdown d-inline-block">
             <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                 data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <img class="rounded-circle header-profile-user" src="{{ asset('assetts/images/users/avatar-4.jpg') }}"
                     alt="Header Avatar">
             </button>

             <div class="dropdown-menu dropdown-menu-end">
                 <!-- item-->
                 <a class="dropdown-item" href="#"><i
                         class="mdi mdi-account-circle font-size-16 align-middle me-2 text-muted"></i>
                     <span>Profile</span></a>
                 <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <button type="submit" class="dropdown-item text-primary">
                         <i class="mdi mdi-power font-size-16 align-middle me-2 text-primary"></i>
                         <span>Logout</span>
                     </button>
                 </form>
             </div>
         </div>

         <!-- Setting -->
         <div class="dropdown d-inline-block">
             <button type="button" class="btn header-item  right-bar-toggle waves-effect">
                 <i>{{ auth()->user()->name }}</i>
             </button>
         </div>

     </div>
 </div>
