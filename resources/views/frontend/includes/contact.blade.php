<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h3><span>Contact Us</span></h3>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-12">
                <div class="info-box  mb-8">
                  <i class="bx bx-phone-call"></i>
                  <h3>Contact Us</h3>
                  <h3>(380) 208-6153</h3>
                </div>
              </div>
            </div>
          </div>
          

          <div class="col-lg-6">
            <div class="php-email-form">
            <form id="sendmessage">
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              
              <div class="g-recaptcha" data-sitekey=""></div>
              <label id="g-recaptcha" style="display: none;">reCaptcha is Required</label>
              <div class="my-3">
                <div class="sent-message" id="sent">Your message has been sent. Thank you!</div>
              </div>
              <div class="row">
                <div class="col form-group">
                  <span id='loader' style='display: none;'>
                      <img src="/assets/img/gif/ajaxload.gif" width='32px' height='32px' >
                  </span>
                </div>
                <div class="col form-group">
                  <div class="text-center"><button id="send-message">Send Message</button></div>
                </div>
                <div class="col form-group"></div>
              </div>
            </form>
            </div>
          </div>
        </div>

      </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
    <script type="text/javascript">

    $("#sendmessage").validate({
      rules: {
        name : {
          required: true,
          minlength: 3
        },
        email: {
          required: true,
          email: true,
          accept: true,
          maxlength:100,
        },
        subject:{
          required: true,
        },
        message:{
           required: true,
        },  
      },
      messages : {
        first_name: {
          required: "Please enter your first name",
          minlength: "Name should be at least 3 characters"
        },
        email: {
          required: "Please enter your email"
        },
        subject:{
          required: "Please enter subject"
        },
        message:{
          required: "Please enter message"
        }, 
      },
      submitHandler: function(form) {
        var formData = $(form).serialize();
        console.log(formData);
        debugger;
        if (grecaptcha.getResponse()) {          
          $.ajax({
              method : "get",
              url: "/sendmessage",
              data : formData,
              beforeSend: function(){
                // Show image container
                $("#loader").show();
              },
              success: function(response) {
                if(response.data == "success"){
                 $("#sent").show().delay(3000).fadeOut();
                }
              },
              complete:function(response){
                // Hide image container
                $("#loader").hide();
                $("#g-recaptcha").attr('style','display:none');
                swal("Success!", "Your message has been successfully sent.", "success");
                $('#sendmessage')[0].reset();
              }
            });
            $("#success").hide();
          }
        else {
          $("#g-recaptcha").removeAttr('style').attr('style','color:red');
        }
      }
    });
        
    </script>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

    <!-- End Contact Section -->