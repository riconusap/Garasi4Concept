<div style="margin: 36px;">
    <h1 class="text-center" style="margin: 0;width: 100%;font-family: 'Alegreya Sans SC', sans-serif;">About Us</h1>
    <div id="div-about">
        <div class="row row-cols-2 d-flex justify-content-center align-items-end align-self-stretch flex-wrap">
            <div class="col-auto text-center d-flex d-xl-flex flex-row flex-grow-1 flex-shrink-1 flex-fill justify-content-between align-items-stretch align-self-center flex-wrap mx-auto justify-content-xl-center align-items-xl-center" style="margin: 10px;">
                <div class="row" style="margin: 10px;">
                    <div class="col" style="margin: 16px;padding: 10px;"><i class="fa fa-envelope-o d-flex flex-fill flex-wrap m-auto justify-content-xl-center align-items-xl-center" style="width: 76px;font-size: 91px;"></i><a href="mailto:<?= $data_setting['email'] ?>" style="font-size: 25px;color: rgb(255,255,255);background-color: rgba(255,255,255,0);font-family: Actor, sans-serif;"><?= $data_setting['email'] ?></a></div>
                </div>
                <div class="row" style="margin: 10px;">
                    <div class="col" style="margin: 16px;padding: 10px;"><i class="fa fa-phone      d-flex flex-fill flex-wrap m-auto justify-content-xl-center align-items-xl-center" style="width: 76px;font-size: 91px;"></i><a href="tel:+<?= $data_setting['no_telp'] ?>" style="font-size: 25px;color: rgb(255,255,255);background-color: rgba(255,255,255,0);font-family: 'Alegreya Sans SC', sans-serif;"><?= $data_setting['no_telp'] ?></a></div>
                </div>
            </div>
        </div>
        <div class="row" id="row-about">
            <div class="col text-center d-flex d-xl-flex flex-column justify-content-xl-center align-items-xl-center" style="margin: 36px;"><i class="fa fa-map-marker" style="font-size: 100px;"></i>
                <p style="font-family: Actor, sans-serif;">Our Store</p>
            </div>
            <div class="col"><iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDfOAzsXkiU9PcYKvYFG3_3iqxN-xozDNA&amp;q=place_id:<?= $data_setting['maps'] ?>&amp;zoom=11" width="100%" height="400"></iframe></div>
        </div>
    </div>
</div>