<?php
    function galleryShowWrapper( $atts, $content = null ) {
        $out = Timber::compile('galleryShowWrapper.twig', array(
            'content' => do_shortcode($content),
        ));
        return $out;
    }
    add_shortcode('gallery-show-wrapper', 'galleryShowWrapper');