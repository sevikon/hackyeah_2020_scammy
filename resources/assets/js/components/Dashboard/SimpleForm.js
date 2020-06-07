import React, {Component} from 'react'
import PropTypes from 'prop-types'
import {List, Map} from 'immutable'

import ReeValidate from 'ree-validate'
import {fixNumber, fixValidatorErrors, formatNumber, validateURL} from '../../utils/GlobalHelper'
import Input from './Input'
import Textarea from './Textarea'

ReeValidate.extend('money', {
  getMessage: field => 'The ' + field + ' value should be a valid number',
  validate: (value) => new Promise((resolve) => {
    value = fixNumber(value)
    if (isNaN(value)) {
      resolve(false)
    }
    value = formatNumber(value)
    const data = value ? /^[0-9.,]*$/.test(value) : false
    return resolve(data)
  })
})

ReeValidate.extend('valid_url', {
  getMessage: field => 'The ' + field + ' value should be a valid URL',
  validate: (value) => new Promise((resolve) => {
    return resolve(validateURL(value))
  })
})

class SimpleForm extends Component {
  constructor(props) {
    super(props)
    this.handleFormChange = ::this.handleFormChange
    this.handleFileChange = ::this.handleFileChange
    this.handleDeleteFile = ::this.handleDeleteFile
    this.handleChangeFileInputFile = ::this.handleChangeFileInputFile

    this.submit = ::this.submit
    this.getField = ::this.getField

    this.state = {
      errors: Map(),
      files: List()
    }
  }

  componentDidMount() {
    this.validator = new ReeValidate(this.props.rules)
    this.setState({
      error: this.validator.errors
    })
  }

  componentDidUpdate(prevProps) {
    if (this.props.rules !== prevProps.rules) {
      this.validator = new ReeValidate(this.props.rules)
      this.setState({
        error: this.validator.errors
      })
    }

    if (this.props.forceValidateId && this.props.forceValidateId !== prevProps.forceValidateId) {
      this.submit(null, {
        updateErrors: true
      })
    }
    if (this.props.errors !== prevProps.errors) {
      this.setState({
        errors: this.props.errors
      })
    }
    const {form} = this.props
    if (form && form !== prevProps.form) {
      const currentForm = form.toObject()
      const oldForm = prevProps.form.toObject()

      for (var name in currentForm) {
        if (currentForm.hasOwnProperty(name) && this.props.rules[name]) {
          if (currentForm[name] !== oldForm[name]) {
            this.validator.validate(name, currentForm[name]).then(() => {
              this.setState({errors: fixValidatorErrors(this.validator.errors)})
            })
          }
        }
      }
    }
  }

  handleFormChange({target}) {
    const name = target.name
    const value = target.value
    const {errors} = this.validator

    errors.remove(name)

    this.validator.validate(name, value).then(() => {
      this.setState({errors: fixValidatorErrors(errors)}, () => {
        this.props.handleChange(target)
      })
    })
  }

  handleFileChange({target}) {
    const name = target.name
    const value = target.value
    let files = this.state.files
    if (value) {
      files = files.filter((item) => item.name !== name).push({name, value})
    }
    this.setState({
      files
    }, () => {
      this.props.handleFileChange && this.props.handleFileChange({files})
    })
  }

  handleDeleteFile(target) {
    const name = target.name
    let files = this.state.files
    files = files.filter((item) => item.name !== name)
    this.setState({
      files
    }, () => {
      this.props.handleFileChange && this.props.handleFileChange({files})
    })
  }

  handleChangeFileInputFile({name, files}) {
    if (files.length > 0) {
      this.handleFileChange({
        target: {
          name,
          value: files[0]
        }
      })
    }
  }

