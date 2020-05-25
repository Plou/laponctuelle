<?php
    function honeypot( $atts, $content = null ) {
        extract(shortcode_atts(array(
          'title' => '',
        ), $atts));

        $out = Timber::compile('honeypot.twig', array(
            'title' => $title,
            'content' => $content
        ));
        return $out;
    }
    add_shortcode('honey-pot', 'honeypot');
