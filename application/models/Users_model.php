<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
	public function __construct(){
		$this->load->helper('security');
	}
	public function register($post){
		$password = do_hash($post['password']);
		$query = "insert into users (name, alias, email, password, dob, created_at, modified_at) values(?,?,?,?,?,NOW(),NOW())";
		$values =
			 ["{$post['name']}","{$post['alias']}","{$post['email']}",$password,"{$post['dob']}"];
		$this->db->query($query, $values);
		return true;
	}
	public function index_users(){
		$query = "SELECT id, name, alias, email FROM users";
		return $this->db->query($query)->result_array();
	}
	public function show_by_email($email){
		$query =
			"SELECT * FROM users WHERE email = ?";
		$values = [$email];
		return $this->db->query($query,$values)->row_array();
	}
	public function add($info){
		$query =
			 "INSERT INTO users (name, alias, email, password, dob created_at, modified_at)  VALUES (?,?,?,?,?,NOW(),NOW())";
		return $this->db->query($query,$info);
	}
}
