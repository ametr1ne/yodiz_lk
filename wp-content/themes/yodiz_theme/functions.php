<?php

session_start();

add_filter( 'wp_is_application_passwords_available', '__return_true' );

function my_enqueue()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('ajax-script', get_template_directory_uri() . '/assets/js/my-ajax-script.js', array('jquery'));
    wp_enqueue_script('jquery-cookies', get_template_directory_uri() . '/assets/js/jquery.cookies.js', array('jquery'));
    wp_enqueue_script('global', get_template_directory_uri() . '/assets/js/global.js', array('jquery', 'jquery-cookies'));
    wp_localize_script('ajax-script', 'myajax', array('url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'my_enqueue');

include 'WPRest.php';
include 'Users.php';
//include 'handlers/displayContent.php';
//include 'handlers/login.php';
//include 'handlers/displayExhibitorNum.php';
//include 'handlers/updatingUserMeta.php';
//include 'bitrix/BitrixBackend.php';
//include 'bitrix/BitrixBackend_User.php';
//include 'bitrix/BitrixBackend_Course.php';
//include 'bitrix/BitrixBackend_Deal.php';
//include 'bitrix/BitrixBackend_Lesson.php';

//var_dump(CallAPI('GET', 'http://localhost/lk_wp/wp-json/wp/v2/users'));

//$curl = curl_init();
//curl_setopt($curl, CURLOPT_URL, 'http://httpbin.org/get?qwe=rty&a=qqq');
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//$out = curl_exec($curl);
//curl_close($curl);
//
//echo $out;

//if (isset(get_user_meta(get_current_user_id(), 'lessonsProgress')[0])) {
//
//    $lessons = json_decode(get_user_meta(get_current_user_id(), 'lessonsProgress')[0]);
//    $skillsList = json_decode(get_user_meta(get_current_user_id(), 'skillsProgress')[0]);
//
//    foreach ($lessons as $key => $value) {
//        foreach ($value->list as $item) {
//            foreach ($item->lessons as $lesson) {
//                if (isset($lesson->timeOpen)) {
//                    if (strtotime($lesson->timeOpen) < strtotime(date('d.m.Y H:i')) && !$lesson->isCompleted) {
//                        $lesson->isCompleted = true;
//
//                        $skillsProgress = $skillsList->$key;
//
//                        $skillsProgress->overallProgress += $lesson->overallProgress;
//                        $skillsProgress->figmaProgress += $lesson->figmaProgress;
//                        $skillsProgress->psProgress += $lesson->psProgress;
//                        $skillsProgress->ilProgress += $lesson->ilProgress;
//                        $skillsProgress->anProgress += $lesson->anProgress;
//                        $skillsProgress->normProgress += $lesson->normProgress;
//                        $skillsProgress->techProgress += $lesson->techProgress;
//                        $skillsProgress->uxProgress += $lesson->uxProgress;
//                        $skillsProgress->motionProgress += $lesson->motionProgress;
//
//                        update_user_meta(get_current_user_id(), 'skillsProgress', json_encode($skillsList, JSON_UNESCAPED_UNICODE));
//
//                        update_user_meta(get_current_user_id(), 'lessonsProgress', json_encode($lessons, JSON_UNESCAPED_UNICODE));
//                    }
//                }
//            }
//        }
//    }
//}

//// closing REST API from public
//add_filter('rest_authentication_errors', function ($result) {
//
//    if (is_null($result) && !current_user_can('edit_others_posts')) {
//        header("HTTP/1.1 404 Not Found");
//        die();
//    }
//    return $result;
//});

// removing admin bar
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar()
{
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

// redirecting from site admin part
add_action('init', 'blockusers_init');
function blockusers_init()
{
    if (is_admin() && !current_user_can('administrator') &&
        !(defined('DOING_AJAX') && DOING_AJAX)) {
        wp_redirect(home_url());
        exit;
    }
}

/*---------------------------- Edit user profile (START) ---------------------------------------*/

add_action('edit_user_profile', 'true_show_profile_fields');

function true_show_profile_fields($user)
{

    echo '<h2>Дополнительная информация</h2>';

    echo '<h4>Номер телефона</h4>
 	<p>' . get_user_meta($user->ID, 'phone')[0] . '</p>';

    echo '<h4>Дата рождения</h4>
 	<p>' . get_user_meta($user->ID, 'date')[0] . '</p>';

    echo '<h4>Пол</h4>';

    if (get_user_meta($user->ID, 'sex')[0] === 'female') {
        echo '<p>Женский</p>';
    } else {
        echo '<p>Мужской</p>';
    }

    $coursesParentId = 875;
    $courses = get_pages(['parent' => $coursesParentId, 'sort_column' => 'menu_order']);
    $userAccess = json_decode(get_user_meta($user->ID, 'lessonsProgress')[0]);

    foreach ($courses as $i => $course) {
        if (isset($userAccess->{$course->ID})) { ?>
            <h3>
                <label for="access">Курс <a
                            href="<?= get_field('first_lesson_link', $course->ID) ?>"><?php the_field('course_name', $course->ID); ?></a>
                    ID: <?php echo $course->ID ?></label>
            </h3>
            <label for="access<?php echo $i ?>">Доступ к курсу без обратной связи</label>
            <input type="checkbox" name="access<?php echo $i ?>"
                   id="access<?php echo $i ?>" <?php if ($userAccess->{$course->ID}->access) {
                echo 'checked="checked"';
            } ?> />
            <label for="full_access<?php echo $i ?>">Полный доступ к курсу</label>
            <input type="checkbox" name="full_access<?php echo $i ?>"
                   id="full_access<?php echo $i ?>" <?php if ($userAccess->{$course->ID}->fullAccess) {
                echo 'checked="checked"';
            } ?> />
            <?php $startTime = '0';
            foreach ($userAccess->{$course->ID}->list as $item) {
                if ($item->courseType === 'paid') {
                    $startTime = $item->startTime;
                    if (!isset($startTime)) {
                        $startTime = 'Не определено';
                    }
                }
            } ?>
            <label for="start_date<?php echo $i ?>">Дата начала курса</label>
            <input type="text" name="start_date<?php echo $i ?>" id="start_date<?php echo $i ?>"
                   value="<?= $startTime ?>"/>
        <?php }
    }
}

add_action('edit_user_profile_update', 'true_save_profile_fields');

function true_save_profile_fields($user_id)
{
    $coursesParentId = 875;
    $courses = get_pages(['parent' => $coursesParentId, 'sort_column' => 'menu_order']);

    foreach ($courses as $i => $course) {
        if (isset($_POST['access' . $i])) {
            $lessonsProgress = json_decode(get_user_meta($user_id, 'lessonsProgress')[0]);
            $tmp = $lessonsProgress->{$course->ID};
            $tmp->access = true;
            update_user_meta($user_id, 'lessonsProgress', json_encode($lessonsProgress, JSON_UNESCAPED_UNICODE));
        }
        if (isset($_POST['full_access' . $i])) {
            $lessonsProgress = json_decode(get_user_meta($user_id, 'lessonsProgress')[0]);
            $tmp = $lessonsProgress->{$course->ID};
            $tmp->fullAccess = true;
            update_user_meta($user_id, 'lessonsProgress', json_encode($lessonsProgress, JSON_UNESCAPED_UNICODE));
        }
        if (isset($_POST['start_date' . $i])) {

            $startDate = date('d.m.Y H:i', strtotime($_POST['start_date' . $i]));
            $lessonsProgress = json_decode(get_user_meta($user_id, 'lessonsProgress')[0]);
            $tmp = $lessonsProgress->{$course->ID}->list;

            foreach ($tmp as $value) {
                if ($value->courseType === 'paid') {
                    $value->startTime = $_POST['start_date' . $i];
                    foreach ($value->lessons as $lesson) {
                        if (!get_field('intro_lesson', $lesson->ID)) {
                            $lesson->timeOpen = $startDate;
                            $startDate = date('d.m.Y H:i', strtotime("$startDate + 5 days"));
                        } else {
                            $lesson->isCompleted = true;
                            $lesson->timeOpen = date('d.m.Y H:i');
                        }
                    }
                }
            }

            update_user_meta($user_id, 'lessonsProgress', json_encode($lessonsProgress, JSON_UNESCAPED_UNICODE));
        }
    }
}

/*---------------------------- Edit user profile (END) ---------------------------------------*/

function formData($postData)
{
    $end_array = [];
    foreach ($postData as $value) {
        $end_array[$value['name']] = $value['value'];
    }

    return $end_array;
}

//function checkingUser($post)
//{
//
//	if ( $post->post_name === 'user_account' ) {
//		$courseID = $_SESSION['parentID'];
//	} else {
//		$courseID = get_post_ancestors( $post->ID )[1];
//	}
//
//	$lessonsProgress = json_decode( get_user_meta( get_current_user_id(), 'lessonsProgress' )[0] );
//	$userAccess      = $lessonsProgress->$courseID->access;
//
//	if ( $userAccess ) {
//		foreach ( $lessonsProgress->$courseID->list as $course ) {
//			if ( $course->courseType === 'paid' ) {
//				$course->lessons->{0}->isCompleted = true;
//				update_user_meta( get_current_user_id(), 'lessonsProgress', json_encode( $lessonsProgress, JSON_UNESCAPED_UNICODE ) );
//			}
//		}
//	}
//}
//
//function checkingAvailableCourses($post)
//{
//
//    if ($post->post_name !== 'user_account') {
//        $courseID = get_post_ancestors($post->ID)[1];
//
//        $lessonsProgress = json_decode(get_user_meta(get_current_user_id(), 'lessonsProgress')[0]);
//
//        if ($lessonsProgress->$courseID === null) {
//            initLessons(get_current_user_id(), $courseID, true);
//        }
//    }
//}
//
//function initLessons($userID, $courseID, $again)
//{
//
//    /*------------------ Получаем подкурсы ------------------ */
//
//    $coursesPages = get_pages(['parent' => $courseID]);
//
//    if ($again) {
//        $coursesList = json_decode(get_user_meta(get_current_user_id(), 'lessonsProgress')[0]);
//        $skillsProgress = json_decode(get_user_meta(get_current_user_id(), 'skillsProgress')[0]);
//    } else {
//        $coursesList = (object)array();
//        $skillsProgress = (object)array();
//    }
//
//    $skillsProgress->$courseID = (object)array();
//
//    $courseSkills = $skillsProgress->$courseID;
//
//    $courseSkills->overallProgress = 0;
//    $courseSkills->figmaProgress = 0;
//    $courseSkills->psProgress = 0;
//    $courseSkills->ilProgress = 0;
//    $courseSkills->anProgress = 0;
//    $courseSkills->normProgress = 0;
//    $courseSkills->techProgress = 0;
//    $courseSkills->uxProgress = 0;
//    $courseSkills->motionProgress = 0;
//
//    $coursesList->$courseID = (object)array();
//
//    $coursesList->$courseID->access = false;
//    $coursesList->$courseID->fullAccess = false;
//    $coursesList->$courseID->list = (object)array();
//
//    $coursesMeta = $coursesList->$courseID->list;
//
//    $regDate = date('d.m.Y 20:00', get_user_meta($userID, 'reg_date')[0]); // дата регистрации юзера по мск
//
//    /*--------------- Проходимся по подкурсам -----------------*/
//
//    foreach ($coursesPages as $index => $item) {
//        $coursesMeta->$index = (object)array();
//
//        $coursesMeta->$index->courseType = get_field('course_availability', $item->ID);
//
//        if ($coursesMeta->$index->courseType === 'paid') {
//            $coursesMeta->$index->courseAccess = false;
//        } else {
//            $coursesMeta->$index->courseAccess = true;
//        }
//
//        $coursesMeta->$index->startTime = null;
//
//        $coursesMeta->$index->lessons = (object)array();
//
//        /*------------ Получаем у каждого подкурса уроки -----------------*/
//
//        $courseLessons = get_pages(['child_of' => $item->ID, 'sort_column' => 'menu_order']);
//
//        /*------------- Проходимся по этим урокам ---------------*/
//
//        foreach ($courseLessons as $ind => $value) {
//
//            $coursesMeta->$index->lessons->$ind = (object)array();
//
//            $current_lesson = $coursesMeta->$index->lessons->$ind;
//
//            $current_lesson->id = $value->ID;
//
//            if ($ind === 0 && $coursesMeta->$index->courseType === 'free') {
//                $current_lesson->isCompleted = true;
//            } else {
//                $current_lesson->isCompleted = false;
//            }
//
//            if ($coursesMeta->$index->courseType === 'free') {
//                $current_lesson->timeOpen = date('d.m.Y H:i', strtotime("$regDate + $ind days"));
//            } else {
//                $current_lesson->timeOpen = null;
//            }
//
//            $current_lesson->link = get_page_link($value->ID);
//            $current_lesson->title = get_field('title_name', $value->ID);
//            $current_lesson->increment = $ind;
//            $current_lesson->name = $value->post_name;
//            $current_lesson->block_name = get_field('block_name', $value->ID);
//
//            /*---------- Получение инфы, сколько дает текущий урок процентов к общему прогрессу -------*/
//
//            $current_lesson->overallProgress = (int)get_field('account_percent', $value->ID);
//
//            $current_lesson->figmaProgress = (int)get_field('skills_percent', $value->ID)['figma'];
//            $current_lesson->psProgress = (int)get_field('skills_percent', $value->ID)['photoshop'];
//            $current_lesson->ilProgress = (int)get_field('skills_percent', $value->ID)['illustrator'];
//            $current_lesson->anProgress = (int)get_field('skills_percent', $value->ID)['animate'];
//            $current_lesson->normProgress = (int)get_field('skills_percent', $value->ID)['norm_level'];
//            $current_lesson->techProgress = (int)get_field('skills_percent', $value->ID)['technic_design'];
//            $current_lesson->uxProgress = (int)get_field('skills_percent', $value->ID)['ux_ui'];
//            $current_lesson->motionProgress = (int)get_field('skills_percent', $value->ID)['motion_design'];
//        }
//    }
//
////	Updating user meta
//
//    update_user_meta($userID, 'alreadyChecked', false);
//    update_user_meta($userID, 'skillsProgress', json_encode($skillsProgress, JSON_UNESCAPED_UNICODE));
//    update_user_meta($userID, 'lessonsProgress', json_encode($coursesList, JSON_UNESCAPED_UNICODE));
//}

?>