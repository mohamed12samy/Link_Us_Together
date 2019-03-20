<?php 
  session_start();
if($_SESSION['username']==null){header("Location: log in.html");}
  require_once 'post_queries.php';
  require_once 'follow.php';

  if($_SESSION['prevloc'] == "home"){/*3a4an lama beroo7 ll follow page  3a4an ye3mel follw byrga3 we el get betb2a me4 maogooda*/
  $_SESSION['GUN'] = $_GET["usn"];//substr($_GET["usn"] , 2)
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/log.css">
  <link rel="stylesheet" type="text/css" href="css/Home.css">
  <link rel="stylesheet" type="text/css" href="css/profile.css">
  <link rel="stylesheet" type="text/css" href="css/guest_profile.css">
	<link rel="icon" href="img/icons/link.png" type="image/x-icon">
  <title>profilePage</title>

</head>
<body>
  <script  src="js/jquery-3.3.1.min.js"></script>
  <script  src="js/bootstrap.min.js"></script>
  <script  src="js/profile.js"></script>

<div class="page">
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
                   <img src="img/icons/more.png" alt="more" >
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="setting.php"><img class="ico" src="img/icons/cogwheel.png" alt="profilPic" >Setting</a>
                    <a class="dropdown-item" href="logOut.php"><img class="ico"  src="img/icons/logout.png">Log out</a>
                  </div>
                </div>
    </div>
  </div>
</nav>

  <div class="ccontainer" >
    <div class="pic_name">
      <?php
        $u= new user('','','','');
        
          $path=$u->Select_all($_SESSION['GUN'])['imgpath'];
        if(!is_null($path) && $path !== " "){
          echo "<img class='prof' src='$path'>";
        }
        else
          echo "<img class='prof' src='img/icons/user-malee.png'>";
        $nname=$u->Select_all($_SESSION['GUN'])['name']; 
     ?>
      <p> <?php echo $nname."<br>@".$_SESSION['GUN']; ?> </p>
    </div>

<button id="follow" class="btn btn-primary" type="submit" onclick="document.location.href='follow_insertion_deletion.php'" >

  <?php
    $f= new following();
    if($f->Select_all($_SESSION["username"] ,$_SESSION['GUN'])){
    echo "Unfollow";
  }
  elseif(!$f->Select_all($_SESSION["username"] ,$_SESSION['GUN'])){
    echo "Follow";
  } 

  ?>

</button>
<!--"--->


    <div class="Bio">
      <p style="word-wrap: break-word;"> <?php
            $u= new user('','','','');

            if($u->Select_all($_SESSION['GUN'])['Bio'] && $u->Select_all($_SESSION['GUN'])['Bio']!=" "){
            echo $u->Select_all($_SESSION['GUN'])['Bio'];
            }
            else
              echo "<p style='color:gray;'>Has none</p>";
             ?> 
     </p>


</div>

    <div class="recentposts">
      <h4>Recent Posts</h4>
     <!--DISPLAYING RECENT 4 POSTS OF THE USER-->
          <?php 
            $u= new user('','','','');
            $post=new post();
            $arr=array();
            $iiid=$u->Select_all($_SESSION['GUN'])['id'];
            $arr=$post->Select_post($iiid);
            $size=min(4,sizeof($arr)); 
            for ($i=0 ; $i<$size ; $i++) {
              echo '<div class="PoSts">';
              echo  '<div class="picnamedate">';

              
        
        if($u->Select_all($_SESSION['GUN'])['imgpath'] && $u->Select_all($_SESSION['GUN'])['imgpath']!=" "){
          $path=$u->Select_all($_SESSION['GUN'])['imgpath'];
          echo "<img class='profimg' src='$path'>";
        }
        else
          echo "<img class='profimg' src='img/icons/user-malee.png'>"; 
              echo  '<p id="namdate">'."@".$_SESSION['GUN']."<br>".$arr[$i][1]. '</p> </div>
              
                    <div class"paragraph">'.$arr[$i][0].'</div>';
            echo '</div>';
            }
          ?>
        <!--END DISPLAYING RECENT 4 POSTS OF THE USER-->
      </div>
    
  </div>

</div>

</body>
</html>
