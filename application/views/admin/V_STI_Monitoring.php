<?php 
//get username dan level dari session
$username = $this->session->userdata('username');
$level = $this->session->userdata('level');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Monitoring
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url()?>/assets/admin/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url()?>/assets/admin/demo/demo.css" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="<?php echo base_url()?>/assets/admin/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" class="simple-text logo-normal">
          TEAM STI 
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('/adminSTI/dashboard')?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">content_paste</i>
                  <span class="notification">Input Data</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?= base_url('/unitLV1/viewUnitLV1'); ?>">Unit LV1</a>
                  <a class="dropdown-item" href="<?= base_url('/unitLV2/viewUnitLV2'); ?>">Unit LV2</a>
                  <a class="dropdown-item" href="<?= base_url('/unitLV3/viewUnitLV3'); ?>">Unit LV3</a>
                  <a class="dropdown-item "href="<?= base_url('/unitLV4/viewUnitLV4'); ?>">Unit LV4</a>
                </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-wrench" aria-hidden="true"></i>
                  <span class="notification">Kategori Alat</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?= base_url('/kategoriAlat/viewKategori'); ?>">Alat</a>
                  <a class="dropdown-item" href="<?= base_url('/merkAlat/viewMerk'); ?>">Merk Alat</a>
                  <a class="dropdown-item" href="<?= base_url('/typeAlat/viewType'); ?>">Type Alat</a>
                </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('/monitoringSTI/viewMonitoring'); ?>">
              <i class="fa fa-television"></i>
              <p>View</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('/topologiSTI/viewTopologi'); ?>">
              <i class="fa fa-wifi" aria-hidden="true"></i>
              <p>Topologi</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('/kegiatanSTI/viewKegiatan'); ?>">
              <i class="fa fa-sticky-note" aria-hidden="true"></i>
              <p>Kegiatan</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('/TransaksiAset/viewTransaksiAset'); ?>">
              <i class="fa fa-suitcase" aria-hidden="true"></i>
              <p>Transaksi Aset</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('/link/viewLink'); ?>">
              <i class="fa fa-external-link" aria-hidden="true"></i>
              <p>Link</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('/TransaksiLink/viewTransaksiLink'); ?>">
              <i class="fa fa-share" aria-hidden="true"></i>
              <p>Tranksaksi Link</p>
            </a>
          </li>
          <li class="nav-item ">
            <?php if ($level == 'superadmin') { ?>
            <a class="nav-link" href="<?= base_url('/adminSTI/controlAdmin'); ?>">
              <i class="fa fa-address-card-o" aria-hidden="true"></i>
              <p>Control Admin</p>
            </a>
            <?php } ?>
          </li>

          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="javascript:void(0)" target="_self"
                    onclick="autoOpenAlink('<?= base_url('/LoginSTI/logout'); ?>')">Sing Out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                
                <div class="card-body">
                  <div class="table-responsive">
                    <div id="popup1" class="overlay">
                      <div class="popup">
                        <h2>Edit Data</h2>
                        <a class="close" href="#">&times;</a>
                        <div class="content">
                        <div name='formUPDATE'>
                            <?php echo form_open('monitoringSTI/updateIPAddressAction'); ?>
                                <label class="bmd-label-floating" for="ipAddress">IP Address</label>
                                <input style="color: blue;" class="form-control" type="text" name="ipAddress" id="ipAddress">
                                <?= form_error('ipAddress'); ?>
                                <input type="hidden" name="oldIPAddress" id="oldIPAddress">
                                
                                <br>
                                <button class="btn btn-warning" type="submit">Update</button>
                            <?php echo form_close(); ?>
                        </div>
                        </div>
                      </div>
                    </div>  

                    <div name="formADD">
                        <?php echo form_open('monitoringSTI/addIPAddressAction'); ?>
                            <label class="bmd-label-floating" for="ipAddress">IP Address</label>
                            <input class="form-control" type="text" name="ipAddress" id="ipAddress">
                            <?= form_error('ipAddress'); ?>
                            <br>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        <?php echo form_close(); ?>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table" style="width: 100%;">
                      <thead class="text-primary">
                        <tr>
                            <th>No</th>
                            <th>IP Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                            <?php foreach($ipAddress as $ip) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    
                                    
                                    
                                    <td><?= $ip->ipAddress; ?></td>
                                    <td>
                                        <?php 
                                        //test ping every ip address in database and show status
                                        $ping = exec("ping -n 1 $ip->ipAddress", $output, $status);
                                        if($status == 0){
                                            //set color of status
                                            echo "<span style='color: green;'>";
                                            echo "ONLINE";
                                        }else{
                                            echo "<span style='color: red;'>";
                                            echo "OFFLINE";
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <a class="btn btn-primary" href="#popup1" name="edit">Edit</a>
                                        <a class="btn btn-alert" href="<?= base_url(); ?>monitoringSTI/deleteIPAddressAction/<?= $ip->ipAddress; ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right" id="date">
            , made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">MAMHENIM</a> for a better web.
          </div>
        </div>
      </footer>
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple active" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="<?php echo base_url()?>/assets/admin/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="<?php echo base_url()?>/assets/admin/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="<?php echo base_url()?>/assets/admin/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="<?php echo base_url()?>/assets/admin/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url()?>/assets/admin/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url()?>/assets/admin/js/core/popper.min.js"></script>
  <script src="<?php echo base_url()?>/assets/admin/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="<?php echo base_url()?>/assets/admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url()?>/assets/admin/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url()?>/assets/admin/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url()?>/assets/admin/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url()?>/assets/admin/demo/demo.js"></script>
  <script>
    const autoOpenAlink = (url = ``) => {
        window.open(url, "open testing page in a same tab page");
    }
  </script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    //hide form update
    $(document).ready(function(){
        $("div[name='formUPDATE']").hide();
    });

    //if click edit, show form update with data
    $(document).ready(function(){
        $("a[name='edit']").click(function(){
            $("div[name='formADD']").hide();
            $("div[name='formUPDATE']").show();
            //set value of input
            var ip = $(this).parent().parent().find("td:eq(1)").text();
            $("input[name='ipAddress']").val(ip);
            $("input[name='oldIPAddress']").val(ip);
        });
    });

    //after update, hide form update and show form add
    $(document).ready(function(){
        $("button[type='submit']").click(function(){
            $("div[name='formUPDATE']").hide();
            $("div[name='formADD']").show();
        });
    });

    //ping every ip on database and show status 
    $(document).ready(function(){
        var ip = $("td[name='ipAddress']").text();
        var status = "ping " + ip;
        $("td[name='status']").text(status);
    });

    //refresh page every 5 seconds
    $(document).ready(function(){
        setInterval(function(){
            location.reload();
        }, 5000);
    });

    //function PING
</script>
</body>

</html>
