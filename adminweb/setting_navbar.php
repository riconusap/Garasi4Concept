            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">

                  <li><a href="index.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
                  </li>

                  <li><a href="index.php?page=tampil_produk"><i class="fa fa-shopping-cart"></i> Product <span class="fa fa-chevron"></span></a>
                  </li>

                  <li><a href="index.php?page=tampil_galeri"><i class="fa fa-photo"></i> Galeri <span class="fa fa-chevron"></span></a>
                  </li>

                  <li><a href="index.php?page=tampil_team"><i class="fa fa-group"></i> Team <span class="fa fa-chevron"></span></a>
                  </li>

                  <?php
                  $navbar_superadmin = '<li><a href="index.php?page=tampil_admin"><i class="fa fa-user-plus"></i> Admin <span class="fa fa-chevron"></span></a>
                  </li>';
                  if (isset($_SESSION['data_admin_super'])) {
                    echo $navbar_superadmin;
                  }
                  ?>

                  <li><a href="index.php?page=edit_setting&id=1"><i class="fa fa-gear"></i> Setting <span class="fa fa-chevron"></span></a>
                  </li>

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->