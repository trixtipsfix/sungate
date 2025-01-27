<?php require_once 'req/start.php'; ?>
<?php require_once 'req/head_start.php'; ?>
<?php
$link = g('link');
$detail = $db->get_row("SELECT * FROM the_hotel WHERE slug = '$link'");
?>

    <title><?=$detail->name?></title>

<?php require_once 'req/head.php'; ?>
<?php require_once 'req/body_start.php'; ?>
<?php require_once 'req/header.php'; ?>


    <main>
        <style>
            .hero_in.hotels_detail:before{
                background-image: url('data/hotel/<?=$detail->picture?>');
            }
        </style>
        <section class="hero_in hotels_detail">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp"><span></span><?=$detail->name?></h1>
                </div>
                <span class="magnific-gallery">
					<?php
                    $i = '0';
                    $pictures = $db->get_results("SELECT * FROM the_hotel_picture WHERE hotel_id = $detail->hotel_id");
                    $picturesRows = $db->get_var("SELECT COUNT(*) FROM the_hotel_picture WHERE hotel_id = $detail->hotel_id");
                    foreach ($pictures as $picture) {
                        $i++;
                        $content = $picture->content;
                        if(!$content){
                            $content = $detail->name;
                        }

                        ?>
                        <a href="data/hotel/pictures/<?=$picture->big_picture?>" <?php if($i== 1){ echo 'class="btn_photos"';} ?>  title="<?=$content?>" data-effect="mfp-zoom-in"><?php if($i== 1){ echo 'Schauen ('.$picturesRows.' Adet)';} ?></a>
                    <?php } ?>
				</span>
            </div>
        </section>
        <!--/hero_in-->

        <div class="bg_color_1">
            <nav class="secondary_nav sticky_horizontal">
                <div class="container">
                    <ul class="clearfix">
                        <li><a href="#description" class="active"> Otel Hakkında</a></li>
                        <li><a href="#rooms">Zimmer</a></li>
                        <li><a href="#reviews">Bewertungen</a></li>
                        <li><a href="#sidebar">Booking</a></li>
                    </ul>
                </div>
            </nav>
            <div class="container margin_60_35">
                <div class="row">
                    <div class="col-lg-8">
                        <section id="description">
                            <h2><strong><?=$detail->name?></strong> Hakkında</h2>
                            <?=$detail->content?>
                            <hr>
                            <div id="rooms" class="clearfix">

                                <h3>Zimmer</h3>
                                <?php
                                    $roomSearch = $db->get_var("SELECT COUNT(*) FROM the_hotel_room WHERE hotel_id = '$detail->hotel_id' AND status = 1");
                                    if($roomSearch){
                                        $roomList = $db->get_results("SELECT * FROM the_hotel_room WHERE hotel_id = '$detail->hotel_id' AND status = 1");
                                        foreach ($roomList as $room){
                                ?>
                                <div class="room_type">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="data/hotel/room/<?=$room->picture?>" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-md-8">
                                            <h4><?=$room->name?></h4>
                                            <div><?=$room->content?></div>
                                            <div>Person Price: <?=$room->person_price?> € - Child Price: <?=$room->child_price?> €</div>
                                            <hr>
                                            <ul class="hotel_facilities">
                                                <?php
                                                $featuresLists = $db->get_results("SELECT * FROM the_hotel_room_features ORDER BY rank ASC");
                                                foreach ($featuresLists  as $featuresList ){
                                                    $aktif = $db->get_row("SELECT * FROM the_hotel_room_features_relationship WHERE room_id = '$room->room_id' AND hotel_id = '$detail->hotel_id' AND features_id = '$featuresList->features_id' ");
                                                    ?>

                                                    <li> <?php if(!empty($aktif)){echo $featuresList->name;} ?></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                </div>
                                <?php }  ?>
                                <?php } ?>
                            </div>
                            <hr>
                            <h3>Otel Lokasyonu</h3>
                            <div id="map" class="map map_single add_bottom_30"></div>
                            <!-- End Map -->
                        </section>
                        <!-- /section -->

                        <section id="reviews">
                            <h2>Bewertungen</h2>
                            <div class="reviews-container">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div id="review_summary">
                                            <strong>8.5</strong>
                                            <em>Superb</em>
                                            <small>Based on 4 reviews</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
                                        </div>
                                        <!-- /row -->
                                    </div>
                                </div>
                                <!-- /row -->
                            </div>

                            <hr>

                            <div class="reviews-container">

                                <!-- /review-box -->
                                <div class="review-box clearfix">
                                    <figure class="rev-thumb"><img src="lib/img/avatar3.jpg" alt="">
                                    </figure>
                                    <div class="rev-content">
                                        <div class="rating">
                                            <i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                        </div>
                                        <div class="rev-info">
                                            Sara – March 31, 2016:
                                        </div>
                                        <div class="rev-text">
                                            <p>
                                                Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /review-box -->
                            </div>
                            <!-- /review-container -->
                        </section>
                        <!-- /section -->
                        <hr>

                        <div class="add-review">
                            <h5>Leave a Review</h5>
                            <form>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Name and Lastname *</label>
                                        <input type="text" name="name_review" id="name_review" placeholder="" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email *</label>
                                        <input type="email" name="email_review" id="email_review" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Rating </label>
                                        <div class="custom-select-form">
                                            <select name="rating_review" id="rating_review" class="wide">
                                                <option value="1">1 (lowest)</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5" selected>5 (medium)</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10 (highest)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Your Review</label>
                                        <textarea name="review_text" id="review_text" class="form-control" style="height:130px;"></textarea>
                                    </div>
                                    <div class="form-group col-md-12 add_top_20">
                                        <input type="submit" value="Submit" class="btn_1" id="submit-review">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /col -->

                    <aside class="col-lg-4" id="sidebar">
                        <div class="box_detail booking">

                            <?php
                                $enkucukFiyat = $db->get_row("SELECT * FROM the_hotel_room WHERE hotel_id = '$detail->hotel_id' ORDER BY person_price ASC LIMIT 1");
                            ?>

                            <div class="price">
                                <span><?=$enkucukFiyat->person_price?>€ <small>person</small></span>
                                <div class="score"><span>Good<em>350 Reviews</em></span><strong>7.0</strong></div>
                            </div>
                            <form  id="rez_one"  method="POST" onsubmit="return false" action="" class="user-form payment">
                                <input type="hidden" name="rez_type" value="hotel">
                                <input type="hidden" name="hotel_id" value="<?=$detail->hotel_id?>">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="dates" placeholder="When..">
                                    <i class="icon_calendar"></i>
                                </div>
                                <div class="panel-dropdown">
                                    <a href="#">Anzahl Personen <span class="qtyTotal">1</span></a>
                                    <div class="panel-dropdown-content right">
                                        <div class="qtyButtons">
                                            <label>Erwachsene</label>
                                            <input type="text" name="person_size" class="qtyInput" value="2">
                                        </div>
                                        <div class="qtyButtons">
                                            <label>Anzahl Kinder</label>
                                            <input type="text" name="child_size" class="qtyInput" value="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <div class="custom-select-form">
                                        <select class="wide" name="room_id">
                                            <?php
                                            $roomSearch = $db->get_var("SELECT COUNT(*) FROM the_hotel_room WHERE hotel_id = '$detail->hotel_id' AND status = 1");
                                            if($roomSearch){
                                            $roomList = $db->get_results("SELECT * FROM the_hotel_room WHERE hotel_id = '$detail->hotel_id' AND status = 1");
                                            foreach ($roomList as $room){
                                            ?>
                                            <option value="<?=$room->room_id?>"><?=$room->name?></option>
                                            <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <button class="btn_1 full-width purchase" type="submit"  onclick="$.rezervasyonForm(<?=$detail->tour_id?>)"> Reservieren </button>
                            </form>
                            <div class="text-center"><small> Kinder ab 12 Jahren zahlen den vollen Preis.</small></div>
                        </div>
                        <ul class="share-buttons">
                            <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
                            <li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Tweet</a></li>
                            <li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
                        </ul>
                    </aside>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_color_1 -->
        <?php require_once 'inc/turlar.bottom.php'; ?>

    </main>
    <!--/main-->


<?php require_once 'req/footer.php'; ?>
<?php require_once 'req/script.php'; ?>


    <script src="lib/js/input_qty.js"></script>
    <script src="lib/js/infobox.js"></script>
    <script>
        $.rezervasyonForm = function(){
            var deger = $("form#rez_one").serialize();
            $.ajax({
                url:"orezervasyonOne",
                type:"post",
                data:deger,
                dataType :"json",
                success:function(cevap){
                    if(cevap.hata){
                        alert(cevap.hata);
                    }else{
                        window.location.href = "rezervasyon";
                    }
                }
            });
        }
    </script>
    <script src="lib/js/moment.min.js"></script>
    <script src="lib/js/daterangepicker.js"></script>
    <script>
        $(function() {
            $('input[name="dates"]').daterangepicker({
                autoUpdateInput: false,
                opens: 'left',
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM-DD-YY') + ' > ' + picker.endDate.format('MM-DD-YY'));
            });
            $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });
    </script>

    <!-- INPUT QUANTITY  -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB-xZEPXABI2sXG7Pao-dJdAL-5VodV-_U"></script>
    <script>

        (function(A) {

            if (!Array.prototype.forEach)
                A.forEach = A.forEach || function(action, that) {
                    for (var i = 0, l = this.length; i < l; i++)
                        if (i in this)
                            action.call(that, this[i], i, this);
                };

        })(Array.prototype);

        var
            mapObject,
            markers = [],
            markersData = {
                'Marker': [
                    {
                        type_point: 'Paris Centre',
                        name: 'Mariott Hotel',
                        location_latitude: <?=$detail->location_latitude?>,
                        location_longitude: <?=$detail->location_longitude?>,
                        map_image_url: 'lib/img/thumb_map_single_hotel.jpg',
                        rate: 'Superb | 7.5',
                        name_point: 'Mariott Hotel',
                        get_directions_start_address: '',
                        phone: '+3934245255'
                    }
                ]

            };

        var mapOptions = {
            zoom: 14,
            center: new google.maps.LatLng(<?=$detail->location_latitude?>, <?=$detail->location_longitude?>),
            mapTypeId: google.maps.MapTypeId.ROADMAP,

            mapTypeControl: false,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            panControl: false,
            panControlOptions: {
                position: google.maps.ControlPosition.TOP_RIGHT
            },
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.LARGE,
                position: google.maps.ControlPosition.TOP_LEFT
            },
            scrollwheel: false,
            scaleControl: false,
            scaleControlOptions: {
                position: google.maps.ControlPosition.TOP_LEFT
            },
            streetViewControl: true,
            streetViewControlOptions: {
                position: google.maps.ControlPosition.LEFT_TOP
            },
            styles: [
                {
                    "featureType": "administrative.country",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.locality",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.neighborhood",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "landscape.man_made",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "landscape.natural.landcover",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "landscape.natural.terrain",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.attraction",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.business",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.government",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.medical",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.place_of_worship",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.school",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi.sports_complex",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit.station.airport",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit.station.bus",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit.station.rail",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                }
            ]
        };
        var
            marker;
        mapObject = new google.maps.Map(document.getElementById('map'), mapOptions);
        for (var key in markersData)
            markersData[key].forEach(function (item) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
                    map: mapObject,
                    icon: 'img/pins/' + key + '.png',
                });

                if ('undefined' === typeof markers[key])
                    markers[key] = [];
                markers[key].push(marker);
                google.maps.event.addListener(marker, 'click', (function () {
                    closeInfoBox();
                    getInfoBox(item).open(mapObject, this);
                    mapObject.setCenter(new google.maps.LatLng(item.location_latitude, item.location_longitude));
                }));

            });


        function closeInfoBox() {
            $('div.infoBox').remove();
        };

        function getInfoBox(item) {
            return new InfoBox({
                content:
                '<div class="marker_info" id="marker_info">' +
                '<img src="' + item.map_image_url + '" alt=""/>' +
                '<span>'+
                '<span class="infobox_rate">'+ item.rate +'</span>' +
                '<h3>'+ item.name_point +'</h3>' +
                '<em>'+ item.type_point +'</em>' +
                '<strong>'+ item.description_point +'</strong>' +
                '<form action="http://maps.google.com/maps" method="get" target="_blank"><input name="saddr" value="'+ item.get_directions_start_address +'" type="hidden"><input type="hidden" name="daddr" value="'+ item.location_latitude +',' +item.location_longitude +'"><button type="submit" value="Get directions" class="btn_infobox_get_directions">Get directions</button></form>' +
                '<a href="tel://'+ item.phone +'" class="btn_infobox_phone">'+ item.phone +'</a>' +
                '</span>' +
                '</div>',
                disableAutoPan: false,
                maxWidth: 0,
                pixelOffset: new google.maps.Size(10, 92),
                closeBoxMargin: '',
                closeBoxURL: "img/close_infobox.png",
                isHidden: false,
                alignBottom: true,
                pane: 'floatPane',
                enableEventPropagation: true
            });


        };


        $(function() {
            $('input[name="dates"]').daterangepicker({
                autoUpdateInput: false,
                opens: 'left',
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM-DD-YY') + ' > ' + picker.endDate.format('MM-DD-YY'));
            });
            $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });
    </script>


<?php require_once 'req/body_end.php'; ?>