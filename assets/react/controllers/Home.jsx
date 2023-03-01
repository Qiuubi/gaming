import React from 'react';

export default function (props) {
    return <section>
        <div>Hello {props.fullName}</div>
        <section>
            <h1>Dernières quêtes en cours</h1>
        </section>
        <section>
            <h1>Jeux en cours </h1>
        </section>
        <section>
            <h1>Derniers jeux </h1>
        </section>
    </section>;
}