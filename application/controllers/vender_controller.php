<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vender_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('vender_model');
		$this->load->library('session');
		$this->load->library('cart');
	}
	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 2) {
				$data = array('title' => 'Inventario || Venta de Producto');
				$this->load->view('template/header',$data);
				$this->load->view('vender_view');
				$this->load->view('template/footer');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function get_persona(){
		$respuesta = $this->vender_model->get_persona();
		echo json_encode($respuesta);
	}

	public function get_vendedor(){
		$respuesta = $this->vender_model->get_vendedor();
		echo json_encode($respuesta);
	}

	public function get_pieza(){
		$respuesta = $this->vender_model->get_pieza();
		echo json_encode($respuesta);
	}

	public function get_precio(){
		$id = $this->input->post('id');
		$respuesta = $this->vender_model->get_precio($id);
		echo json_encode($respuesta);
	}

	public function get_nombre(){
		$id = $this->input->post('id');
		$respuesta = $this->vender_model->get_nombre($id);
		echo json_encode($respuesta);
	}

	public function get_comprador(){
		$id = $this->input->post('id');
		$respuesta = $this->vender_model->get_comprador($id);
		echo json_encode($respuesta);
	}

	public function get_vendedor1(){
		$id = $this->session->userdata('id');
		$respuesta = $this->vender_model->get_vendedor1($id);
		echo json_encode($respuesta);
	}

	public function ingresar(){
		date_default_timezone_set("America/El_Salvador");
		
		$datos['dui'] = $this->input->post('dui');
		$datos['usuario'] = $this->input->post('usuario');
		$datos['factura'] = $this->input->post('factura');
		$datos["fecha_hora"] = date('Y-m-d')." ".date("H:i:s");

		$datos['nombre_comprador'] = $this->input->post('nom_com');
		$datos['nombre_vendedor'] = $this->input->post('nom_vende');

		$respuesta = $this->vender_model->ingresar($datos);

		echo json_encode($respuesta);
	}

	public function agregar_producto(){
		$data  =  array ( 
			'id'       =>  $this->input->post('addpieza'), 
			'qty'      => $this->input->post('addcantidad'), 
			'price'    =>  $this->input->post('addprecio_venta') , 
			'name'     =>   $this->input->post('addnombre_pieza')
		);
		$this->cart->insert($data);

		$respuesta = 'adda';

		echo json_encode($respuesta);
	}
}
