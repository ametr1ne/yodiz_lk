<!-- progress(start)-->

<?php require 'progressBlock.php' ?>

<!-- progress(end) -->

<!-- theory(start) -->

<?php showVideos() ?>

<!-- theory(end) -->

<!-- homework(start)-->


<!-- homework(end)-->

<!-- materials(start)-->

<?php showMaterials() ?>

<!-- materials(end)-->

<!-- checking-hw(start)-->

<?php if (!json_decode(get_user_meta(get_current_user_id(), 'lessonsProgress')[0])->$courseID->access) { ?>
<?php if (get_field('show_hw')) {?>
    <div class="checking-hw content-item">
        <div class="hw-top">
            <h3>Отправить домашнее задание на проверку</h3>
            <div class="checking-hw__avatars">
                <div class="avatars-item"><img src="<?= get_template_directory_uri() ?>/assets/img/1.png" alt="dima"></div>
                <div class="avatars-item"><img src="<?= get_template_directory_uri() ?>/assets/img/2.png" alt="lika"></div>
                <div class="avatars-item"><img src="<?= get_template_directory_uri() ?>/assets/img/3.png" alt="lesha"></div>
            </div>
        </div>
        <div class="checking-hw__criterion">
            <p class="text-grey">Проверка домашних заданий доступна
                для участников основного курса — профессия
                веб-дизайнер, <br>тариф «с обратной связью»</p>
            <a href="<?php the_field( 'link-for-pay', $courseID ) ?>" target="_blank" class="btn blue-btn hw-btn">
                <svg width="13" height="16" viewBox="0 0 13 16" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.50171 9.93457H6.05151V12.9346H7.50171V9.93457Z" fill="white"/>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M12.5721 8.43457C12.5721 8.41235 12.5721 8.39013 12.5721 8.3679V6.93457H11.1219H10.3968V4.69013C10.3968 2.61235 8.77601 0.93457 6.77133 0.93457C4.76664 0.93457 3.14583 2.61235 3.14583 4.69013V5.44568H4.60669V4.69013C4.60669 3.44568 5.57705 2.43457 6.78199 2.43457C7.98693 2.43457 8.95728 3.44568 8.95728 4.69013V6.93457H8.01892H5.83296H5.52373H4.60669H3.1565H2.72997H2.4314H0.981201V8.3679C0.981201 8.39013 0.981201 8.41235 0.981201 8.43457V14.4346C0.981201 14.4568 0.981201 14.479 0.981201 14.5012V15.9235H2.26079C2.3141 15.9346 2.36742 15.9346 2.4314 15.9346H11.1219C11.1752 15.9346 11.2392 15.9346 11.2925 15.9235H12.5721V14.5012C12.5721 14.479 12.5721 14.4568 12.5721 14.4346V8.43457ZM2.4314 14.4346V8.43457H11.1219V14.4346H8.01892H5.53439H2.4314Z"
                          fill="white"/>
                </svg>
                Оплатить участие</a>
            <a class="btn greyborder-btn">Подробная информация о курсе</a>
        </div>
    </div>
<?php } }?>

<!-- checking-hw(end)-->

<?php if (get_field('next-lesson-link') !== '-') { ?>

    <a data-href="<?php the_field('next-lesson-link') ?>" data-post="<?= $post->ID ?>" class="next-lesson content-item">
        Перейти к следующему уроку
        <svg width="41" height="15" viewBox="0 0 41 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M40.7071 8.16634C41.0976 7.77581 41.0976 7.14265 40.7071 6.75213L34.3431 0.388164C33.9526 -0.00236071 33.3195 -0.00236077 32.9289 0.388164C32.5384 0.778688 32.5384 1.41185 32.9289 1.80238L38.5858 7.45923L32.9289 13.1161C32.5384 13.5066 32.5384 14.1398 32.9289 14.5303C33.3195 14.9208 33.9526 14.9208 34.3431 14.5303L40.7071 8.16634ZM-8.74228e-08 8.45923L40 8.45923L40 6.45923L8.74228e-08 6.45923L-8.74228e-08 8.45923Z"
                  fill="black"/>
        </svg>
    </a> <?php } ?>