

<div class="owl-carousel owl-theme">
  <div class="item"><img src="<?php echo base_url('assets/images/sms_black.png'); ?>" alt=""></div>
  <div class="item"><img src="<?php echo base_url('assets/images/sms_black.png'); ?>" alt=""></div>
  <div class="item"><img src="<?php echo base_url('assets/images/sms_black.png'); ?>" alt=""></div>
</div>

<script>
$(document).ready(function(){
  $('.owl-carousel').owlCarousel({
   animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    items:1,
    margin:30,
    stagePadding:30,
    smartSpeed:450,
})
});
</script>

