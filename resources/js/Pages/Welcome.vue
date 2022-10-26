<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    beers: Object,
})
</script>

<template>
    <Head title="Welcome" />

    <!-- <div class="relative flex justify-center min-h-screen bg-gray-100 items-top dark:bg-gray-900 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 underline">
                    Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Register
                </Link>
            </template>
        </div>
    </div> -->
    <div>
        <h3 class="mb-5">Digital Beer Board</h3>

        <table class="w-full text-sm border-collapse table-auto">
            <thead>
            <tr>
                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b dark:border-slate-600 text-slate-400 dark:text-slate-200">Name</th>
                <th class="p-4 pt-0 pb-3 font-medium text-left border-b dark:border-slate-600 text-slate-400 dark:text-slate-200">Style</th>
                <th class="p-4 pt-0 pb-3 pr-8 font-medium text-left border-b dark:border-slate-600 text-slate-400 dark:text-slate-200">ABV</th>
                <th class="p-4 pt-0 pb-3 pr-8 font-medium text-left border-b dark:border-slate-600 text-slate-400 dark:text-slate-200">Brewery</th>
                <th class="p-4 pt-0 pb-3 pr-8 font-medium text-left border-b dark:border-slate-600 text-slate-400 dark:text-slate-200">Price</th>
            </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-800">
            <tr v-for="beer in beers">
                <td class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                    {{ beer.name }}
                </td>
                <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                    {{ beer.style }}
                </td>
                <td class="p-4 pr-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                    {{ beer.abv }}
                </td>
                <td  class="p-4 pr-8 text-red-500 border-b">
                    {{ beer.brewery }}
                </td>
                <td class="p-4 pr-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                    {{ beer.price }}
                </td>
            </tr> 
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: {
            beers: Object
        }
    }
</script>
