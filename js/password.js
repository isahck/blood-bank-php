var passwordBox = document.getElementById("password-box");
var toggleBtn = document.getElementById("password-toggle");


toggleBtn.addEventListener("click", ()=>{
  if (passwordBox.type === "password") {
    passwordBox.type = "text"
    toggleBtn.innerText = "hide"
  }else{
    passwordBox.type = "password"
    toggleBtn.innerText = "show"
  }
  console.log("me");
});
