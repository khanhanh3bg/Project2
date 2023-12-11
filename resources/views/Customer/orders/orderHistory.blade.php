<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../../css/styleHome.css" rel="stylesheet">

    <style>
        body{
            height: 1150px;
        }
        .btn_delete{
            position: relative;
            top: -73px;
            left: 1270px;
        }

        .form_order{
            position: relative;
            top: -50px;
        }

        h1{
            position: relative;
            color: black;
            text-align: center;
        }

        .btn-info{
            position: relative;
            left: 40px;
        }
    </style>
    <title>Home</title>
</head>
<body>

<div class="bg-dark text-center text-light div9">
    <p>Charmant Shop - Hệ thống bán Quà tặng, Mỹ Phẩm, Hàng hiệu chính hãng</p>
</div>

<div class="div1">
    <table>
        <tr>
            <td>
                <form method="get" action="/user/search" class="search">
                    @csrf
                    <input class="form-control" type="text"  placeholder="Nhập từ khóa..." name="search" value="">
                    <button class="btn btn-primary btn-lg btn-block">Search</button>
                </form>
            </td>

            <td>
                <a href="/">
                    <img class="logo" src="../../image/logo.png">
                </a>
            </td>

            <td>
                <a href="/">
                    <p class="nameShop">CHARMANT</p>
                    <br>
                    <p class="nameShop1">DE' PRINCE</p>
                </a>
            </td>

            <td>
                <a href="/user/order">
                    <img class="logoCreate" src="../../image/logoCreate.png">
                </a>
            </td>

            <td>
                <a href="/user/cart">
                    <img class="logoCart" src="../../image/logoCart.png">
                </a>
            </td>

            @auth
                <td>
                    <b><p class="username">Hi {{Auth::user()->name}}</p></b>
                </td>

                <td>
                    <div style="border-top: 1px solid black">
                        <a class="logout" href="/admin/logout">
                            <b>Đăng Xuất</b>
                        </a>
                    </div>
                </td>
            @else
                <td>
                    <a class="login" href="/user/login">
                        <b>ĐĂNG NHẬP</b>
                    </a>
                </td>
            @endauth

        </tr>
    </table>

    <div class="navBar">
        <nav class="navbar navbar-expand-lg bg-light">
            <ul>
                <li>
                    <a href="/">HOME</a>
                </li>

                <li>
                    <a href="">SHOP</a>
                    <ul class="dropdown">
                        <li><a href="/user/brand3">BLACK ROUGE</a></li>
                        <li><a href="/user/brand1">DIOR</a></li>
                        <li><a href="/user/brand2">GUCCI</a></li>
                    </ul>
                </li>

                <li>
                    <a href="">CONTACT</a>
                    <ul class="dropdown">
                        <li><a href="">FACEBOOK</a></li>
                        <li><a href="">INSTAGRAM</a></li>
                    </ul>
                </li>

                <li>
                    <a href="">DISTRIBUTORS</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<br>

<h1>Lịch sử đơn hàng</h1>
<br>

<table id="productsTable" class="table table-border table-hover">
    <thead>
    <tr class="table-primary">
        <th>Địa chỉ</th>
        <th>Số điện thoại </th>
        <th>Ngày đặt</th>
        <th>Tình trạng</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($orders as $order)
        <tr>
            <input type="hidden" value="{{$order->id}}">
            <td>
                <b> {{$order->address}} </b>
            </td>
            <td> {{$order->phone}} </td>
            <td> {{$order->Order_date}}  </td>
            @if($order->Order_status == 1)
                <td>Pending</td>
            @elseif($order->Order_status == 0)
                <td>Success</td>
            @elseif($order->Order_status == 2)
                <td>Cancel</td>
            @endif
            <td>
                <a href='/user/orderDetail/{{$order->id}}' class='btn btn-warning'>Chi tiết</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<br>

{{$orders->links()}}

<div class="div4">
    <table>
        <tr>
            <td class="footer1">
                <h3><b>Về Charmant Shop</b></h3>
                <br>
                <p><b>Charmant Shop</b> là cửa hàng chuyên cung cấp các sản phẩm quà tặng, mỹ phẩm, sản phẩm làm đẹp, hàng hiệu chính hãng, của các thương hiệu nổi tiếng trên thế giới.</p>
                <br>
                <br>
                <p><b>Hotline:</b> 079 313 3888</p>
                <br>
                <p><b>Email:</b> khanhbi345@gmail.com</p>
                <br>
                <p><b>Địa chỉ:</b> T1, Tòa nhà N04B, Khu Ngoại giao đoàn, Bắc Từ Liêm, Hà Nội</p>
            </td>

            <td class="footer2">
                <h3><b>Thông tin cần biết</b></h3>
                <br>
                <p>Giới thiệu về Charmant</p>
                <br>
                <p>Điều khoản & Điều kiện</p>
                <br>
                <p>Chính sách bảo mật</p>
                <br>
                <p>Hướng dẫn mua hàng</p>
                <br>
                <p>Chính sách đổi trả</p>
                <br>
                <p>Giao hàng & thanh toán</p>
            </td>

            <td class="footer3">
                <h3><b>Blog làm đẹp</b></h3>
                <br>
                <p>Top list</p>
                <br>
                <p>Góc Review</p>
                <br>
                <p>Kinh Nghiệm Hay</p>
                <br>
                <p>Blog Quà Tặng</p>
                <br>
                <p></p>
                <br>
                <p></p>
                <br>
                <p></p>
            </td>

            <td class="footer4">
                <h3><b>Follow US</b></h3>
                <br>
                <img class="img1" src="../../image/dathongbaobocongthuong.png">
                <br>
                <img src="../../image/DMCA.png">
                <br>
                <img class="img1" src="../../image/cloudflare.jpg">
                <br>
                <p></p>
                <br>
                <p></p>
                <br>
                <p></p>
                <br>
                <p></p>
                <br>
                <p></p>
                <br>
                <p></p>
            </td>
        </tr>
    </table>
</div>

<script>
    function deleteProduct(){
        return confirm("Bạn có muốn xóa sản phẩm khỏi giỏ hàng?");
    }

    function deleteCart(){
        return confirm("Bạn có muốn xóa sản phẩm khỏi giỏ hàng?");
    }

    function updateQuantity(){
        return alert("Đã cập nhật số lượng sản phẩm!");
    }

    function order(){
        return alert("Đã gửi đơn đặt hàng!");
    }

    function reAmount(){
        return alert("Vui lòng nhập lại số lượng!");
    }
</script>
</body>
</html>
