@php
    $settingData    = App\Models\Setting::select('id', 'header_logo')->first();
@endphp
<div class="homepage-popup-overlay" id="hpPopup" style="display:none;">

    <div class="homepage-popup-wrapper">

        <span class="homepage-popup-close" onclick="closePopup()">✕</span>
        <div class="homepage-popup-left">

            <h2>Ready to Transform Your Ideas?</h2>
            <p>Get a quick expert response in under 5 minutes.</p>

            <div id="homepage-slider">

                <div class="homepage-slide active">
                    <div class="homepage-test-box">
                        <p>
                            Apptunix delivered two fully integrated applications for our business…
                        </p>
                        <div class="homepage-test-user">
                            <img src="https://i.pravatar.cc/100">
                            <div><b>Jocelyn Pettitt</b><br>CEO - HiVibe</div>
                        </div>
                    </div>
                </div>

                <div class="homepage-slide">
                    <div class="homepage-test-box">
                        <p>Amazing engineering team. Highly reliable & responsive.</p>
                        <div class="homepage-test-user">
                            <img src="https://i.pravatar.cc/101">
                            <div><b>Michael Ross</b><br>Founder - startupX</div>
                        </div>
                    </div>
                </div>

                <div class="homepage-slide">
                    <div class="homepage-test-box">
                        <p>We scaled our product with their support & guidance.</p>
                        <div class="homepage-test-user">
                            <img src="https://i.pravatar.cc/102">
                            <div><b>Anna Smith</b><br>COO - GrowthHub</div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="homepage-slider-dots"></div>

        </div>


        <!-- RIGHT -->
        <div class="homepage-popup-right">

            <form>
                <input type="text" placeholder="Name*">
                <input type="text" placeholder="Contact Number*">
                <input type="email" placeholder="Business Email*">
                <textarea placeholder="Description *"></textarea>

                <ul class="homepage-popup-points">
                    <li>✔ NDA Protected</li>
                    <li>✔ Trusted by 2000+ Entrepreneurs</li>
                </ul>

                <button class="homepage-popup-btn">Submit</button>
            </form>

        </div>

    </div>

</div>


