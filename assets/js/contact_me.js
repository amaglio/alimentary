$(function() {

  console.log("EMAIL");
 
  $( "#contactForm" ).submit(function( event ) {
   
    event.preventDefault();
    var nombre = $("input#nombre").val();
    var apellido = $("input#apellido").val();
    var email = $("input#email").val();
    var mensaje = $("textarea#mensaje").val(); 
    
    $("#sendMessageButton").prop("disabled", true);
    $("#cargando").show();

    $this = $("#sendMessageButton");
    $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages

    $.ajax({
              url: CI_ROOT+'index.php/home/enviar_email_contacto',
              data: {   nombre: nombre,
                        apellido: apellido,
                        email: email,
                        mensaje: mensaje },
              async: true,
              type: 'POST',
              dataType: 'JSON',
              success: function(data)
             {  
                $("#cargando").hide();
                
                if(data.error == false)
                {
                  //alert("Bien");
                  $('#success').html("<div class='alert alert-success'>");
                  $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                    .append("</button>");
                  $('#success > .alert-success')
                    .append("<strong>Tu mensaje ha sido enviado exitosamente y será respondido a la brevedad. </strong>");
                  $('#success > .alert-success')
                    .append('</div>');
                  //clear all fields
                  $('#contactForm').trigger("reset");
                }
                else
                {
                  //alert("Mal");
                  $('#success').html("<div class='alert alert-danger'>");
                  $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                    .append("</button>");
                  $('#success > .alert-danger').append($("<strong>").text("Ha ocurrido un error, por favor, intente mas tarde o escribinos a nuestro email: contactoalimentary@gmail.com."));
                  $('#success > .alert-danger').append('</div>');
                  //clear all fields
                  $('#contactForm').trigger("reset");
                }


              },
              error: function(x, status, error){
                  $("#cargando").hide();
                  $('#success').html("<div class='alert alert-danger'>");
                  $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                    .append("</button>");
                  $('#success > .alert-danger').append($("<strong>").text("Ha ocurrido un error, por favor intente más tarde o escribinos a nuestro email: contactoalimentary@gmail.com."));
                  $('#success > .alert-danger').append('</div>');
                  //clear all fields
                  $('#contactForm').trigger("reset");
              },
              complete: function() {
                setTimeout(function() {
                  $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
                }, 1000);
              } 
    });
   
  }); 
  
});

 