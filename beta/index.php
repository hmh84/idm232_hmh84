<?php
    include_once 'include/db.php';
    
    $query ="SELECT * FROM recipes;";
    $result = mysqli_query($connection, $query);

    $result_selected = mysqli_query($connection, $query_selected_recipe);
    
    if (!$result ) {
        die ('Database query failed :(');
    }
?>

<!DOCTYPE html>
<html lang="en" id="html">
<head>
    <meta charset="UTF-8">
    <title>IDM 232 - Beta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>
<body>

<!-- Header -->

    <header>
        <div id="hero">
            <div id="hero-filter"></div>
            <div id="slideshow">
                <img src="graphics/slideshow/hero-1.jpg" alt="Hero Photo">
                <img src="graphics/slideshow/hero-2.jpg" alt="Hero Photo">
                <img src="graphics/slideshow/hero-3.jpg" alt="Hero Photo">
            </div>
            <div id="hero-content">
                <h1 class="logo-text">BlueBook</h1>
                <p id="header-help-link">Help</p>
                <p id="header-menu-link">Menu</p>
                <h2 class="logo-text">Let's get cooking.</h2>
                <h1>BlueBook is a company dedicated to bringing you high quality meals made in simple ways.</h1>
            </div>
        </div>
    </header>

<!-- Main - Search & Filter -->

    <main>
        <h1 id="title">All Recipes</h1>
        <div id="criteria">
            <div id="search">
                <input id="search-input" type="search" placeholder="Search">
                <button id="search-button" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37.434 36.207"><defs/><defs><filter id="a" width="36" height="36" x="0" y="0" filterUnits="userSpaceOnUse"><feOffset dy="3"/><feGaussianBlur result="blur" stdDeviation="3"/><feFlood flood-opacity=".161"/><feComposite in2="blur" operator="in"/><feComposite in="SourceGraphic"/></filter><filter id="b" width="22.414" height="22.414" x="15.019" y="13.793" filterUnits="userSpaceOnUse"><feOffset dy="3"/><feGaussianBlur result="blur-2" stdDeviation="3"/><feFlood flood-opacity=".161"/><feComposite in2="blur-2" operator="in"/><feComposite in="SourceGraphic"/></filter></defs><g data-name="Search Icon"><g filter="url(#a)"><g fill="none" stroke="#fff" stroke-width="2" data-name="Ellipse 1" transform="translate(9 6)"><circle cx="9" cy="9" r="9" stroke="none"/><circle cx="9" cy="9" r="8"/></g></g><g filter="url(#b)"><path fill="none" stroke="#fff" stroke-width="2" d="M24.73 20.5l3 3" data-name="Line 1"/></g></g></svg>
                </button>
            </div>
            <div class="filter" closed>
                <div id="filter-hitbox"></div>
                <p>Filter</p>
                <button id="filter-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs/><path d="M208 512l-8-2c-5-3-8-8-8-14V291c0-8-3-15-9-20L12 114C4 107 0 97 0 87V37C0 17 17 0 37 0h438c20 0 37 17 37 37v50c0 10-4 20-12 27L329 271c-6 5-9 12-9 20v130c0 12-6 24-17 31l-86 57-9 3zM37 32c-3 0-5 2-5 5v50l2 4 171 157c12 11 19 26 19 43v175l62-41 2-4V291c0-17 7-32 19-43L478 91l2-4V37c0-3-2-5-5-5zm0 0"/></svg>
                </button>
                <div id="filter-content">
                    <form class="filter-form">
                            <section class="range-slider">
                                <span class="rangeValues"></span>
                                <div class="range-wrapper">
                                    <input class="range-1-slider" type="range" name="slide1" slider1 value="20" min="20" max="60" step="5">
                                    <input class="range-1-slider" type="range" name="slide2" slider2 value="60" min="20" max="60" step="5">
                                </div>
                            </section>
                        <h3>Protein:</h3>
                            <div class="filter-section" id="filter-protein">
                                <label class="control control-checkbox"><div><input name="beef" class="filter-checkbox" id="protein-beef" type="checkbox" checked/><div class="control_indicator"></div></div><span>Beef</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 25"><defs/><path d="M.8 13.2C1 8.8 1.8 6.5 3.5 6c.3-.7.7-1.3 1.4-1.6.8-.4 1.8-.6 2.8-.5H8c.7 0 1.5.1 2.4.2 1.4.2 2.8.3 4.2.3h1.5c2.2-.1 4.3 0 6.5.2 0 0 0-.1.1-.1-.9-1.1-1.4-2.6-1.2-4 0-.3.3-.5.5-.4.1 0 .3.1.4.2.7 1 1.6 1.8 2.6 2.5.5-.1 1-.1 1.5-.1h.1c.5 0 1 0 1.5.1 1-.7 1.8-1.5 2.6-2.5.1-.2.5-.3.7-.1.1.1.2.2.2.4.1 1.4-.3 2.9-1.2 4 0 .1 0 .1.1.2.9-.1 1.9.1 2.7.5.2.2.3.5.1.7-.6.8-1.5 1.4-2.5 1.5v.3c-.5 3.9-1.6 4.9-3 5.2l-1.4 1.4-1.1 1.4c-.4 2.9-.5 5.8-.3 8.7 0 .3-.2.5-.4.5H22.9c-.2 0-.4-.2-.5-.4 0-.1-.6-2.7-.9-4.5-.1 2.6-.1 4.4-.1 4.4 0 .3-.2.5-.5.5h-2c-.2 0-.4-.2-.5-.4 0 0-.8-4.5-1-7.2 0-.1 0-.3.2-.4.1-.1.2-.3.3-.4H13.3c-.3 0-.6 0-.9-.1-.5.8-1.2 1.4-2 2l.6 5.9c0 .3-.2.5-.4.5h-2c-.4.1-.6-.1-.6-.3 0 0-.6-3.6-.9-6.3-.1.1-.3.2-.4.2l.5 5.9c0 .3-.2.5-.4.5h-2c-.2 0-.4-.2-.5-.4 0-.3-1.1-6.7-1-8.7 0-.5.1-1 .1-1.4.2-1.3.2-2.6-.1-3.8-.2-1-.2-2.1-.2-3.2-.8.8-1.2 2.8-1.4 5.8.4.2.8.7.8 1.9 0 .9-.4 1.7-.9 2.3-.2.2-.5.2-.7 0-.5-.6-.9-1.4-.9-2.3 0-1.2.4-1.7.8-1.9zm9.5-8.1C9.4 5 8.6 4.9 8 4.9h-.3c-.5 0-1 0-1.5.1 1.3 1 2.5 2.2 3.6 3.5.3.4.6.7.8.9.8.5 1.8.7 2.8.3.9-.3 1.5-1.2 1.5-2.1-.1-.8.1-1.6.3-2.3h-.7c-1.4 0-2.8-.1-4.2-.2zm11.9 1.3c0-.3 0-.5.1-.8-.5 0-.9 0-1.3.1.3.4.7.6 1.2.7zm.2-4.5c.1.6.4 1.1.8 1.6.2-.2.4-.3.6-.5-.6-.3-1-.7-1.4-1.1zM29 3.1c.2.1.4.3.6.5.4-.5.6-1.1.8-1.6-.5.4-1 .8-1.4 1.1zm1.4 2.5c0 .3.1.5.1.8.5-.1.9-.3 1.3-.6-.5-.2-1-.3-1.4-.2zm-1 2c.3-1.1.1-2.3-.6-3.3-.6-.6-1.5-.8-2.3-.7h-.3c-.5 0-1 0-1.4.1h-.1c-.4.1-.7.3-1 .6-.6 1-.9 2.2-.6 3.3.5 4.4 1.8 4.4 3.1 4.4H27c1.1-.2 2-.9 2.4-4.4zm-7.7 10.6c.1.1.2.2.2.3.2.9.9 4.3 1.1 5.5h.7c-.1-2.4-.1-4.8.2-7.3-.7.5-1.5 1-2.3 1.4l.1.1zm-7.6-2.5h2.7l.3-.2c1.4-.9 2.3-1.5 2.5-2.2.1-.2 0-.5-.1-.6-.6-.6-1.5-1-2.3-.9-1.1.1-1.6.1-2.7 2.9a3 3 0 00-.4 1zM8.9 24h1l-.5-5.7c0-.2.1-.4.3-.5.6-.3 1.1-.8 1.5-1.3-.8-.1-1.5-.3-2.2-.5-.2.6-.6 1.1-1 1.6.2 2.1.7 5.3.9 6.4zm-4.5-9.4c0 .4-.1.9-.1 1.4.1 2.7.4 5.4.9 8.1h1l-.5-5.7c0-.2.1-.4.3-.5 1.1-.4 1.9-1.3 2.2-2.4-.1-.3.1-.5.4-.6.1 0 .3 0 .4.1.3.2 1.1.6 4 .7.2-.4.4-.9.6-1.4 1.2-2.8 1.9-3.3 3.5-3.5 1.2-.1 2.4.4 3.2 1.3.4.4.5 1 .3 1.5-.4.9-1.1 1.6-1.9 2.1.1 0 .2.1.3.2.1.1.1.3 0 .5-.2.4-.5.8-.8 1.2.2 2.2.7 5.3.9 6.4h1.1c0-1 0-3.3.3-6.1v-.1s0-.1.1-.1l.1-.1h.1c1.3-.5 2.4-1.3 3.4-2.2.4-.6.8-1.1 1.2-1.6l.6-.6c-1.7-.1-3.2-.7-3.7-5.3v-.3c-1-.1-1.9-.7-2.5-1.5-.1-.2-.1-.4 0-.5h-3.4c-.4.7-.6 1.5-.6 2.3-.1 1.3-.9 2.5-2.2 2.9-.5.2-.9.2-1.4.2-.8 0-1.7-.2-2.3-.8-.3-.3-.6-.7-.9-1.1-1.2-1.4-2.5-2.6-3.9-3.7-1 .8-1.3 2.5-.8 5 .3 1.4.3 2.8.1 4.2zm-3.1 1.6c.2-.3.3-.7.3-1.1 0-.8-.2-1-.3-1s-.3.3-.3 1c0 .4.1.8.3 1.1z"/></svg></label>
                                <label class="control control-checkbox"><div><input name="chicken" class="filter-checkbox" id="protein-chicken" type="checkbox" checked/><div class="control_indicator"></div></div><span>Chicken</span><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" x="0" y="0" version="1.1" viewBox="0 0 25.3 29.1" xml:space="preserve"><defs/><g id="rooster" transform="translate(-48 -16)"><circle id="Ellipse_13" cx="67.5" cy="21.8" r=".4" class="st0"/><path id="Path_31" d="M72.8 24.7h-1.9v.7c0 .9-.3 1.8-.8 2.5-.4.5-.6 1.2-.6 1.9V33c0 2.9-2.4 5.3-5.3 5.3-.4.7-1.1 1.3-1.9 1.7v.6l.9 1.3 2.9 2.4c.2.2.2.5.1.7-.1.1-.2.2-.4.2h-7.3c-.3 0-.5-.2-.5-.5 0-.1 0-.2.1-.3l.8-1.2-1.3-1.7c-.1-.1-.1-.2-.1-.3V40c-4.6-1.1-7.8-5.2-7.8-9.9v-2.9c0-.5-.2-1-.6-1.4-.6-.6-.9-1.3-.9-2.1v-1.4c0-.3.2-.5.5-.5 1.4 0 2.7.4 3.8 1.3l3 2.2c1.9 1.5 4.7 1.1 6.2-.9.2-.3.4-.6.5-.9l.1-.3a6 6 0 013.8-3.5l-.6-.2c-1.3-.4-2.2-1.6-2.2-3 0-.3.2-.5.5-.5h4.9c1.3 0 2.4 1.1 2.4 2.4v3.9c1.1 0 2.1.7 2.4 1.8.1.3-.1.5-.3.6h-.4zM62.3 42.6c-.1 0-.1-.1 0 0L61.2 41c-.1-.1-.1-.2-.1-.3v-.5h-1v.4l1.3 2.2 1.7 1.3h.9l-1.7-1.5zm-4.1-1.5l1.4 1.8c.1.2.1.4 0 .6l-.5.7h2.5l-.8-.6c-.1 0-.1-.1-.1-.1L59.2 41c0-.1-.1-.2-.1-.2v-.5c-.3 0-.7 0-1-.1l.1.9zm4.7-17.5l-.1.3a5.4 5.4 0 01-7.1 2.8c-.4-.2-.8-.4-1.1-.6l-3-2.2c-.8-.6-1.7-1-2.7-1v.9c0 .5.2 1 .6 1.4.6.6.9 1.3.9 2.1v2.9c0 5.1 4.1 9.2 9.2 9.2h1c1.6 0 2.9-1.3 2.9-2.9v-.7c-.5.1-1 .2-1.5.2h-6c-1.2 0-2.1-1-2.2-2.1 0-.6.3-1.2.8-1.6l2.8-2.4.6.7-2.8 2.4c-.5.4-.6 1.2-.1 1.7.2.3.5.4.9.4h6.1c2.1 0 3.9-1.7 3.9-3.9v-1.9h1v1.9c0 1.7-.9 3.3-2.4 4.2v1.1c0 .3 0 .6-.1 1 2.3-.2 4-2.1 4-4.4v-3.2c0-.9.3-1.8.8-2.5.4-.5.6-1.2.6-1.9v-.7h-.5c-.3 0-.5-.2-.5-.5v-1.5c0-.3.2-.5.5-.5h.5c0-1.1-.9-1.9-1.9-1.9-2.2 0-4.2 1.3-5.1 3.2zm6-6.5v.9h-1v-1h-1v1h-1v-1H64c.2.8.7 1.4 1.5 1.6l.6.2c.3.1.6.4.7.7.3-.1.7-.1 1-.1.7 0 1.4.3 1.9.7v-1.7c.2-.6-.2-1.1-.8-1.3zm1.9 6.2h-.9v.5H72c-.4-.3-.8-.5-1.2-.5z" class="st0"/><path id="Path_32" d="M61.3 32.7h-.8v-.8h.8c.7 0 1.2-.5 1.2-1.2v-.8h.8v.8a2 2 0 01-2 2z" class="st0"/></g></svg></label>
                                <label class="control control-checkbox"><div><input name="fish" class="filter-checkbox" id="protein-fish" type="checkbox" checked/><div class="control_indicator"></div></div><span>Fish</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.81 23.3"><defs/><g data-name="Group 27"><g data-name="Group 26"><path d="M34.3 8.31a18.43 18.43 0 00-6.08-3.48A20.04 20.04 0 0024.94 4 12.18 12.18 0 0018.42.06a2.08 2.08 0 00-2.55 2.03v2.96a25.8 25.8 0 00-7.77 5.6 7.04 7.04 0 00-1.8-3.63A8.24 8.24 0 00.75 5.04.78.78 0 000 5.8 8.24 8.24 0 002 11.34a5.87 5.87 0 001.7 1.17 6.02 6.02 0 00-1.7 1.17A8.25 8.25 0 000 19.22a.78.78 0 00.75.75h.12A8.13 8.13 0 006.3 18a7.09 7.09 0 001.8-3.69 28.04 28.04 0 005.13 4.2v2.71a2.09 2.09 0 002.08 2.09 2.1 2.1 0 00.6-.09 11.78 11.78 0 003.96-2.12 13.03 13.03 0 001.89.14 19.52 19.52 0 006.3-1.06c4.82-1.64 8.73-5.1 8.73-7.7.02-1.24-.87-2.71-2.49-4.16zM3.08 10.24a6.09 6.09 0 01-1.49-3.6 6.06 6.06 0 013.6 1.48 6.01 6.01 0 011.49 3.55 5.9 5.9 0 01-3.6-1.43zM5.2 16.9a6.08 6.08 0 01-3.6 1.48 6.1 6.1 0 011.48-3.6A6.1 6.1 0 016.7 13.3a6.06 6.06 0 01-1.49 3.6zM17.42 2.09a.53.53 0 01.2-.42.51.51 0 01.45-.1 10.86 10.86 0 014.4 2.17l-.7-.01a13.9 13.9 0 00-4.35.72zm-1.94 19.63a.53.53 0 01-.48-.08.52.52 0 01-.21-.43v-1.83a17.75 17.75 0 003.06 1.25 9.79 9.79 0 01-2.37 1.09zm6.29-2.05a11.6 11.6 0 01-1.98-.18 15.86 15.86 0 01-5.38-2.1 26.8 26.8 0 01-5.88-4.91 24.72 24.72 0 018.4-6.2h.02a12.85 12.85 0 014.82-1 17.6 17.6 0 012.64.2 18.27 18.27 0 012 .42 10.15 10.15 0 00-2.66 6.75 9.98 9.98 0 002.57 6.42 17.78 17.78 0 01-4.55.6zm6.22-1.12a8.33 8.33 0 01-2.69-5.9 8.5 8.5 0 012.8-6.2c4.45 1.65 7.16 4.6 7.16 6.02 0 1.46-2.76 4.42-7.27 6.08z" data-name="Path 21"/></g></g><g data-name="Group 29"><g data-name="Group 28"><path d="M30.65 11.49a.8.8 0 00-.8.8v.36a.8.8 0 101.6 0v-.36a.8.8 0 00-.8-.8z" data-name="Path 22"/></g></g><g data-name="Group 31"><g data-name="Group 30"><path d="M22.83 7.24a.8.8 0 00-1.14.03 5.5 5.5 0 00-.22.25.8.8 0 101.23 1.04c.05-.06.1-.13.16-.18a.8.8 0 00-.03-1.14z" data-name="Path 23"/></g></g><g data-name="Group 33"><g data-name="Group 32"><path d="M22.76 16.83a6.59 6.59 0 01-1.4-4.28 7.58 7.58 0 01.47-2.7.8.8 0 00-1.5-.58 9.2 9.2 0 00-.58 3.28 8.2 8.2 0 001.8 5.33.8.8 0 101.21-1.05z" data-name="Path 24"/></g></g></svg></label>
                                <label class="control control-checkbox"><div><input name="pork" class="filter-checkbox" id="protein-pork" type="checkbox" checked/><div class="control_indicator"></div></div><span>Pork</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.59 19.06"><defs/><g transform="translate(-16 -95.96)"><path d="M44.26 102.66a3.02 3.02 0 01-1.78-1.6l-.64-1.39a6.34 6.34 0 00-.34-.64 3.33 3.33 0 001.15-1.08l.42-.62a.48.48 0 00-.21-.7l-.88-.37a3.49 3.49 0 00-3.2.19l-.13.08a6.37 6.37 0 00-2.62-.57H22.4a6.4 6.4 0 00-6.39 6.2v.19a6.4 6.4 0 001.54 4.16 1.7 1.7 0 01-.2 2.4l-1.17.98a.48.48 0 00-.14.51l1.42 4.3a.48.48 0 00.46.32h1.9a.48.48 0 00.48-.55l-.4-2.79h.48l.39-.01v.07a.47.47 0 00.05.16l1.43 2.85a.48.48 0 00.43.27h1.9a.48.48 0 00.48-.56l-.4-2.33a6.18 6.18 0 003.85-1.8l.1-.09a11.73 11.73 0 001.22-.01v1.45a.48.48 0 00.02.15l.95 2.86a.48.48 0 00.46.33h2.38a.48.48 0 00.47-.56l-.46-2.72.26-.58.23.67a.47.47 0 00.05.11l1.91 2.86a.48.48 0 00.4.22h2.38a.48.48 0 00.45-.65l-1.4-3.73v-2.22a5 5 0 003.96-1.46l.57-.57 1.78-.44a.48.48 0 00.36-.46v-2.38a.48.48 0 00-.33-.46zm-2.65-5.52l.35.14-.1.15a2.38 2.38 0 01-.93.82 6.42 6.42 0 00-1.3-1.17 2.6 2.6 0 011.98.06zM24.1 111.2a.48.48 0 00-.47.55l.38 2.3h-1.05l-1.26-2.52v-.03a5.42 5.42 0 003.06-2.1l.05.02a11.5 11.5 0 002.5.68 5.23 5.23 0 01-3.21 1.1zm8.58.55l.39 2.3h-1.48l-.82-2.46v-1.47a11.57 11.57 0 002.57-.67l.12.36-.74 1.67a.48.48 0 00-.04.27zm10.95-6.64l-1.54.38a.48.48 0 00-.22.13l-.67.66a4.05 4.05 0 01-3.67 1.11.48.48 0 00-.57.47v2.86a.48.48 0 00.03.17l1.2 3.17h-1.45l-1.73-2.6-.92-2.78-.48-1.89-.92.23.38 1.51a10.7 10.7 0 01-7.8.05 6.13 6.13 0 00.59-1.57l-.93-.2a5.18 5.18 0 01-.75 1.74l-.01.02a4.45 4.45 0 01-3.8 2.15h-1.04a.48.48 0 00-.47.54l.4 2.8h-1.01l-1.22-3.66.92-.76a2.65 2.65 0 00.31-3.76 5.44 5.44 0 01-1.17-2.35 1.43 1.43 0 001.77-1.38v-.48a.48.48 0 11.95 0v.95h.95v-.95a1.43 1.43 0 00-2.85 0v.48a.48.48 0 01-.96.04 5.44 5.44 0 015.44-5.28h13.65a5.45 5.45 0 014.94 3.15l.64 1.4a3.98 3.98 0 002.01 1.97z" data-name="Path 29"/><path d="M39.01 100.29a.45.45 0 00.17-.7l-.6-.78a3.84 3.84 0 00-3.05-1.5h-.82v.9h.82a2.94 2.94 0 012.33 1.15l.25.33-.2.09a2.91 2.91 0 01-3.28-.65l-.65.63a3.8 3.8 0 004.29.85z" data-name="Path 30"/><circle cx=".91" cy=".91" r=".91" data-name="Ellipse 12" transform="translate(38 101.7)"/></g></svg></label>
                                <label class="control control-checkbox"><div><input name="steak" class="filter-checkbox" id="protein-steak" type="checkbox" checked/><div class="control_indicator"></div></div><span>Steak</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29.09 25"><defs/><g transform="translate(0 -35.88)"><path d="M0 47.9c0 3.96 3.88 7.87 8.74 7.87a9.82 9.82 0 016.8 2.93 7.4 7.4 0 005.14 2.18 7.57 7.57 0 005.96-3.22 12.41 12.41 0 002.45-7.58v-3.4c0-5.27-3.17-10.8-8.24-10.8H17.1a.57.57 0 100 1.14h3.75c3.92 0 7.1 4.33 7.1 9.66a11.27 11.27 0 01-2.21 6.88 6.46 6.46 0 01-5.06 2.77 6.34 6.34 0 01-4.34-1.84 10.96 10.96 0 00-7.6-3.27c-3.84 0-7.24-2.87-7.57-6.4a7.1 7.1 0 017.07-7.8h3.75a.57.57 0 100-1.13H8.24a8.26 8.26 0 00-6.1 2.7A8.4 8.4 0 000 44.87zm8.74 4.46a9.82 9.82 0 016.8 2.93 7.4 7.4 0 005.14 2.18 7.57 7.57 0 005.96-3.21 10.96 10.96 0 001.06-1.68 10.67 10.67 0 01-1.96 4.39 6.46 6.46 0 01-5.06 2.77 6.34 6.34 0 01-4.34-1.84 10.96 10.96 0 00-7.6-3.27c-3.83 0-7.23-2.86-7.57-6.39a9 9 0 007.57 4.12z" data-name="Path 25"/><path d="M17.6 49.25a2.99 2.99 0 102.98-3 3 3 0 00-2.99 3zm2.98-1.9a1.9 1.9 0 11-1.9 1.9 1.9 1.9 0 011.9-1.9z" data-name="Path 26"/><path d="M5.7 45.83a.54.54 0 00.77.77L13 40.06a.54.54 0 00-.76-.77z" data-name="Path 27"/><path d="M19.16 39.3l-6.53 6.53a.54.54 0 10.77.76l6.52-6.52a.54.54 0 00-.77-.77z" data-name="Path 28"/><ellipse cx="1" cy=".5" data-name="Ellipse 11" rx="1" ry=".5" transform="translate(13.54 35.9)"/></g></svg></label>
                                <label class="control control-checkbox"><div><input name="poultry" class="filter-checkbox" id="protein-poultry" type="checkbox" checked/><div class="control_indicator"></div></div><span>Poultry</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.53 25"><defs/><g data-name="Group 35"><g data-name="Group 34"><path d="M17.98 13.14a7.79 7.79 0 00-3.6-.16 6.43 6.43 0 00-4.33 2.8.48.48 0 00.36.75c.01 0 1.27.12 2.7.41l-.3.98a.48.48 0 10.91.28l.33-1.05.6.16h.02l-.33 1.01a.48.48 0 10.92.3l.33-1.02.34.11a8.6 8.6 0 001.6.43h.03a.48.48 0 00.03-.96 9.32 9.32 0 01-1.37-.38l-.8-.26-.5-.15a29.64 29.64 0 00-3.56-.71c2.1-2.37 5.47-1.91 6.32-1.63.68.23 1.8.77 1.72 1.9a.48.48 0 10.96.07c.09-1.3-.78-2.35-2.38-2.88z" data-name="Path 33"/></g></g><g data-name="Group 37"><g data-name="Group 36"><path d="M22.1 6.63c-.02-.19-.23-.9-.37-1.39a1.59 1.59 0 011.04.28.5.5 0 00.76-.5c-.03-.2-.61-4.84-3.7-5a3.23 3.23 0 00-2.79.95c-.82.96-.98 2.55-.5 4.88.22 1.04.65 3.73.86 5.04a11.18 11.18 0 00-2.03-.19 10.18 10.18 0 00-5 1.23 19.64 19.64 0 00-1.84-3.91 3.2 3.2 0 00-5.62 2.87 3.2 3.2 0 00-1.7 5.54 3.2 3.2 0 002.67 5.62 2.35 2.35 0 001.57 1.08 4.93 4.93 0 005.36-2.18 10.1 10.1 0 003.29.94v2.09H13A.5.5 0 1013 25h5.32a.5.5 0 100-1.02H17.3V21.8a9.27 9.27 0 003.56-1.37 5.07 5.07 0 002.47-3.86l.01-.04c.28-3.05-1.22-7.12-1.74-8.4a1.66 1.66 0 00.51-1.5zM4.02 20.96l-.16.05a2.18 2.18 0 01-1.5-4.08.5.5 0 00.03-.92 2.18 2.18 0 011.27-4.11.5.5 0 00.49-.8 2.19 2.19 0 01.53-3 2.18 2.18 0 013.04.52 19.2 19.2 0 011.8 3.9 4.83 4.83 0 00-2.1 3.82 4.32 4.32 0 00.69 2.3A20.77 20.77 0 014 20.96zm4.24.95a3.93 3.93 0 01-2.56.24 1.68 1.68 0 01-.83-.45 22.93 22.93 0 003.86-2.26 6.63 6.63 0 001.2 1.02 3.93 3.93 0 01-1.67 1.45zm8.02 2.07h-1.16v-2.02h.26q.45 0 .9-.04v2.06zm6.04-7.52a4.07 4.07 0 01-2.02 3.12 8.4 8.4 0 01-3.56 1.28 10.35 10.35 0 01-1.36.09 9.24 9.24 0 01-4.5-1.11 5.61 5.61 0 01-1.68-1.4 3.38 3.38 0 01-.77-2.1 3.98 3.98 0 011.97-3.2 8.87 8.87 0 014.98-1.4 9.97 9.97 0 012.52.3c2.65.7 4.42 2.43 4.42 4.3v.12zm-.22-3.16l-.26-.26a8.06 8.06 0 00-3.36-1.9c-.17-1.04-.69-4.3-.94-5.5-.4-1.97-.3-3.32.28-4a2.26 2.26 0 011.96-.62c1.57.09 2.3 2.06 2.58 3.25a1.74 1.74 0 00-1.55.32v.01l-.04.03-.01.01-.02.03-.02.02-.01.01-.02.03v.02l-.02.02v.02l-.02.03v.04l-.01.03V5.13c.21.7.45 1.51.47 1.65a.59.59 0 01-.31.66.35.35 0 01-.07.01c-.26.04-.52-.2-.57-.53-.02-.14-.03-1.02-.04-1.76a.5.5 0 00-.5-.5.5.5 0 00-.5.5c0 .38 0 1.65.04 1.91a1.6 1.6 0 001.5 1.4 28.65 28.65 0 011.44 4.83z" data-name="Path 34"/></g></g><g data-name="Group 39"><g data-name="Group 38"><path d="M19.88 2.34a.48.48 0 000 .96.48.48 0 000-.96z" data-name="Path 35"/></g></g><g data-name="Group 41"><g data-name="Group 40"><path d="M6.21 9.35a.48.48 0 000 .96.48.48 0 000-.96z" data-name="Path 36"/></g></g><g data-name="Group 43"><g data-name="Group 42"><path d="M2.87 13.52a.48.48 0 000 .96.48.48 0 000-.96z" data-name="Path 37"/></g></g><g data-name="Group 45"><g data-name="Group 44"><path d="M2.46 18.72a.48.48 0 000 .96.48.48 0 000-.96z" data-name="Path 38"/></g></g><g data-name="Group 47"><g data-name="Group 46"><path d="M18.91 16.85a.48.48 0 000 .96.48.48 0 000-.96z" data-name="Path 39"/></g></g></svg></label>
                                <label class="control control-checkbox"><div><input name="vegetarian" class="filter-checkbox" id="protein-vegetarian" type="checkbox" checked/><div class="control_indicator"></div></div><span>Vegetarian</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.65 25"><defs/><path d="M24.48 19.68l-.29-.06c2.81-2.3 3.41-7.42.76-10.08a6.23 6.23 0 01-1.62-4.34c0-2.45-1.62-4.44-3.6-4.44s-3.6 2-3.6 4.44a7 7 0 01-.2 1.63A5.1 5.1 0 009.2 5.82v-5a.4.4 0 10-.79 0v1.54C7.24.25 5.11-.32 2.72.16a.4.4 0 00-.29.54 9.2 9.2 0 001.58 2.44 4.25 4.25 0 004.4 1.5v1.18A5.24 5.24 0 00.67 8.45a.4.4 0 00.72.3A4.44 4.44 0 018.15 6.6a1.03 1.03 0 001.32 0c2.1-1.65 5.72-.94 6.96 2.68a7.25 7.25 0 01-.62 6.08l-1.16 2.08c-2.43-.52-2.77-.71-3.6-.7a.4.4 0 10.01.79 3.35 3.35 0 01.48.02l-.23 2.12a.4.4 0 00.77.08l.23-2.04 3.8.87-.1 1a.4.4 0 10.77.1l.1-.93 5.9 1.35-.3 2.73a.4.4 0 00.77.08l.3-2.63.76.17a1.9 1.9 0 01-.42 3.74l-4.02.01.14-1.28a.4.4 0 00-.78-.09l-.15 1.37-3.85.01.13-1.2a.4.4 0 00-.78-.09l-.14 1.3H12.6l.23-2.1a.4.4 0 00-.78-.09l-.25 2.18h-.67a3.34 3.34 0 01-1.43-6.36.4.4 0 00-.33-.71 4.12 4.12 0 00-1.8 1.63 4.88 4.88 0 01-2.18-1.93 1.3 1.3 0 00-2.44.6L1.72 15.2a7.23 7.23 0 01-.78-5.02.4.4 0 10-.77-.16 8.01 8.01 0 00.86 5.56l1.68 3.05-1.23-.14a1.3 1.3 0 00-.28 2.58l2.03.22c-.5.45-.9.86-.86 1.51a1.3 1.3 0 002.28.74 4.89 4.89 0 012.56-1.4A4.13 4.13 0 0011.14 25l12.75-.02a2.68 2.68 0 00.6-5.3zM3.38.84c2.6-.35 4.25.9 4.8 3.05-2.12.58-3.8-1.1-4.8-3.04zM23.17 19.4l-7.72-1.77.75-1.35A4.2 4.2 0 0023.95 15a.4.4 0 00-.77-.16 3.41 3.41 0 01-6.52.6 8.11 8.11 0 00.96-3.86 3.41 3.41 0 015.54 1.86.4.4 0 10.77-.16 4.2 4.2 0 00-6.37-2.63 7.73 7.73 0 00-1.03-3 7.76 7.76 0 00.39-2.45c0-1.8 1.13-3.66 2.81-3.66 1.66 0 2.81 1.83 2.81 3.66a6.94 6.94 0 001.86 4.9c2.04 2.05 1.85 5.87.07 8.12a4.89 4.89 0 01-1.3 1.17zM7.04 21.36a5.7 5.7 0 00-3 1.67.51.51 0 11-.77-.66 5.43 5.43 0 011.19-1.03.4.4 0 00-.17-.72l-3-.33a.51.51 0 11.1-1.02h.02l2.72.3c.12 0 .5.16.67-.18a.4.4 0 00-.07-.45 5.43 5.43 0 01-.93-1.26A.51.51 0 014 17a.5.5 0 01.69.21 5.68 5.68 0 002.55 2.28 4.17 4.17 0 00-.21 1.88zm0 0"/></svg></label>
                            </div>
                    </form>
                    <div id="filter-actions">
                        <button name="reset" type="submit" class="button-style" id="filter-reset">Reset</button>
                        <button name="submit" type="submit" class="button-style" id="filter-submit">Go</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="no-results" hidden>
            <h1>Sorry, looks like we couldn't find that one..</h1>
            <h1>Try searching for something like <strong>"spicy"</strong> or <strong>"seared"</strong></h1>
            <button class="button-style" id="no-results-button">Okay</button>
        </div>

<!-- Main - Cards -->
<div id="cards">

<?php
    while($row = mysqli_fetch_assoc($result)) {
?>

            <div class="card">
                <div class="card-photo-area">
                    <img src="graphics/cards/<?php echo $row['main_img']; ?>" alt="Recipe #<?php echo $row['id']; ?> Photo">
                </div>
                <div class="card-content">
                    <div class="card-area-name">
                        <h2 class="card-title"><?php echo $row['title']; ?></h2>
                        <p  class="card-subtitle"><?php echo $row['subtitle']; ?></p>
                    </div>
                        <p  class="card-desc"><?php echo $row['description']; ?></p>
                    <div class="card-area-stats">
                        <div class="card-span">
                            <p  class="card-mins-prefix">Cook Time</p>
                            <div class="card-span-line1"></div>
                            <p  class="card-mins"><?php echo $row['cook_time']."mins"; ?></p>
                        </div>
                        <div class="card-span">
                            <p  class="card-cals-prefix">Calories/Serving</p>
                            <div class="card-span-line2"></div>
                            <p  class="card-cals"><?php echo $row['cal_per_serving']; ?></p>
                        </div>
                    </div>
                    </div>
            </div>
<?php
    }
?>
    </div>
    </main>

<!-- Modals -->


<div id="modal-backdrop" style="display: none"></div>
<div class="modal-close" style="display: none; top: 105%;"><span></span><span></span></div>
<div id="modal-container" style="display: none">
    <div class="modal-content" id="modal-menu" style="display: none">
        <h1>Menu</h1>
        <button class="button-style" id="menu-recipe-cms-button">Recipe CMS</button>
        <button class="button-style" id="menu-user-cms-button">User CMS</button>
        <button class="button-style" id="menu-continue-button">Continue to BlueBook</button>
    </div>
    <div class="modal-content" id="modal-help" style="display: none">
        <div class="modal-hero">
            <img src="graphics/modal-heros/help.jpg" alt="Help Photo">
        </div>
        <div class="modal-content-main">
            <h1>Help</h1>
                <h2>About BlueBook</h2>
                    <h3>How it Works</h3>
                        <p>Why are you named Blue Book?</p>
                        <p>How do Blue Book meals work?</p>
                        <p>What delivery days are there in my area?</p>
                        <p>Where do you deliver?</p>
                        <p>Is there a minimum duration required for the Blue Book meals subscription?</p>
                        <p>Are there membership fees?</p>
                        <p>See all 7 articles</p>
                    <h3>Plans</h3>
                        <p>What is Meal Prep by Blue Book?</p>
                        <p>Is it available in my area?</p>
                        <p>What meal plans do you offer?</p>
                        <p>Do you have specific dietary plans?</p>
                    <h3>Recipes</h3>
                        <p>What are Premium Recipes?</p>
                        <p>What comes in each delivery?</p>
                        <p>Can Blue Book accommodate food allergies?</p>
                        <p>Do you provide nutritional and caloric information?</p>
                        <p>Do you offer vegetarian recipes?</p>
                        <p>How does Blue Book define a vegetarian recipe?</p>
                    <a href="">
                        <strong>See all 10 articles</strong>
                    </a>
            <p>If you haven’t found your answer, you can reach us <a href=""><strong>here.</strong></a></p>
        </div>
    </div>
<?php
    $recipe_selected = 4;
    $sql = "SELECT * FROM recipes WHERE id={$recipe_selected};";
    $result_s = mysqli_query($connection, $sql);
    $resultCheck = mysqli_num_rows($result_s);
    if ($resultCheck > 0) {
        if ($row_s = mysqli_fetch_assoc($result_s)) {
?>
    <div class="modal-content" id="modal-recipe" style="display: none">
        <div class="modal-hero">
                <img id="recipe-hero" src="graphics/modal-heros/<?php echo $row_s['main_img']; ?>" alt="Recipe Photo">
            </div>
            <div class="modal-content-main">
                <h1 id="recipe-title"><?php echo $row_s['title']; ?></h1>
                <h2 id="recipe-subtitle"><?php echo $row_s['subtitle']; ?></h2>
                <div id="recipe-stats">
                <p id="recipe-cook-time">Cook Time: <?php echo $row_s['cook_time']; ?>min</p>
                <p id="recipe-serving-count">Servings: <?php echo $row_s['servings']; ?></p>
                <p id="recipe-cals-per-serving">Calories/Serving: <?php echo $row_s['cal_per_serving']; ?></p>
            </div>
            <p id="recipe-desc"><?php echo $row_s['description']; ?></p>
            <img id="recipe-ing-img" src="graphics/ingredients/<?php echo $row_s['ingredients_img']; ?>" alt="Ingredients Photo">
            <div id="recipe-ings">
                <div id="recipe-ing-col-1">
                    <p id="recipe-ing-1">- 11/2 lbs Pizza Dough</p>
                    <p id="recipe-ing-3">- 3 cloves Garlic</p>
                    <p id="recipe-ing-5">- 1 Romaine Lettuce Heart</p>
                    <p id="recipe-ing-7">- 1 lb Broccoli</p>
                    <p id="recipe-ing-9">- 1 cup Part-Skim Ricotta Cheese</p>
                    <p id="recipe-ing-11">- 1 8-Ounce Can Tomato Sauce</p>
                    <p id="recipe-ing-13"></p>
                </div>
                <div id="recipe-ing-col-2">
                    <p id="recipe-ing-2">- 1/2 lb Fresh Mozzarella Cheese</p>
                    <p id="recipe-ing-4">- 1/4 cup Grated Parmesan Cheese</p>
                    <p id="recipe-ing-6">- 2 oz Black Cerignola Olives	</p>
                    <p id="recipe-ing-8">- 1 Tbsp Italian Seasoning (Whole Dried Basil, Sage, Oregano, Savory, Rosemary, Thyme, & Marjoram)</p>
                    <p id="recipe-ing-10">- 1 Lemon</p>
                    <p id="recipe-ing-12"></p>
                </div>
            </div>
            <img src="graphics/steps/step-1.jpg" alt="Step #1 Photo" id="recipe-step-img-1">
            <h2 id="recipe-step-title-1">1 Prepare the ingredients:</h2>
            <p id="recipe-step-desc-1">Remove the dough from the refrigerator to bring to room temperature. Place an oven rack in the center of the oven, then preheat to 475°F. Wash and dry the fresh produce. Cut off and discard the bottom 1/2 inch of the broccoli stem, then roughly chop the broccoli. Peel and roughly chop the garlic. Tear the mozzarella cheese into small pieces. Quarter and deseed the lemon.</p>
            
            <img src="graphics/steps/step-2.jpg" alt="Step #2 Photo" id="recipe-step-img-2">
            <h2 id="recipe-step-title-2">2 Cook the broccoli & make the filling:</h2>
            <p id="recipe-step-desc-2">In a large pan (nonstick, if you have one), heat 2 teaspoons of olive oil on medium-high until hot. Add the chopped broccoli; season with salt and pepper. Cook, stirring occasionally, 4 to 6 minutes, or until lightly browned. Add 2/3 of the chopped garlic. Cook, stirring constantly, 30 seconds to 1 minute, or until fragrant. Add 1/4 cup of water; season with salt and pepper. Cook, stirring occasionally, 2 to 3 minutes, or until the broccoli has softened and the water has cooked off. Transfer to a large bowl. Add the mozzarella cheese, ricotta cheese, half the Italian seasoning, and the juice of 1 lemon wedge; stir to combine. Season with salt and pepper. Wipe out the pan.</p>
            
            <img src="graphics/steps/step-3.jpg" alt="Step #3 Photo" id="recipe-step-img-3">
            <h2 id="recipe-step-title-3">3 Assemble & bake the calzones:</h2>
            <p id="recipe-step-desc-3">Lightly oil a sheet pan. Divide the dough into 2 equal-sized portions; using your hands and a rolling pin (or wine bottle), gently stretch and roll the portions into 1⁄4-inch-thick rounds. (If the dough is resistant, let rest for 5 minutes.) Divide the filling between the centers of the rounds; fold each round in half over the filling. Using a fork, crimp the edges of the dough to seal. Transfer to the sheet pan. Using a fork, poke a few holes across the tops of the calzones to vent. Lightly drizzle the calzones with olive oil. Bake 16 to 18 minutes, or until golden brown. Transfer to a cutting board and let stand for at least 2 minutes.</p>
            
            <img src="graphics/steps/step-4.jpg" alt="Step #4 Photo" id="recipe-step-img-4">
            <h2 id="recipe-step-title-4">4 Prepare the remaining ingredients:</h2>
            <p id="recipe-step-desc-4">While the calzones bake, using the flat side of your knife, smash the olives; remove and discard the pits, then roughly chop. Cut off and discard the root end of the lettuce; roughly chop the leaves. To make the dressing, in a large bowl, combine the mayonnaise, half the parmesan cheese, the juice of the remaining lemon wedges, and a drizzle of olive oil. Season with salt and pepper to taste.</p>
            
            <img src="graphics/steps/step-5.jpg" alt="Step #5 Photo" id="recipe-step-img-5">
            <h2 id="recipe-step-title-5">5</h2>
            <p id="recipe-step-desc-5">While the calzones continue to bake, in the pan used to cook the broccoli, heat 2 teaspoons of olive oil on medium-high until hot. Add the remaining chopped garlic; cook, stirring constantly, 30 seconds to 1 minute, or until fragrant. Add the tomato sauce and remaining Italian seasoning. Cook, stirring frequently, 2 to 3 minutes, or until slightly thickened. Turn off the heat and season with salt and pepper to taste.</p>
            
            <img src="graphics/steps/step-6.jpg" alt="Step #6 Photo" id="recipe-step-img-6">
            <h2 id="recipe-step-title-6">6 Make the salad & serve your dish:</h2>
            <p id="recipe-step-desc-6">Just before serving, add the chopped olives and lettuce to the bowl of dressing. Toss to coat; season with salt and pepper to taste. Cut the baked calzones in half. Serve with the sauce and salad on the side. Garnish with the remaining parmesan cheese.</p>
            <h1>Enjoy!</h1>
        </div>
    </div>
<?php
        }
    }
?>
</div>

<!-- Footer -->

    <footer>
        <p>BlueBook 2020</p>
        <a target="_blank" href="https://www.hunterhdesign.com">
            <p>Created by: Hunter H Design</p>
        </a>
    </footer>
    <script src="js/main.js" type="text/javascript"></script>
</body>
</html>