
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Citta Bhakti Nirbaya</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Bootstrap App Landing Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Citta Bhakti Nirbaya">
  <meta name="generator" content="Citta Bhakti Nirbaya">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assetts/images/cibn.png') }}" />
  
  <!-- PLUGINS CSS STYLE -->
  <link rel="stylesheet" href="{{ asset('landing/plugins/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('landing/plugins/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('landing/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('landing/plugins/slick/slick-theme.css') }}">
  <link rel="stylesheet" href="{{ asset('landing/plugins/fancybox/jquery.fancybox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('landing/plugins/aos/aos.css') }}">

  <!-- CUSTOM CSS -->
  <link href="{{ asset('landing/css/style.css') }}" rel="stylesheet">
  
  <style>
    .client-slider .item img {
        filter: grayscale(100%);
        -webkit-filter: grayscale(100%);
        opacity: 0.6;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .client-slider .item:hover img {
        filter: grayscale(0%);
        -webkit-filter: grayscale(0%);
        opacity: 1;
    }
    html {
        scroll-behavior: smooth;
    }
  </style>

</head>

<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">


<nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
  <div class="container">
    <a class="navbar-brand font-weight-bold" href="#home">
        <img src="{{ asset('assetts/images/cibn.png') }}" alt="logo" style="width: 50px; padding: 3px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="ti-menu"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#fitur">Fitur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#layanan">Layanan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#video">Video</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#testimonial">Testimoni</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#cta">CTA</a>
        </li>
        <li class="nav-item d-flex align-items-center">
            <a class="btn btn-main-md text-white ml-lg-3 px-4 shadow-sm" href="{{ route('login') }}" style="border-radius: 50px; padding: 7px 25px; line-height: 1; font-size: 14px;">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!--====================================
=            Hero Section            =
=====================================-->
<section class="section gradient-banner" id="home">
	<div class="shapes-container">
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"></div>
		<div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="zoom-out" data-aos-duration="2000" data-aos-delay="500"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0"></div>
		<div class="shape" data-aos="fade-down" data-aos-duration="500" data-aos-delay="0"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="0"></div>
	</div>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 order-2 order-md-1 text-center text-md-left">
				<h1 class="text-white font-weight-bold mb-4">{{ $banner->title ?? 'Showcase your app with Small Apps' }}</h1>
				<p class="text-white mb-5">{{ $banner->description ?? 'Besides its beautiful design. Laapp is an incredibly rich core framework for you to showcase your App.' }}</p>
				<a href="{{ $banner->button_link ?? 'FAQ.html' }}" class="btn btn-main-md">{{ $banner->button_text ?? 'Download Now' }}</a>
			</div>
			<div class="col-md-6 text-center order-1 order-md-2">
				<img class="img-fluid" src="{{ isset($banner->image) ? asset($banner->image) : asset('landing/images/mobile.png') }}" alt="screenshot">
			</div>
		</div>
	</div>
</section>
<!--====  End of Hero Section  ====-->

<section class="section pt-0 position-relative pull-top">
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="rounded shadow p-5 bg-white">
                   	<h2 class="text-center mb-5 ">Client Kami</h2>
                    <div class="client-slider pb-4">
                        @foreach($clients as $client)
                        <div class="item text-center">
                            <img class="img-fluid m-auto" src="{{ asset($client->logo) }}" alt="{{ $client->name ?? 'client logo' }}" style="width: 130px;">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>

<!--==================================
=            Feature Grid            =
===================================-->
<div id="fitur"></div>
@foreach($features as $feature)
<section class="feature section pt-0">
	<div class="container">
		<div class="row">
            @if($feature->layout == 'image_left')
			<div class="col-lg-6 ml-auto justify-content-center">
				<div class="image-content" data-aos="fade-right">
					<img class="img-fluid" src="{{ asset($feature->image) }}" alt="feature">
				</div>
			</div>
            @endif

			<div class="col-lg-6 {{ $feature->layout == 'image_left' ? 'mr-auto' : 'ml-auto' }} align-self-center">
				<div class="feature-content">
					<h2>{!! $feature->title !!}</h2>
					<p class="desc">{{ $feature->description }}</p>
				</div>
                @if($feature->testimonial_quote)
				<div class="testimonial">
					<p>
						"{{ $feature->testimonial_quote }}"
					</p>
					<ul class="list-inline meta">
						<li class="list-inline-item">
                            @if($feature->testimonial_author_image)
							<img src="{{ asset($feature->testimonial_author_image) }}" alt="author">
                            @endif
						</li>
						<li class="list-inline-item">{{ $feature->testimonial_author }}</li>
					</ul>
				</div>
                @endif
			</div>

            @if($feature->layout == 'image_right')
			<div class="col-lg-6 mr-auto justify-content-center">
				<div class="image-content" data-aos="fade-left">
					<img class="img-fluid" src="{{ asset($feature->image) }}" alt="feature">
				</div>
			</div>
            @endif
		</div>
	</div>
</section>
@endforeach
<!--====  End of Feature Grid  ====-->

<!--==============================
=            Services            =
===============================-->
<section class="service section bg-gray" id="layanan">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h2>{{ $serviceSection->title ?? 'An Interface For Lifestyle' }}</h2>
					<p>{!! $serviceSection->description ?? 'Citta Bhakti Nirbaya memudahkan Anda untuk tetap teratur dalam gaya hidup Anda. Tidak ada tugas yang terlambat. Tidak ada gimik.' !!}</p>
				</div>
			</div>
		</div>
		<div class="row no-gutters">
			<div class="col-lg-6 align-self-center">
				<!-- Feature Image -->
				<div class="service-thumb left" data-aos="fade-right">
					<img class="img-fluid" src="{{ isset($serviceSection->image) ? asset($serviceSection->image) : asset('landing/images/feature/iphone-ipad.jpg') }}" alt="iphone-ipad">
				</div>
			</div>
			<div class="col-lg-5 mr-auto align-self-center">
				<div class="service-box">
					<div class="row align-items-center">
						@foreach($services as $service)
						<div class="col-md-6 col-xs-12">
							<!-- Service Item -->
							<div class="service-item">
								<!-- Icon -->
								<i class="{{ $service->icon }}"></i>
								<!-- Heading -->
								<h3>{{ $service->title }}</h3>
								<!-- Description -->
								<p>{{ $service->description }}</p>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Services  ====-->


<!--=================================
=            Video Promo            =
==================================-->
<section class="video-promo section bg-1" id="video" @if(isset($videoPromo->background_image)) style="background-image: url('{{ asset($videoPromo->background_image) }}'); background-size: cover; background-position: center;" @endif>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="content-block">
					<!-- Heading -->
					<h2>{{ $videoPromo->title ?? 'Watch Our Promo Video' }}</h2>
					<!-- Promotional Speech -->
					<p>{{ $videoPromo->description ?? 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus' }}</p>
					<!-- Popup Video -->
					<a data-fancybox href="{{ $videoPromo->video_url ?? 'https://www.youtube.com/watch?v=jrkvirglgaQ' }}">
						<i class="ti-control-play video"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Video Promo  ====-->

<!--=================================
=            Testimonial            =
==================================-->
<!--=================================
=            Testimonial            =
==================================-->
<section class="section testimonial" id="testimonial">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h2>Apa Kata Mereka?</h2>
					<p>Pengalaman nyata dari pengguna yang telah menggunakan layanan kami.</p>
					<button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modalTestimonial">
						Isi Pengalaman Anda
					</button>
				</div>
				
				@if(session('success_testimonial'))
					<div class="alert alert-success text-center">
						{{ session('success_testimonial') }}
					</div>
				@endif

				<!-- Testimonial Slider -->
				<div class="testimonial-slider owl-carousel owl-theme">
					@forelse($testimonials as $testimonial)
					<!-- Testimonial Item -->
					<div class="item">
						<div class="block shadow">
							<!-- Speech -->
							<p>{{ $testimonial->message }}</p>
							<!-- Person Thumb -->
							<div class="image">
								<img src="{{ $testimonial->photo ? asset($testimonial->photo) : asset('landing/images/testimonial/feature-testimonial-thumb.jpg') }}" alt="image">
							</div>
							<!-- Name and Company -->
							<cite>{{ $testimonial->name }} {{ $testimonial->company ? ', ' . $testimonial->company : '' }}</cite>
						</div>
					</div>
					@empty
					<!-- Default content if empty -->
					<div class="item">
						<div class="block shadow">
							<p>Belum ada testimoni yang ditampilkan.</p>
							<div class="image">
								<img src="{{ asset('landing/images/testimonial/feature-testimonial-thumb.jpg') }}" alt="image">
							</div>
							<cite>Admin</cite>
						</div>
					</div>
					@endforelse
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Modal Submission Testimonial -->
<div class="modal fade" id="modalTestimonial" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Bagikan Pengalaman Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('landing-testimonial.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Budi Santoso" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan / Perusahaan (Opsional)</label>
                        <input type="text" name="company" class="form-control" placeholder="Contoh: CEO di Tech Corp">
                    </div>
                    <div class="form-group">
                        <label>Pesan / Pengalaman</label>
                        <textarea name="message" class="form-control" rows="4" placeholder="Ceritakan pengalaman Anda menggunakan layanan kami..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto Profil (Opsional)</label>
                        <input type="file" name="photo" class="form-control">
                        <small class="text-muted">Ukuran maksimal 1MB (Format: jpg, png, jpeg)</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim Testimoni</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--====  End of Testimonial  ====-->
<!--====  End of Testimonial  ====-->

<!--=====================================
=            Call to Action            =
======================================-->
<section class="call-to-action-app section bg-blue" id="cta">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>{{ $ctaSection->title ?? 'Semua Mendukung Perangkat Anda' }}</h2>
				<p>{!! $ctaSection->description ?? 'Gunakan dimanapun dan kapanpun layanan kami! <br>Citta Bhakti Nirbaya' !!}</p>
				<ul class="list-inline">
					@foreach($ctaButtons as $button)
					<li class="list-inline-item">
						<a href="{{ $button->link ?? '#' }}" class="btn btn-rounded-icon">
							<i class="{{ $button->icon }}"></i>
							{{ $button->label }}
						</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
<!--====  End of Call to Action  ====-->
<!--============================
=            Footer            =
=============================-->
<footer>
  <div class="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12 m-md-auto align-self-center">
          <div class="block">
            <a href="#home"><img src="{{ asset('assetts/images/cibn.png') }}" alt="footer-logo" style="width: 50px; padding: 3px;"></a>
            <!-- Social Site Icons -->
            <ul class="social-icon list-inline">
              <li class="list-inline-item">
                <a href="#"><i class="ti-facebook"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><i class="ti-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#"><i class="ti-instagram"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Navigasi</h6>
            <!-- links -->
            <ul>
              <li><a href="#home">Home</a></li>
              <li><a href="#fitur">Fitur</a></li>
              <li><a href="#layanan">Layanan</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Layanan</h6>
            <!-- links -->
            <ul>
              <li><a href="#video">Video</a></li>
              <li><a href="#testimonial">Testimoni</a></li>
              <li><a href="#cta">CTA</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Akun</h6>
            <!-- links -->
            <ul>
              <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6 mt-5 mt-lg-0">
          <div class="block-2">
            <!-- heading -->
            <h6>Bantuan</h6>
            <!-- links -->
            <ul>
              <li><a href="https://wa.me/yournumber" target="_blank">WhatsApp</a></li>
              <li><a href="mailto:info@cibn.id">Email</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center bg-dark py-4">
    <small class="text-secondary">Copyright &copy; <script>document.write(new Date().getFullYear())</script>. Designed &amp; Developed by Citta Bhakti Nirbaya</small>
  </div>

	<div class="text-center bg-dark py-1">
   <small class="text-secondary"> <p>Distributed By Citta Bhakti Nirbaya</p></small>
  </div>
</footer>


  <!-- To Top -->
  <div class="scroll-top-to">
    <i class="ti-angle-up"></i>
  </div>
  
  <!-- JAVASCRIPTS -->
  <script src="{{ asset('landing/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('landing/plugins/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('landing/plugins/slick/slick.min.js') }}"></script>
  <script src="{{ asset('landing/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
  <script src="{{ asset('landing/plugins/syotimer/jquery.syotimer.min.js') }}"></script>
  <script src="{{ asset('landing/plugins/aos/aos.js') }}"></script>
  <!-- google map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
  <script src="{{ asset('landing/plugins/google-map/gmap.js') }}"></script>
  
  <script src="{{ asset('landing/js/script.js') }}"></script>
</body>

</html>
