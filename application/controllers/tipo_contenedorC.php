<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tipo_contenedorC extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('tipo_contenedorM');

	}
	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$data= array('title' => 'Inventario || Tipo Contenedor');
				$this->load->view('template/header', $data);
				$this->load->view('tipo_contenedorV');
				$this->load->view('template/footer');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
		

	}

	public function get_tipo_contenedor(){
		$respuesta= $this->tipo_contenedorM->get_tipo_contenedor();
		echo json_encode($respuesta);
	}

	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->tipo_contenedorM->eliminar($id);
		echo json_encode($respuesta);
	}


	public function ingresar(){
		//$datos['id_tipo_contenedor'] = $this->input->post('id_tipo_contenedor');
		$datos['nombre_contenedor'] = $this->input->post('nombre_contenedor');

		$respuesta = $this->tipo_contenedorM->set_tipo_contenedor($datos);
		echo json_encode($respuesta);

	}

	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->tipo_contenedorM->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos['id_tipo_contenedor'] = $this->input->post('id_tipo_contenedor');
		$datos['nombre_contenedor'] = $this->input->post('nombre_contenedor');


		$respuesta = $this->tipo_contenedorM->actualizar($datos);

		echo json_encode($respuesta);
	}



}
