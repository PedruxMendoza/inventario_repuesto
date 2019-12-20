<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class piezaC extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('piezaM');
	}

	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$data = array('title' =>'Inventario || Pieza');
				$this->load->view('template/header',$data);
				$this->load->view('piezaV');
				$this->load->view('template/footer');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function get_pieza(){
		$respuesta = $this->piezaM->get_pieza();
		echo json_encode($respuesta);

	}

	public function get_categoria(){
		$respuesta = $this->piezaM->get_categoria();
		echo json_encode($respuesta);
	}

	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->piezaM->eliminar($id);
		echo json_encode($respuesta);


	}

	public function ingresar(){
		$datos['nombre_pieza'] = $this->input->post('nombre_pieza');
		$datos['id_categoria'] = $this->input->post('id_categoria');

		$respuesta = $this->piezaM->set_pieza($datos);
		echo json_encode($respuesta);
	}

	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->piezaM->get_datos($id);
		echo json_encode($respuesta);
	}
	public function actualizar(){
		$datos['Id_pieza'] = $this->input->post('Id_pieza');
		$datos['nombre_pieza'] = $this->input->post('nombre_pieza');
		$datos['id_categoria'] = $this->input->post('id_categoria');

		$respuesta = $this->piezaM->actualizar($datos);

		echo json_encode($respuesta);
	}

}