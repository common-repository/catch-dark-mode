<?php header( 'Content-type: text/css' );

$color_schemes = $this->main->color_schemes();
$schemes       = array();
foreach ( $color_schemes as $key => $value ) {
	$schemes[] = $key;
}

$options       = $this->main->get_options();
$theme_support = get_theme_support( 'catch-dark-mode' );

	 $schemes = $this->main->color_schemes();
	 $colors  = $schemes[ $options['scheme'] ]['scheme'];
?>

:root {
--background: <?php echo esc_html( $colors['background'] ); ?>;
--foreground: <?php echo esc_html( $colors['foreground'] ); ?>;
--primary: <?php echo esc_html( $colors['primary'] ); ?>;
--secondary: <?php echo esc_html( $colors['secondary'] ); ?>;
--tertiary: <?php echo esc_html( $colors['tertiary'] ); ?>;
--darker: #333;
}


html.darkMode a,
html.darkMode a .nav-title,
html.darkMode .entry-title a,
html.darkMode .entry-meta a,
html.darkMode .page-links a,
html.darkMode .page-links a .page-number,
html.darkMode .entry-footer a,
html.darkMode .entry-footer .cat-links a,
html.darkMode .entry-footer .tags-links a,
html.darkMode .edit-link a,
html.darkMode .post-navigation a,
html.darkMode .logged-in-as a,
html.darkMode .comment-navigation a,
html.darkMode .comment-metadata a,
html.darkMode .comment-metadata a.comment-edit-link,
html.darkMode .comment-reply-link,
html.darkMode a .nav-title,
html.darkMode .pagination a,
html.darkMode .comments-pagination a,
html.darkMode .site-info a,
html.darkMode .widget .widget-title a,
html.darkMode .widget ul li a,
html.darkMode .site-footer .widget-area ul li a,
html.darkMode .site-footer .widget-area ul li a {
  box-shadow: unset;
}

html.darkMode .widget ul li,
html.darkMode .widget ol li {
  border: 0;
}

html.darkMode .entry-title,
html.darkMode .section-title,
html.darkMode .widget-title,
html.darkMode .page-title, {
  color: var(--foreground);
}

html.darkMode .nav-subtitle,
html.darkMode .entry-meta {
  color: var(--foreground);
}

html.darkMode .entry-container .entry-summary,
html.darkMode .archive-post-wrap .hentry:nth-child(2n) .entry-summary p,
html.darkMode .site-info {
  color: var(--foreground);
}

html.darkMode .archive-post-wrap .hentry:nth-child(2n) .entry-title a,
html.darkMode .entry-title a {
  color: var(--foreground);
}

html.darkMode .archive-post-wrap .hentry:nth-child(2n) .entry-meta a,
html.darkMode .entry-meta a,
html.darkMode .site-info a,
html.darkMode .widget_recent_entries li a {
  color: var(--primary);
}

html.darkMode nav.navigation.posts-navigation .nav-links a {
  background-color: var(--primary);
  text-decoration: none;
}

