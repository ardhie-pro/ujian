<?php

use App\Http\Controllers\KumpulanModulController;
use App\Http\Controllers\GrupKolomConntroller;
use App\Http\Controllers\KodeLoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KodeGeneratorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SoalMultipleChoiceController;
use App\Http\Controllers\KelompokSoalController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\TarikModulController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;


Route::get('/menunggu-konfirmasi', function () {
    return view('auth.menunggu-konfirmasi');
})->name('menunggu.konfirmasi');
Route::get('/akses', function () {
    return view('utama.sits');
});
Route::get('/cekselesai', function () {
    return view('utama.break');
});
Route::get('/pendahuluan', function () {
    return view('utama.pagependahuluan');
});

Route::get('/download-template-soal', function () {
    // Path ke file template Word kamu di folder resources/views/template
    $path = resource_path('views/template/soal.docx');
    // Pastikan file-nya ada
    if (!file_exists($path)) {
        abort(404, '⚠️ Template tidak ditemukan di: ' . $path);
    }
    // Kirim file untuk di-download
    return Response::download(
        $path,
        'Template_Soal.docx',
        ['Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']
    );
})->name('download.template.soal');



Route::get('/', function () {
    $banner = \App\Models\LandingBanner::where('is_active', true)->first();
    $features = \App\Models\LandingFeature::where('is_active', true)->orderBy('order', 'asc')->get();
    $clients = \App\Models\LandingClient::where('is_active', true)->orderBy('order', 'asc')->get();
    $services = \App\Models\LandingService::where('is_active', true)->orderBy('order', 'asc')->get();
    $serviceSection = \App\Models\LandingServiceSection::first();
    $videoPromo = \App\Models\LandingVideo::first();
    $ctaSection = \App\Models\LandingCtaSection::first();
    $ctaButtons = \App\Models\LandingCtaButton::where('is_active', true)->orderBy('order')->get();
    $testimonials = \App\Models\LandingTestimonial::where('is_active', true)->orderBy('order')->orderBy('created_at', 'desc')->get();
    return view('utama.landing-new', compact('banner', 'features', 'clients', 'services', 'serviceSection', 'videoPromo', 'ctaSection', 'ctaButtons', 'testimonials'));
});
Route::get('/hasiluser/{kode}', [LaporanController::class, 'hasiluser'])->name('hasiluser.show');
Route::get('/kode', [KodeLoginController::class, 'index'])->name('kode.login');
Route::post('/kode/check', [KodeLoginController::class, 'check'])->name('kode.check');

Route::get('/laporan/{kode}', [LaporanController::class, 'show'])->name('laporan.show');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/history', [KodeLoginController::class, 'history'])->name('history.login');
    Route::post('/akun/update', [KodeLoginController::class, 'update'])->name('akun.update');
});

