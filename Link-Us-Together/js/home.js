function myFunction() {
    var x = document.getElementById("post_divv");
    if (x.style.display === "none") {
      x.style.display = "block";
     // document.getElementById("body").style.WebkitFilter="blur(1px)";
    } else {
      x.style.display = "none";
      //document.getElementById("body").style.WebkitFilter="blur(0px)";
    }
    window.scrollTo(0, 0); 
  }

/********************************************************************************/
$(document).ready(function() {
     $(".show-more a").on("click", function() {
        var $this = $(this); 
        var $content = $this.parent().prev("div.content");
        var linkText = $this.text().toUpperCase();    

        if(linkText === "SHOW MORE"){
            linkText = "Show less";
            $content.switchClass("hideContent", "showContent", 400);
        } else {
            linkText = "Show more";
            $content.switchClass("showContent", "hideContent", 400);
        };

        $this.text(linkText);
    });
});
