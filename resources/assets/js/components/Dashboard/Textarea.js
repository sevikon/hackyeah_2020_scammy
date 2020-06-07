import React, {Component} from 'react'
import PropTypes from 'prop-types'
import {Map} from 'immutable'
import {getNotNull} from '../../utils/GlobalHelper'

class Textarea extends Component {
  constructor(props) {
    super(props)
    this.state = {
      value: ''
    }
    this.handleTextareaChange = ::this.handleTextareaChange
  }

  componentDidMount() {
    this.setState({
      value: getNotNull(this.props.value)
    })
  }

  componentDidUpdate(prevProps) {
    if (this.props.value !== prevProps.value) {
      this.setState({
        value: getNotNull(this.props.value)
      })
    }
  }

  handleTextareaChange(value) {
    this.setState({
      value
    })
  }

  render() {
    const {children, className = '', disabled = false, errors, label, name, onChange, placeholder, rows = 5} = this.props

    return <div className={`form-group m-form__group ${className}`}>
      {label && <label>{label}</label>}
      <div className="input-wrapper">
                <textarea placeholder={placeholder}
                          disabled={disabled}
                          rows={rows}
                          value={this.state.value}
                          className={`form-control m-input${errors.has(name) && ' is-invalid'}`}
                          onChange={
                            (e) => this.handleTextareaChange(e.target.value)
                          }
                          onBlur={(e) => onChange({
                            name,
                            value: e.target.value
                          })}/>
        {errors.has(name) && <div className="invalid-feedback">{errors.get(name)[0]}</div>}
        {children}
      </div>
    </div>
  }
}

Textarea.propTypes = {
  children: PropTypes.oneOfType([
    PropTypes.object,
    PropTypes.array
  ]),
  className: PropTypes.string,
  disabled: PropTypes.bool,
  errors: PropTypes.instanceOf(Map).isRequired,
  label: PropTypes.string,
  name: PropTypes.string.isRequired,
  onChange: PropTypes.func,
  placeholder: PropTypes.string,
  rows: PropTypes.number,
  value: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.number
  ])
}

export default Textarea
