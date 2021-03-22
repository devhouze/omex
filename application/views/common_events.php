
                    <div class="carousel-inner">
                        <?php $event_count = 0; $i=1;foreach($events as $event){ 
                        $class = ($count > 1)?'athens_street':strtolower(str_replace(' ', '_',$event['event_street']));
                        ?>
                        <div class="carousel-item <?php echo $class; if($i==1){?> active<?php }?>">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-md-none d-block mobile-look">
                                    <h1 class="h-font pr-font fz36 pr-18 text-center mt-18 h-color fz24-sm pr-sm0 mb-md-0 mb-4"><?php echo $event['event_name'];?></h1>
                                    </div>
                                    <img src="<?php echo base_url('assets/images/public/home/'.$event['thumbnail_image']); ?>" alt="<?php echo $event['thumbnail_message']; ?>" class="">

                                </div>
                                <div class="col-md-4">
                                    <div class="pl-12">
                                        <div class="d-md-block d-none">
                                            <h1 class="h-font pr-font fz36 pr-18 text-center mt-18 h-color fz24-sm"><?php echo $event['event_name'];?></h1>
                                        </div>
                                        <div class="box-calander">
                                                    <div class="top-row">
                                                        <?php if ($event['date_available'] == 0) {?>
                                                        <div class="left-col"><span><?php echo date('Y', strtotime($event['start_date'])); ?></span></div>
                                                        <div class="right-col">
                                                            <h2 class="position-relative"><?php echo date('d', strtotime($event['start_date'])); ?> 
                                                            <span><?php echo date('M', strtotime($event['start_date'])); ?></span>
                                                            <?php if(!empty($event['end_date']) && $event['end_date'] != '0000-00-00'){?>
                                                            - <?php echo date('d', strtotime($event['end_date'])); ?> <span>
                                                            <?php echo date('M', strtotime($event['end_date'])); ?></span>
                                                            <?php } ?>
                                                            </h2>
                                                        </div>
                                                        <?php } else {?>
                                                            <div class="left-col"><span><?php echo date('Y');?></span></div>
                                                            <div class="right-col">
                                                            <h2 class="position-relative">Coming Soon!</span></h2>
                                                        </div>
                                                        <?php } ?>
                                                    </div>


                                                </div>
                                        
                                                <?php if ($event['date_available'] == 0) {?>
                                                <div class="day text-center"><?php echo strtoupper(date('D', strtotime($event['start_date']))); ?> 
                                                <?php if(!empty($event['end_date']) && $event['end_date'] != '0000-00-00'){?> - 
                                                <?php echo strtoupper(date('D', strtotime($event['end_date']))); ?></div>
                                                <?php } ?>
                                                <div class="time text-center"><?php 
                                                echo date('g a', strtotime($event['event_start_time'])) ?>
                                                <?php if(!empty($event['event_end_time'])){?>-
                                                <?php echo date('g a', strtotime($event['event_end_time'])); ?>
                                                <?php } ?>
                                                </div>
                                                <?php } ?>
                                        <img src="<?php echo base_url(); ?>assets/images/public/home/long-arrow.svg" alt="" class="mt-md-4 mt-3">
                                    </div>

                                </div>
                                
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                <a href="<?php echo base_url('event-details/'.$event['event_slug'])?>" class="primary-btn d-inline-block mt-36">KNOW MORE</a>
                                </div>
                            </div>
                        </div>
                        <?php $i++; }  ?>
                       
                    </div>