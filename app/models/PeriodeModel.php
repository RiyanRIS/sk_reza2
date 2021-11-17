<?php

class PeriodeModel {

  private $table = 'periode';
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

	public function simpan($data)
	{
		$query = "INSERT INTO ". $this->table ."(`tahun`, `nama`, `sk`) VALUES (:tahun, :nama, :sk)";

		$this->db->query($query);
		$this->db->bind('tahun',$data['tahun']);
		$this->db->bind('nama',$data['nama']);
		$this->db->bind('sk',$data['sk']);
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
		$query = "UPDATE ". $this->table ." SET `tahun`=:tahun,`nama`=:nama,`sk`=:sk WHERE `id`=:id";

		$this->db->query($query);
		$this->db->bind('tahun',$data['tahun']);
		$this->db->bind('nama',$data['nama']);
		$this->db->bind('sk',$data['sk']);
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