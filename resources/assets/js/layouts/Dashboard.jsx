import React from 'react'

import {AppFooter, AppHeader} from 'components'

export const DashboardLayout = props => (
  <div>
    <AppHeader/>
    <div className="kt-container  kt-grid__item kt-grid__item--fluid">{props.children}</div>
    <AppFooter/>
  </div>
)
