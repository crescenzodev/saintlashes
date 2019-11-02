<!DOCTYPE html>
<html>
<head>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous" />
  <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"
        rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="/public/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="/public/slick/slick-theme.css" />
  <link rel="stylesheet"
        href="/public/css/main.css" />
  <title><?= $this->title ?> - Saint Lashes</title>
</head>
<body id="<?= $this->bodyID ?>">

  <header>
    <div class="container-fluid">
      <p class="m-0 p-0">
        10% off for first time customers &bull;
        Refer a friend and get 15% off your next set &bull;
        Loyalty cards available to all customers
      </p>
      <p class="my-1">
        <a href="<?= $this->url('main') ?>">Home</a> &vert;
        <a href="<?= $this->url('main', ['action' => 'pricelist']) ?>">Price List</a> &vert;
        <a href="<?= $this->url('main', ['action' => 'about']) ?>">About</a> &vert;
        <a href="<?= $this->url('main', ['action' => 'faq']) ?>">FAQ</a>
      </p>
    </div>
  </header>

  <div id="header" class="container-fluid text-center">

    <a id="logo" href="<?= $this->url('main') ?>">
      <img class="img-fluid" src="/public/images/logo75.png" /><br />
      Saint <span class="text-dark font-weight-light">Lashes</span>
    </a>

  </div>

  <div id="main" class="container-fluid">
    <?= $this->getOutput() ?>
  </div>
  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4 text-center">
          <p class="small"><?= date('Y') ?> &copy; Saint Lashes</p>
        </div>
        <div class="col-sm-4 text-center">
          <ul class="list-unstyled">
            <li><a href="<?= $this->url('main', ['action' => 'pricelist']) ?>">Price List</a></li>
            <li><a href="<?= $this->url('main', ['action' => 'about']) ?>">About</a></li>
            <li><a href="<?= $this->url('main', ['action' => 'faq']) ?>">FAQ</a></li>
          </ul>
        </div>
        <div class="col-sm-4 text-center">
          <ul class="list-unstyled">
            <li>
              <a target="_blank" href="https://instagram.com/saintlashesuk">
                <img src="/public/images/instagram.png" />
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
          integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
          crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
          integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
          crossorigin="anonymous"></script>
  <script type="text/javascript" src="/public/slick/slick.min.js"></script>
  <script src="/public/js/main.js"></script>

</body>
</html>