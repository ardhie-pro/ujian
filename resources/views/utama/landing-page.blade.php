<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coursea - Website Pembelajaran Profesional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Gaya Global */
        body {
            font-family: 'Arial', sans-serif;
        }

        .container-xl {
            max-width: 1300px;
        }

        /* Bagian Mentor (Terang) */
        .mentor-section {
            background-color: #f7f9fb;
            padding-bottom: 150px;
            border-bottom-left-radius: 60px;
            border-bottom-right-radius: 60px;
            position: relative;
            z-index: 1;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 800;
        }

        .signup-btn {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: bold;
        }

        .welcome-tag {
            font-size: 0.75rem;
            color: #555;
            letter-spacing: 2px;
            border: 1px solid #ddd;
            padding: 5px 15px;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .mentor-heading {
            font-size: 4rem;
            /* Sesuaikan ukuran font */
            font-weight: 800;
            line-height: 1.1;
        }

        /* Konten Mentor dan Testimonial */
        .quote-box {
            padding-left: 0;
        }

        .quote-icon {
            font-size: 4rem;
            color: #fdd835;
            line-height: 0.5;
            display: block;
            margin-bottom: 10px;
        }

        .mentors-count {
            margin-top: 20px;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .testimonial-card-light {
            background-color: #fff;
            border: none;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border-bottom-right-radius: 40px;
        }

        .testimonial-card-light .star-rating {
            color: #fdd835;
            font-size: 1rem;
        }

        /* Gambar Mentor (Pusat) */
        .mentor-center {
            position: relative;
            height: 500px;
            /* Tinggi agar lingkaran terlihat */
        }

        .yellow-circle {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #fdd835;
            border-radius: 50%;
            max-width: 450px;
            max-height: 450px;
            top: 20%;
            left: 50%;
            transform: translate(-50%, 0);
            z-index: 2;
        }

        .mentor-photo {
            position: absolute;
            width: 100%;
            max-width: 400px;
            height: auto;
            top: 0;
            left: 50%;
            transform: translate(-50%, 0);
            z-index: 3;
        }

        .action-buttons {
            position: absolute;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 4;
        }

        .request-demo-btn {
            background-color: #fdd835;
            color: #000;
            border-radius: 30px;
            padding: 12px 25px;
            font-weight: 600;
        }

        .im-mentor-btn {
            background-color: #fff;
            color: #000;
            border: 1px solid #ddd;
            border-radius: 30px;
            padding: 12px 25px;
            font-weight: 600;
        }

        /* Bagian Outcomes (Gelap) */
        .outcomes-section {
            background-color: #121212;
            color: #fff;
            padding: 80px 0;
            z-index: 0;
            margin-top: -100px;
            /* Tarik ke atas agar menempel dengan bagian terang */
            position: relative;
        }

        .outcome-heading {
            font-size: 3rem;
            font-weight: 800;
        }

        .highlight-percent {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fdd835;
            display: block;
            margin-bottom: 10px;
        }

        .testimonial-card-dark {
            background-color: #1e1e1e;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            min-height: 100%;
            /* Pastikan tinggi sama */
        }

        .testimonial-card-dark .star-rating {
            color: #fdd835;
            font-size: 1rem;
        }

        /* Stat Bar */
        .stats-bar {
            background-color: #1e1e1e;
            border-radius: 20px;
            padding: 30px 0;
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 700;
            color: #fff;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #aaa;
        }
    </style>
</head>

<body>

    <section class="mentor-section">
        <div class="container-xl">
            <header class="d-flex justify-content-between align-items-center py-4">
                <div class="logo text-dark">Coursea</div>
                <nav class="d-none d-lg-flex">
                    <a href="#" class="text-decoration-none text-secondary mx-3 fw-bold">Category</a>
                    <a href="#" class="text-decoration-none text-secondary mx-3 fw-bold">About Us</a>
                    <a href="#" class="text-decoration-none text-secondary mx-3 fw-bold">Coursea Business</a>
                </nav>
                <a href="#" class="signup-btn text-decoration-none">Sign Up <i class="fas fa-arrow-right"></i></a>
            </header>

            <div class="text-center pt-5">
                <span class="welcome-tag d-inline-block">WELCOME TO COURSEA</span>
                <h1 class="mentor-heading text-dark my-3">
                    Meet the Professional<br>Mentor
                </h1>
            </div>

            <div class="row g-4 mt-4 align-items-start">

                <div class="col-lg-3 d-flex flex-column quote-box pt-5">
                    <span class="quote-icon">❝</span>
                    <p class="fs-6 text-dark opacity-75">Now you can learn anywhere, anytime, even if there is no
                        internet access!</p>
                    <p class="mentors-count text-dark">
                        <strong class="d-block">10K+</strong>
                        Mentors
                    </p>
                </div>

                <div class="col-lg-6 mentor-center">
                    <div class="yellow-circle"></div>
                    <img src="https://i.ibb.co/L5k6YxL/mentor.png" alt="Professional Mentor"
                        class="mentor-photo img-fluid">

                    <div class="action-buttons d-flex gap-3">
                        <button class="request-demo-btn btn border-0">Request Demo <i
                                class="fas fa-chevron-right"></i></button>
                        <button class="im-mentor-btn btn">I'm Mentor <i class="far fa-star"></i></button>
                    </div>
                </div>

                <div class="col-lg-3 pt-5">
                    <div class="testimonial-card-light">
                        <span class="star-rating">★★★★★</span>
                        <p class="mt-2 mb-3 text-dark">"This course was comprehensive and covered everything I needed to
                            know about animation."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://i.ibb.co/3WfKzS2/pristia-cendra.png" alt="Pristia Cendra"
                                class="rounded-circle me-3" style="width: 45px; height: 45px;">
                            <div>
                                <p class="fw-bold mb-0 text-dark">Pristia Cendra</p>
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
            <p class="text-center text-secondary mb-5">Start, switch, or advance your career with more than 34.000+
                courses in Coursea!</p>

            <div class="row g-4">
                <div class="col-lg-6">
                    <p class="highlight-percent">↗ 87%</p>
                    <p class="fs-5 text-light opacity-75">
                        People learning for professional development report career benefits, including outcomes like
                        getting a promotion.
                    </p>
                </div>

                <div class="col-lg-6">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="testimonial-card-dark">
                                <span class="star-rating">★★★★★</span>
                                <p class="mt-2 mb-3 text-light opacity-90">This course was comprehensive and covered
                                    everything I needed to know about animation.</p>
                                <div class="d-flex align-items-center">
                                    <img src="https://i.ibb.co/YyYgXkY/katie-waters.png" alt="Katie Waters"
                                        class="rounded-circle me-3" style="width: 45px; height: 45px;">
                                    <div>
                                        <p class="fw-bold mb-0 text-light">Katie Waters</p>
                                        <p class="text-secondary small mb-0">Project Manager</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="testimonial-card-dark">
                                <span class="star-rating">★★★★★</span>
                                <p class="mt-2 mb-3 text-light opacity-90">This helped me land my product manager job at
                                    Facebook! (Example)</p>
                                <div class="d-flex align-items-center">
                                    <img src="https://i.ibb.co/g3V8Q3j/davis-harris.png" alt="Davis Harris"
                                        class="rounded-circle me-3" style="width: 45px; height: 45px;">
                                    <div>
                                        <p class="fw-bold mb-0 text-light">Davis Harris</p>
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
                    <div class="col-3 stat-item">
                        <p class="stat-number">34K+</p>
                        <p class="stat-label">Classes</p>
                    </div>
                    <div class="col-3 stat-item">
                        <p class="stat-number">800K+</p>
                        <p class="stat-label">Members</p>
                    </div>
                    <div class="col-3 stat-item">
                        <p class="stat-number">10K+</p>
                        <p class="stat-label">Mentors</p>
                    </div>
                    <div class="col-3 stat-item">
                        <p class="stat-number">4.8</p>
                        <p class="stat-label">Rating</p>
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
