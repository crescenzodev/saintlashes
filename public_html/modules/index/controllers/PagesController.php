<?

namespace modules\index\controllers;

use mvc\Controller;

class PagesController extends Controller {

  public function indexAction() {

    $this->view->title = 'Welcome';
    $this->view->bodyID = 'index';
  }

  public function aboutAction() {

    $this->view->title = 'About Us';
  }

  public function contactAction() {

    $this->view->title = 'Contact';
  }

  public function faqAction() {

    $this->view->title = 'Frequently Asked Questions';
  }

  public function pricelistAction() {

    $this->view->title = 'Price List';
  }
}