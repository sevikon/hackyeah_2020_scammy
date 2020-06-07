import PropTypes from 'prop-types'
import MaterialTable from 'material-table'
import TablePagination from '@material-ui/core/TablePagination/TablePagination'
import Toolbar from 'material-table/dist/components/m-table-toolbar'
import React, {Component} from 'react'
import Checkbox from './Checkbox'

class MTableExtended extends Component {
  render() {
    const {
      columns, data, title = '', options = {
        columnsButton: true,
        exportButton: true,
        filtering: true,
        pageSize: 10,
        selection: false,
        pageSizeOptions: [
          10, 25, 50, 100
        ],
        exportDelimiter: ','
      }
    } = this.props

    const {additionalOptions = {}, count, onChangeColumnHidden, onChangePage, onChangeRowsPerPage, onOrderChange, page, searchDisabled = false, toolBarActions = null} = this.props
    const {selectedAll = false, selectAll} = additionalOptions
    let moreOptions = {}
    if (onChangePage) {
      moreOptions.onChangePage = onChangePage
    }

    return (<MaterialTable
      onChangeColumnHidden={onChangeColumnHidden}
      onOrderChange={onOrderChange}
      onChangeRowsPerPage={onChangeRowsPerPage}
      columns={columns}
      isRemoteData={() => {
        return true
      }}
      search={false}
      components={
        {
          Pagination: (props) => {
            const countFixed = count !== undefined ? count : props.count
            const pageFixed = page !== undefined ? page : props.page
            return (<td className="footer-table-wrapper">
              <table className="footer-table">
                <tbody>
                <tr>
                  <td>
                    <p>Found total: {countFixed} records</p>
                  </td>
                  <TablePagination {...props}
                                   {...moreOptions}
                                   page={pageFixed}
                                   count={countFixed}
                  />
                </tr>
                </tbody>
              </table>
            </td>)
          },
          Toolbar: (props) => {
            return (<div className="toolbar-wrapper">
              <Toolbar {...props} search={!searchDisabled}/>
              {toolBarActions}
              {data.length > 0 && selectAll && <div className="select-all">
                <Checkbox value={!!selectedAll} onChange={() => selectAll(data)}
                          name="selected"/>
              </div>}
            </div>)
          }
        }
      }
      data={data}
      title={title}
      options={{...options, ...additionalOptions}}
    />)
  }
}

MTableExtended.propTypes = {
  additionalOptions: PropTypes.object,
  columns: PropTypes.array,
  count: PropTypes.number,
  data: PropTypes.array,
  onChangeColumnHidden: PropTypes.func,
  onChangePage: PropTypes.func,
  onChangeRowsPerPage: PropTypes.func,
  onOrderChange: PropTypes.func,
  page: PropTypes.number,
  options: PropTypes.object,
  searchDisabled: PropTypes.bool,
  title: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.node
  ]),
  toolBarActions: PropTypes.object
}

export default MTableExtended
