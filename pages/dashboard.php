     <?php
        //  session_start();
        //  var_dump($_SESSION) and die();
        if (!isset($_SESSION["username"])) {
            header("location: /index.php?page=login");
        }
        ?>
     <!-- Main Content -->
     <div class="main-content">
         <section class="section">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <h4>Home</h4>
                         </div>
                         <div class="card-body">
                             <?php if ($_SESSION["level"] == "admin") {

                                 include __DIR__ . "/../pages/admin/index.php";
                                } else {
                                    include __DIR__ . "/../pages/user/index.php";
                                }
                                ?>
                         </div>
                     </div>
                 </div>
             </div>

         </section>
     </div>