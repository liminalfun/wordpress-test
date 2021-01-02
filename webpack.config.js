// -----------------------------------------------------------------------------
// Options currently supports one property, production.
//
// Production is a boolean and if true will configure webpack for a production
// build (minify, strip, etc) and will also add a hash to the filename.
//
// To see what explicit polyfills are added to each build, add debug to the
// options for babel.
// -----------------------------------------------------------------------------
export default (options, argv) => {

    // ---------------------------------------------------------------------
    // Lets build the filename of the scripts we are creating
    // ---------------------------------------------------------------------
    let filename = '[name]';

    if (options.production === true) {
        filename = filename + '.[chunkhash]';
    }

    filename = filename + '.js';

    // ---------------------------------------------------------------------
    // Begin the config
    // ---------------------------------------------------------------------
    let config = {
        mode: (options.production === true ? 'production' : 'development'),
        output: {
            filename: filename
        },
        module: {
            rules: [
                // -------------------------------------------------------------
                // Linting
                // -------------------------------------------------------------
                {
                    enforce: 'pre',
                    test: /\.js$/,
                    exclude: /node_modules/,
                    loader: 'eslint-loader',
                },
                // -------------------------------------------------------------
                // Build for older browsers
                // -------------------------------------------------------------
                {
                    test: /\.js$/,
                    exclude: /node_modules/,
                    loader: "babel-loader",
                }
            ]
        },
        externals: {
            jquery: 'jQuery',
            $: 'jQuery',
            jQuery: 'jQuery'
        },
        // ---------------------------------------------------------------------
        // Don't output webpack statistics
        // ---------------------------------------------------------------------
        stats: 'errors-only'
    };

    // ---------------------------------------------------------------------
    // Ship it
    // ---------------------------------------------------------------------
    return config;
};