html.darkMode .entry-title a:hover,
html.darkMode .archive-post-wrap .hentry:nth-child(2n) .entry-title a:hover,
html.darkMode .archive-post-wrap .hentry:nth-child(2n) .entry-meta a:hover,
html.darkMode .entry-meta a:hover,
html.darkMode .site-info a:hover,
html.darkMode .entry-content a:focus,
html.darkMode .entry-content a:hover,
html.darkMode .entry-summary a:focus,
html.darkMode .entry-summary a:hover,
html.darkMode .comment-content a:focus,
html.darkMode .comment-content a:hover,
html.darkMode .widget a:focus,
html.darkMode .widget a:hover,
html.darkMode .site-footer .widget-area a:focus,
html.darkMode .site-footer .widget-area a:hover,
html.darkMode .posts-navigation a:focus,
html.darkMode .posts-navigation a:hover,
html.darkMode .comment-metadata a:focus,
html.darkMode .comment-metadata a:hover,
html.darkMode .comment-metadata a.comment-edit-link:focus,
html.darkMode .comment-metadata a.comment-edit-link:hover,
html.darkMode .comment-reply-link:focus,
html.darkMode .comment-reply-link:hover,
html.darkMode .widget_authors a:focus strong,
html.darkMode .widget_authors a:hover strong,
html.darkMode .entry-title a:focus,
html.darkMode .entry-title a:hover,
html.darkMode .entry-meta a:focus,
html.darkMode .entry-meta a:hover,
html.darkMode .page-links a:focus .page-number,
html.darkMode .page-links a:hover .page-number,
html.darkMode .entry-footer a:focus,
html.darkMode .entry-footer a:hover,
html.darkMode .entry-footer .cat-links a:focus,
html.darkMode .entry-footer .cat-links a:hover,
html.darkMode .entry-footer .tags-links a:focus,
html.darkMode .entry-footer .tags-links a:hover,
html.darkMode .post-navigation a:focus,
html.darkMode .post-navigation a:hover,
html.darkMode .pagination a:not(.prev):not(.next):focus,
html.darkMode .pagination a:not(.prev):not(.next):hover,
html.darkMode .comments-pagination a:not(.prev):not(.next):focus,
html.darkMode .comments-pagination a:not(.prev):not(.next):hover,
html.darkMode .logged-in-as a:focus,
html.darkMode .logged-in-as a:hover,
html.darkMode a:focus .nav-title,
html.darkMode a:hover .nav-title,
html.darkMode .edit-link a:focus,
html.darkMode .edit-link a:hover,
html.darkMode .site-info a:focus,
html.darkMode .site-info a:hover,
html.darkMode .widget .widget-title a:focus,
html.darkMode .widget .widget-title a:hover,
html.darkMode .widget ul li a:focus,
html.darkMode .widget ul li a:hover,
html.darkMode .entry-footer .edit-link a.post-edit-link:hover {
  color: var(--secondary);
  text-decoration: none;
}

html.darkMode .entry-footer .cat-links a,
html.darkMode .entry-footer .tags-links a,
html.darkMode a .nav-title,
html.darkMode .entry-footer .edit-link a.post-edit-link {
  color: var(--primary);
}

/* Buttons */
html.darkMode input[type="submit"]/*,
html.darkMode .entry-footer .edit-link a.post-edit-link */  {
  background-color: var(--primary);
  color: var(--foreground);
}

/* Buttons */
html.darkMode input[type="submit"]:hover/*,
html.darkMode .entry-footer .edit-link a.post-edit-link:hover*/  {
  filter: grayscale(85%);
}

html.darkMode #testimonial-section .hentry::before {
  background-color: var(--background);
}

html.darkMode body,
html.darkMode #page {
  background-color: var(--background);
  color: var(--foreground);
}

html.darkMode #site-description,
html.darkMode .comment-body {
  color: var(--foreground);
}

html.darkMode h1,
html.darkMode h2,
html.darkMode h3,
html.darkMode h4,
html.darkMode h5,
html.darkMode h6 {
  color: var(--foreground);
}

html.darkMode #reply-title {
  color: var(--foreground);
}

html.darkMode #colophon {
  background-color: var(--background);
}

html.darkMode .section-heading-wrapper > .section-subtitle,
html.darkMode .section-description-wrapper {
  color: var(--foreground);
}

html.darkMode #respond .comment-form-author label,
html.darkMode #respond .comment-form-email label,
html.darkMode #respond .comment-form-url label,
html.darkMode #respond .comment-form-comment label {
  background-color: var(--background);
  color: var(--foreground);
}

html.darkMode .entry-meta .edit-link a,
html.darkMode .commentlist .edit-link a {
  background-color: var(--background);
  color: var(--foreground);
}

html.darkMode h1:not(.site-title) a,
html.darkMode .sidebar .widget-wrap li a,
html.darkMode .dropdown-toggle,
html.darkMode .site-header-menu .menu-inside-wrapper .nav-menu li button,
html.darkMode .ui-state-active a,
html.darkMode .social-search-wrapper .menu-social-container li a,
html.darkMode .menu-social-container a,
html.darkMode .social-links-menu {
  color: var(--primary);
}

html.darkMode a.button,
html.darkMode a.more-link,
html.darkMode .posts-navigation a{
  background-color: var(--primary);
  color: var(--foreground);
}

html.darkMode .sticky-post {
  background-color: var(--primary);
  color: var(--background);
}

html.darkMode .site-footer {
  background-color: var(--background);
}

html.darkMode #scrollup {
  background-color: var(--primary);
  color: var(--background);
}

html.darkMode .site-content-contain {
  background-color: var(--background);
}


html.darkMode .widget .widget-wrap {
  background-color: var(--background);
}


