<?php

include("DBConnection.php");
include("links.php");

if(isset($_POST["uName"]) && isset($_POST["uComt"]))
{
    if ($connect->connect_error) {
        die("Connection failed: " . $connnect->connect_error);
      }
    $sql= "INSERT INTO users (User,Comment) VALUES('".$_POST["uName"]."', '".$_POST["uComt"]."')";

    if($connect->query($sql)){
        header('Location: index.php');
    }
    else
        echo "Error.Please ry again";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        
    </head>
    <body style='background: navy'>
    <div style=' background: navy ;text-align: center ; color:red'>
    <br>
      <h1> GROUP THẢO LUẬN </h1>
      <p style='color:blue'>(DEMO XSS - PHIÊN BẢN 1)</p>
      <br> </br>
    </div>
    <div class="row">
    <div class="col-md-3" style=' text-align: center; background : navy;'>
    <br>
    <div style='background :black; padding: 15px 20px; border-radius:40px;'>
        <h2 style='color : red'> Chủ đề bình luận </h2>
        <br>
        <a href="https://www.w3schools.com/"> 1. HỌC WEB CÙNG VỚI W3Sschool <br> </a>
        <br>
        <a href="https://www.hacksplaining.com/"> 2. HỌC BẢO MẬT WEB CÙNG VỚI Hacksplaining <br> </a>
        <br>
        <a href="https://fptcloud.com/xss/"> 3. CÙNG TÌM HIỂU VỀ XSS NÀO !<br> </a>
        <br>
</div>
    </div>
    <div class="col-md-4" style='background : Navy;'>
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style='color:blue'>Let's comment</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <p>YOUR NAME :</p>
                        <input type="text" name="uName" id="uNam" class="form-control" autocomplete="off" />
                        <br>
                        <p>YOUR COMMENT :</p>
                        <input type="text" name="uComt" id="ucomt" class="form-control" autocomplete="off" />
                        <br>
                        <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value ="OK"/>
                    </form>                       
                </div>
            </div>
        </div>
     </div>
     <div class="col-md-5" style='background : Navy;'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style='color:blue'> COMMENT BOX</h4>
                </div>
                <div class="modal-body">
                <?php
                    $sql = "SELECT User,Comment FROM users";
                    $result = $connect->query($sql);
                    if ($result->num_rows > 0) {
                    // Load dữ liệu lên website
                    while($row = $result->fetch_assoc()) {
                    echo "" . $row["User"]. " : " . $row["Comment"]." <br>";
                    }
                    }
                    $connect->close()                           
                ?>
                    <br> </br>
                </div>
            </div>
            </div>
        </div>
    </div>
    </body>
    <script>
    </script>
</html>
