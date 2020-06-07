import React, {Fragment} from 'react'
import {Route} from 'react-router-dom'

import {Card, CardContent} from 'components'
import {UserSettings} from './UserSettings'

export const SettingsRoutes = ({match: {url: currentUrl}}) => {
  return (
    <Fragment>
      <div className="flex items-start">
        <Card className="flex-grow ml-4">
          <CardContent>
            <Route
              exact
              path={`${currentUrl}/user`}
              component={UserSettings}
            />
          </CardContent>
        </Card>
      </div>
    </Fragment>
  )
}

export default SettingsRoutes
