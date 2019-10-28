<?

namespace modules\error\controllers;

use mvc\Controller;

class ErrorController extends Controller {

  public function error404Action() {

    $this->view->title = 'Error 404';
    $this->response->setHttpCode(404);
  }
}