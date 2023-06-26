<?php

if(isset($_POST) & !empty($_POST)){
    if(empty($_POST['fname'])){ $errors[] = "First name field is required <br>";}
    if(empty($_POST['lname'])){ $errors[]= "Last name field is required <br>";}
    if(empty($_POST['email'])){$errors[] = "E-mail field is required <br>";}
    if(empty($_POST['gender'])){$errors[] = "Gender field is required <br>";}
    if(empty($_POST['age'])){$errors[] = "Age field is required <br>";}




    if(empty($errors)){
      $messages[]= "No erros in the form";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="">
  <title>Demo CSRF</title>
  <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href=".dist/css/sb-admin-2.css" rel="stylesheet">
  <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div id="wrapper">
  <div class="container">
      <div class="row">
          <div class="col-md-4 col-md-offset-4">
              <div class="login-panel panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Demo CSRF</h3>
                </div>
                <div class="panel-body">
                <?php
                    if(!empty($errors)){
                      echo "<div class='alert alert-danger'>";
                      foreach ($errors as $error) {
                          echo "<span class='glyphicon glyphicon-remove'></span>&nbsp;".$error."<br>";
                      }
                      echo "</div>";
                    }
                ?>
                <?php
                    if(!empty($messages)){
                      echo "<div class='alert alert-success'>";
                      foreach ($messages as $message) {
                          echo "<span class='glyphicon glyphicon-ok'></span>&nbsp;".$message."<br>";
                      }
                      echo "</div>";
                    }
                ?>
                    <form role="form" method="post">

                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="First Name" name="fname" type="text" autofocus
                                value="<?php if(isset($_POST['fname']) & !empty($_POST['fname'])){echo $_POST['fname'];}?>">
                          </div>
                          <div class="form-group">
                               <input class="form-control" placeholder="Last Name" name="lname" type="text"
                               value="<?php if(isset($_POST['lname']) & !empty($_POST['lname'])){echo $_POST['lname'];}?>">
                          </div>
                          <div class="form-group">
                               <input class="form-control" placeholder="E-Mail" name="email" type="email"
                               value="<?php if(isset($_POST['email']) & !empty($_POST['email'])){echo $_POST['email'];}?>">
                          </div>
                          <div class="form-group" class="radio">
                            <input type="radio" name="gender" id="optionRadios1" value="male" <?php if(isset($_POST['gender'])){if($_POST['gender']=='male'){echo "checked";}}?>> Male
                            <input type="radio" name="gender" id="optionRadios1" value="female"<?php if(isset($_POST['gender'])){if($_POST['gender']=='female'){echo "checked";}}?>> Female
                          </div>
                          <div class="form-group">
                              <select name="age" class="form-control">
                                  <option value="">Select Your Age</option>
                                  <!--option value="20">20</option
                                  <?php if(isset($_POST['age'])){if($_POST['age'] =='20'){echo"selected";}}?>>20</option>-->
                              <?php
                              for($i=20;$i <= 30;$i++){
                              ?>
                                  <option value="<?php echo $i; ?>" <?php if(isset($_POST['age'])){if($_POST['age']==$i){echo"selected";}}?>><?php echo $i;?></option>
                              <?php }?>



                            </select>
                          </div>
                          <input type="submit" class"btn btn-lg btn-success btn-block" value="Submit"/>
                      </fieldset>
                  </form>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
  <script src="./vendor/jquery/jquery.min.js"></script>
  <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="./dist/js/sb-admin-2.js"></script>
  </body>
</html>
