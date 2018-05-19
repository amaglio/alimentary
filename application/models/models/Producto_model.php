<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
		
	}
 

    function get_mix_granola()
    {
   	
    	$sql =  "	SELECT *
		    			FROM  producto p
		    			WHERE  id_tipo_producto = 1 OR id_tipo_producto = 3 " ;

    	$query = $this->db->query( $sql   );

		return $query->result_array();	
    }

  	function get_frutos_secos()
    {
   	
    	$sql =  "	SELECT *
		    			FROM  producto p
		    			WHERE  id_tipo_producto = 2 " ;

    	$query = $this->db->query( $sql   );

		return $query->result_array();	
    }

    function get_promociones()
    {
   	
    	$sql =  "	SELECT *
	    			FROM  promocion p  " ;

    	$query = $this->db->query( $sql );

		return $query->result_array();	
    }

    function get_opiniones_facebook()
    {
    
      $sql =  " SELECT *
            FROM  opiniones_facebook p  " ;

      $query = $this->db->query( $sql );

    return $query->result_array();  
    }


}

/* End of file  */
/* Location: ./application/models/ */