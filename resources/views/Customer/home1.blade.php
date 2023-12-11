<!DOCTYPE html>
<html>
<head>
    <style>
        /* Thiết lập CSS cho ô */
        .box {
            width: 100px;
            height: 100px;
            background-color: lightgray;
            margin: 10px;
            display: inline-block;
        }

        /* Khi hover vào ô, thêm hiệu ứng bóng đen */
        .box:hover {
            box-shadow: 0 0 10px black; /* Hiệu ứng bóng đen xung quanh ô khi hover vào */
        }
    </style>
</head>
<body>

<div class="box"></div>
<div class="box"></div>
<div class="box"></div>

</body>
</html>
