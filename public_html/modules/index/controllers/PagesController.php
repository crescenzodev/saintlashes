<?

namespace modules\index\controllers;

use mvc\Controller;

class PagesController extends Controller {

  public function indexAction() {

    $this->view->title = 'Welcome';
    $this->view->bodyID = 'index';
  }

  public function indexPost() {

    $email = 'contact@saintlashes.com';

    $subject =
        filter_var($this->request->getPost('name'), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $message =
        filter_var($this->request->getPost('message'), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $headers =
        'From: ' . $email . ' ' .
        'Reply-To: ' . $this->request->getPost('email') . ' ' .
        'X-Mailer: PHP/' . phpversion();

    mail('contact@saintlashes.com', $subject, $message, $headers);
    $this->response->redirect('/', 'sent=true');
  }

  public function aboutAction() {

    $this->view->title = 'About';
  }

  public function faqAction() {

    $this->view->title = 'Frequently Asked Questions';
  }

  public function treatmentMenuAction() {

    $this->view->title = 'Treatment Menu';
  }
}