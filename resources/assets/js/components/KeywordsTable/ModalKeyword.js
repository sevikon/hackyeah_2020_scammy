import React, {Component} from 'react'
import PropTypes from 'prop-types'
import {Map} from 'immutable'

import SimpleModal from '../Dashboard/SimpleModal'
import SimpleForm from '../Dashboard/SimpleForm'

class ModalKeyword extends Component {
  render() {
    let fields = [
      {
        kind: 'input',
        name: 'keyword_title',
        label: 'Słowo kluczowe',
        placeholder: 'Słowo kluczowe'
      },
      {
        kind: 'input',
        name: 'keyword_value',
        label: 'Waga Słowa',
        placeholder: 'Waga Słowa'
      }
    ]

    let rules = {
      keyword_title: 'max:255',
      keyword_value: 'integer'
    }

    const {errors, form, handleClose, handleSubmit, handleFormChange} = this.props

    const content = (<div className="modal-body opportunity-entry-form">
      <SimpleForm
        errors={errors}
        loading={false}
        rules={rules}
        form={form}
        fields={fields}
        handleFileChange={this.handleFileChange}
        handleChange={handleFormChange}
        handleSubmit={handleSubmit}
      />
    </div>)

    const {visible} = this.props
    return (<SimpleModal title="Dodaj / Edytuj Usługę"
                         handleClose={handleClose}
                         open={visible}
                         content={content}
                         className="big-modal"/>
    )
  }
}

ModalKeyword.propTypes = {
  errors: PropTypes.instanceOf(Map),
  handleClose: PropTypes.func,
  handleFormChange: PropTypes.func,
  handleSubmit: PropTypes.func,
  form: PropTypes.instanceOf(Map),
  visible: PropTypes.bool
}

export default ModalKeyword
