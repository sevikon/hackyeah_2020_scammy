import React, {Component} from 'react'
import Select from 'react-select'
import Async from 'react-select/lib/Async'

import PropTypes from 'prop-types'
import {List, Map} from 'immutable'
import {getRequestPromise, resolvePromise} from '../../utils/Http'

class SimpleSelect extends Component {
  constructor(props) {
    super(props)
    this.promiseOptions = ::this.promiseOptions
    this.filterOptions = ::this.filterOptions
    this.state = {
      asyncOptions: List()
    }
  }

  filterOptions = (inputValue, options) => {
    const asyncOptions = inputValue ? options.filter(i => i.label.toLowerCase().includes(inputValue.toLowerCase())) : options
    this.setState({
      asyncOptions: List(asyncOptions)
    })
    return asyncOptions
  };

  promiseOptions(inputValue) {
    const {requestUrl = '', requestType = 'post'} = this.props
    return resolvePromise(() => {
    }, getRequestPromise(requestUrl, requestType, {
      term: inputValue,
      value: this.props.value
    }), () => {
    }, (response) => {
      if (response.status === 'success') {
        return this.filterOptions(inputValue, response.data.opportunities.map((o) => ({
          label: o.url,
          value: o.id
        })))
      }
    })
  }

  render() {
    const {async = false, full = false, isClearable = true, isMulti = false, options = List(), errors = Map(), label, name, onChange, placeholder, value} = this.props
    const selected = isMulti ? options.filter((item) => (value && value.indexOf(item.value) >= 0)).toArray() : options.find((item) => (item.value === value))

    return <div
      className={`form-group m-form__group select-wrapper ${errors && errors.has(name) && ' is-invalid'} ${isMulti && value && value[0] ? ' multiple-wrapper' : ''}`}>
      {label && <label>{label}</label>}
      {!async && <Select placeholder={placeholder}
                         isMulti={isMulti}
                         full={full}
                         loadOptions={async ? this.promiseOptions : null}
                         isClearable={isClearable}
                         options={options.toArray()}
                         value={selected || null}
                         onChange={(selected) => {
                           onChange({
                             name,
                             value: selected ? (isMulti ? selected.map((e) => (e.value)) : selected.value) : ''
                           })
                         }} className="m-input"/>}
      {async && <Async placeholder={placeholder}
                       isMulti={isMulti}
                       defaultOptions
                       loadOptions={async ? this.promiseOptions : null}
                       isClearable={isClearable}
                       value={this.state.asyncOptions.find((item) => (item.value === value))}
                       onChange={(selected) => {
                         onChange({
                           name,
                           value: selected ? (isMulti ? selected.map((e) => (e.value)) : selected.value) : ''
                         })
                       }} className="m-input"/>}
      {errors && errors.has(name) && <div className="invalid-feedback">{errors.get(name)[0]}</div>}
    </div>
  }
}

SimpleSelect.propTypes = {
  async: PropTypes.bool,
  errors: PropTypes.instanceOf(Map),
  full: PropTypes.bool,
  isClearable: PropTypes.bool,
  isMulti: PropTypes.bool,
  label: PropTypes.string,
  name: PropTypes.string.isRequired,
  onChange: PropTypes.func,
  options: PropTypes.instanceOf(List),
  placeholder: PropTypes.string,
  requestUrl: PropTypes.string,
  requestType: PropTypes.string,
  value: PropTypes.oneOfType([
    PropTypes.number, PropTypes.string, PropTypes.array, PropTypes.instanceOf(List)
  ])
}

export default SimpleSelect
