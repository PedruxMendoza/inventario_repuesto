<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class marcaC extends CI_Controller {

	public function __construct(){

		parent::__construct();

		$this->load->model('marcaM');

	}//cierre de metodo constructor autoejecutable

	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$datos['marca'] = $this->marcaM->get_marca();
				$datos['title'] = 'Inventario || Marca';
				$this->load->view('template/header', $datos);
				$this->load->view('marcaV');
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
				$msj = $this->marcaM->eliminar($id);
				if ($msj == "successE") 
				{
					$datos['marca'] = $this->marcaM->get_marca();
					$datos['title'] = 'Inventario || Marca';         
                  	$datos['msj'] = "successE";  //Esto se agrega (no se encuentra en el index)
                  	$this->load->view('template/header', $datos);
                  	$this->load->view('marcaV');
                  	$this->load->view('template/footer');
                  }else{
                  	$datos['marca'] = $this->marcaM->get_marca();
                  	$datos['title'] = 'Inventario || Marca';       
                  	$datos['msj'] = "errorE";  //Esto se agrega (no se encuentra en el index)
                  	$this->load->view('template/header', $datos);
                  	$this->load->view('marcaV');
                  	$this->load->view('template/footer');           
                  }
              }else{
              	redirect('Welcome/error404','refresh');
              }
          }else{
          	redirect('loginController/index','refresh');
          }

	}//cierre de metodo eliminar

	public function ingresar(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$datos['nombre_marca'] = $_POST['nombre_marca'];

				$msj = $this->marcaM->set_marca($datos);
				if ($msj == "success") {
					$datos['marca'] = $this->marcaM->get_marca();
					$datos['title'] = 'Inventario || Marca';  
                  	$datos['msj'] = "success";  //Esto se agrega (no se encuentra en el index)
                  	$this->load->view('template/header', $datos);
                  	$this->load->view('marcaV');
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
				$datos['marca'] = $this->marcaM->get_datos($id);
				$datos['title'] = 'Inventario || Marca';
				$this->load->view('template/header', $datos);
				$this->load->view('marcaVact');
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
				$datos['id_marca'] = $_POST['id_marca'];
				$datos['nombre_marca'] = $_POST['nombre_marca'];

				$msj = $this->marcaM->actualizar($datos);
				if($msj == 'modi') {
					$datos['marca'] = $this->marcaM->get_marca();
					$datos['title'] = 'Inventario || Marca';
					$datos['msj'] = 'modi';
					$this->load->view('template/header', $datos);
					$this->load->view('marcaV');
					$this->load->view('template/footer');
				}else{
					$datos['marca'] = $this->marcaM->get_marca();
					$datos['title'] = 'Inventario || Marca';
					$datos['msj'] = 'ErrorM';
					$this->load->view('template/header', $datos);
					$this->load->view('marcaV');
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
