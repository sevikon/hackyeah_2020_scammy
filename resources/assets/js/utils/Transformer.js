import forOwn from 'lodash/forOwn'
import snakeCase from 'lodash/snakeCase'
import head from 'lodash/head'
import camelCase from 'lodash/camelCase'

export default class Transformer {
  /**
   * Method used to transform a fetched data
   *
   * @param param
   * @return {*}
   */
  static fetch(param) {
    if (param && Array.isArray(param)) {
      return Transformer.fetchCollection(param)
    } else if (param && typeof param === 'object') {
      return Transformer.fetchObject(param)
    }
    return param
  }

  /**
   * Method used to transform a fetched collection
   *
   * @param param
   * @return [Array]
   */
  static fetchCollection(param) {
    return param.map(item => Transformer.fetch(item))
  }

  /**
   * Method used to transform a fetched object
   *
   * @param param
   * @return {{}}
   */
  static fetchObject(param) {
    return this.objectToCamelCase(param)
  }

  static objectToCamelCase(param) {
    const data = {}
    forOwn(param, (value, key) => {
      data[camelCase(key)] = Transformer.fetch(value)
    })
    return data
  }

  static objectToSnakeCase(param) {
    const data = {}
    forOwn(param, (value, key) => {
      data[snakeCase(key)] = Transformer.fetch(value)
    })
    return data
  }

  static capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1)
  }

  /**
   * Method used to transform a send data
   *
   * @param param
   * @return {*}
   */
  static send(param) {
    if (param && Array.isArray(param)) {
      return Transformer.sendCollection(param)
    } else if (param && typeof param === 'object') {
      return Transformer.sendObject(param)
    }
    return param
  }

  /**
   * Method used to transform a collection to be send
   *
   * @param param
   * @return [Array]
   */
  static sendCollection(param) {
    return param.map(item => Transformer.send(item))
  }

  /**
   * Method used to transform a object to be send
   *
   * @param param
   * @returns {{}}
   */
  static sendObject(param) {
    const data = {}

    forOwn(param, (value, key) => {
      data[snakeCase(key)] = Transformer.send(value)
    })
    return data
  }

  /**
   * Method used to transform a form errors
   *
   * @param errors The fetched data
   * @param replace Boolean
   * @param searchStr String
   * @param replaceStr String
   * @returns {{}}
   */
  static resetValidationFields({errors, replace = false, searchStr = '', replaceStr = ''}) {
    const data = {}
    forOwn(errors, (value, key) => {
      let index
      if (replace) {
        index = camelCase(key.replace(searchStr, replaceStr))
      } else {
        index = camelCase(key)
      }
      data[index] = head(value)
    })
    return data
  }
}
