<script src="{{ asset('js/jssor.slider-28.1.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jssorscript.js') }}" type="text/javascript"></script>
{{-- <script src="js/jssor.slider-28.1.0.min.js" type="text/javascript"></script> --}}


<style>
    /*jssor slider loading skin spin css*/
    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    @keyframes jssorl-009-spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    /*jssor slider bullet skin 053 css*/
    .jssorb053 .i {
        position: absolute;
        cursor: pointer;
    }

    .jssorb053 .i .b {
        fill: #fff;
        fill-opacity: 0.3;
    }

    .jssorb053 .i:hover .b {
        fill-opacity: 0.7;
    }

    .jssorb053 .iav .b {
        fill-opacity: 1;
    }

    .jssorb053 .i.idn {
        opacity: 0.3;
    }

    /*jssor slider arrow skin 093 css*/
    .jssora093 {
        display: block;
        position: absolute;
        cursor: pointer;
    }

    .jssora093 .c {
        fill: none;
        stroke: #fff;
        stroke-width: 400;
        stroke-miterlimit: 10;
    }

    .jssora093 .a {
        fill: none;
        stroke: #fff;
        stroke-width: 400;
        stroke-miterlimit: 10;
    }

    .jssora093:hover {
        opacity: 0.8;
    }

    .jssora093.jssora093dn {
        opacity: 0.6;
    }

    .jssora093.jssora093ds {
        opacity: 0.3;
        pointer-events: none;
    }
</style>
<div id="jssor_1" class="relative top-0 left-0 w-[980px] h-[380px] overflow-hidden invisible mx-auto">
    <!-- Loading Screen -->
    <div data-u="loading" class="jssorl-009-spin absolute top-0 left-0 w-full h-full text-center bg-black">
        <img class="-mt-[19px] relative top-[50%] w-[38px] h-[38px]" src="img/spin.svg" />
    </div>
    <div data-u="slides" class="cursor-default relative top-0 left-0 w-[980px] h-[380px] overflow-hidden">
        @foreach ($banners as $banner)
            <div>
                <img data-u="image" src="{{ asset('uploads/' . $banner->banner_image) }}" class="object-cover" />
            </div>
        @endforeach
        {{-- <div>
            <img data-u="image" src="{{ asset('images/012.jpg') }}" />
        </div>
        <div>
            <img data-u="image" src="{{ asset('images/013.jpg') }}" />
        </div>
        <div>
            <img data-u="image" src="{{ asset('images/014.jpg') }}" />
        </div>
        <div>
            <img data-u="image" src="{{ asset('images/015.jpg') }}" />
        </div>
        <div>
            <img data-u="image" src="{{ asset('images/016.jpg') }}" />
        </div> --}}
    </div>
    <a data-scale="0" href="https://www.jssor.com" style="display: none; position: absolute">responsive slider</a>
    <!-- Bullet Navigator -->
    <div data-u="navigator" class="jssorb053" style="position: absolute; bottom: 16px; right: 16px" data-autocenter="1"
        data-scale="0.5" data-scale-bottom="0.75">
        <div data-u="prototype" class="i" style="width: 12px; height: 12px">
            <svg class="absolute top-0 left-0 w-full h-full" viewbox="0 0 16000 16000">
                <path class="b"
                    d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z">
                </path>
            </svg>
        </div>
    </div>
    <!-- Arrow Navigator -->
    <div data-u="arrowleft" class="jssora093" style="width: 50px; height: 50px; top: 0px; left: 30px"
        data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
        <svg viewbox="0 0 16000 16000" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
            <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
        </svg>
    </div>
    <div data-u="arrowright" class="jssora093" style="width: 50px; height: 50px; top: 0px; right: 30px"
        data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
        <svg viewbox="0 0 16000 16000" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
            <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
        </svg>
    </div>
</div>
<script type="text/javascript">
    jssor_1_slider_init();
</script>
