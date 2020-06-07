import Helmet from 'react-helmet'
import React, {Component, Fragment} from 'react'
import {connect} from 'react-redux'

import {currentUserSelector} from 'store/selectors/session'
import {List, Map} from 'immutable'
import {getStatistics} from '../../services/api/admin-statistics'
import ChartWidget from '../../components/Statistics/ChartWidget'
import {Recent} from "./RecentWebsites";

class OverviewComponent extends Component {
  constructor(props) {
    super(props)
    this.state = {
      statistics: Map({
        keyword_statistics_day: List(),
        keyword_statistics_kind: List(),
        statistics: Map(
          {
            this_month_websites: 4,
            total_websites: 4,
          }
        )
      })
    }
  }

  componentDidMount() {

    getStatistics()
      .then((v) => {
        const {statistics} = this.state

        this.setState({
          statistics: statistics
            .set('keyword_statistics_day', List(v.keyword_statistics_day.map((v) => Map(v))))
            .set('keyword_statistics_kind', List(v.keyword_statistics_kind.map((v) => Map(v))))
            .set('statistics', Map(v.statistics))
        })
      })
  }

  render() {
    const {statistics} = this.state
    const keywordStatistics = statistics.get('statistics')

    return (
      <Fragment>
        <Helmet>
          <title>Dashboard</title>
        </Helmet>

        <div className="row">
          <div className="col-xl-12">
            <div className="kt-portlet__body  kt-portlet__body--fit">
              <div className="row">
                <div className="col-xl-6">
                  <Recent/>
                </div>
                <div className="col-xl-6">
                  <div className="kt-portlet">
                    <div className="kt-portlet__body kt-portlet__body--fit">
                      <div className="row row-no-padding row-col-separator-xl">
                        <div className="col-md-12 col-lg-12 col-xl-6">
                          <div className="kt-widget1">

                            <div className="kt-widget1__item">
                              <div className="kt-widget1__info">
                                <h3 className="kt-widget1__title">Niebezpieczne Strony</h3>
                                <span className="kt-widget1__desc">Ostatni tydzień</span>
                              </div>
                              <span
                                className="kt-widget1__number kt-font-brand">{keywordStatistics.get('this_month_websites')}</span>
                            </div>

                          </div>
                        </div>

                        <div className="col-md-12 col-lg-12 col-xl-6">

                          <div className="kt-widget1">

                            <div className="kt-widget1__item">
                              <div className="kt-widget1__info">
                                <h3 className="kt-widget1__title">Niebezpieczne Strony</h3>
                                <span className="kt-widget1__desc">Ostatni miesiąc</span>
                              </div>
                              <span
                                className="kt-widget1__number kt-font-danger">{keywordStatistics.get('total_websites')}</span>
                            </div>

                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
