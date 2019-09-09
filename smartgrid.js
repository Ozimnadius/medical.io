const smartgrid = require('smart-grid');

smartgrid('./css/layout', {
    mobileFirst: false,
    columns: 24,
    offset: "20px",
    outputStyle: "scss",
    container: {
        maxWidth: "100%",
        fields: "20px",
    },
    breakPoints: {
        lg: {
            width: "100%",
            fields: "20px",
        },
        md: {
            width: "100%",
            fields: "20px",
        },
        sm: {
            width: "100%",
            fields: "20px",
        },
        xs: {
            width: "100%",
            fields: "20px",
        }
    },
});