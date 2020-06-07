import React from 'react'
import logo from '../../../img/logo.png'
import logoWhite from '../../../img/logo_white.png'
import {Link} from 'react-router-dom'
import styles from './ClientStyle.scss'
import {UserCard} from '../../components'

const ClientSiteLayout = ({children, pageName, actions, breadcrumbs}) => {
  return (
    <div className="kt-grid kt-grid--hor kt-grid--root">
      <div className="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <div className="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

          <div className="header kt-header  kt-header--fixed ">
            <div className="kt-container">
              <div className="kt-header__brand   kt-grid__item">
                <div className="logo">
                  <Link to={"/"}>
                    <img src={logo} alt="logo"/>
                  </Link>
                </div>
              </div>
              <div className="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid">
                <ul className="top-menu">

                </ul>
              </div>

              <div className={`kt-header__topbar kt-grid__item ${styles.ktUserSection}`}>
                <div className="kt-header__topbar-item kt-header__topbar-item--user">
                  <UserCard className="ml-auto" colorTheme="dark"/>
                </div>
              </div>

            </div>
          </div>

          <div className="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch"
               id="kt_body">
            <div
              className="kt-content kt-content--fit-top  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-subheader--transparent"
              id="kt_content">

              <div className="kt-subheader-wrapper" styleName="ktSubheaderDark">
                <div className="kt-subheader   kt-grid__item">
                  <div className="kt-container ">
                    <div className="kt-subheader__main">
                      {pageName && <h3 className="kt-subheader__title">{pageName}</h3>}

                      <div className="kt-subheader__breadcrumbs">
                        <a href="#" className="kt-subheader__breadcrumbs-home"><i className="flaticon2-shelter"/></a>
                        {breadcrumbs && breadcrumbs.map((b) => (
                          <div>
                            <span className="kt-subheader__breadcrumbs-separator"/>
                            <a href={b.link} className="kt-subheader__breadcrumbs-link">{b.title}</a>
                          </div>
                        ))}
                      </div>
                    </div>
                    <div className="kt-subheader__toolbar">
                      <div className="kt-subheader__wrapper">
                        {actions}
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div className={styles.ktContainerDarkContent}>
                <div className="kt-container  kt-grid__item kt-grid__item--fluid">
                  {children}
                </div>
              </div>
            </div>
          </div>

          <div className="kt-footer  kt-footer--extended  kt-grid__item" id="kt_footer">
            <div className="kt-footer__top">
              <div className="kt-container ">
                <div className="row">
                  <div className="col-lg-4">
                    <div className="kt-footer__section">
                      <h3 className="kt-footer__title">About</h3>
                      <div className="kt-footer__content">
                        #ScamTrapper - identifying scam on the financial market
                      </div>
                    </div>
                  </div>
                  <div className="col-lg-4">
                    <div className="kt-footer__section">
                      <h3 className="kt-footer__title">Szybki dostęp</h3>
                      <div className="kt-footer__content">
                        <div className="kt-footer__nav">
                          <div className="kt-footer__nav-section">
                            <Link to="/">Strona główna</Link>
                          </div>
                          <div className="kt-footer__nav-section">
                            {/* <a href="#">User Setting</a> */}
                            {/* <a href="#">Custom Pages</a> */}
                            {/* <a href="#">Intranet Settings</a> */}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="kt-footer__bottom">
              <div className="kt-container ">
                <div className="kt-footer__wrapper">
                  <div className="kt-footer__logo">
                    <a className="kt-header__brand-logo" href="?page=index&amp;demo=demo2">
                      <img alt="Logo"
                           src={logoWhite}
                           className="kt-header__brand-logo-sticky"/>
                    </a>
                    <div className="kt-footer__copyright">
                      2020&nbsp;©&nbsp;
                      <div>Created during HackYeah 2020</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default ClientSiteLayout
