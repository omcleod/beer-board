<template>

    <Head title="Add beer to beer board" />
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="mb-5 space-y-6" @submit.prevent="submit">
                        <div class="space-y-4 rounded-md shadow-sm">
                            <div>
                                <v-select :options="beerNames" v-model="form.beer">
                                    <template slot="option" slot-scope="option">
                                        <div class="d-center">
                                            {{ beerNames.id }}
                                        </div>
                                    </template>
                                </v-select>
                            </div>
                            <div v-if="errors.beer" class="text-red-500">
                                {{ errors.beer }}
                            </div>
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Price</label>
                                <div class="mt-1">
                                    <input type="number" name="price" id="price" min="0.00" max="50.00" step="0.05"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        v-model="form.price">
                                </div>
                            </div>
                            <div v-if="errors.price" class="text-red-500">
                                {{ errors.price }}
                            </div>
                        </div>
                        <button type="submit" :disabled="form.processing"
                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ring-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
                            Create
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3"
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

export default {
    props: {
        beerNames: Object,
        errors: Object
    },
    components: {
        Head,
        Link,
        vSelect
    },
    setup() {
        const form = useForm({
            'beer': '',
            'price': '',
        });

        function submit() {
            Inertia.post('/beers', {
                'beer_id': form.beer.id,
                'price': form.price
            })
        }

        return { form, submit }
    }
}
</script>