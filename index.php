<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Sayfa | ACS Yapı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #6a11cb 99%, #2575fc 97%);
            color: white;
            padding: 80px 0;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
        }

        .hero-section .container {
            position: relative;
            z-index: 2;
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .navbar {
            background: rgba(33, 37, 41, 0.95) !important;
            backdrop-filter: blur(10px);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #e67e22; /* Turuncu renk */
        }

        .card {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.95);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 2rem;
        }

        .btn-custom {
            background: #e67e22;
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background: #d35400;
            transform: scale(1.05);
        }

        #features {
            background: linear-gradient(135deg, #f5f7fa 0%, #e5e9f2 100%);
            padding: 80px 0;
        }

        .section-title {
            color: #2c3e50;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: #e67e22;
        }

        footer {
            background: #2c3e50;
            padding: 40px 0;
        }

        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: #e67e22;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-globe"></i> ACS Yapı</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php"><i class="fas fa-home"></i> Ana Sayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php"><i class="fas fa-info-circle"></i> Hakkında</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php"><i class="fas fa-envelope"></i> İletişim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payment.php"><i class="fas fa-credit-card"></i> Ödeme</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalog.php"> <i class="fas fa-store"></i> Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php"><i class="fas fa-user-shield"></i> Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 mb-4">ACS Yapı'ya Hoş Geldiniz</h1>
            <p class="lead mb-5">Kaliteli işçilik ve profesyonel hizmet anlayışıyla yanınızdayız.</p>
            <a href="#features" class="btn btn-custom btn-lg">Hizmetlerimiz <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </section>

    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Hizmetlerimiz</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-hard-hat feature-icon"></i>
                            <h5 class="card-title">İnşaat Hizmetleri</h5>
                            <p class="card-text">Modern ve güvenilir yapılar inşa ediyoruz.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-tools feature-icon"></i>
                            <h5 class="card-title">Tadilat İşleri</h5>
                            <p class="card-text">Profesyonel ekibimizle kaliteli tadilat hizmeti.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-pencil-ruler feature-icon"></i>
                            <h5 class="card-title">Mimari Tasarım</h5>
                            <p class="card-text">Hayalinizdeki projesini hayata geçiriyoruz.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-light text-center py-4">
        <div class="container">
            <p>&copy; 2023 ACS Yapı. Tüm hakları saklıdır.</p>
            <div class="social-links mt-3">
                <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-light"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>