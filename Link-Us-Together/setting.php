<?php session_start(); 
if($_SESSION['username']==null){header("Location: log in.html");}

  require_once 'user_queries.php';
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/log.css">
  <link rel="stylesheet" type="text/css" href="css/Home.css">
	<link rel="stylesheet" type="text/css" href="css/setting.css">
	<link rel="icon" href="img/icons/link.png" type="image/x-icon">
	<title>Settings</title>

</head>
<body>
	<script  src="js/jquery-3.3.1.min.js"></script>
	<script  src="js/bootstrap.min.js"></script>
  <script  src="js/sitting.js"></script>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  	<a class="navbar-brand" href="first.php" style="color:red; ">LUT</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  	</button>
  	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="first.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="profile.php"><?php echo "@".$_SESSION['username']; ?></a>
      <a class="nav-item nav-link" href="profile.php" > 
        <?php $u= new user('','','','');
        if($u->Select_all($_SESSION['username'])['imgpath'] && $u->Select_all($_SESSION['username'])['imgpath']!=" "){
          $path=$u->Select_all($_SESSION['username'])['imgpath'];
          echo "<img src='$path' class='rounded-circle' style='width:30px; height:30px;'>";
        }
        else
          echo "<img src='img/icons/user-malee.png' class='rounded-circle'>";
        ?></a>
                  <div class="dropdown">
                  <a class="nav-item nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <img src="img/icons/more.png" alt="more">
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="setting.php"><img class="ico" src="img/icons/cogwheel.png" alt="profilPic" >Setting</a>
                    <a class="dropdown-item" href="logOut.php"><img class="ico"  src="img/icons/logout.png">Log out</a>
                  </div>
                </div>
    </div>
  </div>
</nav>

<div class="containing_settings">
  
<div class="containing_photo "> <!--CHANGE PHOTO-->
  <form action="change_photo.php" method="post" enctype="multipart/form-data">
    <input id="profile-image-upload" class="hidden" type="file" name="file" onchange="readURL(this)" >
 
   <?php
        $u= new user('','','','');
        
        if($u->Select_all($_SESSION['username'])['imgpath'] && $u->Select_all($_SESSION['username'])['imgpath']!=" "){
          $path=$u->Select_all($_SESSION['username'])['imgpath'];
          echo "<img id='profile-image' src='$path'>";
        }
        else
          echo "<img id='profile-image' src='img/icons/user-malee.png'>"; 
     ?>
  <p> <?php echo $_SESSION['name']."<br>@".$_SESSION['username']; ?> </p>

<div class="toSendto" style="display: none;">
<button id="uploadb" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  click to upload
</button> </div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle" style="color: black;">You have selected this image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="color: black;">
        <img id="blah" src="#" alt="your image" />
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

</form>
  </div>



<div class="containing_others">
<div style="margin: 10px;">
  <img src="img/icons/user-silhouette.png" >
  <h4 style="display: inline;">Update User Setting</h4>
</div>

<form id="changesetting"class="settingschangeform" method="POST" name="fOrm" action="sittingChange.php" >
<div id="name" >
  <label style="margin-right: 50px;">Name</label>
  <input style="display: inline" class="inp" type="text" name="name" value="<?php echo $_SESSION['name'];?>" >
</div>

<div id="Email" style="margin-top: 5px;">
  <label style="margin-right: 55px;">Email    </label>
  <input style="display: inline" class="inp" type="Email" name="email" value="<?php  
    $u=new user('','','','');
    echo $u->Select_all($_SESSION['username'])['Email'];
  ?>" >
</div>

<div id="passs" style="margin-top: 5px;">
  <label style="margin-right: 27px;">Password</label>
  <input style="display: inline" id="pass" class="inp" type="password" name="newpwd" placeholder="******" >
</div>
<button id="saveChangebutton" onclick="myFunction()" class="btn btn-primary" type="button" > Save Changes</button>

<div id="confirmpwd" style="display: none;">
  <label style="margin-right: 10px">Please enter your current password</label>
  <input style="display: inline-block; margin-right: 15px" id="pwd" class="inp" type="password" name="pwd" >
  <button id="sumitChangebutton" class="btn btn-primary" type="submit" > Save</button>
</div>
  
 </form>
    <div class="deleteLink_div">
    <a id="deleteLink" href="delete_acc.html">Delete Account</a>
  </div>
  
  </div>
</div>

</body>
</html>
