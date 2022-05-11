const base_url_js = 'http://localhost/Coronango/'
const showRegistrosPrensa = 8

const validateInputs = (inputs) => {
    inputs.forEach(input => {
        const element = document.getElementById(input.id);
        const error = document.getElementById(`${input.id}_error`);
        element.addEventListener('input', () => {
            if (element.value.trim() !== '' && element.value.length <= input.length)
                error.textContent = ''
            else if (!(element.value.trim() !== ''))
                error.textContent = 'Campo requerido'
            else if ((element.value.length > input.length))
                error.textContent = 'Tamaño máximo: ' + input.length + ' caracteres'
        });
    });
};