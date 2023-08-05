const signUpButtonlogin = document.getElementById('signUp-login');
const signInButtonlogin = document.getElementById('signIn-login');
const containerlogin = document.getElementById('container-login');

signUpButtonlogin.addEventListener('click', () => {
	containerlogin.classList.add("right-panel-active-login");
});

signInButtonlogin.addEventListener('click', () => {
	containerlogin.classList.remove("right-panel-active-login");
});
