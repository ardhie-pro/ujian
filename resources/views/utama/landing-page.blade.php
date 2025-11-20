<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coursea - Website Pembelajaran Profesional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* GLOBAL & THEME COLORS (Diperbarui) */
        :root {
            --yellow-main: #e1b63b;
            /* Kuning Emas */
            --blue-main: #0E2542;
            /* Biru Tua */
            --light-bg: #f7f9fb;
            /* Background Terang */
            --dark-bg: #112a49;
            /* Varian Biru Gelap untuk Outcomes */
            --text-dark: #0E2542;
        }

        body {
            font-family: 'Arial', sans-serif;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        .container-xl {
            max-width: 1300px;
        }

        /* Tombol & Navbar */
        .logo {
            font-size: 1.7rem;
            font-weight: 800;
            color: var(--blue-main);
            text-decoration: none;
        }

        .signup-btn {
            background-color: var(--yellow-main);
            color: var(--blue-main);
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: bold;
            border: none;
            transition: all 0.2s;
        }

        .signup-btn:hover {
            background-color: var(--blue-main);
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .request-demo-btn {
            background-color: var(--yellow-main);
            color: var(--blue-main);
            border-radius: 30px;
            padding: 12px 25px;
            font-weight: 600;
            border: none;
            transition: all 0.2s;
        }

        .request-demo-btn:hover {
            background-color: #d1a731;
            color: white;
        }

        .im-mentor-btn {
            background-color: white;
            color: var(--blue-main);
            border: 2px solid var(--yellow-main);
            border-radius: 30px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .im-mentor-btn:hover {
            background-color: var(--yellow-main);
            color: var(--blue-main);
        }

        /* SECTION: MENTOR (HERO) */
        .mentor-section {
            background-color: var(--light-bg);
            padding-bottom: 150px;
            border-bottom-left-radius: 60px;
            border-bottom-right-radius: 60px;
            position: relative;
            z-index: 1;
        }

        .welcome-tag {
            font-size: 0.75rem;
            color: var(--blue-main);
            border: 2px solid var(--yellow-main);
            padding: 6px 18px;
            border-radius: 20px;
            font-weight: bold;
        }

        .mentor-heading {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.1;
            color: var(--blue-main);
        }

        @media (max-width: 768px) {
            .mentor-heading {
                font-size: 2.5rem;
            }
        }

        /* QUOTE */
        .quote-icon {
            font-size: 4rem;
            color: var(--yellow-main);
            margin-bottom: 10px;
            line-height: 0.8;
        }

        .mentors-count strong {
            font-size: 2rem;
            color: var(--blue-main);
        }

        /* MENTOR PHOTO CONTAINER (Diperbaiki) */
        .mentor-center {
            position: relative;
            padding-top: 50px;
            padding-bottom: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            min-height: 500px;
        }

        .yellow-circle {
            position: absolute;
            width: 90%;
            height: 90%;
            background-color: var(--yellow-main);
            border-radius: 50%;
            max-width: 450px;
            max-height: 450px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .mentor-photo {
            position: relative;
            z-index: 3;
            max-width: 100%;
            height: auto;
            max-height: 450px;
            object-fit: contain;
            /* Menggunakan contain agar gambar penuh */
            /* filter: drop-shadow(0 10px 10px rgba(0, 0, 0, 0.2)); Menambahkan bayangan halus pada gambar */
        }

        .action-buttons {
            position: relative;
            z-index: 5;
            margin-top: 20px;
        }

        /* TESTIMONIAL CARDS */
        .testimonial-card-light {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-left: 6px solid var(--yellow-main);
            height: 100%;
        }

        .testimonial-card-light .star-rating {
            color: var(--yellow-main);
            font-size: 1.1rem;
        }

        /* Gambar Testimonial */
        .testimonial-img {
            width: 45px;
            height: 45px;
            object-fit: cover;
            /* Memastikan gambar profil terlihat baik */
        }

        /* OUTCOMES SECTION (DARK) */
        .outcomes-section {
            background-color: var(--blue-main);
            color: white;
            padding: 90px 0;
            margin-top: -100px;
            position: relative;
        }

        .outcome-heading {
            font-size: 3rem;
            font-weight: 800;
        }

        .highlight-percent {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--yellow-main);
        }

        .testimonial-card-dark {
            background-color: var(--dark-bg);
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            height: 100%;
        }

        .testimonial-card-dark .star-rating {
            color: var(--yellow-main);
            font-size: 1.1rem;
        }

        /* STATS BAR */
        .stats-bar {
            background-color: #1a395c;
            /* Varian biru gelap */
            border-radius: 20px;
            padding: 30px 0;
            margin-top: 50px;
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--yellow-main);
        }

        .stat-label {
            font-size: 0.9rem;
            color: #cdd4e0;
        }
    </style>
</head>

<body>

    <section class="mentor-section">
        <div class="container-xl">
            <nav class="navbar navbar-expand-lg bg-transparent py-4">
                <div class="container-fluid px-0">
                    <a class="logo navbar-brand" href="#">Coursea</a>

                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="fas fa-bars text-dark"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-center">
                            <li class="nav-item">
                                <a href="#" class="nav-link text-secondary mx-lg-3 fw-bold active"
                                    aria-current="page">Category</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-secondary mx-lg-3 fw-bold">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-secondary mx-lg-3 fw-bold">Coursea Business</a>
                            </li>
                            <li class="nav-item mt-3 mt-lg-0 ms-lg-3">
                                <a href="#" class="signup-btn text-decoration-none d-inline-block">Sign Up <i
                                        class="fas fa-arrow-right ms-1"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="text-center pt-5">
                <span class="welcome-tag d-inline-block">WELCOME TO COURSEA</span>
                <h1 class="mentor-heading text-dark my-3">
                    Meet the Professional<br>Mentor
                </h1>
            </div>

            <div class="row g-4 mt-4 align-items-center">

                <div class="col-lg-3 order-lg-1 order-2 d-flex flex-column justify-content-center quote-box pt-5">
                    <span class="quote-icon">❝</span>
                    <p class="fs-6 text-dark opacity-75">Now you can learn anywhere, anytime, even if there is no
                        internet access!</p>
                    <p class="mentors-count text-dark">
                        <strong class="d-block">10K+</strong>
                        Mentors
                    </p>
                </div>

                <div class="col-lg-6 order-lg-2 order-1 mentor-center text-center">
                    <div class="yellow-circle"></div>

                    <img src="https://i.ibb.co/6y4t0kF/professional-mentor-blue-yellow.png" alt="Professional Mentor"
                        class="mentor-photo img-fluid">

                    <div class="action-buttons d-flex flex-wrap justify-content-center gap-3 mt-4">
                        <button class="request-demo-btn btn border-0">Request Demo <i
                                class="fas fa-chevron-right"></i></button>
                        <button class="im-mentor-btn btn">I'm Mentor <i class="far fa-star"></i></button>
                    </div>
                </div>

                <div class="col-lg-3 order-lg-3 order-3 pt-5">
                    <div class="testimonial-card-light">
                        <span class="star-rating">★★★★★</span>
                        <p class="mt-2 mb-3 text-dark small">"This course was comprehensive and covered everything I
                            needed to
                            know about animation."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://i.ibb.co/zX0Ld5r/user-female-1.png" alt="Pristia Cendra"
                                class="rounded-circle me-3 testimonial-img">
                            <div>
                                <p class="fw-bold mb-0 text-dark small">Pristia Cendra</p>
                                <p class="text-secondary small mb-0">UI/UX Designer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="outcomes-section">
        <div class="container-xl">
            <h2 class="outcome-heading text-center mb-5">
                Learner Outcomes<br>On Coursea
            </h2>
            <p class="text-center text-light opacity-75 mb-5">Start, switch, or advance your career with more than
                34.000+
                courses in Coursea!</p>

            <div class="row g-4 align-items-stretch">
                <div class="col-lg-6">
                    <p class="highlight-percent">↗ 87%</p>
                    <p class="fs-5 text-light opacity-85">
                        People learning for professional development report career benefits, including outcomes like
                        getting a promotion.
                    </p>
                </div>

                <div class="col-lg-6">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="testimonial-card-dark">
                                <span class="star-rating">★★★★★</span>
                                <p class="mt-2 mb-3 text-light opacity-90 small">This course was comprehensive and
                                    covered
                                    everything I needed to know about animation.</p>
                                <div class="d-flex align-items-center">
                                    <img src="https://i.ibb.co/Msw38g5/user-female-2.png" alt="Katie Waters"
                                        class="rounded-circle me-3 testimonial-img">
                                    <div>
                                        <p class="fw-bold mb-0 text-light small">Katie Waters</p>
                                        <p class="text-secondary small mb-0">Project Manager</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="testimonial-card-dark">
                                <span class="star-rating">★★★★★</span>
                                <p class="mt-2 mb-3 text-light opacity-90 small">This helped me land my product manager
                                    job at
                                    Facebook! (Example)</p>
                                <div class="d-flex align-items-center">
                                    <img src="https://i.ibb.co/1n5b6vG/user-male-1.png" alt="Davis Harris"
                                        class="rounded-circle me-3 testimonial-img">
                                    <div>
                                        <p class="fw-bold mb-0 text-light small">Davis Harris</p>
                                        <p class="text-secondary small mb-0">Owner Of Project</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stats-bar mt-5">
                <div class="row text-center">
                    <div class="col-6 col-md-3 stat-item py-3 py-md-0">
                        <p class="stat-number mb-1">34K+</p>
                        <p class="stat-label mb-0">Classes</p>
                    </div>
                    <div class="col-6 col-md-3 stat-item py-3 py-md-0">
                        <p class="stat-number mb-1">800K+</p>
                        <p class="stat-label mb-0">Members</p>
                    </div>
                    <div class="col-6 col-md-3 stat-item py-3 py-md-0">
                        <p class="stat-number mb-1">10K+</p>
                        <p class="stat-label mb-0">Mentors</p>
                    </div>
                    <div class="col-6 col-md-3 stat-item py-3 py-md-0">
                        <p class="stat-number mb-1">4.8</p>
                        <p class="stat-label mb-0">Rating</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
