<?php
function Show( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'show__caption' => '',
        'show__image' => '',
        'show__link' => '',
    ), $atts));

    $out = Timber::compile('show.twig', array(
        'show__caption' => $show__caption,
        'show__image' => new TimberImage($show__image),
        'show__link' => $show__link,
    ));
    return $out;
}
add_shortcode('show', 'Show');