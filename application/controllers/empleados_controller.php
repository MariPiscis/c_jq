<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados_controller extends CI_Controller {

    function __construct(){
        parent:: __construct();
        $this->load->model('empleados_model');
    }
    
	public function index()
	{
		$data['plazas'] = $this->empleados_model->getPlazas();
        $this->load->view('layaout/header.php');
        $this->load->view('empleados/index', $data);
        $this->load->view('layaout/footer.php');
    }
    
    public function getEmpleados(){
			$result = $this->empleados_model->getEmpleados();
			echo json_encode($result);
		}

    public function addEmpleados(){
			$result = $this->empleados_model->addEmpleados();
			$msg['success'] = false;
			$msg['type'] = 'add';
			if($result){
				$msg['success'] = true;
			}
			echo json_encode($msg);
    }
    
    public function editEmpleados(){
			$result = $this->empleados_model->editEmpleados();
			echo json_encode($result);
	}

	public function updateEmpleados(){
			$result = $this->empleados_model->updateEmpleados();
			$msg['success'] = false;
			$msg['type'] = 'update';
			if($result){
				$msg['success'] = true;
			}
			echo json_encode($msg);
    }
    
    public function deleteEmpleados(){
			$result = $this->empleados_model->deleteEmpleados();
			$msg['success'] = false;
			if($result){
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}
}