<?php
/**
 * Template Name: Расписание *
 */

/* Общая информация для всех сраниц */

if ( ! isset( $_COOKIE['userID'] ) ) {
	header( 'Location: ' . home_url() . '/authorization' );
}

$userID = $_COOKIE['userID'];

if ( isset( $_GET['course'] ) ) {
    $parentID = $_GET['course'];
    $coursesPages = get_field( 'subcourses', $parentID );
} else {
	$coursesPages = get_pages( [ 'parent' => $post->ID ] );
}

$bitrixUser = new BitrixBackend_User();

$user = $bitrixUser->getUserById( $_COOKIE['userID'] );

if ( isset( $user ) ) {
	$userFirstName = $user->NAME;
	$userLastName  = $user->LAST_NAME;
	$userName      = $userFirstName . ' ' . $userLastName;
} else {
	$userName = 'Имя не задано';
}

/* // Общая информация для всех сраниц */
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/scss/schedule.css"/>
    <link rel="icon" type="image/x-icon" href="<?= get_template_directory_uri() ?>/assets/img/favicon.svg">
    <script defer src="<?= get_template_directory_uri() ?>/assets/js/jquery.min.js"></script>
    <script defer src="<?= get_template_directory_uri() ?>/assets/js/shedule.js"></script>
    <title>Расписание занятий</title>
</head>
<body>
<header class="header">
    <div class="header__burger-box">
        <button type="button" class="header__burger">
            <span class="header__line header__line--1"></span>
            <span class="header__line header__line--2"></span>
            <span class="header__line header__line--3"></span>
        </button>
    </div>
    <div class="header__wrapper">
        <div class="header__left">
            <div class="header__logo">
                <svg width="70" height="54" viewBox="0 0 70 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M52.0732 0.263916H17.9268L0 18.3755L35 53.7361L70 18.3755L52.0732 0.263916ZM40.0707 26.1548V39.0744H29.9293V26.1548L17.9268 14.0115L23.8512 8.02601L35 19.2897L46.1488 8.02601L52.0732 14.0115L40.0707 26.1548Z"
                          fill="white"/>
                </svg>
            </div>
            <div class="header__links">
                <a href="<?= home_url() ?>/courses">Мои курсы</a>
            </div>
        </div>
        <div class="header__btns">
            <a href="<?= home_url() ?>/user_account/" class="btn header-btn white-btn user-btn">
                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M7.19482 6.1875C8.35117 6.1875 9.28857 5.25009 9.28857 4.09375C9.28857 2.9374 8.35117 2 7.19482 2C6.03848 2 5.10107 2.9374 5.10107 4.09375C5.10107 5.25009 6.03848 6.1875 7.19482 6.1875ZM7.19482 7.6875C9.17959 7.6875 10.7886 6.07852 10.7886 4.09375C10.7886 2.10898 9.17959 0.5 7.19482 0.5C5.21005 0.5 3.60107 2.10898 3.60107 4.09375C3.60107 6.07852 5.21005 7.6875 7.19482 7.6875Z"
                          fill="black"/>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M4.7498 9.59719C5.52497 9.2761 6.35578 9.11084 7.19482 9.11084C8.03386 9.11084 8.86468 9.2761 9.63985 9.59719C10.415 9.91827 11.1194 10.3889 11.7126 10.9822C12.3059 11.5755 12.7765 12.2798 13.0976 13.055C13.4187 13.8301 13.584 14.661 13.584 15.5H12.084C12.084 14.8579 11.9575 14.2222 11.7118 13.629L12.4047 13.342L11.7118 13.629C11.4661 13.0358 11.106 12.4968 10.652 12.0428C10.198 11.5888 9.659 11.2287 9.06582 10.983C8.47264 10.7373 7.83687 10.6108 7.19482 10.6108C6.55277 10.6108 5.917 10.7373 5.32382 10.983C4.73064 11.2287 4.19166 11.5888 3.73767 12.0428C3.28366 12.4968 2.92353 13.0358 2.67783 13.629C2.43213 14.2222 2.30566 14.8579 2.30566 15.5H0.805664C0.805664 14.661 0.970924 13.8301 1.29201 13.055C1.61309 12.2798 2.08372 11.5755 2.677 10.9822C3.27029 10.3889 3.97463 9.91827 4.7498 9.59719Z"
                          fill="black"/>
                </svg>
				<?php echo $userName ?></a>
            <a href="<?= home_url() ?>" class="btn header-btn d_greyborder-btn logout-btn">Выйти</a>
        </div>
    </div>
