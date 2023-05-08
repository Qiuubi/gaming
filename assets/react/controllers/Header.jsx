import "./styles/Header.css";
import React from 'react'
import { Fragment, useState } from 'react'

import CategoryList from "./CategoryList";
import NavLists from "./NavLists";
import HeaderLogo from "./HeaderLogo";

import { Dialog, Disclosure, Popover, Transition } from '@headlessui/react'
import { Bars3Icon, XMarkIcon } from '@heroicons/react/24/outline'
import { ChevronDownIcon, PhoneIcon, PlayCircleIcon } from '@heroicons/react/20/solid'
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

const callsToAction = [

    { name: 'Watch demo', href: '#', icon: PlayCircleIcon },
    { name: 'Contact sales', href: '#', icon: PhoneIcon },
]

const logo = {
    src: "https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600",
    altImg: "logo qiuubi-gaming"
}

function classNames(...classes) {
    return classes.filter(Boolean).join(' ')
}

export default function Header() {
    const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

    return (
        <header className="bg-white">
            <nav className="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
                <HeaderLogo img={logo.src} imgAlt={logo.alt} />
                <div className="flex lg:hidden">
                    <button
                        type="button"
                        className="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                        onClick={() => setMobileMenuOpen(true)}
                    >
                        <span className="sr-only">Open main menu</span>
                        <Bars3Icon className="h-6 w-6" aria-hidden="true" />
                    </button>
                </div>
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
                <div className="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="/login" className="text-sm font-semibold leading-6 text-gray-900">
                        Connexion <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </nav>
            <Dialog as="div" className="lg:hidden" open={mobileMenuOpen} onClose={setMobileMenuOpen}>
                <div className="fixed inset-0 z-10" />
                <Dialog.Panel className="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div className="flex items-center justify-between">
                        <a href="#" className="-m-1.5 p-1.5">
                            <span className="sr-only">Your Company</span>
                            <img
                                className="h-8 w-auto"
                                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                                alt=""
                            />
                        </a>
                        <button
                            type="button"
                            className="-m-2.5 rounded-md p-2.5 text-gray-700"
                            onClick={() => setMobileMenuOpen(false)}
                        >
                            <span className="sr-only">Close menu</span>
                            <XMarkIcon className="h-6 w-6" aria-hidden="true" />
                        </button>
                    </div>
                    <div className="mt-6 flow-root">
                        <div className="-my-6 divide-y divide-gray-500/10">
                            <div className="space-y-2 py-6">
                                <Disclosure as="div" className="-mx-3">
                                    {({ open }) => (
                                        <>
                                            <Disclosure.Button className="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 hover:bg-gray-50">
                                                Genres
                                                <ChevronDownIcon
                                                    className={classNames(open ? 'rotate-180' : '', 'h-5 w-5 flex-none')}
                                                    aria-hidden="true"
                                                />
                                            </Disclosure.Button>
                                            <Disclosure.Panel className="mt-2 space-y-2">
                                                {[...products, ...callsToAction].map((item) => (
                                                    <Disclosure.Button
                                                        key={item.name}
                                                        as="a"
                                                        href={item.href}
                                                        className="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                                    >
                                                        {item.name}
                                                    </Disclosure.Button>
                                                ))}
                                            </Disclosure.Panel>
                                        </>
                                    )}
                                </Disclosure>
                                <a
                                    href="#"
                                    className="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                >
                                    L'outil
                                </a>
                                <a
                                    href="#"
                                    className="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                >
                                    Vidéoludothèque
                                </a>
                                <a
                                    href="#"
                                    className="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                >
                                    A propos
                                </a>
                            </div>
                            <div className="py-6">
                                <a
                                    href="/login"
                                    className="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                >
                                    Connexion
                                </a>
                            </div>
                        </div>
                    </div>
                </Dialog.Panel>
            </Dialog>
        </header >
    )
}