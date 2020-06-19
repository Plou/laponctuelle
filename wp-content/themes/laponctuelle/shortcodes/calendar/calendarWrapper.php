<?php
    function calendarWrapper( $atts, $content = null ) {
        $out = Timber::compile('calendarWrapper.twig', array(
            'content' => do_shortcode($content),
        ));
        return $out;
    }
    add_shortcode('calendar-wrapper', 'calendarWrapper');