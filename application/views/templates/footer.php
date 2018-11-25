

</div>
 <!-- footer content -->
<footer class="footer">
      <div class="container">
        <span class="text-muted">Copyright@alisha2018</span>
      </div>
</footer>
<!-- </footer> -->
<script type="text/javascript">
	$(document).ready(function() {

  // resizeLogo();
  // resizeZoomLogo();

  // var basePrice = 19.95;
  // $('.quantity').on('change', function() {
  //   quantity = $(this).val();
  //   sizePrice = $('#sizes ul li.active').data('price');
  //   if (!sizePrice) {
  //     sizePrice = 0;
  //   }
  //   price = basePrice + sizePrice;
  //   console.log(sizePrice);
  //   $('.price h1').text('$' + (price * quantity).toFixed(2));
  // })

})

// window.onresize = function(event) {
//   resizeLogo();
//   resizeZoomLogo();
// };

position = "left_chest";
placement = {
  "left_chest": {
    "width": "9",
    "height": "9",
    "top": "42",
    "left": "62",
    "rotate": "0",
    "skew-x": "0",
    "skew-y": "0"
  }
};

function resizeLogo() {
  var img = document.getElementById('product-image');
  logo = $('#product-logo');
  var width = img.clientWidth;
  var height = img.clientHeight;
  logo.css('height', height * (placement[position].height / 100));
  logo.css('width', width * (placement[position].width / 100));
  logo.css('top', height * (placement[position].top / 100));
  logo.css('left', width * (placement[position].left / 100));
};


// ZOOM ZOOM !!!

$('.product-preview').click(function(){
  $('.zoom-btn').toggleClass('active');
  $(this).toggleClass('activeZoom');
  $('.zoom-view').toggle();
});

$(document).on('mousemove', '.activeZoom', function(event){            
  var relX = event.pageX - $(this).offset().left;
  var relY = event.pageY - $(this).offset().top;
  var relBoxCoords = "(" + relX + "," + relY + ")";
  
  zoomW =  $('.zoom-view').width();
  zoomH =  $('.zoom-view').height();
  $('.zoom-view').css('top',relY-(zoomH/2));
  $('.zoom-view').css('left',relX-zoomW/2);

  width = $(this).width();
  height = $(this).height();
  pX = (relX/width);
  pY = (relY/height);
  zimgW =  $('#zoom-image').width();
  zimgH =  $('#zoom-image').height();
  zX = (zimgW * pX)-(zoomW/1.375);
  zY = (zimgH * pY)-(zoomH/2);
  $('#zoom-image').css('top', '-' + zY + 'px' );
  $('#zoom-image').css('left', '-' + zX + 'px' );
  resizeZoomLogo();
});

function resizeZoomLogo() {
  img = $('#zoom-image');
  logo = $('#zoom-logo');
  width = img.width();
  height = img.height();
  imgX = img.css('left');
  imgY = img.css('top');
  
  logo.css('height', height * (placement[position].height / 100));
  logo.css('width', width * (placement[position].width / 100));
  logo.css('top', imgY + (height * (placement[position].top / 100)));
  logo.css('left', imgX + (width * (placement[position].left / 100)));
  
  console.log(imgX);
  console.log((width * (placement[position].left / 100)));
  
};

</script>
</body>
</html>