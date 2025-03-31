 @extends('front.layout.layout')
 @section('content')
 
 <!-- Carousel Start -->
<div class="carousel">       
               <div class="container-fluid">
                   <div class="owl-carousel">
                       <div class="carousel-item">
                           <div class="carousel-img">
                               <img src="{{ asset('front/img/carousel-1.jpg')}}" alt="Image">
                           </div>
                           <div class="carousel-text">
                           <h1>Food Made with Passion</h1>
                           <p>Enjoy delicious meals prepared by top cooks, delivered to your home.</p>
                               <div class="carousel-btn">
                                   <a class="btn custom-btn" href="{{url('/available_cooks')}}">Explore Menu</a>
                               </div>
                           </div>
                       </div>
                       <div class="carousel-item">
                           <div class="carousel-img">
                               <img src="{{ asset('front/img/carousel-2.jpg')}}" alt="Image">
                           </div>
                           <div class="carousel-text">
                               <h1>Fresh & High-Quality Ingredients</h1>
                               <p>
                               Delicious meals, delivered fresh!
                               </p>
                               <div class="carousel-btn">
                                   <a class="btn custom-btn" href="{{url('/menu')}}">Explore Menu</a>
                               </div>
                           </div>
                       </div>
                       <div class="carousel-item">
                           <div class="carousel-img">
                               <img src="{{ asset('front/img/carousel-3.jpg')}}" alt="Image">
                           </div>
                           <div class="carousel-text">
                               <h1>Home-Cooked Goodness</h1>
                               <p>
                               Taste the love in every bite
                               </p>
                               <div class="carousel-btn">
                                   <a class="btn custom-btn" href="{{url('/available_cooks')}}">Explore Menu</a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
       </div> 
    <!-- Carousel End -->

    <!-- Features Start -->
    <div class="feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-header">
                        <p>Why Choose Us</p>
                        <h2>Our Key Features</h2>
                    </div>
                    <div class="feature-text">
                        <div class="feature-img">
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{ asset('front/img/feature-1.jpg')}}" alt="Fresh Ingredients">
                                </div>
                                <div class="col-6">
                                    <img src="{{ asset('front/img/feature-2.jpg')}}" alt="Delicious Dishes">
                                </div>
                                <div class="col-6">
                                    <img src="{{ asset('front/img/feature-3.jpg')}}" alt="Quality Cooking">
                                </div>
                                <div class="col-6">
                                    <img src="{{ asset('front/img/feature-4.jpg')}}" alt="Quick Delivery">
                                </div>
                            </div>
                        </div>
                        <p>
                            Experience the best home-cooked meals made with fresh ingredients, prepared by skilled cooks, and delivered straight to your doorstep.
                        </p>
                        <a class="btn custom-btn" href="#">Order Now</a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-cooking"></i>
                                <h3>Top Home Cooks</h3>
                                <p>
                                    Our talented cooks bring the finest homemade flavors to your table, ensuring delicious and authentic meals.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-vegetable"></i>
                                <h3>Fresh & Natural Ingredients</h3>
                                <p>
                                    We use only the freshest and most natural ingredients, free from preservatives and artificial flavors.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-medal"></i>
                                <h3>High-Quality Standards</h3>
                                <p>
                                    Our meals meet the highest quality standards, ensuring you get the best taste and nutrition in every bite.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-meat"></i>
                                <h3>Fresh Vegetables</h3>
                                <p>
                                    Every dish is prepared using fresh vegetables.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-courier"></i>
                                <h3>Fast & Reliable Delivery</h3>
                                <p>
                                    Enjoy quick and hassle-free delivery right to your doorstep, ensuring your food arrives hot and fresh.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <i class="flaticon-fruits-and-vegetables"></i>
                                <h3>Healthy & Low-Fat Options</h3>
                                <p>
                                    We offer nutritious meals with balanced ingredients to keep you healthy without compromising on taste.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

        
   <!-- Food Categories Start -->
<div class="food">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="food-item">
                    <i class="fas fa-utensils"></i>
                    <h2>Traditional Meals</h2>
                    <p>
                        Enjoy delicious home-cooked traditional meals, prepared with love by skilled home chefs.
                    </p>
                    <a href="{{ url('/available_cooks') }}">View Menu</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="food-item">
                    <i class="fas fa-seedling"></i>
                    <h2>Healthy & Diet Meals</h2>
                    <p>
                        Fresh, nutritious, and balanced meals for a healthy lifestyle, crafted by expert home cooks.
                    </p>
                    <a href="{{ url('/available_cooks') }}">View Menu</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="food-item">
                    <i class="fas fa-birthday-cake"></i>
                    <h2>Desserts & Sweets</h2>
                    <p>
                        Indulge in homemade desserts, including cakes, puddings, and traditional sweets, made with fresh ingredients.
                    </p>
                    <a href="{{ url('/available_cooks') }}">View Menu</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Food Categories End -->
        
        <!-- Team Start -->
        <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p>Our Team</p>
                    <h2>Our Master Chef</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{asset('front/img/team-1.jpg')}}" alt="Image">
                            </div>
                            <div class="team-text">
                                <h2>Karan</h2>
                                <p>Master Chef</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{asset('front/img/team-2.jpg')}}" alt="Image">
                            </div>
                            <div class="team-text">
                                <h2>Bob</h2>
                                <p>Master Chef</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{asset('front/img/team-3.jpg')}}" alt="Image">
                            </div>
                            <div class="team-text">
                                <h2>ALice</h2>
                                <p>Master Chef</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{asset('front/img/team-4.jpg')}}" alt="Image">
                            </div>
                            <div class="team-text">
                                <h2>John</h2>
                                <p>Master Chef</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->
        
        
     <!-- Customer Testimonials Start -->
    <div class="testimonial">
        <div class="container">
            <div class="owl-carousel testimonials-carousel">
                <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="{{asset('front/img/testimonial-1.jpg')}}" alt="Customer">
                    </div>
                    <p>
                        "The food was absolutely delicious! Everything was fresh, and the flavors were amazing. Will order again!"
                    </p>
                    <h2>John Doe</h2>
                    <h3>Food Enthusiast</h3>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="{{asset('front/img/testimonial-2.jpg')}}" alt="Customer">
                    </div>
                    <p>
                        "I love the convenience of ordering from home cooks. The meals taste just like homemade food!"
                    </p>
                    <h2>Emily Smith</h2>
                    <h3>Fitness Coach</h3>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="{{asset('front/img/testimonial-3.jpg')}}" alt="Customer">
                    </div>
                    <p>
                        "Excellent service and fast delivery! The best home-cooked food experience I’ve had so far."
                    </p>
                    <h2>Michael Brown</h2>
                    <h3>Entrepreneur</h3>
                </div>
                <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="{{asset('front/img/testimonial-4.jpg')}}" alt="Customer">
                    </div>
                    <p>
                        "Highly recommend this service! The food is tasty, fresh, and made with care by talented home chefs."
                    </p>
                    <h2>Sarah Wilson</h2>
                    <h3>Marketing Manager</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Customer Testimonials End -->
      
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <p>Contact Us</p>
                    <h2>Contact For Any Query</h2>
                </div>
                <div class="row align-items-center contact-information">
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Address</h3>
                                <p>Memnagar, Gujarat, India</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Call Us</h3>
                                <p>+91 9238844160</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Email Us</h3>
                                <p>admin@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row contact-form">
                   
                    <div class="col-md-6">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn custom-btn" type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
         


@endsection