</header>

<aside class="aside">
    <div class="aside__wrap">
        <div class="aside__top">
            <a href="<?= home_url() ?>/courses"><h2>На главную</h2></a>
        </div>
        <div class="aside__btns">
            <a href="<?= home_url() ?>/user_account" class="btn greyborder-btn">Настройки аккаунта</a>
            <a href="<?= home_url() ?>" class="btn greyborder-btn">Выход</a>
        </div>
    </div>
</aside>

<main class="main">
    <div class="content">
        <div class="content__wrapper">
            <h1>Расписание занятий</h1>

            <p class="breadcrumbs"><a href="<?= home_url() ?>/courses">Мои курсы</a><span> / </span>
                <span class="text-grey">Расписание</span>
            </p>

			<?php $deal = new BitrixBackend_Deal();

			foreach ( $coursesPages as $index => $course ) {

				/*--- course fields -----*/
				$courseID = $course->ID;

				$courseDeal = $deal->getDeal( $userID, $courseID );

				if ( ! empty( $courseDeal ) ) {
					$openDatesArray = $courseDeal[0]->UF_CRM_1656500689;
					/* --- course tariff (0 - free, 1 - without feedback, 2 - full ) ----*/
					$courseAccess = $courseDeal[0]->UF_CRM_1656513994;
				} else {
					$openDatesArray = null;
					/* --- course tariff (0 - free, 1 - without feedback, 2 - full ) ----*/
					$courseAccess = null;
				}

				$btxLesson = new BitrixBackend_Lesson();

				$lessons = $btxLesson->getAllLessons( get_field( 'section_id', $courseID ) );

				/*----- // course fields ------*/

				?>

                <div class="schedule__body">
                    <div class="schedule__header">
                        <div class="course-category">
                            <p><?php if ( ! get_field( 'course_paid', $courseID ) ) {
									echo 'Подготовительный курс';
								} else echo 'Основной курс' ?></p>
                            <p><?= get_field( 'course_duration', $courseID ) ?></p>
                        </div>
                        <h2 class="title"><?= get_field( 'course_name', $courseID ) ?></h2>
                        <div class="course-info">
                            <p class="access">
								<?php if ( ! get_field( 'course_paid', $courseID ) ) {
									?>
                                    <svg class="access__free" width="9" height="9" viewBox="0 0 9 9" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="4.28125" cy="4.99463" r="4" fill="#8DE300"/>
                                    </svg>
                                    Бесплатное участие
									<?php
								} else {
									// if deal for this course is not exists it will be closed
									if ( empty( $courseDeal ) ) { ?>
                                        <svg class="access__paid" width="13" height="16" viewBox="0 0 13 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.00635 9.96875H5.55615V12.9688H7.00635V9.96875Z" fill="#696978"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M12.0768 8.46875C12.0768 8.44653 12.0768 8.42431 12.0768 8.40208V6.96875H10.6266H9.90146V4.72431C9.90146 2.64653 8.28065 0.96875 6.27596 0.96875C4.27128 0.96875 2.65047 2.64653 2.65047 4.72431V5.47986H4.11133V4.72431C4.11133 3.47986 5.08168 2.46875 6.28663 2.46875C7.49157 2.46875 8.46192 3.47986 8.46192 4.72431V6.96875H7.52356H5.3376H5.02837H4.11133H2.66113H2.23461H1.93604H0.48584V8.40208C0.48584 8.42431 0.48584 8.44653 0.48584 8.46875V14.4688C0.48584 14.491 0.48584 14.5132 0.48584 14.5354V15.9576H1.76543C1.81874 15.9687 1.87206 15.9688 1.93604 15.9688H10.6266C10.6799 15.9688 10.7438 15.9687 10.7972 15.9576H12.0768V14.5354C12.0768 14.5132 12.0768 14.491 12.0768 14.4688V8.46875ZM1.93604 14.4688V8.46875H10.6266V14.4688H7.52356H5.03903H1.93604Z"
                                                  fill="#696978"/>
                                        </svg>
                                        Платное участие
									<?php } else // if deal for this course exists and courseAccess = 1, then course is without feedback
										if ( $courseAccess === '1' ) { ?>
                                            <svg class="access__free" width="9" height="9" viewBox="0 0 9 9" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="4.28125" cy="4.99463" r="4" fill="#8DE300"/>
                                            </svg>
                                            Тариф без обратной связи
										<?php } else // if deal for this course exists and courseAccess = 2, then course is with feedback
											if ( $courseAccess === '2' ) { ?>
                                                <svg class="access__free" width="9" height="9" viewBox="0 0 9 9"
                                                     fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="4.28125" cy="4.99463" r="4" fill="#8DE300"/>
                                                </svg>
                                                Тариф с обратной связью
											<?php } ?>
								<?php } ?>
                            </p>
                            <p class="students">
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
								<?php if ( ! get_field( 'course_paid', $courseID ) ) {
									freeRandom();
								} else {
									paidRandom();
								} ?> <span>— ученика проходит курс</span>
                            </p>
                        </div>
                    </div>
                    <div class="course__progress">

                        <!-- if course is paid -->

						<?php if ( get_field( 'course_paid', $courseID ) ) {

							// if deal for this course is not exists then show buttons with links for pay
							if ( empty( $courseDeal ) ) { ?>

                                <div class="btns-box">
                                    <a href="https://yodizschool.ru/online#block12" class="btn blue-btn">
                                        <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.50195 9.25195H6.05176V12.252H7.50195V9.25195Z" fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M12.5724 7.75195C12.5724 7.72973 12.5724 7.70751 12.5724 7.68529V6.25195H11.1222H10.3971V4.00751C10.3971 1.92973 8.77625 0.251953 6.77157 0.251953C4.76689 0.251953 3.14608 1.92973 3.14608 4.00751V4.76306H4.60694V4.00751C4.60694 2.76306 5.57729 1.75195 6.78223 1.75195C7.98718 1.75195 8.95753 2.76306 8.95753 4.00751V6.25195H8.01917H5.83321H5.52397H4.60694H3.15674H2.73021H2.43164H0.981445V7.68529C0.981445 7.70751 0.981445 7.72973 0.981445 7.75195V13.752C0.981445 13.7742 0.981445 13.7964 0.981445 13.8186V15.2408H2.26103C2.31435 15.252 2.36766 15.252 2.43164 15.252H11.1222C11.1755 15.252 11.2395 15.252 11.2928 15.2408H12.5724V13.8186C12.5724 13.7964 12.5724 13.7742 12.5724 13.752V7.75195ZM2.43164 13.752V7.75195H11.1222V13.752H8.01917H5.53464H2.43164Z"
                                                  fill="white"/>
                                        </svg>
                                        Оплатить участие</a>
                                    <a href="https://yodizschool.ru/online" class="btn greyborder-btn">
                                        Подробная информация о курсе</a>
                                </div>

							<?php } // if course deal is exists and courseAccess = 1, then show button for pay full course
							else if ( $courseAccess === '1' ) { ?>

                                <a class="btn grey-btn">Перейти на тариф с обратной связью
                                    <span class="teachers">
                                        <img class="dima"
                                             src="<?= get_template_directory_uri() ?>/assets/img/1.png"
                                             alt="1">
                                        <img class="lika"
                                             src="<?= get_template_directory_uri() ?>/assets/img/2.png"
                                             alt="2">
                                        <img class="lesha"
                                             src="<?= get_template_directory_uri() ?>/assets/img/3.png"
                                             alt="3">
                                    </span>
                                </a>
							<?php } ?>
						<?php } ?>

                        <ul class="lessons-list <?php if ( get_field( 'course_paid', $courseID ) ) {
							echo 'paid-lessons course-closed';
						} else echo 'free-lessons' ?>">

							<?php foreach ( $lessons as $ind => $lesson ) {

								/*--- lesson fields -----*/

								$isIntroLesson = (bool) $lesson->PROPERTY_136;

								if ( ! empty( $openDatesArray ) ) {
									$lessonOpened = date( 'U' ) >= date( 'U', strtotime( $openDatesArray[ $ind ] ) );
								} else {
									$lessonOpened = false;
								}

								$startBlock = $lesson->PROPERTY_138;

								/*---- // lesson fields -----*/

								if ( $startBlock ) { ?>

                                    <li class="list-block">
                                        <p class="course__block text-grey"><?= $startBlock->value ?></p>
                                    </li>

								<?php } ?>

                                <li class="list-item<?php if ( $lessonOpened )
									echo ' available' ?>">
                                    <a class="link"
									   <?php if ( $lessonOpened ) { ?>href="<?= home_url() ?>/courses/schedule/lesson?id=<?= $lesson->ID ?>" <?php } ?> >
                                        <div class="li__title">

											<?php if ( ! $isIntroLesson ) { ?>

                                                <span class="number"></span>

											<?php } ?>

                                            <p class="title-text">

                                                <!-- if course is paid and it not have course deal then show lock icon -->
												<?php if ( get_field( 'course_paid', $courseID ) && empty( $courseDeal ) ) { ?>
                                                    <svg id="locked" width="13" height="16" viewBox="0 0 13 16"
                                                         fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.21118 9.5657H5.76099V12.5657H7.21118V9.5657Z"
                                                              fill="#9090A9"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M12.2813 8.06567C12.2813 8.04345 12.2813 8.02123 12.2813 7.99901V6.56567H10.8311H10.106V4.32123C10.106 2.24345 8.48524 0.565674 6.48055 0.565674C4.47587 0.565674 2.85506 2.24345 2.85506 4.32123V5.07678H4.31592V4.32123C4.31592 3.07678 5.28627 2.06567 6.49122 2.06567C7.69616 2.06567 8.66651 3.07678 8.66651 4.32123V6.56567H7.72815H5.54219H5.23296H4.31592H2.86572H2.4392H2.14063H0.69043V7.99901C0.69043 8.02123 0.69043 8.04345 0.69043 8.06567V14.0657C0.69043 14.0879 0.69043 14.1101 0.69043 14.1323V15.5546H1.97001C2.02333 15.5657 2.07665 15.5657 2.14063 15.5657H10.8311C10.8845 15.5657 10.9484 15.5657 11.0018 15.5546H12.2813V14.1323C12.2813 14.1101 12.2813 14.0879 12.2813 14.0657V8.06567ZM2.14063 14.0657V8.06567H10.8311V14.0657H7.72815H5.24362H2.14063Z"
                                                              fill="#9090A9"/>
                                                    </svg>
													<?php
												} else { ?>
                                                    <svg width="8" height="8" viewBox="0 0 9 8" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="4.71875" cy="4" r="4" fill="#D0D0E1"></circle>
                                                    </svg>
												<?php } ?>
												<?= $lesson->NAME ?>
                                            </p>
                                        </div>
										<?php
										if ( ! $isIntroLesson && isset( $openDatesArray ) ) { ?>
                                            <div class="date"><p class="date-item"><?php

													$arr   = [
														'января',
														'февраля',
														'марта',
														'апреля',
														'мая',
														'июня',
														'июля',
														'августа',
														'сентября',
														'октября',
														'ноября',
														'декабря'
													];
													$month = date( 'n', strtotime( $openDatesArray[ $ind ] ) ) - 1;
													$day   = date( 'j', strtotime( $openDatesArray[ $ind ] ) );
													$hour  = date( 'H', strtotime( $openDatesArray[ $ind ] ) );
													$min   = date( 'i', strtotime( $openDatesArray[ $ind ] ) );

													echo date( "$day $arr[$month], $hour:$min" ) ?> мск</p></div>
										<?php } ?>
                                    </a>
                                </li>
							<?php } ?>
                        </ul>
                    </div>
                </div>
			<?php } ?>
        </div>
    </div>
</main>
<?php get_footer() ?>
</body>
</html>