<?php session_start();
if($_SESSION['username']==null){header("Location: log in.html");}
  require_once 'post_queries.php'; 
  require_once 'follow.php';
  require_once 'comment.php';
   $_SESSION['prevloc'] = "home"; 
  ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/log.css">
	<link rel="stylesheet" type="text/css" href="css/Home.css">
	<link rel="icon" href="img/icons/link.png" type="image/x-icon">
	<title>Home</title>

</head>
<body id="body">
    <script  src="js/jquery-3.3.1.min.js"></script>
    <script  src="js/bootstrap.min.js"></script>
    <script src="js/home.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  	<a class="navbar-brand" href="first.php" style="color:red; ">LUT</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  	</button>
  	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="first.php">Home <span class="sr-only">(current)</span></a>
     
      <a class="nav-item nav-link" href="profile.php"><?php echo "@".$_SESSION['username']; ?></a>
      <a href="profile.php" class="nav-item nav-link">
        <?php $u= new user('','','','');
          if($u->Select_all($_SESSION['username'])['imgpath'] && $u->Select_all($_SESSION['username'])['imgpath']!=" "){
          $path=$u->Select_all($_SESSION['username'])['imgpath'];
          echo "<img src='$path' class='rounded-circle' style='width:30px; height:30px;'>";
        }
        else
          echo "<img src='img/icons/user-malee.png' class='rounded-circle'>";
        ?>
        </a>
                  
                  <div class="dropdown" style="text-align: right;">
                  <a class="nav-item nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <img src="img/icons/more.png" alt="wheel" >
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="setting.php"><img class="ico" src="img/icons/cogwheel.png" >Setting</a>
                    <a class="dropdown-item" href="logOut.php"><img class="ico" src="img/icons/logout.png">Log out</a>
                  </div>
                </div>
           
    </div>
  </div>
</nav>
</header>

<button id="Post" onclick="myFunction();" class="btn btn-primary" type="submit" >Make post</button>
<div class="post" id="pp">
  <div class="post_div" id="post_divv" style="display: none;" >

    <form id="postForm"class="post_form" method="POST" name="fOrm" action="post.php" >
      <textarea id="op" class="textarea" name="textPost" placeholder="Write your words!"></textarea>
      <button id="post_B" class="btn btn-primary" type="submit" >post</button>
    </form>
    </div>
  </div>

  <!--DISPLAYING POSTS FOR THE USER-->

    <script>
        var val2
        function ff(){
            val2=document.getElementById("comment").value;
                alert(val2);
            }
        function test(){
            var val=document.getElementById("CmoTarea").value;
         
            var hrf="?textcom="+val+"&PID="+val2;
            document.getElementById("a_link").href+=hrf;
        }   
    </script>
    <?php
    /*arr[0,1,2,3,4,5]= paragraoh ,date ,posterUsername ,posterImagepath ,likecounter ,postId */
        
        $post=new post();
        $arr=array();
        $arr=$post->Select_all_posts(); /*selecting all posts*/
        $size=sizeof($arr); 
        
         for ($i=0 ; $i<$size ; $i++) {
          
          if($arr[$i][2] !== $_SESSION['username']){
          echo   "<div  class='post_Design'>";
          $path=$arr[$i][3]; 
          if(!is_null($path) && $path !== " "){
          echo "<img class='image_design' src='$path'>";
        }
        else
          echo "<img class='image_design' src='img/icons/user-malee.png'>"; 
          echo "<div class='asd'> ";

          echo "<div style='width:100%;'><a id='blink' href='guest_profile.php?usn=".$arr[$i][2]." ' > "."@".$arr[$i][2]."</a></div>";

          echo "<a class='date_Design' href = '#'>".$arr[$i][1]."</a>."."<br></div>";

          echo "<div class='desc_Design'>
          <div class='content hideContent'> ".$arr[$i][0]."</div>" ;
          if(strlen($arr[$i][0]) > 200 )
          {echo "<div class='show-more'> <a href='javascript:'>Show more</a> </div> ";}
          echo "</div>". "<br>";
          
          $f= new following();
          if($f->Select_all($_SESSION['username'] , $arr[$i][2])){
          echo "<div style='width:100%;'><a id='moveright' class='button_Design' href='increment_counter.php?id=".$arr[$i][5]."' >  (".$arr[$i][4].") Like</a></div>";
          
          /*echo "
          <div class='combutton'><button id='comment' type='button' onclick='ff();' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter' value ='".$arr[$i][5]."'>
          Comment
          </button>  </div>";*/
          echo "
          <div class='combutton'><a href='aa.php?id=".$arr[$i][5]."' id='comment' type='button' onclick='ff();' o value ='".$arr[$i][5]."'>
          Comment
          </a>  </div>";
//****************************************SHOW COMMENTS*************************************//   
              echo "<div class='showw'>";
              $c= new comment(); $u=new user('','','',''); $pid=$arr[$i][5];
              $comms = $c->Select_all_comms();  
              $Size=sizeof($comms); $count=0;
              for ($j=0 ; $j<$Size ; $j++){ 
                  if($count == 3)break;
                  if($comms[$j][2] === $pid ){$count++;
                    echo "<div class='showingcomms'>";
                    $p= $comms[$j][1];
                    if(!is_null($p) && $p !== " "){
                        echo "<img class='image_comm' src='$p'>";
                    }
                    else
                        echo "<img class='image_comm' src='img/icons/user-malee.png'>"; 
                      
                    echo "
                    <div class='buttoninAndDatecom' >
                    <div><button type='submit' id='Clink' > "."@".$comms[$i][0]."
                    </button></div>".$comms[$j][4]."</div> ";
                  echo "<br><br>
                    <div class='textComment'>".$comms[$j][3]."</div>
                  ";
                  echo "</div>";
                  }
              }
              
        /***********************************MODAL FOR COMMENTING*************************************/
          echo "</div>  
          <!-- Modal -->
            <div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
              <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalCenterTitle' style='color: black;'>You Comment</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                 
                  <div class='modal-body' >
                    <textarea id='CmoTarea' class='comTArea' name='textcom' placeholder='write your comment here'></textarea>";
                    echo " 
                  </div>
                  <div class='modal-footer'>
                    <a href='comment_executions.php' id='a_link' onclick='test();'>Save</a>
                  </div>
                
                </div>
              </div>
            </div>";
          }/*closing of if following*/
    echo "</div>"; 
    echo "<hr>";
        }
        }
?>

</body>
</html>