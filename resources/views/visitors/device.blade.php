@if ($feature->image_frame == 'iphone5s')
<div class="marvel-device iphone5s gold">
  <div class="top-bar"></div>
  <div class="sleep"></div>
  <div class="volume"></div>
  <div class="camera"></div>
  <div class="sensor"></div>
  <div class="speaker"></div>
  <div class="screen" style='background: url({{$feature->image}}) no-repeat center center; '>
      <!-- Content goes here -->
  </div>
  <div class="home"></div>
  <div class="bottom-bar"></div>
</div>
@endif
@if ($feature->image_frame == 'ipad')
<div class="marvel-device ipad silver">
    <div class="camera"></div>
    <div class="screen" style='background: url({{$feature->image}}) no-repeat center center; '>
        <!-- Content goes here -->
    </div>
    <div class="home"></div>
</div>
@endif
@if ($feature->image_frame == 'desktop')
<img src="{{$feature->image}}" alt="" /> 
@endif
