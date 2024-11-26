<style>
    #fob-back2top {
        position: fixed;
        bottom: 0;
        right: {{ setting('back_to_top_position_right') ?: 40 }}px;
        width: 40px;
        height: 40px;
        z-index: 10000;
        background-color: transparent;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        border: 2px solid var(--primary-color);
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        transition: all 0.5s ease;
        visibility: hidden;
        opacity: 0;
    }

    #fob-back2top:hover {
        cursor: pointer;
        background-color: var(--primary-color);
    }

    #fob-back2top:hover svg {
        color: #ffffff;
    }

    #fob-back2top.active {
        bottom: {{ setting('back_to_top_position_bottom') ?: 90 }}px;
        visibility: visible;
        opacity: 1;
    }

    #fob-back2top svg {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        color: var(--primary-color);
        z-index: 10001;
        font-size: 20px;
    }
</style>

<div id="fob-back2top">
    {!! BaseHelper::renderIcon('ti ti-arrow-narrow-up') !!}
</div>

<script>
    window.addEventListener('load', function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
                $('#fob-back2top').addClass('active');
            } else {
                $('#fob-back2top').removeClass('active');
            }
        });

        $('#fob-back2top').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 200);
            return false;
        });
    });
</script>
