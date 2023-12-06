document.addEventListener("DOMContentLoaded", function () {
    const home = document.querySelector(".home");
    const formContainer = document.querySelector(".form_container");
    const signupBtn = document.querySelector("#signup");
    const loginBtn = document.querySelector("#login");
    const pwShowHide = document.querySelectorAll(".pw_hide");
  
    // Menampilkan halaman secara otomatis
    home.classList.add("show");
  
    // Menambahkan event listener untuk tombol Daftar
    if (signupBtn && formContainer) {
      signupBtn.addEventListener("click", function (e) {
        e.preventDefault();
        formContainer.classList.add("active");
      });
    }
  
    // Menambahkan event listener untuk tombol Login
    if (loginBtn && formContainer) {
      loginBtn.addEventListener("click", function (e) {
        e.preventDefault();
        formContainer.classList.remove("active");
      });
    }
  
    // Menambahkan event listener untuk toggle password show/hide
    pwShowHide.forEach((icon) => {
      icon.addEventListener("click", () => {
        let getPwInput = icon.parentElement.querySelector("input");
        if (getPwInput.type === "password") {
          getPwInput.type = "text";
          icon.classList.replace("uil-eye-slash", "uil-eye");
        } else {
          getPwInput.type = "password";
          icon.classList.replace("uil-eye", "uil-eye-slash");
        }
      });
    });
  });