<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class categoriaC extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('categoriaM');

	}

	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$data=array('title' => 'Inventario || Categoria');
				$this->load->view('template/header',$data);
				$this->load->view('categoriaV');
				$this->load->view('template/footer');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function get_categoria(){
		$respuesta=$this->categoriaM->get_categoria();
		echo json_encode($respuesta);
	}

	public function eliminar(){
		$id=$this->input->post('id');
		$respuesta=$this->categoriaM->eliminar($id);
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos['id_categoria'] = $this->input->post('id_categoria');
		$datos['nombre_categoria'] = $this->input->post('nombre_categoria');
		

		$respuesta = $this->categoriaM->set_categoria($datos);
		echo json_encode($respuesta);

	}

	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->categoriaM->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos['id_categoria'] = $this->input->post('id_categoria');
		$datos['nombre_categoria'] = $this->input->post('nombre_categoria');


		$respuesta = $this->categoriaM->actualizar($datos);

		echo json_encode($respuesta);
	}




}