<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class polizaC extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('polizaM');
	}

	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$data = array('title' =>'Inventario || Polizas');
				$this->load->view('template/header',$data);
				$this->load->view('polizaV');
				$this->load->view('template/footer');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function get_poliza(){
		$respuesta = $this->polizaM->get_poliza();
		echo json_encode($respuesta);
	}

	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->polizaM->eliminar($id);
		echo json_encode($respuesta);
	}

	

	public function get_tipo_contenedor(){
		$respuesta = $this->polizaM->get_tipo_contenedor();
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos['id_poliza'] = $this->input->post('id_poliza');
		$datos['tipo_contenedor'] = $this->input->post('tipo_contenedor');
		$datos['cantidad'] = $this->input->post('cantidad');
		$datos['peso'] = $this->input->post('peso');
		$datos['doc_transporte'] = $this->input->post('doc_transporte');

		$respuesta = $this->polizaM->set_poliza($datos);
		echo json_encode($respuesta);

	}

	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->polizaM->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos['id_poliza'] = $this->input->post('id_poliza');
		$datos['tipo_contenedor'] = $this->input->post('tipo_contenedor');
		$datos['cantidad'] = $this->input->post('cantidad');
		$datos['peso'] = $this->input->post('peso');
		$datos['doc_transporte'] = $this->input->post('doc_transporte');

		$respuesta = $this->polizaM->actualizar($datos);

		echo json_encode($respuesta);
	}

}
