<?php
//simpilotgroup addon module for phpVMS virtual airline system
//
//simpilotgroup addon modules are licenced under the following license:
//Creative Commons Attribution Non-commercial Share Alike (by-nc-sa)
//To view full license text visit http://creativecommons.org/licenses/by-nc-sa/3.0/
//
//@author David Clark (simpilot)
//@copyright Copyright (c) 2009-2010, David Clark
//@license http://creativecommons.org/licenses/by-nc-sa/3.0/
?>
<h3>Event Attendance Pilot Statistics</h3>
<center>
    <table width="100%" border="1px">
        <tr>
            <td>Pilot</td>
            <td># Of Events Attended</td>
        </tr>
    <?php
    if(!$rankings)
    {
        echo '<tr><td colspan="2">No Rankings Available</td></tr>';
    }
    else
    {
    foreach($rankings as $rank)
        {
        $pilot = PilotData::getPilotData($rank->pilot_id);

        echo '<tr><td>'.PilotData::getPilotCode($pilot->code, $pilot->pilotid).' - '.$pilot->firstname.' '.$pilot->lastname.'</td><td>'.$rank->ranking.'</td></tr>';
    }
    }
    ?>
    </table>
</center>
<hr />
<a href="<?php echo SITE_URL; ?>/index.php/events"><b>Return To Events Listing</b></a>