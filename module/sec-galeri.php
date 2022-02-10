       <div id="galery" class="photo-gallery" style="background-color: rgb(0,0,0);">
           <div class="container">
               <div class="intro">
                   <h2 style="color: white;" class="text-center">Royal Enfield Gallery</h2>
               </div>
               <div class="row photos">
                   <?php
                    while ($data = mysqli_fetch_array($hasil_galeri)) :
                    ?>
                       <div class="col-sm-6 col-md-4 col-lg-3 item"><a data-lightbox="photos" href="adminweb/assets/images/galeri/<?= $data['nama_gambar'] ?>"><img class="img-fluid" src="adminweb/assets/images/galeri/<?= $data['nama_gambar'] ?>" /></a>
                           <P style="text-align: center;margin: 16px;"><?= $data['judul'] ?></P>
                       </div>
                   <?php endwhile; ?>
               </div>
           </div>
       </div>