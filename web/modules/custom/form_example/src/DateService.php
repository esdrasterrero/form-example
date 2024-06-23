<?php

namespace Drupal\form_example;

use DateTime;

class DateService implements DateServiceInterface {

  /**
   * Gets the day of the week for a given date string.
   *
   * @param string $date
   *   The date string in 'Y-m-d' format.
   *
   * @return string
   *   The day of the week.
   */
  public function getDayOfWeek(string $date):string {
    $datetime = new DateTime($date);
    return $datetime->format('l');
  }

}
