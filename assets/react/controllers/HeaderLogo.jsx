import React from 'react';

function HeaderLogo(props) {
    return (
        <div className="flex lg:flex-1">
            <a href="/" className="-m-1.5 p-1.5">
                <span className="sr-only">Qiiubi Gaming</span>
                <img className="h-8 w-auto" src={props.img} alt={props.altImg} />
            </a>
        </div>
    )
}

export default HeaderLogo;