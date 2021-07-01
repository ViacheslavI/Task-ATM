<?php
session_start();
require_once(__DIR__."\db.php");
require_once(__DIR__."\Require.php");
$_SESSION['NumberCard']=$_POST['NumberCard'];

class CheckPin
{
	protected $chPin;
	protected $resultgetpin;
	protected $requiretodb;
	
	 public function __construct($conn)
	{
		$requiretodb= new requireToDb($conn);
		$resultgetpin=$requiretodb->getPin($conn);
		$this->resultgetpin=$resultgetpin;	
		$this->requiretodb=$requiretodb;		
	}

	/*Функция проверки  пин кода. Получаю пин код от пользователя  проверяю в базе заблокирована ли карта с таким номером.
	Если введено 3 раза не правильный пин в базу вносится изменения и доступ к аккаунту "блокируется". Проверку пин-кода забыл реализовать.  
	*/
    public function Pin($data,$conn){
        $dataPin = stripslashes($data);
		$statusBlock=$this->requiretodb->checkblockcard($conn);
	//var_dump($data);var_dump($statusBlock);die;
		if($this->resultgetpin == $data && $statusBlock==0){			
			header('Location: account.php');
		}
		else{
			if($statusBlock==1){
				header('Location: index.php');
			}
			$count=0;
			$_SESSION['coun']+=$count;	
			header('Location: index.php');	
			if($_SESSION['coun']>3){
				$this->getdbpin->blockcard($conn);
				session_destroy();
				header('Location: index.php');
			}
		}
    }	
}

$checkpin = new CheckPin($conn);
$checkpin->Pin($_POST['PinCode'],$conn);
