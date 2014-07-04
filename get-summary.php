			<?php 
				if(has_post_thumbnail()){
					get_template_part( 'standard', 'summary');
				}
				else{
					get_template_part( 'text', 'summary');
				}			
			?>