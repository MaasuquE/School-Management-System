<div class="home_design">
<div class="home_heading">
<img src="<?php echo base_url('assets/images/sms_black.png') ?>" alt="">
  <!-- <h1 style="padding-top: 60px;margin-top:30px"></h1> -->
  <h2 style="padding-top: 60px;margin-top:83px" >Uphoshahor, Sylhet-3100</h2>
</div>
<div class="csslider infinity" id="slider1">
  <input type="radio" name="slides" id="slides_1"/>
  <input type="radio" name="slides" checked="checked" id="slides_2"/>
  <input type="radio" name="slides" id="slides_3"/>
  <input type="radio" name="slides" id="slides_4"/>
  <input type="radio" name="slides" id="slides_5"/>
  <input type="radio" name="slides" id="slides_6"/>
  <ul>
    <li>
      <div class="slide-content">
          <h1>School Equipment</h1>
          <p>We have so smany equipment for study perpuse.</p>
        </div>
      <img src="<?php echo base_url('assets/images/1.jpg');  ?>" height="100%" width="100%"/>
    </li>
    <li>
      <div class="slide-content">
          <h1>School Equipment</h1>
          <p>We have so smany equipment for study perpuse.</p>
        </div>
      <img src="<?php echo base_url('assets/images/2.jpg');  ?>" height="100%" width="100%"/>
    </li>
    <li>
      <div class="slide-content">
          <h1>School Equipment</h1>
          <p>We have so smany equipment for study perpuse.</p>
        </div>
      <img src="<?php echo base_url('assets/images/3.jpg');  ?>" height="100%" width="100%"/>
    </li>
    <li>
      <div class="slide-content">
          <h1>Class Time</h1>
          <p>We have so smany equipment for study perpuse.</p>
        </div>
      <img src="<?php echo base_url('assets/images/4.jpg');  ?>" height="100%" width="100%"/>
    </li>
    <li>
      <div class="slide-content">
          <h1>School Equipment</h1>
          <p>We have so smany equipment for study perpuse.</p>
        </div>
      <img src="<?php echo base_url('assets/images/5.jpg');  ?>" height="100%" width="100%"/>
    </li>
    <li>
      <div class="slide-content">
          <h1>School Equipment</h1>
          <p>We have so smany equipment for study perpuse.</p>
        </div>
      <img src="<?php echo base_url('assets/images/6.jpg');  ?>" height="100%" width="100%"/>
    </li>
  </ul>
  <div class="arrows">
    <label for="slides_1"></label>
    <label for="slides_2"></label>
    <label for="slides_3"></label>
    <label for="slides_4"></label>
    <label for="slides_5"></label>
    <label for="slides_6"></label>
    <label class="goto-first" for="slides_1"></label>
    <label class="goto-last" for="slides_6"></label>
  </div>
  <div class="navigation"> 
    <div>
      <label for="slides_1"></label>
      <label for="slides_2"></label>
      <label for="slides_3"></label>
      <label for="slides_4"></label>
      <label for="slides_5"></label>
      <label for="slides_6"></label>
    </div>
  </div>
</div>
  <section class="about-us">
        <div class="container">
          <div class="row">
            <div class="col-md-6 about-img">
                    <img src="<?php echo base_url('assets/images/3.jpg'); ?>" height="100%" width="100%" alt="">
            </div>
            <div class="col-md-6 about-content">
                    <h1>About</h1>
                    <p>A school is an educational institution designed to provide learning spaces and learning environments for the teaching of students (or "pupils") under the direction of teachers. Most countries have systems of formal education, which is sometimes compulsory.[2] In these systems, students progress through a series of schools. The names for these schools vary by country (discussed in the Regional section below) but generally include primary school for young children and secondary school for teenagers who have completed primary education. An institution where higher education is taught, is commonly called a university college or university.</p>
            </div>
          </div>
        </div>
  </section>

  <section class="staff" style="background:black;background-repeat: no-repeat;height:100%;width:100%;opacity:0.8;">
        <div class="container">
          <div class="row ">
            <div class="col-md-4 staff_content">
                  <h1><?php echo $countTotalStudent; ?></h1>
                  <h3>Total Student</h3>

            </div>
            <div class="col-md-4 staff_content">
                  <h1><?php echo $countTotalTeacher; ?></h1>
                  <h3>Total Teacher</h3>
            </div>
            <div class="col-md-4 staff_content">
                    <h1><?php echo $countTotalClasses; ?></h1>
                  <h3>Total Class</h3>
            </div>
          </div>
        </div>
  </section>
</div>