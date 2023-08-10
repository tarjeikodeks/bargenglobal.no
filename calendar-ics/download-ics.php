<?php

include 'ICS.php';

header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename=bergen-global-event.ics');

$ics = new ICS(array(
  'location' => $_POST['location'],
  'description' => $_POST['description'],
  'dtstart' => $_POST['date_start'],
  'dtend' => $_POST['date_end'],
  'summary' => $_POST['summary'],
  'title' => $_POST['title'],
  'url' => $_POST['url']
));

echo $ics->to_string();