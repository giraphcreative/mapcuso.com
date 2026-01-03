<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	
	</section>
	
	<footer class="footer">
		<div class="wrap">
			<!--
			<div class="contact-box">
				<div class="column slogan">
					<?php print apply_filters( 'the_content', get_field( 'footer-slogan', 'option' ) ); ?>
				</div>
				<div class="column links">
					<?php 
					if ( have_rows( 'footer-links', 'option' ) ) {
						while ( have_rows( 'footer-links', 'option' ) ) : the_row();
							print '<a href="' . get_sub_field( 'link' ) . '">' . get_sub_field( 'icon' ) . ' ' . get_sub_field('text') . '</a>';
						endwhile;
					}
					?>
				</div>
			</div>
			-->
			<div class="footer-connect">
				<p><img src="<?php bloginfo( 'template_url' ); ?>/img/logo-white.png" class="logo" /></p>
				<p class="join">Interested in Joining Our Team?<br><a href="/careers" class="btn orange rounded">View Available Positions</a></p>
				<?php
				if ( have_rows( 'social', 'option' ) ) :
					print '<div class="social">';
					while ( have_rows( 'social', 'option' ) ) : the_row();
						print '<a href="' . get_sub_field( 'link' ) . '"><img src="' . get_bloginfo('template_url') . '/img/social/' . get_sub_field( 'network' )['value'] . '.png" /></a>';
					endwhile;
					print '</div>';
				endif;

				if ( have_rows( 'secondary', 'option' ) ) :
					print '<div class="secondary-contact">';
					while ( have_rows( 'secondary', 'option' ) ) : the_row();
						$icon = get_sub_field( 'icon' );
						$link = get_sub_field( 'link' );
						$text = get_sub_field( 'text' );
						print '<div class="item">' .
							( !empty( $link ) ? '<a href="' . $link . '">' : '<span>' ) . 
							get_sub_field( 'icon' ) . ' ' . $text .
							( !empty( $link ) ? '</a>' : '</span>' ) .
							'</div>';
					endwhile;
					print '</div>';
				endif;
				?>
			</div>
			<p class="copyright">Copyright &copy; <?php print date( 'Y' ) ?> <?php bloginfo( 'sitename' ); ?>. All Rights Reserved.</p>
		</div>
	</footer>

</div><!-- #container -->
<script src="https://kit.fontawesome.com/5eced83e9b.js" crossorigin="anonymous"></script>
<?php wp_footer(); ?>
</body>
</html>