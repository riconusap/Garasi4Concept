<?php
include "adminweb/koneksi.php";
include "adminweb/sql.php";
$data_setting = mysqli_fetch_assoc($hasil_setting);

?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include('module/module-metatag.php')
    ?>
</head>
<?php
include "adminweb/sql.php";
$data_setting = mysqli_fetch_assoc($hasil_setting);
?>

<body style="background-color: rgb(0,0,0);">
    <section id="header" style="background-image: url(&quot;adminweb/assets/images/setting/<?= $data_setting['gambar2'] ?>&quot;);background-repeat: no-repeat;background-position: top;background-size: cover;margin: auto;padding: auto;">
        <?php
        include('module/sec-header-navbar.php')
        ?>
    </section>
    <section class="d-xl-flex justify-content-xl-center align-items-xl-center" id="home"><iframe class="d-xl-flex justify-content-xl-center align-items-xl-center" allowfullscreen="" frameborder="0" src="<?= $data_setting['yt'] ?>?autoplay=1&amp;mute=1&amp;loop=1&amp;playlist=Oc0-Ndu_rzI&amp;controls=0" data-aos="fade-up" data-aos-duration="3000" data-aos-offset="2" data-aos-delay="50" id="welcome-vid" width="100%" height="720px"></iframe></section>
    <?php
    include('module/sec-perkenalan.php')
    ?>
    <section data-aos="zoom-out-left" data-aos-duration="3000" data-aos-offset="0" id="galery">
        <!-- Start: Lightbox Gallery -->
        <?php
        include('module/sec-galeri.php')
        ?>
        <!-- End: Lightbox Gallery -->
    </section>
    <!-- Start: featured products slider -->
    <section id="product">
        <?php
        include('module/sec-product.php')
        ?>
    </section>
    <!-- End: featured products slider -->
    <section id="team">
        <!-- Start: Team Boxed -->
        <?php
        include('module/sec-team.php')
        ?>
        <!-- End: Team Boxed -->
    </section>
    <section id="about">
        <?php
        include('module/sec-aboutus.php')
        ?>
    </section>

    <!-- Start: Footer with social media icons -->
    <section id="footerpad">
        <?php
        include('module/sec-footer.php')
        ?>
    </section>
    <!-- End: Footer with social media icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/smart-forms.min.js?h=18313f04cea0e078412a028c5361bd4e"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="assets/js/script.min.js?h=a8f59923ed7f2041884b9418b785e145"></script>
</body>

</html>