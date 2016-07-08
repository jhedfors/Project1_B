<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pokes_model extends CI_Model {
	public function __construct(){
		$this->load->helper('security');
	}
	public function index_pokes(){
		$query =
		 	"SELECT pokes.id as poke_id, users.id as id, name, alias, email, SUM(count) as pokes_recieved from pokes
			right join users on users.id = pokes.pokee_id group by name";
		return $this->db->query($query)->result_array();
	}
	public function show_poke($poker_id,$pokee_id){//only used by add_poke function
		$query =
			"SELECT count  FROM pokes
			WHERE pokee_id = ? AND poker_id = ?;";
		$values = [$pokee_id, $poker_id];
		return $this->db->query($query,$values)->row_array();
	}
	public function add_poke($pokee_id,$poker_id){
		$pokes = $this->show_poke($poker_id,$pokee_id);
		if ($pokes==null) {
			$query =
				"INSERT into pokes (poker_id, pokee_id, count, created_at, modified_at) values(?,?,?,NOW(),NOW());";
			$values = [$poker_id,$pokee_id,1];
			$this->db->query($query,$values);
		}
		else {
			$count = $pokes['count'];
			$count++;
			$query =
				"UPDATE pokes SET count=? WHERE pokee_id =? AND poker_id=?;";
			$values = [$count,$pokee_id,$poker_id];
			$this->db->query($query,$values);
		}
	}
	public function show_pokes_by_id($pokee){//used to display who has poked signed-in person
		$query =
		 	"SELECT poker_id, r.name as poker_name, pokee_id, e.name as pokee_name, count from pokes
			left join users r on r.id = pokes.poker_id
			left join users e on e.id = pokes.pokee_id
			WHERE pokee_id =?";
		$values = [$pokee];
		return $this->db->query($query,$values)->result_array();
	}
}
