<?php
/*
Проверка  баланса канты и вывод во "view"
*/
require_once(__DIR__."\db.php");
require_once(__DIR__."\Require.php");
require_once(__DIR__."\account.php");

if(isset($_POST['balance'])){	
			$checkbalance= new checkBalance($conn);
			$checkbalance->getBalance($conn);	
			$checkbalance->display();
	}
	class checkBalance{
		protected $requiretodb;
		public $balance;
		public function __construct($conn)
		{
			$requiretodb= new requireToDb($conn);
			$this->requiretodb=$requiretodb;		
				
		}
		public function getBalance($conn){
			
			$balance=$this->requiretodb->checkbal($conn);
			$this->balance=$balance;
		}
		public function display(){
			echo $this->balance." uah";
		}
	}
	 
