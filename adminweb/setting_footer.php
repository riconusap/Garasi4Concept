        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright @ 2020 Garasi4Concept : dikadalin
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo $hostname; ?>assets/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo $hostname; ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo $hostname; ?>assets/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="<?php echo $hostname; ?>assets/nprogress/nprogress.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="<?php echo $hostname; ?>assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo $hostname; ?>assets/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="<?php echo $hostname; ?>assets/skycons/skycons.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="<?php echo $hostname; ?>assets/js/custom.min.js"></script>
        <script>
          $("#fileUpload").on('change', function() {

            //Get count of selected files
            var countFiles = $(this)[0].files.length;

            var imgPath = $(this)[0].value;
            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            var image_holder = $("#image-holder");
            image_holder.empty();

            if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
              if (typeof(FileReader) != "undefined") {

                //loop for each file selected for uploaded.
                for (var i = 0; i < countFiles; i++) {

                  var reader = new FileReader();
                  reader.onload = function(e) {
                    $("<img />", {
                      "id": "tumbimage",
                      "src": e.target.result,
                      "class": "thumb-image"
                    }).appendTo(image_holder);
                  }
                  image_holder.show();
                  reader.readAsDataURL($(this)[0].files[i]);
                }

              } else {
                alert("This browser does not support FileReader.");
              }
            } else {
              alert("Pls select only images");
            }
          });
        </script>
        </body>

        </html>