import { createRouter, createWebHistory } from "vue-router";

import BeerBoardIndex from '../components/beer-board/BeerBoardIndex'

const routes = [
    {
        path: '/',
        name: 'beer-board.index',
        component: BeerBoardIndex
    },
]

export default createRouter({
    history: createWebHistory(),
    routes
})
