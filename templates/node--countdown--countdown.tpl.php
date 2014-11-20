<?php

/**
 * Custom Template for Countdown Entity Type and custom Entity View Mode Countdown
 */

$lang = $node->language;
$granuality = $node->field_countdown_granularity[$lang][0]['value'];

switch($granuality) {
  case "year":
    $date = strtotime(format_date($node->field_countdown_endtime[$lang][0]['value'], 'custom', t('Y', array(), array('context' => 'php date format'))));
    $today = strtotime(format_date(time(), 'custom', t('Y', array(), array('context' => 'php date format'))));
    break;
  case "month":
  case "day":
  case "hour":
  case "minute":
  default:
    $date = $node->field_countdown_endtime[$lang][0]['value'];
    $today = time();
    break;
}
if ( $date >= $today ) {
  print 'Counting down to ' . format_date($node->field_countdown_endtime[$lang][0]['value'], 'custom', t('Y-m-d', array(), array('context' => 'php date format')));
} else {
  print render($content);
}
//dsm($node);

/*
print "<br/><br/>".$node->nid;
print "<br/><br/>".$granuality;
print "<br/><br/>".$date;
print "<br/><br/>".$today;
*/