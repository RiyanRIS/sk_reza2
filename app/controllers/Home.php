<?php

class Home extends Controller {
	public function __construct()
	{	
		cekLogin();
	} 

	public function index()
	{
		$data['judul'] = 'Dashboard';
		// setMsg('Berhasil mengubah data');
		view('home/index', $data);
	}

	public function profil()
	{
		$data['judul'] = 'Profil';
		$data['profil'] = model("ProfilModel")->getProfil();
		$data['periode'] = model("PeriodeModel")->getAll();
		if(isAdmin()){
			view('home/profil', $data);
		} else {
			view('home/profil_user', $data);
		}
	}

	public function hapus_periode($a){
		$hapus = model('PeriodeModel')->hapus($a);

		if($hapus == true){
			setMsg("Berhasil manghapus data.");
		}else{
			setMsg($hapus);
		}
    header('location: '. site_url('home/profil'));
	}

	public function aksi_profil()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if(!isAdmin()){
				setMsg("Kamu tidak berhak mengakses halaman ini.");
				header('location: '. site_url('home/profil'));
			}

			if(!empty($_FILES["img_lembaga"]["name"])){
				$img_lembaga = time() . "-" . basename($_FILES["img_lembaga"]["name"]);
				$target_dir = "uploads/profil/lembaga/";
				$target_file = $target_dir . $img_lembaga;
				// $target_file = basename($_FILES["img_lembaga"]["name"]);
				if (!move_uploaded_file($_FILES["img_lembaga"]["tmp_name"], $target_file)) {
					echo "Sorry, there was an error uploading your file.||".$_FILES['img_lembaga']['error']."||".$target_file;
					die();
				}
				$_POST['logo_lembaga'] = $img_lembaga;
			}

			if(!empty($_FILES["img_kampus"]["name"])){
				$img_kampus = time(). "-" . basename($_FILES["img_kampus"]["name"]);
				$target_dir = "uploads/profil/kampus/";
				$target_file = $target_dir . $img_kampus;
				// $target_file = basename($_FILES["img_lembaga"]["name"]);
				if (!move_uploaded_file($_FILES["img_kampus"]["tmp_name"], $target_file)) {
					echo "Sorry, there was an error uploading your file.".$_FILES['img_lembaga']['img_kampus'];
					die();
				}
				$_POST['logo_kampus'] = $img_kampus;
			}

			$simpan = model('ProfilModel')->simpan($_POST);

			if($simpan == true){
				$profil = model('ProfilModel')->getProfil();
  			$_SESSION['PROFIL'] = $profil;
				setMsg("Berhasil memperbarui data.");
			}else{
				setMsg($simpan);
			}
    }
    header('location: '. site_url('home/profil'));
	}

	public function aksi_periode()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if(!isAdmin()){
				setMsg("Kamu tidak berhak mengakses halaman ini.");
				header('location: '. site_url('home/profil'));
			}

			if(!empty($_FILES["sk"]["name"])){
				$img_lembaga = time() . "-" . basename($_FILES["sk"]["name"]);
				$target_dir = "uploads/profil/sk/";
				$target_file = $target_dir . $img_lembaga;
				// $target_file = basename($_FILES["img_lembaga"]["name"]);
				if (!move_uploaded_file($_FILES["sk"]["tmp_name"], $target_file)) {
					echo "Sorry, there was an error uploading your file.||".$_FILES['sk']['error']."||".$target_file;
					die();
				}
				$_POST['sk'] = $img_lembaga;
			}

			$simpan = model('PeriodeModel')->simpan($_POST);

			if($simpan == true){
				setMsg("Berhasil menambah data.");
			}else{
				setMsg($simpan);
			}
    }
    header('location: '. site_url('home/profil'));
	}

}