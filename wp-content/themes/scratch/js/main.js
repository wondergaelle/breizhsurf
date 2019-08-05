(function($) {  

  // MAP
  if($('#spotMap').length) {

    const themeURL = WPURLS.themeURL;

    const mapDiv = $('#spotMap');
    const lat = mapDiv.data('lat');
    const lon = mapDiv.data('lon');
    const title = mapDiv.data('title');

    const map = L.map('spotMap',{
      center: [lat, lon], 
      zoom: 12,
      scrollWheelZoom: false
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    const bsIcon = L.icon({
        iconUrl: themeURL + '/images/marker.png',
        shadowUrl: themeURL + '/images/marker-shadow.png',
    
        iconSize:     [38, 90], // size of the icon
        shadowSize:   [50, 60], // size of the shadow
        iconAnchor:   [22, 90], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    L.marker([lat, lon], {icon: bsIcon}).addTo(map)
      .bindPopup('<h4>' + title + '</h4>')
      .openPopup();
  }
  
  // Carousel
	$(".slick-posts").slick({

    mobileFirst: true,
    prevArrow: '<button type="button" class="slick-prev text-primary"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
    nextArrow: '<button type="button" class="slick-next text-primary"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
  
    // the magic
    responsive: [{
  
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }

    }, {
  
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        }
  
      },{
  
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        }
  
      }]
  });
  //when the slick slide initializes we want to set all of our slides to the same height
  $('.slick-posts').on('setPosition', function () {
    jbResizeSlider();
  });
  //we need to maintain a set height when a resize event occurs.
  //Some events will through a resize trigger: $(window).trigger('resize');
  $(window).on('resize', function () {
    jbResizeSlider();
  });

  //since multiple events can trigger a slider adjustment, we will control that adjustment here
  function jbResizeSlider() {
    var slickSlider = $('.slick-posts');
    slickSlider.find('.slick-slide').height('auto');

    var slickTrack = slickSlider.find('.slick-track');
    var slickTrackHeight = $(slickTrack).height();

    slickSlider.find('.slick-slide').css('height', slickTrackHeight + 'px');
  }
		

})(jQuery);