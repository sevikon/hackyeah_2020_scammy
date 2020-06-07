import React from 'react'
import {Link} from 'react-router-dom'
import {Field, Form, Formik} from 'formik'

import {email as emailRegex} from 'constants/regexes'
import {ShieldPasswordInput, ShieldTextInput} from '../../components/Forms/Inputs'

const validate = (values = {}) => {
  let errors = {}

  if (!values.email) {
    errors.email = 'This field is required'
  } else if (!emailRegex.test(values.email)) {
    errors.email = 'Invalid email address'
  }

  if (!values.password) {
    errors.password = 'This field is required'
  }

  return errors
}

export const SignUpForm = ({onSubmit}) => (
  <Formik
    validate={validate}
    onSubmit={onSubmit}
    initialValues={{first_name: '', last_name: '', email: '', password: ''}}
  >
    {() => (
      <Form>
        <div className="kt-login__signup">
          <div className="kt-login__head">
            <h3 className="kt-login__title">Sign Up</h3>
            <div className="kt-login__desc">Enter your details to create your account:</div>
          </div>
          <div className="kt-form">
            <Field
              component={ShieldTextInput}
              type="text"
              name="first_name"
              placeholder="First Name"
            />
            <Field
              component={ShieldTextInput}
              type="text"
              name="last_name"
              placeholder="Last Name"
            />
            <Field
              component={ShieldTextInput}
              type="text"
              name="email"
              placeholder="Email"
            />
            <Field
              component={ShieldPasswordInput}
              type="password"
              name="password"
              placeholder="Password"
            />
            <div className="row kt-login__extra">
              <div className="col kt-align-left">
                <label className="kt-checkbox">
                  <input type="checkbox" name="agree"/>I Agree the
                  <a href="#" className="kt-link kt-login__link kt-font-bold">&nbsp;terms and conditions</a>.
                  <span/>
                </label>
                <span className="form-text text-muted"/>
              </div>
            </div>
            <div className="kt-login__actions">
              <button
                className="btn btn-brand btn-elevate kt-login__btn-primary"
                type="submit"
              >
                Sign Up
              </button>
              &nbsp;&nbsp;
              <Link to="/login">
                <button id="kt_login_signup_cancel" className="btn btn-light btn-elevate kt-login__btn-secondary">
                  Cancel
                </button>
              </Link>
            </div>
          </div>
        </div>
      </Form>
    )}
  </Formik>
)
