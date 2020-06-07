import React, {Component, Fragment} from 'react'
import DashboardPortlet from "../../components/Dashboard/DashboardPorlet";
import {Link} from "react-router-dom";

export const SingleWebsiteKeywords = () => {
  return <DashboardPortlet title={"Powiązane słowa kluczowe"}>
    <div className="card-body pt-0">
      <div className="mb-6">
        <div className="d-flex align-items-center flex-grow-1">

          <div className="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div className="d-flex flex-column align-items-cente py-2 w-75">
              <a className="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                apartament
              </a>
            </div>
            <span className="label label-lg label-light-warning label-inline font-weight-bold py-4">2</span>
          </div>
        </div>
      </div>

      <div className="mb-6">
        <div className="d-flex align-items-center flex-grow-1">

          <div className="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div className="d-flex flex-column align-items-cente py-2 w-75">
              <a href="#" className="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                centrum
              </a>

            </div>
            <span className="label label-lg label-light-warning label-inline font-weight-bold py-4">10</span>
          </div>
        </div>
      </div>

      <div className="mb-6">
        <div className="d-flex align-items-center flex-grow-1">

          <div className="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div className="d-flex flex-column align-items-cente py-2 w-75">
              <a href="#" className="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                inwestycja
              </a>

            </div>

            <span className="label label-lg label-light-danger label-inline font-weight-bold py-4">30</span>
          </div>
        </div>
      </div>

      <div className="mb-6">
        <div className="d-flex align-items-center flex-grow-1">

          <div className="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div className="d-flex flex-column align-items-cente py-2 w-75">
              <a href="#" className="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                zwrot
              </a>

            </div>
            <span className="label label-lg label-light-success label-inline font-weight-bold py-4">20</span>

          </div>
        </div>
      </div>
    </div>
  </DashboardPortlet>
}
