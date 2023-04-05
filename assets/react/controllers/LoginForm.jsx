import React from 'react';

export default function LoginForm(props) {
    return (
        <div>
            <label htmlFor={props.for} className="sr-only">{props.label}</label>
            <input id={props.inputId} name={props.name} type={props.type} autoComplete={props.autocomplete} required className="relative block w-full rounded-t-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:z-10 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder={props.label} />
        </div>
    );
}