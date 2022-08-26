const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: "#4b74da",
                    100: "#4d7adf",
                    200: "#5184e6",
                    300: "#5387e8",
                    400: "#5081e4",
                    500: "#486dd5",
                    600: "#3b4dbb",
                    700: "#2d2b97",
                    800: "#2c1a6c",
                    900: "#210c3c",
                },
                secondary: {
                    50: "#4b64d7",
                    100: "#4e5cd9",
                    200: "#5b53db",
                    300: "#7055d9",
                    400: "#7c52d1",
                    500: "#7e4ac1",
                    600: "#743ca8",
                    700: "#602b88",
                    800: "#461a61",
                    900: "#270b37",
                },
                danger: {
                    50: "#524bda",
                    100: "#824ddf",
                    200: "#de51e6",
                    300: "#e853a7",
                    400: "#e4506d",
                    500: "#d54848",
                    600: "#bb3b3c",
                    700: "#972b3f",
                    800: "#6c1a43",
                    900: "#3c0c37",
                },
                warning: {
                    50: "#604bcc",
                    100: "#924dc3",
                    200: "#b14f8e",
                    300: "#9f4f4d",
                    400: "#8c6947",
                    500: "#78683c",
                    600: "#63532e",
                    700: "#4e3220",
                    800: "#381216",
                    900: "#210819",
                },
                success: {
                    50: "#3bf7b9",
                    100: "#3dfcba",
                    200: "#3effb3",
                    300: "#3effa7",
                    400: "#3eff95",
                    500: "#39f178",
                    600: "#30d352",
                    700: "#24ab2b",
                    800: "#247a17",
                    900: "#1e430c",
                },
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
