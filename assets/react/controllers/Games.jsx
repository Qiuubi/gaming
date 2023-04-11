import React, { useEffect, useState } from "react";
import Game from "./Game";

export default function Games() {
    const [games, setGames] = useState();
    const getApiData = async () => {
        const response = await fetch(
            "http://localhost:8741/games/3174/api/games"
        ).then((response) => response.json());

        // update the state
        setGames(response); // Reprendre ici 
    };

    useEffect(() => {
        getApiData();
    }, []);

    function path(file) {
        return '/uploads/images/cover/' + file;
    }

    return (
        <div class="grid grid-rows-4 grid-flow-col gap-4">
            <div className="bg-white">
                <div className="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                    <h2 className="text-2xl font-bold tracking-tight text-gray-900">Tous les jeux</h2>
                    <div className="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                        {games && games.map((game) => (
                            <Game
                                img={game.img}
                                alt={game.alt}
                                name={game.name}
                                editor={game.editor}
                                support={game.support}
                            />
                        ))}
                    </div>
                </div>
            </div>
        </div>

    );
}