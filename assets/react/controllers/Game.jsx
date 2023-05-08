import React from "react";

export default function Game(props) {

    function path(file) {
        return '/uploads/images/cover/' + file;
    }

    return (<div className="group relative">
        <div className="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
            <img src={path(props.img)} alt={props.alt} className="h-full w-full object-cover object-center lg:h-full lg:w-full" />
        </div>
        <div className="mt-4 flex justify-between">
            <div>
                <h3 className="text-sm text-gray-700">
                    <a href={props.id.toString()}>
                        <span aria-hidden="true" className="absolute inset-0"></span>
                        {props.name}
                    </a>
                </h3>
                <p className="mt-1 text-sm text-gray-500">{props.editor.name}</p>
            </div>
            <p className="text-sm font-medium text-gray-900" style={{ color: props.color }}>{props.support.map((supp) => supp.name)}</p>
        </div>
    </div>)
}