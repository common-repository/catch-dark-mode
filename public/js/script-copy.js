/**
 * Package: Catch Dark
 * Author: Catch Plugins
 * Year: 2020
 */

"use strict";

/**
 * This is the main init function
 */
const init = () => {
  
  const html = document.getElementsByTagName("html")[0].classList;

  if (0 < document.getElementsByClassName("catch-dark-switcher").length) {
    document
      .getElementsByClassName("catch-dark-switcher")[0]
      .addEventListener("click", function () {
        if (html.contains("dark-enabled")) {
          html.remove("dark-enabled");
        } else {
          html.add("dark-enabled");
        }
      });
  }

  // Enable by default
  if ("1" === darkmodeOptions.enable_default) {
    html.contains('dark-enabled') ? '' : html.add("dark-enabled");
  }

  /**-- check OS aware mode if dark mode not changed by the switch --**/
  if (darkmodeOptions.os_aware != "0") {
    var darkMediaQuery = window.matchMedia("(prefers-color-scheme: dark)");

    try {
      // Chrome & Firefox
      darkMediaQuery.addEventListener("change", function (e) {
        var newColorScheme = e.matches ? "dark" : "light";

        if ("dark" === newColorScheme) {
          document.querySelector("html").classList.add("dark-enabled");
        } else {
          document.querySelector("html").classList.remove("dark-enabled");
        }

        window.dispatchEvent(new Event("darkmodeInit"));
      });
    } catch (e1) {
      try {
        // Safari
        darkMediaQuery.addListener(function (e) {
          var newColorScheme = e.matches ? "dark" : "light";

          if ("dark" === newColorScheme) {
            document.querySelector("html").classList.add("dark-enabled");
          } else {
            document.querySelector("html").classList.remove("dark-enabled");
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
      document.querySelector("html").classList.contains('dark-enabled') ? '' : document.querySelector("html").classList.add("dark-enabled");
      window.dispatchEvent(new Event("darkmodeInit"));
    }
  }
};

/**
 * This makes sure that all function is called after the document is loaded.
 */
window.addEventListener("load", init, false);
