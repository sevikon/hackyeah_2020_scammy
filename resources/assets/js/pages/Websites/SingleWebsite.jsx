import Helmet from 'react-helmet'
import React, {Component, Fragment} from 'react'
import {connect} from 'react-redux'

import {currentUserSelector} from 'store/selectors/session'
import {List} from 'immutable'
import {getWebsiteList} from "../../services/api/admin-websites";
import {SingleWebsiteKeywords} from "./SingleWebsiteKeywords";
import DashboardPortlet from "../../components/Dashboard/DashboardPorlet";

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
          <title>Single Website</title>
        </Helmet>

        <div className="row">
          <div className="col-xl-6">
            <div className="card card-custom card-stretch gutter-b">
              <div className="card-header align-items-center border-0 mt-4">
                <h3 className="card-title align-items-start flex-column">
                  <span className="font-weight-bolder text-dark">Ostatnia aktywność</span>
                </h3>
                <div className="card-toolbar">
                  <div className="dropdown dropdown-inline">
                    <a href="#" className="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i className="ki ki-bold-more-ver"></i>
                    </a>
                  </div>
                </div>
              </div>

              <div className="card-body pt-4">
                <div className="timeline timeline-5 mt-3">

                  <div className="timeline-item align-items-start">
                    <div
                      className="timeline-label font-weight-bolder font-size-lg text-right pr-3">
                      07.06
                    </div>

                    <div className="timeline-badge">
                      <i className="fa fa-genderless text-info icon-xxl"></i>
                    </div>

                    <div className="timeline-content font-weight-bolder">
                      Raport Wygenerowany
                      <span> </span>
                      <a href="#" className="text-warning">40</a>
                    </div>
                  </div>

                  <div className="timeline-item align-items-start">
                    <div
                      className="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">07.06
                    </div>

                    <div className="timeline-badge">
                      <i className="fa fa-genderless text-success icon-xxl"></i>
                    </div>

                    <div className="timeline-content text-dark-50">
                      Strona dodana do systemu
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div className="col-xl-6">
            <DashboardPortlet title="Pobierz stronę">
              <div className="buttons">
                <a href="/storage/lMJdPjX4chYUrynB_1591505494.png" target="_blank">
                  <span className="btn btn-primary">Pobierz PNG</span>
                </a>
                <span> </span>
                <a href="/storage/lMJdPjX4chYUrynB_1591505494.pdf" target="_blank">
                  <span className="btn btn-success">Pobierz PDF</span>
                </a>
              </div>
            </DashboardPortlet>
            <SingleWebsiteKeywords/>
          </div>
        </div>

      </Fragment>
    )
  }
}

export default connect(
  (state) => ({
    user: currentUserSelector(state)
  })
)(OverviewComponent)
