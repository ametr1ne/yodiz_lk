<?php
global $wpdb;

$bd_date = $wpdb->get_results( "SELECT datetime FROM randomizer_bd WHERE `name` = 'free_random'" );

$current_date = date( 'U' );

if ( ( $bd_date[0]->datetime + 86400 ) < $current_date ) {

	$wpdb->update( 'randomizer_bd',
		[ 'datetime' => date( 'U' ) ],
		[ 'name' => 'free_random' ]
	);

	$wpdb->update( 'randomizer_bd',
		[ 'datetime' => date( 'U' ) ],
		[ 'name' => 'paid_random' ]
	);

	$wpdb->update( 'randomizer_bd',
		[ 'value' => rand( 463, 485 ) ],
		[ 'name' => 'free_random' ]
	);

	$wpdb->update( 'randomizer_bd',
		[ 'value' => rand( 45, 59 ) ],
		[ 'name' => 'paid_random' ]
	);
}

function freeRandom() {
	global $wpdb;

	$users_count = $wpdb->get_results( "SELECT value FROM randomizer_bd WHERE `name` = 'free_random'" );

	echo $users_count[0]->value;
}

function paidRandom() {
	global $wpdb;

	$users_count = $wpdb->get_results( "SELECT value FROM randomizer_bd WHERE `name` = 'paid_random'" );

	echo $users_count[0]->value;
}
?>