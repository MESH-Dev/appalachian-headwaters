

<footer class="site-footer">
	<div class="brand-row row">
		<div class="content">
			<div class="columns-2 footer-logo">
				<img alt="Appalachian Headwaters logo" src="<?php echo get_template_directory_uri(); ?>/img/footer-logo.png" />
			</div>
			<div class="columns-5">
				<p class="address">
					<span>Physical Address: 1046 Washington Street East, Suite 1, Lewisburg, WV 24901</span><br />
               <span>Mailing Address: PO Box 468, Lewisburg, WV 24901</span><br />
					<span><span class="phone">304.645.9008</span><span class="mobile-phone"><a href="tel:304-645-9008">304.645.9008</a></span> | <a href="mailto:info@appheadwaters.org">info@appheadwaters.org</a></span>
				</p>
			</div>
			<div class="columns-5">
				<ul class="social-nav">
					<li>
						<a href="https://www.facebook.com/appalbeecollective/" target="_blank">
							<span class="sr-only">Appalachian Headwaters on Facebook</span>
							<span class="fa-stack">
						  		<i class="fas fa-circle fa-stack-2x"></i>
						  		<i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<!-- <li>
						<a href="#">
							<span class="sr-only">Appalachian Headwaters twitter feed</span>
							<span class="fa-stack">
							  <i class="fas fa-circle fa-stack-2x"></i>
							  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li> -->
					<li>
						<a href="https://www.instagram.com/appalbeecollective/" target="_blank">
							<span class="sr-only">Appalachian Headwaters on Instagram feed</span>
							<span class="fa-stack">
							  <i class="fas fa-circle fa-stack-2x"></i>
							  <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<!-- <li>
						<a href="#">
							<span class="sr-only">Appalachian Headwaters on Linkedin</span>
							<span class="fa-stack">
							  <i class="fas fa-circle fa-stack-2x"></i>
							  <i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li> -->
				</ul>
			</div>
		</div>
	</div>

	<div class="signature-row row">
		<div class="copyright columns-6">
			&copy; <?php echo date('Y'); ?> Appalachian Headwaters
		</div>
		<div class="sig columns-6">
			Designed by <a href="http://meshfresh.com" target="_blank">MESH</a>
		</div>
		<!-- End of Footer -->

	</div>

</footer>

<?php wp_footer(); ?>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a8dbd2c20170d52"></script>

<?php echo get_field('google_analytics_property'); ?>

</body>
</html>
