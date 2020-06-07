import Helmet from 'react-helmet'
import React, {Component, Fragment} from 'react'
import {connect} from 'react-redux'

import {currentUserSelector} from 'store/selectors/session'
import {List} from 'immutable'
import Transformer from '../../utils/Transformer'
import KeywordsTableExtended from '../../components/KeywordsTable/KeywordTableExtended'
import {getKeywordList} from "../../services/api/admin-keywords";

class OverviewComponent extends Component {
  constructor(props) {
    super(props)
    this.state = {
      keywords: List()
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
    getKeywordList()
      .then((r) => {
        this.setState({
          keywords: List(r.data)
        })
      })
  }

  handleCreate(data) {
    const {keywords} = this.state
    this.setState({
      keywords: keywords.push(data)
    })
  }

  handleEdit(id, data) {
    const {keywords} = this.state
    this.setState({
      keywords: keywords.map((v) => (v.id === id ? data : v))
    })
  }

  handleDelete(id) {
    const {keywords} = this.state
    this.setState({
      keywords: keywords.filter((v) => (v.id !== id))
    })
  }

  render() {
    const {keywords} = this.state
    return (
      <Fragment>
        <Helmet>
          <title>Keywords</title>
        </Helmet>

        <KeywordsTableExtended
          keywords={keywords}
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
