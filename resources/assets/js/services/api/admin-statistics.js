import axios from 'axios'

export const getStatistics = () => {
  return axios
    .get('/api/admin/statistics/keywords')
    .then(response => response.data.data)
    .catch(error => {
      console.error(error)
    })
}
