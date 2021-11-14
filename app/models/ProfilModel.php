<?php

class ProfilModel {

  private $table = 'profil';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

  public function getProfil()
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',1);
		return $this->db->single();
	}

	public function simpan($data)
	{
		$query = "UPDATE `profil` SET `sistem`=:sistem,`lembaga`=:lembaga,`kabinet`=:kabinet,`kampus`=:kampus,`penjelasan`=:penjelasan,`logo_lembaga`=:logo_lembaga,`logo_kampus`=:logo_kampus,`updated_at`=:updated_at WHERE `id`=:id";
		$this->db->query($query);
		$this->db->bind('sistem',$data['sistem']);
		$this->db->bind('lembaga',$data['lembaga']);
		$this->db->bind('kabinet',$data['kabinet']);
		$this->db->bind('kampus',$data['kampus']);
		$this->db->bind('penjelasan',$data['penjelasan']);
		$this->db->bind('logo_lembaga',$data['logo_lembaga']);
		$this->db->bind('logo_kampus',$data['logo_kampus']);
		$this->db->bind('updated_at',time());
		$this->db->bind('id',1);
		$this->db->execute();

		if( !empty($this->db->errorInfo()) ){  
			$errorLogMsg = "error info:" . implode(":", $this->db->errorInfo());
			return $errorLogMsg;
		} else {
			return true;
		}
	}
	
}