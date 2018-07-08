<?php

class User_model extends CI_model{
   /* public function get_users($user_id,$username){
        $this->db->where([
            'id' => $user_id,
            'username'=>$username
        ]);
        $query=$this->db->get('users');
        return $query->result();
        /*$query=$this->db->get('users');
        return $query->result();*/

        //$query=$this->db->query("SELECT * FROM users");
        //return $query->num_rows();
        /*$config['hostname']='localhost';
        $config['username']='root';
        $config['password']='';
        $config['database']='errand_db';

        $config_2['hostname']='localhost';
        $config_2['username']='root_2';
        $config_2['password']='';
        $config_2['database']='errand_db_2';


        $connection=$this->load->database($config);
        $connection_2=$this->load->database($config_2);*/


    /*}
    public function create_users($data,$id){
        $this->db->insert("users",$data);
    }
    public function update_users($data,$id){
        $this->db->where(['id'=>$id]);

        $this->db->update('users',$data);
    }
    public function delete_users($id){
        $this->db->where(['id'=>$id]);
        $this->db->delete('users');
    }*/

    public function create_user(){
        $options=['cost'=>12];
        $encripted_pass=password_hash($this->input->post('password'),PASSWORD_BCRYPT);
        $data=array(
            'first_name' =>$this->input->post('first_name'),
            'last_name'  =>$this->input->post('last_name'),
            'email'       =>$this->input->post('email'),
            'username'   =>$this->input->post('username'),
            'password'   =>$encripted_pass
        );
        $insert_data=$this->db->insert('users',$data);
        return $insert_data;


    }
    public function login_user($username,$password){
        $this->db->where('username',$username);
        //$this->db->where('password',$password);
        $result= $this->db->get('users');
        $db_password=$result->row(2)->password;
        if(password_verify($password,$db_password)){
            return $result->row(0)->id;
        }else{
            return false;
        }
    }
}

?>
