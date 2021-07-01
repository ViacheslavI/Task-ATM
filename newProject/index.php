<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>ATM</title>
    </head>
    <body>
        <div class="container" style="padding: 3%">
            <form action="checkPinCode.php" method="POST">
			 <div class="form-group">
                    <label for="Inputnumber">Enter number card</label>
                    <input type="text" style="width: 25%" class="form-control" id="NumberCard" name="NumberCard" aria-describedby="numbeurHelp" placeholder="Enter number card">
                    <small id="numberHelp" class="form-text text-muted">Enter the card number without spaces.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Enter pin</label>
                    <input type="text" style="width: 25%" class="form-control" id="PinCode" name="PinCode" aria-describedby="emailHelp" placeholder="Enter pin-code">
                    <small id="emailHelp" class="form-text text-muted">Never share your PIN code with third person.</small>
                </div>
                <input type="submit" class="btn btn-primary"/>
            </form>
        </div>
    </body>
</html>