// app.js

require('./bootstrap');

import { createApp } from "vue";
import router from './router'
import BeerBoardIndex from './components/beer-board/BeerBoardIndex'

createApp({
    components: {
        BeerBoardIndex
    }
}).use(router).mount('#app')