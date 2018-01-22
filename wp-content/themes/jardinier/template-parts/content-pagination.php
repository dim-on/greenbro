<?php
/**
 * Template part for posts pagination.
 *
 * @package Jardinier
 */

the_posts_pagination(
	array(
		'prev_text' => sprintf( '%s %s', '<i class="nc-icon-mini arrows-1_minimal-left"></i>', esc_html__( 'PREV', 'jardinier' ) ),
		'next_text' => sprintf( '%s %s', esc_html__( 'NEXT', 'jardinier' ), '<i class="nc-icon-mini arrows-1_minimal-right"></i>' ),
	)
);
