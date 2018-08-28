line 1
llll
devvvvv
</main>
<footer class="site-footer">
	<div class="row expanded">
		<div class="small-24 large-22 large-offset-1 columns">
			<div class="site-footer__inner">
				<nav class="site-nav">
					<?php
					$defaults = array(
						'menu' => 'Footer Menu',
						'container' => '',
						'menu_id' => '',
						'echo' => true,
						'fallback_cb' => 'wp_page_menu',
						'depth' => 1,
						'items_wrap' => '<ul>%3$s</ul>'
					);
					wp_nav_menu($defaults); ?>
				</nav>
				<div class="site-copyright">
					<p> <?= '© '.date('Y').' '.get_field('copyright_text', 'options'); ?></p>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php
$lab_testing_title = get_field('lab_testing_title', 'option');
$lab_testing_button_settings = get_field('lab_testing_button_settings', 'option');
$physician_login_title = get_field('physician_login_title', 'option');
$physician_login_button_settings = get_field('physician_login_button_settings', 'option');
$lab_login_title = get_field('lab_login_title', 'option');
$lab_login_button_settings = get_field('lab_login_button_settings', 'option');
if ($lab_testing_button_settings['url'] || $physician_login_button_settings['url']  || $lab_login_button_settings['url']  ): ?>
    <div id="loginModal" data-reveal class="reveal">
        <button data-close type="button" class="close-button icon-cancel"></button>
        <div class="reveal-wrapper">
            <div class="submit-box">

                <?php if ($lab_testing_button_settings['url']):  ?>
                    <?php if ($lab_testing_title): ?>
                <h4 class="text-center"><?= $lab_testing_title; ?></h4>
                    <?php endif; ?>
                <a
                        target="<?= $lab_testing_button_settings['target']; ?>"
                        href="<?= $lab_testing_button_settings['url']; ?>/"
                        class="button green radius">
                    <?= $lab_testing_button_settings['title']; ?>
                </a>
                <?php endif; ?>

                <?php if ($physician_login_button_settings['url']): ?>
                    <?php if ($physician_login_title): ?>
                        <h4 class="text-center"><?= $physician_login_title; ?></h4>
                    <?php endif; ?>

                <a
                        target="<?= $physician_login_button_settings['target']; ?>"
                        href="<?= $physician_login_button_settings['url']; ?>"
                        class="button gradient radius">
                    <?= $physician_login_button_settings['title']; ?>
                </a>
                <?php endif; ?>

                <?php if ($lab_login_button_settings['url']): ?>
                <span>or</span>
                    <?php if ($lab_login_title): ?>
                        <h4 class="text-center"><?= $lab_login_title; ?></h4>
                    <?php endif; ?>
                    <a
                            target="<?= $lab_login_button_settings['target']; ?>"
                            href="<?= $lab_login_button_settings['url']; ?>"
                            class="button gradient radius">
                        <?= $lab_login_button_settings['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
</div>
<!--[if (gt IE 9)|!(IE)]><!-->
<?php wp_footer(); ?>
<!--<![endif]-->
<?php if (is_single()): ?>
    <script type="text/javascript" class="source">
        if ($('.prettySocial').length > 0)
            $('.prettySocial').prettySocial();
    </script>
<?php endif; ?>
</body>
</html>
