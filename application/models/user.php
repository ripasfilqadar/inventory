<?php
class User extends CI_Model
{
	function User()
	{
		parent::__construct();
	}
	function check($id,$password)
	{
		$query="select * from user where username='$id' and password='$password'";
		if ($this->db->query($query)!=NULL)
		{
			$query=$this->db->query($query);
			$num=$query->row();
			return $num->status;
		}
		else return 0;
	}
}