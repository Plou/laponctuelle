<?php
    function chapo( $atts, $content = null ) {
        extract(shortcode_atts(array(
          'chapo__illustration' => '',
          'chapo__intro' => '',
          'chapo__text' => '',
        ), $atts));

        $out = Timber::compile('chapo.twig', array(
            'chapo__illustration' => new TimberImage($chapo__illustration),
            'chapo__intro' => $chapo__intro,
            'chapo__text' => $chapo__text
        ));
        return $out;
    }
    add_shortcode('chapo', 'chapo');
