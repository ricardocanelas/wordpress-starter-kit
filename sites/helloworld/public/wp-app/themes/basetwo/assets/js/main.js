window.$ = window.jQuery = require('jquery');
// var Bootstrap = require('bootstrap-sass'); // Bootstrap.$ = $;
require('bootstrap-sass/assets/javascripts/bootstrap');

// -------------------------------------------------------

import Router from "./util/router";
import common from "./routes/_common";
import pageTemplateTemplateHome from "./routes/template-home";
import postTypeArchiveProject from "./routes/archive-project";
import singleProject from "./routes/single-project";
import singlePost from "./routes/single-post";

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.

const routes = {
    // All pages
    common,

    // Template
    pageTemplateTemplateHome,   // -> template-home.php

    // Post
    singlePost,                 // -> single.php

    // Projects
    postTypeArchiveProject,     // -> archive-project.php
    singleProject,              // -> single-project.php
};


// Load Events
document.addEventListener('DOMContentLoaded', () => new Router(routes).loadEvents());