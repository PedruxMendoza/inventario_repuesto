<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vehiculoC extends CI_Controller {

	//metodo para acceder a todos los metodos del modelo
	public function __construct(){
		parent:: __construct();
		$this->load->model('vehiculoM');
	}
	//metodo para mostrar datos
	public function index()
	{
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$data= array('title'=>'Inventario || Clase Vehiculo');
				$this->load->view('template/header',$data);
				$this->load->view('vehiculoV');
				$this->load->view('template/footer');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
		

	}

	public function get_vehiculo(){
		$respuesta=$this->vehiculoM->get_vehiculo();
		echo json_encode($respuesta);
	}

	public function eliminar(){
		$id= $this->input->post('id');
		$respuesta= $this->vehiculoM->eliminar($id);
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos['nombre_clase']=$this->input->post('nombre_clase');

		$respuesta= $this->vehiculoM->set_vehiculo($datos);

		echo json_encode($respuesta);

	}

	public function get_datos(){
		$id=$this->input->post('id');
		$respuesta=$this->vehiculoM->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos["id_clase"]=$this->input->post('id_clase');
		$datos["nombre_clase"]=$this->input->post('nombre_clase');
		$respuesta = $this->vehiculoM->actualizar($datos);

		echo json_encode($respuesta);

	}


}