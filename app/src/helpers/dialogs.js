import swal from "sweetalert2";

const errorMessages = {
    'invalid.pet_id': 'Este Pet não foi encontrado em nosso sistema',
    'invalid.pet_gender': 'Sexo do Pet Incorreto',
    'invalid.pet_name': 'O nome do Pet é inválido',
    'invalid.born_at': 'Data de nascimento incorreta',
    'invalid.died_at': 'Data de morte incorreta',
    'invalid.breed_id': 'Esta Raça é inválida',
}

export default {
    captureError: (message) => {
        swal.fire({
            type: "error",
            title: errorMessages.hasOwnProperty(message) ? errorMessages[message] : message
        })
    }
}