/* Comments */
html.darkMode .comment-respond {
  background-color: var(--background);
}

html.darkMode .author-name,
html.darkMode .comment-reply-link,
html.darkMode .author-title,
html.darkMode .comment-respond .comment-form p label {
  color: var(--foreground);
}


/* html.darkMode .comment-respond input[type="text"],
html.darkMode .comment-respond input[type="email"],
html.darkMode .comment-respond input[type="url"],
html.darkMode .comment-respond input[type="password"],
html.darkMode .comment-respond input[type="search"],
html.darkMode .comment-respond input[type="number"],
html.darkMode .comment-respond input[type="tel"],
html.darkMode .comment-respond input[type="range"],
html.darkMode .comment-respond input[type="date"],
html.darkMode .comment-respond input[type="month"],
html.darkMode .comment-respond input[type="week"],
html.darkMode .comment-respond input[type="time"],
html.darkMode .comment-respond input[type="datetime"],
html.darkMode .comment-respond input[type="datetime-local"],
html.darkMode .comment-respond input[type="color"],
html.darkMode .comment-respond textarea,
html.darkMode .comment-respond select,*/
html.darkMode .sidebar input[type="search"].search-field,
html.darkMode input,
html.darkMode select,
html.darkMode optgroup,
html.darkMode textarea,
html.darkMode input[type="text"],
html.darkMode input[type="email"],
html.darkMode input[type="url"],
html.darkMode input[type="password"],
html.darkMode input[type="search"],
html.darkMode input[type="number"],
html.darkMode input[type="tel"],
html.darkMode input[type="range"],
html.darkMode input[type="date"],
html.darkMode input[type="month"],
html.darkMode input[type="week"],
html.darkMode input[type="time"],
html.darkMode input[type="datetime"],
html.darkMode input[type="datetime-local"],
html.darkMode input[type="color"],
html.darkMode textarea {
  background-color: var(--background);
}

html.darkMode ::placeholder {
  color: var(--foreground);
}

html.darkMode :-ms-input-placeholder {
  /* Internet Explorer 10-11 */
  color: var(--foreground);
}

html.darkMode ::-ms-input-placeholder {
  /* Microsoft Edge */
  color: var(--foreground);
}

html.darkMode .top-navigation .sub-menu,
html.darkMode .top-navigation .children,
html.darkMode .navigation-classic .main-navigation .sub-menu,
html.darkMode .navigation-classic .main-navigation .children,
html.darkMode .secondary-navigation .sub-menu,
html.darkMode .secondary-navigation .children,
html.darkMode .search-container {
  background-color: var(--background);
}

html.darkMode .site-header input[type="search"].search-field {
  border-color: var(--background);
}

html.darkMode h1.page-title {
  color: var(--foreground);
}

html.darkMode #page,
html.darkMode #testimonial-section .hentry::before,
html.darkMode #testimonial-section .hentry-inner-header-wrap,
html.darkMode #clients-section .cycle-pager span,
html.darkMode .menu-inside-wrapper {
  background-color: var(--background);
}

html.darkMode .boxed-post .hentry .entry-container {
  background-color: var(--darker);
}

#testimonial-section .hentry::before,
body,
#page,
a,
a .nav-title,
.widget ul li,
.widget ol li,
.section-title,
.widget-title,
.entry-title,
.nav-subtitle,
.entry-meta,
.entry-footer .cat-links a,
.entry-footer .tags-links a,
a .nav-title,
.site-content-contain,
.comment-respond input[type="text"],
.comment-respond input[type="email"],
.comment-respond input[type="url"],
.comment-respond input[type="password"],
.comment-respond input[type="search"],
.comment-respond input[type="number"],
.comment-respond input[type="tel"],
.comment-respond input[type="range"],
.comment-respond input[type="date"],
.comment-respond input[type="month"],
.comment-respond input[type="week"],
.comment-respond input[type="time"],
.comment-respond input[type="datetime"],
.comment-respond input[type="datetime-local"],
.comment-respond input[type="color"],
.comment-respond textarea,
.comment-respond select,
.sidebar input[type="search"].search-field,
input,
select,
optgroup,
textarea,
input::placeholder,
input[type="text"],
input[type="email"],
input[type="url"],
input[type="password"],
input[type="search"],
input[type="number"],
input[type="tel"],
input[type="range"],
input[type="date"],
input[type="month"],
input[type="week"],
input[type="time"],
input[type="datetime"],
input[type="datetime-local"],
input[type="color"],
textarea,
.top-navigation .sub-menu,
.top-navigation .children,
.navigation-classic .main-navigation .sub-menu,
.navigation-classic .main-navigation .children,
.secondary-navigation .sub-menu,
.secondary-navigation .children,
.search-container {
  transition: background-color 0.7s ease;
}

