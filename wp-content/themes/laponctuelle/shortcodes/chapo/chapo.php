<?php
    function chapo( $atts, $content = null ) {
        extract(shortcode_atts(array(
          'chapo__illustration' => '',
          'chapo__intro' => '',
          'chapo__text' => '',
          'chapo__caption' => '',
        ), $atts));

        $out = Timber::compile('chapo.twig', array(
            'chapo__illustration' => new TimberImage($chapo__illustration),
            'chapo__intro' => $chapo__intro,
            'chapo__text' => $chapo__text,
            'chapo__caption' => $chapo__caption,
        ));
        return $out;
    }
    add_shortcode('chapo', 'chapo');
