<?php

namespace mvc\http;

class File {

  const PDF_TYPE = 'application/pdf';
  const PNG_TYPE = 'image/png';

  protected $name;
  protected $type;
  protected $temp;
  protected $error;
  protected $size;

  public static function getContentType($type) {

    return 'Content-Type: ' . $type;
  }

  public function __construct(Array $data) {

    $this->name = $data['name'];
    $this->type = $data['type'];
    $this->temp = $data['tmpname'];
    $this->error = $data['error'];
    $this->size = $data['size'];
  }

  public function getName() {

    return $this->name;
  }

  public function getType() {

    return $this->type;
  }

  public function getError() {

    return $this->error;
  }

  public function getSize() {

    return $this->size;
  }

  public function isPDF() {

    return $this->getType() === self::PDF_TYPE;
  }

  public function isPNG() {

    return $this->getType() === self::PNG_TYPE;
  }

  public function isImage() {

    return $this->isPNG();
  }

  public function save($dir, $name) {

    if (!file_exists($dir)) {

      mkdir($dir, 0755, true);
    }

    if (move_uploaded_file($this->temp, $dir . '/' . $name . '.' . $this->getExtension())) {

      return true;
    }

    return false;
  }

  private function getExtension() {

    if ($this->getType() === self::PDF_TYPE) {

      return 'pdf';
    }

    if ($this->getType() === self::PNG_TYPE) {

      return 'png';
    }
  }
}