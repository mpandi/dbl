<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Partners_Database extends CI_Model {
// Insert registration data in database
public function insert($data){
  if($this->check_email($data['email']) == true){
    return "Email exists";
  }
  if($this->check_phone($data['phone']) == true){
    return "Phone number exists";
  }
  else{
    $this->db->insert('partners',$data);
    if($this->db->affected_rows() > 0){
        return 'success';
      }
    else{
        return "failed";
      }
    }
}
public function read() {
	$this->db->select('*');
	$this->db->from('partners');
	$this->db->order_by('id DESC');
	$query = $this->db->get();
  if ($query->num_rows() > 0) {
     return $query->result_array();
  } else {
     return false;
  }
}
private function check_email($email){
    $this->db->select('*');
    $this->db->from('partners');
    $this->db->where('email=', $email);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return true;
    }
    else return false;
}
private function check_phone($phone){
    $this->db->select('*');
    $this->db->from('partners');
    $this->db->where('phone=', $phone);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return true;
    }
    else return false;
}

public function fetch_user_with_id($id) {
  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('id=',$id);
  $query = $this->db->get();
  if ($query->num_rows() > 0) {
     return $query->result_array();
  } else {
     return false;
  }
}
public function fetch_highest_id() {
    $this->db->select_max('id');
    $result = $this->db->get('users')->row();  
    return $result->id;
}
// Fetch mail counts by id
public function fetch_message_count_by_inmate($inmate) {
  $this->db->select('message_count');
  $this->db->from('users');
  $this->db->where('inmate=',$inmate);
  $query = $this->db->get();
  if ($query->num_rows() > 0) {
  return $query->result_array();
 } else {
     return false;
  }
}

// Fetch User by id
public function fetch_user_by_id($id) {
  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('id=',$id);
  $query = $this->db->get();
  if ($query->num_rows() > 0) {
     return $query->result_array();
  } else {
     return false;
  }
}
public function fetch_my_messages($email) {
  $this->db->select('*');
  $this->db->from('messages_out');
  $this->db->where('email=',$email);
  $this->db->order_by('id', 'desc');
  $this->db->limit(15);
  $query = $this->db->get();
  if ($query->num_rows() > 0) {
     return $query->result_array();
  } else {
     return false;
  }
}
public function fetch_messages() {
  $this->db->select('*');
  $this->db->from('messages_in');
  $this->db->order_by('id', 'desc');
  $this->db->limit(15);
  $query = $this->db->get();
  if ($query->num_rows() > 0) {
     return $query->result_array();
  } else {
     return false;
  }
}
public function delete_user($id){
   $this->db->where('id', $id);
   $this->db->delete('users'); 
  if($this->db->affected_rows() > 0) {
     return true;
  } else {
     return false;
  }
}
// Read data using username and password
public function login($data) {
  $array = array('email' => $data['email'], 'password' =>  md5($data['password']));
  $this->db->from('logins');
  $this->db->where($array);
  $this->db->limit(1);
  $query = $this->db->get();
  if ($query->num_rows() == 1) {
     $this->update_last_login($data['email']);
     return $query->result();
     
  } else {
     return false;
  }
}
private function update_last_login($email){
 $data = array(
            'last_login' => time()
		);
 $this->db->where('email',$email);
 $this->db->update('partners',$data);
 }
//update Users
public function update($id,$data){
 $this->db->where('id',$id);
 $this->db->update('users',$data);
 if($this->db->affected_rows() != 0){
    return true;
 }
 else return false;
 } 
}

?>