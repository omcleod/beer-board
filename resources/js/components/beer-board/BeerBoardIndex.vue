<template>
    <div>
        <table class="border-collapse table-auto w-full text-sm">
            <thead>
            <tr>
                <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Name</th>
                <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Style</th>
                <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">ABV</th>
                <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Brewery</th>
                <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Price</th>
            </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-800">
            <tr v-for="beer in beers" :key="beer.id">
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                    {{ beer.name }}
                </td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                    {{ beer.style }}
                </td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                    {{ beer.abv }}
                </td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                    {{ beer.brewery }}
                </td>
                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                    &pound;{{ beer.price }}
                </td>
                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                    <button @click="deleteBeer(beer.id)"
                            class="inline-flex items-center px-4 py-2 bg-red-500 rounded-md font-semibold text-xs text-white uppercase">
                            Delete
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    import useBeerBoard from '../../composables/beer-board';
    import { onMounted, useMounted } from "vue";
    
    export default {
        setup() {
            const { beers, getBeers, destroyBeer } = useBeerBoard()

            onMounted(getBeers)

            const deleteBeer = async (id) => {
                //TODO Replace with modal
                if (!window.confirm('Are you sure you want to remove this beer?')) {
                    return
                }

                await destroyBeer(id);
                await getBeers();
            }

            return {
                beers,
                deleteBeer
            }
        }
    }
</script> 