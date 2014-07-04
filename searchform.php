						<form role="search" method="get" class="navbar-form" accept-charset="UTF-8" action="<?php echo home_url( '/' ); ?>">
							<div class="form-group ">
								<label for="nav-search" class="sr-only">Search</label>
								<input type="search" class="form-control" name="s" id="nav-search" value="<?php the_search_query(); ?>">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</div>
						</form>