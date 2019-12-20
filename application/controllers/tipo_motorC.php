<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tipo_motorC extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('tipo_motorM');

	}
	public function index(){

		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$data= array('title' => 'Inventario || Tipo Motor');
				$this->load->view('template/header', $data);
				$this->load->view('tipo_motorV');
				$this->load->view('template/footer');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
		

	}

	public function get_tipo_motor(){
		$respuesta= $this->tipo_motorM->get_tipo_motor();
		echo json_encode($respuesta);
	}

	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->tipo_motorM->eliminar($id);
		echo json_encode($respuesta);
	}



	public function ingresar(){
		//$datos['id_tipo_contenedor'] = $this->input->post('id_tipo_contenedor');
		$datos['nombre_tipo_motor'] = $this->input->post('nombre_tipo_motor');

		$respuesta = $this->tipo_motorM->set_tipo_motor($datos);
		echo json_encode($respuesta);

	}

	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->tipo_motorM->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos['id_tipo_motor'] = $this->input->post('id_tipo_motor');
		$datos['nombre_tipo_motor'] = $this->input->post('nombre_tipo_motor');


		$respuesta = $this->tipo_motorM->actualizar($datos);

		echo json_encode($respuesta);
	}


}