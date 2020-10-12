module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                "au-green": "#1A5632",
                "au-red": "#9F2241",
                "au-gold": "#B4A269",
                "au-gray": "#58595B",
                "au-light-brown": "#e7e5e5"
            }
        },
        pagination: theme => ({
            color: theme("colors.green.800"),
            linkFirst: "mr-6 border rounded",
            linkSecond: "rounded-l border-l",
            linkBeforeLast: "rounded-r border-r",
            linkLast: "ml-6 border rounded"
        })
    },
    variants: {
        extend: {}
    },
    plugins: [require("tailwindcss-plugins/pagination")]
};
