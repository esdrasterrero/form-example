<?php

namespace Drupal\form_example;

interface DateServiceInterface {

  /**
   * Gets the day of the week for a given date string.
   *
   * @param string $date
   *   The date string.
   *
   * @return string
   *   The day of the week.
   */
  public function getDayOfWeek(string $date): string;
}
