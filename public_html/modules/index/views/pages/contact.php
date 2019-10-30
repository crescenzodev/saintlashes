<?
if ($this->request->getQuery('sent')) {
  ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Thank You!</strong> We have received your message and will be in touch shortly.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?
}
?>
<div class="row">
  <div class="col-sm-6">
    <h2>Contact Us</h2>
    <p class="my-4">Feel free to use the contact form below to get in touch.</p>
    <form class="my-4" method="post" action="">
      <input class="form-control" type="email" name="email" placeholder="Your Email&hellip;" required />
      <input class="form-control mt-3" type="text" name="name" placeholder="Your Name&hellip;" required />
      <textarea class="form-control mt-3" name="message" rows="8" placeholder="Your Message&hellip;"></textarea>
      <button class="btn btn-primary mt-3">Send Message</button>
    </form>
  </div>
  <div class="col-sm-6">
    <h2 class="mb-4">Email Us</h2>
    <p>Here at Saint Lashes we would love to hear from you. Please <a href="mailto:contact@saintlashes.com">email us</a> if you have any questions, concerns or queries.</p>
  </div>
</div>

<h2 class="my-2">Where We Are</h2>
<p class="my-4">We offer free parking at our location shown on the map below.</p>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2422.328239485166!2d-1.1988803835127597!3d52.617912236719775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48775e05be51ed5b%3A0x89090112a0afb931!2sDarien%20Way%2C%20Leicester!5e0!3m2!1sen!2suk!4v1572390649231!5m2!1sen!2suk"
        width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
