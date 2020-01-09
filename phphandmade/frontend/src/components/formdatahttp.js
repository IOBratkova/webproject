import axios from 'axios'

export const FORMDATA_HTTP = axios.create({
  baseURL: 'http://127.0.0.1:50001/api',
  headers: {
    'Content-Type': 'multipart/form-data'
  }
})
