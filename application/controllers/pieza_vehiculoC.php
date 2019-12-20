<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pieza_vehiculoC extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('pieza_vehiculoM');
	}

	public function index(){

		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$data = array("title" => "Pieza_Vehiculo || Ajax");
				$this->load->view("template/header", $data);
				$this->load->view("pieza_vehiculoV");
				$this->load->view("template/footer");
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
		

	}

	public function get_pieza_vehiculo(){
		$respuesta = $this->pieza_vehiculoM->get_pieza_vehiculo();
		echo json_encode($respuesta);
	}

	public function eliminar(){
		$id=$this->input->post('id');
		$respuesta=$this->pieza_vehiculoM->eliminar($id);
		echo json_encode($respuesta);
	}

	public function get_pieza(){
		$respuesta=$this->pieza_vehiculoM->get_pieza();
		echo json_encode($respuesta);
	}

	public function get_modelo(){
		$respuesta= $this->pieza_vehiculoM->get_modelo();
		echo json_encode($respuesta);
	}

	public function get_marca(){
		$respuesta= $this->pieza_vehiculoM->get_marca();
		echo json_encode($respuesta);
	}

	public function get_vehiculo(){
		$respuesta= $this->pieza_vehiculoM->get_vehiculo();
		echo json_encode($respuesta);
	}

	public function ingresar(){
	//	$datos['id_pieza_vehiculo']=$this->input->post('id_pieza_vehiculo');
		$datos['Id_pieza']=$this->input->post('id_pieza');
		$datos['nombre_modelo']=$this->input->post('nombre_modelo');
		$datos['nombre_marca']=$this->input->post('nombre_marca');
		$datos['precio_ingreso']=$this->input->post('precio_ingreso');
		$datos['precio_venta']=$this->input->post('precio_venta');
		$datos['stock']=$this->input->post('stock');

		$respuesta=$this->pieza_vehiculoM->set_pieza_vehiculo($datos);

		echo json_encode($respuesta);
	}

	public function get_datos(){
		$id=$this->input->post('id');
		$respuesta=$this->pieza_vehiculoM->get_datos($id);
		echo json_encode($respuesta);

	}

	public function actualizar(){
		$datos['id_pieza_vehiculo']=$this->input->post('id_pieza_vehiculo');
		
		$datos['Id_pieza']=$this->input->post('id_pieza');
		$datos['nombre_modelo']=$this->input->post('nombre_modelo');
		$datos['nombre_marca']=$this->input->post('nombre_marca');
		$datos['precio_ingreso']=$this->input->post('precio_ingreso');
		$datos['precio_venta']=$this->input->post('precio_venta');
		$datos['stock']=$this->input->post('stock');

		$respuesta=$this->pieza_vehiculoM->actualizar($datos);

		echo json_encode($respuesta);
	}

	
}