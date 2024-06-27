<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- CSS -->
    <link href=<?php echo _DIR_['CSS']['USERS'] . 'header.css' ?> rel="stylesheet" />
    <link href=<?php echo _DIR_['CSS']['USERS'] . 'makeup.css' ?> rel="stylesheet" />
</head>

<body>
    <!-- Product Section -->
    <section class="product new_arrivals_area section_padding_100_0 clearfix" id="product">
        <!-- Tiều đề -->
        <h1 class="heading"> <span>Sản</span> phẩm</h1>
        <?php
        $loaisanphams = DP::run_query("SELECT * FROM loaisanphams WHERE da_xoa = 0", [], 2);
        ?>
        <div class="karl-projects-menu mb-100">
            <div class="text-center portfolio-menu">
                <?php
                foreach ($loaisanphams as $loaisanpham) {
                ?>
                    <button href="#" class="btn active" data-filter=".<?= $loaisanpham["id"]; ?>a"><?= $loaisanpham["ten_loai_san_pham"]; ?></button>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- /Tiều đề -->

        <!-- Sản phẩm -->
        <div class="container">
            <div class="row shop_wrapper">
                <?php
                    foreach ($loaisanphams as $loaisanpham) {
                        $sanphams = DP::run_query("SELECT * FROM sanphams WHERE sanphams.loai_san_pham_id = ?", [$loaisanpham["id"]], 2);
                        
                        foreach($sanphams as $sanpham) {
                ?>
                            <!-- Single gallery Item Start -->
                            <div class="col-lg-3 col-md-4 col-12 <?php echo $loaisanpham["id"];?>a wow fadeInUpBig" data-wow-delay="0.2s">
                                    <!-- Product Image -->
                                    <article class="single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a 
                                                    data-id="<?php echo $sanpham["id"];?>" 
                                                    data-name="<?php echo $sanpham["ten_san_pham"];?>" 
                                                    data-count="<?php echo $sanpham["so_luong"];?>"
                                                    data-price="<?php echo $sanpham["don_gia"];?>"
                                                    data-img="<?php echo $sanpham["hinh_anh"];?>"
                                                    class="btn-xem-chi-tiet-sp"sclass="primary_img">
                                                    <img src=<?php echo 'admin/'._DIR_['IMG']['ADMINS'].'product/'.$sanpham["hinh_anh"];?> alt="" />
                                                    <span style="font-size:12px;">Xem chi tiết</span>
                                                    <p id="mo-ta-sp<?php echo $sanpham["id"];?>" style="display:none;"><?php echo $sanpham["mo_ta_san_pham"];?></p>
                                                </a>
                                                <div class="label_product">
                                                    <span class="label_sale">SALE</span>
                                                </div>
                                                <div class="add_to_cart">
                                                    <form id="form-sp-<?php echo $sanpham["id"]?>" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ;?>" method="post">
                                                        <input type="hidden" name="name" value="<?php echo $sanpham["ten_san_pham"];?>">
                                                        <div class="form-group" style="font-size: 10px;">
                                                            <label for="number">Số lượng: </label>
                                                            <input type="number" min="1" max="<?php echo $sanpham["so_luong"];?>" name="count" value="1">
                                                        </div>
                                                        <input type="hidden" name="price" value="<?php echo $sanpham["don_gia"];?>">
                                                        <input type="hidden" name="image" value="<?php echo $sanpham["hinh_anh"];?>">
                                                        <input type="hidden" name="id_san_pham" value="<?php echo $sanpham["id"];?>">
                                                        <a data-id="<?php echo $sanpham["id"]?>" type="submit" class="them-pt-gio-hang btn add-to-cart-btn" title="add_to_cart">Thêm vào giỏ hàng</a>
                                                    </form>
                                                </div>
                                                <div class="product_content grid_content">
                                                    <div class="price_box">
                                                        <span class="old_price"><?php echo 200000+$sanpham["don_gia"];?> đ</span>
                                                        <span class="current_price"><?php echo $sanpham["don_gia"];?> đ</span>
                                                    </div>
                                                    <h3 class="product_name grid_name"><a><?php echo $sanpham["ten_san_pham"];?></a></h3>
                                                </div>
                                            </div>
                                        </figure>
                                    </article>
                                </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
        <!-- /Sản phẩm -->
    </section>
    <!-- Product Section End -->
</body>