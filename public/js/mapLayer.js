var map = new ol.Map({
    target: "map",
    layers: [
        new ol.layer.Tile({
            source: new ol.source.OSM(),
        }),
    ],
    view: new ol.View({
        center: ol.proj.fromLonLat([-52.99, 4.0]),
        zoom: 8,
    }),
});

let marker = [
    [-52.99, 4.0],
    [-52, 4.02],
    [-53.8, 4.2],
    [-52.3, 3.99],
];

var layer = new ol.layer.Vector({
    source: new ol.source.Vector({
        features: [
            new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.fromLonLat(marker[0])),
            }),
            new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.fromLonLat(marker[1])),
            }),
            new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.fromLonLat(marker[2])),
            }),
            new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.fromLonLat(marker[3])),
            }),
        ],
    }),
});
map.addLayer(layer);

var container = document.getElementById("popup");
var content = document.getElementById("popup-content");
var closer = document.getElementById("popup-closer");

var overlay = new ol.Overlay({
    element: container,
    autoPan: true,
    autoPanAnimation: {
        duration: 250,
    },
});

map.addOverlay(overlay);

closer.onclick = function () {
    overlay.setPosition(undefined);
    closer.blur();
    return false;
};

map.on("click", function (event) {
    if (map.hasFeatureAtPixel(event.pixel) === true) {
        var coordinate = event.coordinate;
        content.innerHTML = "💰🔫 <br> " + coordinate;
        overlay.setPosition(coordinate);
    } else {
        overlay.setPosition(undefined);
        closer.blur();
    }
});