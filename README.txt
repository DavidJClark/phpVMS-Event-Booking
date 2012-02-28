EVENTBooking beta 1.1 update

-removed datepicker calendar and added date dropdown to support all browsers
-added news post function during initial creation of event
-added function to delete an event and all signups associated with it
-changed sql field size for event description from 250 characters to 2000 characters

New Install

Drop files in root of phpvms install as structured
run event.sql in your phpvms database

Update

Overwrite existing files for EVENTBooking with the new 1.1 files
Run event_update.sql in your events table in your phpvms database

EVENTBooking beta 1.0

phpVMS module to create and manage fly-in events for your phpVMS based virtual airline.

Developed by:
simpilot
www.simpilotgroup.com

Developed on:
phpVMS 2.1.921
php 5.2.11
mysql 5.0.51
apache 2.2.11

Install:

-Download the attached package.
-unzip the package and place the files as structured in your root phpVMS install.
-use the event.sql file to create the tables needed in your sql database using phpmyadmin or similar.
-create a link in your admin navigation panel
I put it on line 54 in admin/lib/layout/header.tpl

<li><a href="<?php echo SITE_URL?>/admin/index.php/events_admin">Events</a></li>
-create a link in your main site nav bar

<li><a href="<?php echo url('/events') ?>">Events</a></li>

This is a VERY BASIC BETA version of this module. It only includes basic functionality and is currently under further development. It is only being released in this BETA form for community input on further options.

The Slot Limit determines how many open slots are available to pilots for signing up beyond the slots that are already reserved. - I would suggest not editing this after you have created the event and have signups.

The Slot Interval is how many minutes are between each Slot Reservation. This is not editable once you set the number in the creation of the event.

Bug tracker and feature requests here - http://bugs.phpvms.net/browse/EVB 

Released under the following license: 
Creative Commons Attribution-Noncommercial-Share Alike 3.0 Unported License 