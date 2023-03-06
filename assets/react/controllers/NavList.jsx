import React from 'react';

export default function NavList(props) {
    return (
        <li>
            <a href={props.href}>{props.title}</a>
        </li>
    )
}