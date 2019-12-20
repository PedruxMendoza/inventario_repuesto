<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IngresoC extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('IngresoM');
	}

	public function index()
	{
		$datos["title"] = "Inventario || Ingreso";
		$this->load->view('template/header', $datos);
		$this->load->view('IngresoV');
		$this->load->view('template/footer');
	}

	public function get_ingresos()
	{
		$respuesta = $this->IngresoM->get_ingresos();
		echo json_encode($respuesta);
	}

	public function eliminar()
	{
		$id = $this->input->post('id');
		$respuesta = $this->IngresoM->eliminar($id);
		echo json_encode($respuesta);		
	}

	public function get_proveedor()
	{
		$respuesta = $this->IngresoM->get_proveedor();
		echo json_encode($respuesta);
	}

	public function get_estado()
	{
		$respuesta = $this->IngresoM->get_estado();
		echo json_encode($respuesta);
	}		

	public function ingresar(){
		date_default_timezone_set("America/El_Salvador");
		
		$datos['proveedor']       	= $this->input->post('proveedor');
		$datos['fecha_hora']     	= date('Y-m-d')." ".date("H:i:s");
		$datos['num_comprobante']   = $this->input->post('num_comprobante');
		$datos['total_compra']     	= $this->input->post('total_compra');
		$datos['estado']         	= $this->input->post('estado');

		$respuesta = $this->IngresoM->set_ingreso($datos);
		echo json_encode($respuesta);
	}

	public function get_datos()
	{
		$id = $this->input->post('id');		
		$respuesta = $this->IngresoM->get_datos($id);
		echo json_encode($respuesta);
	}	

	public function actualizar(){
		$datos['id_ingreso']       	= $this->input->post('id_ingreso');
		$datos['proveedor']       	= $this->input->post('proveedor');
		$datos['num_comprobante']  	= $this->input->post('num_comprobante');
		$datos['total_compra']     	= $this->input->post('total_compra');
		$datos['estado']         	= $this->input->post('estado');
		
		$respuesta = $this->IngresoM->actualizar($datos);
		echo json_encode($respuesta);
	}	

}
