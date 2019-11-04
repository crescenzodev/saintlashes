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

<div id="intro" class="mx-auto w-50 text-center">
  <p class="m-0">
    Premium eyelash studio in Leicester
  </p>
  <p class="m-0">
    providing high quality lash extensions in a luxurious and comfortable surrounding
  </p>
</div>

<div style="height: 500px;"></div>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2422.328239485166!2d-1.1988803835127597!3d52.617912236719775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48775e05be51ed5b%3A0x89090112a0afb931!2sDarien%20Way%2C%20Leicester!5e0!3m2!1sen!2suk!4v1572390649231!5m2!1sen!2suk"
        width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" class="mt-4"></iframe>
<p class="mb-2">We offer free parking at our location shown on the map below.</p>

<div class="row my-1">
  <div class="col-sm-6">
    <h2 class="my-1">Contact Us</h2>
    <hr />
    <form class="my-2" method="post" action="">
      <input class="form-control" type="email" name="email" placeholder="Your Email&hellip;" required />
      <input class="form-control mt-3" type="text" name="name" placeholder="Your Name&hellip;" required />
      <textarea class="form-control mt-3" name="message" rows="8" placeholder="Your Message&hellip;" required></textarea>
      <button class="btn btn-nude mt-3">Send Message</button>
    </form>
  </div>
  <div class="col-sm-6">
    <h2 class="my-1">Email Us</h2>
    <hr />
    <p>Drop us an email at <a class="text-primary" href="mailto:contact@saintlashes.com">contact@saintlashes.com</a> with any queries or call us on
      <a class="text-primary" href="tel:07309300204">07309 300204</a>.</p>
  </div>
</div>

<div class="row my-1">
  <div class="col-sm-4">
    <h3 class="my-2">Cancellation Policy</h3>
    <hr />
    <p class="my-2">
      You are able to cancel or reschedule your appointment upto 24 hours before it is expected to take place.
    </p>
    <p class="my-2">
      If cancelled after this deposits are non refundable.
    </p>
  </div>
  <div class="col-sm-4">
    <h3 class="my-2">Deposits Policy</h3>
    <hr />
    <p class="my-2">
      A deposit of &pound;20 is required prior to your first treatment if you are a new customer.
    </p>
    <p class="my-2">
      This is needed for the cost of your desired eyelashes.
    </p>
  </div>
  <div class="col-sm-4">
    <h3 class="my-2">Refunds Policy</h3>
    <hr />
    <p class="my-2">
      Here at Saint Lashes we do not offer refunds.
    </p>
    <p class="my-2">
      We do however, offer a 3 day grade period where if you are not
      happy with the service you have received we will gladly do what we can to put things right.
    </p>
  </div>
</div>

