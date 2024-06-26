<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <title>jQuery Rotating Slider Plugin Demo</title>
  <link href="{{url('/')}}/public/Circular-Rotating-Slider-jQuery-CSS3/rotating-slider.css" rel="stylesheet"
    type="text/css">
  <link rel="stylesheet" href="{{url('/')}}/public/Circular-Rotating-Slider-jQuery-CSS3/rotating-slider.min.css">
  <style>
    body {
      background: #333;
      font-family: 'Roboto Slab', sans-serif;
      font-weight: 300;
      overflow: hidden;
    }

    .rotating-slider ul.slides li {
      color: #fff
    }

    .rotating-slider ul.slides li:nth-of-type(1) {
      background: #3498db;
    }

    .rotating-slider ul.slides li:nth-of-type(2) {
      background: url('http://static.pexels.com/wp-content/uploads/2014/05/car-oldtimer-snow-342-825x550.jpg');
    }

    .rotating-slider ul.slides li:nth-of-type(3) {
      background: #e74c3c;
    }

    .rotating-slider ul.slides li:nth-of-type(4) {
      background: url('http://static.pexels.com/wp-content/uploads/2014/06/analog-camera-old-olympus-om-10-1528-825x550.jpg');
    }

    .rotating-slider ul.slides li:nth-of-type(5) {
      background: #f1c40f;
    }

    .rotating-slider ul.slides li:nth-of-type(6) {
      background: url(http://static.pexels.com/wp-content/uploads/2014/06/bridge-city-night-645-827x550.jpg);
    }

    .rotating-slider ul.slides li .inner {
      box-sizing: border-box;
      padding: 2em;
      height: 100%;
      width: 100%;
    }
  </style>
</head>

<body translate="no">
  <div id="jquery-script-menu">
    <div class="jquery-script-center">
      <ul>
        <li><a href="https://www.jqueryscript.net/rotator/Circular-Rotating-Slider-jQuery-CSS3.html">Download This
            Plugin</a></li>
        <li><a href="https://www.jqueryscript.net/">Back To jQueryScript.Net</a></li>
      </ul>
      <div class="jquery-script-ads">
        <script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
          google_ad_slot = "2780937993";
          google_ad_width = 728;
          google_ad_height = 90;
          //-->
        </script>
        <script type="text/javascript" src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
      </div>
      <div class="jquery-script-clear"></div>
    </div>
  </div>
  <h1 style="text-align: center; color: #95a5a6; margin-top:150px">jQuery Rotating Slider Plugin Demo</h1>
  <div class="rotating-slider">
    <ul class="slides">
      <li>
        <div class="inner">
          <h2>jQuery Rotating Slider</h2>
          <p>A fancy rotator plugin.</p>
        </div>
      </li>
      <li>
        <div class="inner"></div>
      </li>
      <li>
        <div class="inner">
          <h2>Slide 2</h2>
          <p>This is slide 2</p>
        </div>
      </li>
      <li>
        <div class="inner"> </div>
      </li>
      <li>
        <div class="inner">
          <h2>Slide 3</h2>
          <p>This is slide 3</p>
        </div>
      </li>
      <li>
        <div class="inner">
          <h2>Slide 4</h2>
          <p>This is slide 4</p>
        </div>
      </li>
    </ul>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="jquery.rotating-slider.js"></script>
  <script src="{{url('/')}}/public/Circular-Rotating-Slider-jQuery-CSS3/jquery.rotating-slider.js"></script>
  <script src="{{url('/')}}/public/Circular-Rotating-Slider-jQuery-CSS3/jquery.rotating-slider.min.js"></script>
  <script>
    $(function () {
      $('.rotating-slider').rotatingSlider({
        slideHeight: Math.min(360, window.innerWidth - 80),
        slideWidth: Math.min(480, window.innerWidth - 80),
      });
    });
  </script>
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>
</body>

</html>