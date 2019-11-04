<?php if (isset($_SESSION['user_id'])) @include('../application/view/components/menu.php') ?>
<div class="fourbody">
    <div class="box">
        <div class="box__ghost">
            <div class="symbol"></div>
            <div class="symbol"></div>
            <div class="symbol"></div>
            <div class="symbol"></div>
            <div class="symbol"></div>
            <div class="symbol"></div>
            <div class="box__ghost-container">
                <div class="box__ghost-eyes">
                    <div class="box__eye-left"></div>
                    <div class="box__eye-right"></div>
                </div>
                <div class="box__ghost-bottom">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="box__ghost-shadow"></div>
        </div>
        <div class="box__description">
            <div class="box__description-container">
                <div class="box__description-title">404</div>
                <div class="box__description-text">It seems like we couldn't find the page you were looking for</div>
            </div>
            <a href="javascript:history.back()" class="box__button">Terug</a>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    //based on https://dribbble.com/shots/3913847-404-page

    var pageX = $(document).width();
    var pageY = $(document).height();
    var mouseY=0;
    var mouseX=0;

    $(document).mousemove(function( event ) {
        //verticalAxis
        mouseY = event.pageY;
        yAxis = (pageY/2-mouseY)/pageY*300;
        //horizontalAxis
        mouseX = event.pageX / -pageX;
        xAxis = -mouseX * 100 - 100;

        $('.box__ghost-eyes').css({ 'transform': 'translate('+ xAxis +'%,-'+ yAxis +'%)' });

        //console.log('X: ' + xAxis);

    });
</script>
