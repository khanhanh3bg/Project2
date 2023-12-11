@php use Illuminate\Support\Facades\Auth; @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="../css/styleHome.css" rel="stylesheet">
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

            @auth
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
            @endauth
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

<div class="slideshow-container">
    <div class="mySlides fade">
        <img src="../../image/banner1.png" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="../../image/banner2.png" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="../../image/banner3.png" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="../../image/banner4.png" style="width:100%">
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<div class="div5">
    <h2>Sản Phẩm Khuyến Mãi</h2>
    <br>
    <br>
    <br>
    <br>
    <br>
    <ul class="listProduct">
        @foreach($products1 as $product1)
            <input type="hidden" value="{{$id = $product1->id}}">

            <li class="product">
                <a href="/user/productDetail/{{$id}}">
                    <img class="imageProduct" src="../../{{$product1->Product_image}}">
                    <br>
                </a>

                <a href="/user/productDetail/{{$id}}" class="nameProduct">
                    {{$product1->Product_name}}
                </a>
                <p class="price"> {{number_format($product1->Product_price)}} VNĐ </p>

                @auth
                    <a onclick="return addCart()" href="/user/add_cart/{{$product1->id}}" type="button" class="btn btn-danger" >Thêm vào giỏ hàng</a>
                @else
                    <a onclick="return login()" href="/user/login" type="button" class="btn btn-danger" >Thêm vào giỏ hàng</a>
                @endauth
            </li>
        @endforeach
    </ul>
</div>

<div class="div5">
    <h2 class="dior">Quà Tặng Bạn Gái</h2>
    <ul class="listProduct">
        @foreach($products2 as $product2)
            <input type="hidden" value="{{$id = $product2->id}}">
            <li class="product1">
                <a href="/user/productDetail/{{$id}}">
                    <img class="imageProduct" src="../../{{$product2->Product_image}}">
                    <br>
                </a>

                <a href="/user/productDetail/{{$id}}" class="nameProduct">
                    {{$product2->Product_name}}
                </a>
                <p class="price"> {{number_format($product2->Product_price)}} VNĐ </p>

                @auth
                    <a onclick="return addCart()" href="/user/add_cart/{{$product2->id}}" type="button" class="btn btn-danger" >Thêm vào giỏ hàng</a>
                @else
                    <a onclick="return login()" href="/user/login" type="button" class="btn btn-danger" >Thêm vào giỏ hàng</a>
                @endauth
            </li>
        @endforeach
    </ul>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="div6">
    <img class="img2" src="../../image/bannerEnd.png">
</div>

<br>

<div class="div7">
    <table>
        <tr>
            <td>
                <img src="https://lisa.vn/wp-content/uploads/2020/06/product-shipping.png">
            </td>

            <td>
                <b>Miễn phí Ship</b>
                <p>Đối với đơn hàng trên 800k</p>
            </td>

            <td>
                <img src="https://lisa.vn/wp-content/uploads/2020/06/product-baohanh.png">
            </td>

            <td>
                <b>Charmant cam kết</b>
                <p>Sản phẩm chính hãng 100%</p>
            </td>

            <td>
                <img src="https://lisa.vn/wp-content/uploads/2020/06/product-installment.png">
            </td>

            <td>
                <b>Hoàn tiền 111%</b>
                <p>Nếu phát hiện hàng giả</p>
            </td>
        </tr>
    </table>

</div>

<div class="div4">
    <table>
        <tr>
            <td class="footer1">
                <h3><b>Về Charmant Shop</b></h3>
                <br>
                <p><b>Charmant Shop</b> là cửa hàng chuyên cung cấp các sản phẩm quà tặng, mỹ phẩm, sản phẩm làm đẹp,
                    hàng hiệu chính hãng, của các thương hiệu nổi tiếng trên thế giới.</p>
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
    <div class="bg-dark text-center text-light div8">
        <p>@ Chartmant Shop</p>
    </div>
</div>

<br>
<br>
<br>
<br>

<script>
    var slideIndex = 0;
    showSlides();

    // Next/previous controls
    function plusSlides(n) {
        showSlides2(slideIndex += n);
    }

    function showSlides2(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");

        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        slides[slideIndex - 1].style.display = "block";
    }

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 2000);
    }

    function addCart() {
        return alert('Đã thêm sản phẩm vào giỏ hàng!');
    }

    function login() {
        return alert('Vui lòng đăng nhập để tiếp tục!');
    }
</script>
</body>
</html>
