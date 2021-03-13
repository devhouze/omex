
                    <div class="carousel-inner">
                        <?php if(!empty($events)) {$i=1;foreach($events as $event){?>
                        <div class="carousel-item <?php if($i==1){?>active<?php }?>">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-md-none d-block mobile-look">
                                    <h1 class="h-font pr-font fz36 pr-18 text-center mt-18 h-color fz24-sm pr-sm0 mb-md-0 mb-4"><?php echo $event['event_name'];?></h1>
                                    </div>
                                    <img src="<?php echo base_url('assets/images/public/home/'.$event['thumbnail_image']); ?>" alt="<?php echo $event['thumbnail_message']; ?>" class="w-100">

                                </div>
                                <div class="col-md-4">
                                    <div class="pl-12">
                                        <div class="d-md-block d-none">
                                            <h1 class="h-font pr-font fz36 pr-18 text-center mt-18 h-color fz24-sm"><?php echo $event['event_name'];?></h1>
                                        </div>
                                        <div class="box-calander">
                                            <div class="top-row">
                                                <div class="left-col"><span><?php echo ($event['date_available'] != 1)?date('Y',strtotime($event['start_date'])):'N/A';?></span></div>
                                                <div class="right-col"><h2 class="position-relative"><?php echo ($event['date_available'] != 1)?date('d M',strtotime($event['start_date']))."-".(date('d M',strtotime($event['end_date']))):'N/A';?></h2></div>
                                            </div>


                                        </div>
                                        
                                        <div class="day text-center"><?php echo ($event['date_available'] != 1)?strtoupper(date('D',strtotime($event['start_date'])))."-".(strtoupper(date('D',strtotime($event['end_date'])))):'N/A';?></div>
                                        <div class="time text-center"><?php echo date('g a',strtotime($event['event_start_time']));?>-<?php echo date('g a',strtotime($event['event_end_time']));?></div>
                                        <img src="<?php echo base_url(); ?>assets/images/public/home/long-arrow.svg" alt="" class="mt-md-4 mt-3">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php $i++; } } ?>
                        <?php if(!empty($events)) {foreach($events as $event){?>
                        <div class="carousel-item ">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-md-none d-block mobile-look">
                                    <h1 class="h-font pr-font fz36 pr-18 text-center mt-18 h-color fz24-sm pr-sm0 mb-md-0 mb-4"><?php echo $event['event_name'];?></h1>
                                    </div>
                                    <img src="<?php echo base_url('assets/images/public/home/'.$event['thumbnail_image']); ?>" alt="<?php echo $event['thumbnail_message']; ?>" class="w-100">

                                </div>
                                <div class="col-md-4">
                                    <div class="pl-12">
                                        <div class="d-md-block d-none">
                                            <h1 class="h-font pr-font fz36 pr-18 text-center mt-18 h-color fz24-sm"><?php echo $event['event_name'];?></h1>
                                        </div>
                                        <div class="box-calander">
                                            <div class="top-row">
                                                <div class="left-col"><span><?php echo ($event['date_available'] != 1)?date('Y',strtotime($event['start_date'])):'N/A';?></span></div>
                                                <div class="right-col"><h2 class="position-relative"><?php echo ($event['date_available'] != 1)?date('d M',strtotime($event['start_date']))."-".(date('d M',strtotime($event['end_date']))):'N/A';?></h2></div>
                                            </div>


                                        </div>
                                        
                                        <div class="day text-center"><?php echo ($event['date_available'] != 1)?strtoupper(date('D',strtotime($event['start_date'])))."-".(strtoupper(date('D',strtotime($event['end_date'])))):'N/A';?></div>
                                            <div class="time text-center"><?php echo date('g a',strtotime($event['event_start_time']));?>-<?php echo date('g a',strtotime($event['event_end_time']));?></div>
                                            <img src="<?php echo base_url(); ?>assets/images/public/home/long-arrow.svg" alt="" class="mt-md-4 mt-3">
                                    </div>

                                </div>
                            </div>
                        </div>
                       
                        <?php } } ?>

                    </div>