<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent:: __construct();
		$this->load->model('piezasporcat_model');
		$this->load->model('login_model');
	}

	public function index()
	{
		if ($this->session->userdata('logueado') == TRUE) {
			$datos['carroceria'] = $this->piezasporcat_model->carroceria();
			$datos['motor'] = $this->piezasporcat_model->motor();
			$datos['transmision'] = $this->piezasporcat_model->transmision();
			$datos['suspension'] = $this->piezasporcat_model->suspension();
			$datos['electronico'] = $this->piezasporcat_model->electronico();
			$datos['total'] = $this->piezasporcat_model->total();
			$datos['vehiculos'] = $this->piezasporcat_model->vehiculos();
			$datos['title'] = 'Inventario || Bienvenido';
			$this->load->view('template/header', $datos);
			$this->load->view('body_view');
			$this->load->view('template/footer');
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function error404()
	{
		$this->load->view('errors/error-404');
	}

	public function cambiarcontra()
	{
		if ($this->session->userdata('logueado') == TRUE) {
			$datos['usuario'] = $_POST['usuario'];
			$datos['clave'] = md5($_POST['clave']);
			$datos['newclave'] = md5($_POST['newclave']);
			$msj = $this->login_model->change_pass($datos);
			if ($msj == "success")
			{
				$datos["msj"] = "success";
				$datos['carroceria'] = $this->piezasporcat_model->carroceria();
				$datos['motor'] = $this->piezasporcat_model->motor();
				$datos['transmision'] = $this->piezasporcat_model->transmision();
				$datos['suspension'] = $this->piezasporcat_model->suspension();
				$datos['electronico'] = $this->piezasporcat_model->electronico();
				$datos['total'] = $this->piezasporcat_model->total();
				$datos['vehiculos'] = $this->piezasporcat_model->vehiculos();
				$datos['title'] = 'Inventario || Bienvenido';
				$this->load->view('template/header', $datos);
				$this->load->view('body_view');
				$this->load->view('template/footer');
			}else{
				$datos["msj"] = "ErrorCP";
				$datos['carroceria'] = $this->piezasporcat_model->carroceria();
				$datos['motor'] = $this->piezasporcat_model->motor();
				$datos['transmision'] = $this->piezasporcat_model->transmision();
				$datos['suspension'] = $this->piezasporcat_model->suspension();
				$datos['electronico'] = $this->piezasporcat_model->electronico();
				$datos['total'] = $this->piezasporcat_model->total();
				$datos['vehiculos'] = $this->piezasporcat_model->vehiculos();
				$datos['title'] = 'Inventario || Bienvenido';
				$this->load->view('template/header', $datos);
				$this->load->view('body_view');
				$this->load->view('template/footer');		
			}			
		}else{
			redirect('loginController/index','refresh');
		}
	}
}
