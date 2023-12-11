<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <style>
        html {
            height: 100%;
        }

        body {
            height: 100vh;
            background-image: url('https://sacbaongoc.net/wp-content/uploads/2022/08/300-hinh-anh-bau-troi-dep-lam-hinh-nen-dien-thoai-may-tinh-1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .logo {
            position: absolute;
            width: 80px;
            height: 100px;
            left: 665px;
            top: 30px;
        }

        .nameShop {
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

        .nameShop1 {
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

        h1 {
            position: relative;
            color: white;
            text-align: center;
            top: 205px;
        }

        .div2 {
            position: relative;
            width: 50%;
            height: 40px;
            left: 325px;
            top: 40px;
            background: #f2f2f2;
            border: black 0.5px solid;
            border-radius: 5px;
        }

        .customer {
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

        .product {
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

        .order {
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

        .cart {
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

        #logout {
            position: absolute;
            width: 130px;
            left: 1180px;
        }

        .container {
            position: relative;
        }

        #productsTable {
            position: relative;
            top: 100px;
        }
    </style>
</head>
<body>
<div class="div1">
    <table>
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

    <form action="/admin/logout" method="get" id="logout">
        <button name="submit" class="btn btn-secondary btn-lg btn-block" type="submit">Đăng xuất</button>
    </form>
    <h1> Đơn hàng</h1>
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
            <th>Khách hàng</th>
            <th>Số điện thoại</th>
            <th>Ngày đặt</th>
            <th>Tình trạng</th>
            <th>Vận chuyển</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
             <tr>
             <td> {{$order->id}} </td>;
             <td>
             <b> {{$order->name}} </b>
             </td>
             <td> {{$order->phone}} </td>
             <td> {{$order->Order_date}}  </td>
            <td>
                <form method="get" action="/admin/updateStatus/{{$order->id}}">
                    @csrf
                    <select class="from-control" name="status" >
                        <option value=" {{$order->Order_status}}">
                            @if($order->Order_status == 1)
                            Pending
                            @elseif($order->Order_status == 0)
                                Success
                            @elseif($order->Order_status == 2)
                                Cancel
                            @endif
                        </option>

                        <option value=" {{$order->Order_status = 1 }}" class='form-control'>Pending</option>
                        <option value=" {{$order->Order_status = 0}} " class='form-control'>Success</option>
                        <option value=" {{$order->Order_status = 2}} " class='form-control'>Cancel</option>
                    </select>
                    <button class="btn btn-primary" type="submit">Update</button>
                </form>
            </td>
                 <td> {{$order->Shipper_name}} </td>
             <td>

             <br>
             <a href='/admin/orderDetail/{{$order->id}}' class='btn btn-warning'>Chi tiết</a>
             </td>
             </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>

    {{$orders->links()}}
    <script>
        function confirmDelete() {
            return confirm('Bạn muốn xóa sản phẩm không?');
        }
    </script>
</div>

</body>
</html>
