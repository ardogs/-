let select = document.getElementById('select')
const index = document.getElementById('index')
const loader = document.getElementById('loader')
const cards = document.getElementById('cards')

select.addEventListener('input', () => {
    loader.style.display = 'block'
    getNoticias(select.value)
})

window.onload = () => {
    getNoticias(showRegistrosPrensa)
}

const getNoticias = (showRegistrosPrensa) => {

    let myFormData = new FormData()
    let content = '';
    myFormData.append('limit_value', showRegistrosPrensa)

    cards.style.display = 'none';
    index.innerHTML = '';

    fetch(base_url_js + 'Prensa/getNoticiasFetch', {
        method: 'POST',
        body: myFormData
    })

    .then(res => res.json())

    .then(data => {
            loader.style.display = 'block'
            data.forEach(element => {
                content +=
                    `<section class="col">
                        <section class="card h-100">
                            <img src="${base_url_js}/public/media/images/prensa/${element.Path_Imagen}" class="card-img-top" >
                            <section class="card-body">
                                <h6 class="card-title myCardTitle">${element.Titulo}</h6>
                                <p class="card-text text-justify">${element.Descripción}</p>
                            </section>
                            <section class="card-footer">
                                <small class="text-muted">Publicado: ${element.Fecha_Hora_Registro} </small>
                            </section>
                        </section>
                    </section>`
            });
            index.innerHTML = content;
        })
        .catch(error => console.error('Error:', error))
        .finally(() => {
            loader.style.display = 'none'
            cards.style.display = 'block'
        })
}