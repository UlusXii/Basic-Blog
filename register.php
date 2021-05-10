<?php

require_once "logic.php";
 

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["username"]))){
        $username_err = "Lütfen bir kullanıcı adı girin.";
    } else{
        
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
           
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            
            $param_username = trim($_POST["username"]);
            
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Bu kullanıcı adı daha önce alınmış.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Eyvah! Bir şeyler ters gitti.";
            }

            
            mysqli_stmt_close($stmt);
        }
    }
    
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Lütfen bir şifre girin.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Şifreniz minimum 6 karakterli olmalıdır.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Lütfen şifrenizi doğrulayın.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Şifreler eşleşmedi.";
        }
    }
    
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
    
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            
            if(mysqli_stmt_execute($stmt)){
            
                header("location: login.php");
            } else{
                echo "Eyvah! Bir şeyler ters gitti.";
            }

            
            mysqli_stmt_close($stmt);
        }
    }
      
   

    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Kayıt ol</h2>
        <p>Hesap oluşturmak için formu doldurun.</p>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
                <label>Profil Fotoğrafı</label>
                <input type="file" name="file" class="form-control" id="formFileDisabled">
            </div>
            <div class="form-group">
                <label>Kullanıcı Adı</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Şifre</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Şifre Onay</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Zaten bir hesabınız var mı? <a href="login.php">Giriş yapın.</a>.</p>
        </form>
    </div>    
</body>
</html>