import React from 'react';
import './styles/CoverPicture.css';
import qg_cover from './../../images/home/qg_cover.jpg';

function CoverPicture(props) {
    return (
        <section className="">
            <img className="qg-cover-img" src={qg_cover} alt={props.altCover} />
            <p className="qg-cover-msg">{props.message}</p>
        </section>
    );
}

export default CoverPicture;