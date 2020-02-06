window._ = require("lodash");

try {
    window.Popper = require("popper.js").default;
    window.$ = window.jQuery = require("jquery");
    window.Cropper = require("cropperjs");
    window.BlobUtil = require("blob-util");

    require("bootstrap");
} catch (e) {}

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import Echo from "laravel-echo";

window.Pusher = require("pusher-js");

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "6386257a242591d56168",
    cluster: "mt1",
    encrypted: true
});
