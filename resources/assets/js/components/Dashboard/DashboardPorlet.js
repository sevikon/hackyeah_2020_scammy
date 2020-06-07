// import libs
import React, {Component} from 'react'
import PropTypes from 'prop-types'
import {connect} from 'react-redux'

class DashboardPortlet extends Component {
  render() {
    const {actions, children, className, loading = false, subtitle, title, header = true, grayBackGroundColor} = this.props
    return (
      <div
        style={grayBackGroundColor ? {backgroundColor: '#f2f3f8'} : null}
        className={`kt-portlet kt-portlet--mobile kt-portlet--body-progress- ${className} ${!header ? 'drag-element' : ''}`}>
        {header &&
        <div className="kt-portlet__head drag-element" style={grayBackGroundColor ? {backgroundColor: '#fff'} : null}>
          <div className="kt-portlet__head-label">
            <div className="kt-portlet__head-title">
              {title}
              {subtitle && <small>{subtitle}</small>}
            </div>
          </div>
          <div className="kt-portlet__head-toolbar">
            {actions && actions}
          </div>
        </div>}
        <div className="kt-portlet__body">
          {loading && <div className="kt-portlet__body-progress">Loading</div>}
          {children}
        </div>
      </div>
    )
  }
}

DashboardPortlet.propTypes = {
  actions: PropTypes.oneOfType([
    PropTypes.array,
    PropTypes.object
  ]),
  children: PropTypes.oneOfType([
    PropTypes.array,
    PropTypes.object
  ]),
  className: PropTypes.string,
  dispatch: PropTypes.func,
  header: PropTypes.bool,
  hiddenWidgets: PropTypes.array,
  layouts: PropTypes.object,
  subtitle: PropTypes.string,
  title: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.object
  ]),
  widgetId: PropTypes.string
}

const mapStateToProps = () => {
  return {}
}

export default connect(mapStateToProps)(DashboardPortlet)
