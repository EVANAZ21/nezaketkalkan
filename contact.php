<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim - Web Sitem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero-section {
             background: linear-gradient(135deg, #6a11cb 99%, #2575fc 97%);
            color: white;
            padding: 80px 0;
        }
        .contact-form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .contact-info {
            background-color: #2575fc;
            color: white;
            padding: 30px;
            border-radius: 10px;
        }
        .contact-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-globe"></i> ACS Yapı</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Ana Sayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php"><i class="fas fa-info-circle"></i> Hakkında</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php"><i class="fas fa-envelope"></i> İletişim</a>
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
            <h1 class="display-4 mb-4">İletişim</h1>
            <p class="lead">Sorunlarınız mı var? Görüş ve Şikayetlerinizi Bildirin!</p>
        </div>
    </section>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="contact-form">
                    <h2 class="mb-4">Bize Mesaj Gönderin</h2>
                    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $data = "Ad: $name\nE-posta: $email\nMesaj: $message\n\n";
        file_put_contents('messages.txt', $data, FILE_APPEND | LOCK_EX);
        echo "<div class='alert alert-success'>Mesajınız başarıyla gönderildi!</div>";
    } else {
        echo "<div class='alert alert-danger'>Lütfen geçerli bir e-posta adresi giriniz!</div>";
    }
}
?>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="name" class="form-label">İsim Soyad</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-posta Adresi</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mesajınız</label>
                            <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gönder <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-info">
                    <h2 class="mb-4">İletişim Bilgileri</h2>
                    <div class="mb-4">
                        <i class="fas fa-map-marker-alt contact-icon"></i>
                        <p> Üçkuyu, Hilar Mahallesi, 21100 Diyarbakır</p>
                    </div>
                    <div class="mb-4">
                        <i class="fas fa-phone contact-icon"></i>
                        <p>+90 (536) 898 38 55</p>
                    </div>
                    <div class="mb-4">
                        <i class="fas fa-envelope contact-icon"></i>
                        <p>mahmutsibal9@gmail.com</p>
                    </div>
                    <div>
                        <h5 class="mb-3">Bizi Takip Edin</h5>
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f fa-2x"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-2x"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-light text-center py-4">
        <div class="container">
            <p>&copy; 2023 Web Sitem. Tüm hakları saklıdır.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>