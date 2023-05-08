export default function GameInfos(props) {
    function path(file) {
        return '/uploads/images/cover/' + file;
    }

    return (
        <div className="px-4 py-5 sm:px-6" >
            <h3 className="text-base font-semibold leading-6 text-gray-900">Nom du jeu : {props.name}</h3>
            <p className="mt-1 max-w-2xl text-sm text-gray-500"> {props.supportName}</p>
            <p className="mt-1 max-w-2xl text-sm text-gray-500">{props.editorName}</p>
        </div>
    )
}