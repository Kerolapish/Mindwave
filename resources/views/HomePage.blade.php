<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <!--check if brand data exist in database-->
    @if ($brandData == null || $siteData->setupBrand == false)
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/mindwave-ico.png') }}">
        <title>Mindwave</title>
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $brandData->path) }}">
        <title>{{ $brandData->siteName }}</title>
    @endif



    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <script src="https://kit.fontawesome.com/48b4d892a8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    @if ($siteData->downStatus == true)
        <link rel="stylesheet" href="assets/css/onConstruction.css">
        <script>
            window.onbeforeunload = function() {
                window.scrollTo(0, 0);
            }
        </script>
    @endif

    @if ($bgData == null || $siteData->setupBackground == false)
        <style>
            section.upcoming-meetings {
                background-image: url({{ asset('assets/images/meetings-bg.jpg') }});
            }

            section.our-courses {
                background-image: url({{ asset('assets/images/background-1.jpg') }});
            }

            section.contact-us {
                background-image: url({{ asset('assets/images/meetings-bg.jpg') }});
            }
        </style>
    @else
        <style>
            section.upcoming-meetings {
                background-image: url({{ asset('storage/' . $bgData->bg1Path) }});
            }

            section.our-courses {
                background-image: url({{ asset('storage/' . $bgData->bg2Path) }});
            }

            section.contact-us {
                background-image: url({{ asset('storage/' . $bgData->bg1Path) }});
            }

            .error-msg {
                background-color: #e57373;
                color: #ffffff;
                padding: 10px;
                text-align: center;
                position: relative;
                bottom: 0;
                width: 100%;
                z-index: 1;
                animation: fadein 0.5s;
                border-radius: 0 0 20px 20px;
            }

            section.contact-us #contact input.is-invalid {
                border: #ff7c7c 1px solid;
            }

            section.contact-us #contact textarea.is-invalid {
                border: #ff7c7c 1px solid;
            }
        </style>
    @endif


    <!--check if site name present on DB-->
    @if ($brandData == null || $siteData->setupBrand == false)
        <title>Mindwave</title>
    @else
        <title>{{ $brandData->siteName }}</title>
    @endif

    <!--This style will be invoke if the site disabled (downStatus == true) -->
</head>
<!--body-->

