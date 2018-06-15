<?php
add_filter('tribe_events_the_previous_month_link', 'events_change_prev_link');
function events_change_prev_link()
{
    //$html = '<a data-month="' . $date . '" href="' . esc_url($url) . '" rel="prev"><i class="fa fa-arrow-circle-left"></i> ' . $text . ' </a>';

	$url = tribe_get_previous_month_link();
    $date = TribeEvents::instance()->previousMonth(tribe_get_month_view_date());
    $text = tribe_get_previous_month_text();
    $html = '<a data-month="' . $date . '" href="' . $url . '" rel="prev"><i class="fa fa-arrow-circle-left"></i> ' . $text . ' </a>';

	return $html;
}

add_filter('tribe_events_the_next_month_link', 'events_change_next_link');
function events_change_next_link()
{
    //$html = '<a data-month="' . $date . '" href="' . esc_url($url) . '" rel="prev"><i class="fa fa-arrow-circle-left"></i> ' . $text . ' </a>';

	$url = tribe_get_next_month_link();
    $date = TribeEvents::instance()->nextMonth(tribe_get_month_view_date());
    $text = tribe_get_next_month_text();
    $html = '<a data-month="' . $date . '" href="' . $url . '" rel="next">' . $text . ' <i class="fa fa-arrow-circle-right"></i> </a>';

	return $html;
}

function bhass_remove_rec_tooltip( $template ) {
    Tribe__Events__Pro__Main::instance()->disable_recurring_info_tooltip();
}
?>