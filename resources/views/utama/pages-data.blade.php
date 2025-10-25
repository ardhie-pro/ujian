<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Masukan Nama - CIBN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Form Nama Peserta" name="description" />
    <meta content="Citta Bhakti Nirbaya" name="author" />
    <link rel="shortcut icon" href="{{ asset('assetts/images/favicon.ico') }}" />

    <!-- Bootstrap -->
    <link href="{{ asset('assetts/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assetts/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assetts/css/app.min.css') }}" rel="stylesheet" type="text/css" />
  </head>

  <body data-topbar="colored">
    <div class="account-pages"></div>
    <div class="wrapper-page">
      <div class="card">
        <div class="card-body">
          <div class="auth-logo text-center mb-3">
            <img src="{{ asset('assetts/images/logo-sm-dark.png') }}" height="120" alt="logo-dark" />
          </div>

          <div id="form-container" class="p-3">
            <h4 class="text-muted font-size-18 text-center">Masukan Nama Anda</h4>
            <p class="text-muted text-center">Gunakan huruf kapital untuk penulisan nama.</p>

            <form id="namaForm">
              <div class="mb-3">
                <label class="form-label" for="username">Nama Lengkap</label>
                <input
                  type="text"
                  name="jawaban"
                  class="form-control"
                  id="username"
                  placeholder="MASUKAN NAMA"
                  required />
              </div>

              <div class="text-end">
                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                  Kirim
                </button>
              </div>
            </form>
          </div>

          <!-- Hasil setelah kirim -->
          <div id="hasil-container" class="text-center p-5 d-none">
            <h3 class="text-success mb-3">✅ Siap mulai mengerjakan!</h3>
            <p class="text-muted">Klik tombol di bawah untuk memulai tes.</p>
            <form action="/next-modul" method="POST">
              @csrf
              <input type="hidden" name="modul" value="{{ $modul }}">
              <button type="submit" class="btn btn-success mt-3">Mulai Sekarang</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-3">
      <p class="text-muted">
        © <script>document.write(new Date().getFullYear());</script> CIBN. Crafted by Citta Bhakti Nirbaya
      </p>
    </div>

    <script src="{{ asset('assetts/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assetts/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
          const form = document.getElementById("namaForm");
          const formContainer = document.getElementById("form-container");
          const hasilContainer = document.getElementById("hasil-container");

          form.addEventListener("submit", function(e) {
              e.preventDefault();
              const nama = document.getElementById("username").value.trim();
              if (!nama) {
                  alert("⚠️ Nama tidak boleh kosong!");
                  return;
              }

              fetch('/simpan-jawaban', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  },
                  body: JSON.stringify({
                      modul: "{{ $modul }}",
                      kodeLogin: "{{ session('kode_login') }}",
                      no: 1,
                      jawaban: nama
                  })
              })
              .then(res => {
                  if (!res.ok) throw new Error("Gagal menyimpan nama!");
                  return res.json();
              })
              .then(data => {
                  formContainer.classList.add("d-none");
                  hasilContainer.classList.remove("d-none");
              })
              .catch(err => {
                  console.error(err);
                  alert("Terjadi kesalahan saat menyimpan nama.");
              });
          });
      });
    </script>
  </body>
</html>