Route::middleware(['auth', 'role:review,admin'])->group(function () {
    // halaman review
    Route::get('/tampilkankode', [App\Http\Controllers\ReviewController::class, 'tampilkankode'])->name('tampilkankode.index');
    Route::get('/review', [App\Http\Controllers\ReviewController::class, 'index'])->name('review.index');
    Route::get('/review/{kode}', [App\Http\Controllers\ReviewController::class, 'show'])->name('review.show');
    Route::get('/review/{kode}/{modul}', [App\Http\Controllers\ReviewController::class, 'detail'])->name('review.detail');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // dasboard Admin
    Route::post('user/status/{id}', [AdminController::class, 'approveUser'])
        ->name('admin.updateUserStatus');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/dashboard/generate-user', [AdminController::class, 'generateUser'])
        ->name('admin.generateUser');
    Route::get('/akun', [AdminController::class, 'akun'])->name('admin.akun');
    Route::get('/user', [AdminController::class, 'user'])->name('admin.user');
    Route::post('/user/buatakun', [AdminController::class, 'buatakun'])->name('user.buatakun');
    Route::post('/user/buatgrup', [AdminController::class, 'buatgrup'])->name('user.buatgrup');
    Route::delete('/hapus-grup/{id}', [AdminController::class, 'hapusGrup'])->name('user.hapusgrup');
    Route::post('/user/update-grup/{id}', [AdminController::class, 'updateGrup'])->name('user.updateGrup');
    Route::post('/user/hapus-grup/{id}', [AdminController::class, 'hapusbGrup'])->name('user.hapusbGrup');



    Route::resource('kumpulan-modul', KumpulanModulController::class);
    // ✅ Halaman tabel user
    Route::get('/dashboard/users', [AdminController::class, 'users'])->name('admin.users');
    Route::delete('/dashboard/users/delete/{id}', [AdminController::class, 'deleteUser'])
        ->name('admin.deleteUser');
    Route::post('/dashboard/galeri', [AdminController::class, 'galeriStore'])->name('admin.galeri.store');
    Route::post('/dashboard/galeri/update/{id}', [AdminController::class, 'galeriUpdate'])->name('admin.galeri.update');
    Route::delete('/dashboard/galeri/delete/{id}', [AdminController::class, 'galeriDelete'])->name('admin.galeri.delete');
    // ✅ Update user — pakai method updateUser (bukan update)
    Route::post('/dashboard/users/update/{user}', [AdminController::class, 'updateUser'])
        ->name('admin.updateUser');
    // buat kode
    Route::get('/generate-kode', [KodeGeneratorController::class, 'index'])->name('generate-kode.index');
    Route::post('/generate-kode', [KodeGeneratorController::class, 'store'])->name('generate-kode.store');
    Route::delete('/generate-kode/{id}', [KodeGeneratorController::class, 'destroy'])->name('generate-kode.destroy');
    // Landing Banner
    Route::get('/landing-banner', [App\Http\Controllers\LandingBannerController::class, 'index'])->name('landing-banner.index');
    Route::post('/landing-banner', [App\Http\Controllers\LandingBannerController::class, 'update'])->name('landing-banner.update');
    Route::resource('landing-feature', App\Http\Controllers\LandingFeatureController::class);
    Route::resource('landing-client', App\Http\Controllers\LandingClientController::class);
    Route::resource('landing-service', App\Http\Controllers\LandingServiceController::class);
    Route::post('/landing-service/section', [App\Http\Controllers\LandingServiceController::class, 'updateSection'])->name('landing-service.section.update');
    
    Route::get('/landing-video', [App\Http\Controllers\LandingVideoController::class, 'index'])->name('landing-video.index');
    Route::post('/landing-video', [App\Http\Controllers\LandingVideoController::class, 'update'])->name('landing-video.update');

    Route::get('/landing-cta', [App\Http\Controllers\LandingCtaController::class, 'index'])->name('landing-cta.index');
    Route::post('/landing-cta/section', [App\Http\Controllers\LandingCtaController::class, 'updateSection'])->name('landing-cta.section.update');
    Route::post('/landing-cta/button', [App\Http\Controllers\LandingCtaController::class, 'storeButton'])->name('landing-cta.button.store');
    Route::get('/landing-cta/button/{button}/edit', [App\Http\Controllers\LandingCtaController::class, 'editButton'])->name('landing-cta.button.edit');
    Route::put('/landing-cta/button/{button}', [App\Http\Controllers\LandingCtaController::class, 'updateButton'])->name('landing-cta.button.update');
    Route::delete('/landing-cta/button/{button}', [App\Http\Controllers\LandingCtaController::class, 'destroyButton'])->name('landing-cta.button.destroy');

    Route::resource('landing-testimonial', App\Http\Controllers\LandingTestimonialController::class)->except(['create', 'store', 'show']);
    Route::post('/landing-testimonial/submit', [App\Http\Controllers\LandingTestimonialController::class, 'storePublic'])->name('landing-testimonial.submit');

    // admin view soal multiple
    Route::prefix('soal-multiple')->name('soal-multiple.')->group(function () {
        Route::get('/', [SoalMultipleChoiceController::class, 'index'])->name('index');
        Route::get('/create', [SoalMultipleChoiceController::class, 'create'])->name('create');
        Route::post('/store', [SoalMultipleChoiceController::class, 'store'])->name('store');
        Route::put('/{id}', [SoalMultipleChoiceController::class, 'update'])->name('update');
        Route::delete('/{id}', [SoalMultipleChoiceController::class, 'destroy'])->name('destroy');
    });
    // vie admin soal
    Route::get('/soal', [SoalController::class, 'index'])->name('soal.index');
    Route::post('/soal/import-preview', [SoalController::class, 'importPreview'])->name('soal.importPreview');
    Route::post('/soal/import-save', [SoalController::class, 'importSave'])->name('soal.importSave');
    Route::post('/soal/generate', [SoalController::class, 'generateSoal'])->name('soal.generate');
    Route::post('/soal', [SoalController::class, 'store'])->name('soal.store');
    Route::post('/soal/import-word', [SoalController::class, 'importWord'])->name('soal.importWord');
    Route::put('/soal/{id}', [SoalController::class, 'update'])->name('soal.update');
    Route::delete('/soal/{id}', [SoalController::class, 'destroy'])->name('soal.destroy');
    Route::post('/soal/delete-all', [SoalController::class, 'deleteAll'])
        ->name('soal.deleteAll');


    // kunci jawaban
    Route::get('/kunci-jawaban/{modul}/{type_template}', [SoalController::class, 'show'])->name('kunci-jawaban.show');
    Route::post('/kunci-jawaban/simpan', [SoalController::class, 'simpan'])->name('kunci-jawaban.simpan');
    Route::post('/kunci-jawaban/simpan-tanpa-kembali', [SoalController::class, 'simpanTanpaKembali'])
        ->name('kunci-jawaban.simpan-tanpa-kembali');
    // laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/{kode}/{user_id}', [LaporanController::class, 'detail'])->name('laporan.detail');
    // tarikmodul routes
    Route::get('/tarik-modul', [TarikModulController::class, 'index'])->name('tarik-modul.index');
    Route::post('/tarik-modul', [TarikModulController::class, 'store'])->name('tarik-modul.store');
    Route::post('/tarik-modul/update/{id}', [TarikModulController::class, 'update'])->name('tarik-modul.update');
    Route::delete('/tarik-modul/{id}', [TarikModulController::class, 'destroy'])->name('tarik-modul.destroy');
    // kelompok soal routes
    Route::get('/kelompok-soal', [KelompokSoalController::class, 'index'])->name('kelompok-soal.index');
    Route::post('/kelompok-soal', [KelompokSoalController::class, 'store']);
    Route::get('/kelompok-soal/{id}/edit', [KelompokSoalController::class, 'edit'])->name('kelompok-soal.edit');
    Route::resource('kelompok-soal', KelompokSoalController::class);
    Route::put('/kelompok-soal/{id}', [KelompokSoalController::class, 'update']);
    Route::delete('/kelompok-soal/{id}', [KelompokSoalController::class, 'destroy']);

    Route::get('/grupangkahilang', [GrupKolomConntroller::class, 'index'])->name('grupangkahilang.index');
    Route::get('/grupkolom/{nama}', [GrupKolomConntroller::class, 'detail'])->name('grup.detail');
    // UPDATE nama_grup (pakai modal)
    Route::put('/updategrup/{id}', [GrupKolomConntroller::class, 'updatek'])->name('grup.update');
    // DELETE nama_grup + hapus semua modul
    Route::delete('/destroy/{nama}', [GrupKolomConntroller::class, 'destroy'])->name('grup.destroy');

    // angka hilang grup
    Route::post('/grupkolom/generate', [GrupKolomConntroller::class, 'generate'])
        ->name('grupkolom.generate');
    Route::put('/modul/update/{id}', [GrupKolomConntroller::class, 'update'])->name('modul.update');
    Route::delete('/modul/delete/{id}', [GrupKolomConntroller::class, 'delete'])->name('modul.delete');
    Route::post('/grupkolom/tambah-kolom', [GrupKolomConntroller::class, 'tambahKolom'])
        ->name('grup.tambahKolom');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/get-soal-multiple/{modul}', [SoalMultipleChoiceController::class, 'getSoalByModul']);
Route::get('/get-soal/{modul}/{no}', [AdminController::class, 'getSoal']);
Route::post('/simpan-jawaban', [AdminController::class, 'simpanJawaban']);
// mengambil soal dan jawaban terakhir apabila ke logout dan login lagi
Route::get('/get-jawaban/{modul}/{kodeLogin}', [SoalMultipleChoiceController::class, 'getJawaban']);
Route::get('/logouttest', [KodeLoginController::class, 'logoutTest'])->name('logouttest');
Route::get('/ujian', [SoalMultipleChoiceController::class, 'ujian'])->name('ujian');
Route::post('/next-modul', [SoalMultipleChoiceController::class, 'nextModul'])->name('next.modul');

require __DIR__ . '/auth.php';
