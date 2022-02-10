<div id="w_shop_105" class="carousel slide w_shop_105_indicators thumb_scroll_x swipe_x ps_easeOutInCubic" data-ride="carousel" data-pause="hover" data-interval="8000" data-duration="2000">
    <!-- Start: Header of Slider -->
    <div class="w_shop_105_main_header">
        <h1><span><strong>featured</strong></span><span><strong>PRODUCT</strong></span></h1>
    </div>
    <!-- End: Header of Slider -->
    <!-- Start: Indicators -->
    <ol class="carousel-indicators">

        <?php
        $i = 0;
        foreach ($hasil_produk as $row) {
            $actives = "";
            if ($i == 0) {
                $actives = "active";
            }
        ?>

            <li class="<?= $actives ?>" data-target="#w_shop_105" data-slide-to="<?= $i ?>" style="filter: blur(0px);"></li>
        <?php $i++;
        } ?>
    </ol>>

    <!-- End: Indicators -->
    <!-- Start: Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">
        <!-- Start: 1st Slide -->
        <?php
        $link_wa = 'https://wa.me/' . $data_setting['no_telp'] . '?text=Saya%20tertarik%20dengan%20Produk%20Anda%20yang%20dijual';
        $i = 0;
        foreach ($hasil_produk as $data) {
            $actives = "";
            if ($i == 0) {
                $actives = "active";
            }
        ?>
            <div class="carousel-item <?= $actives ?>"><img class="img-fluid shadow" src="adminweb/assets/images/product/<?= $data['gambar_produk'] ?>" alt="" loading="lazy">
                <!-- Start: Left Box -->
                <div class="w_shop_105_left_box"><span data-animation="animated fadeInLeft" style="font-family: roboto;"><?= $data['harga'] ?></span>
                    <h1 class="left-h" data-animation="animated fadeInLeft"><?= $data['nama_produk'] ?></h1>
                    <p data-animation="animated fadeInLeft"><?= $data['keterangan_produk'] ?></p><a target="_blank" data-animation="animated fadeInLeft" style="width: 131px;" href="<?php echo $link_wa ?>">Hubungi Kami</a>
                </div>
                <!-- End: Left Box -->
                <!-- Start: Right Box -->
                <div class="w_shop_105_right_box" data-animation="animated fadeInRight">
                    <ul>
                        <li data-animation="animated fadeInRight">some features</li>
                        <li data-animation="animated fadeInRight"><?= $data['spesifikasi'] ?></li>
                    </ul>
                </div>
                <!-- End: Right Box -->
            </div>
        <?php $i++;
        } ?>
        <!-- End: 1st Slide -->
    </div>
    <!-- End: Wrapper For Slides -->
</div>