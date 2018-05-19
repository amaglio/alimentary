<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();  
		$this->load->model('Producto_model'); 
	}

	public function index()
	{	
		$data['mix_granola'] = $this->Producto_model->get_mix_granola();
		$data['frutos_secos'] = $this->Producto_model->get_frutos_secos();
		$data['promociones'] = $this->Producto_model->get_promociones();
		$data['opiniones_facebook'] = $this->Producto_model->get_opiniones_facebook();
		$this->load->view('index.php',$data);
	}

 	public function enviar_email_contacto()
	{	
		 chrome_log("enviar_email_contacto: ".$this->input->post('mensaje'));


		if ($this->form_validation->run('enviar_email') == FALSE):

			chrome_log("No paso validacion");
			$this->session->set_flashdata('mensaje', 'Error: no paso la validacion.');
			$return["error"] = false;

		else:

			chrome_log("Paso validacion");

	        $this->load->library("email"); 


 			// $configuracion = array(
    //             'protocol' => 'smtp',
    //             'smtp_host' => 'ssl://smtp.googlemail.com',
    //             'smtp_port' => 465,
    //             'smtp_user' => 'digipayargentina@gmail.com',
    //             'smtp_pass' => 'digipay2016',
    //             'mailtype' => 'html',
    //             'charset' => 'utf-8',
    //             'newline' => "\r\n",
    //          	'smtp_timeout' => 30,
    //         );

	        $configuracion = array(
                'protocol' => 'smtp',
                'smtp_host' => 'mail.alimentarymix.com',
                'smtp_port' => 25,
                'smtp_user' => 'info@alimentarymix.com',
                'smtp_pass' => 'alimentarymix2018',
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n",
             	'smtp_timeout' => 30,
            );

	        //Cargamos la configuración 

	        $this->email->initialize($configuracion);
	        $this->email->from("info@alimentarymix.com");
	        $this->email->subject("Alimentary - Contacto web");

	        
	        $this->email->to("contactoalimentary@gmail.com");

	        $this->email->cc('adrian.magliola@gmail.com');

	        $mensaje = "";

			$mensaje .= "Nombre: ".$this->input->post('nombre')."<br>";

			if($this->input->post('nombre'))
				$mensaje .= "Apellido: ".$this->input->post('apellido')."<br>";

			$mensaje .= "Email: ".$this->input->post('email')."<br>";
			$mensaje .= "Mensaje: ".$this->input->post('mensaje')."<br>";
			
			$this->email->message($mensaje);

	        

	        if( $this->email->send() ):

	            chrome_log("ENVIO EL EMAIL");  
	         	$return["error"] = false;

	        else:
	            
	            chrome_log("NO ENVIO EL EMAIL"); 
	        	$return["error"] = true;
	        	

	        endif;


		endif;

		print json_encode($return);   

	}

}
