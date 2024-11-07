<?php
session_start();

// Basit bir giriş kontrolü
$admin_username = "admin";
$admin_password = "admin1234";

// Çıkış işlemi
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php"); // Ana sayfaya yönlendir
    exit;
}

// Giriş kontrolü
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username === $admin_username && $password === $admin_password) {
            $_SESSION['admin_logged_in'] = true;
            header("Location: admin.php");
            exit;
        } else {
            $error_message = "Hatalı kullanıcı adı veya şifre!";
        }
    }

    // Eğer giriş yapılmamışsa, giriş formunu göster
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        include('admin_login.php');
        exit;
    }
}

// Geri bildirim verilerini oku
$messages = [];
if (file_exists('messages.txt')) {
    $content = file_get_contents('messages.txt');
    $entries = explode("\n\n", $content);

    foreach ($entries as $entry) {
        if (empty(trim($entry))) continue;

        $lines = explode("\n", $entry);
        $messageData = [];
        
        foreach ($lines as $line) {
            if (strpos($line, 'Ad:') === 0) {
                $messageData['name'] = trim(substr($line, 3));
            }
            if (strpos($line, 'E-posta:') === 0) {
                $messageData['email'] = trim(substr($line, 8));
            }
            if (strpos($line, 'Mesaj:') === 0) {
                $messageData['message'] = trim(substr($line, 6));
            }
        }

        if (!empty($messageData)) {
            $messages[] = $messageData;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-globe"></i> ACS Yapı - Admin Panel</a>
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
                        <a class="nav-link" href="payment.php"><i class="fas fa-credit-card"></i> Ödeme</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="catalog.php"> <i class="fas fa-store"></i> Katalog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.php"><i class="fas fa-user-shield"></i> Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="?logout=1"><i class="fas fa-sign-out-alt"></i> Çıkış Yap</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Admin Paneli</h1>
        
        <div class="card">
            <div class="card-header">
                <h2 class="mb-0">Geri Bildirimler</h2>
            </div>
            <div class="card-body">
                <?php if (empty($messages)): ?>
                    <div class="alert alert-info">Henüz geri bildirim bulunmamaktadır.</div>
                <?php else: ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>İsim</th>
                                <th>E-posta</th>
                                <th>Mesaj</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($messages as $data): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($data['name'] ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($data['email'] ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($data['message'] ?? ''); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>