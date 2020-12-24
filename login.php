<?php
ob_start();

  require_once ('koneksi.php');

  $query = "SELECT * FROM Blog ";
  ?>
  
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TUBES PROWEB</title>
	<link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-xtra-blog.css" rel="stylesheet">
<!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->
</head>
<body>
	<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo"><i class="fas fa-times fa-2x"></i></div>            
                <h1 class="text-center">TROIS NEWS</h1>
            </div>
            <nav class="tm-nav" id="tm-nav">            
                <ul>
                    <li class="tm-nav-item"><a href="index.php" class="tm-nav-link">
                        <i class="fas fa-home"></i>
                        Blog Home
                    </a></li>
                    <li class="tm-nav-item active"><a href="login.php" class="tm-nav-link">
                        <i class="far fa-comments"></i>
                        Login
                    </a></li>
                    <li class="tm-nav-item"><a href="post.html" class="tm-nav-link">
                        <i class="fas fa-pen"></i>
                        Single Post
                    </a></li>
                    <li class="tm-nav-item"><a href="about.html" class="tm-nav-link">
                        <i class="fas fa-users"></i>
                        About Xtra
                    </a></li>
                    <li class="tm-nav-item"><a href="contact.html" class="tm-nav-link">
                        <i class="far fa-comments"></i>
                        Contact Us
                    </a></li>
                </ul>
            </nav>
            <div class="tm-mb-65">
                <a href="https://facebook.com" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>
                <a href="https://twitter.com" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>
                <a href="https://instagram.com" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>
                <a href="https://linkedin.com" class="tm-social-link">
                    <i class="fab fa-linkedin tm-social-icon"></i>
                </a>
            </div>
            <p class="tm-mb-80 pr-5 text-white">
                Xtra Blog is a multi-purpose HTML template from TemplateMo website. Left side is a sticky menu bar. Right side content will scroll up and down.
            </p>
        </div>
    </header>
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form method="GET" class="form-inline tm-mb-80 tm-search-form">                
                        <input class="form-control tm-search-input" name="query" type="text" placeholder="Search..." aria-label="Search">
                        <button class="tm-search-button" type="submit">
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>                                
                    </form>
                </div>                
            </div>            

            <div class="row tm-row tm-mb-120">
                <div class="col-12">
                    <h2 class="tm-color-primary tm-post-title tm-mb-60"><b><i>Login</i></b></h2>
                </div>
                <?php   
                            include ("koneksi.php");

                            if(isset($_POST['btnLogin']))
                            {
                                $user_login=$_POST['username'];
                                $pass_login=$_POST['password'];
                            
                                $sql = "SELECT * FROM akun WHERE username = '{$user_login}' and password = '{$pass_login}'";
                                $query = mysqli_query($koneksi, $sql);
                                $count = mysqli_num_rows($query);
                            
                                if(!$query){
                                die("Query gagal " . mysqli_error($koneksi));
                                }

                                if(!empty($user_login) && (!empty($pass_login))){
                                if($count==0){
                                    echo "<script>alert ('Username tidak ditemukan') </script>";
                                } else {
                                    while ($row = mysqli_fetch_array($query)){
                                    $user = $row['username'];
                                    $pass = $row['password'];
                                    $nama = $row['Nama'];
                                    $email = $row['email'];
                                    }

                                    if($user_login == $user && $pass_login == $pass){      
                                    header ("Location:admin.php");
                                    $_SESSION['username'] = $user;
                                    $_SESSION['Nama'] = $nama;
                                    $_SESSION['email'] = $email;
                                    } else {
                                    echo "<script>alert ('User tidak ditemukan') </script>";
                                    }
                                }
                                }
                                else {
                                if(empty($user_login) || empty($pass_login)){
                                    echo "<script>alert ('Username dan Password tidak boleh kosong') </script>";
                                    }
                                }
                            }
                        ?>

                <div class="col-lg-7 tm-contact-left">
                    <form method="POST" class="mb-5 ml-auto mr-0 tm-contact-form">                        
                        <div class="form-group row mb-4">
                            <label for="name" class="col-sm-3 col-form-label text-right tm-color-primary">Username</label>
                            <div class="col-sm-9">
                                <input class="form-control mr-0 ml-auto" name="username" id="username" type="text" required>                            
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="password" class="col-sm-3 col-form-label text-right tm-color-primary">Password</label>
                            <div class="col-sm-9">
                                <input class="form-control mr-0 ml-auto" name="password" id="password" type="password" required>
                            </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col-12">
                                <button class="tm-btn tm-btn-primary tm-btn-small" type="submit" name="btnLogin">Login</button>                        
                            </div>                            
                        </div>
                        <div class="form-group row text-right">
                            <div class="col-12">
                                <p>Anda belum memiliki akun? <a href="daftar.php">Klik disini !</a></p>                       
                            </div>
                        </div>

                        
                    </form>
                </div>
                <div class="col-lg-5 tm-contact-right">
                    <ul class="tm-social-links">
                        <li class="mb-2">
                            <a href="https://facebook.com" class="d-flex align-items-center justify-content-center">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="https://twitter.com" class="d-flex align-items-center justify-content-center">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="https://youtube.com" class="d-flex align-items-center justify-content-center">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="https://instagram.com" class="d-flex align-items-center justify-content-center mr-0">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>      
            <footer class="row tm-row">
                <div class="col-md-6 col-12 tm-color-gray">
                    Design: <a rel="nofollow" target="_parent" href="https://templatemo.com" class="tm-external-link">TemplateMo</a>
                </div>
                <div class="col-md-6 col-12 tm-color-gray tm-copyright">
                    Copyright 2020 Xtra Blog Company Co. Ltd.
                </div>
            </footer>
        </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>