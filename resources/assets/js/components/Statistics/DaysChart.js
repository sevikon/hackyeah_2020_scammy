import React, {Component} from 'react'
import PropTypes from 'prop-types'
import {Bar, BarChart, CartesianGrid, Legend, ResponsiveContainer, Tooltip, XAxis, YAxis} from 'recharts'

class DaysChart extends Component {
  render() {
    const data = this.props.entries

    if (data.length === 0) {
      return null
    }

    return (
      <ResponsiveContainer width='100%' aspect={4.0 / 2}>
        <BarChart data={data}
                  margin={{top: 5, right: 30, left: 20, bottom: 5}}>
          <XAxis dataKey="created_at"/>
          <YAxis interval={0} allowDecimals={false}/>
          <CartesianGrid strokeDasharray="3 3"/>
          <Tooltip/>
          <Legend/>
          <Bar dataKey="total" fill="#34bfa3"/>
        </BarChart>
      </ResponsiveContainer>
    )
  }
}

DaysChart.propTypes = {
  entries: PropTypes.array
}

export default DaysChart
