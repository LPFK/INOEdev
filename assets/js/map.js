//
// map.js
// Theme module
//

const maps = document.querySelectorAll('[data-map]');
const accessToken = 'sk.eyJ1IjoiaW50YXJlcyIsImEiOiJja3dhZzZ5bHEzYXBjMnVyb3FlYWhiaWdkIn0.IwxArJfOez9gmPpa9XxqTA';

maps.forEach((map) => {
  const elementOptions = map.dataset.map ? JSON.parse(map.dataset.map) : {};

  const defaultOptions = {
    container: map,
    style: 'mapbox://styles/mapbox/light-v9',
    scrollZoom: false,
    interactive: false,
  };

  const options = {
    ...defaultOptions,
    ...elementOptions,
  };

  // Get access token
  mapboxgl.accessToken = accessToken;

  // Init map
  new mapboxgl.Map(options);
});


