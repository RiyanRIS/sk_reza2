<?php

class User extends Controller {
	public function __construct()
	{	
		cekLogin();
		cekAdmin();
	} 

	public function index()
	{
		$data['judul'] = 'Data User';
		$data['user'] = model("UserModel")->getAll();

		view('user/index', $data);
	}

	public function add()
	{
		$data['judul'] = 'Tambah User';
		view('user/add', $data);
	}

	public function aksi_add()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if($_POST['password2'] == $_POST['password']){
				if(preg_match("/^[a-zA-Z0-9]*$/", $_POST['username'])){
					if(model("UserModel")->cekUsername($_POST['username'])){
						$simpan = model("UserModel")->simpan($_POST);
						if($simpan){
							setMsg("Berhasil menambah data.");
							header('location: '. site_url('user'));
							exit();
						}else{
							setMsg("Terjadi masalah dalam penambahan data.", "error");
						}
					}else{
						setMsgError("username", "Username sudah terdaftar.");
						$_SESSION['user_add'] = $_POST;
					}
				}else{
					setMsgError("username", "Username hanya dibolehkan huruf dan angka.");
					$_SESSION['user_add'] = $_POST;
				}
			}else{
				setMsgError("password", "Konfirmasi password belum cocok.");
				$_SESSION['user_add'] = $_POST;
			}
		}
		header('location: '. site_url('user/add'));
	}

	public function edit($id)
	{
		if($_SESSION['user_edit']['id'] == ""){
			$_SESSION['user_edit'] = model("UserModel")->get($id);
		}
		$data['judul'] = 'Edit User';
		view('user/edit', $data);
	}

	public function aksi_edit()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$status = 1;

			if($_POST['password'] != ""){
				if($_POST['password2'] != $_POST['password']){
					setMsgError("password", "Konfirmasi password belum cocok.");
					$status = 0;
				}
			}

			if(!preg_match("/^[a-zA-Z0-9]*$/", $_POST['username'])){
				setMsgError("username", "Username hanya dibolehkan huruf dan angka.");
				$status = 0;
			}

			if(!model("UserModel")->cekUsernameEdit($_POST['id'], $_POST['username'])){
				setMsgError("username", "Username sudah terdaftar.");
				$status = 0;
			}

			if($status){
				$update = model("UserModel")->ubah($_POST);
				if($update){
					setMsg("Berhasil mengubah data.");
					header('location: '. site_url('user'));
				}else{
					setMsg("Terjadi masalah dalam perubahan data.", "error");
				}
			}else{
				$_SESSION['user_edit'] = $_POST;
				header('location: '. site_url('user/edit/'.$_POST['id']));
			}
		}
	}

	public function delete($id)
	{
		$data['judul'] = 'Delete User';
		if($_SESSION['user_delete']['id'] == ""){
			$_SESSION['user_delete'] = model("UserModel")->get($id);
		}
		view('user/delete', $data);
	}

	public function aksi_delete()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$delete = model("UserModel")->hapus($_POST['id']);
			if($delete){
				setMsg("Berhasil menghapus data.");
				header('location: '. site_url('user'));
			}else{
				setMsg("Terjadi masalah dalam penghapusan data.", "error");
			}
		}
	}

}