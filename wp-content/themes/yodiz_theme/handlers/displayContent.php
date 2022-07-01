<?php

function displayCourses( $post ) {

	if ( $post->post_name === 'user_account' ) {
		if ( isset( $_SESSION['parentID'] ) ) {
			$parentID = $_SESSION['parentID']; // ID корневой страницы для курсов
		} else {
			$userMeta = json_decode( get_user_meta( get_current_user_id(), 'lessonsProgress' )[0] );
			$parentID = key( $userMeta );
		}
	} else {
		$parentID             = get_post_ancestors( $post->ID )[1]; // ID корневой страницы для курсов
		$_SESSION['parentID'] = $parentID;
	}

	$coursesPages = get_pages( [ 'parent' => $parentID ] );

	foreach ( $coursesPages as $index => $courseItem ) {
		?>
        <div class="course">
            <div class="course__header">
                <div class="text">
                    <h3><?php the_field( 'course_name', $courseItem->ID ); ?></h3>
                    <div class="info">
                        <p class="text-grey"><?= get_field( 'course_duration', $courseItem->ID ) ?></p>
                        <p class="students text-grey">
                            <svg width="30" height="16" viewBox="0 0 30 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M24.0451 6.0085C24.7381 6.0085 25.2999 5.44672 25.2999 4.75373C25.2999 4.06074 24.7381 3.49896 24.0451 3.49896C23.3521 3.49896 22.7903 4.06074 22.7903 4.75373C22.7903 5.44672 23.3521 6.0085 24.0451 6.0085ZM24.0451 7.5085C25.5665 7.5085 26.7999 6.27514 26.7999 4.75373C26.7999 3.23231 25.5665 1.99896 24.0451 1.99896C22.5237 1.99896 21.2903 3.23231 21.2903 4.75373C21.2903 6.27514 22.5237 7.5085 24.0451 7.5085Z"
                                      fill="#9090A9"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M22.1038 8.81057C22.7193 8.55565 23.3789 8.42444 24.045 8.42444C24.7112 8.42444 25.3708 8.55565 25.9863 8.81057C26.6017 9.0655 27.1609 9.43915 27.632 9.91019C28.103 10.3812 28.4766 10.9404 28.7316 11.5559C28.9865 12.1713 29.1177 12.8309 29.1177 13.4971H27.6177C27.6177 13.0279 27.5253 12.5634 27.3458 12.1299C27.1662 11.6964 26.9031 11.3026 26.5713 10.9708C26.2395 10.6391 25.8457 10.3759 25.4122 10.1964C24.9788 10.0168 24.5142 9.92444 24.045 9.92444C23.5759 9.92444 23.1113 10.0168 22.6778 10.1964C22.2444 10.3759 21.8505 10.6391 21.5188 10.9708L20.4581 9.91019C20.9292 9.43915 21.4884 9.0655 22.1038 8.81057Z"
                                      fill="#9090A9"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M14.8087 5.93554C15.9651 5.93554 16.9025 4.99814 16.9025 3.84179C16.9025 2.68545 15.9651 1.74805 14.8087 1.74805C13.6524 1.74805 12.715 2.68545 12.715 3.84179C12.715 4.99814 13.6524 5.93554 14.8087 5.93554ZM14.8087 7.43554C16.7935 7.43554 18.4025 5.82657 18.4025 3.84179C18.4025 1.85702 16.7935 0.248047 14.8087 0.248047C12.824 0.248047 11.215 1.85702 11.215 3.84179C11.215 5.82657 12.824 7.43554 14.8087 7.43554Z"
                                      fill="#9090A9"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M12.3637 9.34523C13.1389 9.02415 13.9697 8.85889 14.8087 8.85889C15.6477 8.85889 16.4786 9.02415 17.2537 9.34523C18.0289 9.66632 18.7332 10.1369 19.3265 10.7302C19.9198 11.3235 20.3904 12.0279 20.7115 12.803C21.0326 13.5782 21.1979 14.409 21.1979 15.248H19.6979C19.6979 14.606 19.5714 13.9702 19.3257 13.377L20.0186 13.09L19.3257 13.377C19.08 12.7839 18.7199 12.2449 18.2659 11.7909C17.8119 11.3369 17.2729 10.9768 16.6797 10.7311C16.0865 10.4853 15.4508 10.3589 14.8087 10.3589C14.1667 10.3589 13.5309 10.4853 12.9377 10.7311C12.3445 10.9768 11.8056 11.3369 11.3516 11.7909C10.8976 12.2449 10.5374 12.7839 10.2917 13.377C10.046 13.9702 9.91956 14.606 9.91956 15.248H8.41956C8.41956 14.409 8.58482 13.5782 8.9059 12.803C9.22699 12.0279 9.69761 11.3235 10.2909 10.7302C10.8842 10.1369 11.5885 9.66632 12.3637 9.34523Z"
                                      fill="#9090A9"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M5.57268 6.0085C6.26567 6.0085 6.82745 5.44672 6.82745 4.75373C6.82745 4.06074 6.26567 3.49896 5.57268 3.49896C4.8797 3.49896 4.31792 4.06074 4.31792 4.75373C4.31792 5.44672 4.8797 6.0085 5.57268 6.0085ZM5.57268 7.5085C7.0941 7.5085 8.32745 6.27514 8.32745 4.75373C8.32745 3.23231 7.0941 1.99896 5.57268 1.99896C4.05127 1.99896 2.81792 3.23231 2.81792 4.75373C2.81792 6.27514 4.05127 7.5085 5.57268 7.5085Z"
                                      fill="#9090A9"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M3.63144 8.81057C4.24688 8.55565 4.90651 8.42444 5.57266 8.42444C6.23881 8.42444 6.89844 8.55565 7.51389 8.81057C8.12933 9.0655 8.68854 9.43915 9.15958 9.91019L8.09892 10.9708C7.76717 10.6391 7.37332 10.3759 6.93986 10.1964C6.50641 10.0168 6.04183 9.92444 5.57266 9.92444C5.10349 9.92444 4.63892 10.0168 4.20546 10.1964C3.77201 10.3759 3.37816 10.6391 3.04641 10.9708C2.71466 11.3026 2.4515 11.6964 2.27195 12.1299C2.09241 12.5634 2 13.0279 2 13.4971H0.5C0.5 12.831 0.631208 12.1713 0.886133 11.5559C1.14106 10.9404 1.51471 10.3812 1.98575 9.91019C2.45679 9.43915 3.016 9.0655 3.63144 8.81057Z"
                                      fill="#9090A9"/>
                            </svg>
							<?php if ( get_field( 'course_availability', $courseItem->ID ) === 'free' ) {
								freeRandom();
							} else {
								paidRandom();
                            } ?> <span>— студента на курсе</span>
                        </p>
                    </div>
                </div>
				<?php if ( get_field( 'course_availability', $courseItem->ID ) === 'paid' && ! json_decode( get_user_meta( get_current_user_id(), 'lessonsProgress' )[0] )->$parentID->access ) { ?>
                    <a href="<?php the_field( 'link-for-pay', $parentID ) ?>" target="_blank"
                       class="btn blue-btn sidebar-btn">
                        <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.50171 9.93457H6.05151V12.9346H7.50171V9.93457Z" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M12.5721 8.43457C12.5721 8.41235 12.5721 8.39013 12.5721 8.3679V6.93457H11.1219H10.3968V4.69013C10.3968 2.61235 8.77601 0.93457 6.77133 0.93457C4.76664 0.93457 3.14583 2.61235 3.14583 4.69013V5.44568H4.60669V4.69013C4.60669 3.44568 5.57705 2.43457 6.78199 2.43457C7.98693 2.43457 8.95728 3.44568 8.95728 4.69013V6.93457H8.01892H5.83296H5.52373H4.60669H3.1565H2.72997H2.4314H0.981201V8.3679C0.981201 8.39013 0.981201 8.41235 0.981201 8.43457V14.4346C0.981201 14.4568 0.981201 14.479 0.981201 14.5012V15.9235H2.26079C2.3141 15.9346 2.36742 15.9346 2.4314 15.9346H11.1219C11.1752 15.9346 11.2392 15.9346 11.2925 15.9235H12.5721V14.5012C12.5721 14.479 12.5721 14.4568 12.5721 14.4346V8.43457ZM2.4314 14.4346V8.43457H11.1219V14.4346H8.01892H5.53439H2.4314Z"
                                  fill="white"/>
                        </svg>
                        Оплатить участие</a>
				<?php } ?>
            </div>
            <div class="course__progress">
                <ul class="lessons-list <?php if ( get_field( 'course_availability', $courseItem->ID ) === 'free' ) {
					echo 'free-lessons';
				} else echo 'paid-lessons' ?>">
					<?php displayLessons( $post, $index, $parentID ); ?>
                </ul>
            </div>
        </div>
		<?php
	}
}

