<?php
/**
 * Created by ACV.HoaNX.
 * Date: 5/21/15
 */

echo $this->renderPartial('_menu_profile');
?>
<div class="prifile-main row">
    <div class="col-md-3 col-sm-4">
        <div class="profile-box profile-picture">
            <div class="picture">
                <a href="<?php echo $this->createUrl('profile/show', array('id'=>$usersModel->id)) ?>" target="_blank">
                    <img src="<?php echo Yii::app()->createUrl('profile/image')?>" class="img-responsive">
                </a>
            </div>
            <div class="profile-name">
                <span><?php echo $usersModel->first_name.' '.$usersModel->last_name ?></span><br>
                <?php echo CHtml::link(Yii::t('app', 'Chỉnh sửa trang cá nhân'), array('profile/edit')) ?>
            </div>

        </div>
        <div class="panel panel-default profile-box profile-link">
            <div class="panel-heading box-header">
                <span><?php echo(Yii::t('app', 'Đường dẫn nhanh')) ?></span>
            </div>
            <div class="panel-body">
                <ul>
                    <li><?php echo(CHtml::link(Yii::t('app', 'Quản lý bài đăng'), array('spaces/index'))) ?></li>
                    <li><?php echo(CHtml::link(Yii::t('app', 'Yêu cầu đặt phòng'), array('spaces/reservations'))) ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-8">
        <div class="panel panel-default profile-box message-box">
            <div class="panel-heading box-header">
                <span><?php echo(Yii::t('app', 'Tin nhắn')) ?></span>
            </div>
            <div class="panel-body">
                Không có tin nhắn nào
                <p class="clearfix"></p>
                <div class="pull-right">
                    <?php echo CHtml::link(Yii::t('app', 'Đi đến hộp tin nhắn'), array('message/inbox '), array('class'=>'btn btn-primary')) ?>
                </div>
            </div>
        </div>

    </div>
</div>