<?php
session_start();

// Mobil cihaz kontrolü için fonksiyon
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

// Ürün veritabanını simüle eden bir dizi
$products = [
    [
        'id' => 1, 
        'name' => 'iPhone 13', 
        'price' => 100, 
        'description' => 'Apple iPhone 13',
        'model_url' => isMobile() ? 'models\Mobile phone.glb' : 'models\Mobile phone.glb'
    ],
    [
        'id' => 2, 
        'name' => 'MacBook Pro', 
        'price' => 200, 
        'description' => 'Apple MacBook Pro M1',
        'model_url' => isMobile() ? 'models\Laptop - Windows menu.glb' : 'models\Laptop - Windows menu.glb'
    ],
    [
        'id' => 3, 
        'name' => 'Havalı araba', 
        'price' => 300, 
        'description' => 'Özel Tasarım havalı araba',
        'model_url' => isMobile() ? 'models\Sedan car.glb' : 'models\Sedan car.glb'
    ],
];

// Sepete ekleme işlemi
if(isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    if(isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog ve Satın Alma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
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
        model-viewer {
            width: 100%;
            height: 200px;
            background-color: #ffffff;
            margin-bottom: 15px;
            position: relative;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .card {
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 100;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            display: none;
        }
        .model-viewer-container {
            position: relative;
        }
        .progress-bar {
            width: 100%;
            height: 4px;
            background: #ddd;
            position: absolute;
            bottom: 0;
            border-radius: 0 0 8px 8px;
        }
        .progress-bar .update-bar {
            height: 100%;
            background: #007bff;
            width: 0%;
            transition: width 0.3s;
            border-radius: 0 0 8px 8px;
        }
        .navbar {
            background-color: #343a40;
        }
       
        
        .quantity-input {
            width: 60px;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-globe"></i> ACS Yapı</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="index.php"><i class="fas fa-home"></i> Ana Sayfa</a>
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
                        <a class="nav-link active" href="catalog.php"> <i class="fas fa-store"></i>Katalog</a>
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
            <h1 class="display-4 mb-4">ÜRÜN KATALOG</h1>
            <p class="lead">ÜRÜNLERİMİZİ İNCELEMEYİ UNUTMAYIN</p>
        </div>
    </section>

    <div class="container mt-5">
        <h1 class="mb-4">Ürün Kataloğu</h1>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="model-viewer-container">
                            <div class="loading" id="loading-<?php echo $product['id']; ?>">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Yükleniyor...</span>
                                </div>
                            </div>
                            
                            <model-viewer
                                poster="images/placeholders/<?php echo $product['id']; ?>.png"
                                src="<?php echo htmlspecialchars($product['model_url']); ?>"
                                alt="<?php echo htmlspecialchars($product['name']); ?>"
                                auto-rotate
                                camera-controls
                                shadow-intensity="1"
                                exposure="1"
                                camera-orbit="45deg 55deg 2.5m"
                                field-of-view="30 deg"
                                max-camera-orbit="auto 100deg auto"
                                min-camera-orbit="auto 0deg auto"
                                loading="lazy"
                                id="viewer-<?php echo $product['id']; ?>">
                                
                                <div class="progress-bar" slot="progress-bar">
                                    <div class="update-bar"></div>
                                </div>
                            </model-viewer>
                        </div>
                        
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                            <p class="card-text"><strong>Fiyat: <?php echo htmlspecialchars($product['price']); ?> TL</strong></p>
                            <form method="post">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                                <button type="submit" name="add_to_cart" class="btn btn-primary">Sepete Ekle</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Sepet</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Ürün Adı</th>
                            <th>Adet</th>
                            <th>Fiyat</th>
                            <th>Toplam</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($_SESSION['cart'])): ?>
                            <?php foreach ($_SESSION['cart'] as $product_id => $quantity): ?>
                                <?php $product = $products[$product_id - 1]; ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                                    <td><?php echo $quantity; ?></td>
                                    <td><?php echo htmlspecialchars($product['price']); ?> TL</td>
                                    <td><?php echo htmlspecialchars($product['price'] * $quantity); ?> TL</td>
                                    <td><a href="#" class="btn btn-primary" button type="submit">Sil</a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // 3D modeller için gelişmiş kontroller
        document.querySelectorAll('model-viewer').forEach(viewer => {
            const loadingId = 'loading-' + viewer.id.split('-')[1];
            const loadingElement = document.getElementById(loadingId);
            
            // Yükleme başladığında
            viewer.addEventListener('loading', function() {
                loadingElement.style.display = 'block';
            });
            
            // Yükleme tamamlandığında
            viewer.addEventListener('load', function() {
                loadingElement.style.display = 'none';
            });
            
            // Hata durumunda
            viewer.addEventListener('error', function(e) {
                console.error('Model yükleme hatası:', e);
                loadingElement.style.display = 'none';
                this.innerHTML = '<div class="alert alert-danger">3D model yüklenemedi</div>';
            });
            
            // Progress bar güncelleme
            viewer.addEventListener('progress', function(e) {
                const progressBar = this.querySelector('.update-bar');
                if (progressBar) {
                    progressBar.style.width = `${e.detail.totalProgress * 100}%`;
                }
            });
        });

        // Lazy loading için Intersection Observer
        const lazyLoadModels = () => {
            const modelViewers = document.querySelectorAll('model-viewer[loading="lazy"]');
            
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const viewer = entry.target; viewer.loading = 'eager';
                        observer.unobserve(viewer);
                    }
                });
            }, { threshold: 1.0 });
            
            modelViewers.forEach(viewer => {
                observer.observe(viewer);
            });
        };
        
        lazyLoadModels();
    </script>
</body>
</html>