function displayLessons( $post, $courseIndex, $parentID ) {

	$userID = get_current_user_id();

	$metaBD = get_user_meta( $userID, 'lessonsProgress' );

	$userMeta = json_decode( $metaBD[0] )->$parentID->list->{$courseIndex};

	foreach ( $userMeta->lessons as $value ) {
		if ( $value->isCompleted ) {
			if ( $value->block_name ) { ?>
                <li class="list-block">
                    <p class="course__block text-grey"><?= $value->block_name ?></p>
                </li>
			<?php } ?>
            <li class="<?php selectingPage( $post->post_name, $value->name ) ?> free-item completed">
                <a <?php if ( $post->post_name !== $value->name ) { ?> href="<?php echo $value->link ?> " <?php } ?> >
					<?php if ( $value->increment ) { ?>
                        <p class="number"><?= $value->increment ?></p>
					<?php } ?>
                    <p class="title-text">
                        <svg width="8" height="8" viewBox="0 0 9 8" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <circle cx="4.71875" cy="4" r="4" fill="#D0D0E1"/>
                        </svg>
						<span><?= $value->title ?></span>
                    </p>
                </a>
            </li>
		<?php } else {
			if ( $value->block_name ) { ?>
                <li class="list-block">
                    <p class="course__block text-grey"><?= $value->block_name ?></p>
                </li>
			<?php } ?>
            <li class="<?php selectingPage( $post->post_name, $value->name ) ?> free-item">
                <a>
					<?php if ( $value->increment ) { ?>
                        <p class="number"><?= $value->increment ?></p>
					<?php } ?>
                    <p class="title-text">
                        <svg width="8" height="8" viewBox="0 0 9 8" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <circle cx="4.71875" cy="4" r="4" fill="#D0D0E1"/>
                        </svg>
						<span><?= $value->title ?></span>
                    </p>
                </a>
            </li>
		<?php }
	}
}

