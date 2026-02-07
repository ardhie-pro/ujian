   <div class="header-bar d-flex justify-content-between align-items-center flex-wrap">
       <div class="d-flex align-items-center">
           <div class="header-left">
               <img src="{{ asset('assetts/images/logo-dark.png') }}" alt="" />
           </div>
           <!-- Toggle Sidebar Mobile -->
           <button type="button" class="btn px-3 fs-3 d-lg-none" id="vertical-menu-btn">
               <i class="bi bi-list"></i>
           </button>
       </div>
       <div class="user-info mt-2 mt-md-0">
           <div class="user-avatar"></div>
           <div class="text-end selamat text-md-start">
               <div class="fw-semibold">Selamat Mengerjakan,</div>
               <small>{{ Auth::user()->name }}</small>
           </div>
       </div>
   </div>
