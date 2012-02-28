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

<h3><?php echo SITE_NAME; ?> Upcoming Events</h3>
<?php
if(!$events)
{
    echo 'No Upcoming Events';
}
else
{
    ?>
<center>
    <table border="1px" width="80%">
        <tr>
            <td width="25%"><b>Date:</b></td>
            <td width="60%"><b>Event:</b></td>
            <td><b>Details/Signups</b></td>
        </tr>
            <?php
            foreach($events as $event)
            {
                if($event->active == '2')
                {
                    continue;
                }
        echo '<tr><td>'.date('n/j/Y', strtotime($event->date)).'</td>';
        echo '<td>'.$event->title.'</td>';
        echo '<td><a href="'.SITE_URL.'/index.php/events/get_event?id='.$event->id.'">Details/Signups</a></td></tr>';
    }
    ?>
    </table>
</center>
    <?php
}
?>
<h3><?php echo SITE_NAME; ?> Past Events</h3>
<?php
if(!$history)
{
    echo 'No Past Events';
}
else
{
    ?>
<center>      
    <table border="1px" width="80%">
        <tr>
            <td width="25%"><b>Date:</b></td>
            <td width="60%"><b>Event:</b></td>
            <td><b>Details</b></td>
        </tr>
    <?php
    foreach($history as $event)
    {
        echo '<tr><td>'.date('n/j/Y', strtotime($event->date)).'</td>';
        echo '<td>'.$event->title.'</td>';
        echo '<td><a href="'.SITE_URL.'/index.php/events/get_past_event?id='.$event->id.'">Details</a></td></tr>';
    }
    ?>
    </table>
</center>
    <?php
}
?>
<hr />
<a href="<?php echo url('/events/get_rankings'); ?>">Show Pilot Rankings For Events</a>