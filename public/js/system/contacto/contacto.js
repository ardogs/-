const Nombre = document.getElementById('Nombre')
const ApPaterno = document.getElementById('ApPaterno')
const ApMaterno = document.getElementById('ApMaterno')
const email = document.getElementById('email')
const telefono = document.getElementById('telefono')
const comentario = document.getElementById('comentario')

const Nombre_error = document.getElementById('Nombre_error')
const ApPaterno_error = document.getElementById('ApPaterno_error')
const ApMaterno_error = document.getElementById('ApMaterno_error')
const email_error = document.getElementById('email_error')
const telefono_error = document.getElementById('telefono_error')
const comentario_error = document.getElementById('comentario_error')

const data = document.getElementById('form');
const msg_error = document.getElementById('section_error')
const button = document.getElementById('enviar')

const array = [
    { id: 'Nombre', length: 50 },
    { id: 'ApPaterno', length: 50 },
    { id: 'ApMaterno', length: 50 },
    { id: 'email', length: 100 },
    { id: 'telefono', length: 10 },
    { id: 'comentario', length: 250 }
]
validateInputs(array)

button.addEventListener('click', (e) => {
    e.preventDefault();
    msg_error.innerHTML = ''

    let myFormData = new FormData(data);
    let band = []
    let FV = new FormValidator()
    let i = 0;

    band[i++] = Nombre_error.innerText = FV.validate(myFormData.get('Nombre'), 'required | max_length[50]');
    band[i++] = ApPaterno_error.innerText = FV.validate(myFormData.get('ApPaterno'), 'required | max_length[50]');
    band[i++] = ApMaterno_error.innerText = FV.validate(myFormData.get('ApMaterno'), 'required | max_length[50]');
    band[i++] = email_error.innerText = FV.validate(myFormData.get('email'), 'required | mail | max_length[100]');
    band[i++] = telefono_error.innerText = FV.validate(myFormData.get('telefono'), 'required | numeric |length[10]');
    band[i++] = comentario_error.innerText = FV.validate(myFormData.get('comentario'), 'required | max_length[250]');

    let success = true
    band.forEach(element => {
        success &= (element == '') ? true : false
    })

    if (success) {
        myFormData.append('enviar', button.value)

        fetch(base_url_js + 'Contacto/insertarComentario', {
            method: 'POST',
            body: myFormData
        })

        .then(res => res.json())

        .then(data => {
            if (!data.status) {

                fecha_error.innerText = (data.fecha_error === undefined) ? '' : data.fecha_error
                hora_error.innerText = (data.hora_error === undefined) ? '' : data.hora_error
                Marca_error.innerText = (data.Marca_error === undefined) ? '' : data.Marca_error
                Submarca_error.innerText = (data.Submarca_error === undefined) ? '' : data.Submarca_error
                Modelo_error.innerText = (data.Modelo_error === undefined) ? '' : data.Modelo_error
                Color_error.innerText = (data.Color_error === undefined) ? '' : data.Color_error
                Placa_error.innerText = (data.Placa_error === undefined) ? '' : data.Placa_error
                Num_Serie_error.innerText = (data.Num_Serie_error === undefined) ? '' : data.Num_Seri_errore
                Observaciones_error.innerText = (data.Observaciones_error === undefined) ? '' : data.Observaciones_error
                Destino_error.innerText = (data.Destino_error === undefined) ? '' : data.Destino_error




                let messageError;
                if ('error_message' in data) {
                    if (data.error_message != 'Render Index') {
                        if (typeof(data.error_message) != 'string') {
                            messageError = `<section class="alert alert-danger text-center animate__animated animate__fadeIn " role="alert" id="alert_sec">Sucedio un error en el servidor: ${data.error_message.errorInfo[2]}</section>`;
                        } else {
                            messageError = `<section class="alert alert-danger text-center animate__animated animate__fadeIn " role="alert" id="alert_sec">Sucedio un error en el servidor: ${data.error_message}</section>`;
                        }
                    }
                } else {
                    messageError = '<section class="alert alert-danger text-center animate__animated animate__fadeIn" role="alert" id="alert_sec">Por favor, revisa nuevamente el formulario</section>'
                }

                msg_error.innerHTML = messageError
                window.scroll({
                    top: 0,
                    left: 100,
                    behavior: 'smooth'
                });

                setTimeout(() => {
                    document.getElementById('alert_sec').classList.add('animate__fadeOut')
                    document.getElementById('alert_sec').classList.remove('animate__fadeIn')
                }, 5000)

            } else {
                msg_error.innerHTML = '<section class="alert alert-success text-center animate__animated animate__fadeIn " role="alert" id="alert_sec">Su información ha sido enviada de manera exitosa. En breve será contactado por personal de este Heroico Ayuntamiento</section>';
                document.getElementById('form').reset();
                window.scroll({
                    top: 0,
                    left: 100,
                    behavior: 'smooth'
                });

                setTimeout(() => {
                    document.getElementById('alert_sec').classList.add('animate__fadeOut')
                    document.getElementById('alert_sec').classList.remove('animate__fadeIn')
                }, 5000)
            }
        })
    } else {
        msg_error.innerHTML = '<section class="alert alert-danger text-center animate__animated animate__fadeIn " role="alert" id="alert_sec">Por favor, revisa nuevamente el formulario</section>'

        window.scroll({
            top: 0,
            left: 100,
            behavior: 'smooth'
        });

        setTimeout(() => {
            document.getElementById('alert_sec').classList.add('animate__fadeOut')
            document.getElementById('alert_sec').classList.remove('animate__fadeIn')
        }, 5000)
    }

    for (var pair of myFormData.entries()) {
        //console.log(pair[0] + ', ' + pair[1]);
    }
})