import objectFit from './object-fit';

// ------------------------------------------------------------------
// Image Fit
// ------------------------------------------------------------------
// This adds a compatibility layer for images and usage of object fit
// The fall back will be applied if the no-object-fit class is on the
// HTML element
// ------------------------------------------------------------------
objectFit({
    targetClass: [
        'img-fit', // Custom usage
        'gallery-icon' // WordPress
    ]
});
