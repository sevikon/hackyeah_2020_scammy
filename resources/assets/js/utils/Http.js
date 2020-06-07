/* eslint-disable no-console */
import axios from 'axios'

import Transformer from './Transformer'

export const getData = (res, params = null, jsonForce = true) => {
  const data = res.data
  if (jsonForce && (typeof data === 'string' || data instanceof String)) {
    return {
      error: null,
      status: 'error',
      statusCode: 404,
      params
    }
  }
  return {
    status: 'success',
    data: Transformer.fetch(res.data.data),
    params
  }
}

export const getError = (err, params = null) => {
  const statusCode = err.response ? err.response.status : 500
  const data = {
    error: null,
    status: 'error',
    statusCode,
    params
  }

  if (statusCode === 422) {
    data.errors = err.response.data.errors
  } else if (statusCode === 403) {
    console.error('Privileges Error')
  } else if (statusCode === 401) {
    console.error('Please login again')
    data.error = err.response.data.message
  } else if (statusCode === 400) {
    data.error = err.response.data.message
    data.errors = err.response.data.errors
    console.error(data.error)
  }

  console.log(err)

  return data
}

export function sendGetRequest(url, data, callback, params) {
  return resolveRequest('get', url, data, callback, params)
}

export function sendPostRequest(url, data, callback, params) {
  return resolveRequest('post', url, data, callback, params)
}

export function sendPutRequest(url, data, callback, params) {
  return resolveRequest('put', url, data, callback, params)
}

export function sendPatchRequest(url, data, callback, params) {
  return resolveRequest('patch', url, data, callback, params)
}

export function sendDeleteRequest(url, data, callback, params) {
  return resolveRequest('delete', url, data, callback, params)
}

export function sendFileRequest(url, file, data = {}, progressCallback, config = {}, callback, params) {
  return resolveRequest('file', url, {
    file,
    data,
    progressCallback,
    config
  }, callback, params)
}

export function getRequestPromise(url, kind, data) {
  let promise
  switch (kind) {
    case 'put':
      promise = axios.put(url, data)
      break
    case 'patch':
      promise = axios.patch(url, data)
      break
    case 'post':
      promise = axios.post(url, data)
      break
    case 'delete':
      promise = axios.delete(url, data)
      break
    default:
      promise = axios.get(url, {
        params: data
      })
      break
  }
  return promise
}

export const resolvePromise = (promise, callback, resolve = () => {
}, reject = () => {
}, params = {}) => {
  return promise.then((res) => {
    return resolve(getData(res, params))
  }).catch((err) => {
    return reject(getError(err, params))
  })
}

function resolveRequest(kind, url, data, callback, params) {
  let callbackDefault = (data) => data

  return new Promise((resolve, reject) => {
    let promise
    switch (kind) {
      case 'put':
        promise = axios.put(url, data)
        break
      case 'patch':
        promise = axios.patch(url, data)
        break
      case 'post':
        promise = axios.post(url, data)
        break
      case 'delete':
        promise = axios.delete(url, data)
        break
      case 'file':
        promise = sendFile(url, data.file, data.data, data.progressCallback, data.config)
        break
      default:
        promise = axios.get(url, {
          params: data
        })
        break
    }
    return resolvePromise(promise, callback || callbackDefault, resolve, reject, params)
  })
}

export function sendFile(url, file, data = {}, progressCallback, config = {}) {
  let formData = new FormData()
  for (let propertyName in data) {
    if (data.hasOwnProperty(propertyName)) {
      formData.append(propertyName, data[propertyName])
    }
  }
  const {fileName = 'file'} = config
  formData.append(fileName, file)

  const uploadConfig = {
    onUploadProgress: function (progressEvent) {
      progressCallback && progressCallback(Math.round((progressEvent.loaded * 100) / progressEvent.total))
    }
  }
  return axios.post(url, formData, uploadConfig)
}
