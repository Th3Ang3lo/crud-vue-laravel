import axios from 'axios'

export const api = axios.create(process.env.VUE_APP_API_URL)
