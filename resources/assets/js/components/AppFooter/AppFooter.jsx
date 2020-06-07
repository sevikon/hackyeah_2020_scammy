import React from 'react'

import { linkStyle } from 'constants/styles'

export const AppFooter = props => (
  <p className="text-center text-sm text-grey py-8">
    Hack Yeah 2020 - Made by{' '}
    <a
      className={linkStyle}
      href="#"
    >
      SPK
    </a>
  </p>
)
