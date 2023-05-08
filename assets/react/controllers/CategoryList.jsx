import React from 'react';

export default function CategoryList(props) {
    return (
        <div
            key={props.id}
            className="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50"
        >
            <div className="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                <props.icon className="h-2 w-2 text-gray-600 group-hover:text-indigo-600" aria-hidden="true" />
            </div>
            <div className="flex-auto">
                <a href={props.href} className="block font-semibold text-gray-900">
                    {props.name}
                    <span className="absolute inset-0" />
                </a>
                <p className="mt-1 text-gray-600">{props.description}</p>
            </div>
        </div>
    )
}