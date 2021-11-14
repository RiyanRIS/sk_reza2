<?php

class Arsip extends Controller {
	public function __construct()
	{	
		cekLogin();
	} 

	public function index()
	{
		$data['judul'] = 'Data Arsip';
		$data['arsip'] = model("ArsipModel")->getAll();
		view('arsip/index', $data);
	}

	public function detail($id)
	{
		$data['judul'] = 'Detail Arsip';
		$_SESSION['arsip_detail'] = model("ArsipModel")->get($id);
		view('arsip/detail', $data);
	}

	public function add()
	{
		if(!isAdmin()){
			setMsg("Kamu tidak berhak mengakses halaman ini.", "error");
			header('location: '. site_url('arsip'));
			return;
		}
		$data['judul'] = 'Tambah Arsip';
		view('arsip/add', $data);
	}

	public function aksi_add()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if(!isAdmin()){
				setMsg("Kamu tidak berhak mengakses halaman ini.", "error");
			header('location: '. site_url('arsip'));
			return;
			}

			$status = 1;

			if(!preg_match("/^[a-zA-Z0-9\/_-]*$/", $_POST['kode'])){
				setMsgError("kode", "Kode hanya dibolehkan huruf, angka dan tanda / _ atau -.");
				$status = 0;
			}

			if(!model("ArsipModel")->cekKode($_POST['kode'])){
				setMsgError("kode", "Kode sudah digunakan.");
				$status = 0;
			}

			$nama_arsip = time() . "-" . basename($_FILES["file"]["name"]);
			$target_dir = "uploads/arsip/";
			$target_file = $target_dir . $nama_arsip;

			if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
				echo "Sorry, there was an error uploading your file.||".$_FILES['file']['error']."||".$target_file;
				die();
			}

			$_POST['file'] = $nama_arsip;

			if($status){
				
				$time = $_POST['jam'].":".$_POST['menit'].":00";
				$tanggal = $_POST['tanggal']."-".$_POST['bulan']."-".$_POST['tahun'];

				$_POST['tanggal'] = date("Y-m-d", strtotime($tanggal));
				$_POST['jam'] = date("H:i:s", strtotime($time));
				$_POST['id_users'] = $_SESSION['log_id'];

				$simpan = model("ArsipModel")->simpan($_POST);
				if($simpan){
					setMsg("Berhasil menambah data.");
					header('location: '. site_url('arsip'));
				}else{
					setMsg("Terjadi masalah dalam penambahan data.", "error");
				}
			}else{
				$_SESSION['arsip_add'] = $_POST;
				header('location: '. site_url('arsip/add'));
			}

		}
	}

	public function edit($id)
	{
		if(!isAdmin()){
			setMsg("Kamu tidak berhak mengakses halaman ini.", "error");
			header('location: '. site_url('arsip'));
			return;
		}

		if($_SESSION['arsip_edit']['id'] == ""){
			$_SESSION['arsip_edit'] = model("ArsipModel")->get($id);
			$temp_arsip = $_SESSION['arsip_edit'];
			$_SESSION['arsip_edit']['tanggal'] = date("d", strtotime($temp_arsip['tanggal']));
			$_SESSION['arsip_edit']['bulan'] = date("m", strtotime($temp_arsip['tanggal']));
			$_SESSION['arsip_edit']['tahun'] = date("Y", strtotime($temp_arsip['tanggal']));
			$_SESSION['arsip_edit']['jam'] = date("H", strtotime($temp_arsip['jam']));
			$_SESSION['arsip_edit']['menit'] = date("i", strtotime($temp_arsip['jam']));
		}
		$data['judul'] = 'Edit Arsip';
		view('arsip/edit', $data);
	}

	public function aksi_edit()
	{
		if(!isAdmin()){
			setMsg("Kamu tidak berhak mengakses halaman ini.", "error");
			header('location: '. site_url('arsip'));
			return;
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$status = 1;

			if(!preg_match("/^[a-zA-Z0-9\/_-]*$/", $_POST['kode'])){
				setMsgError("kode", "Kode hanya dibolehkan huruf, angka dan tanda / _ atau -.");
				$status = 0;
			}

			if(!model("ArsipModel")->cekKodeEdit($_POST['id'], $_POST['kode'])){
				setMsgError("kode", "Kode sudah digunakan.");
				$status = 0;
			}

			if(!empty(basename($_FILES["new_file"]["name"]))){

				$nama_arsip = time() . "-" . basename($_FILES["new_file"]["name"]);
				$target_dir = "uploads/arsip/";
				$target_file = $target_dir . $nama_arsip;

				if (!move_uploaded_file($_FILES["new_file"]["tmp_name"], $target_file)) {
					echo "Sorry, there was an error uploading your file.||".$_FILES['new_file']['error']."||".$target_file;
					die();
				}

				$_POST['file'] = $nama_arsip;
			}

			if($status){
				
				$time = $_POST['jam'].":".$_POST['menit'].":00";
				$tanggal = $_POST['tanggal']."-".$_POST['bulan']."-".$_POST['tahun'];

				$_POST['tanggal'] = date("Y-m-d", strtotime($tanggal));
				$_POST['jam'] = date("H:i:s", strtotime($time));
				$_POST['id_users'] = $_SESSION['log_id'];

				$simpan = model("ArsipModel")->ubah($_POST);
				if($simpan){
					setMsg("Berhasil mengubah data.");
					header('location: '. site_url('arsip'));
				}else{
					setMsg("Terjadi masalah dalam perubahan data.", "error");
				}
			}else{
				$_SESSION['arsip_edit'] = $_POST;
				header('location: '. site_url('arsip/edit/'.$_POST['id']));
			}

		}
	}

	public function delete($id)
	{
		if(!isAdmin()){
			setMsg("Kamu tidak berhak mengakses halaman ini.", "error");
			header('location: '. site_url('arsip'));
			return;
		}

		$data['judul'] = 'Delete Arsip';
		if($_SESSION['arsip_delete']['id'] == ""){
			$_SESSION['arsip_delete'] = model("ArsipModel")->get($id);
		}
		view('arsip/delete', $data);
	}

	public function aksi_delete()
	{
		if(!isAdmin()){
			setMsg("Kamu tidak berhak mengakses halaman ini.", "error");
			header('location: '. site_url('arsip'));
			return;
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$delete = model("ArsipModel")->hapus($_POST['id']);
			if($delete){
				setMsg("Berhasil menghapus data.");
				header('location: '. site_url('arsip'));
			}else{
				setMsg("Terjadi masalah dalam penghapusan data.", "error");
			}
		}
	}

}