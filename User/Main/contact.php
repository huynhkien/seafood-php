<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertContact = $cont->add_to_contact($_POST);
}
?>
<?php
if(isset($insertContact)){
  echo $insertContact;
}
?>
<section class="contact-sec sec-pad">
  
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="contact-detail">
        <div class="section-title text-dark text-center">Contact Us</div>

          <ul class="contact-ul">
            <li style="list-style-type:none;"><i class="fa fa-location-dot"></i> Phường Thường Thạnh, Quận Cái Răng, TP. Cần Thơ</li>

            <li style="list-style-type:none;">
              <i class="fa fa-phone"></i>
              <a href=""><b>0949 399 263</b></a>,
              <a href=""><b>0947 544 232</b></a>
            </li>

            <li style="list-style-type:none;">
              <i class="fa-solid fa-envelope"></i>
              <a href="mailto:pardeepkumar4bjp@gmail.com"><b> info@example.com</b></a>
            </li>
          </ul>

          <span>
            <a href="#" class="fb"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="insta"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
          </span>
        </div>
      </div>

      <div class="col-md-6">
        <form action="?user=contact" class="contFrm" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="name" placeholder="Your Name" class="inptFld" required />
            </div>

            <div class="col-sm-6">
              <input type="email" name="email" placeholder="Email Address" class="inptFld" required />
            </div>

            <div class="col-sm-6">
              <input type="tel" name="phone" placeholder="Phone Number" class="inptFld" required />
            </div>

            <div class="col-sm-6">
              <input type="text" name="address" placeholder="Address" class="inptFld" required />
            </div>

            <div class="col-12">
              <textarea class="inptFld" rows="" name="contact" cols="" placeholder="Your Message..." required></textarea>
            </div>

            <div class="btn__submit col-12">
              <input type="submit" name="submit" value="SUBMIT" class="inptBtn" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<style>
  .contFrm{
    background-color: antiquewhite;
    padding: 10px;
  }
   
</style>