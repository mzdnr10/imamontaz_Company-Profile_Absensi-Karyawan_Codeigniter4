<!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Contact Us</h2>
          </div>

          <div class="contact-socials" >
            <div class="phone-numbers" style="margin: auto;">
              <a href="https://wa.me/6281318318983"><i class="fa fa-phone"></i> +62 813 1831 8983</a>
              <a href="https://wa.me/6281280780214"><i class="fa fa-phone"></i> +62 812 8078 0214</a>
              <a href="https://wa.me/6285771524066"><i class="fa fa-phone"></i> +62 857 7152 4066</a>
              <a href="https://wa.me/6285210005588"><i class="fa fa-phone"></i> +62 852 1000 5588</a>
          </div>
          </div>


          <div class="row contact-info">
            <div class="col-md-4">
              <div class="contact-address">
                <i class="ion-ios-location-outline"></i>
                <h3>Address</h3>
                <address>Jl. Mawar No. 120A RT003/RT006, Mustikasari, Kec. Mustika Jaya, Kota Bks, Jawa Barat</address>
              </div>
            </div>

            <div class="col-md-4">
              <div class="contact-phone">
                <i class="ion-ios-telephone-outline"></i>
                <h3>Phone Number</h3>
                <p><a href="tel:02182609241">021-82609241</a></p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="contact-email">
                <i class="ion-ios-email-outline"></i>
                <h3>Email</h3>
                <p><a href="mailto:marketing@imamontaz.id">marketing@imamontaz.id</a></p>
              </div>
            </div>
          </div>
        </div>

        <div class="container mb-4">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7213.876084764736!2d107.00312791989496!3d-6.305593834145979!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699300502bc0d1%3A0x801ebd800f41580!2sPT.Ima%20Montaz%20Teknindo!5e0!3m2!1sid!2sid!4v1726231341703!5m2!1sid!2sid"
            width="100%"
            height="380"
            frameborder="0"
            style="border: 0"
            allowfullscreen
          ></iframe>
        </div>

        <div class="container">
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>

            <form action="" method="" role="form" class="contactForm" id="contact-form">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input
                    type="text"
                    name="name"
                    class="form-control"
                    id="name"
                    placeholder="Your Name"
                    data-rule="minlen:4"
                    data-msg="Please enter at least 4 chars"
                  />
                  <div class="validation"></div>
                </div>
                <div class="form-group col-md-6">
                  <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="email"
                    placeholder="Your Email"
                    data-rule="email"
                    data-msg="Please enter a valid email"
                  />
                  <div class="validation"></div>
                </div>
              </div>
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  name="subject"
                  id="subject"
                  placeholder="Subject"
                  data-rule="minlen:4"
                  data-msg="Please enter at least 8 chars of subject"
                />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea
                  class="form-control"
                  id="message"
                  name="message"
                  rows="5"
                  data-rule="required"
                  data-msg="Please write something for us"
                  placeholder="Message"
                ></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center">
                <button type="submit">Send Message</button>
              </div>
            </form>
          </div>
        </div>
      </section>
      <!-- #contact -->
    </main>

    <!--==========================
    Footer
  ============================-->
    <footer id="footer">
      <div class="container">
        <div class="copyright">
        </div>
      </div>
    </footer>
    <!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="<?=base_url('assets/')?>lib/jquery/jquery.min.js"></script>
    <script src="<?=base_url('assets/')?>lib/jquery/jquery-migrate.min.js"></script>
    <script src="<?=base_url('assets/')?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('assets/')?>lib/easing/easing.min.js"></script>
    <script src="<?=base_url('assets/')?>lib/superfish/hoverIntent.js"></script>
    <script src="<?=base_url('assets/')?>lib/superfish/superfish.min.js"></script>
    <script src="<?=base_url('assets/')?>lib/wow/wow.min.js"></script>
    <script src="<?=base_url('assets/')?>lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?=base_url('assets/')?>lib/magnific-popup/magnific-popup.min.js"></script>
    <script src="<?=base_url('assets/')?>lib/sticky/sticky.js"></script>

    <!-- Contact Form JavaScript File -->


    <script>
      document.getElementById('contact-form').addEventListener('submit', function(event) {
        event.preventDefault();
        emailjs.sendForm('service_ahjrdnq','template_wgp0qkj', this)
          .then(function(response) {
            console.log('Email sent!', response.status, response.text);
            alert('Email sent successfully!');
          }, function(error) {
            console.error('Error sending email:', error);
            alert('Oops! Something went wrong.');
          });
      });
    </script>


    <!-- <script src="contactform/contactform.js"></script> -->

    <!-- Template Main Javascript File -->
    <script src="<?=base_url('assets/')?>js/main.js"></script>
  </body>
</html>