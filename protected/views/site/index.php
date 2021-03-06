<?php
/* @var $this SiteController */

//$this->pageTitle = Yii::app()->name;
?>

<?php //$this->widget('ext.widgets.hybridAuth.SocialLoginButtonWidget', array(
//    'enabled'=>Yii::app()->hybridAuth->enabled,
//    'providers'=>Yii::app()->hybridAuth->getAllowedProviders(),
//    'route'=>'/hybridauth/authenticate',
//));
?>
<?php //$this->widget('ext.hoauth.widgets.HOAuth'); ?>

<div class="box-margin-bottom box-location">
    <h2><?php echo Yii::t('app', 'Địa điểm phổ biến') ?></h2>

    <div class="line-gradient">&nbsp;</div>

    <div class="row location">
        <div class="col-xs-6 col-sm-4 location-info">
            <a href="<?php echo Yii::app()->createUrl("rooms/index", array("place" => 'Hà Nội', 'lat' => '21.0277644', 'long' => '105.83415979999995'))?>">
                <img src="<?php echo(Yii::app()->baseUrl) ?>/images/location/hanoi.jpg" alt="Hà Nội" class="img-responsive img-responsive">
                <div class="info-text"><?php echo(Yii::t('app', 'Hà Nội')) ?></div>
            </a>
        </div>
        <div class="col-xs-6 col-sm-4 location-info">
            <a href="<?php echo Yii::app()->createUrl("rooms/index", array("place" => 'Quảng Ninh', 'lat' => '21.006382', 'long' => '107.29251440000007'))?>">
                <img src="<?php echo(Yii::app()->baseUrl) ?>/images/location/quangninh.jpg" alt="Quảng Ninh" class="img-responsive">
                <div class="info-text"><?php echo(Yii::t('app', 'Quảng Ninh')) ?></div>
            </a>
        </div>
        <div class="col-xs-6 col-sm-4 location-info">
            <a href="<?php echo Yii::app()->createUrl("rooms/index", array("place" => 'Sapa', 'lat' => '22.3363608', 'long' => '103.84378519999996'))?>">
                <img src="<?php echo(Yii::app()->baseUrl) ?>/images/location/sapa.jpg" alt="Sapa" class="img-responsive">
                <div class="info-text"><?php echo(Yii::t('app', 'Sapa')) ?></div>
            </a>
        </div>
        <div class="col-xs-6 col-sm-6 location-info">
            <a href="<?php echo Yii::app()->createUrl("rooms/index", array("place" => 'Đà Nẵng', 'lat' => '16.0544068', 'long' => '108.20216670000002'))?>">
                <img src="<?php echo(Yii::app()->baseUrl) ?>/images/location/da-nang.jpg" alt="Đà Nẵng" class="img-responsive">
                <div class="info-text"><?php echo(Yii::t('app', 'Đà Nẵng')) ?></div>
            </a>

        </div>
        <div class="col-xs-6 col-sm-6 location-info">
            <a href="<?php echo Yii::app()->createUrl("rooms/index", array("place" => 'Nha Trang', 'lat' => '12.2387911', 'long' => '109.19674880000002'))?>">
                <img src="<?php echo(Yii::app()->baseUrl) ?>/images/location/nha-trang.jpg" alt="Nha Trang" class="img-responsive">
                <div class="info-text"><?php echo(Yii::t('app', 'Nha Trang')) ?></div>
            </a>
        </div>
        <div class="col-xs-6 col-sm-4 location-info">
            <a href="<?php echo Yii::app()->createUrl("rooms/index", array("place" => 'Thành Phố Hồ Chí Minh', 'lat' => '10.8230989', 'long' => '106.6296638'))?>">
                <img src="<?php echo(Yii::app()->baseUrl) ?>/images/location/tphcm.jpg" alt="Thành Phố Hồ Chí Minh"
                             class="img-responsive">
                <div class="info-text"><?php echo(Yii::t('app', 'TPHCM')) ?></div>
            </a>
        </div>
        <div class="col-xs-6 col-sm-4 location-info">
            <a href="<?php echo Yii::app()->createUrl("rooms/index", array("place" => 'Hội An', 'lat' => '15.8800584', 'long' => '108.3380469'))?>">
                <img src="<?php echo(Yii::app()->baseUrl) ?>/images/location/hoi-an.jpg" alt="Hội An" class="img-responsive">
                <div class="info-text"><?php echo(Yii::t('app', 'Hội An')) ?></div>
            </a>
        </div>
        <div class="col-xs-6 col-sm-4 location-info">
            <a href="<?php echo Yii::app()->createUrl("rooms/index", array("place" => 'Phú Quốc', 'lat' => '10.289879', 'long' => '103.98401999999999'))?>">
                <img src="<?php echo(Yii::app()->baseUrl) ?>/images/location/phu-quoc.jpg" alt="Phú Quốc" class="img-responsive">
                <div class="info-text"><?php echo(Yii::t('app', 'Phú Quốc')) ?></div>
            </a>
        </div>
    </div>
</div>

<div class="box-margin-bottom box-advantages">
    <div class="row">
        <div class="col-md-4 advantages-info">
            <i class="fa fa-usd"></i><br>
            <strong>Tiện nghi & Tiết kiệm hơn</strong>
            <p>Nghỉ tại nhà ở địa phương thay vì một khách sạn đắt tiền.</p>
        </div>
        <div class="col-md-4 advantages-info">
            <i class="fa fa-arrows"></i><br>
            <strong>Tận hưởng nhiều không gian hơn</strong>
            <p>Với chi phí tương đương một phòng khách sạn, bạn có thể thuê toàn bộ căn nhà.</p>
        </div>
        <div class="col-md-4 advantages-info">
            <i class="fa fa-users"></i><br>
            <strong>Trải nghiệm như một người bản xứ</strong>
            <p>Trải nghiệm cuộc sống bản địa để có một chuyến du lịch đầy màu sắc.</p>
        </div>
        <div class="col-md-4 advantages-info">
            <i class="fa fa-lock"></i><br>
            <strong>An toàn tuyệt đối</strong>
            <p>Với một hệ thống chi trả trực tuyến an toàn, chúng tôi sẽ giúp bạn đảm trách việc thanh toán.</p>
        </div>
        <div class="col-md-4 advantages-info">
            <i class="fa fa-home"></i><br>
            <strong>Như đang ở nhà</strong>
            <p>Sinh hoạt thoải mái như thể bạn đang ở nhà. </p>
        </div>
        <div class="col-md-4 advantages-info">
            <i class="fa fa-th"></i><br>
            <strong>Nhiều lựa chọn</strong>
            <p>Từ phòng ở ghép, phòng riêng đến căn hộ, biệt thự.</p>
        </div>
    </div>

</div>