<body class="template-color-1 spybody" data-spy="scroll" data-target=".navbar-example2" data-offset="70">
        <header class="navbar">
        <!-- LEFT -->
        <div class="logo header-logo">
            <img src="{{ asset($settingData->header_logo ?? 'website1/assets/images/infiniti-logo.png') }}" alt=""></div>
        <!-- CENTER -->
         <div class="mobile-toggle">
            <i class="fa-solid fa-bars"></i>
         </div>

        <ul class="menu">
            <li><a href="#">Portfolio</a></li>
            <li>
                <a href="#">Services ▾</a>
                <div class="mega-menu">
                    <div class="mega-wrap">
                        <div class="left">
                            <div class="col">
                                <h4>Services</h4>

                                <div class="item"><i class="fa-solid fa-graduation-cap"></i>Education</div>
                                <div class="item"><i class="fa-solid fa-truck-fast"></i>Logistics</div>
                                <div class="item"><i class="fa-solid fa-sack-dollar"></i>Finance</div>
                                <div class="item"><i class="fa-solid fa-cart-shopping"></i>Ecommerce</div>

                                <h4 style="margin-top:12px;">ON DEMAND APPS</h4>

                                <div class="item"><i class="fa-solid fa-burger"></i>Food Delivery</div>
                                <div class="item"><i class="fa-solid fa-taxi"></i>Taxi Booking</div>
                            </div>

                            <div class="col">
                                <h4>FEATURED</h4>

                                <div class="item"><i class="fa-solid fa-dumbbell"></i>Fitness</div>
                                <div class="item"><i class="fa-solid fa-heart"></i>Dating App Development</div>
                                <div class="item"><i class="fa-solid fa-gamepad"></i>Game Development</div>
                                <div class="item"><i class="fa-solid fa-house"></i>Real Estate</div>

                                <div class="item"><i class="fa-solid fa-bag-shopping"></i>Grocery Delivery</div>
                                <div class="item"><i class="fa-solid fa-hand-sparkles"></i>Home Services</div>
                            </div>

                            <div class="col">
                                <h4>SOLUTIONS</h4>

                                <div class="item"><i class="fa-solid fa-stethoscope"></i>Healthcare</div>
                                <div class="item"><i class="fa-solid fa-users"></i>Social Networking</div>
                                <div class="item"><i class="fa-solid fa-trophy"></i>Sports Betting</div>
                                <div class="item"><i class="fa-solid fa-vr-cardboard"></i>AR / VR</div>

                                <div class="item"><i class="fa-solid fa-truck"></i>Pickup & Delivery</div>
                                <div class="item"><i class="fa-solid fa-wand-magic-sparkles"></i>Beauty & Salon Booking
                                </div>
                            </div>

                        </div>

                        <div class="right">

                            <div class="carousel">
                                <div class="slides">
                                    <img src="./assets/images/airplane.png">
                                    <img src="./assets/images/airlane.jpg">
                                    <img src="./assets/images/mobile-app-image.png">
                                </div>

                                <div class="dots">
                                    <span class="dot active"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </div>
                            </div>
                            <div class="crousel-caption">
                                <h3>Clutch</h3>
                                <p>Top Developers in India 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#">Industries ▾</a>
                <div class="mega-menu">
                    <div class="mega-wrap">
                        <div class="left">
                            <div class="col">
                                <h4>INDUSTRIES</h4>

                                <div class="item"><i class="fa-solid fa-graduation-cap"></i>Education</div>
                                <div class="item"><i class="fa-solid fa-truck-fast"></i>Logistics</div>
                                <div class="item"><i class="fa-solid fa-sack-dollar"></i>Finance</div>
                                <div class="item"><i class="fa-solid fa-cart-shopping"></i>Ecommerce</div>

                                <h4 style="margin-top:12px;">ON DEMAND APPS</h4>

                                <div class="item"><i class="fa-solid fa-burger"></i>Food Delivery</div>
                                <div class="item"><i class="fa-solid fa-taxi"></i>Taxi Booking</div>
                            </div>

                            <div class="col">
                                <h4>FEATURED</h4>

                                <div class="item"><i class="fa-solid fa-dumbbell"></i>Fitness</div>
                                <div class="item"><i class="fa-solid fa-heart"></i>Dating App Development</div>
                                <div class="item"><i class="fa-solid fa-gamepad"></i>Game Development</div>
                                <div class="item"><i class="fa-solid fa-house"></i>Real Estate</div>

                                <div class="item"><i class="fa-solid fa-bag-shopping"></i>Grocery Delivery</div>
                                <div class="item"><i class="fa-solid fa-hand-sparkles"></i>Home Services</div>
                            </div>

                            <div class="col">
                                <h4>SOLUTIONS</h4>

                                <div class="item"><i class="fa-solid fa-stethoscope"></i>Healthcare</div>
                                <div class="item"><i class="fa-solid fa-users"></i>Social Networking</div>
                                <div class="item"><i class="fa-solid fa-trophy"></i>Sports Betting</div>
                                <div class="item"><i class="fa-solid fa-vr-cardboard"></i>AR / VR</div>

                                <div class="item"><i class="fa-solid fa-truck"></i>Pickup & Delivery</div>
                                <div class="item"><i class="fa-solid fa-wand-magic-sparkles"></i>Beauty & Salon Booking
                                </div>
                            </div>

                        </div>

                        <div class="right">

                            <div class="carousel">
                                <div class="slides">
                                    <img src="./assets/images/airplane.png">
                                    <img src="./assets/images/airlane.jpg">
                                    <img src="./assets/images/mobile-app-image.png">
                                </div>

                                <div class="dots">
                                    <span class="dot active"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                </div>
                            </div>
                            <div class="crousel-caption">
                                <h3>Clutch</h3>
                                <p>Top Developers in India 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>


            <li><a href="#">About</a></li>
            <li><a href="#">Blog</a></li>
            <div class="nav-right">
                <a class="btn-primary">Get In Touch</a>
                <a class="btn-outline">For Entrepreneurs</a>
            </div>
        </ul>
        <!-- RIGHT BUTTONS -->
    </header>
