import React from 'react';
import './styles/Home.css';
import CoverPicture from './CoverPicture';

function Home(props) {
    const data = {
        altCover: "random gaming guy in front of his tv",
        message: "Jouez avec toutes les infos sous vos yeux",
    }
    return (
        <section>
            <CoverPicture altCover={data.altCover} message={data.message}></CoverPicture>
            <section>
                <h1>Jeux en cours </h1>
            </section>
            <section>
                <h1>Derniers jeux </h1>
            </section>
        </section>
    );
}

export default Home;