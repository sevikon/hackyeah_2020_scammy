import {Provider} from 'react-redux'
import React, {lazy, Suspense} from 'react'
import {ModalProvider} from 'react-context-modals'
import {Link, Route, Router, Switch} from 'react-router-dom'

import {AuthGuard, FlashMessageRoot} from 'components'
import {history} from 'utils/history'
import {store} from 'store/create-store'
import {FormPageLayout} from 'layouts'
import {ShieldFormPageLayout} from './layouts/FormPage'
import ClientSiteLayout from './layouts/ClientSite/ClientSite'

const LogIn = lazy(() => import('pages/LogIn/LogIn'))
const SignUp = lazy(() => import('pages/SignUp/SignUp'))
const Overview = lazy(() => import('pages/Overview/Overview'))
const NotFound = lazy(() => import('pages/NotFound/NotFound'))
const SettingsRoutes = lazy(() => import('pages/Settings/SettingsRoutes'))
const PasswordReset = lazy(() => import('pages/PasswordReset/PasswordReset'))
const ForgotPassword = lazy(() => import('pages/ForgotPassword/ForgotPassword'))
const KeywordsPage = lazy(() => import('pages/Keywords/Keywords'))

const withDashboard = (ContentComponent, {pageName, actions} = {}) => {
  return props => (
    <AuthGuard>
      <ClientSiteLayout pageName={pageName} actions={actions}>
        <ContentComponent {...props} />
      </ClientSiteLayout>
    </AuthGuard>
  )
}

const Loading = () => (
  <div className="flex h-screen items-center">
    <div className="w-screen text-3xl text-center text-grey">Loading...</div>
  </div>
)

const OverviewWithDashboard = withDashboard(Overview, {
  pageName: 'Panel Sterowania',
  actions: (
    <div>
      <Link to="/keywords" className="btn btn-danger kt-subheader__btn-options" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        Słowa kluczowe
      </Link>
    </div>
  )
})

const KeywordsPageWithDashboard = withDashboard(KeywordsPage, {
  pageName: 'Słowa kluczowe',
})

const SettingsWithDashboard = withDashboard(SettingsRoutes, {
  pageName: 'Ustawienia'
})

export const App = () => (
  <Provider store={store}>
    <Suspense fallback={<Loading/>}>
      <FlashMessageRoot/>
      <Router history={history}>
        <ModalProvider animated>
          <Switch>
            <Route
              exact
              path="/login"
              render={() => (
                <ShieldFormPageLayout title="Log In">
                  <LogIn/>
                </ShieldFormPageLayout>
              )}
            />
            <Route
              exact
              path="/signup"
              render={() => (
                <ShieldFormPageLayout title="Sign Up">
                  <SignUp/>
                </ShieldFormPageLayout>
              )}
            />
            <Route
              exact
              path="/forgot-password"
              render={() => (
                <ShieldFormPageLayout title="Forgot Password">
                  <ForgotPassword/>
                </ShieldFormPageLayout>
              )}
            />
            <Route
              exact
              path="/reset-password/:resetToken"
              render={() => (
                <FormPageLayout title="Reset Password">
                  <PasswordReset/>
                </FormPageLayout>
              )}
            />

            {/* Dashboard routes */}
            <Route exact path="/" component={OverviewWithDashboard}/>
            <Route exact path="/keywords" component={KeywordsPageWithDashboard}/>
            <Route path="/settings" component={SettingsWithDashboard}/>
            {/* 404 route */}
            <Route path="*" exact={true} render={() => <NotFound/>}/>
          </Switch>
        </ModalProvider>
      </Router>
    </Suspense>
  </Provider>
)
