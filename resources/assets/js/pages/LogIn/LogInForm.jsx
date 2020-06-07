import React from 'react'
import {Field, Form, Formik} from 'formik'

import {email as emailRegex} from 'constants/regexes'
import {Link} from 'react-router-dom'
import {ShieldPasswordInput, ShieldTextInput} from '../../components/Forms/Inputs'

const validateLogin = (values = {}) => {
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

export default ({onSubmit}) => {
  return (
    <Formik
      onSubmit={onSubmit}
      validate={validateLogin}
      initialValues={{email: '', password: ''}}
    >
      {() => (
        <Form>
          <div className="kt-login__signin d-block">
            <div className="kt-login__head">
              <h3 className="kt-login__title">Zaloguj się do Panelu Admina</h3>
            </div>
            <div className="kt-form">
              <Field
                type="text"
                name="email"
                placeholder="Email"
                component={ShieldTextInput}
              />
              <Field
                type="password"
                name="password"
                placeholder="Password"
                component={ShieldPasswordInput}
              />
              <div className="row kt-login__extra">
                <div className="col">
                  <label className="kt-checkbox">
                    <input type="checkbox" name="remember"/> Zapamiętaj mnie
                    <span/>
                  </label>
                </div>
                <div className="col kt-align-right">
                  <Link to="/forgot-password" className="kt-login__link">
                    Zapomniałaś/eś hasła?
                  </Link>
                </div>
              </div>
              <div className="kt-login__actions">
                <button
                  className="btn btn-brand btn-elevate kt-login__btn-primary"
                  type="submit"
                >
                  Zaloguj się
                </button>
              </div>
            </div>
          </div>
          <div className="kt-login__account">
            <span className="kt-login__account-msg">Nie masz jeszcze konta?</span>
            &nbsp;&nbsp;

            <Link to="/signup" className="kt-login__account-link">
              Zarejestruj się!
            </Link>
          </div>
        </Form>
      )}
    </Formik>
  )
}
