// Loaded from
import '../components/_components';
import ie10 from './helpers/ie10';
import ie11 from './helpers/ie11';

// ------------------------------------------------------------------
// Custom scripts
// ------------------------------------------------------------------
const Granola = () => {
    if (ie11() || ie10()) {
        document.querySelector('html').classList.add('legacybrowser');
    }
}

document.addEventListener('DOMContentLoaded', () => Granola());
