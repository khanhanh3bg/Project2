
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
<h1 > Sửa đơn hàng </h1>
<?php
//foreach ($array['orders'] as $order){
//    ?><!---->

<form class="formCreate" action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<!----><!----><?php //= $order['ID_order'] ?><!----><!---->">
    <label for="customerName"> <p>Tên khách hàng </p> </label>
    <br>
    <select id="customerName" class="from-control" name="customerName" required>
{{--            <?php--}}
{{--        foreach ($array['customers'] as $customer){--}}
{{--            ?>--}}
{{--        <option value="<?= $customer['ID_customer'] ?>"> <?= $customer['Customer_name'] ?> </option>--}}
{{--            <?php--}}
{{--        }--}}
{{--            ?>--}}
    </select>
    <br>
    <label for="staffName"> <p>Nhân viên </p> </label>
    <br>
    <select id="staffName" class="from-control" name="staffName" required>
{{--            <?php--}}
{{--        foreach ($array['staffs'] as $staff){--}}
{{--            ?>--}}
{{--        <option value="<?= $staff['ID_staff'] ?>"> <?= $staff['Staff_name'] ?> </option>--}}
{{--            <?php--}}
{{--        }--}}
{{--            ?>--}}
    </select>
    <br>

    <label for="transportName"> <p>Vận chuyển </p> </label>
    <br>
    <select id="transportName" class="from-control" name="transportName" required>
{{--            <?php--}}
{{--        foreach ($array['transports'] as $transport){--}}
{{--            ?>--}}
{{--        <option value="<?= $transport['ID_transport'] ?>"> <?= $transport['Shipper_name'] ?> </option>--}}
{{--            <?php--}}
{{--        }--}}
{{--            ?>--}}
    </select>
    <br>
    <label for="orderDate"> <p>Ngày đặt</p></label>
    <br>
    <input type="date" value="<!----><?php //= $order['Order_date'] ?><!---->" id="orderDate" name="orderDate" required>
    <br>
    <label for="orderStatus"><p>Tình trạng </p> </label>
    <br>
    <input type="radio" name="orderStatus" value="0" checked> Pending
    <input type="radio" name="orderStatus" value="1">
{{--            <?php--}}
{{--        if($order['Order_status'] == 1){--}}
{{--            echo 'checked';--}}
{{--        }--}}
{{--        ?>--}}
{{--    > Success--}}
    <br>
    <br>
    <button type="submit" name="submit" style="width: 150px" class="btn btn-info">Sửa đơn hàng</button>
    <br>
</form>
    <?php
}
?>
</body>
</html>
