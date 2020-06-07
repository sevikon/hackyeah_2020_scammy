import React, {Component} from 'react'
import PropTypes from 'prop-types'
import SimpleModal from '../Dashboard/SimpleModal'

class DeleteWebsiteModal extends Component {
  constructor(props) {
    super(props)
    this.handleDeleteModalClose = ::this.handleDeleteModalClose
    this.handleDelete = ::this.handleDelete
  }

  handleDeleteModalClose() {
    const {handleClose} = this.props
    handleClose()
  }

  handleDelete() {
    const {form, handleSubmit} = this.props
    handleSubmit(form.get('id'))
  }

  render() {
    const {visible} = this.props

    const deleteContent = (<div>
      <div className="alert alert-danger">
        Czy na pewno chcesz usunąć ten serwis? Tej akcji nie można cofnąć.
      </div>
      <div className="modal-footer">
        <button type="button" className="btn btn-secondary" onClick={this.handleDeleteModalClose}>Zamknij
        </button>
        <button type="button" className="btn btn-primary" onClick={this.handleDelete}>Usuń</button>
      </div>
    </div>)

    return (<SimpleModal title="Usuń Serwis"
                         handleClose={this.handleDeleteModalClose}
                         open={visible}
                         content={deleteContent}
                         className="middle-modal top-modal alert-modal"/>)
  }
}

DeleteWebsiteModal.propTypes = {
  form: PropTypes.object,
  visible: PropTypes.bool
}

export default DeleteWebsiteModal
