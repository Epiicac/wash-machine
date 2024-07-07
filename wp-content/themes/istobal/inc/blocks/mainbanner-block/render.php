<?php

$slides = get_field('slides');

?>

<section class="mainbanner-block">
    <div class="mainbanner mainbanner-slider swiper">
        <div class="swiper-wrapper">
            <?php foreach($slides as $item) {
                $bg = $item['bg'];
                $class = $item['align'];
                $class = ($class === 'слева') ? 'left' : 'center';
                $text = $item['text'];
                $btn = $item['btn'];
                $btn_link = $item['btn_link'];
            ?>
                <div class="swiper-slide">
                    <?php if ($bg === 'Изображение') {
                        $img = $item['img'];
                    ?>
                        <div class="slider-content <?=$class?> image" style="background-image: url('<?=$img?>')">
                            <div class="slide-info">
                                <?=$text?>
                            </div>
                            <?php if ($btn) { ?>
                                <a class="mainbanner-btn" href="<?=$btn_link?>">Узнать больше</a>                                
                            <?php } ?>
                        </div>
                    <?php } else {
                        $video = $item['video'];
                    ?>
                        <div class="slider-content <?=$class?> video">
                            <video autoplay muted loop>
                                <source src="<?=$video?>" type='video/mp4' />
                            </video>
                            <?php if ($text) { ?>
                                <div class="slide-info">
                                    <?=$text?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <div class="arrow-holder">
            <div class="arrow-left swiper-arrow">
                <img src="<?=get_template_directory_uri()?>/assets/img/arrow-left.svg">
            </div>
            <div class="arrow-right swiper-arrow">
                <img src="<?=get_template_directory_uri()?>/assets/img/arrow-right.svg">
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>