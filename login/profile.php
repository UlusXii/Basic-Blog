<?php
include "../logic.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="../style.css">
    <title><?php echo $_SESSION["username"]?> adlı kişinin profili</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
<a href="index.php" class="navbar-brand logo-text">PAYLAŞMEDYA</a>
<button
class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#toggleMobileMenu"
aria-controls="toggleMobileMenu"
aria-expanded="false"
aria-lable="Toggle Navigation"
>
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="toggleMobileMenu">
<ul class="navbar-nav ms-auto text-center">
<li>
<a class="nav-link" href="profile.php?id=<?php echo $_SESSION["id"] ?>"> @<?php echo $_SESSION["username"]; ?> </a>
</li>
<li>
<a href="create.php" class="nav-link">Gönderi Oluştur</a>
</li>
<li>
<a href="../logout.php" class="nav-link">Çıkış yap</a>
</li>
</ul>
</nav>
<header class="page-header header container-fluid">
<div class="text-center">
<h1 class="my-5 welcome">Selam <b class="author"><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. burası senin profilin!</h1>
</div>
<div class="container">
<div class="row row-cols-1 row-cols-md-3 g-4 my-5">
<?php foreach($query as $q){
if($q['author'] != $_SESSION["username"]){
continue;
}
if(!$q['author'])
?>

<div class="col-4">
<div class="card">
<div class="card-body">
<h5 class="card-title"><?php echo $q['title'];?></h5>

<p class="card-text"><?php echo $q['content'];?></p>
</div>
<div class="card-footer">
<p class="text-muted"><?php echo $q['tarih'];?>
<br>

<small class="footer-authorname">@<?php echo $q['author']; ?></small>
<a href="#" class="tutar float-end"> Tutar </a> <a href="#" class="tutar2 float-end"> Tutmaz </a>
<a href="view.php?id=<?php echo $q['id']?>" class="btn btn-green btn-sm float-end"> Devamını Oku <span class="text-danger"></span> </a>

</p>

</div>
</div>
</div>
    <?php } ?>
    </div>
</div>

</header>

</body>
</html>