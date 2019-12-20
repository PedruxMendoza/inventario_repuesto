<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class persona_controller extends CI_Controller {

	//metodo para acceder a todos los metodos del modelo
	public function __construct(){
		parent::__construct();
		$this->load->model('persona_model');
	}
	//metodo para mostrar datos
	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$datos['persona'] = $this->persona_model->get_persona();
				$datos['sexo'] = $this->persona_model->get_sexo();
				$datos['title'] = 'Inventario || Persona';
				$this->load->view('template/header', $datos);
				$this->load->view('persona_view');
				$this->load->view('template/footer');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
	}//fin del metodo mostrar

	public function eliminar($id){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$this->persona_model->eliminar($id);
				redirect('/persona_controller/index','refresh');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}		
	}//fin de el metodo eliminar


	public function ingresar(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$datos['dui_persona'] = $_POST['dui_persona'];
				$datos['nombre1'] = $_POST['nombre1'];
				$datos['nombre2'] = $_POST['nombre2'];
				$datos['apellido1'] = $_POST['apellido1'];
				$datos['apellido2'] = $_POST['apellido2'];
				$datos['id_sexo'] = $_POST['id_sexo'];	
				$datos['telefono'] = $_POST['telefono'];	
				$datos['direccion'] = $_POST['direccion'];


				$this->persona_model->set_persona($datos);
				redirect('/persona_controller/index','refresh');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}		
	}

	public function get_datos($id){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$datos['persona'] = $this->persona_model->get_datos($id);
				$datos['sexo'] = $this->persona_model->get_sexo();
				$datos['title'] = 'Inventario || Persona';
				$this->load->view('template/header', $datos);
				$this->load->view('persona_viewact');
				$this->load->view('template/footer');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}		
	}
	public function actualizar(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				//$datos['id'] = $_POST['id'];
				$datos['dui_persona'] = $_POST['dui_persona'];
				$datos['nombre1'] = $_POST['nombre1'];
				$datos['nombre2'] = $_POST['nombre2'];
				$datos['apellido1'] = $_POST['apellido1'];
				$datos['apellido2'] = $_POST['apellido2'];
				$datos['id_sexo'] = $_POST['id_sexo'];
				$datos['telefono'] = $_POST['telefono'];	
				$datos['direccion'] = $_POST['direccion'];


				$this->persona_model->set_personaAct($datos);
				redirect('/persona_controller/index','refresh');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
	}

}
