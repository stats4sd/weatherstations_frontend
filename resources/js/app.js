
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import vSelect from 'vue-select'
import BootstrapVue from 'bootstrap-vue' 
import { LMap, LTileLayer, LMarker, LPopup, LTooltip,  LIcon, LPolygon, LControl} from 'vue2-leaflet';
import 'leaflet/dist/leaflet.css';
import {Icon} from 'leaflet';


delete Icon.Default.prototype._getIconUrl;
Icon.Default.mergeOptions({
  iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
  iconUrl: require('leaflet/dist/images/marker-icon.png'),
  shadowUrl: require('leaflet/dist/images/marker-shadow.png'),
});

Vue.component('l-map', LMap);
Vue.component('l-tile-layer', LTileLayer);
Vue.component('l-marker', LMarker);
Vue.component('l-popup', LPopup);
Vue.component('l-tooltip', LTooltip);
Vue.component('l-icon', LIcon);
Vue.component('l-polygon', LPolygon);
Vue.component('l-control', LControl);

Vue.use(BootstrapVue) 


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('control-panel', require('./components/ControlPanel.vue').default);
Vue.component('tables', require('./components/Tables.vue').default);
Vue.component('data-preview', require('./components/DataPreview.vue').default);
Vue.component('bolivia-map', require('./components/Map.vue').default);
Vue.component('v-select', vSelect);



// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app' 
});


