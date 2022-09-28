<template>
    <div>
        <h3 class="mb-5">Add a beer to board</h3>
        <div v-if="errors">
            <div v-for="(v, k) in errors" :key="k" class="px-4 py-2 pr-0 mb-4 font-bold text-white bg-red-500 rounded shadow-lg">
                <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
                </p>
            </div>
        </div>
        <form class="mb-5 space-y-6" @submit.prevent="saveBeer">
            <div class="space-y-4 rounded-md shadow-sm">
                <div>
                    <v-select :options="options" v-model="form.beer">
                    <template slot="option" slot-scope="option">
                        <div class="d-center">
                            {{ option.id }}
                        </div>
                    </template>
                </v-select>
                </div>
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Price</label>
                    <div class="mt-1">
                        <input type="number" name="price" id="price"
                            min="0.00" max="50.00" step="0.05"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.price">
                    </div>
                </div>
            </div>

            <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ring-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
                Create
            </button>
        </form>
        
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
            <tr v-for="beer in beers" :key="beer.id">
                <td class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                    {{ beer.name }}
                </td>
                <td class="p-4 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                    {{ beer.style }}
                </td>
                <td class="p-4 pr-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                    {{ beer.abv }}
                </td>
                <td class="p-4 pr-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                    {{ beer.brewery }}
                </td>
                <td class="p-4 pr-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                    &pound;{{ beer.price }}
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
</template>
<script>
    import useBeerBoard from '../../composables/beer-board';
    import { onMounted, reactive, useMounted } from "vue";
    
    export default {
        setup() {
            const form = reactive({
                'beer': '',
                'price': '',
            })
            
            const { beers, options, errors, getBeers, destroyBeer, getBeerNames, storeBeer } = useBeerBoard()

            onMounted(() => {
                getBeers()
                getBeerNames()
            })

            const saveBeer = async () => {
                await storeBeer({...form});
                await getBeers();
            }

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
                form,
                errors,
                options,
                saveBeer,
                deleteBeer
            }
        }
    }
</script> 