<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="TemplateMo">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="{{ asset('/storage/images/6cOCXPTsEl6SNuLikmJeWiC4uWNQOgWXFftaTnBg.jpg')}}">
  {{-- <link rel="icon" href=""> --}}

  <title>{{ $brandData -> siteName }}</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

    <!--check if site name present on DB-->
    @if ($brandData->siteName === null)
        <title>Mindwave</title>
    @else
        <title>{{ $brandData->siteName }}</title>
    @endif
</head>

<!--body-->

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/mindwave-logo.png" alt="mindwave logo" class="logo">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li><a href="meetings.html">SERVICES</a></li>
                            <li class="scroll-to-section"><a href="#courses">TEAM</a></li>
                            <li class="scroll-to-section"><a href="#contact">CONTACT</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner" id="top" data-section="section1">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/black-bg.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                            <!--Check if top title present on DB-->
                            @if ($contentData->topTitle === null)
                                <h2>WELCOME TO MINDWAVE CONSULTANCY</h2>
                            @else
                                <h2>{{ $contentData->topTitle }}</h2>
                            @endif

                            <!--Check if paragraph title present on DB-->
                            @if ($contentData->paragraph === null)
                                <p>We develop outstanding digital products and business areas that are tailored to the
                                    goals of your company and your customers.</p>
                            @else
                                <p>{{ $contentData->paragraph }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->

    <!--Check if service data exist in database-->
    @if ($serviceData != null)
        <!-- ***** Service Area Start ***** -->
        <section class="services">
            <!--Container-->
            <div class="container">
                <!--Row-->
                <div class="row">
                    <!--Column-->
                    <div class="col-lg-12">
                        <!--Coursell-->
                        <div class="owl-service-item owl-carousel">
                            @for ($i = 0; $i < count($serviceData); $i++)
                                <!--item-->
                                <div class="item">
                                    <!--down content-->
                                    <div class="down-content">
                                        <h4>{{ $serviceData[$i]->title }}</h4>
                                        <p>{{ $serviceData[$i]->desc }}</p>
                                    </div>
                                    <!--./down content-->
                                </div>
                                <!--./item-->
                            @endfor
                        </div>
                        <!--./Coursell-->
                    </div>
                    <!--./Column-->
                </div>
                <!--./Row-->
            </div>
            <!--./Container-->
        </section>
        <!-- ***** Service Area End ***** -->
    @endif
    <!--./Check if service data exist in database-->

    <!-- ***** Team Area Start ***** -->
    <section class="upcoming-meetings" id="meetings">
        <!--Container-->
        <div class="container">
            <!--Row-->
            <div class="row">
                <!--Column-->
                <div class="col-lg-12">
                    <!--Section Heading-->
                    <div class="section-heading">
                        <h2>Team</h2>
                    </div>
                    <!--./Section Heading-->
                </div>
                <!--./Column-->
            </div>
            <!--./Row-->
            <!--Row-->
            <div class="row text-center">
                <!-- Column Team -->
                <div class="col-lg-4 col-sm-6 mb-5">
                    <!--Card-->
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="https://bootstrapious.com/i/snippets/sn-team/teacher-4.jpg" alt=""
                            width="100" class="img-fluid rounded-circle mb-5 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Manuella Nevoresky</h5><span class="small text-uppercase text-muted">CEO -
                            Founder</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <!--./Card-->
                </div>
                <!-- ./Column Team -->
                <!-- Column Team -->
                <div class="col-lg-4 col-sm-6 mb-5">
                    <!--Card-->
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="https://bootstrapious.com/i/snippets/sn-team/teacher-4.jpg" alt=""
                            width="30" class="img-fluid rounded-circle mb-5 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Manuella Nevoresky</h5><span class="small text-uppercase text-muted">CEO -
                            Founder</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <!--./Card-->
                </div>
                <!-- ./Column Team -->
                <!-- Column Team -->
                <div class="col-lg-4 col-sm-6 mb-5">
                    <!--Card-->
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="https://bootstrapious.com/i/snippets/sn-team/teacher-4.jpg" alt=""
                            width="100" class="img-fluid rounded-circle mb-5 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Manuella Nevoresky</h5><span class="small text-uppercase text-muted">CEO -
                            Founder</span>
                        <ul class="social mb-0 list-inline mt-3">
                            <li class="list-inline-item"><a href="#" class="social-link"><i
                                        class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <!--./Card-->
                </div>
                <!-- ./Column Team -->
            </div>
            <!--./Row-->
        </div>
        <!--./Container-->
    </section>
    <!-- ***** Team Area End ***** -->

    <!-- ***** Tech Area Start ***** -->
    <section class="our-courses" id="courses">
        <!--Container-->
        <div class="container">
            <!--row-->
            <div class="row">
                <!--Column-->
                <div class="col-lg-12">
                    <!--Coursell-->
                    <div class="owl-courses-item owl-carousel">
                        <!--item-->
                        <div class="item">
                            <img class="img-logo" src="assets/images/sql-Logo.png" alt="Course One">
                        </div>
                        <!--./item-->
                        <!--item-->
                        <div class="item">
                            <img class="img-logo" src="assets/images/net-logo.png" alt="Course Two">
                        </div>
                        <!--./item-->
                        <!--item-->
                        <div class="item">
                            <img class="img-logo" src="assets/images/Oracle-logo.png" alt="">
                        </div>
                        <!--./item-->
                        <!--item-->
                        <div class="item">
                            <img class="img-logo" src="assets/images/telerix-logo.png" alt="">
                        </div>
                        <!--./item-->
                        <!--item-->
                        <div class="item">
                            <img class="img-logo" src="assets/images/nginx-logo.png" alt="">
                        </div>
                        <!--./item-->
                    </div>
                    <!--./Coursell-->
                </div>
                <!--./Column-->
            </div>
            <!--./row-->
        </div>
        <!--./Container-->
    </section>
    <!-- ***** Tech Area End ***** -->

    <section class="contact-us" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 align-self-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="contact" action="" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>Let's get in touch</h2>
                                    </div>
                                    <div class="col-lg-4">
                                        <fieldset>
                                            <input name="name" type="text" id="name"
                                                placeholder="YOURNAME...*" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4">
                                        <fieldset>
                                            <input name="email" type="text" id="email"
                                                pattern="[^ @]*@[^ @]*" placeholder="YOUR EMAIL..." required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4">
                                        <fieldset>
                                            <input name="subject" type="text" id="subject"
                                                placeholder="SUBJECT...*" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="message" type="text" class="form-control" id="message" placeholder="YOUR MESSAGE..."
                                                required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="button">SEND MESSAGE
                                                NOW</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="right-info">
                        <ul>
                            <li>
                                <h6>Phone Number</h6>
                                <!--Check if phone number present in DB-->
                                @if ($infoData->phoneNum === null)
                                    <span>Not Available</span>
                                @else
                                    <span>{{ $infoData->phoneNum }}</span>
                                @endif
                            </li>
                            <li>
                                <h6>Email Address</h6>
                                <!--Check if email present in DB-->
                                @if ($infoData->email === null)
                                    <span>Not Available</span>
                                @else
                                    <span>{{ $infoData->email }}</span>
                                @endif
                            </li>
                            <li>
                                <h6>Street Address</h6>
                                <!--Check if address present in DB-->
                                @if ($infoData->address === null)
                                    <span>Not Available</span>
                                @else
                                    <span>{{ $infoData->address }}</span>
                                @endif
                            </li>
                            <li>
                                <h6>Website URL</h6>
                                <!--Check if website present in DB-->
                                @if ($infoData->website === null)
                                    <span>Not Available</span>
                                @else
                                    <span>{{ $infoData->website }}</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved.
                <br>Design: <a href="https://templatemo.com" target="_parent"
                    title="free css templates">TemplateMo</a>
            </p>
        </div>
    </section>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //JavaScript function that would handle the click event
        function scrollToSection(id) {
            var element = document.getElementById(id);
            element.scrollIntoView({
                behavior: 'smooth'
            });
        }
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section'),
                        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
            e.preventDefault();
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>
</body>
<!--./body-->

</html>
