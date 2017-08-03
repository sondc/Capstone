<meta name="_token" content="{!! csrf_token() !!}"/>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thông tin nhận phòng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <style type="text/css">
        <style type="text/css">
        body
        {
            padding: 0;
            margin: 0;
        }
        .label1{
            width:80px;
            text-align:right;
        }
        hr
        {
            background-color:rgb(215,215,215);
            height:1px;
            border: 0;
        }
        table {
            width: 100%;
            border:1px solid rgb(200,200,200);
        }

        thead, tbody, tr, td, th { display: block; }

        tr:after {
            content: ' ';
            display: block;
            visibility: hidden;
            clear: both;
        }

        thead th {
            height: 30px;

            /*text-align: left;*/
        }

        tbody {
            height: 190px;
            overflow-y: auto;
        }

        thead {
            /* fallback */
        }

        .col1
        {
            width: 5%;
            float:left;
        }
        .col2
        {
            width: 20%;
            float:left;
        }
        .col3
        {
            width: 20%;
            float:left;
        }
        .col4
        {
            width: 15%;
            float:left;
        }
        .col5
        {
            width: 10%;
            float:left;
        }
        .col6
        {
            width: 18%;
            float:left;
        }
        .col7
        {
            width: 12%;
            float:left;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="margin-top:5%;background-color:rgb(245,245,245);border:1px solid rgb(215,215,215);">
            <div class="row">
                <div class="col-md-offset-9" style="margin:10px 10px 0px 0px;float:right;">
                <!--
						@if(Session::has('USER_INFO'))
                    <b><a class="account" style="text-decoration:none;" href=" {{url("/K012")}}">{!!Session::get('USER_INFO')->user_name !!} </a></b>
						@endif
                        -->
                    <b>|</b><a href="{!! url('/K001/LogOut') !!}"><b> Đăng xuất</b></a>
                </div>
                <div class="col-md-12">
                    <p class="brand-title">Thông tin nhận phòng</p>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1" style="background-color:rgb(230,230,230);border:1px solid rgb(215,215,215); border-top:none;border-bottom:none;">
            <div class="form-inline" style="margin-top:20px;">
                <label class="label1">Họ tên:</label>
                <input id="txtFullName" name="txtFullName" type="text" class="form-control input-md" maxlength="50" autofocus>
                <label class="label1">CMND:</label>
                <input id="txtCMND" name="txtCMND" type="text" class="form-control input-md" maxlength="12">
                <button type="button" id="btnView" class="btn btn-default" style="margin-left:20px;"><b>Xem</b></button>
            </div>
            <div class="row"><hr></div>
            <table class="table table-bordered" style="margin-bottom:20px;">
                <thead>
                <tr>
                    <th class="col1">STT</th>
                    <th class="col2">Người đặt</th>
                    <th class="col3">Người ở</th>
                    <th class="col4">Ngày nhận</th>
                    <th class="col5">Số phòng</th>
                    <th class="col6">Trạng thái phòng</th>
                    <th class="col7"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="col1">1</td>
                    <td class="col2">Nguyễn Hữu Hoàng Tùng</td>
                    <td class="col3">Nguyễn Hữu Hoàng trung</td>
                    <td class="col4">06/05/2017</td>
                    <td class="col5">101</td>
                    <td class="col6">Not used</td>
                    <td class="col7"><a href="#"><b>Nhận phòng</b></a></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-10 col-md-offset-1" style="background-color:rgb(245,245,245);border:1px solid rgb(215,215,215);">
            <div class="row">
                <div class="col-md-3 col-md-offset-10" style="margin-top:10px;margin-bottom:10px;">
                    <button id="btnBack" class="btn btn-danger col-md-offset-2" type="button"><b>Quay lại</b></button>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>