import React from 'react'

import { Card, CardContent } from 'components'
import logo from '../../img/logo.png'

export const FormPageLayout = props => (
  <Card className="max-w-md mt-20 mx-auto">
    <CardContent>
      <h1 className="text-center text-grey-darkest mb-4">{props.title}</h1>
      {props.children}
    </CardContent>
  </Card>
)

export const ShieldFormPageLayout = props => (
  <div className="kt-grid kt-grid--ver kt-grid--root kt-page" style={{height: '100vh'}}>
    <div className="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3">
      <div
        className="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        style={{backgroundImage: "url('../../../img/bg-3.jpg')"}}
      >
        <div className="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
          <div className="kt-login__container">
            <div className="kt-login__logo">
              <a href="#">
                <img src={logo} alt="Shield Logo" className="img-fluid" />
              </a>
            </div>
            {props.children}
          </div>
        </div>
      </div>
    </div>
  </div>
)
