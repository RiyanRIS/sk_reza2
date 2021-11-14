<?php

class ArsipModel {

  private $table = 'arsip';
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

	public function cekKode($kode)
	{
		$this->db->query("SELECT * FROM ". $this->table ." WHERE `kode` = :kode");
		$this->db->bind('kode', $kode);
		if(0 == count($this->db->resultSet())){
			return true;
		}else{
			return false;
		}
	}

	public function cekKodeEdit($id, $kode)
	{
		$this->db->query("SELECT * FROM ". $this->table ." WHERE `kode` = :kode AND `id` != :id");
		$this->db->bind('kode', $kode);
		$this->db->bind('id', $id);
		if(0 == count($this->db->resultSet())){
			return true;
		}else{
			return false;
		}
	}

	public function simpan($data)
	{
		$query = "INSERT INTO ". $this->table ."(`kode`, `nama`, `jenis`, `tanggal`, `jam`, `file`, `catatan`, `id_users`, `created_at`) VALUES (:kode, :nama, :jenis, :tanggal, :jam, :file, :catatan, :id_users, :created_at)";

		$this->db->query($query);
		$this->db->bind('kode',$data['kode']);
		$this->db->bind('nama',$data['nama']);
		$this->db->bind('jenis',$data['jenis']);
		$this->db->bind('tanggal',$data['tanggal']);
		$this->db->bind('jam',$data['jam']);
		$this->db->bind('file',$data['file']);
		$this->db->bind('catatan',$data['catatan']);
		$this->db->bind('id_users',$data['id_users']);
		$this->db->bind('created_at',time());
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
		$query = "UPDATE ". $this->table ." SET `kode`=:kode,`nama`=:nama,`jenis`=:jenis,`tanggal`=:tanggal,`jam`=:jam,`file`=:file,`catatan`=:catatan,`id_users`=:id_users WHERE `id`=:id";

		$this->db->query($query);
		$this->db->bind('kode',$data['kode']);
		$this->db->bind('nama',$data['nama']);
		$this->db->bind('jenis',$data['jenis']);
		$this->db->bind('tanggal',$data['tanggal']);
		$this->db->bind('jam',$data['jam']);
		$this->db->bind('file',$data['file']);
		$this->db->bind('catatan',$data['catatan']);
		$this->db->bind('id_users',$data['id_users']);
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