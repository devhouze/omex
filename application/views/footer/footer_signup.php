<div class="footer-signup">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="collapsed text-white fz40 fz20-sm pr-font text-center py-12" id="headingThree" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">

                            Sign up & Stay updated <img src="<?php echo base_url(); ?>assets/images/public/footer/down.svg" alt="facebook">

                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <form action="<?php echo base_url('sign-up') ?>" autocomplete="off" class="py-60 py-sm-20" id="sign-up">
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <h3 class="pr-font fz36 fz18-sm text-white mb-30 mb-10-sm">Name*</h3>
                                        <div class="form-floating">

                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="name">
                                            <label for="floatingInput">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ps-md-4">
                                        <h3 class="pr-font fz36 fz18-sm text-white mb-30 mb-10-sm">Email Address*</h3>
                                        <div class="form-floating">
                                            <input type="email" autocomplete="false" class="form-control" id="floatingInput" placeholder="Your Email" name="email">
                                            <label for="floatingInput">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <h3 class="pr-font fz36 fz18-sm text-white mb-30 mb-10-sm">Mobile Number*</h3>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Number" name="contact">
                                            <label for="floatingInput">Your Number</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="d-table mx-auto mt-60 sb-btn" data-bs-toggle="modal" data-bs-target="#thanksmodal">SUBMIT</button>
                                    </div>



                                </div>
                            </form>
                            <div class="col-md-12" id="success" style="display:none">
                                <span class="text-white">Thank You!.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="thanksmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="<?php echo base_url(); ?>assets/images/public/footer/close.svg" alt="facebook"></button>
            <div class="modal-body">
                <h1 class="d-table mx-auto">Thank You!</h1>
            </div>

        </div>
    </div>
</div>