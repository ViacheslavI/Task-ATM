<?php
require_once(__DIR__."\db.php");
require_once(__DIR__."\Require.php");
require_once(__DIR__."\account.php");
/*получение данных с формы , проверка  их на  пустоту.
Обращение к файлу Require для создания запроса на списание  денег с баланса.
*/
if(isset($_POST['withdraw'] , $_POST['WithdrawalAmount']) &&!empty($_POST['WithdrawalAmount'])){
	$sumwithdraw = $_POST['WithdrawalAmount'];
	$withdrawalmoney = new WithdrawalMoney($conn);
	$withdrawalmoney->getMoney($conn,$sumwithdraw);
	$withdrawalmoney->accountBalance();
}
	class WithdrawalMoney{
		protected $requiretodb;
		protected $totalbalance;
		
		public function __construct($conn)
		{
			$requiretodb= new requireToDb($conn);
			$this->requiretodb=$requiretodb;		
				
		}
		public function getMoney($conn,$sumwithdraw){
			
			$totalbalance=$this->requiretodb->paymentmoney($conn,$sumwithdraw);
			$this->totalbalance=$totalbalance;
		}
		public function accountBalance(){
				echo $this->totalbalance." uah";
		}
		
	}