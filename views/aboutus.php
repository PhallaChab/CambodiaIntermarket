<?php
    include ('template/header.php');
?>
<div class="login">
        <div class="wrap">
            <ul class="breadcrumb breadcrumb__t"><a class="home" href="#">Home</a> / About Us</ul>
            <div class="section group">
                <div class="labout span_1_of_about">
                    <h3>Testimonials</h3>
                    <div class="testimonials ">
                        <div class="testi-item">
                            <blockquote class="testi-item_blockquote">
                                <a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </a>
                                <div class="clear"></div>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="cont span_2_of_about">
                    <h3><?php echo _t_title;?></h3>
                    <p><?php echo _t_aboutcim;?></p>
                    <h5 class="m_6">Meet Our Team</h5>
                    <div class="section group">
                        <div class="col_1_of_about-box span_1_of_about-box">
                            <a class="popup-with-zoom-anim" href="#small-dialog2"> <span class="rollover"></span><img src="resources/images/s1.jpg" title="continue" alt="" /></a>
                            <div id="small-dialog2" class="mfp-hide">
                                <div class="pop_up2">
                                    <h2>Mr. Preap Rotha</h2>
                                    <p>General Manager</p>
                                </div>
                            </div>
                            <h4 class="m_7"><a href="#">Mr. PREAP Rotha</a></h4>
                            <p>General Manager</p>
                        </div>
                        <div class="col_1_of_about-box span_1_of_about-box">
                            <a class="popup-with-zoom-anim" href="#small-dialog1"> <span class="rollover"></span><img src="resources/images/s1.jpg" title="continue" alt="" /></a>
                            <div id="small-dialog1" class="mfp-hide">
                                <div class="pop_up2">
                                    <h2>Mr. YOUS Banouksa</h2>
                                    <p>General Manager</p>
                                </div>
                            </div>
                            <h4 class="m_7"><a href="#">Mr. YOUS Banouksa</a></h4>
                            <p>General Manager</p>
                        </div>
                        <div class="col_1_of_about-box span_1_of_about-box">
                            <a class="popup-with-zoom-anim" href="#small-dialog"> <span class="rollover"></span><img src="resources/images/s2.jpg" title="continue" alt="" /></a>
                            <div id="small-dialog" class="mfp-hide">
                                <div class="pop_up2">
                                    <h2>Miss. ROSE Ravy</h2>
                                    <p>Sell Manager</p>
                                </div>
                            </div>
                            <h4 class="m_7"><a href="#">Miss. ROSE Ravy</a></h4>
                            <p>Sell Manager</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <!-- Add fancyBox main JS and CSS files -->
                    <script src="resources/js/jquery.magnific-popup.js" type="text/javascript"></script>
                    <link href="resources/css/magnific-popup.css" rel="stylesheet" type="text/css">
                    <script>
                    $(document).ready(function() {
                        $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                            fixedContentPos: false,
                            fixedBgPos: true,
                            overflowY: 'auto',
                            closeBtnInside: true,
                            preloader: false,
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });
                    });
                    </script>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
<?php
    include ('template/footer.php');
?>