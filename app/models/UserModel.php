<?php

class UserModel {

  private $table = 'users';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

  public function getAll()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function get($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table .' WHERE `id` = :id');
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->single();
	}

	public function getByUsername($username)
	{
		$this->db->query('SELECT * FROM ' . $this->table .' WHERE `username` = :username');
		$this->db->bind('username', $username);
		$this->db->execute();

		return $this->db->single();
	}

	public function cekUsername($username)
	{
		$this->db->query("SELECT * FROM ". $this->table ." WHERE `username` = :username");
		$this->db->bind('username', $username);
		if(0 == count($this->db->resultSet())){
			return true;
		}else{
			return false;
		}
	}

	public function cekUsernameEdit($id, $username)
	{
		$this->db->query("SELECT * FROM ". $this->table ." WHERE `username` = :username AND `id` != :id");
		$this->db->bind('username', $username);
		$this->db->bind('id', $id);
		if(0 == count($this->db->resultSet())){
			return true;
		}else{
			return false;
		}
	}

	public function simpan($data)
	{
		$query = "INSERT INTO ". $this->table ."(`nama`, `role`, `username`, `password`) VALUES (:nama, :role, :username, :password)";

		$this->db->query($query);
		$this->db->bind('nama',$data['nama']);
		$this->db->bind('role',$data['role']);
		$this->db->bind('username',$data['username']);
		$this->db->bind('password',password_hash($data['password'], PASSWORD_DEFAULT));
		$this->db->execute();

		if( !empty($this->db->errorInfo()) ){  
			$errorLogMsg = "error info:" . implode(":", $this->db->errorInfo());
			return $errorLogMsg;
		} else {
			return true;
		}
	}

	public function ubah($data)
	{
		if($data['password'] != ""){
			$query = "UPDATE ". $this->table ." SET `nama`=:nama,`role`=:role,`username`=:username,`password`=:password WHERE `id`=:id";
		}else{
			$query = "UPDATE ". $this->table ." SET `nama`=:nama,`role`=:role,`username`=:username WHERE `id`=:id";
		}

		$this->db->query($query);
		$this->db->bind('nama',$data['nama']);
		$this->db->bind('role',$data['role']);
		$this->db->bind('username',$data['username']);
		$this->db->bind('id',$data['id']);

		if($data['password'] != ""){
			$this->db->bind('password',password_hash($data['password'], PASSWORD_DEFAULT));
		}
	
		$this->db->execute();

		if( !empty($this->db->errorInfo()) ){  
			$errorLogMsg = "error info:" . implode(":", $this->db->errorInfo());
			return $errorLogMsg;
		} else {
			return true;
		}
	}

	public function hapus($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();

		if( !empty($this->db->errorInfo()) ){  
			$errorLogMsg = "error info:" . implode(":", $this->db->errorInfo());
			return $errorLogMsg;
		} else {
			return true;
		}
	}
}