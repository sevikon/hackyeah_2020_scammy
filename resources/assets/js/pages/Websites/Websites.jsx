import Helmet from 'react-helmet'
import React, {Component, Fragment} from 'react'
import {connect} from 'react-redux'

import {currentUserSelector} from 'store/selectors/session'
import {List} from 'immutable'
import Transformer from '../../utils/Transformer'
import WebsitesTableExtended from '../../components/WebsitesTable/WebsiteTableExtended'
import {getWebsiteList} from "../../services/api/admin-websites";

class OverviewComponent extends Component {
  constructor(props) {
    super(props)
    this.state = {
      websites: List()
    }
    this.handleCreate = ::this.handleCreate
    this.handleEdit = ::this.handleEdit
    this.handleDelete = ::this.handleDelete
    this.refreshTable = ::this.refreshTable;
  }

  componentDidMount() {
    this.refreshTable();
  }

  refreshTable() {
    getWebsiteList()
      .then((r) => {
        this.setState({
          websites: List(r.data)
        })
      })
  }

  handleCreate(data) {
    const {websites} = this.state
    this.setState({
      websites: websites.push(data)
    })
  }

  handleEdit(id, data) {
    const {websites} = this.state
    this.setState({
      websites: websites.map((v) => (v.id === id ? data : v))
    })
  }

  handleDelete(id) {
    const {websites} = this.state
    this.setState({
      websites: websites.filter((v) => (v.id !== id))
    })
  }

  render() {
    const {websites} = this.state
    return (
      <Fragment>
        <Helmet>
          <title>Websites</title>
        </Helmet>

        <WebsitesTableExtended
          websites={websites}
          handleCreate={this.handleCreate}
          handleEdit={this.handleEdit}
          handleDelete={this.handleDelete}
        />

      </Fragment>
    )
  }
}

export default connect(
  (state) => ({
    user: currentUserSelector(state)
  })
)(OverviewComponent)
