import axios from 'axios'

const service = axios.create({
  baseURL: 'http://homestead.test',
  timeout: 5000,
})

export default service