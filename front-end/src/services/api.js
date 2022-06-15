import axios from 'axios'

const token = $cookies.get('token')

const api = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: {
    Authorization: token ? `Bearer ${$cookies.get('token')}` : null
  }
})

export default api
