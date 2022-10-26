import { createRouter, createWebHistory } from "vue-router";

import BeerBoardList from '../components/beer-board/BeerBoardList'
import BeerBoardIndex from '../components/beer-board/BeerBoardIndex'


const routes = [
    {
        path: '/',
        name: 'beer-board.list',
        component: BeerBoardList
    },
    {
        path: '/admin',
        name: 'beer-board.index',
        component: BeerBoardIndex
    },
]

export default createRouter({
    history: createWebHistory(),
    routes
})
