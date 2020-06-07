import React, {Component, Fragment} from 'react'
import DashboardPortlet from "../../components/Dashboard/DashboardPorlet";

export const Recent = () => {
  return <div className="col-lg-12">
    <DashboardPortlet title={"Ostatnie Raporty"}>
      <div className="card card-custom card-stretch gutter-b">
        <div className="card-header border-0 pt-5">
          <h3 className="card-title align-items-start flex-column">
            <span className="card-label font-weight-bolder text-dark"></span>
            <span className="text-muted mt-3 font-weight-bold font-size-sm">Bazując na słowach kluczowych</span>
          </h3>
          <div className="card-toolbar">
            <ul className="nav nav-pills nav-pills-sm nav-dark-75">
              <li className="nav-item">
                <a className="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_2_1">Miesiąc</a>
              </li>
              <li className="nav-item">
                <a className="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_2_2">Tydzień</a>
              </li>
              <li className="nav-item">
                <a className="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_tab_pane_2_3">Dzień</a>
              </li>
            </ul>
          </div>
        </div>
        <div className="card-body pt-2 pb-0">
          <div className="table-responsive">
            <table className="table table-borderless table-vertical-center">
              <thead>
              <tr>
                <th className="p-0" style={{"width": "50px"}}/>
                <th className="p-0" style={{"min-width": "150px"}}/>
                <th className="p-0" style={{"min-width": "140px"}}/>
                <th className="p-0" style={{"min-width": "120px"}}/>
                <th className="p-0" style={{"min-width": " 40px"}}/>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td className="pl-0 py-5">
                  <div className="symbol symbol-50 symbol-light mr-2">
                                <span className="symbol-label">

                                </span>
                  </div>
                </td>
                <td className="pl-0">
                  <a href="#"
                     className="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">https://www.seidorf.pl/</a>

                </td>
                <td className="text-right">
                  <span className="text-muted font-weight-bold">apartamenty inwestycyjne</span>
                </td>
                <td className="text-right">
                  <span className="font-weight-bold text-danger">70</span>
                </td>
                <td className="text-right pr-0">
                  <a href="#" className="btn btn-icon btn-light btn-sm">
                                <span className="svg-icon svg-icon-md svg-icon-success">
                                  </span> </a>
                </td>
              </tr>
              <tr>
                <td className="pl-0 py-5">
                  <div className="symbol symbol-50 symbol-light mr-2">
                                <span className="symbol-label">

                                </span>
                  </div>
                </td>
                <td className="pl-0">
                  <a href="#"
                     className="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">https://www.lloydinvestment.pl/</a>

                </td>
                <td className="text-right">
                  <span className="text-muted font-weight-bold">apartamenty</span>
                </td>
                <td className="text-right">
                  <span className="font-weight-bold text-danger">20</span>
                </td>
                <td className="text-right pr-0">
                  <a href="#" className="btn btn-icon btn-light btn-sm">
                                <span className="svg-icon svg-icon-md svg-icon-success">
                                </span> </a>
                </td>
              </tr>
              <tr>
                <td className="pl-0 py-5">
                  <div className="symbol symbol-50 symbol-light mr-2">
                                <span className="symbol-label">

                                </span>
                  </div>
                </td>
                <td className="pl-0">
                  <a href="#"
                     className="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">https://lp.trade360.com/</a>

                </td>
                <td className="text-right">
                  <span className="text-muted font-weight-bold">bitcoin</span>
                </td>
                <td className="text-right">
                  <span className="font-weight-bold text-danger">80</span>
                </td>
                <td className="text-right pr-0">
                  <a href="#" className="btn btn-icon btn-light btn-sm">
                                <span className="svg-icon svg-icon-md svg-icon-success">
                                  </span> </a>
                </td>
              </tr>
              <tr>
                <td className="pl-0 py-5">
                  <div className="symbol symbol-50 symbol-light mr-2">
                                <span className="symbol-label">

                                </span>
                  </div>
                </td>
                <td className="pl-0">
                  <a href="#"
                     className="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">https://www.mforex.pl</a>

                </td>
                <td className="text-right">
                  <span className="text-muted font-weight-bold">kup bitcoin</span>
                </td>
                <td className="text-right">
                  <span className="font-weight-bold text-danger">5</span>
                </td>
                <td className="text-right pr-0">
                  <a href="#" className="btn btn-icon btn-light btn-sm">
                                <span className="svg-icon svg-icon-md svg-icon-success">
                                </span> </a>
                </td>
              </tr>


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </DashboardPortlet>
  </div>
}
