<?php
    function galleryShow( $atts, $content = null ) {
        extract(shortcode_atts(array(
            'galleryshow__caption' => '',
            'galleryshow__image' => '',
        ), $atts));

        $out = Timber::compile('galleryshow.twig', array(
            'galleryshow__caption' => $galleryshow__caption,
            'galleryshow__image' => new TimberImage($galleryshow__image),
        ));
        return $out;
    }
    add_shortcode('gallery-show', 'galleryShow');