function allCourses( $post ) {


}

function selectingPage( $post, $link ) {
	if ( $post == $link ) {
		echo 'selected';
	}
}

function showVideos() {
	$videoList = fillVideosArray();

	if ( $videoList != null ) {

		foreach ( $videoList as $index => $post_item ) {

			$videoTitle = get_post_meta( (int) SCF::get( 'videos' )[0][ $index ] )['video_title']; ?>
            <div class="theory content-item video-block">
                <h3><?= $videoTitle[0] ?></h3>
                <div class="video">
                    <iframe src="https://player.vimeo.com/video/<?= $post_item['video_link'] ?>"
                            frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                            width="100%" height="100%"></iframe>
                </div>

                <ul>
					<?
					if ( $post_item['timecodes']['name'][0] != null ) {
						for ( $i = 0; $i < count( $post_item['timecodes']['time'] ); $i ++ ) { ?>
                            <li>
                                <a class="timecode timecode-theory"
                                   data-timecode="<?= $post_item['timecodes']['time'][ $i ] ?>"
                                   data-index="<?= $index ?>">
                                    <svg width="8" height="8" viewBox="0 0 9 8" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="4.71875" cy="4" r="4" fill="#D0D0E1"/>
                                    </svg>
									<?= $post_item['timecodes']['name'][ $i ] ?>
                                </a>
                            </li>
						<? }
					} ?>

                </ul>
            </div>
			<?php
		}
	}
}

function fillVideosArray() {

	$video_timecodes = [];

	if ( sizeof( SCF::get( 'videos' ) ) > 0 ) {

		$videos = SCF::get( 'videos' )[0];

		for ( $i = 0; $i < sizeof( $videos ); $i ++ ) {

			$full_meta = get_post_meta( (int) $videos[ $i ] );

			$video_lessons                       = $full_meta['name'];
			$video_times                         = $full_meta['time'];
			$video_timecodes[ $i ]['video_link'] = $full_meta['video_link'][0];

			for ( $j = 0; $j < count( $video_lessons ); $j ++ ) {
				$video_timecodes[ $i ]['timecodes']['name'][ $j ] = $video_lessons[ $j ];
				$video_timecodes[ $i ]['timecodes']['time'][ $j ] = $video_times[ $j ];
			}
		}

		return $video_timecodes;
	}
}

function showMaterials() {

	if ( SCF::get( 'materials_post' )[0]['materials'] != null ) {

		$materials_list = get_post_meta( (int) SCF::get( 'materials_post' )[0]['materials'][0] );

		if ( $materials_list != null ) {

			?>
            <div class="materials content-item">
                <h3>Материалы</h3>
				<? for ( $i = 0; $i < count( $materials_list['materials_link'] ); $i ++ ) { ?>
                    <a href="<?= $materials_list['materials_link'][ $i ] ?>"
                       target="_blank">
                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M0.275391 0.693726H9.24988L13.5903 5.03419V17.0937H0.275391V0.693726ZM1.67539 2.09373V15.6937H12.1903V5.61409L8.66998 2.09373H1.67539Z"
                                  fill="#202027"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M7.27539 1.37805H8.67539V5.61624H12.7654V7.01624H7.27539V1.37805Z" fill="#202027"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M10.4722 10.1374H3.39404V8.73743H10.4722V10.1374Z" fill="#202027"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M7.58496 13.3249H3.39404V11.9249H7.58496V13.3249Z" fill="#202027"/>
                        </svg>
						<?= $materials_list['name_link'][ $i ] ?></a>

				<? } ?>
            </div>
			<?php
		}
	}
}

?>