<?php
require_once(__DIR__."\db.php");
require_once(__DIR__."\Require.php");
require_once(__DIR__."\account.php");
/*получение данных с формы , проверка  их на  пустоту.
Обращение к файлу Require для создания запроса на списание  денег с баланса и начисления на другую карту.
*/
if(isset( $_POST['transferewith'], $_POST['transferto'],$_POST['summa']) &&
!empty($_POST['transferewith'])&&!empty($_POST['transferto'])&&!empty($_POST['summa'])){
	$transferwith = $_POST['transferewith'];
	$transferto = $_POST['transferto'];
	$summa = $_POST['summa'];
	$trensfermoney = new TransferMoney($conn);	
	$trensfermoney->SendMoney($conn,$transferwith,$transferto,$summa);
}

class TransferMoney{
		protected $requiretodb;
		protected $totalbalance;
		
		public function __construct($conn)
		{
			$requiretodb= new requireToDb($conn);
			$this->requiretodb=$requiretodb;		
				
		}
		public function SendMoney($conn,$transferwith,$transferto,$summa){			
			$this->requiretodb->checknumbercard($conn,$transferwith,$transferto,$summa);			
		}
		public function accountBalance(){
				//echo $this->totalbalance." uah";
		}
		
	}