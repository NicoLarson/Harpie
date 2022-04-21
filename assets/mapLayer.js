import { Map, View } from 'ol';
import TileLayer from 'ol/layer/Tile';
import XYZ from 'ol/source/XYZ';
import OSM from 'ol/source/OSM';
import { fromLonLat } from 'ol/proj';
import { Vector as VectorLayer } from 'ol/layer';
import { Vector as VectorSource } from 'ol/source';
import Point from 'ol/geom/Point';
import Feature from 'ol/Feature';

let map = new Map({
    layers: [
        new TileLayer({ source: new OSM() })
    ],
    layers: [
        new TileLayer({
            source: new OSM(),
        }),
    ],
    view: new View({
        center: fromLonLat([-52.99, 4.0]),
        zoom: 8,
    }),
    target: 'map'
});


let testMarker = [
    [-52.99, 4.0],
    [-52, 4.02],
    [-53.8, 4.2],
    [-52.3, 3.99],
];
// addLayer testMarker point on the map
let layer = new VectorLayer({
    source: new VectorSource({
        features: [
            new Feature({
                geometry: new Point(fromLonLat(testMarker[0])),
            }),
            new Feature({
                geometry: new Point(fromLonLat(testMarker[1])),
            }),
            new Feature({
                geometry: new Point(fromLonLat(testMarker[2])),
            }),
            new Feature({
                geometry: new Point(fromLonLat(testMarker[3])),
            }),
        ],
    }),
});
map.addLayer(layer);


// TODO: Afficher les informations quand on survole les points
