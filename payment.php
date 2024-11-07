<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödeme Sayfası - Web Sitem</title>
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
        .payment-form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(37, 117, 252, 0.25);
        }
        .btn-primary {
            background-color: #2575fc;
            border-color: #2575fc;
        }
        .btn-primary:hover {
            background-color: #1a5ad9;
            border-color: #1a5ad9;
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
                        <a class="nav-link" href="contact.php"><i class="fas fa-envelope"></i> İletişim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="payment.php"><i class="fas fa-credit-card"></i> Ödeme</a>
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
            <h1 class="display-4 mb-4">Ödeme Sayfası</h1>
            <p class="lead">Güvenli ve hızlı ödeme işleminizi tamamlayın</p>
        </div>
    </section>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="payment-form">
                    <h2 class="mb-4">Ödeme Bilgileri</h2>
                    <form action="process_payment.php" method="POST">
                        <h4 class="mb-3"><i class="fas fa-credit-card"></i> Kredi Kartı Bilgileri</h4>
                        <div class="mb-3">
                            <label for="cardName" class="form-label">Kart Üzerindeki İsim</label>
                            <input type="text" class="form-control" id="cardName" name="cardName" required>
                        </div>
                        <div class="mb-3">
                            <label for="cardNumber" class="form-label">Kart Numarası</label>
                            <input type="text" class="form-control" id="cardNumber" name="cardNumber" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="expiryDate" class="form-label">Son Kullanma Tarihi</label>
                                <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" required>
                            </div>
                        </div>

                        <h4 class="mb-3 mt-4"><i class="fas fa-map-marker-alt"></i> Fatura Adresi</h4>
                        <div class="mb-3">
                            <label for="billingAddress" class="form-label">Adres</label>
                            <input type="text" class="form-control" id="billingAddress" name="billingAddress" required>
                        </div>
                        <div class="mb-3">
                            <label for="billingCity" class="form-label">Şehir</label>
                            <input type="text" class="form-control" id="billingCity" name="billingCity" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="billingState" class="form-label">Eyalet</label>
                                <input type="text" class="form-control" id="billingState" name="billingState" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="billingZip" class="form-label">Posta Kodu</label>
                                <input type="text" class="form-control" id="billingZip" name="billingZip" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg mt-4">
                            <i class="fas fa-lock"></i> Ödemeyi Güvenle Tamamla
                        </button>
                    </form>
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