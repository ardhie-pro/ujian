<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>
      Shared By NULLPHPSCRIPT.COM - Form Xeditable | Agroxa - Responsive
      Bootstrap 5 Admin Dashboard
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      content="Premium Multipurpose Admin & Dashboard Template"
      name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assetts//images/favicon.ico') }}" />
    <style>
      .masuk-soal {
        font-size: 12rem;
        font-weight: bold;
        border: 2px solid black;

        margin-bottom: 5rem;
      }
      @media (max-width: 768px) {
        .masuk-soal {
          font-size: 6rem;
          font-weight: bold;
        }
      }
      .soal-2 {
        font-size: 5rem;
        margin-bottom: 10rem;
      }

      .soal-2 span {
        display: inline-block;
        border: 2px solid black;
        letter-spacing: 40px;
        padding-left: 40px;
      }
    </style>

    <!-- Plugins css -->
    <link
      href="{{ asset('assetts//libs/bootstrap-editable/css/bootstrap-editable.css') }}"
      rel="stylesheet"
      type="text/css" />

    <!-- Bootstrap Css -->
    <link
      href="{{ asset('assetts//css/bootstrap.min.css') }}"
      id="bootstrap-style"
      rel="stylesheet"
      type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assetts//css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link
      href="{{ asset('assetts//css/app.min.css') }}"
      id="app-style"
      rel="stylesheet"
      type="text/css" />
  </head>

  <body data-topbar="colored">
    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
      <header id="page-topbar">
        <div class="navbar-header">
          <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
              <a href="index.html" class="logo logo-dark">
                <span class="logo-sm">
                  <img
                    src="{{ asset('assetts/images/logo-sm-dark.png') }}"
                    alt=""
                    height="22" />
                </span>
                <span class="logo-lg">
                  <img src="{{ asset('assetts/images/logo-dark.png') }}" alt="" height="24" />
                </span>
              </a>

              <a href="index.html" class="logo logo-light">
                <span class="logo-sm">
                  <img
                    src="{{ asset('assetts/images/logo-sm-light.png') }}"
                    alt=""
                    height="22" />
                </span>
                <span class="logo-lg">
                  <img src="{{ asset('assetts/images/logo-light.png') }}" alt="" height="24" />
                </span>
              </a>
            </div>

            <!-- Menu Icon -->

            <button
              type="button"
              class="btn px-3 font-size-24 header-item waves-effect d-block d-lg-none"
              id="vertical-menu-btn">
              <i class="mdi mdi-menu"></i>
            </button>
          </div>

          <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ms-2">
              <div
                class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                aria-labelledby="page-header-search-dropdown">
                <form class="p-3">
                  <div class="form-group m-0"></div>
                </form>
              </div>
            </div>

            <!-- Notification Dropdown -->
            <div class="dropdown d-inline-block">
              <button
                type="button"
                class="btn header-item noti-icon waves-effect"
                id="page-header-notifications-dropdown"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
                <i class="mdi mdi-bell"></i>
                <span class="badge bg-info rounded-pill">3</span>
              </button>
              <div
                class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                aria-labelledby="page-header-notifications-dropdown">
                <h5 class="p-3 text-dark mb-0">Notifications (37)</h5>
                <div data-simplebar style="max-height: 230px">
                  <a href="" class="text-reset notification-item">
                    <div class="d-flex mt-3">
                      <div class="avatar-xs me-3">
                        <span
                          class="avatar-title bg-success rounded-circle font-size-16">
                          <i class="mdi mdi-cart"></i>
                        </span>
                      </div>
                      <div class="flex-1">
                        <h6 class="mb-1">Your order is placed</h6>
                        <div class="font-size-12 text-muted">
                          <p class="mb-1">
                            If several languages coalesce the grammar
                          </p>
                        </div>
                      </div>
                    </div>
                  </a>

                  <a href="" class="text-reset notification-item">
                    <div class="d-flex mt-3">
                      <div class="avatar-xs me-3">
                        <span
                          class="avatar-title bg-warning rounded-circle font-size-16">
                          <i class="mdi mdi-message"></i>
                        </span>
                      </div>
                      <div class="flex-1">
                        <h6 class="mb-1">New Massage received</h6>
                        <div class="font-size-12 text-muted">
                          <p class="mb-1">You have 87 unread message</p>
                        </div>
                      </div>
                    </div>
                  </a>

                  <a href="" class="text-reset notification-item">
                    <div class="d-flex mt-3">
                      <div class="avatar-xs me-3">
                        <span
                          class="avatar-title bg-info rounded-circle font-size-16">
                          <i class="mdi mdi-flag"></i>
                        </span>
                      </div>
                      <div class="flex-1">
                        <h6 class="mb-1">Your item is shipped</h6>
                        <div class="font-size-12 text-muted">
                          <p class="mb-1">
                            If several languages coalesce the grammar
                          </p>
                        </div>
                      </div>
                    </div>
                  </a>
                  <a href="" class="text-reset notification-item">
                    <div class="d-flex mt-3">
                      <div class="avatar-xs me-3">
                        <span
                          class="avatar-title bg-primary rounded-circle font-size-16">
                          <i class="mdi mdi-cart"></i>
                        </span>
                      </div>
                      <div class="flex-1">
                        <h6 class="mb-1">Your Order is placed</h6>
                        <div class="font-size-12 text-muted">
                          <p class="mb-1">
                            It will seem like simplified English
                          </p>
                        </div>
                      </div>
                    </div>
                  </a>

                  <a href="" class="text-reset notification-item">
                    <div class="d-flex mt-3">
                      <div class="avatar-xs me-3">
                        <span
                          class="avatar-title bg-danger rounded-circle font-size-16">
                          <i class="mdi mdi-message"></i>
                        </span>
                      </div>
                      <div class="flex-1">
                        <h6 class="mb-1">New Massage received</h6>
                        <div class="font-size-12 text-muted">
                          <p class="mb-1">You have 87 unread message</p>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="p-2 d-grid">
                  <a class="font-size-14 text-center" href="javascript:void(0)"
                    >View all</a
                  >
                </div>
              </div>
            </div>

            <!-- User -->
            <div class="dropdown d-inline-block">
              <button
                type="button"
                class="btn header-item waves-effect"
                id="page-header-user-dropdown"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">
                <img
                  class="rounded-circle header-profile-user"
                  src="{{ asset('assetts/images/users/avatar-4.jpg') }}"
                  alt="Header Avatar" />
              </button>

              <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="#"
                  ><i
                    class="mdi mdi-account-circle font-size-16 align-middle me-2 text-muted"></i>
                  <span>Profile</span></a
                >
                <a class="dropdown-item" href="#"
                  ><i
                    class="mdi mdi-wallet font-size-16 align-middle text-muted me-2"></i>
                  <span>My Wallet</span></a
                >
                <a class="dropdown-item d-block" href="#"
                  ><span class="badge bg-success float-end">11</span
                  ><i
                    class="mdi mdi-wrench font-size-16 align-middle text-muted me-2"></i>
                  <span>Settings</span></a
                >
                <a class="dropdown-item" href="#"
                  ><i
                    class="mdi mdi-lock-open-outline font-size-16 text-muted align-middle me-2"></i>
                  <span>Lock screen</span></a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-primary" href="#"
                  ><i
                    class="mdi mdi-power font-size-16 align-middle me-2 text-primary"></i>
                  <span>Logout</span></a
                >
              </div>
            </div>

            <!-- Setting -->
            <div class="dropdown d-inline-block">
              <button
                type="button"
                class="btn header-item noti-icon right-bar-toggle waves-effect">
                <i class="mdi mdi-cog bx-spin"></i>
              </button>
            </div>
          </div>
        </div>
      </header>

      <!-- ========== Left Sidebar Start ========== -->
      <div class="vertical-menu">
        <div data-simplebar class="h-100">
          <div class="user-details">
            <div class="d-flex">
              <div class="me-2">
                <img
                  src="{{ asset('assetts/images/users/avatar-4.jpg') }}"
                  alt=""
                  class="avatar-md rounded-circle" />
              </div>
              <div class="user-info w-100">
                <div class="dropdown">
                  <a
                    href="#"
                    class="dropdown-toggle"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                    Donald Johnson
                    <i class="mdi mdi-chevron-down"></i>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="javascript:void(0)" class="dropdown-item"
                        ><i class="mdi mdi-account-circle text-muted me-2"></i>
                        Profile
                        <div class="ripple-wrapper me-2"></div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="dropdown-item"
                        ><i class="mdi mdi-cog text-muted me-2"></i> Settings</a
                      >
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="dropdown-item"
                        ><i
                          class="mdi mdi-lock-open-outline text-muted me-2"></i>
                        Lock screen</a
                      >
                    </li>
                    <li>
                      <a href="javascript:void(0)" class="dropdown-item"
                        ><i class="mdi mdi-power text-muted me-2"></i> Logout</a
                      >
                    </li>
                  </ul>
                </div>

                <p class="text-white-50 m-0">Administrator</p>
              </div>
            </div>
          </div>

          <!--- Sidemenu -->
          <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
              <li class="menu-title">Nomor Soal</li>

              <div class="container-fluid py-2">
                <div class="row g-2" id="soal-buttons"></div>
              </div>
            </ul>

            <style>
              .btn-soal {
                width: 45px;
                height: 45px;
                font-weight: 600;
                font-size: 0.9rem;
                border-radius: 8px;
                transition: 0.2s;
                padding: 0;
              }

              .btn-soal:hover {
                transform: scale(1.08);
              }

              .btn-answered {
                background-color: #0d6efd; /* biru Bootstrap */
                color: white;
              }

              .btn-unanswered {
                background-color: #adb5bd; /* abu-abu */
                color: white;
              }

              /* rapikan layout */
              #side-menu {
                padding-bottom: 1rem;
              }

              .menu-title {
                font-size: 1rem;
                font-weight: 700;
                color: #6c757d;
                margin-bottom: 0.5rem;
              }
            </style>

            <script>
              const totalSoal = 15; // jumlah total soal
              const jawaban = {
                1: true,
                2: false,
                3: true,
                4: false,
                5: true,
                6: false,
                7: true,
                8: true,
                9: false,
                10: false,
                11: true,
                12: false,
                13: true,
                14: false,
                15: false,
              };

              const container = document.getElementById("soal-buttons");

              for (let i = 1; i <= totalSoal; i++) {
                const col = document.createElement("div");
                // 4 kolom per baris → col-3 (karena 12/3 = 4)
                col.classList.add("col-3", "d-flex", "justify-content-center");

                const btn = document.createElement("button");
                btn.classList.add(
                  "btn",
                  "btn-soal",
                  jawaban[i] ? "btn-answered" : "btn-unanswered"
                );
                btn.innerText = i;
                btn.onclick = () => alert("Kamu klik soal ke-" + i);

                col.appendChild(btn);
                container.appendChild(col);
              }
            </script>
          </div>
          <!-- Sidebar -->
        </div>
      </div>
      <!-- Left Sidebar End -->

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">
        <div class="page-content">
          <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
              <div class="col-12">
                <div
                  class="page-title-box d-flex align-items-center justify-content-between">
                  <div class="page-title">
                    <h3 class="mb-0 font-size-18">
                      <button
                        id="timerButton"
                        class="btn btn-danger btn-header">
                        Waktu: <span id="liveTimer">00:00:00</span>
                      </button>
                    </h3>
                  </div>

                  <div class="state-information d-none d-sm-block">
                    <div class="state-graph"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end page title -->

            <!-- Start Page-content-Wrapper -->
            <div class="page-content-wrapper">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card shadow-sm border-0">
                      <div class="card-body p-4">
                        <div
                          class="d-flex justify-content-between align-items-center mb-3">
                          <h2 class="card-title mb-0">Soal Nomor 2</h2>
                          <span class="badge bg-primary fs-6">1 / 50</span>
                        </div>

                        <p class="text-muted mb-4">
                          Pilihlah jawaban yang paling tepat dari soal berikut
                          ini.
                        </p>

                        <div class="question-content mt-5 text-center border-1">
                          <h1 class="masuk-soal mt-5">
                            <strong>FGHIY</strong>
                          </h1>

                          <form id="form-soal-1 mb-5" class="text-center">
                            <h1 class="fw-bold soal-2 text-primary">
                              <span>FGHY</span>
                            </h1>

                            <div class="container">
                              <div class="row justify-content-center g-2">
                                <div class="col-2">
                                  <label class="btn btn-outline-primary w-100">
                                    <input
                                      type="radio"
                                      class="btn-check"
                                      name="jawaban1"
                                      value="A"
                                      autocomplete="off" />
                                    G<br />
                                  </label>
                                </div>
                                <div class="col-2">
                                  <label class="btn btn-outline-primary w-100">
                                    <input
                                      type="radio"
                                      class="btn-check"
                                      name="jawaban1"
                                      value="B"
                                      autocomplete="off" />
                                    I<br />
                                  </label>
                                </div>
                                <div class="col-2">
                                  <label class="btn btn-outline-primary w-100">
                                    <input
                                      type="radio"
                                      class="btn-check"
                                      name="jawaban1"
                                      value="C"
                                      autocomplete="off" />
                                    G<br />
                                  </label>
                                </div>
                                <div class="col-2">
                                  <label class="btn btn-outline-primary w-100">
                                    <input
                                      type="radio"
                                      class="btn-check"
                                      name="jawaban1"
                                      value="D"
                                      autocomplete="off" />
                                    Y<br />
                                  </label>
                                </div>
                                <div class="col-2">
                                  <label class="btn btn-outline-primary w-100">
                                    <input
                                      type="radio"
                                      class="btn-check"
                                      name="jawaban1"
                                      value="E"
                                      autocomplete="off" />
                                    1<br />
                                  </label>
                                </div>
                              </div>
                            </div>
                          </form>

                          <style>
                            .btn-outline-primary {
                              padding: 15px;
                              border-width: 2px;
                              font-weight: 500;
                            }

                            /* warna aktif saat dipilih */
                            .btn-check:checked + .btn-outline-primary {
                              background-color: #0d6efd;
                              color: #fff;
                              border-color: #0d6efd;
                            }

                            /* biar huruf A-E dan harga di tengah */
                            .btn-outline-primary {
                              text-align: center;
                              white-space: normal;
                            }
                          </style>
                        </div>
                      </div>
                    </div>

                    <script>
                      function nextQuestion() {
                        const selected = document.querySelector(
                          'input[name="jawaban1"]:checked'
                        );
                        if (!selected) {
                          Swal.fire({
                            icon: "warning",
                            title: "Belum dijawab",
                            text: "Silakan pilih salah satu jawaban terlebih dahulu!",
                            confirmButtonColor: "#3085d6",
                          });
                          return;
                        }

                        Swal.fire({
                          icon: "success",
                          title: "Jawaban tersimpan!",
                          text: "Kamu memilih: " + selected.value,
                          confirmButtonColor: "#3085d6",
                        });
                      }
                    </script>

                    <!-- Tambahkan SweetAlert2 untuk pop-up yang halus -->
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                    <style>
                      #vertical-menu-btn {
                        display: none;
                      }

                      @media (max-width: 991px) {
                        #vertical-menu-btn {
                          display: inline-block;
                        }
                      }
                      .card {
                        border-radius: 16px;
                        background: #ffffff;
                      }

                      .card-body {
                        background-color: #fff;
                      }

                      .option-item {
                        border-radius: 10px;
                        cursor: pointer;
                        font-size: 1.05rem;
                        padding: 12px 15px;
                        transition: all 0.2s ease-in-out;
                      }

                      .option-item:hover {
                        background-color: #f1f3f5;
                      }

                      .option-item input[type="radio"]:checked + span {
                        font-weight: 600;
                      }

                      input[type="radio"]:checked ~ label,
                      .option-item input[type="radio"]:checked {
                        accent-color: #0d6efd;
                      }

                      .badge {
                        border-radius: 8px;
                      }

                      @media (max-width: 576px) {
                        .card-body {
                          padding: 1.25rem;
                        }
                        .fs-5 {
                          font-size: 1rem !important;
                        }
                      }
                    </style>

                    <!-- End Cardbody -->
                  </div>
                  <!-- End Card -->
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
            </div>
            <!-- End Page-content-wrapper -->
          </div>
          <!-- Container-fluid -->
        </div>
        <!-- End Page-content-wrapper -->

        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12 text-center">
                <script>
                  document.write(new Date().getFullYear());
                </script>
                © Agroxa
                <span class="d-none d-sm-inline-block"
                  >- Crafted with <i class="mdi mdi-heart text-primary"></i> by
                  Themesbrand.</span
                >
              </div>
            </div>
          </div>
        </footer>
      </div>
      <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
      <div data-simplebar class="h-100">
        <div class="rightbar-title px-3 py-4">
          <a href="javascript:void(0);" class="right-bar-toggle float-end">
            <i class="mdi mdi-close noti-icon"></i>
          </a>
          <h5 class="m-0">Settings</h5>
        </div>

        <!-- Settings -->
        <hr class="" />
        <h6 class="text-center mb-0">Choose Layouts</h6>

        <div class="p-4">
          <div class="mb-2">
            <img
              src="{{ asset('assetts/images/layouts/layout-1.png') }}"
              class="img-fluid img-thumbnail"
              alt="" />
          </div>

          <div class="form-check form-switch mb-3">
            <input
              type="checkbox"
              class="form-check-input theme-choice"
              id="light-mode-switch"
              checked />
            <label class="form-check-label" for="light-mode-switch"
              >Light Mode</label
            >
          </div>

          <div class="mb-2">
            <img
              src="{{ asset('assetts/images/layouts/layout-2.png') }}"
              class="img-fluid img-thumbnail"
              alt="" />
          </div>

          <div class="form-check form-switch mb-3">
            <input
              type="checkbox"
              class="form-check-input theme-choice"
              id="dark-mode-switch"
              data-bsStyle="assets/css/bootstrap-dark.min.css"
              data-appStyle="assets/css/app-dark.min.css" />
            <label class="form-check-label" for="dark-mode-switch"
              >Dark Mode</label
            >
          </div>

          <div class="mb-2">
            <img
              src="{{ asset('assetts/images/layouts/layout-3.png') }}"
              class="img-fluid img-thumbnail"
              alt="" />
          </div>
          <div class="form-check form-switch mb-5">
            <input
              type="checkbox"
              class="form-check-input theme-choice"
              id="rtl-mode-switch"
              data-appStyle="assets/css/app-rtl.min.css" />
            <label class="form-check-label" for="rtl-mode-switch"
              >RTL Mode</label
            >
          </div>

          <h6 class="mb-2">Select Custom Colors</h6>

          <div class="form-check form-check-inline">
            <input
              class="form-check-input theme-color"
              type="radio"
              name="theme-mode"
              id="theme-default"
              value="default"
              onchange="document.documentElement.setAttribute('data-theme-mode', 'default')"
              checked />
            <label class="form-check-label" for="theme-default">Default</label>
          </div>

          <div class="form-check form-check-inline">
            <input
              class="form-check-input theme-color"
              type="radio"
              name="theme-mode"
              id="theme-red"
              value="red"
              onchange="document.documentElement.setAttribute('data-theme-mode', 'red')" />
            <label class="form-check-label" for="theme-red">Red</label>
          </div>

          <div class="form-check form-check-inline">
            <input
              class="form-check-input theme-color"
              type="radio"
              name="theme-mode"
              id="theme-green"
              value="green"
              onchange="document.documentElement.setAttribute('data-theme-mode', 'green')" />
            <label class="form-check-label" for="theme-green">Green</label>
          </div>
        </div>
      </div>
      <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <!-- ini ujian -->
    <script>
      let startTime = Date.now();
      const duration = 60 * 60 * 1000; // 1 jam (dalam milidetik)
      const display = document.getElementById("liveTimer");

      function updateTimer() {
        const elapsed = Date.now() - startTime;
        const remaining = duration - elapsed;

        if (remaining <= 0) {
          clearInterval(timerInterval);
          display.textContent = "Selesai";
          document
            .getElementById("timerButton")
            .classList.replace("btn-outline-primary", "btn-success");
          return;
        }

        const totalSeconds = Math.floor(remaining / 1000);
        const hours = Math.floor(totalSeconds / 3600);
        const minutes = Math.floor((totalSeconds % 3600) / 60);
        const seconds = totalSeconds % 60;

        display.textContent = `${hours.toString().padStart(2, "0")}:${minutes
          .toString()
          .padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
      }

      const timerInterval = setInterval(updateTimer, 1000);
      updateTimer(); // panggil sekali di awal biar langsung tampil
    </script>

    <style>
      #timerButton {
        font-weight: 600;
        letter-spacing: 0.5px;
      }
    </style>
    <!-- akhir ujian -->
    <script src="{{ asset('assetts/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('assetts/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assetts/libs/bootstrap-editable/js/index.js') }}"></script>

    <!--form-xeditable Init js-->
    <script src="{{ asset('assetts/js/pages/form-xeditable.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assetts/js/app.js') }}"></script>
  </body>
</html>
