<?php
/**
 * Created by ACV.HoaNX.
 * Date: 6/23/15
 */
?>

<div class="row payment-page">
    <!-- Col right -->
    <div class="col-md-5 col-md-push-7 col-lg-4 col-lg-push-8 row">
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
                    <div
                        class="col-xs-7"><?php echo number_format($paymentData['price']) . 'VND x ' . $paymentData['number_night'] ?></div>
                    <div class="col-xs-5 rm-padding text-right"><?php echo number_format($paymentData['price_night']) ?> VND</div>
                </div>

                <?php if($paymentData['additional_guests']): ?>
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

                <hr class="clearfix">

                <div class="row billing-summary total">
                    <div class="col-xs-7">Tổng chi phí</div>
                    <div class="col-xs-5 rm-padding"><?php echo number_format($paymentData['total_amount']) ?> VND</div>
                </div>

            </div>
        </div>

    </div>
    <!--  Cold left  -->
    <div class="col-md-7 col-md-pull-5 col-lg-8 col-lg-pull-4">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'payment-booking-form',
//            'class'=>'form-horizontal profile-edit-form',
//            'enableClientValidation'=>true,
//            'clientOptions'=>array(
//                'validateOnSubmit'=>true,
//            ),
        )); ?>
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
                    )) ?>
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
        </section>

        <?php $this->endWidget(); ?>
    </div>

</div>