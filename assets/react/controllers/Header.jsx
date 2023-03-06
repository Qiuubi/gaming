import React from 'react';
import NavList from './NavList';
import "./styles/Header.css";

function Header(props) {
    const navLinks = [
        { "number": 1, "href": "#", "title": "Accueil" },
        { "number": 2, "href": "#", "title": "A propos" },
        { "number": 3, "href": "#", "title": "Jeux" }
    ];
    return (
        <div>
            <nav>
                <ul>
                    <li>
                        <a href="#">
                            <h1>{props.title}</h1>
                        </a>
                    </li>
                    {navLinks.map((list) =>
                        <NavList key={list.number} href={list.href} title={list.title} />
                    )}
                    <li>
                        <a href="#">{props.login}</a>
                    </li>
                </ul>
            </nav>
        </div>
    );
}

export default Header;