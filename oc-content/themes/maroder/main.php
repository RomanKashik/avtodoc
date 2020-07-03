<?php
/*
 *      Osclass – software for creating and publishing online classified
 *                           advertising platforms
 *
 *                        Copyright (C) 2014 OSCLASS
 *
 *       This program is free software: you can redistribute it and/or
 *     modify it under the terms of the GNU Affero General Public License
 *     as published by the Free Software Foundation, either version 3 of
 *            the License, or (at your option) any later version.
 *
 *     This program is distributed in the hope that it will be useful, but
 *         WITHOUT ANY WARRANTY; without even the implied warranty of
 *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *             GNU Affero General Public License for more details.
 *
 *      You should have received a copy of the GNU Affero General Public
 * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// meta tag robots
osc_add_hook('header', 'maroder_follow_construct');

maroder_add_body_class('home');


$buttonClass = '';
$listClass   = '';
if (maroder_show_as() == 'gallery') {
    $listClass   = 'listing-grid';
    $buttonClass = 'active';
}
?>
<?php osc_current_web_theme_path('header.php'); ?>
	<!--Основной контент-->
	<main id="main">
		<!--Категории -->
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-9">
                    <?php osc_run_hook('before-main'); ?>
					<div id="main">
                        <?php osc_run_hook('inside-main'); ?>
					</div>
				</div>
				<!--сайдбар (десктоп)-->
                <?php if (osc_is_static_page()): { ?>
				<div class="d-none ">
                    <?php } else :{ ?>
					<div class="d-none d-lg-block col-lg-3">
                        <?php }endif; ?>
						<div id="sidebar">
                            <?php if (osc_get_preference('sidebar-300x250', 'maroder') != '') { ?>
								<!-- sidebar ad 350x250 -->
								<div class="ads_300">
                                    <?php echo osc_get_preference('sidebar-300x250', 'maroder'); ?>
								</div>
								<!-- /sidebar ad 350x250 -->
                            <?php } ?>
							<div class="widget-box">
                                <?php if (osc_count_list_regions() > 0) { ?>
									<div class="box location">
										<h3><strong><?php _e("Location", 'maroder'); ?></strong></h3>
										<ul>
                                            <?php while (osc_has_list_regions()) { ?>
												<li><a href="<?php echo osc_list_region_url(); ?>"><?php echo
                                                        osc_list_region_name(); ?>
														<em>(<?php echo osc_list_region_items(); ?>
															)</em>
													</a>
												</li>
                                            <?php } ?>
										</ul>
									</div>
                                <?php } ?>
							</div>
						</div>
					</div>
					<!--//сайдбар (десктоп)-->
				</div>
			</div>

			<div class="container">
				<div class="row my-2 my-md-4 align-items-center ">
					<div class="col-auto col-md-7 col-lg-6">
						<h1 class="latest_ads-title">
							<strong>
                                <?php _e('Latest Listings', 'maroder'); ?>
							</strong>
						</h1>
					</div>
					<div class="col col-md-5 col-lg-6 justify-content-end">
                        <?php if (osc_count_latest_items() == 0) { ?>
							<div class="clear"></div>
							<p class="empty"><?php _e("There aren't listings available at this moment", 'maroder'); ?></p>
                        <?php } else { ?>
						<div class="actions">
							  <span class="doublebutton <?php echo $buttonClass; ?>">
								   <a href="<?php echo osc_base_url(true); ?>?sShowAs=list" class="list-button"
									  data-class-toggle="listing-grid"
									  data-destination="#listing-card-list"><span><?php _e('List', 'maroder'); ?></span></a>
								   <a href="<?php echo osc_base_url(true); ?>?sShowAs=gallery" class="grid-button"
									  data-class-toggle="listing-grid"
									  data-destination="#listing-card-list"><span><?php _e('Grid', 'maroder'); ?></span></a>
							  </span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-auto col-md-12">
                        <?php
                        View::newInstance()->_exportVariableToView("listType", 'latestItems');
                        View::newInstance()->_exportVariableToView("listClass", $listClass);
                        osc_current_web_theme_path('loop.php');
                        ?>
					</div>
				</div>
				<div class="row my-3">
					<div class="col">
                        <?php if (osc_count_latest_items() == osc_max_latest_items()) { ?>
							<p class="see_more_link"><a href="<?php echo osc_search_show_all_url(); ?>">
									<strong><?php _e('See all listings', 'maroder'); ?> &raquo;</strong></a>
							</p>
                        <?php } ?>
					</div>
				</div>
                <?php } ?>
			</div>
	</main>
	<!--Нижний сайдбар-->
	<div class="container">
	<div class="row my-3">
		<div class="col-12 d-lg-none">
			<div id="sidebar">
                <?php /*if (osc_get_preference('sidebar-300x250', 'maroder') != '') { */ ?><!--
							<!-- sidebar ad 350x250 -->
				<!--							<div class="ads_300">-->
                <?php /*echo osc_get_preference('sidebar-300x250', 'maroder'); */ ?>
				<!--							</div>-->
				<!-- /sidebar ad 350x250 -->
                <?php /*} */ ?>
				<div class="widget-box">
                    <?php if (osc_count_list_regions() > 0) { ?>
						<div class="box location">
							<h3><strong><?php _e("Location", 'maroder'); ?></strong></h3>
							<ul>
                                <?php while (osc_has_list_regions()) { ?>
									<li>
										<a href="<?php echo osc_list_region_url(); ?>"><?php echo osc_list_region_name(); ?>
											<em>(<?php echo osc_list_region_items(); ?>)</em></a></li>
                                <?php } ?>
							</ul>
						</div>
                    <?php } ?>
				</div>
			</div>
			<div class="clear"><!-- do not close, use main clossing tag for this case -->
                <?php if (osc_get_preference('homepage-728x90', 'maroder') != '') { ?>
					<!-- homepage ad 728x60-->
					<div class="ads_728">
                        <?php echo osc_get_preference('homepage-728x90', 'maroder'); ?>
					</div>
					<!-- /homepage ad 728x60-->
                <?php } ?>
			</div>
		</div>
	</div>
	</div>


<?php osc_current_web_theme_path('footer.php'); ?>