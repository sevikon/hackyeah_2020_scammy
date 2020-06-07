import React from 'react'
import {connect} from 'react-redux'
import {Field, Form, Formik} from 'formik'

import {email as emailRegex} from 'constants/regexes'
import {PictureUpload, PositiveButton, TextFormLine} from 'components'

const validate = (values = {}) => {
  let errors = {}

  if (!values.first_name) {
    errors.first_name = 'This field is required'
  }

  if (!values.last_name) {
    errors.last_name = 'This field is required'
  }

  if (!values.email) {
    errors.email = 'This field is required'
  } else if (!emailRegex.test(values.email)) {
    errors.email = 'Invalid email address'
  }

  return errors
}

const UserSettingsFormComponent = ({
                                     user,
                                     onSubmit,
                                     className = '',
                                     avatarUploadHandler
                                   }) => (
  <Formik
    validate={validate}
    onSubmit={onSubmit}
    initialValues={user}
    validateOnChange={false}
  >
    {() => (
      <Form className={className}>
        <div className="flex items-center my-4">
          <Field
            name="avatar"
            component={PictureUpload}
            uploadHandler={avatarUploadHandler}
            className="mr-10"
          />
          <div className="flex-grow">
            <div className="row">
              <div className="col-md-6">
                <Field name="email" component={TextFormLine} labelText="Email"/>
                <Field
                  name="first_name"
                  component={TextFormLine}
                  labelText="Imię"
                />
                <Field
                  name="last_name"
                  component={TextFormLine}
                  labelText="Nazwisko"
                />
              </div>
            </div>
          </div>
        </div>

        <div className="flex border-grey-light">
          <PositiveButton type="submit" className="ml-auto">
            Zapisz Dane
          </PositiveButton>
        </div>
      </Form>
    )}
  </Formik>
)

export const UserSettingsForm = connect(state => {
  const {
    session: {currentUser}
  } = state
  return {
    user: state.entities.users[currentUser]
  }
}, null)(UserSettingsFormComponent)
