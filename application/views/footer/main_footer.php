
<footer class="pt-60 pt-sm-30">
    <div class="main-fooger">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="f-title fz26 text-white fw5 mb-30">World Street</div>
                    <div class="d-flex">
                        <ul class="menu list-unstyled mr-30">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li><a href="<?php echo base_url('london');?>">London Street</a></li>
                            <li><a href="<?php echo base_url('paris');?>">Paris Street</a></li>
                            <li><a href="<?php echo base_url('athens');?>">Athens Street</a></li>
                            <li><a href="<?php echo base_url('portugal');?>">Portugal Street</a></li>
                            <li><a href="<?php echo base_url('amsterdam');?>">Amsterdam Street</a></li>
                            <li><a href="<?php echo base_url('san-francisco'); ?>">San Francisco Street</a></li>
                            <li><a href="<?php echo base_url('hong-kong'); ?>">Hong Kong Street</a></li>

                        </ul>
                        <ul class="menu list-unstyled">
                            
                            <li><a href="<?php echo base_url('brand-directory'); ?>">Brands</a></li>
                            <?php  $event_count =  $this->db->query("SELECT * from tbl_event WHERE status=0")->num_rows(); 
                            if($event_count>0){  ?>
                                <li><a href="<?php echo base_url('event'); ?>">Events</a></li>
                            <?php } ?>
                            <li><a href="<?php echo base_url('contact-us'); ?>">Contact Us</a></li>
                            <li><a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo base_url('term-conditions'); ?>">Terms of Use</a></li>
                            <li><a href="<?php echo base_url('contact-us'); ?>">Disclaimer</a></li>
                            <li><a href="https://g.page/OmaxeWS?share" target="_blank">Locate Us</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-4 ps-md-5">
                    <div class="f-title fz26 text-white fw5 mb-30 mt-md-0 mt-3 mb-sm-10">Contact</div>
                    <ul class="menu list-unstyled mb-20">
                        <li>Call: <a href="callto:+91-9015222222"> +91-9015222222</a></li>
                        <li>Email: <a href="mailto:info@omaxews.com"> info@omaxews.com</a></li>
                    </ul>
                    <ul class="d-flex flex-row list-unstyled mb-0">
                        <li><a href="https://www.facebook.com/omaxeworldsreet/" target="_blank"><img src="<?php echo base_url(); ?>assets/images/public/footer/fb.svg" alt="facebook" ></a></li>
                        <li class="ml-40"><a href="https://www.instagram.com/omaxeworldstreet/?hl=en" target="_blank"><img src="<?php echo base_url(); ?>assets/images/public/footer/inst.svg" alt="instagram"></a></li>
                        
                    </ul>

                </div>
                <div class="col-md-3">
                    
                    <div class="address">
                        <div class="f-title fz26 text-white fw5 mb-30 mt-md-0 mt-3 mb-sm-10">Addresss</div>
                        <p>Omaxe Marketing & Sales Office (World Street, Sector 79, Faridabad, Haryana 121004
                        India</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom mt-30">
        <div class="container">
            <div class="row">
                <div class="col-md-11 mb-20">
                    <div class="fh1 fz16 third-color mb-16">Rera Details</div>
                    <p class="mb-0 third-color fz12">Commercial cum Residential Colony OCC Phase-1 Regd. No 129 of 2017  ,Commercial cum Residential Colony Royal Residency Regd. No 124 of 2017 ,Commercial cum Residential Colony OCC Phase-2 Regd. No 315 of 2017, Commercial cum Residential Colony Omaxsun Regd. No 76 of 2017, Commercial cum Residential Colony OCC Phase-3 Regd. No 117 of 2017 ,Commercial cum Residential Colony OCC Phase-4 Regd. No 114 of 2017, Commercial cum Residential Colony HI - FUN Regd. No 111 of 2017, San Francisco Street: RERA Registration No:HRERA-PKL-FBD-216-2020 (Project Promoted by FBD Real Grow Pvt Ltd.</p>
                </div>
                <div class="col-md-11 mb-20">
                    <div class="fh1 fz16 third-color mb-16">About Omaxe Group</div>
                    <p class="mb-0 third-color fz12">Omaxe Group has been helping customers, both families and corporates, achieve their dream realty space for over thirty years. The Group is now one of the top builders in India and the most trusted brand in real estate. With over three decades of experience and more than 20 major projects executed, Omaxe has delivered over 124.3 million square feet of real estate.</p>
                </div>
                <div class="col-md-11 mb-20">
                    <div class="fh1 fz16 third-color mb-16">Disclaimer</div>
                    <p class="mb-0 third-color fz12">This advertisement is indicative in nature & may not constitute as an offer or invitation for the purpose of registration/booking/sale. Visual and other representations including amenities, specifications in this advertisement are purely conceptual/artistic impressions does not constitute a legal offering or binding. Actual could substantially differ from the above. The viewer / prospective buyer may seek all such information including sanctioned plans, approvals, development schedule, specifications, facilities & amenities, from the company in respect of the concerned project/phase that he/she may be interested in, before any such booking/registration, etc. Further, details of the project(s)/phase are available on the company/site/marketing office(s) and/or company website and on the website or RERA, Haryana @ haryanarera.gov.in or at its office.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright py-30 py-sm-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="fz12 text-center d-table mx-auto se-color mb-0">© Copyright 2021 | All Rights Reserved by Omaxe Group</p>

                </div>
            </div>
        </div>
    </div>
</footer>
