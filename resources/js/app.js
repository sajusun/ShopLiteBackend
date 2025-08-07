// import './bootstrap';

import Alpine from 'alpinejs';
// import { createApp } from 'vue';
// import StarRating from './components/StarRating.vue';

window.Alpine = Alpine;
Alpine.start();



import { createApp } from 'vue';
import StarRating from './components/StarRating.vue';

const app = createApp({});
app.component('star-rating', StarRating);
app.mount('#rating-component');

