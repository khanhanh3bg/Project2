
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
            top: 145px;
        }

        .div2{
            position: relative;
            width: 50%;
            height: 40px;
            left: 325px;
            top: -23px;
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

        .search{
            position: absolute;
            top: 30px;
            right: 200px;
        }

        #productsTable{
            position: relative;
            top: 35px;
        }

        .page{
            display: inline-block;
            margin-right: 10px;
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
    <br>

    <form method="get" action="/admin/productList" class="search">
        @csrf
        <input class="form-control" type="text"  placeholder="Nhập từ khóa..." name="search" value="{{$search }}">
        <button class="btn btn-primary btn-lg btn-block">Search</button>
    </form>

    <form action="/admin/logout" method="get" id="logout" >
        <button name="submit" class="btn btn-secondary btn-lg btn-block" type="submit">Đăng xuất</button>
    </form>
    <h1> Sản Phẩm</h1>
    <form action="/admin/addProduct" method="POST" >
        @csrf
        <button type="submit" name="submit" style="width: 150px" class="btn btn-info">Thêm sản phẩm</button>
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
            <th>Sản phẩm </th>
            <th>Thương hiệu </th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
                    @foreach ($products as $product)
                    <tr>
                    <td> {{$product->id}} </td>
                    <td>
                    <img src='../../{{$product->Product_image}}' width='200px'/>
                        <br>
                    <b> {{$product->Product_name}}</b>
                    </td>
                        <?php
                    if($product->ID_brand == 1 ){
                       echo "<td> <p>Dior</p> </td>";
                    }elseif ($product->ID_brand == 2){
                       echo "<td> <p>Gucci</p> </td>";
                    }elseif ($product->ID_brand == 3){
                       echo "<td> <p>Black Rouge</p> </td>" ;
                    }
                    ?>
                    <td> {{$product->Product_price}} VNĐ </td>
                    <td> {{$product->Product_quantity}}</td>
                    <td>  {{$product->Product_description}}  </td>

                    <td>
                        <a href="/admin/deleteProduct/{{ $product->id }}" class='btn btn-danger'>Xóa</a>
                    <br>
                        <br>
                    <a href='/admin/editProduct/{{$product->id}}' class='btn btn-warning'>Cập nhật</a>
                    <br>
                    <br>
                    <a onclick='return alertCart()' href='/admin/add_cart/{{$product->id}}' class='btn btn-primary'>Thêm vào giỏ hàng</a>
                    </td>
                    </tr>
                    @endforeach
        </tbody>
    </table>
    <br>


    {{$products->links()}}

    <script>
        function confirmDelete(){
            return confirm('Bạn muốn xóa sản phẩm không?');
        }

        function alertCart(){
            return alert('Đã thêm sản phẩm vào giỏ hàng');
        }
    </script>
</div>

</body>
</html>
