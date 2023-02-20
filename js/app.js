
// console.log('Funciona!')

const formulario = document.getElementById('formulario');
const usuario = document.getElementById('texto-1');
const email = document.getElementById('texto-2');
const mensaje = document.getElementById('texto-3');
const boton = document.getElementById('boton');


formulario.addEventListener('submit', (e) => {
    e.preventDefault();
    e.stopPropagation();
    // console.log('Formulário funcionando') /* teste formulário*/

    const data = new FormData(formulario);
    // console.log(data.get('mensaje')); // teste de consta data
    const campoValido = (campo) => {
        campo.classList.add('is-valid');
        campo.classList.remove('is-invalid');
    }
    const campoInvalido = (campo) => {
        campo.classList.add('is-invalid');
        campo.classList.remove('is-valid');
    }

    if (!data.get('usuario').trim()) {
        console.log('no hay usuario!')
        campoInvalido(usuario)
        return
    } else {
        campoValido(usuario);
    }
    if (!data.get('email').trim()) {
        console.log('no hay email!')
        campoInvalido(email)
        return
    } else {
        campoValido(email);
    }
    if (!data.get('mensaje').trim()) {
        console.log('no hay mensaje!')
        campoInvalido(mensaje)
        return
    } else {
        campoValido(mensaje);
    }
    console.log('Campos completos!');

    fetch('formulario.php', {
        method: 'POST',
        body: data
    }).then((res) => res.json())
        .then((dados) => console.log(dados))
        .catch((e) => console.log(e));
})