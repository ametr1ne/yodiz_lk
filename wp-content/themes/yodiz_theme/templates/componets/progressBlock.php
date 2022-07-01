<div class="progress content-item">
    <div class="progress__title">
        <h3><?= get_field('course_name', $course->ID) ?></h3>
        <div class="btn-arrow">
            <svg width="21" height="11" viewBox="0 0 21 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="19.0858" y1="10" x2="10.5" y2="1.41422" stroke="#A5A5BB" stroke-width="2"
                      stroke-linecap="round"/>
                <line x1="10.5" y1="1.41421" x2="1.91422" y2="10" stroke="#A5A5BB" stroke-width="2"
                      stroke-linecap="round"/>
            </svg>
        </div>
    </div>
    <div class="progress__body">
        <div class="progress__box">
            <div class="text">
                <p class="text__name"><?php echo $userName ?></p>
                <p class="text__percent"><?php echo "$skillProgress->overallProgress" ?> %</p>
            </div>
            <div class="progress__bar">
                <div style="width: <?= $skillProgress->overallProgress ?>%" class="bar__green"></div>
		        <?php if ( ! json_decode( get_user_meta( get_current_user_id(), 'lessonsProgress' )[0] )->{$courseID}->access ) { ?>
                    <div class="lock-text">
                        <svg width="14" height="17" viewBox="0 0 14 17" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.91693 10.1391H6.37006V13.3391H7.91693V10.1391Z" fill="#000000"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M13.3253 8.53906C13.3253 8.51536 13.3253 8.49166 13.3253 8.46795V6.93906H11.7784H11.005V4.54499C11.005 2.32869 9.27613 0.539062 7.1378 0.539062C4.99947 0.539062 3.27061 2.32869 3.27061 4.54499V5.35091H4.82886V4.54499C4.82886 3.21758 5.8639 2.13906 7.14918 2.13906C8.43445 2.13906 9.46949 3.21758 9.46949 4.54499V6.93906H8.46857H6.13688H5.80703H4.82886H3.28198H2.82702H2.50855H0.96167V8.46795C0.96167 8.49166 0.96167 8.51536 0.96167 8.53906V14.9391C0.96167 14.9628 0.96167 14.9865 0.96167 15.0102V16.5272H2.32656C2.38343 16.5391 2.4403 16.5391 2.50855 16.5391H11.7784C11.8353 16.5391 11.9035 16.5391 11.9604 16.5272H13.3253V15.0102C13.3253 14.9865 13.3253 14.9628 13.3253 14.9391V8.53906ZM2.50855 14.9391V8.53906H11.7784V14.9391H8.46857H5.81841H2.50855Z"
                                  fill="#000000"/>
                        </svg>
                        <p>Профессия веб-дизайнер, 4 месяца</p>
                    </div>
		        <?php } ?>
            </div>
        </div>
        <div class="progress__categories">
            <div class="tools">
                <h3>Инструменты</h3>
                <div class="tools__item">
                    <div class="tools__title">
                        <p class="tools__name text-grey">Figma</p>
                        <p class="tools__percent text-grey"><?php echo "$skillProgress->figmaProgress" ?> %</p>
                    </div>
                    <div class="tools__bar">
                        <div class="bar__grey"></div>
                        <div style="width: <?php echo "$skillProgress->figmaProgress" ?>%" class="bar__green"></div>
                    </div>
                </div>
                <div class="tools__item">
                    <div class="tools__title">
                        <p class="tools__name text-grey">Photoshop</p>
                        <p class="tools__percent text-grey"><?php echo "$skillProgress->psProgress" ?> %</p>
                    </div>
                    <div class="tools__bar">
                        <div class="bar__grey"></div>
                        <div style="width: <?php echo "$skillProgress->psProgress" ?>%" class="bar__green"></div>
                    </div>
                </div>
                <div class="tools__item">
                    <div class="tools__title">
                        <p class="tools__name text-grey">Illustrator</p>
                        <p class="tools__percent text-grey"><?php echo "$skillProgress->ilProgress" ?> %</p>
                    </div>
                    <div class="tools__bar">
                        <div class="bar__grey"></div>
                        <div style="width: <?php echo "$skillProgress->ilProgress" ?>%" class="bar__green"></div>
                    </div>
                </div>
                <div class="tools__item">
                    <div class="tools__title">
                        <p class="tools__name text-grey">Animate</p>
                        <p class="tools__percent text-grey"><?php echo "$skillProgress->anProgress" ?> %</p>
                    </div>
                    <div class="tools__bar">
                        <div class="bar__grey"></div>
                        <div style="width: <?php echo "$skillProgress->anProgress" ?>%" class="bar__green"></div>
                    </div>
                </div>
            </div>
            <div class="tools">
                <h3>Навыки</h3>
                <div class="tools__item">
                    <div class="tools__title">
                        <p class="tools__name text-grey">Уровень нормы</p>
                        <p class="tools__percent text-grey"><?php echo "$skillProgress->normProgress" ?> %</p>
                    </div>
                    <div class="tools__bar">
                        <div class="bar__grey"></div>
                        <div style="width: <?php echo "$skillProgress->normProgress" ?>%" class="bar__green"></div>
                    </div>
                </div>
                <div class="tools__item">
                    <div class="tools__title">
                        <p class="tools__name text-grey">Технический дизайн</p>
                        <p class="tools__percent text-grey"><?php echo "$skillProgress->techProgress" ?> %</p>
                    </div>
                    <div class="tools__bar">
                        <div class="bar__grey"></div>
                        <div style="width: <?php echo "$skillProgress->techProgress" ?>%"
                             class="bar__green"></div>
                    </div>
                </div>
                <div class="tools__item">
                    <div class="tools__title">
                        <p class="tools__name text-grey">UX/UI</p>
                        <p class="tools__percent text-grey"><?php echo "$skillProgress->uxProgress" ?> %</p>
                    </div>
                    <div class="tools__bar">
                        <div class="bar__grey"></div>
                        <div style="width: <?php echo "$skillProgress->uxProgress" ?>%" class="bar__green"></div>
                    </div>
                </div>
                <div class="tools__item">
                    <div class="tools__title">
                        <p class="tools__name text-grey">Моушн-дизайн</p>
                        <p class="tools__percent text-grey"><?php echo "$skillProgress->motionProgress" ?> %</p>
                    </div>
                    <div class="tools__bar">
                        <div class="bar__grey"></div>
                        <div style="width: <?php echo "$skillProgress->motionProgress" ?>%"
                             class="bar__green"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
