<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pokes extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Pokes_model');
	}
	public function pokes_view(){
		$active_id = $this->session->userdata('active_id');
		$data['pokes'] = $this->Pokes_model->show_pokes_by_id($active_id);
		$data['all_users'] = $this->Pokes_model->index_pokes();
		$this->load->view('pokes_view',['data'=>$data]);
	}
	public function index_json(){
		$active_id = $this->session->userdata('active_id');
		$all_users = $this->Pokes_model->index_pokes();
		echo json_encode($all_users);

	}
	public function poke($pokee_id,$poker_id){
		$this->Pokes_model->add_poke($pokee_id,$poker_id);
		return json_encode(['success' => TRUE]);
		// redirect('/pokes');
	}
	public function poke_json(){
		// var_dump(this);
		// var_dump($pokee_id,$poker_id);
		// echo json_encode($data);
		$this->Pokes_model->add_poke($_REQUEST['pokee'],$_REQUEST['poker']);
		// echo json_encode(this);
		// $test  = ['ee'=> $_REQUEST['pokee'], 'er'=> $_REQUEST['poker']]
		// echo json_encode($test);

		echo json_encode(['success' => TRUE]);
		// di	e();
		// redirect('/pokes');
	}
}
