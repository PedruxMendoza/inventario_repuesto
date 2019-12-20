<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class venta_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('venta_model');
	}
	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
				$data = array('title' => 'Inventario || Informes de Venta');
				$this->load->view('template/header',$data);
				$this->load->view('venta_view');
				$this->load->view('template/footer');
		}else{
			redirect('loginController/index','refresh');
		}
		
	}

	public function get_venta(){
		$respuesta = $this->venta_model->get_venta();
		echo json_encode($respuesta);
	}
/*
	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->venta_model->eliminar($id);
		echo json_encode($respuesta);
	}*/

	public function get_persona(){
		$respuesta = $this->venta_model->get_persona();
		echo json_encode($respuesta);
	}

	public function get_vendedor(){
		$respuesta = $this->venta_model->get_vendedor();
		echo json_encode($respuesta);
	}

	public function get_pieza(){
		$respuesta = $this->venta_model->get_pieza();
		echo json_encode($respuesta);
	}

	public function get_precio(){
		$id = $this->input->post('id');
		$respuesta = $this->venta_model->get_precio($id);
		echo json_encode($respuesta);
	}

	/*public function ingresar(){
		date_default_timezone_set("America/El_Salvador");
		$datos["fecha_hora"] = date('Y-m-d')." ".date("H:i:s");
		$datos['dui'] = $this->input->post('dui');
		$datos['usuario'] = $this->input->post('usuario');
		$datos['pieza'] = $this->input->post('pieza');
		$datos['precio_venta'] = $this->input->post('precio_venta');
		$datos['cantidad'] = $this->input->post('cantidad');
		$datos['factura'] = $this->input->post('factura');
		$datos['total_venta'] = ($datos['cantidad'])*($datos['precio_venta']);
		$respuesta = $this->venta_model->ingresar($datos);
		echo json_encode($respuesta);*/
		/*}*/

		public function get_detalle(){
			$id = $this->input->post('id');
			$respuesta = $this->venta_model->get_detalle($id);
			echo json_encode($respuesta);
		}
	}
