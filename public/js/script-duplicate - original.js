document.addEventListener("DOMContentLoaded", () => {
  let toggleBtn = document.querySelector("#dark-mode-toggle");
  // let dark = document.createElement("img");
  // let light = document.createElement("img");
  // light.setAttribute(
  //   "src",
  //   "http://cat.ch/app/plugins/catch-dark-mode/image/button-2/light.svg"
  // );
  // dark.setAttribute(
  //   "src",
  //   "http://cat.ch/app/plugins/catch-dark-mode/image/button-2/dark.svg"
  // );
  // light.classList.add("light");
  // dark.classList.add("dark");

  
  // let interval = setInterval(() => {
	// document.querySelector("html").classList.toggle("darkMode");
  // }, 5000);


  // toggleBtn.appendChild(light);
  // toggleBtn.appendChild(dark);
  // toggleBtn.setAttribute("id", "dark-mode-toggle");
  // document.body.appendChild(toggleBtn);

  let darkMode = localStorage.getItem("darkMode");
  if (darkMode === "enabled") {
    document.querySelector("html").classList.add("darkMode");
  } else {
    document.querySelector("html").classList.remove("darkMode");
  }

  toggleBtn.addEventListener("click", () => {
    darkMode = localStorage.getItem("darkMode");
    // console.log(darkMode);
    toggleDarkMode(darkMode);
  });

  // console.log(invertHex(computedColor));

  // console.log(invertHex("ffffff")); // Returns FF00FF



  // console.log(darkmodeOptions);
  // Enable by default
  /* if ("1" === darkmodeOptions.enable_default) {
    html.contains('darkMode') ? '' : html.add("darkMode");
  } */

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
      document.querySelector("html").classList.contains('darkMode') ? '' : document.querySelector("html").classList.add("darkMode");
      window.dispatchEvent(new Event("darkmodeInit"));
    }
  }
});

function toggleDarkMode(dm) {
  let isDarkmode = document.querySelector("html").classList.contains('darkMode');
  document.querySelector("html").classList.toggle("darkMode");
  /* if (document.querySelector("html").classList.contains("darkMode")) {
		console.log("DARK");
		let main = document.querySelector("#main");
		let color = getStyle(main, "backgroundColor");

		let computedColor = rgb2hex(color);
		let bgColor = computedColor.replace("#", "", computedColor);
		let pgColor = invertHex(bgColor);

		document.querySelectorAll(".hentry");
		let hentry = document.querySelectorAll(".hentry");
		let darkColor = "#" + LightenDarkenColor(pgColor, 20);
		console.log(pgColor);

		for (let i = 0; i < hentry.length; i++) {
			hentry[i].style.backgroundColor = darkColor;
		}

		document.querySelector("#main").style.backgroundColor = darkColor;
		if (document.querySelector("#supplementary")) {
			document.querySelector("#supplementary").style.backgroundColor =
				darkColor;
		}
		document.querySelector("#respond").style.backgroundColor = darkColor;
		if (document.querySelector("#branding")) {
			document.querySelector("#branding").style.backgroundColor =
				darkColor;
		}
		document.querySelector("#site-generator").style.backgroundColor =
			darkColor;

		let widget = document.querySelectorAll(".widget");
		for (let i = 0; i < widget.length; i++) {
			widget[i].style.backgroundColor = darkColor;
		}
		document.querySelector(".post-navigation").style.backgroundColor =
			darkColor;
	} else {
		console.log("LIGHT");
		document.querySelectorAll(".hentry");
		let hentry = document.querySelectorAll(".hentry");
		let lightColor = "#ffffff";

		for (let i = 0; i < hentry.length; i++) {
			hentry[i].style.backgroundColor = lightColor;
		}

		document.querySelector("#main").style.backgroundColor = lightColor;
		if (document.querySelector("#supplementary")) {
			document.querySelector("#supplementary").style.backgroundColor =
				lightColor;
		}
		document.querySelector("#respond").style.backgroundColor = lightColor;
		if (document.querySelector("#branding")) {
			document.querySelector("#branding").style.backgroundColor =
				lightColor;
		}
		document.querySelector("#site-generator").style.backgroundColor =
			lightColor;

		let widget = document.querySelectorAll(".widget");
		for (let i = 0; i < widget.length; i++) {
			widget[i].style.backgroundColor = lightColor;
		}
		document.querySelector(".post-navigation").style.backgroundColor =
			lightColor;
	} */
  /* console.log(isDarkmode);
  console.log(dm); */
  localStorage.setItem("darkMode", null);
  if (dm === "enabled") {
    localStorage.setItem("darkMode", null);

    //console.log(localStorage.getItem("darkMode"));
  } else {
    localStorage.setItem("darkMode", "enabled");
    //console.log(localStorage.getItem("darkMode"));
  }
}

function LightenDarkenColor(col, amt) {
  var num = parseInt(col, 16);
  var r = (num >> 16) + amt;
  var b = ((num >> 8) & 0x00ff) + amt;
  var g = (num & 0x0000ff) + amt;
  var newColor = g | (b << 8) | (r << 16);
  return newColor.toString(16);
}

function getStyle(el, styleProp) {
  if (el.currentStyle) return el.currentStyle[styleProp];

  return document.defaultView.getComputedStyle(el, null)[styleProp];
}

function invertHex(hex) {
  let myColor = document
    .querySelector(".hentry")
    .style.getPropertyValue("background-color");
  // console.log(myColor);
  return (Number(`0x1${hex}`) ^ 0xffffff).toString(16).substr(1).toUpperCase();
  // return (Number(`0x1${hex}`) ^ 0xFFFFFF).toString(16).substr(1).toUpperCase();
}

function makeHex(hexcolor) {
  // If a three-character hexcolor, make six-character
  if (hexcolor.length === 3) {
    hexcolor = hexcolor
      .split("")
      .map(function (hex) {
        return hex + hex;
      })
      .join("");
  }
}

var hexDigits = new Array(
  "0",
  "1",
  "2",
  "3",
  "4",
  "5",
  "6",
  "7",
  "8",
  "9",
  "a",
  "b",
  "c",
  "d",
  "e",
  "f"
);

//Function to convert rgb color to hex format
function rgb2hex(rgb) {
  if (rgb.includes("rgba")) {
    rgb = rgba2hex(rgb);
    return rgb;
  } else {
    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
  }
}

function rgba2hex(orig) {
  var a,
    isPercent,
    rgb = orig
      .replace(/\s/g, "")
      .match(/^rgba?\((\d+),(\d+),(\d+),?([^,\s)]+)?/i),
    alpha = ((rgb && rgb[4]) || "").trim(),
    hex = rgb
      ? (rgb[1] | (1 << 8)).toString(16).slice(1) +
        (rgb[2] | (1 << 8)).toString(16).slice(1) +
        (rgb[3] | (1 << 8)).toString(16).slice(1)
      : orig;

  // console.log(hex);

  /* if (alpha !== "") {
		a = alpha;
	} else {
		a = 01;
	}
	// multiply before convert to HEX
	a = ((a * 255) | (1 << 8)).toString(16).slice(1);
	hex = hex; */

  return "#" + hex;
}

function hex(x) {
  return isNaN(x) ? "00" : hexDigits[(x - (x % 16)) / 16] + hexDigits[x % 16];
}
