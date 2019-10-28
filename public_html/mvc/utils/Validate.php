<?php

namespace mvc\utils;

abstract class Validate {

  public static function mobileNumber($mobile) {

    $mobile = str_replace(' ', '', $mobile);

    if (!ctype_digit($mobile) || strlen($mobile) !== 11 || $mobile[0] !== '0' || $mobile[1] !== '7') {

      return false;
    }

    return $mobile;
  }

  public static function postcode($postcode) {

    $postcode = strtoupper(str_replace(' ', '', $postcode));
    $postcode = wordwrap($postcode, strlen($postcode) === 6 ? 3 : 4, ' ', true);

    if (!preg_match(
        '((GIR 0AA)|((([A-PR-UWYZ][0-9][0-9]?)|(([A-PR-UWYZ][A-HK-Y][0-9][0-9]?)|(([A-PR-UWYZ][0-9][A-HJKSTUW])|' .
        '([A-PR-UWYZ][A-HK-Y][0-9][ABEHMNPRVWXY])))) [0-9][ABD-HJLNP-UW-Z]{2}))',
        $postcode)) {

      return false;
    }

    return $postcode;
  }

  public static function email($email) {

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

      return false;
    }

    return $email;
  }
}