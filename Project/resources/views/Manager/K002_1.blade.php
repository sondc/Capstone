<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Bootstrap 3 Simple Tables</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}">
    <style type="text/css">
	body
	{
		padding: 0;
		margin: 0;
	}
	</style>
</head>
<body>
        <div class="container">
            <div class="row">
				<div class="col-md-12 col-xs-12" style="background-color:rgb(215,215,215);margin-top:5%;">					
						<p class="brand-title" style="font-size:25px;">Hotel management</p>
					<div class="col-md-4 col-xs-12 col-md-offset-4" style="border:1px solid rgb(194,194,194); background-color:white;margin-top:20px;margin-bottom:70px;">
						<form class="form-horizontal" style="margin-top:40px;margin-bottom:40px;">
							<fieldset>
								<div class="form-group">
								  <div class="col-md-4 col-xs-4 col-md-offset-1"><button type="button"  class="managerBnt" value="romm-sttBtn" name="romm-sttBtn"  onclick="window.location='{{ url("/K003") }}'"  disabled ><b>Room Status</b></button></div>
								</div>
								<div class="form-group">
								  <div class="col-md-4 col-xs-4 col-md-offset-1"><button type="button"  class="managerBnt" value="re-detailBnt" name="re-detailBnt"  onclick="window.location='{{ url("/K003") }}'"  disabled  ><b>Reservation Detail</b></button></div>
								</div>
								<div class="form-group">
								  <div class="col-md-4 col-xs-4 col-md-offset-1"><button type="button"  class="managerBnt" value="room-mngBnt" name="room-mngBnt" onclick="window.location='{{ url("/K005_1") }}'" ><b>Room Management</b></button></div>
								</div>
								<div class="form-group">
								  <div class="col-md-4 col-xs-4 col-md-offset-1"><button type="button"  class="managerBnt" value="serviceBnt" name="serviceBnt"   onclick="window.location='{{ url("/K003") }}'"  disabled   ><b>Service</b></button></div>
								</div>
								<div class="form-group">
								  <div class="col-md-4 col-xs-4 col-md-offset-1"><button type="button" class="managerBnt" value="accoutingBnt" name="accoutingBnt" onclick="window.location='{{ url("/K003") }}'" disabled ><b>Accouting</b></button></div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
            </div>
        </div>
</body>
</html>