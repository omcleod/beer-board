// app.js

require('./bootstrap');

import { createApp } from "vue"
import BeersIndex from './components/beer-board/Index'

const app = createApp({})
app.component('beer-board-list', BeersIndex)
app.mount('#app')