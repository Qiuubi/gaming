import React from 'react';
import Fragment from 'react';

import CategoryList from './CategoryList';

import { Popover, Transition } from '@headlessui/react'
import ChevronDownIcon from '@heroicons/react/20/solid'
import DiceIcon from "../icons/DiceIcon";
import NinjaIcon from "../icons/NinjaIcon";
import ChessIcon from "../icons/ChessIcon";
import DnDIcon from "../icons/DnDIcon";
import GunIcon from "../icons/GunIcon";
import PanoramaIcon from "../icons/PanoramaIcon";
import MountainCityIcon from "../icons/MountainCity";
import GhostIcon from "../icons/GhostIcon";
import CarIcon from "../icons/CarIcon";
import FortIcon from "../icons/FortIcon";
import DiceD20Icon from "../icons/DiceD20";
import GemIcon from "../icons/GemIcon";
import FistIcon from "../icons/FistIcon";
import HandleSparklesIcon from "../icons/HandSparklesIcon";
import ChessBoardIcon from "../icons/ChessBoardIcon";
import JetFighterUpIcon from "../icons/JetFighterUp";

const categories = [
    { id: 1, name: 'O-RPG', description: "Baldur's Gate, Elder Scrolls...", href: '#', icon: DiceIcon },
    { id: 2, name: 'J-RPG', description: "Final Fantasy, Xenoblades Chronicles...", href: '#', icon: NinjaIcon },
    { id: 3, name: 'Tactical-RPG', description: "Disgaea, God Wars...", href: '#', icon: ChessIcon },
    { id: 4, name: 'MMORPG', description: "Guild Wars, World Of WarCraft...", href: '#', icon: DnDIcon },
    { id: 5, name: 'FPS', description: "Doom, Call of Duty, Timesplitters 2...", href: '#', icon: GunIcon },
    { id: 6, name: 'Action Aventure', description: "Zelda, Grand Theft Auto...", href: '#', icon: PanoramaIcon },
    { id: 7, name: 'Plate-Forme', description: "Mario, Jak & Daxter...", href: '#', icon: MountainCityIcon },
    { id: 8, name: 'Survival Horror', description: "Resident Evil, Silent Hill...", href: '#', icon: GhostIcon },
    { id: 9, name: 'Course', description: "Mario Kart, Forza Horizon...", href: '#', icon: CarIcon },
    { id: 10, name: 'Metroidvania', description: "Metroid, Castlevania, Dead Cells...", href: '#', icon: FortIcon },
    { id: 11, name: 'Rogue Like', description: "Rogue Legacy, Enter The Gungeon", href: '#', icon: DiceD20Icon },
    { id: 12, name: 'Hack & Slash', description: "Diablo, LightTorch...", href: '#', icon: GemIcon },
    { id: 13, name: 'Beat Them All', description: "God Of War...", href: '#', icon: HandleSparklesIcon },
    { id: 14, name: 'Stratégie', description: "Age Of Empire, StarCraft...", href: '#', icon: ChessBoardIcon },
    { id: 15, name: 'Baston', description: "Virtua Fighter, Super Smash Bros Melee...", href: '#', icon: FistIcon },
    { id: 16, name: 'Shoot Them Up', description: "Ikaruga...", href: '#', icon: JetFighterUpIcon },
];



function NavLists(props) {
    return (
        <Popover.Group className="hidden lg:flex lg:gap-x-12">
            <Popover className="relative">
                <Popover.Button className="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900">
                    Genres
                    <ChevronDownIcon className="h-5 w-5 flex-none text-gray-400" aria-hidden="true" />
                </Popover.Button>

                <Transition
                    as={Fragment}
                    enter="transition ease-out duration-200"
                    enterFrom="opacity-0 translate-y-1"
                    enterTo="opacity-100 translate-y-0"
                    leave="transition ease-in duration-150"
                    leaveFrom="opacity-100 translate-y-0"
                    leaveTo="opacity-0 translate-y-1"
                >
                    <Popover.Panel className="absolute -left-8 top-full z-10 mt-3 w-screen max-w-md overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5">
                        <div className="grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50 p-4 ">
                            {categories.map((category) => (
                                <CategoryList
                                    id={category.id}
                                    name={category.name}
                                    description={category.description}
                                    href={category.href}
                                    icon={category.icon}
                                />
                            ))}
                        </div>
                    </Popover.Panel>
                </Transition>
            </Popover>

            <a href="#" className="text-sm font-semibold leading-6 text-gray-900">
                L'outil
            </a>
            <a href="/games" className="text-sm font-semibold leading-6 text-gray-900">
                Vidéoludothèque
            </a>
            <a href="/about" className="text-sm font-semibold leading-6 text-gray-900">
                A propos
            </a>
        </Popover.Group>
    )
}

export default NavLists;