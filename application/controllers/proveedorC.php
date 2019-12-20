<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class proveedorC extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('proveedorM');
	}

	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$data = array('title' =>'Inventario || Proveedor');
				$this->load->view('template/header',$data);
				$this->load->view('proveedorV');
				$this->load->view('template/footer');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
		
	}

	public function get_proveedor(){
		$respuesta = $this->proveedorM->get_proveedor();
		echo json_encode($respuesta);
	}

	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->proveedorM->eliminar($id);
		echo json_encode($respuesta);
	}

	public function get_persona(){
		$respuesta = $this->proveedorM->get_persona();
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos['dui_persona'] = $this->input->post('dui_persona');
		$datos['telefono'] = $this->input->post('telefono');
		$datos['correo'] = $this->input->post('correo');
		

		$respuesta = $this->proveedorM->set_proveedor($datos);
		echo json_encode($respuesta);

	}

	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->proveedorM->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos['id_proveedor'] = $this->input->post('id_proveedor');
		$datos['dui_persona'] = $this->input->post('dui_persona');
		$datos['telefono'] = $this->input->post('telefono');
		$datos['correo'] = $this->input->post('correo');

		$respuesta = $this->proveedorM->actualizar($datos);

		echo json_encode($respuesta);
	}


}