document.addEventListener("DOMContentLoaded", () => {
  let toggleCheck = document.querySelector("input#toggle");
  let toggleBtn = document.querySelector("#dark-mode-toggle");
  let darkMode = localStorage.getItem("darkMode");
  let checked = false;

  
  if (darkMode === "enabled" || '1' === darkmodeOptions.enable_default ) {
    document.querySelector("html").classList.add("darkMode");
  } else {
    document.querySelector("html").classList.remove("darkMode");
  }
  
  ( document.querySelector("html").classList.contains("darkMode") ) ? checked = true : checked = false;

  toggleCheck.checked = checked;


  toggleCheck.addEventListener("change", () => {
    console.log(toggleCheck.checked);
    darkMode = localStorage.getItem("darkMode");
    toggleDarkMode(darkMode);
  });
  


  /**-- check OS aware mode if dark mode not changed by the switch --**/
  if (darkmodeOptions.os_aware != "0") {
    var darkMediaQuery = window.matchMedia("(prefers-color-scheme: dark)");

    try {
      // Chrome & Firefox
      darkMediaQuery.addEventListener("change", function (e) {
        var newColorScheme = e.matches ? "dark" : "light";

        if ("dark" === newColorScheme) {
          document.querySelector("html").classList.add("darkMode");
        } else {
          document.querySelector("html").classList.remove("darkMode");
        }

        window.dispatchEvent(new Event("darkmodeInit"));
      });
    } catch (e1) {
      try {
        // Safari
        darkMediaQuery.addListener(function (e) {
          var newColorScheme = e.matches ? "dark" : "light";

          if ("dark" === newColorScheme) {
            document.querySelector("html").classList.add("darkMode");
          } else {
            document.querySelector("html").classList.remove("darkMode");
          }

          window.dispatchEvent(new Event("darkmodeInit"));
        });
      } catch (e2) {
        console.error(e2);
      }
    }

    /** check init dark theme */
    if (
      window.matchMedia &&
      window.matchMedia("(prefers-color-scheme: dark)").matches
    ) {
      document.querySelector("html").classList.contains("darkMode")
        ? ""
        : document.querySelector("html").classList.add("darkMode");
      window.dispatchEvent(new Event("darkmodeInit"));
    }
  }
});

function toggleDarkMode(dm) {
  document.querySelector("html").classList.toggle("darkMode");

  localStorage.setItem("darkMode", null);
  if (dm === "enabled") {
    localStorage.setItem("darkMode", null);
  } else {
    localStorage.setItem("darkMode", "enabled");
  }
}