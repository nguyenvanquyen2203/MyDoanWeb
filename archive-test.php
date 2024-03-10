<!DOCTYPE html>
<html lang="zxx" class="no-js">
  <head>
    <!-- Mobile Specific Meta -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png" />
    <!-- Author Meta -->
    <meta name="author" content="CodePixar" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>Archive</title>

    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Playfair+Display:700,700i"
      rel="stylesheet"
    />
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="css/linearicons.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/nice-select.css" />
    <link rel="stylesheet" href="css/owl.carousel.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="css/main.css" />
  </head>

  <body>

    <!--================ Start Header Area =================-->
    <header class="header-area">
      <div class="container">
        <div class="header-wrap">
          <div
            class="header-top d-flex justify-content-between align-items-lg-center navbar-expand-lg"
          >
            <div class="col menu-left">
              <a class="active" href="index.html">Home</a>
              <a href="category.html">Category</a>
              <a href="archive-test.php">Archive</a>
            </div>
            <div class="col-5 text-lg-center mt-2 mt-lg-0">
              <span class="logo-outer">
                <span class="logo-inner">
                  <a href="index.html"
                    ><img class="mx-auto" src="img/logo.png" alt=""
                  /></a>
                </span>
              </span>
            </div>
            <nav class="col navbar navbar-expand-lg justify-content-end">
              <!-- Toggler/collapsibe Button -->
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#collapsibleNavbar"
              >
                <span class="lnr lnr-menu"></span>
              </button>

              <!-- Navbar links -->
              <div
                class="collapse navbar-collapse menu-right"
                id="collapsibleNavbar"
              >
                <ul class="navbar-nav justify-content-center w-100">
                  <li class="nav-item hide-lg">
                    <a class="nav-link" href="index.html">Home</a>
                  </li>
                  <li class="nav-item hide-lg">
                    <a class="nav-link" href="category.html">Category</a>
                  </li>
                  <!-- Dropdown -->
                  <!-- <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      id="navbardrop"
                      data-toggle="dropdown"
                    >
                      Pages
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="elements.html">Elements</a>
                    </div>
                  </li> -->
                  <li class="nav-item">
                    <a class="nav-link" href="elements.html">Elements</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="blog-single.html">Blog Detail</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!--================ End Header Area =================-->

    <!--================ Start banner Area =================-->
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
      <div class="banner-content text-center">
        <h1>Post Archive</h1>
        <p>Elementum libero hac leo integer. Risus hac parturient feugiat litora <br /> cursus hendrerit bibendum per </p>
      </div>
    </section>
    <!--================ End banner Area =================-->
    
    <?php
    // Nhúng tệp kết nối đến cơ sở dữ liệu
    include 'zmyWorkSpace/myDatabase.php';

    // Thực hiện truy vấn
    //$sql = "SELECT * FROM posts";
    if (isset($_GET['category']))
    $category_active = $_GET['category'];
    else $category_active = 0;
    if ($category_active == 0) {
      $sql = "SELECT 
              posts.id,
              posts.postContentID,
              posts.postTitle,
              posts.postImg,
              posts.date,
              categories.category
              FROM 
                  posts
              INNER JOIN 
                  posttocategories ON posts.id = posttocategories.postid
              INNER JOIN 
                  categories ON posttocategories.categoryID = categories.id";
    }
    else {
      $sql = "SELECT 
              posts.id,
              posts.postContentID,
              posts.postTitle,
              posts.postImg,
              posts.date,
              categories.category
              FROM 
                  posts
              INNER JOIN 
                  posttocategories ON posts.id = posttocategories.postid
              INNER JOIN 
                  categories ON posttocategories.categoryID = categories.id
              WHERE
                  categories.id = $category_active";
    }
    $result = $conn->query($sql);
    $categories_sql = "SELECT * FROM categories";
    $categories_result = $conn->query($categories_sql);
    // Đóng kết nối (nếu cần)
    // $conn->close();
    ?>

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-gap relative">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <!--
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="single-amenities">
                  <div class="amenities-thumb">
                    <img
                      class="img-fluid w-100"
                      src="img/blog-post/blog-post1.jpg"
                      alt=""
                    />
                  </div>
                  <div class="amenities-details">
                    <h5>
                      <a href="#"
                        >There's goting to be a musical about meghan
                      </a>
                    </h5>
                    <div class="amenities-meta mb-10">
                      <a href="#" class=""
                        ><span class="ti-calendar"></span>20th Nov, 2018</a
                      >
                      <a href="#" class="ml-20"
                        ><span class="ti-comment"></span>05</a
                      >
                    </div>
                    <p>
                      Creepeth green light appear let rule only you're divide
                      and lights moving and isn't given creeping deep.
                    </p>

                    <div class="d-flex justify-content-between mt-20">
                      <div>
                        <a href="#" class="blog-post-btn">
                          Read More <span class="ti-arrow-right"></span>
                        </a>
                      </div>
                      <div class="category">
                        <a href="#">
                          <span class="ti-folder mr-1"></span> Travel
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="single-amenities">
                  <div class="amenities-thumb">
                    <img
                      class="img-fluid w-100"
                      src="img/blog-post/blog-post3.jpg"
                      alt=""
                    />
                  </div>
                  <div class="amenities-details">
                    <h5>
                      <a href="#"
                        >Forest responds to consultation smoking in al
                        fresco.</a
                      >
                    </h5>
                    <div class="amenities-meta mb-10">
                      <a href="#" class="">
                        <span class="ti-calendar"></span>20th Nov, 2018
                      </a>
                      <a href="#" class="ml-20">
                        <span class="ti-comment"></span>05
                      </a>
                    </div>
                    <p>
                      Creepeth green light appear let rule only you're divide
                      and lights moving and isn't given creeping deep.
                    </p>

                    <div class="d-flex justify-content-between mt-20">
                      <div>
                        <a href="#" class="blog-post-btn">
                          Read More <span class="ti-arrow-right"></span>
                        </a>
                      </div>
                      <div class="category">
                        <a href="#">
                          <span class="ti-folder mr-1"></span> Travel
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="single-amenities">
                  <div class="amenities-thumb">
                    <img
                      class="img-fluid w-100"
                      src="img/blog-post/blog-post5.jpg"
                      alt=""
                    />
                  </div>
                  <div class="amenities-details">
                    <h5>
                      <a href="#"
                        >There's goting to be a musical about meghan
                      </a>
                    </h5>
                    <div class="amenities-meta mb-10">
                      <a href="#" class=""
                        ><span class="ti-calendar"></span>20th Nov, 2018</a
                      >
                      <a href="#" class="ml-20"
                        ><span class="ti-comment"></span>05</a
                      >
                    </div>
                    <p>
                      Creepeth green light appear let rule only you're divide
                      and lights moving and isn't given creeping deep.
                    </p>

                    <div class="d-flex justify-content-between mt-20">
                      <div>
                        <a href="#" class="blog-post-btn">
                          Read More <span class="ti-arrow-right"></span>
                        </a>
                      </div>
                      <div class="category">
                        <a href="#">
                          <span class="ti-folder mr-1"></span> Travel
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="single-amenities">
                  <div class="amenities-thumb">
                    <img
                      class="img-fluid w-100"
                      src="img/blog-post/blog-post7.jpg"
                      alt=""
                    />
                  </div>
                  <div class="amenities-details">
                    <h5>
                      <a href="#"
                        >Forest responds to consultation smoking in al
                        fresco.</a
                      >
                    </h5>
                    <div class="amenities-meta mb-10">
                      <a href="#" class="">
                        <span class="ti-calendar"></span>20th Nov, 2018
                      </a>
                      <a href="#" class="ml-20">
                        <span class="ti-comment"></span>05
                      </a>
                    </div>
                    <p>
                      Creepeth green light appear let rule only you're divide
                      and lights moving and isn't given creeping deep.
                    </p>

                    <div class="d-flex justify-content-between mt-20">
                      <div>
                        <a href="#" class="blog-post-btn">
                          Read More <span class="ti-arrow-right"></span>
                        </a>
                      </div>
                      <div class="category">
                        <a href="#">
                          <span class="ti-folder mr-1"></span> Travel
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-6">
                <div class="single-amenities">
                  <div class="amenities-thumb">
                    <img
                      class="img-fluid w-100"
                      src="img/blog-post/blog-post2.jpg"
                      alt=""
                    />
                  </div>
                  <div class="amenities-details">
                    <h5>
                      <a href="#"
                        >There's goting to be a musical about meghan
                      </a>
                    </h5>
                    <div class="amenities-meta mb-10">
                      <a href="#" class=""
                        ><span class="ti-calendar"></span>20th Nov, 2018</a
                      >
                      <a href="#" class="ml-20"
                        ><span class="ti-comment"></span>05</a
                      >
                    </div>
                    <p>
                      Creepeth green light appear let rule only you're divide
                      and lights moving and isn't given creeping deep.
                    </p>

                    <div class="d-flex justify-content-between mt-20">
                      <div>
                        <a href="#" class="blog-post-btn">
                          Read More <span class="ti-arrow-right"></span>
                        </a>
                      </div>
                      <div class="category">
                        <a href="#">
                          <span class="ti-folder mr-1"></span> Travel
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="single-amenities">
                  <div class="amenities-thumb">
                    <img
                      class="img-fluid w-100"
                      src="img/blog-post/blog-post4.jpg"
                      alt=""
                    />
                  </div>
                  <div class="amenities-details">
                    <h5>
                      <a href="#"
                        >Forest responds to consultation smoking in al
                        fresco.</a
                      >
                    </h5>
                    <div class="amenities-meta mb-10">
                      <a href="#" class="">
                        <span class="ti-calendar"></span>20th Nov, 2018
                      </a>
                      <a href="#" class="ml-20">
                        <span class="ti-comment"></span>05
                      </a>
                    </div>
                    <p>
                      Creepeth green light appear let rule only you're divide
                      and lights moving and isn't given creeping deep.
                    </p>

                    <div class="d-flex justify-content-between mt-20">
                      <div>
                        <a href="#" class="blog-post-btn">
                          Read More <span class="ti-arrow-right"></span>
                        </a>
                      </div>
                      <div class="category">
                        <a href="#">
                          <span class="ti-folder mr-1"></span> Travel
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="single-amenities">
                  <div class="amenities-thumb">
                    <img
                      class="img-fluid w-100"
                      src="img/blog-post/blog-post6.jpg"
                      alt=""
                    />
                  </div>
                  <div class="amenities-details">
                    <h5>
                      <a href="#"
                        >There's goting to be a musical about meghan
                      </a>
                    </h5>
                    <div class="amenities-meta mb-10">
                      <a href="#" class=""
                        ><span class="ti-calendar"></span>20th Nov, 2018</a
                      >
                      <a href="#" class="ml-20"
                        ><span class="ti-comment"></span>05</a
                      >
                    </div>
                    <p>
                      Creepeth green light appear let rule only you're divide
                      and lights moving and isn't given creeping deep.
                    </p>

                    <div class="d-flex justify-content-between mt-20">
                      <div>
                        <a href="#" class="blog-post-btn">
                          Read More <span class="ti-arrow-right"></span>
                        </a>
                      </div>
                      <div class="category">
                        <a href="#">
                          <span class="ti-folder mr-1"></span> Travel
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="single-amenities">
                  <div class="amenities-thumb">
                    <img
                      class="img-fluid w-100"
                      src="img/blog-post/blog-post8.jpg"
                      alt=""
                    />
                  </div>
                  <div class="amenities-details">
                    <h5>
                      <a href="#"
                        >Forest responds to consultation smoking in al
                        fresco.</a
                      >
                    </h5>
                    <div class="amenities-meta mb-10">
                      <a href="#" class="">
                        <span class="ti-calendar"></span>20th Nov, 2018
                      </a>
                      <a href="#" class="ml-20">
                        <span class="ti-comment"></span>05
                      </a>
                    </div>
                    <p>
                      Creepeth green light appear let rule only you're divide
                      and lights moving and isn't given creeping deep.
                    </p>

                    <div class="d-flex justify-content-between mt-20">
                      <div>
                        <a href="#" class="blog-post-btn">
                          Read More <span class="ti-arrow-right"></span>
                        </a>
                      </div>
                      <div class="category">
                        <a href="#">
                          <span class="ti-folder mr-1"></span> Travel
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            -->
            <div class="row">
                <!-- Start My Posts  -->
                <?php 
                    //Trang hien tai
                    if (isset($_GET['page']))
                    $page_active = $_GET['page'] - 1;
                    else $page_active = 0;
                    for ($i = $page_active * 2; $i < $result->num_rows && $i < $page_active * 2 + 2; $i++) {
                      // Lấy dòng thứ i
                      $result->data_seek($i);
                      $row = $result->fetch_assoc();
                      // Xử lý dữ liệu ở đây, ví dụ:
                      require 'zmyWorkSpace/myPosts.php';
                  }
                ?>
                <!-- End My Posts -->
            </div>
            <div class="row">
              <div class="col-lg-12">
                  <nav class="blog-pagination justify-content-center d-flex">
                      <ul class="pagination">
                          <li class="page-item">
                              <a href="#" class="page-link" aria-label="Previous">
                                  <span aria-hidden="true">
                                      <span class="ti-arrow-left"></span>
                                  </span>
                              </a>
                          </li>
                          <!-- <li class="page-item"><a href="#" class="page-link">01</a></li>
                          <li class="page-item active"><a href="#" class="page-link">02</a></li>
                          <li class="page-item"><a href="#" class="page-link">03</a></li>
                          <li class="page-item"><a href="#" class="page-link">04</a></li>
                          <li class="page-item"><a href="#" class="page-link">09</a></li> -->
                          <?php
                            for ($i = 0; $i < ceil($result->num_rows/2); $i++){
                          ?>
                          <li class="page-item <?php 
                            if ($i == $page_active) echo "active";
                           ?>">
                           <a href="?<?php echo "category=".$category_active. "&page=".$i+1 ?>" class="page-link"><?php echo "0".($i+1) ?></a></li>
                          <?php    
                          }
                          ?> 
                          <li class="page-item">
                              <a href="#" class="page-link" aria-label="Next">
                                  <span aria-hidden="true">
                                      <span class="ti-arrow-right"></span>
                                  </span>
                              </a>
                          </li>
                      </ul>
                  </nav>
              </div>
            </div>
        </div>

          <!-- Start Blog Post Siddebar -->
          <div class="col-lg-4 sidebar-widgets">
              <div class="widget-wrap">
                <div class="single-sidebar-widget search-widget">
                  <form class="search-form" action="#">
                    <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
                    <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
                </div>

                <div class="single-sidebar-widget instafeed-widget">
                  <h4 class="instafeed-title">Instagram</h4>
                  <ul class="instafeed d-flex flex-wrap">
                    <li><img src="img/blog/instagram/i1.jpg" alt=""></li>
                    <li><img src="img/blog/instagram/i2.jpg" alt=""></li>
                    <li><img src="img/blog/instagram/i3.jpg" alt=""></li>
                    <li><img src="img/blog/instagram/i4.jpg" alt=""></li>
                    <li><img src="img/blog/instagram/i5.jpg" alt=""></li>
                    <li><img src="img/blog/instagram/i6.jpg" alt=""></li>
                  </ul>
                </div>

                <!-- Start My category  -->
                <?php 
                require 'zmyWorkSpace/myCategories.php';
                ?>
                <!-- End My category -->

                <!-- Start My Popular Posts  -->
                <?php 
                require 'zmyWorkSpace/myPopularPosts.php';
                ?>
                <!-- End My Popular Posts -->
                

                <div class="single-sidebar-widget newsletter-widget">
                  <h4 class="newsletter-title">Newsletter</h4>
                  <div class="form-group mt-30">
                    <div class="col-autos">
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Enter email'">
                    </div>
                  </div>
                  <button class="bbtns d-block mt-20 w-100">Subcribe</button>
                </div>

                  <div class="single-sidebar-widget share-widget">
                    <h4 class="share-title">Share this post</h4>
                    <div class="social-icons mt-20">
                      <a href="#">
                        <span class="ti-facebook"></span>
                      </a>
                      <a href="#">
                        <span class="ti-twitter"></span>
                      </a>
                      <a href="#">
                        <span class="ti-pinterest"></span>
                      </a>
                      <a href="#">
                        <span class="ti-instagram"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- End Blog Post Siddebar -->
        </div>
      </div>
    </section>
    <!--================ End Blog Post Area =================-->

    <!--================ Start Footer Area =================-->
    <footer class="footer-area section-gap">
      <div class="container">
        <div class="row">
          <div class="col-lg-3  col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h6>About Us</h6>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
                magna aliqua.
              </p>
            </div>
          </div>
          <div class="col-lg-4  col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h6>Newsletter</h6>
              <p>Stay update with our latest</p>
              <div class="" id="mc_embed_signup">
  
                <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                 method="get" class="form-inline">
  
                  <div class="d-flex flex-row">
  
                    <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                     required="" type="email">
  
  
                    <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                    <div style="position: absolute; left: -5000px;">
                      <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                    </div>
                  </div>
                  <div class="info"></div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-3  col-md-6 col-sm-6">
            <div class="single-footer-widget mail-chimp">
              <h6 class="mb-20">Instragram Feed</h6>
              <ul class="instafeed d-flex flex-wrap">
                <li><img src="img/instagram/i1.jpg" alt=""></li>
                <li><img src="img/instagram/i2.jpg" alt=""></li>
                <li><img src="img/instagram/i3.jpg" alt=""></li>
                <li><img src="img/instagram/i4.jpg" alt=""></li>
                <li><img src="img/instagram/i5.jpg" alt=""></li>
                <li><img src="img/instagram/i6.jpg" alt=""></li>
                <li><img src="img/instagram/i7.jpg" alt=""></li>
                <li><img src="img/instagram/i8.jpg" alt=""></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h6>Follow Us</h6>
              <p>Let us be social</p>
              <div class="footer-social d-flex align-items-center">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
          <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
      </div>
    </footer>
    <!--================ End Footer Area =================-->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
      integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
      crossorigin="anonymous"
    ></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.tabs.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script
      type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"
    ></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
