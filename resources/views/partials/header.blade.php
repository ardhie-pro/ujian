    <div class="header-bar d-flex justify-content-between align-items-center flex-wrap">
        <div class="header-left d-flex align-items-center">
            <button type="button" class="btn btn-sm px-3 header-item waves-effect d-lg-none" id="vertical-menu-btn" style="color: #0E2542; font-size: 28px;">
                <i class="bi bi-list"></i>
            </button>
            <div class="ms-2">
                <img src="{{ asset('assetts/images/logo-dark.png') }}" alt="" class="img-fluid" style="max-height: 25px;" />
            </div>
        </div>
     <!-- Dropdown User -->
     <div class="dropdown mt-2 mt-md-0">
         <button class="btn d-flex align-items-center border-0 bg-transparent dropdown-toggle" type="button"
             id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
             <div class="user-avatar me-2"></div>
             <div class="text-end selamat text-md-start">
                 <div class="fw-semibold">Selamat Datang,</div>
                 <small>{{ Auth::user()->name }}</small>
             </div>
         </button>

         <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
             <li>
                 <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <button type="submit" class="dropdown-item text-danger">
                         <i class="bi bi-box-arrow-right me-2"></i>Logout
                     </button>
                 </form>
             </li>
         </ul>
     </div>
 </div>
