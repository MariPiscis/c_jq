<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados_model extends CI_Model {

    public function getEmpleados(){
		$this->db->select('*');
		$this->db->from('empleados');
		$this->db->join('plazas','empleados.plaza=plazas.idP');
		$this->db->where('empleados.activo','1');	
		$this->db->where('plazas.activo','1');

		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}  

	public function getPlazas(){
		$query=$this->db->get('plazas');
		return $query->result();
	}

    public function addEmpleados(){
		
		$field = array(
			'numero_empleado'=>$this->input->post('numero_empleado'),
			'nombre'=>$this->input->post('nombre'),
            'apellido1'=>$this->input->post('apellido1'),
            'apellido2'=>$this->input->post('apellido2'),
            'plaza'=>$this->input->post('plaza'),
            'activo'=>$this->input->post('activo')
			);

		$this->db->insert('empleados', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }
    
    public function editEmpleados(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('empleados');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateEmpleados(){
		$id = $this->input->post('id');
		$field = array(
		'nombre'=>$this->input->post('nombre'),
        'apellido1'=>$this->input->post('apellido1'),
        'apellido2'=>$this->input->post('apellido2'),
        'plaza'=>$this->input->post('plaza'),
        'activo'=>$this->input->post('activo')
		);
		$this->db->where('id', $id);
		$this->db->update('empleados', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }
    
    function deleteEmpleados(){
		$id = $this->input->get('id');
		$this->db->SET('activo','0');
		$this->db->where('id', $id);
		$this->db->update('empleados');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}