<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarioC extends CI_Controller {

	//metodo para acceder a todos los metodos del modelo
	public function __construct(){
		parent::__construct();
		$this->load->model('usuarioM');
	}
	//metodo para mostrar datos
	public function index()
	{
		// $datos['persona'] = $this->usuarioM->get_persona();
		// $datos['rol'] = $this->usuarioM->get_rol();
		// $datos['usuario'] = $this->usuarioM->get_usuario();
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$data = array('title' =>'Inventario || Usuario');
				$this->load->view('template/header',$data);
				$this->load->view('usuarioV');
				$this->load->view('template/footer');
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}

	}//fin del metodo mostrar

	public function get_usuario(){ 
		$respuesta = $this->usuarioM->get_usuario();
		echo json_encode($respuesta);
	}
	public function get_rol(){ 
		$respuesta = $this->usuarioM->get_rol();
		echo json_encode($respuesta);
	}
	public function get_persona(){ 
		$respuesta = $this->usuarioM->get_persona();
		echo json_encode($respuesta);
	}


	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->usuarioM->eliminar($id);
		echo json_encode($respuesta);
	}


	public function ingresar(){
		$datos['correo'] = $this->input->post('correo');
		$datos['clave'] = md5($this->input->post('clave'));
		$datos['dui_persona'] = $this->input->post('dui_persona');
		$datos['id_rol'] = $this->input->post('id_rol');

		$respuesta = $this->usuarioM->set_usuario($datos);
		echo json_encode($respuesta);
	}

	// public function get_datos(){
	// 	$id = $this->input->post('id');
	// 	$respuesta = $this->usuarioM->get_datos($id);
	// 	echo json_encode($respuesta);
	// }

	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->usuarioM->get_datos($id);
		echo json_encode($respuesta);
	}

	
	

	public function actualizar(){
		$datos['id_usuario'] = $this->input->post('id_usuario');
		$datos['correo'] = $this->input->post('correo');
		$datos['dui_persona'] = $this->input->post('dui_persona');
		$datos['id_rol'] = $this->input->post('id_rol');

		$respuesta = $this->usuarioM->actualizar($datos);

		echo json_encode($respuesta);

	}

	public function validarCorreo(){
		$correo = $this->input->post('correo');
		$res = $this->usuarioM->validarCorreo($correo);
		echo json_encode($res);
	}

}
