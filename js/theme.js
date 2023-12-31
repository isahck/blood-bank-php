// function initThemeSelector(){
//   const themeSelect = document.getElementById("theme-selector");
//   const themeSelectorLink = document.getElementById("savedTheme");

//   function activateTheme(themeName) {
//     themeSelectorLink.setAttribute("href", `../css/theme/${themeName}.css`);
//   }

//   themeSelect.addEventListener("change", () => {
//     activateTheme(themeSelect.value);
//   });
// }
//   initThemeSelector();

function initThemeSelector(){
  const themeSelect = document.getElementById("theme-selector");
  const themeSelectorLink = document.getElementById("savedTheme");
  const currentTheme = localStorage.getItem("theme") || "default-theme";

  function activateTheme(themeName) {
    themeSelectorLink.setAttribute("href", `../css/theme/${themeName}.css`);
  }

  themeSelect.addEventListener("change", ()=>{
    activateTheme(themeSelect.value);
    localStorage.setItem("theme", themeSelect.value);
  });
  
  themeSelect.value = currentTheme;
  activateTheme(currentTheme);
}
  initThemeSelector();
