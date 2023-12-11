
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
<h1 > Tạo sản phẩm </h1>
<form class="formCreate" onsubmit="return alertAdd()" action="/admin/saveProduct" method="POST" enctype="multipart/form-data">
    @csrf
    <label  for="productName"> <p>Tên sản phẩm </p> </label>
    <input class="form-control" type="text" id="productName" name="productName" required>
    <br>
    <label  for="productPrice"> <p>Mức giá</p></label>
    <input class="form-control" type="number" id="productPrice" name="productPrice" required>
    <br>
    <label  for="productBrand"><p>Thương hiệu: </p> </label>

    <select id="productBrand" class="form-select" name="productBrand" required>
        <?php
        foreach ($brands as $brand){
            ?>
        <option value="{{$brand->id}}"> {{$brand->Brand_name}}  </option>
            <?php
        }
        ?>
    </select>

    <br>
    <label  for="productQuantity"> <p>Số lượng</p></label>
    <input class="form-control" type="number" id="productQuantity" name="productQuantity" required>
    <br>
    <label  for="productDescription"><p>Mô tả sản phẩm:</p></label>
    <textarea class="form-control" rows="3" type="text"  id="productDescription" name="productDescription" required></textarea>
    <br>
    <label  for="productImage"><p>Hình ảnh:</p></label>
    <input  class="form-control" type="File" id="productImage" name="imageFile" required accept="image/*"/>
    <br>
    <button type="submit" name="submit" style="width: 150px" class="btn btn-info">Thêm sản phẩm</button>
    <br>
    <br>
</form>

<script>
    function alertAdd(){
        return alert("Tạo sản phẩm thành công!");
    }
</script>
</body>
</html>
