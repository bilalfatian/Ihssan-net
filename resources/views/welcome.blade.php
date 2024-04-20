@extends('layouts.head')

<body>
<!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <img src="{{ asset('storage/images/LOGO-white.png') }}" width="210" height="40" class="d-inline-block align-top" alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('campaigns.index') }}">Campaigns</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign Up</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">Welcome to IhsanNET</h1>
                            <p class="lead text-white-50 mb-4">Start your own charity campaign or contribute to a cause you believe in. Your act of giving can create an impact beyond measure.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ route('register') }}">Start a Campaign</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="{{ route('register') }}">Donate Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5 border-bottom" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="bg-image card-hover-zoom">
                            <img src="{{ asset('storage/images/CAMPAIGN.jpg') }}" style="height: 55%;" class="w-100" />
                        </div>
                        <div class="mt-3">
                        </div>
                            <h2 class="h4 fw-bolder">Start a Campaign</h2>
                            <p>Have a cause that's close to your heart? Create your own campaign on IhsanNET and we'll provide the platform for your story to reach millions. It's simple, quick, and the first step towards making a significant impact.</p>
                            <a class="text-decoration-none" href="#!">
                                Create a Campaign Now
                                <i class="bi bi-arrow-right"></i>
                            </a>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="bg-image card-hover-zoom">
                            <img src="{{ asset('storage/images/DONATE.jpg') }}" style="height: 55%;" class="w-100" />
                        </div>
                        <div class="mt-3">
                        </div>                   
                        <h2 class="h4 fw-bolder">Donate Today</h2>
                        <p>Every donation can make a difference, no matter how small. With IhsanNET, you can choose to support causes you care about. Browse our diverse range of campaigns and make a contribution today.</p>
                        <a class="text-decoration-none" href="#!">
                            Find a Campaign
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <div class="bg-image card-hover-zoom">
                            <img src="{{ asset('storage/images/COMMUNITY.jpg') }}" style="height: 55%;" class="w-100" />
                        </div>  
                        <div class="mt-3">
                        </div>                      
                        <h2 class="h4 fw-bolder">Join Our Community</h2>
                        <p>At IhsanNET, you're part of a global community dedicated to driving positive change. Sign up for our newsletter for updates on trending campaigns, success stories, and ways you can contribute to the causes that matter to you.</p>
                        <a class="text-decoration-none" href="#!">
                            Sign Up for Updates
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials section-->
        <section class="py-5 border-bottom">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">What our Users Say</h2>
                    <p class="lead mb-0">What some of them have to say about their journey with IhsanNET.</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <!-- Testimonial 1-->
                        <div class="card mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                                    <div class="ms-4">
                                        <p class="mb-1">I recently used this charity platform for a fundraising campaign, and I couldn't be happier with the results. The platform was user-friendly, and the support team was prompt and helpful. Thanks to this platform, we were able to reach our fundraising goal and make a meaningful impact!</p>
                                        <div class="small text-muted">- Ahmed, Morocco</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Testimonial 2-->
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                                    <div class="ms-4">
                                        <p class="mb-1">What a fantastic charity platform! It provided us with a seamless way to raise funds for a cause close to our heart, The transparency in handling donations gave our supporters peace of mind. Highly recommended!</p>
                                        <div class="small text-muted">- Abdullah, Pakistan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact section-->
        <section class="bg-light py-5">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Get in touch</h2>
                    <p class="lead mb-0">We'd love to hear from you</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
</body>


@extends('layouts.footer')
