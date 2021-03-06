<?php
/**
 * Created by ACV.HoaNX.
 * Date: 6/18/15
 */
?>

<div class="panel panel-default box box-price">
    <div class="panel-heading">
        <h4>Mức giá cơ bản</h4>
    </div>
    <div class="panel-body">
        <p>
            Đây là giá cơ sở tính theo đêm cho danh sách của bạn. Nếu không có các tùy chỉnh giá khác,
            giá cơ bản này sẽ được áp dụng cho tất cả các ngày trong lịch của bạn.
        </p>

        <div class="form-group row">
            <label class="col-sm-4 col-md-2 control-label label-left">
                Loại tiền tệ
            </label>

            <div class="col-sm-8 col-md-3">
                VND - Việt Nam đồng
            </div>
        </div>

        <div class="form-group row">
            <?php echo $form->labelEx($model, 'price', array('class' => 'col-sm-4 col-md-2 control-label label-left')); ?>
            <div class="col-sm-8 col-md-3">
                <?php echo $form->textField($model, 'price', array('class' => 'form-control')); ?>
            </div>
            <div class="col-sm-offset-4 col-sm-8 col-md-offset-2 col-md-7 alert-error-form">
                <?php echo $form->error($model, 'price'); ?>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default box box-price">
    <div class="panel-heading">
        <h4>Định giá dài hạn</h4>
    </div>
    <div class="panel-body">
        <p>
            Nếu bạn muốn có giá theo tuần hoặc theo tháng dành cho lưu trú dài hạn, bạn có thể sử dụng tùy chọn này.
            Thông thường chủ khách sạn sử dụng tùy chọn này để cung cấp giảm giá cho đợt lưu trú dài hơn.
        </p>

        <div class="form-group row">
            <?php echo $form->labelEx($model, 'weekly', array('class' => 'col-sm-4 col-md-2 control-label label-left')); ?>
            <div class="col-sm-8 col-md-3">
                <?php echo $form->textField($model, 'weekly', array('class' => 'form-control')); ?>
            </div>
            <div class="col-md-7 hint">
                Du khách sẽ được báo giá này cho bất kỳ đợt đặt phòng nào từ 7 đêm trở lên
            </div>
            <div class="col-sm-offset-4 col-sm-8 col-md-offset-2 col-md-5 alert-error-form">
                <?php echo $form->error($model, 'weekly'); ?>
            </div>
        </div>

        <div class="form-group row">
            <?php echo $form->labelEx($model, 'monthly', array('class' => 'col-sm-4 col-md-2 control-label label-left')); ?>
            <div class="col-sm-8 col-md-3">
                <?php echo $form->textField($model, 'monthly', array('class' => 'form-control')); ?>
            </div>
            <div class="col-md-7 hint">
                Khách sẽ được báo giá này cho bất kỳ đặt phòng từ 28 đêm trở lên
            </div>
            <div class="col-sm-offset-4 col-sm-8 col-md-offset-2 col-md-5 alert-error-form">
                <?php echo $form->error($model, 'monthly'); ?>
            </div>
        </div>

        <p>
            Lưu ý: Để biết thêm số đêm cộng thêm vượt quá một tuần hay một tháng, chúng tôi sẽ áp dụng một giá
            hàng đêm theo tỷ lệ dựa trên giá dài hạn của bạn.
        </p>

    </div>
</div>

