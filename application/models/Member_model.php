<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_members() {
        $query = $this->db->get('member');
        return $query->result();
    }

    public function insert_member($data) {
        return $this->db->insert('member', $data);
    }

    public function delete_member($id) {
        return $this->db->delete('member', array('id' => $id));
    }
}