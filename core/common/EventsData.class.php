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

class EventsData extends CodonData
{
    public function get_events()
    {
        $query = "SELECT * FROM events
                    ORDER BY date ASC";

        return DB::get_results($query);
    }
    public function get_upcoming_events()
    {
        $query = "SELECT * FROM events
                WHERE date >= NOW()
                ORDER BY date ASC";

        return DB::get_results($query);
    }
    public function get_past_events()
    {
        $query = "SELECT * FROM events
                WHERE date < NOW()
                ORDER BY date DESC";

        return DB::get_results($query);
    }
    public function get_event($id)
    {
        $query = "SELECT * FROM events WHERE id='$id'";

        return DB::get_row($query);
    }
    public function get_signups($id)//probably dont need!
    {
        $query = "SELECT * FROM events_signups WHERE event_id='$id' ORDER BY time ASC";

        return DB::get_results($query);
    }
    public function save_new_event($date, $time, $title, $description, $image, $dep, $arr, $schedule, $slot_limit, $slot_interval, $active)
    {
        $query = "INSERT INTO events (date, time, title, description, image, dep, arr, schedule, slot_limit, slot_interval, active)
                VALUES ('$date', '$time', '$title', '$description', '$image', '$dep', '$arr', '$schedule', '$slot_limit', '$slot_interval', '$active')";

        DB::query($query);
    }
     public function save_edit_event($date, $time, $title, $description, $image, $dep, $arr, $schedule, $slot_limit, $slot_interval, $active, $id)
    {
        $query = "UPDATE events SET
         date='$date',
         time='$time',
         title='$title',
         description='$description',
         image='$image',
         dep='$dep',
         arr='$arr',
         schedule='$schedule',
         slot_limit='$slot_limit',
         slot_interval='$slot_interval',
         active='$active'
         WHERE id='$id'";

        DB::query($query);
    }
    public function event_signup($eid, $pid, $time)
    {
        $query = "INSERT INTO events_signups (event_id, pilot_id, time)
                    VALUES('$eid', '$pid', '$time')";

        DB::query($query);
    }
    public function signup_time($eid, $time)
    {
        $query = "SELECT * FROM events_signups
                    WHERE event_id='$eid'
                    AND time='$time'";

        return DB::get_row($query);
    }
    public function check_signup($pid, $eid)
    {
        $query = "SELECT COUNT(*) AS total
                    FROM events_signups
                    WHERE event_id='$eid'
                    AND pilot_id='$pid'";

        return DB::get_row($query);
    }
    public function remove_signup($id)
    {
        $query = "DELETE FROM events_signups
                    WHERE id='$id'";

        DB::query($query);
    }
    public function remove_pilot_signup($id, $event)
    {
        $query = "DELETE FROM events_signups
                    WHERE pilot_id='$id'
                    AND event_id='$event'";

        DB::query($query);
    }
    public function delete_event($id)
    {
        $query = "DELETE FROM events
                    WHERE id='$id'";

        DB::query($query);

        $query2 = "DELETE FROM events_signups
                    WHERE event_id='$id'";

        DB::query($query2);
    }
    public function add_ranking($pilot_id)
    {
        $query = "SELECT * FROM events_pilotranks
                    WHERE pilot_id='$pilot_id'";

        $data = DB::get_row($query);
        
        if(!$data)
            {
            $query2 = "INSERT INTO events_pilotranks (pilot_id, ranking)
                        VALUES ('$pilot_id', '1')";

            DB::query($query2);
            }
        else
            {
            $ranking = $data->ranking + 1;
            $query3 = "UPDATE events_pilotranks
                        SET ranking='$ranking'
                        WHERE pilot_id='$pilot_id'";

            DB::query($query3);
        }
    }
    public function subtract_ranking($pilot_id)
    {
        $query = "SELECT * FROM events_pilotranks
                    WHERE pilot_id='$pilot_id'";

        $data = DB::get_row($query);

        if($data->ranking <= '1')
        {
            $query2 = "DELETE FROM events_pilotranks
                        WHERE pilot_id='$pilot_id'";

            DB::query($query2);
        }
        else
        {
            $ranking = $data->ranking - 1;
            $query3 = "UPDATE events_pilotranks
                        SET ranking='$ranking'
                        WHERE pilot_id='$pilot_id'";

            DB::query($query3);
        }
    }
    public function get_rankings()
    {
        $query = "SELECT * FROM events_pilotranks
                    ORDER BY ranking DESC";

        return DB::get_results($query);
    }
}