<?php
  $startdate = $_GET['startdate'];
  $enddate   = $_GET['enddate'];
  $startTime = $_GET['startTime'];
  $endTime   = $_GET['endTime'];
  $subject   = $_GET['subject'];
  $desc      = $_GET['desc'];

  $ical = "BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
BEGIN:VTIMEZONE
TZID:Europe/Oslo
BEGIN:STANDARD
DTSTART:".$startdate."T".$startTime."00
TZOFFSETFROM:+0100
TZOFFSETTO:+0100
TZNAME:EST
END:STANDARD
BEGIN:DAYLIGHT
DTSTART:".$startdate."T".$startTime."00
TZOFFSETFROM:+0100
TZOFFSETTO:+0100
TZNAME:EDT
END:DAYLIGHT
END:VTIMEZONE
BEGIN:VEVENT
DTSTART:".$startdate."T".$startTime."00
DTEND:".$enddate."T".$endTime."00
SUMMARY:".$subject."
DESCRIPTION:".$desc."
END:VEVENT
END:VCALENDAR";

  //set correct content-type-header
  header('Content-type: text/calendar; charset=utf-8');
  header('Content-Disposition: inline; filename=Bergen-Global-events.ics');
  echo $ical;
  exit;
?>