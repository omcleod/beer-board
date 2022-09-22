import { ref } from 'vue'
import  axios  from "axios";
import { useRouter } from 'vue-router';

export default function useBeerBoard() {
    const beers = ref([])
    const router = useRouter()

    const getBeers = async () => {
        let response = await axios.get('/api/beers')
        beers.value = response.data.data;
    }

    return {
        beers,
        getBeers
    }
}