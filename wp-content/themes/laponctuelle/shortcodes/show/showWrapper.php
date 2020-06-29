<?php
function ShowWrapper( $atts, $content = null ) {
    $out = Timber::compile('showWrapper.twig', array(
        'content' => do_shortcode($content),
    ));

    return $out;
}
add_shortcode('show-wrapper', 'ShowWrapper');