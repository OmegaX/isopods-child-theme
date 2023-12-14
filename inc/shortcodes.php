<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

add_shortcode( 'bloginfo', function( $atts ) {

   $atts = shortcode_atts( array('filter'=>'', 'info'=>''), $atts, 'bloginfo' );

   $infos = array(
     'name', 'description',
     'wpurl', 'url', 'pingback_url',
     'admin_email', 'charset', 'version', 'html_type', 'language',
     'atom_url', 'rdf_url','rss_url', 'rss2_url',
     'comments_atom_url', 'comments_rss2_url',
   );

   $filter = in_array( strtolower( $atts['filter'] ), array('raw', 'display'), true )
     ? strtolower( $atts['filter'] )
     : 'display';

   return in_array( $atts['info'], $infos, true ) ? get_bloginfo( $atts['info'], $filter ) : '';
});