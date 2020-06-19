<?php
    function calendar( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'calendar__nametoggle' => '',
            'calendar__date' => '',
            'calendar__time' => '',
            'calendar__name' => '',
            'calendar__what' => '',
            'calendar__location' => '',
            'calendar__city' => '',
        ), $atts));
        $out = Timber::compile('calendar.twig', array(
            'calendar__nametoggle' => $calendar__nametoggle,
            'calendar__date' => $calendar__date,
            'calendar__time' => $calendar__time,
            'calendar__name' => $calendar__name,
            'calendar__what' => $calendar__what,
            'calendar__location' => $calendar__location,
            'calendar__city' => $calendar__city,
        ));
        return $out;
    }
    add_shortcode('calendar', 'calendar');