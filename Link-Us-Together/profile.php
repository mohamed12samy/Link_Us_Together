<?php 
  session_start();
if($_SESSION['username']==null){header("Location: log in.html");}

  require_once 'post_queries.php'; 
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
      <!--a class="nav-item nav-link" href="profile.php" ><img src="img/icons/user-malee.png" alt="profilPic" class="rounded-circle"></a-->
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
        
        if($u->Select_all($_SESSION['username'])['imgpath'] && $u->Select_all($_SESSION['username'])['imgpath']!=" "){
          $path=$u->Select_all($_SESSION['username'])['imgpath'];
          echo "<img class='prof' src='$path'>";
        }
        else
          echo "<img class='prof' src='img/icons/user-malee.png'>"; 
     ?>
      <p> <?php echo $_SESSION['name']."<br>@".$_SESSION['username']; ?> </p>
    </div>

<!--END SETTING BIO FOR FUCKING USER-->

    <div class="Bio">
      <p style="word-wrap: break-word;"> <?php
            $u= new user('','','','');

            if($u->Select_all($_SESSION['username'])['Bio'] && $u->Select_all($_SESSION['username'])['Bio']!=" "){
            echo $u->Select_all($_SESSION['username'])['Bio'];
            }
            else
              echo "<p style='color:gray;'>tell about your self here...</p>";
             ?> 
     </p>

<!--SETTING BIO BY USING TEXT FUCKIN AREA-->
<div class="bioset" id="pp"> 
  <div class="Bio_div" id="TextBio" style="display: none;" >

    <form id="bioForm"class="bio_form" method="POST" name="fOrm" action="bio.php">
      <textarea id="BioTarea" class="bioTArea" name="textbio" placeholder="tell about your self"></textarea>
      <button id="Bio_Button" class="btn btn-primary" type="submit" >save</button>
    </form>
    </div>
    <button  onclick="myFunction();" id="addbio" class="btn btn-primary" type="button" >change Bio</button>
  </div>
</div>
<!--END SETTING BIO FOR FUCKING USER-->

    <div class="recentposts">
      <h4>Recent Posts</h4>
     <!--DISPLAYING RECENT 4 POSTS OF THE USER-->
          <?php 
            $u= new user('','','','');
            $post=new post();
            $arr=array();
            $iiid=$u->Select_all($_SESSION['username'])['id'];
            $arr=$post->Select_post($iiid);
            $size=min(4,sizeof($arr)); 
            for ($i=0 ; $i<$size ; $i++) {
              echo '<div class="PoSts">';
              echo  '<div class="picnamedate">';

              
        
        if($u->Select_all($_SESSION['username'])['imgpath'] && $u->Select_all($_SESSION['username'])['imgpath']!=" "){
          $path=$u->Select_all($_SESSION['username'])['imgpath'];
          echo "<img class='profimg' src='$path'>";
        }
        else
          echo "<img class='profimg' src='img/icons/user-malee.png'>"; 
              echo  '<a href="profile.php" id="namedate">'."@".$_SESSION["username"]."<br>".$arr[$i][1]. '</a>
                    </div><div class"paragraph">'.$arr[$i][0].'</div>';
            echo '</div>';
            }
          ?>
        <!--END DISPLAYING RECENT 4 POSTS OF THE USER-->
      </div>
    
  </div>

</div>

</body>
</html>