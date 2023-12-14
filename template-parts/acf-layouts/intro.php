<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$heading   = get_sub_field('heading');
$editor    = get_sub_field('editor');
$link      = get_sub_field('link');
?>

<div class="intro">

    <div class="<?php echo esc_attr( $container ); ?>">

        <div class="intro__grid">

            <div class="intro__col-left">

                <div class="intro__text-wrap">
                    <h1 class="intro__heading">
                        <?php echo $heading ? esc_html( $heading ) : esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
                    </h1>
                    <?php echo wp_kses_post( $editor ); ?>
                </div>

                <div class="intro__svg-wrap">
                    <?php echo load_inline_svg('/isopod.svg'); ?>
                </div>

            </div>

            <a class="intro__col-right" href="<?php echo $link['url']; ?>">
                <?php echo load_inline_svg( 'isopod.svg' ); ?>
                <span><?php esc_html_e( 'LEARN MORE', 'isopods-child' ); ?></span>
            </a>

        </div>

    </div>

</div>
