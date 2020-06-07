// import libs
import React, {Component} from 'react'
import styles from './WebsiteTable.scss'
import {List, Map} from 'immutable'
import PropTypes from 'prop-types'

import MTableExtended from '../Tables/MTableExtended'
import DashboardPortlet from '../Dashboard/DashboardPorlet'
import ModalWebsite from './ModalWebsite'
import moment from 'moment'
import Transformer from '../../utils/Transformer'
import DeleteWebsiteModal from './DeleteWebsiteModal'
import {createWebsite, deleteWebsite, updateWebsite} from "../../services/api/admin-websites";
import {fromUTC, niceDateFormat} from "../../utils/GlobalHelper";

class WebsiteTableExtended extends Component {
  constructor(props) {
    super(props)
    this.getColumns = ::this.getColumns
    this.showModal = ::this.showModal
    this.closeModal = ::this.closeModal
    this.handleFormChange = ::this.handleFormChange
    this.handleSubmit = ::this.handleSubmit

    this.handleDeleteSubmit = ::this.handleDeleteSubmit
    this.showDeleteModal = ::this.showDeleteModal
    this.closeDeleteModal = ::this.closeDeleteModal

    this.state = {
      errors: Map(),
      modalVisible: false,
      modalDeleteVisible: false,
      form: Map()
    }
    moment.locale('pl')
  }

  showModal(rowData) {
    this.setState({
      modalVisible: true,
      form: Map(Transformer.objectToSnakeCase(rowData))
    })
  }

  closeModal() {
    this.setState({
      modalVisible: false,
      form: Map()
    })
  }

  showDeleteModal(rowData) {
    this.setState({
      modalDeleteVisible: true,
      form: Map(Transformer.objectToSnakeCase(rowData))
    })
  }

  closeDeleteModal() {
    this.setState({
      modalDeleteVisible: false,
      form: Map()
    })
  }

  handleFormChange(d) {
    const {name, value} = d
    const {form} = this.state
    this.setState({
      form: form.set(name, value)
    })
  }

  handleSubmit() {
    const {form} = this.state
    const {handleCreate, handleEdit} = this.props
    const id = form.get('id')
    if (id) {
      updateWebsite(form.get('id'), form.toObject())
        .then((v) => {
          handleEdit(form.get('id'), v.data)
          this.closeModal()
        })
        .catch((err) => {
          this.setState({
            errors: Map(err.errors)
          })
        })
    } else {
      createWebsite(form.toObject())
        .then(
          (r) => {
            handleCreate(r.data)
            this.closeModal()
          })
        .catch((err) => {
          this.setState({
            errors: Map(err.errors)
          })
        })
    }
  }

  handleDeleteSubmit() {
    const {form} = this.state
    const {handleDelete} = this.props
    deleteWebsite(form.get('id'))
      .then((v) => {
        handleDelete(form.get('id'), v)
        this.closeDeleteModal()
      })
  }

  getColumns() {
    return [
      {
        title: 'Akcje',
        render: (rowData) => {
          return <div className={`actions ${styles.websiteTableActions}`}>
            <button onClick={() => this.showModal(rowData)} type="button" className="btn btn-outline-brand btn-icon"><i
              className="fa fa-edit"/></button>
            <button onClick={() => this.showDeleteModal(rowData)} type="button"
                    className="btn btn-outline-brand btn-icon"><i
              className="fa fa-trash"/></button>
          </div>
        }
      },
      {
        title: 'Url',
        field: 'url'
      },
      {
        title: 'Ranking',
        field: 'ranking',
        render: (rowData) => {
          const {ranking} = rowData;
          let cl = 'success';
          if (ranking > 80) {
            cl = 'danger'
          } else if (ranking >= 40) {
            cl = 'warning'
          }
          return <span className={`label label-lg label-light-${cl} label-inline font-weight-bold py-4`}>{
            ranking
          }</span>
        }
      },
      {
        title: 'Utworzony',
        field: 'createdAt',
        render: (rowData) => {
          return fromUTC(rowData.createdAt)
        }
      },
      {
        title: 'Zaktulizowany',
        field: 'updatedAt',
        render: (rowData) => {
          return fromUTC(rowData.updatedAt)
        }
      }
    ]
  }

  render() {
    const {websites} = this.props
    const {errors, form, modalVisible, modalDeleteVisible} = this.state

    return (<DashboardPortlet header={null}>
      <ModalWebsite
        errors={errors}
        visible={modalVisible}
        handleClose={this.closeModal}
        handleFormChange={this.handleFormChange}
        handleSubmit={this.handleSubmit}
        form={form}
      />
      <DeleteWebsiteModal
        visible={modalDeleteVisible}
        handleClose={this.closeDeleteModal}
        handleSubmit={this.handleDeleteSubmit}
        form={form}
      />
      <div className="buttons">
        <span onClick={() => this.showModal()} className="btn btn-success kt-subheader__btn-options"
              data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
          Dodaj Domenę
        </span>
      </div>
      <div className="table-wrapper">
        <div className="table-content">
          <MTableExtended
            columns={this.getColumns()}
            exportButton={true}
            data={websites.toArray()}
            options={{
              pageSize: 5
            }}
          />
        </div>
      </div>
    </DashboardPortlet>)
  }
}

WebsiteTableExtended.propTypes = {
  handleCreate: PropTypes.func,
  handleDelete: PropTypes.func,
  handleEdit: PropTypes.func,
  websites: PropTypes.instanceOf(List)
}

export default WebsiteTableExtended
