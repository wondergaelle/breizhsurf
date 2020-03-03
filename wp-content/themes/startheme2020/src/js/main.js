import $ from 'jquery';
import 'owl.carousel';
import 'leaflet';
import 'bootstrap';

$(document).ready(function () {

    const mapDiv = $('#spotMap');
    const latitude = mapDiv.data('latitude');
    const longitude = mapDiv.data('longitude');
    const title = mapDiv.data('title');


    /* Spot Map */
    var map = L.map('spotMap').setView([latitude, longitude], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([latitude, longitude]).addTo(map)
        .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
        .openPopup();

    /*News Carousel */
    $(".carousel-news").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        navText: ['<i class="fa fa-angle-left fa-3x" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right fa-3x" aria-hidden="true"></i>'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });

});