import React from 'react'

const textInputClasses =
  'form-control'

export const TextInput = ({className = '', ...props}) => (
  <input
    {...props}
    type="text"
    className={`${textInputClasses} h-12 px-2 ${className}`}
  />
)

export const PasswordInput = ({className = '', ...props}) => (
  <input
    {...props}
    type="password"
    className={`${textInputClasses} h-12 px-2 ${className}`}
  />
)

export const TextArea = ({className = '', ...props}) => (
  <textarea
    {...props}
    className={`${textInputClasses} h-48 p-2 ${className}`}
  />
)

export const ShieldTextInput =
  ({
     field,
     form: {touched, errors, submitCount} = {},
     ...props
   }) => {
    const showError = touched && errors[field.name]

    return (
      <div className="input-group">
        <input
          placeholder={props.placeholder}
          {...field}
          type="text"
          className={`form-control`}
        />
        <div
          className={`error invalid-feedback ${showError ? 'd-block' : ''}`}
        >{errors[field.name]}</div>
      </div>
    )
  }

export const ShieldPasswordInput =
  ({
     field,
     form: {touched, errors, submitCount} = {},
     ...props
   }) => {
    const showError = touched && errors[field.name]

    return (
      <div className="input-group">
        <input
          placeholder={props.placeholder}
          {...field}
          type="password"
          className={`form-control`}
        />
        <div
          className={`error invalid-feedback ${showError ? 'd-block' : ''}`}
        >{errors[field.name]}</div>
      </div>
    )
  }
