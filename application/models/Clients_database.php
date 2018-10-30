<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clients_Database extends CI_Model {
// Insert registration data in database
public function insert($data){
  if($this->check_email($data['email']) == true){
    return "Email exists";
  }
  if($this->check_phone($data['phone']) == true){
    return "Phone number exists";
  }
  else{
    $this->db->insert('clients',$data);
    if($this->db->affected_rows() > 0){
        return 'success';
      }
    else{
        return "failed";
      }
     }
}

public function signup($data){
  if($this->check_user_email($data['email']) == true){
    return "Email exists";
  }
  else{
    $this->db->insert('logins',$data);
    if($this->db->affected_rows() > 0){
        return 'success';
      }
    else{
        return "failed";
      }
     }
}

private function check_email($email){
    $this->db->select('*');
    $this->db->from('clients');
    $this->db->where('email=', $email);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return true;
    }
    else return false;
}
private function check_phone($phone){
    $this->db->select('*');
    $this->db->from('clients');
    $this->db->where('phone=', $phone);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return true;
    }
    else return false;
}
private function check_user_email($email){
    $this->db->select('*');
    $this->db->from('logins');
    $this->db->where('email=', $email);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return true;
    }
    else return false;
}
private function check_inmate_id($id){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('inmate=', $id);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        return true;
    }
    else return false;
}
public function read() {
	$this->db->select('*');
	$this->db->from('clients');
	$this->db->order_by('id DESC');
	$query = $this->db->get();
  if ($query->num_rows() > 0) {
     return $query->result_array();
  } else {
     return false;
  }
}
public function read_all() {
  $this->db->select('*');
  $this->db->from('products');
  $this->db->order_by('rand()');
  $this->db->limit(4);
  $query = $this->db->get();
  if ($query->num_rows() > 0) {
     return $query->result_array();
  } else {
     return false;
  }
}
public function view_profile($inmateid) {
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('inmate',$inmateid);
	$this->db->order_by('id', 'desc');
	$query = $this->db->get();
  if ($query->num_rows() > 0) {
     return $query->result_array();
  } else {
     return "no data";
  }
}
public function search($data) {
  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('is_admin=0');
  //$this->db->where('gender',$data['gender']); 
  
  if($data['state']){ 
  $this->db->where('state',$data['state']);
  }
  if($data['interest']){
  $this->db->where('sexual_interest',$data['interest']); 
  } 
  if($data['min'] && $data['max']){
  $this->db->where('age >=', $data['min']);
  $this->db->where('age <=', $data['max']);
  }
  if($data['rel_min'] && $data['rel_max']){
  $this->db->where('releaseyear >=', $data['rel_min']);   
  $this->db->where('releaseyear  <=', $data['rel_max']); 
  }   
  $this->db->order_by('rand()');        
  //$this->db->limit(50);  
  $query = $this->db->get();   
  
 $res = $this->db->last_query();
 
  
  
  if ($query->num_rows() > 0) {
     return $query->result_array(); 
  } else {
     return false;
  }
}

public function filter($data) {
  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('is_admin=0');
  if(isset($data['full_name'])){
  $this->db->like('full_name',$data['full_name']);
  }
  else{
  $this->db->like('inmate',$data['inmate']);
  }
  $this->db->order_by('rand()');
  $this->db->limit(30);
  $query = $this->db->get();
  if ($query->num_rows() > 0) {
     return $query->result_array();
  } else {
     return false;
  }
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
// Fetch message counts by id
public function fetch_mail_count_by_inmate($inmate) {
  $this->db->select('mail_counts');
  $this->db->from('users');
  $this->db->where('inmate=',$inmate);
  $query = $this->db->get();
  if ($query->num_rows() > 0) {
  return $query->result_array();
 } else {
     return false;
  }
}
// Fetch User by inmate id
public function fetch_user($id) {
  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('inmate=',$id);
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
// Fetch users Info
public function fetch_all_user() {
  $this->db->select('*');
  $this->db->from('users');
  $query = $this->db->get();
  if ($query->num_rows() > 0) {
    // return $query->result_array();
  $a = $query->result_array();
  foreach ($a as $key => $value) {   
  $this->db->select('COUNT(profile_id) as num_like');
  $this->db->from('profile_likes');
  $this->db->where('profile_id=',$value['id']);
  $query = $this->db->get();
    if ($query->num_rows() > 0) {
     // return $query->result_array();
       $aa = $query->result_array();
      $a[$key]['num_likes'] = $aa[0]['num_like'];
     }	 
  $this->db->select('COUNT(profile_id) as num_view');
  $this->db->from('profile_views');
  $this->db->where('profile_id=',$value['id']);
  $query = $this->db->get();
    if ($query->num_rows() > 0) {
     // return $query->result_array();
       $aa = $query->result_array();
      $a[$key]['num_views'] = $aa[0]['num_view'];
     }
	 
	}
	
	return $a;  
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
 $this->db->update('logins',$data);
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
public function addProfileView($data) {
    $this->db->insert('profile_views',$data);
    if($this->db->affected_rows() > 0){
        return $this->db->insert_id();
      }
    else{
        return "failed";
      }
  }
public function addMessage($data) {
    $this->db->insert('messages_out',$data);
    if($this->db->affected_rows() > 0){
        return $this->db->insert_id();
      }
    else{
        return "reply failed";
      }
  }
 public function addProfileLike($data) {
    $this->db->insert('profile_likes',$data);
    if($this->db->affected_rows() > 0){
        return $this->db->insert_id();
      }
    else{
        return "failed";
      }
  }
 // Update Ajax User display profile
 public function update_ajax_profile($id,$data) {
 $this->db->where('id',$id);
 $this->db->update('users',$data);
 if($this->db->affected_rows() != 0){
    return "success";
 }
 else return false;
 }
 
public function update_profile($id,$data) {
 $this->db->where('inmate',$id);
 $this->db->update('users',$data);
 if($this->db->affected_rows() != 0){
    return true;
 }
 else return false;
 }
 
 //Update mail counts
 public function update_mail_counts($update_mail_counts,$data) {
 $this->db->where('inmate',$update_mail_counts);
 $this->db->update('users',$data);
 if($this->db->affected_rows() != 0){
    return true;
 }
 else return false;
 }
 
  //Update Message counts
 public function update_message_counts($update_message_counts,$data) {
 $this->db->where('inmate',$update_message_counts);
 $this->db->update('users',$data);
 if($this->db->affected_rows() != 0){
    return true;
 }
 else return false;
 }
 
 // Update multiple images
 public function fetch_multiple_imgs_by_id($id) {
  $this->db->select('multiple_images');
  $this->db->from('users');
  $this->db->where('id=',$id);
  $query = $this->db->get();
  if ($query->num_rows() > 0) {
     return $query->result_array();
  } else {
     return false;
  }
}
 // Update multiple images
  public function update_multiple_imgs($id,$data) {
 $this->db->where('id',$id);
 $this->db->update('users',$data);
 if($this->db->affected_rows() != 0){
    return true;
 }
 else return false;
 }
}

?>