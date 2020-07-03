<!doctype html>
<html lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
    <?php osc_current_web_theme_path('common/head.php'); ?>
</head>
<body <?php maroder_body_class(); ?>>

<!--Меню-->
<header>
	<div class="container">
		<div class="row">
			<!-- header ad 728x60-->
			<div class="col text-center">
				<div class="ads_header">
                    <?php echo osc_get_preference('header-728x90', 'maroder'); ?>
					<!-- /header ad 728x60-->
				</div>
			</div>

		</div>
	</div>
	<div class="nav-dark bg-dark">
		<div class="container">
			<div class="row  bg-dark d-none d-md-flex align-items-center p-md-2">
				<div class="col-3">
                    <?php echo logo_header(); ?>
					<span id="description"><?php echo osc_page_description(); ?></span>
				</div>
				<div class="col-9">
					<ul class="nav justify-content-end align-items-center">
                        <?php if (osc_is_static_page() || osc_is_contact_page()) { ?>
							<li class="search nav-item ">
								<a class="ico-search icons nav-link" data-bclass-toggle="display-search"></a>
							</li>
							<li class="cat nav-item">
								<a class="ico-menu icons nav-link" data-bclass-toggle="display-cat"></a>
							</li>
                        <?php } ?>
                        <?php if (osc_users_enabled()) { ?>
                            <?php if (osc_is_web_user_logged_in()) { ?>
								<li class="first logged nav-item">
									<span><?php echo sprintf(__('Hi %s', 'maroder'), osc_logged_user_name() . '!'); ?></span>
									<strong>
										<a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'maroder'); ?>
										</a>
									</strong>
									<a href="<?php echo osc_user_logout_url(); ?>">
                                        <?php _e('Logout', 'maroder'); ?>
									</a>
								</li>
                            <?php } else { ?>
								<li><a id="login_open"
									   href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'maroder'); ?></a>
								</li>
                                <?php if (osc_user_registration_enabled()) { ?>
									<li>
										<a href="<?php echo osc_register_account_url(); ?>"><?php _e('Register for a free account', 'maroder'); ?></a>
									</li>
                                <?php }; ?>
                            <?php } ?>
                        <?php } ?>
                        <?php if (osc_users_enabled() || (!osc_users_enabled() && !osc_reg_user_post())) { ?>
							<li class="publish nav-item">
								<a href="<?php echo osc_item_post_url_in_category(); ?>"><?php _e("Добавить объявление", 'maroder'); ?></a>
							</li>
                        <?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="nav-light bg-light">
		<div class="container">
			<nav class="navbar navbar-light bg-light d-md-none">
				<div class="nav-logo">
                    <?php echo logo_header(); ?>
				</div>
				<span id="description"><?php echo osc_page_description(); ?></span>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarNav" aria-controls="navbarNav"
						aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end pt-1" id="navbarNav">
					<ul class="nav navbar-nav text-right">
                        <?php if (osc_is_static_page() || osc_is_contact_page()) { ?>
							<li class="search nav-item ">
								<a class="ico-search icons nav-link" data-bclass-toggle="display-search"></a>
							</li>
							<li class="cat nav-item">
								<a class="ico-menu icons nav-link" data-bclass-toggle="display-cat"></a>
							</li>
                        <?php } ?>
                        <?php if (osc_users_enabled()) { ?>
                            <?php if (osc_is_web_user_logged_in()) { ?>
								<li class="first logged nav-item">
									<span><?php echo sprintf(__('Hi %s', 'maroder'), osc_logged_user_name() . '!'); ?></span>
									<strong>
										<a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'maroder'); ?>
										</a>
									</strong>
									<a href="<?php echo osc_user_logout_url(); ?>">
                                        <?php _e('Logout', 'maroder'); ?>
									</a>
								</li>
                            <?php } else { ?>
								<li><a id="login_open"
									   href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'maroder'); ?></a>
								</li>
                                <?php if (osc_user_registration_enabled()) { ?>
									<li>
										<a href="<?php echo osc_register_account_url(); ?>"><?php _e('Register for a free account', 'maroder'); ?></a>
									</li>
                                <?php }; ?>
                            <?php } ?>
                        <?php } ?>
                        <?php if (osc_users_enabled() || (!osc_users_enabled() && !osc_reg_user_post())) { ?>
							<li class="publish nav-item">
								<a href="<?php echo osc_item_post_url_in_category(); ?>"><?php _e("Добавить объявление", 'maroder'); ?></a>
							</li>
                        <?php } ?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!--Поиск-->
	<div class="container">
		<div class="row my-2">
			<div class="col">
                <?php if (osc_is_home_page() || osc_is_static_page() || osc_is_contact_page()) { ?>
					<form action="<?php echo osc_base_url(true); ?>" method="get"
						  class="search nocsrf" <?php /* onsubmit="javascript:return doSearch();"*/ ?>>
						<input type="hidden" name="page" value="search"/>
						<div class="form-row">
							<div class="col-12 col-sm-8">
								<input type="text" name="sPattern" class="input-text" value=""
									   placeholder="Поиск по объявлениям"/>
							</div>
                            <?php if (osc_count_categories()) { ?>
							<div class="col-12 col-sm-4 mt-1 mt-sm-0">
								<div class="input-group">
                                    <?php osc_categories_select('sCategory', null, __('Select a category', 'maroder')); ?>
									<!--						</div>-->
									<div class="input-group-append">
                                        <?php } else { ?>
										<div class="input-group-append">
                                            <?php } ?>
											<!--											<button class="ui-button ui-button-big js-submit">-->
                                            <?php //_e("Search", 'maroder'); ?><!--</button>	-->
											<button class="ui-button js-submit"><i class="fa fa-search"
																				   aria-hidden="true"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col">
								<div id="message-search"></div>
							</div>
					</form>
                <?php } ?>
			</div>
		</div>
	</div>
	<!--Хлебные крошки-->
    <?php $breadcrumb = osc_breadcrumb('&raquo;', false, get_breadcrumb_lang()); ?>
    <?php if ($breadcrumb !== '') { ?>
		<div class="container">
			<div class="row mb-3">
				<div class="col">
					<div class="breadcrumb">
                        <?php echo $breadcrumb; ?>
					</div>
                    <?php osc_show_flash_message(); ?>
				</div>
			</div>
		</div>
    <?php } ?>
</header>

<?php osc_show_widgets('header'); ?>

<?php osc_run_hook('before-content'); ?>



