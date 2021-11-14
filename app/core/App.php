<?php

class App{

	protected $controller = 'Auth';
	protected $method = 'index';
	protected $params = [];

	public function __construct(){
		$url = $this->parseURL();

		$url[0] = ucwords($url[0]);
		$url[1] = strtolower($url[1]);

		if(file_exists('app/controllers/' . $url[0] . '.php')){
			$this->controller = $url[0] ;
			unset($url[0]);
		}

		require_once 'app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		if(isset($url[2])){
			$this->params = array_values($url[2]);
		}

		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseURL(){
		$result = [];

		if( isset($_GET['c'])){
			$result[0] = $_GET['c'];
		}

		if( isset($_GET['m'])){
			$result[1] = $_GET['m'];
		}

		if( isset($_GET['p'])){
			$result[2] = $_GET['p'];
		}

		return $result;

	}

}

/**
* 
* cara pake tinggal panggil site_url("Controller/Method/param1/param2")
* maksimal 5 param
*/
function site_url(String $url = null)
{
	$result = base_url;
	if($url != null){
		$str = '?';
		$exp = explode("/", $url);

		if(isset($exp[0])){
			$str .= 'c='.$exp[0];
		}

		if(isset($exp[1])){
			$str .= '&m='.$exp[1];
		}else{
			$str .= '&m=index';
		}

		if(isset($exp[2])){
			$str .= '&p[]='.$exp[2];
		}

		if(isset($exp[3])){
			$str .= '&p[]='.$exp[3];
		}

		if(isset($exp[4])){
			$str .= '&p[]='.$exp[4];
		}

		if(isset($exp[5])){
			$str .= '&p[]='.$exp[5];
		}

		if(isset($exp[6])){
			$str .= '&p[]='.$exp[6];
		}

		if(isset($exp[7])){
			$str .= '&p[]='.$exp[7];
		}

		$result .= $str;

	}
	return $result;
}

/**
 * cara pake tinggal panggil view("folder/file")
 *
 */
function view(String $view, array $data = []):void
{
  require_once __DIR__.'/../views/' . $view . '.php';
}

/**
 * cara pake tinggal panggil model("namamodel")->namamethod('param')
 *
 * @param string $model
 * @return void
 */
function model(String $model):object
{
	require_once __DIR__.'/../models/' . $model . '.php';
	return new $model;
}