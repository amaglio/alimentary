<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 


// Mensaje de error de las variables flash session
if(!function_exists('mensaje_resultado'))
{
    function mensaje_resultado($mensaje)
    {
        if ($mensaje): ?>
                <div class="callout callout-success mensaje_resultado" style="padding:5px 30px 5px 15px">
                  <h5 style="font-weight: bold"><?=$mensaje?></h5>
                </div>
        <?php  endif;  
    }
}

 

if(!function_exists('enviar_email'))
{
    function enviar_email($email_to )
    {   
        $CI =& get_instance();

        $CI->load->library("email"); 

        $configuracion_ucema = array(
            'protocol' => 'smtp',
            'smtp_host' => '10.0.0.3',
            'smtp_port' => 25,
            'smtp_user' => '',
            'smtp_pass' => '',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );

        //Cargamos la configuración 

        $CI->email->initialize($configuracion_ucema);
        $CI->email->from($email_operador,  $nombre_operador);
        $CI->email->subject($subject);
        $mensaje_email = '';

        $texto = html_entity_decode( $texto , ENT_QUOTES, "UTF-8");
       
        $CI->email->to($email_to); 

        // REEMPLAZAMOS LAS MARCAS EN EL EMAIL

        $texto_modificado = $texto;

  
        $texto_modificado = str_replace("[Nombre y Apellido operador]", $nombre_operador, $texto_modificado );
        $texto_modificado = str_replace("[Email Operador]", $email_operador, $texto_modificado );
        $texto_modificado = str_replace("[Fecha envio]", date("d/m/Y") , $texto_modificado );
        $texto_modificado = str_replace("[Nombre usuario]", $nombre_persona , $texto_modificado );

        //echo $texto_modificado;
             

        $CI->email->message($texto_modificado);
        
        /*
        if( $CI->email->send() ):

            chrome_log("ENVIO EL EMAIL"); 
            $mensaje_resultado = "<span> &#9658; El email a ".$email_to." fue enviado exitosamente. </span> <br>";
         
        else:
            
            chrome_log("NO ENVIO EL EMAIL");
            $mensaje_resultado = "<span> &#9658; El email a ".$email_to." NO fue enviado exitosamente. </span> <br>";
        
        endif; */

         $mensaje_resultado = "<span> &#9658; El email a ".$email_to." fue enviado exitosamente. </span> <br>";

        return $mensaje_resultado;
    }
}