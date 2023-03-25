<footer class="site-footer">
			<div class="site-footer__row">
				<section class="site-footer__contact-information">
					<div class="site-footer__contact-information-details">
						<div class="site-footer__contact-information-logo">
							<a class="" href="<?php echo get_home_url(); ?>">
								<img
									class="site-footer__contact-information-logo-img"
									src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/logos/logo_lion-mate-landscape.svg"
									alt="Logo Lion Mate"
								/>
							</a>
						</div>
						<div class="site-footer__contact-information-address">
							Schmiedgasse 4<br/>
							7423 Pinkafeld<br/>
							Austria
						</div>
					</div>
					<div class="site-footer__contact-information-name">
						Paul Allerbauer - Lion Mate e.U.
					</div>
				</section>

				<div class="site-footer-navbar">
					<ul class="site-footer-navbar__navigation-list">
							<?php
								wp_nav_menu(array(
									'walker'	=> new FooterMenuNavwalker(),
									'menu' => 'Footernavigation',
									'theme_location' => 'nav-menu-footer',
									'depth'          => 1,
									'container'      => FALSE,
									'container_class'   => '',
									'menu_class'     => '',
									'items_wrap'     => '%3$s',
									'fallback_cb' => false
								));
							?>
					</ul>
				</div>

				<div class="site-footer__additional-data">
					<nav class="site-footer__navigation">
						<ul class="site-footer__navigation-list">
							<?php
								wp_nav_menu(array(
									'walker'	=> new FooterNavwalker(),
									'menu' => 'Footermenü',
									'theme_location' => 'footer-navigation',
									'depth'          => 1,
									'container'      => FALSE,
									'container_class'   => '',
									'menu_class'     => '',
									'items_wrap'     => '%3$s',
									'fallback_cb' => false
								));
							?>
						</ul>
					</nav>
				</div>
			</div>

			<div class="site-footer__copyright">
				©&nbsp;Copyright&nbsp;2023 - Lion Mate e.U.
			</div>
		</footer>

		<?php wp_footer();?>

		<!-- == SCRIPTS == -->

		<!-- Hamburger Menu Toggle -->
		<script>
			var navigation = document.querySelector(".main-navigation")
			var hamburger = document.querySelector(".burger-menu")

			navigation.onclick = function () {
				this.classList.toggle("is-active")
			}

			hamburger.onclick = function () {
				this.classList.toggle("checked")
			}
		</script>


		<!-- Accordion Functionality -->
		<script>
			const items = document.querySelectorAll(".accordion button");

			function toggleAccordion() {
				const itemToggle = this.getAttribute('aria-expanded');

				for (i = 0; i < items.length; i++) {
					items[i].setAttribute('aria-expanded', 'false');
				}

				if (itemToggle == 'false') {
					this.setAttribute('aria-expanded', 'true');
				}
			}

			items.forEach(item => item.addEventListener('click', toggleAccordion));
		</script>


		<script src="./assets/scripts/index.js"></script>






	</body>
</html>