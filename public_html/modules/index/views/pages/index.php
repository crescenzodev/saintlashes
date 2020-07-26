<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <div class="row">
    <div class="col">
      <strong>Covid 19 Client Protection</strong>
      <ol class="mt-4">
        <li>Where a face mask on entrance.</li>
        <li>Please come alone.</li>
        <li>Wash hands and apply hand sanitizer.</li>
        <li>Only bring essential personal belongings to your appointment.</li>
        <li>If you have been abroad within the last 14 days please let us know.</li>
      </ol>
    </div>
    <div class="col">
      <strong>Covid 19 Technician Practices</strong>
      <ul class="mt-4">
        <li>Hands are washed and sanitized before and after every client.</li>
        <li>A face mask is worn at all times in the studio.</li>
        <li>Gloves are used for cleaning, stock handling and cash payments.</li>
        <li>All last technicians are in good health.</li>
      </ul>
    </div>
  </div>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

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
  <p class="m-0" style="font-weight: bolder;">
    Who are we and what we do&hellip;
  </p>
  <p class="m-0 smallText">
    An expert lash tech that specialises in Russian and mega volume. Known for the luxurious home based Saint Studio and high quality lash extensions.
  </p>
  <p class="m-0 smallText">
    We create a bespoke set of lashes to suit your style and desired look. I use products that mix science with beauty to ensure maximum fluff that lasts.
  </p>
  <p class="m-0" style="font-weight: bolder;">
    How do we do it?
  </p>
  <p class="m-0 smallText">
    I believe in regular training so that I can always be the first to share new eyelash extension trends and techniques.
  </p>
  <p class="m-0 smallText">
    I specialise only in lash extensions making it my area of expertise. Time is always taken to understand every clients individual needs.
    Providing flawless customer service and always taking care of all clients is the number one priority.
  </p>
  <p class="m-0" style="font-weight: bolder;">
    Why do we do it?
  </p>
  <p class="m-0 smallText">
    Making a positive difference in womens lives is at the heart of Saint Lashes. Saint is here to empower womens' confidence.
  </p>
  <p class="m-0 smallText">
    I also aim to raise the standards within the lash industry so that clients are going to trusted experts that know how to give your lashes the love they deserve.
  </p>
</div>

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
    <p>Drop us an email at <a class="text-primary" href="mailto:contact@saintlashes.com">contact@saintlashes.com</a><br />or call us on
      <a class="text-primary" href="tel:07429257721">07429 257721</a>.</p>
    <p>You will receive a response within 24 hours.</p>
    <hr />
    <h2 class="my-1">Opening Hours</h2>
    <hr />
    <p><strong>Monday</strong> : 9am - 7pm</p>
    <p><strong>Tuesday</strong> : 9am - 7pm</p>
    <p><strong>Wednesday</strong> : 9am - 9pm</p>
    <p><strong>Thursday</strong> : 9am - 7pm</p>
    <p><strong>Friday</strong> : 9am - 7pm</p>
    <p><strong>Saturday</strong> : 9am - 3pm</p>
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
  </div>
  <div class="col-sm-4">
    <h3 class="my-2">Refunds Policy</h3>
    <hr />
    <p class="my-2">
      Here at Saint Lashes we do not offer refunds.
    </p>
    <p class="my-2">
      We do however, offer a 3 day grace period where you are able to come back and have a complimentary touch up, on a case by case basis.
    </p>
  </div>
</div>

