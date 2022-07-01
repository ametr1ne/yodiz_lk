<?php
add_action( 'wp_ajax_nextLesson', 'nextLesson' );

function nextLesson() {

	$linkForAdd = $_POST['data'][0];
	$userID     = get_current_user_id();

	$courseID = get_post_ancestors( $linkForAdd['post'] )[1];

	$lessonProgress  = json_decode( get_user_meta( $userID, 'lessonsProgress' )[0] );
	$lessonsList = $lessonProgress->$courseID->list;
	$skillsList = json_decode( get_user_meta( $userID, 'skillsProgress' )[0] );
	$skillsProgress = $skillsList->$courseID;

//	foreach ( $lessonsList as $course ) {
//		foreach ( $course->lessons as $lesson ) {
//			if ( $lesson->link === $linkForAdd['link'] && $lesson->isCompleted === false) {
//				$lesson->isCompleted = true;
//
//				$skillsProgress->overallProgress += $lesson->overallProgress;
//				$skillsProgress->figmaProgress   += $lesson->figmaProgress;
//				$skillsProgress->psProgress      += $lesson->psProgress;
//				$skillsProgress->ilProgress      += $lesson->ilProgress;
//				$skillsProgress->anProgress      += $lesson->anProgress;
//				$skillsProgress->normProgress    += $lesson->normProgress;
//				$skillsProgress->techProgress    += $lesson->techProgress;
//				$skillsProgress->uxProgress      += $lesson->uxProgress;
//				$skillsProgress->motionProgress  += $lesson->motionProgress;
//
//				update_user_meta( $userID, 'skillsProgress', json_encode( $skillsList, JSON_UNESCAPED_UNICODE ) );
//				update_user_meta( $userID, 'lessonsProgress', json_encode( $lessonProgress, JSON_UNESCAPED_UNICODE ) );
//			}
//		}
//	}

//	echo json_encode($courseID);

	echo json_encode( array( 'status' => 'redirect', 'url' => $linkForAdd['link'] ) );

	wp_die();
}

?>