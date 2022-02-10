<div class="team-boxed" style="background-color: rgb(0,0,0);">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Team </h2>
            <p class="text-center">You can contact our team if you need.</p>
        </div>
        <div class="row people">
            <?php
            while ($data = mysqli_fetch_array($hasil_team)) :
            ?>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box"><img style="width:150px; height:150px" class="rounded" src="adminweb/assets/images/team/<?= $data['gambar_team'] ?>" />
                        <h3 class="name"><?= $data['nama_team'] ?></h3>
                        <h4 class="keahlian"><?= $data['keahlian'] ?></h4>
                        <div class="social"><a href="https://www.facebook.com/<?= $data['fb_uname'] ?>"><i class="fa fa-facebook-official fa-2x"></i></a> <a href="https://www.instagram.com/<?= $data['instagram_uname'] ?>"><i class="fa fa-instagram fa-2x"></i></a></div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>