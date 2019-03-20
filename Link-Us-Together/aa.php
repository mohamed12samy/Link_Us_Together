
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

    
    <script>
       
        function test(){ alert("aaaa");
            var val=document.getElementById("CmoTarea").value;
         
            var hrf="&textcom="+val;
            document.getElementById("a_link").href+=hrf;
        }   
    </script>
<?php
    $id = $_GET['id'];
    
    
echo"
    
    
<div class='e' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true' >
              <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalCenterTitle' style='color: black;'>Your Comment</h5>
                   
                  </div>
                 
                  <div class='modal-body' >
                    <textarea id='CmoTarea' class='comTArea' name='textcom' placeholder='write your comment here'></textarea>
                  </div>
                  <div class='modal-footer'>
                    <a href='comment_executions.php?PID=".$id."' id='a_link' onclick='test();'>Save</a>
                  </div>
                
                </div>
              </div>
            </div>
    </body>
</html>"
?>