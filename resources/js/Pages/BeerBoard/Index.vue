<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
</script>

<template>

    <Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div>
                            <Link :href="route('beers.create')"
                                class="items-center px-4 py-4 text-xs font-semibold text-white uppercase bg-blue-500 rounded-md">
                            Add beer to board
                            </Link>
                            <table class="w-full mt-8 text-sm border-collapse table-auto">
                                <thead>
                                    <tr>
                                        <th
                                            class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b dark:border-slate-600 text-slate-400 dark:text-slate-200">
                                            Name</th>
                                        <th
                                            class="p-4 pt-0 pb-3 font-medium text-left border-b dark:border-slate-600 text-slate-400 dark:text-slate-200">
                                            Style</th>
                                        <th
                                            class="p-4 pt-0 pb-3 pr-8 font-medium text-left border-b dark:border-slate-600 text-slate-400 dark:text-slate-200">
                                            ABV</th>
                                        <th
                                            class="p-4 pt-0 pb-3 pr-8 font-medium text-left border-b dark:border-slate-600 text-slate-400 dark:text-slate-200">
                                            Brewery</th>
                                        <th
                                            class="p-4 pt-0 pb-3 pr-8 font-medium text-left border-b dark:border-slate-600 text-slate-400 dark:text-slate-200">
                                            Price</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-slate-800">
                                    <tr v-for="beer in beers">
                                        <td
                                            class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                                            {{ beer.name }}
                                        </td>
                                        <td
                                            class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                                            {{ beer.style }}
                                        </td>
                                        <td
                                            class="p-4 pr-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                                            {{ beer.abv }}
                                        </td>
                                        <td class="p-4 pr-8 text-red-500 border-b">
                                            {{ beer.brewery }}
                                        </td>
                                        <td
                                            class="p-4 pr-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                                            <input type="number" name="price" id="price"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                v-model="beer.price">
                                        </td>
                                        <td class="px-3 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            <button @click="editBeer(beer)"
                                                class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white uppercase bg-green-500 rounded-md">
                                                Update
                                            </button>
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            <button @click="deleteBeer(beer.id)"
                                                class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white uppercase bg-red-500 rounded-md">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
export default {
    props: {
        beers: Object,
    },
    methods: {
        deleteBeer: function (id) {
            Inertia.delete('/beers/' + id);
        },
        editBeer: function (beer) {
            Inertia.put('/beers/' + beer.id, beer);
        }
    }
}
</script>
