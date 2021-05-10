<?php


$conn = mysqli_connect("localhost", "root", "", "vor");


if(!$conn){
    echo "<h3 class='container bg-dark text-center p-3 text-warning rounded-lg mt-5'>Not able to connection Database</h3>";
}


$sql = "SELECT * FROM datas";
$query = mysqli_query($conn, $sql);


if(isset($_REQUEST['new_post'])){
    session_start();
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $author = $_SESSION['username'];
    $authorid = $_SESSION['id'];
    $sql = "INSERT INTO datas(title, content, author, authorid) VALUES('$title', '$content', '$author', $authorid)";
    mysqli_query($conn, $sql);
    echo $sql;
    header("Location: index.php?info=added");
    exit();
}
?>