//HIDE AND SHOW TEXTAREA BIO FOR FUCKING USER

  function myFunction() {
    var x = document.getElementById("TextBio");
    if (x.style.display === "none") {
      x.style.display = "block";
     // document.getElementById("body").style.WebkitFilter="blur(1px)";
    } else {
      x.style.display = "none";
      document.getElementById("body").style.WebkitFilter="blur(0px)";
    }
  }
//HIDE AND SHOW TEXTAREA BIO FOR FUCKING USER
   /* function myffunction() {
      var g=document.getElementById("Bio_Button");
      g.disabled = true;
      var value=document.getElementById("BioTarea").value;
      alert("value");
     var textlength=document.getElementById("BioTarea").value.length;
     if(textlength > 0 && value != " ") {g.disabled = false;}
    }*/

