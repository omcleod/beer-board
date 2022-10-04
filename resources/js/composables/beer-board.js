import { ErrorCodes, ref } from 'vue'
import  axios  from "axios";
import { useRouter } from 'vue-router';

export default function useBeerBoard() {
    const beers = ref([])
    const options = ref([])
    const router = useRouter()
    const errors = ref('')

    const getBeers = async () => {
        let response = await axios.get('/api/beers')
        beers.value = response.data.data;
    }

    const getBeerNames = async () => {
        let response = await axios.get('/api/beerNames')
        options.value = response.data.data;
    }

    const storeBeer = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/beers', {
                beer_id: data.beer.id,
                price: data.price
            })
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const updateBeer = async (beer) => {
        errors.value = ''
        try {
            await axios.put('/api/beers/' + beer.id, beer)
        } catch (e) {
            if (e.response.status === 422) {
               errors.value = e.response.data.errors
            }
        }
    }

    const destroyBeer = async (id) => {
        await axios.delete('/api/beers/' + id)
    }

    return {
        beers,
        options,
        errors,
        getBeers,
        destroyBeer,
        storeBeer,
        updateBeer,
        getBeerNames
    }
}