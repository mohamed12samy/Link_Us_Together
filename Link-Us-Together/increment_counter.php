<?php
   session_start();
if($_SESSION['username']==null){header("Location: log in.html");}
   require_once 'post_queries.php';
   $username=$_SESSION['username'];
   $id = $_GET['id'];
    
    $s=0;
    $post=new post();
    $rows=$post->select_liked($username,$id);

    if($rows>0){
        $s--;
        $post->delete_liked($username,$id);
    }

    else {
        $s++;
        $post->insert_liked($username,$id);
    }
    
    $post->update_counter($id,$s);
    header("Location: first.php");
  
?>