<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <style>
        html{
            height: 100%;
        }
        body{
            height: 1350px;
            background-image: url('https://sacbaongoc.net/wp-content/uploads/2022/08/300-hinh-anh-bau-troi-dep-lam-hinh-nen-dien-thoai-may-tinh-1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .logo{
            position: absolute;
            width: 80px;
            height: 100px;
            left: 665px;
            top: 30px;
        }

        .nameShop{
            position: absolute;
            width: 237px;
            height: 46px;
            left: 730px;
            top: 27px;
            font-family: 'SeoulHangang CB';
            font-style: normal;
            font-weight: 400;
            font-size: 36px;
            line-height: 36px;
            color: #000000;
        }

        .nameShop1{
            position: absolute;
            width: 106px;
            height: 6px;
            left: 735px;
            top: 60px;
            font-family: 'Syne Tactile';
            font-style: normal;
            font-weight: 400;
            font-size: 23px;
            line-height: 36px;
            color: #D9D9D9;
        }
        h1{
            position: relative;
            color: white;
            text-align: center;
            top: 180px;
        }

        .div2{
            position: relative;
            width: 50%;
            height: 40px;
            left: 325px;
            top: 40px;
            background: #f2f2f2;
            border: black 0.5px solid;
            border-radius: 5px;
        }

        .customer{
            text-decoration: none;
            position: absolute;
            width: 214px;
            height: 13px;
            left: 50px;
            top: 7px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 26px;
            line-height: 31px;
            color: #000000;
        }

        .product{
            text-decoration: none;
            position: absolute;
            width: 214px;
            height: 13px;
            left: 200px;
            top: 7px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 26px;
            line-height: 31px;
            color: #000000;
        }

        .order{
            text-decoration: none;
            position: absolute;
            width: 214px;
            height: 13px;
            left: 350px;
            top: 7px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 26px;
            line-height: 31px;
            color: #000000;
        }

        .cart{
            text-decoration: none;
            position: absolute;
            width: 214px;
            height: 13px;
            left: 500px;
            top: 7px;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 26px;
            line-height: 31px;
            color: #000000;
        }

        #logout{
            position: absolute;
            width: 130px;
            left: 1180px;
        }

        .container{
            position: relative;
        }

        #productsTable{
            position: relative;
            top: 100px;
        }
    </style>
</head>
<body>
<div class="div1">
    <table >
        <tr>
            <td>
                <img class="logo" src="../../image/logo.png">
            </td>
            <td>
                <p class="nameShop">CHARMANT</p>
                <br>
                <p class="nameShop1">DE' PRINCE</p>
            </td>

        </tr>
    </table>
</div>
<div class="container">

    <form action="index.php?controller=staff&action=logout" method="POST" id="logout" >
        <button name="submit" class="btn btn-secondary btn-lg btn-block" type="submit">Đăng xuất</button>
    </form>
    <h1> Chi tiết đơn hàng </h1>
    <br>
    <div class="div2">
        <ul class="menu">
            <a class="customer" href="/admin/customerList">Khách hàng</a>
            <a class="product" href="/admin/productList">Sản phẩm</a>
            <a class="order" href="/admin/orderList">Đơn hàng</a>
            <a class="cart" href="/admin/cart">Giỏ hàng</a>
        </ul>
    </div>
    <br>
    <table id="productsTable" class="table table-border table-hover">
        <thead>
        <tr class="table-primary">
            <th>ID</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $total = 0;
          foreach ($orderDetails as $orderDetail){
            $total += $orderDetail->Quantity * $orderDetail->Price;
            ?>
            <tr>
                <td> {{$orderDetail->ID_order}}  </td>
                <td>
                    <img style="width: 150px" src="../../{{$orderDetail->Product_image}}">
                    <br>
                    <b> {{$orderDetail->Product_name}}</b>
                </td>
                <td>  {{$orderDetail->Quantity}} </td>
                <td>  {{number_format($orderDetail->Price)}} VNĐ </td>
                <td>  {{number_format($orderDetail->Quantity * $orderDetail->Price)}} VNĐ</td>
            </tr>
        <?php
        }
          ?>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="col-md-12">
        <h2>Tổng giá trị đơn hàng: {{number_format($total)}} VNĐ</h2>
    </div>

    <script>
        function confirmDelete(){
            return confirm('Bạn muốn xóa sản phẩm không?');
        }
    </script>
</div>

</body>
</html>
