<!--start footer-->
	<footer>
		<div class="container">
			<div class="row">			
				<section class="col-sm-4 footing-section text-center">
					<?php if(dynamic_sidebar(footer_left)):?>
					<?php else: ?>
					<h4 class="footer-title center-block">Add a Widget</h4>
					<?php endif; ?>
					</div>
				</section>
				<section class="col-sm-4 footing-section text-center">
					<?php if(dynamic_sidebar(footer_middle)):?>
					<?php else: ?>
					<h4 class="footer-title center-block">Add a Widget</h4>
					<?php endif; ?>
					</div>
				</section>
				<section class="col-sm-4 footing-section text-center">
					<?php if(dynamic_sidebar(footer_right)):?>
					<?php else: ?>
					<h4 class="footer-title center-block">Add a Widget</h4>
					<?php endif; ?>
					</div>
				</section>
			</div>
		</div>
		<hr>
		<div class="container">
			<div class="text-center">
				<p><span class="hidden-xs">J.F.Shea Job Sites</span>&nbsp;&copy; <?php echo date("Y"); ?> J.F.Shea Construction</p>
			</div>
		</div>
	</footer>
<?php wp_footer(); ?>
</body>
</html>