import React, {Component} from 'react'
import PropTypes from 'prop-types'
import {Map} from 'immutable'
import debounce from 'lodash/debounce'

import {getNotNull} from '../../utils/GlobalHelper'

class Input extends Component {
  constructor(props) {
    super(props)
    this.state = {
      value: ''
    }
    this.handleInputChange = ::this.handleInputChange
    this.handleReactiveChange = debounce(::this.handleReactiveChange, 400)
  }

  componentDidMount() {
    this.setState({
      value: getNotNull(this.props.value)
    })
  }

  componentDidUpdate(prevProps) {
    if (this.props.value !== prevProps.value && !this.props.reactive) {
      this.setState({
        value: getNotNull(this.props.value)
      })
    }
  }

  handleReactiveChange() {
    const {value} = this.state
    const {name, onChange} = this.props
    onChange && onChange({
      name,
      value
    })
  }

  handleInputChange(value) {
    value = getNotNull(value)
    this.setState({
      value
    }, () => {
      const {reactive} = this.props
      if (reactive) {
        this.handleReactiveChange()
      }
    })
  }

  render() {
    const {autocomplete = null, children, className = '', disabled = false, errors = Map(), label, name, onChange, placeholder, type = 'text'} = this.props

    return <div className={`form-group m-form__group ${className}`}>
      {label && <label>{label}</label>}
      <div className="input-wrapper">
        {type !== 'checkbox' &&
        <input type={type}
               disabled={disabled}
               autoComplete={autocomplete}
               placeholder={placeholder}
               value={this.state.value}
               name={name}
               className={`form-control m-input${errors.has(name) && ' is-invalid'}`}
               onChange={
                 (e) => this.handleInputChange(e.target.value)
               }
               onBlur={(e) => onChange({
                 name,
                 value: e.target.value
               })}/>}
        {type === 'checkbox' &&
        <label className="m-checkbox m-checkbox--focus">
          <input type="checkbox"
                 value={this.state.value}
                 checked={this.state.value === true}
                 disabled={disabled}
                 name={name}
                 onChange={(e) => onChange({
                   name,
                   value: (!!(e.target.value === 'false' || !e.target.value))
                 })}/>{placeholder}<span/>
        </label>}
        {errors.has(name) && <div className="invalid-feedback">{errors.get(name)[0]}</div>}
        {children}
      </div>
    </div>
  }
}

Input.propTypes = {
  autocomplete: PropTypes.string,
  children: PropTypes.oneOfType([
    PropTypes.object,
    PropTypes.array
  ]),
  className: PropTypes.string,
  disabled: PropTypes.bool,
  errors: PropTypes.instanceOf(Map),
  label: PropTypes.string,
  name: PropTypes.string.isRequired,
  onChange: PropTypes.func,
  placeholder: PropTypes.string,
  reactive: PropTypes.bool,
  type: PropTypes.string,
  value: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.number,
    PropTypes.bool
  ])
}

export default Input
