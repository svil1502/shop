
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\bootstrap\Modal;
?>


<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Контакты </h2>
                <div id="map" class="contact-map"></div>

            </div>
        </div>
        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
        <div class="alert alert-success">
            Спасибо, что написали нам. Мы ответим Вам как можно быстрее.
        </div>
        <?php else: ?>



        <div class="row">

            <div class="col-sm-12">
                <div class="col-md-6">
                <div class="contact-form">



                    <h2 class="title text-center">Свяжитесь с нами: </h2>
                    <div class="status alert alert-success" style="display: none"></div>





                            <?php $form = ActiveForm::begin(['id' => 'main-contact-form', 'class'=>'contact-form row']); ?>
                            <div class="form-group col-md-6">
                            <?= $form->field($model, 'name')->textInput(['autofocus' => true])->input('text', ['placeholder' => "Имя"])->label(false, ['style'=>'display:none']) ?>
                            </div>

                            <div class="form-group col-md-6">
                            <?= $form->field($model, 'email')->textInput(['autofocus' => true])->input('email', ['placeholder' => "Электронная почта"])->label(false, ['style'=>'display:none']) ?>
                            </div>
                            <div class="form-group col-md-12">
                            <?= $form->field($model, 'subject')->textInput(['autofocus' => true])->input('text', ['placeholder' => "Тема сообщения"])->label(false, ['style'=>'display:none']) ?>
                            </div>
                            <div class="form-group col-md-12">
                            <?= $form->field($model, 'body')->textArea(['rows' => 8])->textInput(['autofocus' => true])->input('text', ['placeholder' => "Текст сообщения"])->label(false, ['style'=>'display:none']) ?>
                            </div>
                    <div class="form-group col-md-12">
                            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                            ])->label(false, ['style'=>'display:none']) ?>
                    </div>
                            <div class="col-md-12">
                                <?= Html::submitButton('Отправить', ['class' => 'get_discount btn pull-right continue']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="contact-info">
                    <h2 class="title text-center">Контактная информация</h2>
                    <address>
                        <p>ООО "АВТОЗАПЧАСТИ"</p>
                        <p>улица Автодорожная, 72</p>
                        <p>167000, Сыктывкар, Республика Коми</p>
                        <p>Телефон: +7904 86 203 93</p>
                        <p>Факс: 8-8212-252-002</p>
                        <p>Электронная почта: info@itcrc.ru</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Мы в соцсетях: </h2>
                        <ul>
                            <li>
                                <a class="btn btn-social-icon btn-vk">
                                    <span class="fa fa-vk"></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="checkme" id="agree" value="">
                    <i class="fa fa-2x icon-checkbox"></i>
                    Настоящим подтверждаю, что ознакомлен и согласен с
            <?php
            Modal::begin([
                'header' => '<h3> Политика конфиденциальности</h3>',
                'toggleButton' => [
                    'label' => 'условиями политики конфиденциальности',
                    'tag' => 'button',
                    'class' => 'btn modal2',
                ],

            ]);
            ?>


            <div class="kareer">
                <p> Целью настоящего документа является безопасность и обеспечение конфиденциальности предоставленных Клиентами данных.
                </p>
                <h4> 1. Определения и термины</h4>

                <p> 1.1. Персональные данные - информация, относящаяся к определенному Клиенту.
                </p>
                <p>1.2. Обработка персональных данных – любые операции, совершаемые
                    с использованием средств автоматизации или без использования таких средств с персональными данными, включая сбор, запись, систематизацию, накопление, хранение, уточнение (обновление, изменение), извлечение, использование, передачу (распространение, предоставление, доступ), обезличивание, блокирование, удаление, уничтожение персональных данных.
                </p>
                <p>1.3. Cookies - фрагменты данных, отправляемых веб-сервером браузеру при посещении сайта Клиентом. Компания автоматически получает некоторые виды информации, получаемой в процессе взаимодействия пользователей с Cайтом. Речь идет о технологиях и сервисах, таких как веб-протоколы, куки, веб-отметки, а также приложения и инструменты указанной третьей стороны. Куки. Куки – это часть данных, автоматически располагающаяся на жестком диске компьютера при каждом посещении веб-сайта. Таким образом, куки – это уникальный идентификатор браузера для веб-сайта. Куки дают возможность хранить информацию на сервере и помогают легче ориентироваться в веб-пространстве, а также позволяют осуществлять анализ сайта и оценку результатов. Большинство веб-браузеров разрешают использование куки, однако можно изменить настройки для отказа от работы с куки или отслеживания пути их рассылки. При этом некоторые ресурсы могут работать некорректно, если работа куки в браузере будет запрещена.
                </p>

                <h4>    2. Цели и принципы сбора персональных данных
                </h4>
                <p>   2.1. Клиент предоставляет свои персональные данные с целью:</p>


                <p>    - предоставления технической поддержки, связанной с использованием сайта,
                </p>
                <p> - оформления заказов, уведомления о состоянии заказов, обработки и получения платежей;
                </p>
                <p>  - получения новостей, информации о продуктах, мероприятиях, рекламных акциях или услугах;
                </p>

                <p>  Предоставленные данные могут быть использованы в целях продвижения товаров от имени Компании или от имени партнеров Компании.
                </p>
                <p>2.2. Обеспечение надежности хранения информации и прозрачности целей сбора персональных данных. Персональные данные Клиентов собираются, хранятся, обрабатываются, используются, передаются и удаляются (уничтожаются) в соответствии с законодательством РФ, в т.ч. Федеральным законом 27.07.2006 № 152-ФЗ «О персональных данных», и настоящей Политикой конфиденциальности.
                </p>
                <h4>3. Информация, подлежащая обработке</h4>

                <p>3.1. Персональные данные, разрешённые к обработке в рамках настоящей Политики конфиденциальности, предоставляются Клиентом путём заполнения регистрационной формы на сайте Компании и включают в себя следующую информацию:
                </p>
                <p>3.1.1. ФИО Клиента;</p>

                <p>3.1.2. контактный телефон Клиента;</p>

                <p>3.1.3. адрес электронной почты (e-mail)</p>

                <p>3.1.4. адрес доставки Товара;</p>

                <p>3.1.5. историю заказов.</p>

                <p>3.2. Компания также получает данные, которые автоматически передаются в процессе просмотра при посещении сайта, в т. ч.:
                </p>
                <p>3.2.1. IP адрес;</p>

                <p>3.2.2. информация из cookies;</p>
                <p>
                    3.2.3. информация о браузере (или иной программе, которая осуществляет доступ к показу рекламы)
                </p>
                <p>
                    3.2.4. время доступа;
                </p>
                <p>
                    3.2.5. реферер (адрес предыдущей страницы).
                </p>
                <h4>4. Обработка и использование персональных данных</h4>
                <p>
                    4.1. Обработка персональных данных Клиента осуществляется без ограничения срока, любым законным способом, в том числе в информационных системах персональных данных с использованием средств автоматизации или без использования таких средств.
                </p>
                <p>
                    4.2. Соглашаясь с настоящей Политикой конфиденциальности Клиент предоставляет Компании свое бессрочное согласие на обработку указанных в разделе 3 персональных данных всеми указанными в настоящей Политике способами, а также передачу указанных данных партнерам Компании для целей исполнения принятых на себя обязательств.
                </p>
                <p>
                    4.3. Компания не вправе передавать информацию о Клиенте неаффилированным лицам или лицам, не связанным с Компанией договорными отношениями.
                </p>

                <p>
                    4.6. Компания принимает все необходимые меры для защиты персональных данных Клиента от неавторизированного доступа, изменения, раскрытия или уничтожения.
                </p>
                <h4>   5. Права и обязанности Клиента</h4>
                <p>
                    5.1. Клиент обязуется не сообщать каким-либо третьим лицам логин и пароль, используемые им для идентификации на сайте Компании.
                </p>
                <p>
                    5.2. Клиент обязуется соблюдать должную осмотрительность при хранении пароля, а также при его вводе.
                </p>
                <p>
                    5.3. Клиент вправе изменять свои личные данные, а также требовать удаление личных данных у Компании.
                </p>

                <p>
                    5.4. Соглашаясь с настоящей Политикой конфиденциальности, Клиент предоставляет свое бессрочное согласие на получение информации о состоянии заказов, учетной записи и прочих уведомлений технического характера, а также уведомлений рекламного характера, в том числе о текущих маркетинговых акциях и актуальных предложениях Компании, с помощью различных средств, включая SMS и электронную почту, но не ограничиваясь ими.  Клиент может в любое время отказаться от получения такой информации путем изменения данных учетной записи на сайте Компании.
                </p>
            </div>

            <?php Modal::end();
            ?>
                </label>
            </div>
    </div>
        <?php endif; ?>
    </div>
</div><!--/#contact-page-->