<body>
    @if ($siteData->downStatus == true)
        <div class="blur"></div>
        <div id="text">

            <img src="assets/images/mindwave-logo.png" alt="mindwave logo">
            <h1>Site Under Construction</h1>
            <h2>Sorry for the inconvience, we will be ready soon</h2>
            <ul>
                <li><a target="_blank" href="https://www.facebook.com/wearemindwave/"><i class="fab fa-facebook"
                            aria-hidden="true"></i></a></li>
                <li><a target="_blank" href="https://www.linkedin.com/company/mindwave-consultancy-sdn-bhd-/about/"><i
                            class="fab fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    @endif
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            @if ($brandData == null || $siteData->setupBrand == false)
                                <img src="{{ asset('assets/images/mindwave-logo.png') }}" alt="mindwave logo"
                                    class="logo">
                            @else
                                <img src="{{ asset('storage/' . $brandData->logoPath) }}" alt="mindwave logo"
                                    class="logo">
                            @endif

                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" id="myLink">Home</a></li>
                            <li class="scroll-to-section"><a href="#courses">SERVICES</a></li>
                            <li class="scroll-to-section"><a href="#meetings">TEAM</a></li>
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
            @if ($siteData->setupBrand == false)
                <source src="{{ asset('assets/images/black-bg.mp4') }}" type="video/mp4" />
            @else
                <source src="{{ asset('storage/' . $bgData->vidPath) }}" type="video/mp4" />
            @endif

        </video>

        <div class="video-overlay header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                            <!--Check if top title present on DB-->
                            @if ($contentData == null || $siteData->setupTitle == false)
                                <h2>WELCOME TO MINDWAVE CONSULTANCY</h2>
                            @else
                                <h2>{{ $contentData->topTitle }}</h2>
                            @endif
                            <!--Check if paragraph title present on DB-->
                            @if ($contentData == null || $siteData->setupTitle == false)
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

    @if ($siteData->setupService == true)
        <!-- ***** Service Area Start ***** -->
        <section class="services" id="courses">
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
    @else
        <!-- ***** Service Area Start ***** -->
        <section class="services" id="courses">
            <!--Container-->
            <div class="container">
                <!--Row-->
                <div class="row">
                    <!--Column-->
                    <div class="col-lg-12">
                        <!--Coursell-->
                        <div class="owl-service-item owl-carousel">
                            @for ($i = 0; $i < 5; $i++)
                                <!--item-->
                                <div class="item">
                                    <!--down content-->
                                    <div class="down-content">
                                        <h4>Lorem ipsum dolor sit amet</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua.</p>
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
            <!--Check if team data exist in database-->
            @if ($teamData != null || $siteData->setupTeam != false)
                <!--Row-->
                <div class="row text-center">
                    @for ($i = 0; $i < count($teamData); $i++)
                        <!-- Column Team -->
                        <div class="col-lg-4 col-sm-6 mb-5">
                            <!--Card-->
                            <div class="bg-white rounded shadow-sm py-5 px-4"><img
                                    src="{{ asset('storage/' . $teamData[$i]->path) }}" alt=""
                                    width="100" class="img-fluid rounded-circle mb-5 img-thumbnail shadow-sm">
                                <h5 class="mb-0">{{ $teamData[$i]->name }}</h5><span
                                    class="small text-uppercase text-muted">{{ $teamData[$i]->position }}</span>
                                <ul class="social mb-0 list-inline mt-3">
                                    <li class="list-inline-item"><a href="{{ $teamData[$i]->url }}"
                                            class="social-link"><i class="fa-brands fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <!--./Card-->
                        </div>
                        <!-- ./Column Team -->
                    @endfor
                </div>
                <!--./Row-->
            @endif
        </div>
        <!--./Container-->
    </section>
    <!-- ***** Team Area End ***** -->

    <!-- ***** Tech Area Start ***** -->
    <section class="our-courses">
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
            <div class="row align-items-center">
                <div class="col-lg-9 align-self-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="contact" action="{{ route('sendemail') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>Let's get in touch</h2>
                                    </div>
                                    <div class="col-lg-4">
                                        <fieldset>
                                            <input name="name" type="text" id="name"
                                                placeholder="Enter your name"
                                                class="@error('name') is-invalid @enderror">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4">
                                        <fieldset>
                                            <input name="email" type="text" id="email"
                                                placeholder="Enter your email"
                                                class="@error('email') is-invalid @enderror">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4">
                                        <fieldset>
                                            <input name="subject" type="text" id="subject"
                                                placeholder="Enter subject"
                                                class="@error('subject') is-invalid @enderror">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="message" class="@error('message') is-invalid @enderror" type="text" class="form-control"
                                                id="message" placeholder="Enter message"></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" class="button">SEND MESSAGE</button>
                                        </fieldset>
                                    </div>
                                </div>
                                @if ($errors->any())
                                    <div class="error-msg" id="error-msg">
                                        @if ($errors->has('name'))
                                            <span>{{ $errors->first('name') }}</span>
                                        @elseif ($errors->has('email'))
                                            <span>{{ $errors->first('email') }}</span>
                                        @elseif ($errors->has('subject'))
                                            <span>{{ $errors->first('subject') }}</span>
                                        @elseif ($errors->has('message'))
                                            <span>{{ $errors->first('message') }}</span>
                                        @elseif(session()->has('errors'))
                                            <span>{{ $errors->first() }}</span>
                                        @endif
                                    </div>
                                @elseif(session('success'))
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            toastr.options.timeOut = 1500; // 1.5s
                                            toastr.success("{{ session('success') }}");
                                            $('#linkButton').click(function() {
                                                toastr.success('Click Button');
                                            });
                                        });
                                    </script>
                                @endif
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
                                @if ($infoData == null || $siteData->setupInfo == false)
                                    <span>Not Available</span>
                                @else
                                    <span>{{ $infoData->phoneNum }}</span>
                                @endif
                            </li>
                            <li>
                                <h6>Email Address</h6>
                                <!--Check if email present in DB-->
                                @if ($infoData == null || $siteData->setupInfo == false)
                                    <span>Not Available</span>
                                @else
                                    <span>{{ $infoData->email }}</span>
                                @endif
                            </li>
                            <li>
                                <h6>Street Address</h6>
                                <!--Check if address present in DB-->
                                @if ($infoData == null || $siteData->setupInfo == false)
                                    <span>Not Available</span>
                                @else
                                    <span>{{ $infoData->address }}</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-07">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <h2 class="footer-heading"><a href="#" class="logo">
                            @if ($brandData == null || $siteData->setupBrand == false)
                                <img src="{{ asset('assets/images/mindwave-logo.png') }}" alt="mindwave logo">
                            @else
                                <img src="{{ asset('storage/' . $brandData->logoPath) }}" alt="mindwave logo">
                            @endif
                        </a></h2>
                    <p class="menu">
                        <a href="#top" class="scroll-to-section">Home</a>
                        <a href="#courses" class="scroll-to-section">Service</a>
                        <a href="#meetings" class="scroll-to-section">Team</a>
                        <a href="#contact" class="scroll-to-section">Contact</a>
                    </p>
                    <ul>
                        <li>
                            @if ($footerData == null)
                                <a href="#" class="icon-circle">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            @else
                                <a href="{{ $footerData->facebookUrl }}" class="icon-circle">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            @endif
                        </li>
                        <li>
                            @if ($footerData == null)
                                <a href="#" class="icon-circle">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            @else
                                <a href="{{ $footerData->LinkedInUrl }}" class="icon-circle">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p class="copyright">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        @if ($footerData == null)
                            All rights reserved | Mindwave Consulancy Sdn. Bhd.
                        @else
                            {{ $footerData->desc }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>

    @if ($siteData->downStatus == false)
        <script>
            var clickCount = 0;

            document.getElementById("myLink").addEventListener("click", function() {
                clickCount++;
                console.log(clickCount);
                if (clickCount === 1) {
                    setTimeout(function() {
                        window.location.href = "http://mindwave.test";
                    }, 1000);
                } else if (clickCount === 3) {
                    window.location.href = "http://mindwave.test/login";
                    clickCount = 0;
                }
            });
        </script>
    @endif
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
