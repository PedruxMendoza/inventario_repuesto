<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modeloC extends CI_Controller {

	public function __construct(){

		parent::__construct();

		$this->load->model('modeloM');

	}//cierre de metodo constructor autoejecutable

	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$datos['modelo'] = $this->modeloM->get_modelo();
				$datos['marca']    = $this->modeloM->get_marca();
				$datos['title'] = 'Inventario || Modelo';
				$this->load->view('template/header', $datos);
				$this->load->view('modeloV');
				$this->load->view('template/footer');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
	}//cierre de metodo index

	public function eliminar($id){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$msj = $this->modeloM->eliminar($id);
				if ($msj == "successE") 
				{
					$datos['modelo'] = $this->modeloM->get_modelo();
					$datos['marca']    = $this->modeloM->get_marca();
					$datos['title'] = 'Inventario || Modelo';        
                  	$datos['msj'] = "successE";  //Esto se agrega (no se encuentra en el index)
                  	$this->load->view('template/header', $datos);
                  	$this->load->view('modeloV');
                  	$this->load->view('template/footer');
                  }else{
                  	$datos['modelo'] = $this->modeloM->get_modelo();
                  	$datos['marca']    = $this->modeloM->get_marca();
                  	$datos['title'] = 'Inventario || Modelo';         
                  	$datos['msj'] = "errorE";  //Esto se agrega (no se encuentra en el index)
                  	$this->load->view('template/header', $datos);
                  	$this->load->view('modeloV');
                  	$this->load->view('template/footer');           
                  }				
              }else{
              	redirect('Welcome/error404','refresh');
              }
          }else{
          	redirect('loginController/index','refresh');
          }
	}//cierre metodo eliminar

	public function ingresar(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$datos['nombre_modelo']   = $_POST['nombre_modelo'];
				$datos['nombre_marca']    = $_POST['nombre_marca'];

				$msj = $this->modeloM->set_modelo($datos);
				if ($msj == "success") {
					$datos['modelo'] = $this->modeloM->get_modelo();
					$datos['marca']    = $this->modeloM->get_marca();
					$datos['title'] = 'Inventario || Modelo';  
                  	$datos['msj'] = "success";  //Esto se agrega (no se encuentra en el index)
                  	$this->load->view('template/header', $datos);
                  	$this->load->view('modeloV');
                  	$this->load->view('template/footer');  
                  }
              }else{
              	redirect('Welcome/error404','refresh');
              }
          }else{
          	redirect('loginController/index','refresh');
          }
	}//cierre metodo ingresar

	public function get_datos($id){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$datos['nombre_modelo']   = $this->modeloM->get_datos($id);
				$datos['nombre_marca']    = $this->modeloM->get_marca();
				$datos['title'] = 'Inventario || Modelo';
				$this->load->view('template/header', $datos);
				$this->load->view('modeloVact');
				$this->load->view('template/footer');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
	}//cierre de metodo get_datos

	public function actualizar(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$datos['id_modelo']        = $_POST['id_modelo'];
				$datos['nombre_modelo']    = $_POST['nombre_modelo'];
				$datos['nombre_marca']     = $_POST['nombre_marca'];

				$msj = $this->modeloM->actualizar($datos);
				if($msj == 'modi') {
					$datos['modelo'] = $this->modeloM->get_modelo();
					$datos['marca']    = $this->modeloM->get_marca();
					$datos['title'] = 'Inventario || Modelo';  
					$datos['msj'] = 'modi';
					$this->load->view('template/header', $datos);
					$this->load->view('modeloV');
					$this->load->view('template/footer');
				}else{
					$datos['modelo'] = $this->modeloM->get_modelo();
					$datos['marca']    = $this->modeloM->get_marca();
					$datos['title'] = 'Inventario || Modelo';
					$datos['msj'] = 'ErrorM';
					$this->load->view('template/header', $datos);
					$this->load->view('modeloV');
					$this->load->view('template/footer');

				}
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
	}

}//cierre de clase