/* Mobile menu background */
.menu-inside-wrapper {
  background-color: var(--background);
  border-color: var(--background) !important;
}

html.darkMode a {
  color: var(--primary);
}


/* Twenty Twenty Navbar */
html.darkMode .navigation-top,
html.darkMode .main-navigation ul ul {
    background-color: var(--background);
}

html.darkMode .navigation-top a,
html.darkMode .site-header .navigation-top .menu-scroll-down {
  color: var(--foreground);
}

html.darkMode .navigation-top a:hover,
html.darkMode .site-header .navigation-top .menu-scroll-down:hover {
  color: var(--primary);
}

/* High Responsive Pro */
html.darkMode .header-top-button-wrap,
html.darkMode .header-top-bar,
html.darkMode .site-inner {
  background-color: var(--background);
}

html.darkMode #search-top-container {
  background-color: var(--darker);
}

/* INPUTS */
html.darkMode #search-top-container input[type="search"] {
  background-color: var(--background);
}

html.darkMode button:not('.menu-search-top-toggle'),
html.darkMode .button,
html.darkMode #colophon .widget .button,
html.darkMode input[type="button"],
html.darkMode input[type="reset"],
html.darkMode input[type="submit"] {
  background-color: var(--primary);
}

/* Breadcrumb */
html.darkMode .breadcrumb-area {
  background-color: var(--background);
}

/* Sections */
html.darkMode #featured-content-section,
html.darkMode #portfolio-content-section,
html.darkMode #service-section {
  background-color: var(--background);
}

html.darkMode .featured-content-wrapper .hentry-inner,
html.darkMode .portfolio-content-wrapper .hentry-inner,
html.darkMode .site-main .hentry .entry-container {
  background-color: var(--darker);
}

html.darkMode .section {
  background-color: var(--background);
}

/* Testimonials */
html.darkMode #testimonial-section .section-content-wrap {
  color: var(--foreground);
}

html.darkMode #testimonial-section .section-content-wrap:before,
html.darkMode #testimonial-section .cycle-pager span.cycle-pager-active,
html.darkMode #testimonial-section .cycle-prev,
html.darkMode #testimonial-section .cycle-next {
  color: var(--primary);
}

html.darkMode #testimonial-section .cycle-prev, #testimonial-section .cycle-next {
  background-color: transparent;
  border: 2px solid var(--primary);
  color: var(--primary);
}

html.darkMode #testimonial-section .cycle-prev:hover,
html.darkMode #testimonial-section .cycle-prev:focus,
html.darkMode #testimonial-section .cycle-next:hover,
html.darkMode #testimonial-section .cycle-next:focus {
  background-color:var(--primary);
  color: var(--background);
}

/* Links */
html.darkMode #colophon .widget a {
    color: var(--primary);
}

html.darkMode .menu-toggle,
html.darkMode .site-header .icon-search {
  color: var(--foreground);
}

html.darkMode a.more-link,
html.darkMode .posts-navigation a {
  background-color: transparent;
}

/* Border */
html.darkMode .content-area,
html.darkMode .widget {
  border: none;
}


/* Fotografie Pro */
html.darkMode .blog-section-headline .page-title {
    background: var(--background);
}

html.darkMode .page-title-wrapper:before {
    border-top: 2px solid var(--foreground);
}


/* WEN Commerce */

html.darkMode #masthead,
html.darkMode #main-nav,
html.darkMode #breadcrumb,
html.darkMode #main,
html.darkMode .entry-content-wrapper,
html.darkMode .navigation .nav-links a, .navigation .nav-links a,
html.darkMode .sidebar .widget,
html.darkMode .comment .comment-body {
  background-color: transparent;
}

html.darkMode .sidebar a,
html.darkMode .sidebar a:visited,
html.darkMode #breadcrumb a,
html.darkMode #breadcrumb .breadcrumb-trail li::after {
    color: var(--primary);
}