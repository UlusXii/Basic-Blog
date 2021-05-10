<?php
include "../logic.php";
session_start();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="../style.css">
    <title>Paylaşım Merkezi</title>
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
<div class="container">


<?php if(isset($_REQUEST['info'])){ ?>
<?php if($_REQUEST['info'] === "added"){?>
<div class="alert alert-success" role="alert">
Gönderi başarılı bir şekilde oluşturuldu!
</div>
<?php } ?>
<?php } ?>

<div class="text-center">
<h1 class="my-5 welcome">Selam <b class="author"><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Paylaşım Merkezine hoş geldin!</h1>



</div>

<div class="row row-cols-1 row-cols-md-3 g-4 my-5">
<?php foreach($query as $q){?>
<div class="col-4">
<div class="card">
<div class="card-body">
<h5 class="card-title"><?php echo $q['title'];?></h5>

<p class="card-text"><?php echo $q['content'];?></p>
</div>
<div class="card-footer">
<p class="text-muted"><?php echo $q['tarih'];?>
<br>
<small class="footer-authorname"><a href="profile.php?id=<?php echo $q['authorid']?>">@<?php echo $q['author']; ?></a></small>
<a href="view.php?id=<?php echo $q['id']?>" class="btn btn-green btn-sm float-end"> Devamını Oku <span class="text-danger"></span> </a>
<a href="#" class="tutar float-end"> Tutar </a> <a href="#" class="tutar2 float-end"> Tutmaz </a>
</p></div>
</div>
</div>
<?php } ?>
</div>
</div>




<!-- BootStrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
</body>
</html>