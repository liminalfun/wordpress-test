Granola
===================
- https://gitlab.com/wholegrain/granola
- https://gitlab.com/wholegrain/granola/wikis/home
- https://gitlab.com/wholegrain/granola/issues

# Requirements
- PHP >7.1
- Node v10.16.0 (there is an .nvmrc file in the root of project)

# Setup
- create .env.js with a development url
- update _development/general/site.webmanifest with project specifics
- update _development/images/icon-512.png
- update _development/config/wordpress.js
- npm run setup (runs `npm install && composer install && gulp`)
- npm start (runs gulp watch)
- npm run deploy (runs a production build)
