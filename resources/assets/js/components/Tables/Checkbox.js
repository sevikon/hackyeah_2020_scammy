import React from 'react'
import {Map} from 'immutable'

import Input from './Input'
import PropTypes from 'prop-types'

const Checkbox = ({autocomplete, errors = Map(), label, name, onChange, placeholder, value}) => (
  <Input value={value}
         name={name}
         placeholder={placeholder}
         type="checkbox"
         autocomplete={autocomplete}
         errors={errors}
         onChange={(data) => onChange({
           target: data
         })}
         label={label}/>
)

Checkbox.propTypes = {
  autocomplete: PropTypes.bool,
  errors: PropTypes.instanceOf(Map),
  label: PropTypes.string,
  name: PropTypes.string,
  onChange: PropTypes.func.isRequired,
  placeholder: PropTypes.string,
  value: PropTypes.bool
}

export default Checkbox
