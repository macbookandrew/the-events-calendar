<?php
/**
 * View: Month View - Day
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/views/v2/month/day.php
 *
 * See more documentation about our views templating system.
 *
 * @link {INSERT_ARTCILE_LINK_HERE}
 *
 * @version TBD
 *
 */
// @todo: This is just for presentation purposes, while building the view.
$day_number  = ( $week < 1 ) ? ( $day + 1 ) * ( $week + 1 ) : ( $day + 1 ) + $week * 7;

$day_title_classes = [ 'tribe-events-calendar-month__day-date' ];
$day_id = 'tribe-events-calendar-day-' . $day_number;

// @todo: check if we use classes here or if we wrap the day block directly with the classes (we also have `.tribe-events-calendar-month__day-date--current`).
if ( $day_number == date( 'd', time() ) ) {
	$day_title_classes[] = 'tribe-events-calendar-month__day-date--current';
}
?>

<div class="tribe-events-calendar-month__day" role="gridcell" aria-labelledby="<?php echo esc_attr( $day_id ); ?>">
	<div id="<?php echo esc_attr( $day_id ); ?>">
		<h4 class="<?php echo esc_attr( implode( ' ', $day_title_classes ) ); ?>">
			<span class="tribe-common-a11y-hidden">X events, </span>
			<time datetime="YYYY-MM-DD">
				<a href="#link-to-day-view-if-it-has-events">
					<?php echo esc_html( $day_number ); ?>
				</a>
			</time>
		</h4>
	</div>
	<!-- Events for this day will be listed here -->
</div>