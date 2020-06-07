import React from 'react';

import Spinner from "../Spinner/Spinner";
import style from './ShowLoadingOrRender.scss';

function ShowLoadingOrRender({pending, render}) {
  return (
    pending ? (
      <div className={style.showLoadingOrChildren}>
        <Spinner/>
      </div>
    ) : render()
  );
}

export default ShowLoadingOrRender;
