
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

    const limpiarFormulario = () => {
        console.log('Mensaje enviada con éxito!');
        formulario.reset();
        usuario.classList.remove('is-valid');
        email.classList.remove('is-valid');
        mensaje.classList.remove('is-valid');

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
    })
        .then((res) => res.json())
        .then((datos) => {
            console.log(datos);

            if (datos.erro && datos.campo === "usuario") {
                console.log("erro con usuario PHP");
                campoInvalido(usuario);
                return;
            } else {
                campoValido(usuario);
            }
            if (datos.erro && datos.campo === "email") {
                console.log("erro con email PHP");
                campoInvalido(email);
                return;
            } else {
                campoValido(email);
            }
            if (datos.erro && datos.campo === "mensaje") {
                console.log("erro con mensaje PHP");
                campoInvalido(mensaje);
                return;
            } else {
                campoValido(mensaje);
            }
            if (!datos.erro) {
                limpiarFormulario();
                campoValido(boton);
            }
        })
        .catch((e) => console.log(e));
})