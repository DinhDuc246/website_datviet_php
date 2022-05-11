<footer class="footer-distributed">

    <div class="footer-left">

        <a href="index.php">
        <img src="images/logo.jpg" alt=""></a>

        <p class="footer-links">
            <a href="index.php" class="link-1">TRANG CHỦ</a>
            
            <a href="introduce.php">giới thiệu</a>
        
            <a href="service.php">dịch vụ</a>
        
            <a href="recruitment.php">Tuyển dụng</a>
            
            <a href="personnel.php">Nhân sự</a>
            
            <a href="contact.php">Liên hệ</a>
        </p>

        <p class="footer-company-name">Copy right © 2021 by DinhDuc</p>
    </div>

    <div class="footer-center">

        <div>
            <a href="https://goo.gl/maps/79deHxb1wyijdaxW6"><i class="fa fa-map-marker"></i></a>
            <p><span>Công ty cổ phần quy hoạch kiến trúc Đất Việt</span>27 Lê Vĩnh Huy, P. Hoà Cường Bắc, Q. Hải Châu, Đà Nẵng</p>
        </div>

        <div>
            <a href="tel:0944111111"><i class="fa fa-phone"></i></a>
            <p>+84 944.111.111</p>
        </div>

        <div style="text-transform: none;">
            <a href="mailto:quyhoachkientrucdatviet@gmail.com"><i class="fa fa-envelope"></i></a>
            <p>quyhoachkientrucdatviet@gmail.com</p>
        </div>

    </div>

    <div class="footer-right">

        <p class="footer-company-about">
            <span>VỀ CHÚNG TÔI</span>
            Mọi thắc mắc của quý khách xin được gửi về địa chỉ email để được giải đáp.
        </p>

        <div class="footer-icons">

            <a href="https://www.facebook.com/viking.2406"><i class="fab fa-facebook-square"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>

        </div>

    </div>

</footer>


<!-- Carousel wrapper -->
      <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
     
          <!-- MDB -->
    <script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
<script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};
  
  function scrollFunction() {
      if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
          document.getElementById("myBtn").style.display = "block";
      } else {
          document.getElementById("myBtn").style.display = "none";
      }
  }
  
  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
  }
  </script>
<script>
    $(document).ready(function(){
    $(window).scroll(function(){
    if($(window).scrollTop() > 10 ){
    $('.my-navbar').addClass('navbar-scroll');
    }
   else{
    $('.my-navbar').removeClass('navbar-scroll');
    }
    });
    });
    
    </script>
    <script>
        let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });

    </script>
    <script>
      $(function() {
	var timelineBlocks = $('.timeline-item'),
		offset = 0.8;

	//hide timeline blocks which are outside the viewport
	hideBlocks(timelineBlocks, offset);

	//on scolling, show/animate timeline blocks when entering the viewport
	$(window).on('scroll', function(){
		(!window.requestAnimationFrame) 
			? setTimeout(function(){ showBlocks(timelineBlocks, offset); }, 100)
			: window.requestAnimationFrame(function(){ showBlocks(timelineBlocks, offset); });
	});

	function hideBlocks(blocks, offset) {
		blocks.each(function(){
		    ($(this).offset().top > $(window).scrollTop() + $(window).height() * offset) && $(this).find('.timeline-icon, .timeline-content').addClass('is-hidden');
		});
	}

	function showBlocks(blocks, offset) {
		blocks.each(function(){
		    ($(this).offset().top <= $(window).scrollTop() + $(window).height() * offset && $(this).find('.timeline-icon').hasClass('is-hidden')) && $(this).find('.timeline-icon, .timeline-content').removeClass('is-hidden').addClass('animate-it');

		});
	}
});
    </script>
    <script type="text/javascript">
      readMore( $('.spoiler'), 4);
function readMore(jObj, lineNum) {
  if ( isNaN(lineNum) ) {
    lineNum = 4;
  }
  var go = new ReadMore (jObj, lineNum);
}

//class
function ReadMore(_jObj, lineNum) { 
  var READ_MORE_LABEL = 'Đọc thêm';
  var HIDE_LABEL = 'Thu gọn';

  var jObj = _jObj;
  var textMinHeight = ''+ (parseInt(jObj.children('.hidden-text').css('line-height'),10)*lineNum) +'px';
  var textMaxHeight = ''+jObj.children('.hidden-text').css('height');

  jObj.children('.hidden-text').css('height', ''+ textMaxHeight);
  jObj.children('.hidden-text').css( 'transition', 'height .5s');
  jObj.children('.hidden-text').css('height', ''+ textMinHeight);

  jObj.append ('<button class="read-more">'+READ_MORE_LABEL+'</button>');

  jObj.children('.read-more').click ( function() {
    if (jObj.children('.hidden-text').css('height') === textMinHeight) {
      jObj.children('.hidden-text').css('height', ''+textMaxHeight);
      jObj.children('.read-more').html(HIDE_LABEL).addClass('active');
    } else {
      jObj.children('.hidden-text').css('height', ''+textMinHeight);
      jObj.children('.read-more').html(READ_MORE_LABEL).removeClass('active');
    }
  });

}
    </script>
    
</body>
</html>