<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HealthCare Manager - Solusi Manajemen Kesehatan Terpadu</title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
  
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f5f7fa 0%, #e4efe9 100%);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .landing-container {
      width: 100%;
      max-width: 1200px;
      padding: 20px;
    }
    
    .card {
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      border: none;
    }
    
    .card-header {
      background-color: #fff;
      border-bottom: none;
      padding: 25px 0 15px;
    }
    
    .logo-text {
      font-size: 28px;
      color: #2d3748;
      text-decoration: none;
    }
    
    .logo-text b {
      color: #38a169;
    }
    
    .card-body {
      padding: 30px;
    }
    
    .hero-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      margin-bottom: 30px;
    }
    
    .hero-title {
      font-weight: 700;
      color: #2d3748;
      margin-bottom: 15px;
      font-size: 32px;
      line-height: 1.2;
    }
    
    .hero-subtitle {
      color: #718096;
      font-size: 18px;
      margin-bottom: 30px;
      max-width: 600px;
    }
    
    .features {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin: 0 -15px 30px;
    }
    
    .feature-box {
      flex: 0 0 33.333333%;
      max-width: 33.333333%;
      padding: 0 15px;
      margin-bottom: 30px;
      text-align: center;
    }
    
    .feature-icon {
      font-size: 36px;
      color: #38a169;
      margin-bottom: 15px;
    }
    
    .feature-title {
      font-weight: 600;
      font-size: 18px;
      margin-bottom: 10px;
      color: #2d3748;
    }
    
    .feature-desc {
      color: #718096;
      font-size: 14px;
    }
    
    .btn-container {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 20px;
    }
    
    .btn {
      padding: 12px 30px;
      font-weight: 500;
      border-radius: 50px;
      font-size: 16px;
      transition: all 0.3s ease;
    }
    
    .btn-success {
      background-color: #38a169;
      border-color: #38a169;
    }
    
    .btn-success:hover {
      background-color: #2f855a;
      border-color: #2f855a;
    }
    
    .btn-outline-primary {
      color: #4299e1;
      border-color: #4299e1;
      background-color: transparent;
    }
    
    .btn-outline-primary:hover {
      background-color: #4299e1;
      color: white;
    }
    
    .footer {
      text-align: center;
      margin-top: 20px;
      color: #718096;
      font-size: 14px;
    }
    
    @media (max-width: 768px) {
      .feature-box {
        flex: 0 0 100%;
        max-width: 100%;
      }
      
      .btn-container {
        flex-direction: column;
      }
      
      .hero-title {
        font-size: 26px;
      }
      
      .hero-subtitle {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
<div class="landing-container">
  <div class="card">
    <div class="card-header text-center">
      <a href="#" class="logo-text"><b>Health</b>Care Manager</a>
    </div>
    <div class="card-body">
      <div class="hero-section">
        <h1 class="hero-title">Manajemen Kesehatan Modern untuk Kehidupan yang Lebih Baik</h1>
        <p class="hero-subtitle">Platform terpadu untuk mengelola kesehatan Anda dengan mudah, efisien, dan aman. Dapatkan akses ke layanan kesehatan terbaik kapan saja dan di mana saja.</p>
      </div>
      
      <div class="features">
        <div class="feature-box">
          <div class="feature-icon">
            <i class="fas fa-heartbeat"></i>
          </div>
          <h3 class="feature-title">Pemantauan Kesehatan</h3>
          <p class="feature-desc">Pantau kondisi kesehatan Anda secara real-time dengan visualisasi data yang mudah dipahami.</p>
        </div>
        
        <div class="feature-box">
          <div class="feature-icon">
            <i class="fas fa-calendar-check"></i>
          </div>
          <h3 class="feature-title">Jadwal Perawatan</h3>
          <p class="feature-desc">Atur jadwal pemeriksaan dan pengobatan dengan sistem pengingat otomatis.</p>
        </div>
        
        <div class="feature-box">
          <div class="feature-icon">
            <i class="fas fa-user-md"></i>
          </div>
          <h3 class="feature-title">Konsultasi Dokter</h3>
          <p class="feature-desc">Konsultasikan masalah kesehatan Anda dengan dokter terpercaya kapan saja.</p>
        </div>
      </div>
      
      <div class="btn-container">
        <form action="{{ route('login') }}" method="GET">
          <button type="submit" class="btn btn-success">Masuk</button>
        </form>
        
        <form action="{{ route('register') }}" method="GET">
          <button type="submit" class="btn btn-outline-primary">Daftar Sekarang</button>
        </form>
      </div>
      
      <div class="footer">
        <p>© 2025 HealthCare Manager. Semua hak dilindungi.</p>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
</body>
</html>