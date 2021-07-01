<?php
session_start();
require_once(__DIR__."\db.php");
/*
Запросы к базе данных.
*/
class requireToDb{
	protected $numbercard;
	public $sql;
	public $blockCard;
	public $balance;
	//public $finalbalance;

	public function __construct(){
		$this->numbercard = $_SESSION['NumberCard'];
	
	}	
	// Получение пин-кода
	public function getPin($conn){	

		$query ='SELECT `pin` FROM `user` WHERE `numbercard` like "'.$this->numbercard.'"';
		$sql = $conn->prepare($query);
		$sql->execute();	
		while($pinUser = $sql->fetch(PDO::FETCH_ASSOC)){
			return $this->sql = $pinUser['pin'];
		}		
	}
	// несение изменений в базу даных при блокировки 
	public function blockcard($conn){
		$query = 'UPDATE `atm`.`user` SET `blockcard`=1 WHERE `numbercard` like "'.$this->numbercard.'"';
		$sql = $conn->prepare($query);		
		$sql->execute();
	}
	// Проверка на блокировку карты
	public function checkblockcard($conn){
		$query='SELECT `blockcard` FROM `user` WHERE `numbercard` like "'.$this->numbercard.'"';
		$sql = $conn->prepare($query);
		$sql->execute();
		while($checkblock = $sql->fetch(PDO::FETCH_ASSOC)){	

		return $this->blockCard = $checkblock['blockcard'];

		}	
	}
	//Проверка баланса
	public function checkbal($conn){
		
		$query='SELECT `balance` FROM `user` WHERE `numbercard` like "'.$this->numbercard.'"';
		$sql = $conn->prepare($query);
		$sql->execute();
		while($checkb = $sql->fetch(PDO::FETCH_ASSOC)){	
		
			return $this->balance=$checkb['balance'];
		}
	}
	//Списание суммы введеной пользователем с баланса и обновление записи баланса в базе.
	public function paymentmoney ($conn,$sumwithdraw){		
		$query='SELECT `balance` FROM `user` WHERE `numbercard` like "'.$this->numbercard.'"';
		$sql = $conn->prepare($query);
		$sql->execute();
		while($checkb = $sql->fetch(PDO::FETCH_ASSOC)){			
			 $balance=$checkb['balance'];
		}			
		if($balance>$sumwithdraw){
			$finalbalance = $balance-$sumwithdraw;
			$query='UPDATE `atm`.`user` SET `balance`="'.$finalbalance.'" WHERE `numbercard` like "'.$this->numbercard.'"';
			$sql = $conn->prepare($query);
			$sql->execute();		
			return $finalbalance;
		}
		
	}
	/* Проверка карт на наличие в базе, полчение баланса, списание и зачисление  на баланс.
	Обновление колонки баланса в базе.
	*/
	public function checknumbercard($conn,$transferwith,$transferto,$summa){
		$query = 'SELECT `numbercard` FROM `user` WHERE `numbercard`like "'.$transferwith.'"';
		$sql = $conn->prepare($query);
		$sql->execute();
		$query1 = 'SELECT `numbercard` FROM `user` WHERE `numbercard`like "'.$transferto.'"';
		$sql1 = $conn->prepare($query1);
		$sql1->execute();
		if($sql->rowCount() > 0 && $sql1->rowCount() > 0) {
			$querysend='SELECT `balance` FROM `user` WHERE `numbercard` like "'.$transferwith.'"';
			$queryget='SELECT `balance` FROM `user` WHERE `numbercard` like "'.$transferto.'"';
		$sql = $conn->prepare($querysend);
		$sql1 = $conn->prepare($queryget);
		$sql->execute();
		$sql1->execute();
			while($balancesend = $sql->fetch(PDO::FETCH_ASSOC)){		
				$balsend=$balancesend['balance'];
			}
			while($balanceget = $sql1->fetch(PDO::FETCH_ASSOC)){		
				$balget=$balanceget['balance'];
			}
			if($balsend>$summa){
				
				$finalbalancesend = $balsend-$summa;
				$query='UPDATE `atm`.`user` SET `balance`="'.$finalbalancesend.'" WHERE `numbercard` like "'.$transferwith.'"';
				$sql = $conn->prepare($query);
				$sql->execute();	
				$finalbalanceget = $balget+$summa;
				$query1='UPDATE `atm`.`user` SET `balance`="'.$finalbalanceget.'" WHERE `numbercard` like "'.$transferto.'"';
				$sql1 = $conn->prepare($query1);
				$sql1->execute();
			}
		
		} else {
			echo"error";
		}
	}
}