  submit(e, config = {}) {
    e && e.preventDefault()

    const {updateErrors = false} = config

    // const { formData } = this.state
    const {errors} = this.validator
    let sent = 0
    let form = this.props.form
    const files = this.state.files.toArray()

    const sendFile = (file, data, config = {}) => {
      sent++
      let value
      let name
      if (config.name) {
        name = config.name
        value = config.value
      } else {
        name = file.name
        value = data.thumb_240
      }
      form = form.set(name, value)
      this.props.handleChange({
        name,
        value
      })
      if (sent >= files.length) {
        this.setState({
          files: List()
        }, () => {
          sendForm()
        })
      }
    }

    const sendForm = () => {
      this.props.handleSubmit && this.props.handleSubmit(form)
      if (updateErrors) {
        this.props.updateErrors && this.props.updateErrors(this.state.errors)
      }
    }

    const uploadFile = (file) => {
      const {handleFileUpload} = this.props
      handleFileUpload && handleFileUpload(file, (data, config) => sendFile(file, data, config))
      !handleFileUpload && sendForm()
    }

    this.validator.validateAll(form.toObject())
      .then(success => {
        if (success) {
          if (files.length > 0) {
            for (let a = 0; a < files.length; a++) {
              uploadFile(files[a])
            }
          } else {
            sendForm()
          }
        } else {
          this.setState({errors: fixValidatorErrors(errors)}, () => {
            if (updateErrors) {
              this.props.updateErrors && this.props.updateErrors(this.state.errors)
            }
          })
        }
      })
  }

  getField(item, key) {
    const {form} = this.props
    let {errors} = this.state

    if (item.kind === 'input') {
      return (<Input value={form.get(item.name)}
                     disabled={item.disabled}
                     name={item.name}
                     key={key}
                     placeholder={item.placeholder}
                     type={item.type}
                     autocomplete={item.autocomplete}
                     errors={errors}
                     onChange={(data) => this.handleFormChange({
                       target: data
                     })}
                     label={item.label}/>)
    } else if (item.kind === 'textarea') {
      return (<Textarea value={form.get(item.name)}
                        disabled={item.disabled}
                        name={item.name}
                        key={key}
                        placeholder={item.placeholder}
                        rows={item.rows}
                        errors={errors}
                        onChange={(data) => this.handleFormChange({
                          target: data
                        })}
                        label={item.label}/>)
    }
    if (item.kind === 'text') {
      return (<div className="form-group m-form__group text-field" key={key}>
        {item.label && <label>{item.label}</label>}
        <div className="input-wrapper">
          {item.type === 'url' && <a href={form.get(item.name)} target="_blank" rel="noreferrer noopener">
            {form.get(item.name)}
          </a>}
          {item.type === 'text' && form.get(item.name)}
          {item.customField && item.customField(form, errors)}
        </div>
      </div>)
    }
    return null
  }

  render() {
    const {actionsClassName, additionalButtons = null, className = '', fields, handleSubmit, uniqueKey = 'form', loading, sections = [], submitTitle = 'Zapisz'} = this.props

    return (<form className={`m-form m-form--fit m-form--label-align-right ${className}`} onSubmit={this.submit}>
      {sections.length > 0 && sections.map((section) => (
        <div className={`form-section ${section.className}`} key={`${uniqueKey}-section-${section.id}`}>
          {fields.filter((item) => (item.section === section.id)).map((item, index) => this.getField(item, `${uniqueKey}-${index}`))}
        </div>)
      )}
      {sections.length === 0 && fields.map((item, index) => this.getField(item, `${uniqueKey}-field-${index}`))}
      {(handleSubmit || additionalButtons) &&
      <div className={`m-form__actions${actionsClassName ? ' ' + actionsClassName : ''}`}>
        {additionalButtons && additionalButtons}
        {loading && <SimpleLoading/>}
        {!loading && handleSubmit && <button className="btn btn-primary btn-sm m-btn m-btn--custom"
                                             onClick={this.submit}>{submitTitle}</button>}
      </div>}
    </form>)
  }
}

SimpleForm.propTypes = {
  actionsClassName: PropTypes.string,
  additionalButtons: PropTypes.object,
  campaigns: PropTypes.instanceOf(List),
  className: PropTypes.string,
  clients: PropTypes.instanceOf(List),
  errors: PropTypes.object,
  fields: PropTypes.array,
  forceValidateId: PropTypes.number,
  form: PropTypes.object,
  handleChange: PropTypes.func,
  handleFileChange: PropTypes.func,
  handleFileUpload: PropTypes.func,
  handleSubmit: PropTypes.func,
  lists: PropTypes.instanceOf(List),
  loading: PropTypes.bool,
  projects: PropTypes.instanceOf(List),
  rules: PropTypes.object,
  sections: PropTypes.array,
  submitTitle: PropTypes.string,
  uniqueKey: PropTypes.string,
  updateErrors: PropTypes.func
}

export default (SimpleForm)
