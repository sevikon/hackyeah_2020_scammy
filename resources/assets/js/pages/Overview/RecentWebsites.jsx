import React, {Component, Fragment} from 'react'
import DashboardPortlet from "../../components/Dashboard/DashboardPorlet";
import {Link} from "react-router-dom";

export const Recent = () => {
  return <DashboardPortlet title={"Ostatnie Raporty"}>
    <div className="card-body pt-0">
      <div className="mb-6">
        <div className="d-flex align-items-center flex-grow-1">

          <div className="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div className="d-flex flex-column align-items-cente py-2 w-75">
              <Link to="/websites/1?url=http://wyspasolna.pl/" className="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                http://wyspasolna.pl/
              </Link>
              <span className="text-muted font-weight-bold">apartament, centrum, inwestycja, zwrot</span>
            </div>

            <span className="label label-lg label-light-warning label-inline font-weight-bold py-4">40</span>
          </div>
        </div>
      </div>

      <div className="mb-6">
        <div className="d-flex align-items-center flex-grow-1">

          <div className="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div className="d-flex flex-column align-items-cente py-2 w-75">
              <a href="#" className="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                https://www.lloydinvestment.pl/
              </a>

              <span className="text-muted font-weight-bold">apartament</span>
            </div>

            <span className="label label-lg label-light-warning label-inline font-weight-bold py-4">42</span>
          </div>
        </div>
      </div>

      <div className="mb-6">
        <div className="d-flex align-items-center flex-grow-1">

          <div className="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div className="d-flex flex-column align-items-cente py-2 w-75">
              <a href="#" className="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                https://lp.trade360.com/
              </a>

              <span className="text-muted font-weight-bold">
                            kup bitcoin
                        </span>
            </div>

            <span className="label label-lg label-light-danger label-inline font-weight-bold py-4">90</span>
          </div>
        </div>
      </div>

      <div className="mb-6">
        <div className="d-flex align-items-center flex-grow-1">

          <div className="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div className="d-flex flex-column align-items-cente py-2 w-75">
              <a href="#" className="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                https://www.mforex.pl
              </a>

              <span className="text-muted font-weight-bold">
                            bitcoin
                        </span>
            </div>
            <span className="label label-lg label-light-success label-inline font-weight-bold py-4">20</span>

          </div>
        </div>
      </div>

    </div>
  </DashboardPortlet>
}
