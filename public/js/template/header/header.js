const hamburguer = document.querySelector('.hamburger')
hamburguer.addEventListener('click', () => {
    (hamburguer.classList.contains('is-active')) ? hamburguer.classList.remove('is-active'): hamburguer.classList.add('is-active')
})