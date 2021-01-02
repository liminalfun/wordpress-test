'use strict';

import config from '../_development/config/config';
import { src, dest } from 'gulp';
import plumber from 'gulp-plumber';

export default function fonts() {
    let destination = config.paths.base.dest + config.paths.fonts.dest;

    return src(config.paths.base.src + config.paths.fonts.src + '**/*.{woff2,woff,otf,ttf,svg}')
        .pipe(plumber())
        .pipe(dest(destination));
};