<div class="panel panel-default box box-price">
    <div class="panel-heading">
        <h4>Chi phí bổ sung</h4>
    </div>
    <div class="panel-body">
        <div class="form-group row">
            <?php echo $form->labelEx($model, 'additional_guests', array('class' => 'col-sm-4 col-md-2 control-label label-left')); ?>
            <div class="col-sm-8 col-md-3">
                <?php echo $form->textField($model, 'additional_guests', array('class' => 'form-control')); ?>
            </div>
            <div class="col-md-7">
                <?php
                $dataDropdown = array();
                for($i=1; $i <= $room->accommodates; $i++){
                    $dataDropdown[$i] = $i;
                }
                ?>
                một đêm cho một khách sau số khách
                <?php echo $form->dropdownList($model, 'guest_per_night', $dataDropdown, array('class' => '')); ?>
            </div>
            <div class="col-sm-offset-4 col-sm-8 col-md-offset-2 col-md-5 alert-error-form">
                <?php echo $form->error($model, 'additional_guests'); ?>
            </div>
        </div>

        <div class="form-group row">
            <?php echo $form->labelEx($model, 'cleaning_fees', array('class' => 'col-sm-4 col-md-2 control-label label-left')); ?>
            <div class="col-sm-8 col-md-3">
                <?php echo $form->textField($model, 'cleaning_fees', array('class' => 'form-control')); ?>
            </div>
            <div class="col-md-7">
                <div>
                    <?php echo $form->radioButtonList($model, 'cleaning_fees_day', Constant::getCleaningFeesPerDay(), array(
                        'template' => '{beginLabel}{input}&nbsp;{labelTitle}{endLabel}',
                        'separator' => '',
                        'labelOptions' => array(
                            'class' => 'radio-inline',
                        ),
                    )) ?>
                </div>
            </div>
            <div class="col-sm-offset-4 col-sm-8 col-md-offset-2 col-md-5 alert-error-form">
                <?php echo $form->error($model, 'cleaning_fees'); ?>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default box box-price">
    <div class="panel-heading">
        <h4>Điều khoản</h4>
    </div>
    <div class="panel-body">
        <div class="form-group row">
            <?php echo $form->labelEx($model, 'cancellation', array('class' => 'col-sm-4 col-md-2 control-label label-left')); ?>
            <div class="col-sm-8 col-md-8">
                <?php echo $form->dropdownList($model, 'cancellation', Constant::getCancellation(), array('class' => 'form-control')); ?>
            </div>
            <div class="col-sm-offset-4 col-sm-8 col-md-offset-2 col-md-8 alert-error-form">
                <?php echo $form->error($model, 'cancellation'); ?>
            </div>
        </div>

        <div class="form-group row">
            <?php echo $form->labelEx($model, 'house_rules', array('class' => 'col-sm-4 col-md-2 control-label label-left')); ?>
            <div class="col-sm-4 col-md-5">
                <?php echo $form->textArea($model, 'house_rules', array('class' => 'form-control ftextarea', 'row' => 15)); ?>
            </div>
            <div class="col-sm-offset-4 col-sm-8 col-md-5 alert-error-form">
                <?php echo $form->error($model, 'house_rules'); ?>
            </div>
        </div>

        <div class="form-group row">
            <?php echo $form->labelEx($model, 'min_nights', array('class' => 'col-sm-4 col-md-2 control-label label-left')); ?>
            <div class="col-sm-8 col-md-3">
                <?php echo $form->dropdownList($model, 'min_nights', Constant::getMinNights(), array('class' => 'form-control')); ?>
            </div>
            <div class="col-md-7">
            </div>
            <div class="col-sm-offset-4 col-sm-8 col-md-offset-2 col-md-5 alert-error-form">
                <?php echo $form->error($model, 'min_nights'); ?>
            </div>
        </div>

        <div class="form-group row">
            <?php echo $form->labelEx($model, 'max_nights', array('class' => 'col-sm-4 col-md-2 control-label label-left')); ?>
            <div class="col-sm-8 col-md-3">
                <?php echo $form->dropdownList($model, 'max_nights', Constant::getMaxNights(), array('class' => 'form-control')); ?>
            </div>
            <div class="col-md-7">
            </div>
            <div class="col-sm-offset-4 col-sm-8 col-md-offset-2 col-md-5 alert-error-form">
                <?php echo $form->error($model, 'max_nights'); ?>
            </div>
        </div>


        <div class="form-group row">
            <?php echo $form->labelEx($model, 'check_in', array('class' => 'col-sm-4 col-md-2 control-label label-left')); ?>
            <div class="col-sm-8 col-md-3">
                <?php echo $form->dropdownList($model, 'check_in', Constant::getTimeCheck(), array('class' => 'form-control')); ?>
            </div>
            <div class="col-md-7">
            </div>
            <div class="col-sm-offset-4 col-sm-8 col-md-offset-2 col-md-5 alert-error-form">
                <?php echo $form->error($model, 'check_in'); ?>
            </div>
        </div>

        <div class="form-group row">
            <?php echo $form->labelEx($model, 'check_out', array('class' => 'col-sm-4 col-md-2 control-label label-left')); ?>
            <div class="col-sm-8 col-md-3">
                <?php echo $form->dropdownList($model, 'check_out', Constant::getTimeCheck(), array('class' => 'form-control')); ?>
            </div>
            <div class="col-md-7">
            </div>
            <div class="col-sm-offset-4 col-sm-8 col-md-offset-2 col-md-5 alert-error-form">
                <?php echo $form->error($model, 'check_out'); ?>
            </div>
        </div>
    </div>
</div>