<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('administrador.php',(array)$output);
	}
 

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function productos()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('producto');
			$crud->set_subject('Producto');
			$crud->required_fields('nombre', 'id_tipo_producto');
			$crud->columns('nombre','descripcion', 'id_tipo_producto', 'foto', 'precio' );

			$crud->display_as('id_tipo_producto','Tipo de producto');

			$crud->set_relation('id_tipo_producto','tipo_producto','descripcion');

			$crud->set_field_upload('foto','assets/img/productos');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function tipos_producto()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('tipo_producto');
			$crud->set_subject('Tipo de producto');
			$crud->required_fields('descripcion');
			$crud->columns('id_tipo_producto','descripcion' );

			$crud->display_as('id_tipo_producto','Tipo de producto'); 
			$crud->unset_delete();

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function promociones()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('promocion');
			$crud->set_subject('promociones');
			$crud->required_fields('descripcion');
			$crud->columns('titulo', 'descripcion','precio', 'foto', 'carrousel'  );

		 
			$crud->change_field_type('description', 'text');

			$crud->display_as('id_tipo_producto','Tipo de producto'); 

			$crud->set_field_upload('foto','assets/img/promociones');
 

			$output = $crud->render();

			$this->_example_output($output);
	}

 	public function opiniones_facebook()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('opiniones_facebook');
			$crud->set_subject('Opiniones facebook');
			$crud->required_fields('iframe');
			$crud->columns('id_opinion', 'iframe' );  
  
			$crud->callback_column('iframe',array($this,'add_field_callback_1'));

			$output = $crud->render();

			$this->_example_output($output);
	}

	function add_field_callback_1($value, $row)
	{
	return $value.'';
	}
}
