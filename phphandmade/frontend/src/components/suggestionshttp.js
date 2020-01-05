import axios from 'axios'

export const SUGGESTIONS_HTTP = axios.create({
  baseURL: 'http://suggestions.dadata.ru',
  headers: {
    'ContentType': 'application/json',
    'Accept': 'application/json',
    'Authorization': 'Token 1bfa474909547a3ff4a5b1b65ac25666fa0d333e'
  }
})
