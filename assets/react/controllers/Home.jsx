import React from 'react';
import LastQuests from './LastQuests';

export default function (props) {
    return <section>
        <div>Hello {props.fullName}</div>
        <LastQuests></LastQuests>
        <section>
            <h1>Jeux en cours </h1>
        </section>
        <section>
            <h1>Derniers jeux </h1>
        </section>
    </section>;
}