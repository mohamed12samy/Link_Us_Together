 //CLICK THE PHOTO TO HAVE THE DIALOGE OPEN TO CHOOSE ONE
 $(function() {
    $('#profile-image').on('click', function() {
        $('#profile-image-upload').click();
    });
});
 //END CLICK THE PHOTO TO HAVE THE DIALOGE OPEN TO CHOOSE ONE
 
 //-------------------------------------------------------------------------------------------//
 //HIDING AND SHOW THE CONFIRMATION PASSWORD DIV
    $(document).ready(function() {
    $('#saveChangebutton').on('click', function(){
        $('#confirmpwd').show();
    });

});  
      /*function myFunction() {
      var x = document.getElementById("confirmpwd");
      if (x.style.display === "none") {
        x.style.display = "block";
       // document.getElementById("body").style.WebkitFilter="blur(1px)";
      } else {
        x.style.display = "none";
      document.getElementById("body").style.WebkitFilter="blur(0px)";
      }
  }*/

  //HIDING AND SHOW THE UPLOADING MODAL
    $(document).ready(function() {
    $('#profile-image').on('click', function(){
        $('.toSendto').show();
    });

}); 
  // END HIDING AND SHOW

//SHOWING IMAGE IN MODAL
 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(400);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
//END SHOWING IMAGE IN MODAL
  //-------------------------------------------------------------------------------------------//
  //VALIDATE
    /*$(document).ready(function (){
    validate();
    $('.inp').change(validate);
    });

    function validate(){
      if ($('#curPass').val().length >= 8 && $('#newPass').val().length >= 8) 
        {
        $("#sumitChangebutton").prop("disabled", false);
    }
    else {
        $("#sumitChangebutton").prop("disabled", true);
    }
}*/
    //END VALIDATE
    //-------------------------------------------------------------------------------------------//

	//CHECK PASSWORD CHANGE CORRECTION
  /*  $(function() {
	// set a event handler to the button
  $("#sumitChangebutton").click(function() {
    // retrieve form data
    var pass = $("#pwd").val();
     if (pass.length()>=8){ 
    // send form data to the server side php script.
    $.ajax({
        type: "POST",
        url: "sittingChange.php",
        data: { pass:pass }
    }).done(function( data ) {

        // Now the output from PHP is set to 'data'.
        // Check if the 'data' contains 'OK' or 'NG'
        if (data.indexOf("good") >= 0){

            // you can do something here
            alert("good pass.");
            //location.href = "ok.html";

        }else if(data.indexOf("wrong") >= 0){

            // you can do something here
            alert("wrong pass.");
            location.href = "setting.php";
        }
    });
  }
  else
  	alert("wrong password");
  });
});*/

 //END CHECK PASSWORD CHANGE CORRECTION
 //-------------------------------------------------------------------------------------------------------//
