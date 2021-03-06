<?php
/**
 * Created by ACV.HoaNX.
 * Date: 6/23/15
 */
?>

<?php Yii::app()->clientScript->beginScript('custom-header-script'); ?>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            <?php if($bookingModel->hasErrors('coupon_code')): ?>
            jQuery('#link-counpon').hide();
            jQuery('#input-counpon').show();
            <?php endif ?>
        });
    </script>
<?php Yii::app()->clientScript->endScript(); ?>

<div class="row payment-page">
    <div class="col-md-12">
        <?php if ($bookingModel->hasErrors() || $bookingUserModel->hasErrors()): ?>
            <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <ol style="margin-bottom: 0">
                    <?php if ($bookingModel->hasErrors()): ?>
                        <?php foreach($bookingModel->getErrors() as $errorsBooking): ?>
                            <?php foreach($errorsBooking as $error): ?>
                                <li><?php echo($error) ?></li>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    <?php endif ?>
                    <?php if ($bookingUserModel->hasErrors()): ?>
                        <?php foreach($bookingUserModel->getErrors() as $errorBookingUser): ?>
                            <?php foreach($errorBookingUser as $error): ?>
                                <li><?php echo($error) ?></li>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ol>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row payment-page">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'payment-booking-form',
//            'class'=>'form-horizontal profile-edit-form',
//            'enableClientValidation'=>true,
//            'clientOptions'=>array(
//                'validateOnSubmit'=>true,
//            ),
)); ?>
    <!-- Col right -->
    <div class="col-md-5 col-md-push-7 col-lg-4 col-lg-push-8">
        <div class="panel payments-listing">
            <div class="photo">
                <?php echo CHtml::image(RoomImages::getImageByRoomaddress($roomModel->id), $roomModel->name, array(
                    'class' => 'img-responsive'
                )) ?>
            </div>

            <div class="panel-body">
                <div class="room-name">
                    <h3><?php echo $roomModel->name; ?></h3>
                </div>
                <div class="hidden-sm room-address">
                    <p><?php echo $roomModel->address_detail; ?></p>
                </div>
                <hr>

                <div class="row billing-summary">
                    <div class="col-xs-7">Ngày đến</div>
                    <div class="col-xs-5 rm-padding">
                        <?php echo($paymentData['checkin']) ?>
                        <span class="info"><?php echo Constant::getTimeCheck($roomModel->RoomPrice->check_in) ?></span>
                    </div>

                </div>
                <div class="row billing-summary">


                    <div class="col-xs-7">Ngày đi</div>
                    <div class="col-xs-5 rm-padding">
                        <?php echo($paymentData['checkout']) ?>
                        <span class="info"><?php echo Constant::getTimeCheck($roomModel->RoomPrice->check_in) ?></span>
                    </div>
                </div>
                <div class="row billing-summary">

                    <div class="col-xs-7">Số khách</div>
                    <div class="col-xs-5 rm-padding">
                        <?php echo($paymentData['number_of_guests']) ?>
                    </div>
                </div>
                <div class="row billing-summary">

                    <div class="col-xs-7">Hủy bỏ</div>
                    <div class="col-xs-5 rm-padding">
                        <?php echo CHtml::link(Constant::getCancellationShort($roomModel->RoomPrice->cancellation),
                            array(
                                'site/cancellation_policies',
                            ),
                            array(
                                'target'=>'_blank'
                            )
                        ) ?>
                    </div>
                </div>
                <hr class="clearfix">
                <div class="row billing-summary">
                    <div class="col-xs-7">
                        <?php if((is_array($roomModel->room_type) && in_array(Constant::ROOM_TYPE_SHARE_ROOM ,array_values($roomModel->room_type)))
                            OR (is_string($roomModel->room_type) && $roomModel->room_type==Constant::ROOM_TYPE_SHARE_ROOM)): ?>
                            <?php echo number_format($paymentData['price']) . 'VND x ' . $paymentData['number_night']. ' x ' . $paymentData['number_of_guests'] ?>
                        <?php else: ?>
                            <?php echo number_format($paymentData['price']) . 'VND x ' . $paymentData['number_night'] ?>
                        <?php endif ?>
                    </div>
                    <div class="col-xs-5 rm-padding text-right"><?php echo number_format($paymentData['price_night']) ?> VND</div>
                </div>

                <?php if(isset($paymentData['additional_guests']) && $paymentData['additional_guests']): ?>
                    <div class="row billing-summary">
                        <div class="col-xs-7">
                            Phí mỗi khách thêm
                            <?php echo number_format($roomModel->RoomPrice->additional_guests) . 'VND x ' . $paymentData['number_night'] ?>
                        </div>
                        <div class="col-xs-5 rm-padding text-right"><?php echo number_format($paymentData['price_additional_guests']) ?> VND</div>
                    </div>
                <?php endif ?>

                <div class="row billing-summary">
                    <div class="col-xs-7">Phí dọn dẹp</div>
                    <div class="col-xs-5 rm-padding text-right"><?php echo number_format($paymentData['cleaning_fees']) ?> VND</div>
                </div>


                <?php if($bookingModel->discount): ?>
                    <div class="row billing-summary">
                        <?php echo $form->hiddenField($bookingModel,'discount'); ?>
                        <?php echo $form->hiddenField($bookingModel,'coupon_code'); ?>
                        <div class="col-xs-7">
                            <?php //echo($bookingModel->coupon_code) ?>
                            Khuyến mãi <?php echo($bookingModel->discount) ?>%
                        </div>
                        <div class="col-xs-5 rm-padding text-right">
                            <strong><?php echo number_format($paymentData['price_night']*$bookingModel->discount/100) ?> VND</strong>
                        </div>
                    </div>

                <?php else: ?>
                <div id="link-counpon" class="row billing-summary">
                    <div class="col-xs-12">
                        <a href="javascript:void(0)">Bạn có Mã khuyến mãi?</a>
                    </div>
                </div>

                <div id="input-counpon" class="row billing-summary">
                    <div class="col-xs-8">
                        <?php echo $form->textField($bookingModel,'coupon_code', array('class'=>'form-control', 'placeholder'=>'Mã khuyến mãi')); ?>
                    </div>
                    <div class="col-xs-4">
                        <input type="submit" name="submit" class="cancel btn btn-default" value="Sử dụng" />
                    </div>
                    <?php if($bookingModel->hasErrors('coupon_code')): ?>
                        <div class="col-xs-12 alert-error-form">
                            <?php echo $form->error($bookingModel,'coupon_code'); ?>
                        </div>
                    <?php endif ?>
                </div>

                <?php endif ?>

                <hr class="clearfix">

                <div class="row billing-summary total">
                    <div class="col-xs-7">Tổng chi phí</div>
                    <div class="col-xs-5 rm-padding text-right">
                        <?php echo number_format($bookingModel->total_amount) ?> VND
                        <?php echo $form->hiddenField($bookingModel,'total_amount'); ?>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!--  Cold left  -->
    <div class="col-md-7 col-md-pull-5 col-lg-8 col-lg-pull-4">

        <section id="user-info">
            <h3 class="section-title">Xác nhận thông tin đặt phòng</h3>

            <div class="form-group row">
                <?php echo $form->labelEx($bookingUserModel,'first_name', array('class'=>'col-sm-3 control-label')); ?>
                <div class="col-sm-5">
                    <?php echo $form->textField($bookingUserModel,'first_name', array('class'=>'form-control')); ?>
                </div>
                <div class="col-sm-4 alert-error-form">
                    <?php echo $form->error($bookingUserModel,'first_name'); ?>
                </div>
            </div>
            <div class="form-group row">
                <?php echo $form->labelEx($bookingUserModel,'last_name', array('class'=>'col-sm-3 control-label')); ?>
                <div class="col-sm-5">
                    <?php echo $form->textField($bookingUserModel,'last_name', array('class'=>'form-control')); ?>
                </div>
                <div class="col-sm-4 alert-error-form">
                    <?php echo $form->error($bookingUserModel,'last_name'); ?>
                </div>
            </div>
            <div class="form-group row">
                <?php echo $form->labelEx($bookingUserModel,'address', array('class'=>'col-sm-3 control-label')); ?>
                <div class="col-sm-5">
                    <?php echo $form->textField($bookingUserModel,'address', array('class'=>'form-control')); ?>
                </div>
                <div class="col-sm-4 alert-error-form">
                    <?php echo $form->error($bookingUserModel,'address'); ?>
                </div>
            </div>
            <div class="form-group row">
                <?php echo $form->labelEx($bookingUserModel,'email', array('class'=>'col-sm-3 control-label')); ?>
                <div class="col-sm-5">
                    <?php echo $form->textField($bookingUserModel,'email', array('class'=>'form-control')); ?>
                </div>
                <div class="col-sm-4 alert-error-form">
                    <?php echo $form->error($bookingUserModel,'email'); ?>
                </div>
            </div>
            <div class="form-group row">
                <?php echo $form->labelEx($bookingUserModel,'phone_number', array('class'=>'col-sm-3 control-label')); ?>
                <div class="col-sm-5">
                    <?php echo $form->textField($bookingUserModel,'phone_number', array('class'=>'form-control')); ?>
                </div>
                <div class="col-sm-4 alert-error-form">
                    <?php echo $form->error($bookingUserModel,'phone_number'); ?>
                </div>
            </div>
        </section>

        <section id="payment">
            <h3 class="section-title">Chọn hình thức thanh toán</h3>

            <div class="form-group">
                <div>
                    <?php echo $form->radioButtonList($bookingModel, 'payment_method', Booking::_getPaymentMethod(), array(
                        'template' => '<div class="radio">{beginLabel}{input}&nbsp;{labelTitle}{endLabel}</div>',
                        'separator' => '',
                        'labelOptions' => array(
//                            'class' => 'radio-inline',
                        ),
                        'class' => 'radio_payment_method',
                    )) ?>
                </div>
                <div class="info-payment">
                    <div class="office-add">
                        <b>Địa chỉ thanh toán: BT02 khu đô thị Vân Canh - Hoài Đức - Hà Nội</b>
                    </div>
                    <div class="bank-acc">
                        <ul>
                            <li>
                                Số tài khoản: <b>41110000287792</b><br>
                                Chủ tài khoản: <b>Mạc Ngọc Tuấn</b><br>
                                Chi nhánh: <b>Ngân Hàng BIDV TP Sơn La</b>
                            </li>
                            <li>
                                Số tài khoản: <b>711A27820403</b><br>
                                Chủ tài khoản: <b>Mạc Ngọc Tuấn</b><br>
                                Chi nhánh: <b>Ngân Hàng TMCP Công thương TP Sơn La</b>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="alert-error-form">
                    <?php echo $form->error($bookingModel,'payment_method'); ?>
                </div>
            </div>

            <div class="terms_info">Bằng việc nhấn vào “Thanh toán”, bạn đồng ý với <?php echo CHtml::link('Quy định', '#',
                    array(
                        'target'=>'_blank'
                    )
                ) ?> và
                <?php echo CHtml::link('Chính sách hủy bỏ',
                    array(
                        'site/cancellation_policies',
                    ),
                    array(
                        'target'=>'_blank'
                    )
                ) ?>.</div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success btn-lg btn-block btn-payment"><?php echo(Yii::t('app', 'Thanh toán')) ?></button>
                </div>
            </div>

            <div class="row">
                <ul>
                    <li style="margin-bottom: 6px;">
                        Shareroom sẽ liên hệ với quý khách (qua email hoặc điện thoại) trong vòng <b style="font-size: 15px; color: #e89928;">30 phút</b> (T2-CN: 08:00 - 23:00) để xác
                        nhận phòng và thời hạn thanh toán.
                    </li>
                    <li style="margin-bottom: 6px;">
                        Quý khách sẽ thanh toán (chuyển khoản hoặc tại văn phòng của shareroom) sau khi có xác nhận
                        còn phòng trống từ chúng tôi.
                    </li>
                    <li class="last" style="margin-bottom: 6px;">
                        Trường hợp Quý khách muốn xác nhận ngay, vui lòng liên hệ với chúng tôi theo Hotline: <b>0931.68.78.66</b>
                    </li>

                </ul>
            </div>
        </section>
    </div>
<?php $this->endWidget(); ?>
</div>

<?php Yii::app()->clientScript->beginScript('custom-script'); ?>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery("#Booking_payment_method_0").change(function() {
                if(this.checked) {
                    jQuery('.office-add').hide();
                    jQuery('.bank-acc').show();
                }
            });
            jQuery("#Booking_payment_method_1").change(function() {
                if(this.checked) {
                    jQuery('.bank-acc').hide();
                    jQuery('.office-add').show();
                }
            });

            jQuery('#link-counpon a').click(function(){
                jQuery('#link-counpon').hide();
                jQuery('#input-counpon').show();

            });

            <?php if($bookingModel->hasErrors('coupon_code')): ?>
            jQuery('#link-counpon').hide();
            jQuery('#input-counpon').show();
            <?php endif ?>

            <?php if($bookingModel->payment_method==Booking::PAYMENT_METHOD_COMPANY): ?>
            jQuery('.office-add').show();
            <?php elseif($bookingModel->payment_method==Booking::PAYMENT_METHOD_BANK_TRANFER): ?>
            jQuery('.bank-acc').show();
            <?php endif ?>

            $bookingModel
        });
    </script>
<?php Yii::app()->clientScript->endScript(); ?>