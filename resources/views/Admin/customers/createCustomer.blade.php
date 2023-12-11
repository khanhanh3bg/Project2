
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

        body{
            position: relative;
            width: 100%;
            background-image: url('https://sacbaongoc.net/wp-content/uploads/2022/08/300-hinh-anh-bau-troi-dep-lam-hinh-nen-dien-thoai-may-tinh-1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        h1{
            position: absolute;
            width: 358px;
            height: 48px;
            left: 650px;
            top: 66px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 40px;
            line-height: 48px;
        }

        .formCreate{
            position: absolute;
            top: 150px;
            left: 30px;
        }
    </style>
</head>
<body>
<h1 > Tạo khách hàng </h1>
<form class="formCreate" action="/admin/saveCustomer" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="customerName"> <p>Tên khách hàng </p> </label>
    <br>
    <input class="form-control" type="text"  id="customerName" name="customerName" required>
    <br>
    <label for="customerAddress"> <p>Địa chỉ</p></label>
    <br>
    <input class="form-control" type="text" id="customerAddress" name="customerAddress" required>
    <br>
    <label for="customerPhone"><p>Số điện thoại </p> </label>
    <br>
    <input class="form-control" type="text" id="customerPhone" name="customerPhone" required>
    <br>
    <label for="customerEmail"><p>Email </p> </label>
    <br>
    <input class="form-control" type="text" id="customerEmail" name="customerEmail" required>
    <br>
    <label for="customerPass"><p>Password </p> </label>
    <br>
    <input class="form-control" type="text" id="customerPass" name="customerPass" required>
    <br>
    <br>
    <button type="submit" name="submit" style="width: 180px" class="btn btn-info">Thêm khách hàng</button>
    <br>
</form>
</body>
</html>
