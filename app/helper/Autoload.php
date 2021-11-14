<?php

if(!isset($_SESSION['PROFIL']) || empty($_SESSION['PROFIL'])){

  $profil = model('ProfilModel')->getProfil();
  $_SESSION['PROFIL'] = $profil;
  
}