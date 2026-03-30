const container = document.getElementById('container');
const registerBTN = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBTN.addEventListener('click',()=>{
    container.classList.add("active");
});

loginBtn.addEventListener('click',()=>{
    container.classList.remove("active");
});
