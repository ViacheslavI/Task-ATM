<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>account</title>
    </head>
    <body>
        <div class="container" style="padding: 3%">            
			 <div class="form-group">
				<form method="POST" action="checkBalance.php">
                    <input type="submit"  name="balance" class="btn btn-primary" value="balance"/>					
				</form>
				
            </div>
            <div class="form-group">
				<form method="POST" action="withdraw.php">	
					<label for="exampleInputEmail1">Enter the amount of money to withdraw from your account</label><br>
					<input id="withdraw" name="WithdrawalAmount"/>				
                    <input type="submit" name="withdraw" class="btn btn-primary" value="withdraw money"/>
				</form>
            </div>
			 <div class="form-group">
				<form method="POST" action="moneyTransfer.php">
				
				<input id="withdraw" name="transferewith"/>
				<label for="exampleInputEmail1">sender's card number</label><br>	
								
				<input id="withdraw" name="transferto"/>
				<label for="exampleInputEmail1">recipient's card number</label><br>	
				<input id="withdraw" name="summa"/>
				<label for="exampleInputEmail1">sending amount</label><br>					
                <input type="submit" class="btn btn-primary" value="Transfer money"/>
				</form>
            </div>
        </div>
    </body>

</html>