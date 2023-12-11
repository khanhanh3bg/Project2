
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        html{
            height: 100%;
        }
        body{
            height: 100vh;
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
            top: 170px;
        }

        .div2{
            position: relative;
            width: 50%;
            height: 40px;
            left: 325px;
            top: 0px;
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
            top: 50px;
        }

        .form-control{
            position: relative;
            width: 15%;
            top: 20px;
        }

        .btn_update{
            position: relative;
            top: 30px;
            left: 840px;
        }

        .btn_delete{
            position: relative;
            top: -73px;
            left: 1140px;
        }

        .form_order{
            position: relative;
            top: -50px;
        }

        .button{
            width: 35px;
            border-radius: 5px ;
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

    <form action="/admin/logout" method="get" id="logout" >
        <button name="submit" class="btn btn-secondary btn-lg btn-block" type="submit">Đăng xuất</button>
    </form>
    <h1> Giỏ hàng</h1>
    <form action="/admin/productList" method="get" >
        <button type="submit" name="submit" style="width: 150px" class="btn btn-info">Sản phẩm</button>
    </form>
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
                <th>Sản Phẩm</th>
                <th>Giá </th>
                <th style="width: 130px">Số lượng</th>
                <th>Tổng giá</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $total = 0;
            if(isset($carts)){
            foreach ($carts as $id => $value){
                $total += $value['price'] * $value['quantity'];
                ?>
            <td>
                {{$id}}
            </td>
            <td>
                <img src="../../{{$value['image']}}">
                <br>
                   <b>{{$value['name'] }} </b>
            </td>
            <td>
                {{ number_format($value['price']) }} VNĐ
            </td>
            <td>
                <form action="/admin/updateCart/{{$id}}" class="d-flex">
                    <button type="submit" value="1" name="button" class="button">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                    <input class="form-control" style="width: 50px; top: 1px" type="number" min="1"  value="{{$value['quantity']}}" disabled>
                    <button type="submit" value="2" name="button" class="button">
                        <i class="fa-regular fa-plus"></i>
                    </button>
                </form>
            </td>

            <td>
                {{number_format($value['price'] * $value['quantity'])}} VNĐ
            </td>
            <td>
                <a onsubmit='return confirmDelete()' href='/admin/deleteCart/{{$id}}' class='btn btn-warning'>Xóa sản phẩm</a>
            </td>
            </tr>
                <?php
            }
            }
            ?>
            </tbody>
        </table>
        <br>
    <br>
    <br>
    <div class="col-md-12">
        <h3>Tổng Giá Trị Đơn Hàng: {{number_format($total)}} VNĐ </h3>
    </div>
    <br>
    <a class="btn btn-danger btn_delete" href="/admin/deleteAllCart">Xóa giỏ hàng</a>
    <form method="post" action="/admin/storeOrder" class="form_order">
        @csrf
        Khách hàng: <select name="user" class="form-control" name="customer_id">
            @foreach ($customers as $customer){

            <option  value="{{$customer->id}}">
                    {{$customer->name}}
            </option>
            @endforeach
        </select>
        <br>
        Vận chuyển: <select name="transport" class="form-control" name="transport_id">
            @foreach ($transports as $transport){

            <option value="{{$transport->id}}">
                    {{$transport->Shipper_name}}
            </option>
            @endforeach
        </select>
        <br>
        <button class="btn btn-info">Order</button>
    </form>
    <script>
        function confirmDelete(){
            return confirm('Bạn muốn xóa sản phẩm không?');
        }

        function confirmUpdate(){
            return confirm('Cập nhật thành công!');
        }
    </script>
</div>

</body>
</html>
