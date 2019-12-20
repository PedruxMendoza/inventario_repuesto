<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vehiculo_controller extends CI_Controller {

	//metodo para acceder a todos los metodos del modelo
	public function __construct(){
		parent::__construct();
		$this->load->model('vehiculo_model');
	}
	//metodo para mostrar datos
	public function index()
	{
		if ($this->session->userdata('logueado') == TRUE) {
			if ($this->session->userdata('rol') == 1) {
				$datos['vehiculo'] = $this->vehiculo_model->get_vehiculo();
				$datos['modelo'] = $this->vehiculo_model->get_modelo();
				$datos['poliza'] = $this->vehiculo_model->get_poliza();
				$datos['clase_vehiculo'] = $this->vehiculo_model->get_clase_vehiculo();
				$datos['vehiculo'] = $this->vehiculo_model->get_vehiculo();
				$datos['transmision'] = $this->vehiculo_model->get_transmision();
				$datos['tipo_motor'] = $this->vehiculo_model->get_tipo_motor();
				$datos['ingreso'] = $this->vehiculo_model->get_ingreso();
				$datos['title'] = 'Inventario || Vehiculo';
				$this->load->view('template/header',$datos);
				$this->load->view('vehiculo_view');
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
				$msj = $this->vehiculo_model->eliminar($id);;
				if ($msj == "successE") 
				{
					$datos['modelo'] = $this->vehiculo_model->get_modelo();
					$datos['poliza'] = $this->vehiculo_model->get_poliza();
					$datos['clase_vehiculo'] = $this->vehiculo_model->get_clase_vehiculo();
					$datos['vehiculo'] = $this->vehiculo_model->get_vehiculo();
					$datos['transmision'] = $this->vehiculo_model->get_transmision();
					$datos['tipo_motor'] = $this->vehiculo_model->get_tipo_motor();
					$datos['ingreso'] = $this->vehiculo_model->get_ingreso();
					$datos['title'] = 'Inventario || Vehiculo';         
                  	$datos['msj'] = "successE";  //Esto se agrega (no se encuentra en el index)
                  	$this->load->view('template/header',$datos);
                  	$this->load->view('vehiculo_view');
                  	$this->load->view('template/footer');
                  }else{
                  	$datos['modelo'] = $this->vehiculo_model->get_modelo();
                  	$datos['poliza'] = $this->vehiculo_model->get_poliza();
                  	$datos['clase_vehiculo'] = $this->vehiculo_model->get_clase_vehiculo();
                  	$datos['vehiculo'] = $this->vehiculo_model->get_vehiculo();
                  	$datos['transmision'] = $this->vehiculo_model->get_transmision();
                  	$datos['tipo_motor'] = $this->vehiculo_model->get_tipo_motor();
                  	$datos['ingreso'] = $this->vehiculo_model->get_ingreso();
                  	$datos['title'] = 'Inventario || Vehiculo';         
                	$datos['msj'] = "errorE";  //Esto se agrega (no se encuentra en el index)
                	$this->load->view('template/header',$datos);
                	$this->load->view('vehiculo_view');
                	$this->load->view('template/footer');              
                }
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
				$datos['nombre_modelo'] = $this->input->post('id_modelo');
				$datos['anio'] = $this->input->post('anio');
				$datos['color'] = $this->input->post('color');
				$datos['fecha_ingreso'] = $this->input->post('fecha_ingreso');

				$datos['VIN'] = $this->input->post('VIN');
				$datos['id_poliza'] = $this->input->post('id_poliza');
				// $datos['peso'] = $this->input->post('id_poliza2');
				// $datos['doc_transporte'] = $this->input->post('id_poliza3');

				$datos['nombre_clase'] = $this->input->post('id_clase');
				$datos['millas'] = $this->input->post('millas');
				$datos['serie'] = $this->input->post('serie');
				$datos['tipo_transmision'] = $this->input->post('id_tipo_transmision');

				$datos['nombre_tipo_motor'] = $this->input->post('id_tipo_motor');
				$datos['serial'] = $this->input->post('serial');
				//$datos['fecha_hora'] = $this->input->post('id_ingreso');
				$datos['num_comprobante'] = $this->input->post('id_ingreso1');

				//$datos['total_compra'] = $this->input->post('id_ingreso2');
				$datos['precio_ingreso'] = $this->input->post('precio_ingreso');

				$msj = $this->vehiculo_model->set_vehiculo($datos);
				if ($msj == "success")
				{
					$datos['modelo'] = $this->vehiculo_model->get_modelo();
					$datos['poliza'] = $this->vehiculo_model->get_poliza();
					$datos['clase_vehiculo'] = $this->vehiculo_model->get_clase_vehiculo();
					$datos['vehiculo'] = $this->vehiculo_model->get_vehiculo();
					$datos['transmision'] = $this->vehiculo_model->get_transmision();
					$datos['tipo_motor'] = $this->vehiculo_model->get_tipo_motor();
					$datos['ingreso'] = $this->vehiculo_model->get_ingreso();
					$datos['title'] = 'Inventario || Vehiculo';  
					$datos['msj'] = "success";
					$datos['titulo'] = 'Votaciones || Detalles Votaciones';
					$this->load->view('template/header',$datos);
					$this->load->view('vehiculo_view');
					$this->load->view('template/footer'); 
				}
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
				$datos['vehiculo'] = $this->vehiculo_model->get_datos($id);

				$datos['modelo'] = $this->vehiculo_model->get_modelo();
				$datos['poliza'] = $this->vehiculo_model->get_poliza();
				$datos['clase_vehiculo'] = $this->vehiculo_model->get_clase_vehiculo();

				$datos['transmision'] = $this->vehiculo_model->get_transmision();
				$datos['tipo_motor'] = $this->vehiculo_model->get_tipo_motor();
				$datos['ingreso'] = $this->vehiculo_model->get_ingreso();
				$datos['title'] = 'Inventario || Vehiculo';
				$this->load->view('template/header',$datos);
				$this->load->view('vehiculo_viewact');
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
				$datos['id'] = $this->input->post('id');
				$datos['nombre_modelo'] = $this->input->post('id_modelo');
				$datos['anio'] = $this->input->post('anio');
				$datos['color'] = $this->input->post('color');
				$datos['fecha_ingreso'] = $this->input->post('fecha_ingreso');

				$datos['VIN'] = $this->input->post('VIN');
				// $datos['cantidad'] = $this->input->post('id_poliza');
				// $datos['peso'] = $this->input->post('id_poliza2');
				// $datos['doc_transporte'] = $this->input->post('id_poliza3');

				$datos['nombre_clase'] = $this->input->post('id_clase');
				$datos['millas'] = $this->input->post('millas');
				$datos['serie'] = $this->input->post('serie');
				$datos['tipo_transmision'] = $this->input->post('id_tipo_transmision');

				$datos['nombre_tipo_motor'] = $this->input->post('id_tipo_motor');
				$datos['serial'] = $this->input->post('serial');
				//$datos['fecha_hora'] = $this->input->post('id_ingreso');
				$datos['num_comprobante'] = $this->input->post('id_ingreso1');

				// $datos['total_compra'] = $this->input->post('id_ingreso2');
				$datos['precio_ingreso'] = $this->input->post('precio_ingreso');

				$msj = $this->vehiculo_model->set_vehiculoAct($datos);
				if ($msj == "modi")
				{
					$datos['modelo'] = $this->vehiculo_model->get_modelo();
					$datos['poliza'] = $this->vehiculo_model->get_poliza();
					$datos['clase_vehiculo'] = $this->vehiculo_model->get_clase_vehiculo();
					$datos['vehiculo'] = $this->vehiculo_model->get_vehiculo();
					$datos['transmision'] = $this->vehiculo_model->get_transmision();
					$datos['tipo_motor'] = $this->vehiculo_model->get_tipo_motor();
					$datos['ingreso'] = $this->vehiculo_model->get_ingreso();
					$datos['title'] = 'Inventario || Vehiculo';  
					$datos['msj'] = "modi";
					$this->load->view('template/header',$datos);
					$this->load->view('vehiculo_view');
					$this->load->view('template/footer'); 
				}else{
					$datos['modelo'] = $this->vehiculo_model->get_modelo();
					$datos['poliza'] = $this->vehiculo_model->get_poliza();
					$datos['clase_vehiculo'] = $this->vehiculo_model->get_clase_vehiculo();
					$datos['vehiculo'] = $this->vehiculo_model->get_vehiculo();
					$datos['transmision'] = $this->vehiculo_model->get_transmision();
					$datos['tipo_motor'] = $this->vehiculo_model->get_tipo_motor();
					$datos['ingreso'] = $this->vehiculo_model->get_ingreso();
					$datos['title'] = 'Inventario || Vehiculo';  
					$datos['msj'] = "ErrorM";
					$this->load->view('template/header',$datos);
					$this->load->view('vehiculo_view');
					$this->load->view('template/footer'); 
				}
			}else{
				redirect('Welcome/error404','refresh');
			}
		}else{
			redirect('loginController/index','refresh');
		}
	}

}
