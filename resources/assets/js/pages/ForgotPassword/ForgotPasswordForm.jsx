import React from 'react'
import { Link } from 'react-router-dom'
import { Formik, Form, Field } from 'formik'

import { linkStyle } from 'constants/styles'
import { email as emailRegex } from 'constants/regexes'
import { ShieldTextInput } from '../../components/Forms/Inputs';

const validate = (values = {}) => {
  let errors = {}

  if (!values.email) {
    errors.email = 'This field is required'
  } else if (!emailRegex.test(values.email)) {
    errors.email = 'Invalid email address'
  }

  return errors
}

export const ForgotPasswordForm = ({onSubmit}) => {
  return (
    <Formik
      validate={validate}
      onSubmit={onSubmit}
      initialValues={{email: ''}}
    >
      {() => (
        <Form>
          <div className="kt-login__forgot">
            <div className="kt-login__head">
              <h3 className="kt-login__title">Forgotten Password ?</h3>
              <div className="kt-login__desc">Enter your email to reset your password:</div>
            </div>
            <div className="kt-form">
              <Field
                type="text"
                name="email"
                labelText="Email"
                placeholder="Email"
                component={ShieldTextInput}
              />
              <div className="kt-login__actions">
                <button className="btn btn-brand btn-elevate kt-login__btn-primary" type="submit">
                  Request
                </button>
                &nbsp;&nbsp;

                <Link className={linkStyle} to="/login">
                  <button className="btn btn-light btn-elevate kt-login__btn-secondary">
                    Cancel
                  </button>
                </Link>
              </div>
            </div>
          </div>
          <div className="kt-login__account">
            <span className="kt-login__account-msg">
                  Don't have an account yet ?
            </span>
            &nbsp;&nbsp;
            <Link to="/signup" className="kt-login__account-link">
              Sign Up!
            </Link>
          </div>
        </Form>
      )}
    </Formik>
  )
}
