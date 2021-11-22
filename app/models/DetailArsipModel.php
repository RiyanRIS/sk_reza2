<?php

class DetailArsipModel {

  private $table = 'detail_arsip';
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

	public function getBy($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table .' WHERE `code` = :id');
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->resultSet();
	}

	public function get($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table .' WHERE `id` = :id');
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->single();
	}

	public function simpan($data)
	{
		$query = "INSERT INTO ". $this->table ."(`code`, `nama_file`) VALUES (:code, :nama_file)";

		$this->db->query($query);
		$this->db->bind('code',$data['code']);
		$this->db->bind('nama_file',$data['file']);
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
		$query = "UPDATE ". $this->table ." SET `nama_file`=:nama_file WHERE `id`=:id";

		$this->db->query($query);
		$this->db->bind('nama_file',$data['nama_file']);
		$this->db->bind('id',$data['id']);
	
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