<?php

function toUrl($jenis, $file)
{
  if($jenis == "arsip"){
    return "uploads/arsip/".$file;
  }elseif($jenis == "img_kampus"){
    return "uploads/profil/kampus/".$file;
  }elseif($jenis == "img_lembaga"){
    return "uploads/profil/lembaga/".$file;
  }elseif($jenis == "file_sk"){
    return "uploads/profil/sk/".$file;
  }
}

/**
 * Default Value Form
 *
 * @param String $form
 * @param String $part
 * @return String
 */
function val(String $form, String $part):String
{
  $html = "";
  $value = @$_SESSION[$form][$part];
  $_SESSION[$form][$part] = null;
  $html = "value=\"$value\"";
  return $html;
}

function val_radio(String $form, String $part, String $value):String
{
  $sesi = @$_SESSION[$form][$part];
  if($value == $sesi){
    $_SESSION[$form][$part] = null;
    return "checked=\"true\"";
  }else{
    return "";
  }
}

function val_select(String $form, String $part, String $value):String
{
  $sesi = @$_SESSION[$form][$part];
  if($value == $sesi){
    $_SESSION[$form][$part] = null;
    return "selected=\"true\"";
  }else{
    return "";
  }
}

/**
 * Periksa udah login atau belum kalo belum langsung tendang ke halaman login
 *
 * @return void
 */
function cekLogin()
{
  if(@$_SESSION['log_status'] != 1) {
    setMsg('Anda Belum Login. Silahkan login terlebih dahulu.', 'danger');
    header('location: '. site_url('auth'));
    exit;
  }
}

function isAdmin()
{
  if(@$_SESSION['log_role'] == "admin") {
    return true;
  }else{
    return false;
  }
}

function cekAdmin()
{
  if(!isAdmin()) {
    setMsg('Anda Tidak Berhak Mengakses Halaman Ini.', 'danger');
    header('location: '. site_url('home'));
    exit;
  }
}

function cekMsgError($val)
{
  $val = "err_". $val;
  if($_SESSION[$val][0] == $val){
    return "is-invalid";
  }else{
    return "";
  }
}

function setMsgError($type, $pesan)
{
  $type = "err_". $type;
  $_SESSION[$type] = [$type, $pesan];
}

function getMsgError($val)
{
  $html = "";
  $val = "err_". $val;
  if($_SESSION[$val][0] == $val){
    $html = $_SESSION[$val][1];
    $_SESSION[$val] = null;
  }
  return $html;
}

function setMsg($pesan, $type = 'success')
{
    $_SESSION['msg'] = [
        'pesan' => $pesan,
        'type'  => $type
    ];   
}

function getMsg(){
  if( isset($_SESSION['msg']) )
  {
    $msg = $_SESSION['msg'];
    $pesan = $msg['pesan'];
    if($msg['type'] == 'success'){
      echo "
        Swal.fire({
          icon: 'success',
          title: 'Berhasil',
          text: '$pesan',
        })
      ";
    }else{
      echo "
        Swal.fire({
          icon: 'error',
          title: 'Kesalahan',
          text: '$pesan',
        })
      ";
    }
    unset($_SESSION['msg']);
  }

}