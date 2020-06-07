import React, {Component} from 'react'
import PropTypes from 'prop-types'
import {Map} from 'immutable'

import SimpleModal from '../Dashboard/SimpleModal'
import SimpleForm from '../Dashboard/SimpleForm'

class ModalWebsite extends Component {
  render() {
    let fields = [
      {
        kind: 'input',
        name: 'url',
        label: 'Url',
        placeholder: 'Url'
      },
      {
        kind: 'input',
        name: 'domain',
        label: 'Domena',
        placeholder: 'Domena'
      },
      {
        kind: 'input',
        name: 'ranking',
        label: 'Ranking',
        placeholder: 'Ranking'
      }
    ]

    let rules = {
      url: 'max:255',
      domain: 'max:255',
      ranking: 'integer'
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

ModalWebsite.propTypes = {
  errors: PropTypes.instanceOf(Map),
  handleClose: PropTypes.func,
  handleFormChange: PropTypes.func,
  handleSubmit: PropTypes.func,
  form: PropTypes.instanceOf(Map),
  visible: PropTypes.bool
}

export default ModalWebsite
