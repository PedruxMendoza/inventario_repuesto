<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario_controller extends CI_Controller {

	//metodo para acceder a todos los metodos del modelo
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
	}
	//metodo para mostrar datos
	public function index()
	{
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$datos['persona'] = $this->usuario_model->get_persona();
				$datos['rol'] = $this->usuario_model->get_rol();
				$datos['usuario'] = $this->usuario_model->get_usuario();
				$datos['title'] = 'Inventario || Usuario';
				$this->load->view('template/header', $datos);
				$this->load->view('usuario_view');
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
				$this->usuario_model->eliminar($id);
				redirect('/usuario_controller/index','refresh');
			}else{
				$user_data = array('logueado' => FALSE);
				$this->session->set_userdata($user_data);
				$this->session->sess_destroy();
				redirect('loginController/index','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
	}//fin de el metodo eliminar


	public function ingresar(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$datos['correo'] = $_POST['correo'];
				$datos['clave'] = $_POST['clave'];
				$datos['dui_persona'] = $_POST['dui_persona'];
				$datos['id_rol'] = $_POST['id_rol'];

				$this->usuario_model->set_usuario($datos);
				redirect('/usuario_controller/index','refresh');
			}else{
				$user_data = array('logueado' => FALSE);
				$this->session->set_userdata($user_data);
				$this->session->sess_destroy();
				redirect('loginController/index','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function get_datos($id){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$datos['usuario'] = $this->usuario_model->get_datos($id);
				$datos['rol'] = $this->usuario_model->get_rol();
				$this->load->view('usuario_viewact',$datos);
			}else{
				$user_data = array('logueado' => FALSE);
				$this->session->set_userdata($user_data);
				$this->session->sess_destroy();
				redirect('loginController/index','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}		
	}

	
	

	public function actualizar(){
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$datos['id'] = $_POST['id'];
				$datos['correo'] = $_POST['correo'];
				$datos['clave'] = $_POST['clave'];
				$datos['dui_persona'] = $_POST['dui_persona'];
				$datos['id_rol'] = $_POST['id_rol'];

				$this->usuario_model->set_usuarioAct($datos);
				redirect('/usuario_controller/index','refresh');
			}else{
				$user_data = array('logueado' => FALSE);
				$this->session->set_userdata($user_data);
				$this->session->sess_destroy();
				redirect('loginController/index','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}		

	}

	public function validarCorreo(){
		$correo = $this->input->post('correo');
		$res = $this->usuario_model->validarCorreo($correo);
		echo json_encode($res);
	}

}
