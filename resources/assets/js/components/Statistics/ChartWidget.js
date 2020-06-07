import React, {Component} from 'react'
import PropTypes from 'prop-types'
import sortBy from 'lodash/sortBy'
import {List} from 'immutable'

import {DEFAULT_DASHBOARD_FINANCE_CHART_FILTERS, LAST_12_MONTHS} from '../../utils/GlobalConfig'
import {filterEntries} from '../../utils/GlobalHelper'
import DaysChart from './DaysChart'
import DashboardPortlet from '../Dashboard/DashboardPorlet'
import moment from 'moment'

class ChartWidget extends Component {
  constructor(props) {
    super(props)
    this.selectItemsFilter = ::this.selectItemsFilter
    this.state = {
      activeItemsFilter: {
        value: LAST_12_MONTHS
      }
    }
  }

  selectItemsFilter(filter) {
    this.setState({
      activeItemsFilter: filter
    })
  }

  render() {
    const {activeItemsFilter} = this.state
    const {chartEntries, dateField = 'created_at', title = 'Statystyki'} = this.props
    const filters = DEFAULT_DASHBOARD_FINANCE_CHART_FILTERS
    const activeItems = activeItemsFilter || filters[0]

    let {filteredEntries, start, end} = filterEntries(chartEntries, activeItems, {
      dateField
    })
    let sortedItems = sortBy(filteredEntries.map((item) => (
      item.toObject()
    )).toArray(), 'name', 'asc')

    if (sortedItems.length > 0 && start && end) {
      let arr = []
      let m = {}
      sortedItems.forEach((s) => {
        const v = s[dateField]
        m[v] = s
      })

      let a = moment(start)
      let b = moment(end)
      for (let c = a; c < b; c = c.add(1, 'day')) {
        let f = c.format('YYYY-MM-DD')
        let v = m[f]
        if (v) {
          arr.push(v)
        } else {
          v = {
            total: 0
          }
          v[dateField] = f
          arr.push(v)
        }
      }
      sortedItems = arr
    }

    const articlesActions = (
      <ul className="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand">
        {filters.map((filter) => (
          <li className={`nav-item filter ${filter.value === activeItemsFilter.value ? ' active' : ''}`}
              key={filter.value}
              onClick={() => this.selectItemsFilter(filter)}>
            <a className="nav-link">
              {filter.name}
            </a>
          </li>
        ))}
      </ul>)

    return (<DashboardPortlet title={title} actions={articlesActions}>
      {sortedItems.length <= 0 && <p>No data for this period</p>}
      <DaysChart entries={sortedItems}/>
    </DashboardPortlet>)
  }
}

ChartWidget.propTypes = {
  chartEntries: PropTypes.instanceOf(List),
  dateField: PropTypes.string,
  title: PropTypes.string
}

export default ChartWidget
