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
    <title>My First PHP Blog!</title>
</head>
<body>

<div class="container">
<nav class="navbar navbar-expand-md navbar-light bg-light">
<a href="index.php" class="navbar-brand">PAYLAŞMEDYA</a>
<button
class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#toggleMobileMenu"
aria-controls="toggleMobileMenu"
aria-expanded="false"
aria-lable="Toggle Navigation"
>
<span clasS="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="toggleMobileMenu">
<ul class="navbar-nav ms-auto text-center">
<li>
<a class="nav-link" href="profile.php?id=<?php echo $_SESSION["id"] ?>"> <?php echo $_SESSION["username"]; ?> </a>
</li>
<li>
<a href="create.php" class="nav-link">Gönderi Oluştur</a>
</li>
<li>
<a href="../logout.php" class="nav-link">Çıkış yap</a>
</li>
</ul>
</nav>
<form method="POST">

<input type="text" name="title" placeholder="Başlık" class="form-control bg-light text-white my-3 text-center">
<textarea name="content" placeholder="İçerik" class="form-control bg-light text-white my-3"></textarea>
<button name="new_post" class="btn btn-light">Gönderi Ekle</button>
</form>

</div>





<!-- BootStrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
</body>
</html>