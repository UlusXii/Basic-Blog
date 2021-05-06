<?php
include "logic.php";
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

<div class="container mt-5">
<?php if(isset($_REQUEST['info'])){ ?>
<?php if($_REQUEST['info'] === "added"){?>
<div class="alert alert-success" role="alert">
Gönderi başarılı bir şekilde oluşturuldu!
</div>
<?php } ?>
<?php } ?>

<div class="text-center">
<a href="create.php" class="btn btn-outline-dark"> + Yeni gönderi oluştur</a>
</div>

<div class="row">
<?php foreach($query as $q){?>
<div class="col-4 d-flex justify-content-center align-items-center">
<div class="card text-white bg-dark mt-5">
<div class="card-body" style="width: 18rem;">
<h5 class="card-title"><?php echo $q['title'];?></h5>
<p class="card-text"><?php echo $q['content'];?></p>
<a href="" class="btn btn-light"> Devamını Oku <span class="text-danger">&rarr;</span> </a>
</div>
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