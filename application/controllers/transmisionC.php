<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transmisionC extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('transmisionM');

	}
	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$data= array('title' => 'Inventario || Transmision');
				$this->load->view('template/header', $data);
				$this->load->view('transmisionV');
				$this->load->view('template/footer');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function get_transmision(){
		$respuesta= $this->transmisionM->get_transmision();
		echo json_encode($respuesta);
	}

	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->transmisionM->eliminar($id);
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos['tipo_transmision']=$this->input->post('tipo_transmision');

		$respuesta= $this->transmisionM->set_transmision($datos);

		echo json_encode($respuesta);

	}

	public function get_datos(){
		$id=$this->input->post('id');
		$respuesta=$this->transmisionM->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos["id_transmision"]=$this->input->post('id_transmision');
		$datos["tipo_transmision"]=$this->input->post('tipo_transmision');

		$respuesta = $this->transmisionM->actualizar($datos);

		echo json_encode($respuesta);

	}






}