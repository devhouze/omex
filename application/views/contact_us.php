<script src="<?=base_url('assets/js/public/contact.js');?>"></script>
<div class="contactus-page ">
    <div class="form-area py-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card py-60 px-60 px-20-sm py-sm-30 ">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="fz40 pr-font text-white d-table mx-auto text-center">Get in touch</h1>
                            </div>
                        </div>
                        <form action="<?=base_url('contact-us')?>" method="post" id="contact">
                            <div class="row justify-content-center mt-md-5 mt-3">
                                <div class="col-md-4 pe-md-5">
                                    <h3 class="pr-font fz24 fz18-sm text-white mb-30 mb-10-sm">Name*</h3>
                                    <div class="form-floating">

                                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Your Name">
                                        <label for="floatingInput">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h3 class="pr-font fz24 fz18-sm text-white mb-30 mb-10-sm">Email Address*</h3>
                                    <div class="form-floating">
                                        <input type="email" name="email" autocomplete="false" class="form-control" id="floatingInput" placeholder="Your Email">
                                        <label for="floatingInput">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h3 class="pr-font fz24 fz18-sm text-white mb-30 mb-10-sm">Mobile Number*</h3>
                                    <div class="form-floating">
                                        <input type="text" name="contact" class="form-control" id="floatingInput" placeholder="Your Number">
                                        <label for="floatingInput">Your Number</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row justify-content-center mt-md-5">
                                <div class="col-md-4 pe-md-5">
                                    <h3 class="pr-font fz24 fz18-sm text-white mb-30 mb-10-sm">Query Type*</h3>
                                    <div class="form-floating">

                                        <div class="form-floating">
                                            <select class="form-select" name="query_type" id="floatingSelect" aria-label="Floating label select example">
                                                <option selected disabled>Select One</option>
                                                <option value="General Enquiry">General Enquiry</option>
                                                <option value="Promotion/Events">Promotion/Events</option>
                                                <option value="Customer feedback">Customer feedback</option>
                                                <option value="Renting/Leasing">Renting/Leasing</option>
                                                <option value="New Brand Registration">New Brand Registration</option>
                                                <option value="Commercial Buyer">Commercial Buyer</option>
                                                <option value="Partnership">Partnership</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <h3 class="pr-font fz24 fz18-sm text-white mb-30 mb-10-sm">Message*</h3>
                                    <div class="form-floating">
                                        <textarea name="message" autocomplete="false" class="form-control" id="floatingInput" placeholder="Your Message"></textarea>
                                        <label for="floatingInput">Your Message</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button class="d-table mx-auto mt-60 mt-sm0 sb-btn">SUBMIT</button>
                                </div>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="contact-map my-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12 positoin-relative">
                    <h5 class="fz40 fz24-sm pr-font h-color d-table mx-auto text-center mb-4">Contact Us</h5>

                    <div class="v-line d-table mx-auto wow zoomIn animated" data-wow-duration="1s" data-wow-delay="1s"></div>
                </div>
            </div>
            <div class="row mt-5 d-flex flex-fill">
                <div class="col-md-7 d-flex flex-fill">
                    <!-- <figure class="pr-5 mb-0">
                        <img src="<?php echo base_url(); ?>assets/images/public/street/cmap.jpg" alt="">
                    </figure> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14040.246250040547!2d77.3528947!3d28.3872085!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5ba6ea082ef6bf15!2sOmaxe%20World%20Street!5e0!3m2!1sen!2spl!4v1605103931187!5m2!1sen!2spl" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-md-5 mt-md-0 mt-3 d-flex flex-fill justify-content-center">
                    <div class="card py-40 px-40 px-20-sm border d-flex flex-fill">
                            <div class="contect-content">
                                <ul>
                                    <li><img src="<?php echo base_url(); ?>assets/images/public/home/ccall.svg" alt=""><a href="tel:+91-9015222222">+91-9015222222</a></li>
                                    <li><img src="<?php echo base_url(); ?>assets/images/public/home/cmail.svg" alt=""><a href="mailto:hello@worldstreet.com">hello@worldstreet.com</a></li>
                                    <li><img src="<?php echo base_url(); ?>assets/images/public/home/cmap.svg" alt="">Omaxe Marketing & Sales Office (World Street, Sector 79, Faridabad, Haryana</li>
                                    
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>