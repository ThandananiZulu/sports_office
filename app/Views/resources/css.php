<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: none;
        color: black !important;
        border-radius: 4px;
        border: 0px solid #828282;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:active {
        background: none;
        color: black !important;
    }
</style>
<style>
    :root {
        --coloropacity: rgba(255, 122, 89, 0);
        --white: #ffffff;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    input:-webkit-autofill {

        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
        padding-left: 100px;
        -webkit-box-shadow: inset -8px 8px 8px #cdcfd1, inset -8px -8px 8px #ffffff, 0 0 0 50px white inset;

    }

    /* Reseting */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    label {
        color: black
    }

    .wrapper {
        /* max-width: 440px; */
        width: 420px;
        min-height: 500px;
        margin: 80px auto;
        padding: 40px 30px 30px 30px;
        background-color: #FFFFFF;
        border-radius: 15px;
        box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
    }

    .logo {
        width: 100px;
        margin: auto;
    }

    .logo img {
        width: 100%;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0px 0px 3px #5f5f5f,
            0px 0px 0px 5px #ecf0f3,
            8px 8px 15px #a7aaa7,
            -8px -8px 15px #fff;
    }

    .wrapper .name {
        font-weight: 600;
        font-size: 1.4rem;
        letter-spacing: 1.3px;
        padding-left: 10px;
        color: #555;
    }

    .wrapper .form-field input {
        width: 100%;
        display: block;
        border: none;
        outline: none;
        background: none;
        font-size: 1.2rem;
        color: #666;
        padding: 10px 15px 10px 10px;
        /* border: 1px solid red; */
    }

    .wrapper .form-field {
        padding-left: 10px;
        margin-bottom: 20px;
        border-radius: 20px;
        box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
    }

    .wrapper .form-field .fas {
        color: #555;
    }

    .wrapper .buttone {
        color: #D4C1AA;
    }

    .wrapper .btn {
        box-shadow: none;
        width: 100%;
        height: 40px;
        background-color: #53292F;
        color: #fff;
        border-radius: 25px;
        box-shadow: 3px 3px 3px #b1b1b1,
            -3px -3px 3px #fff;
        letter-spacing: 1.3px;
    }

    .wrapper .btn:hover {
        background-color: #4C2C2E;
    }

    .wrapper a {
        text-decoration: none;
        font-size: 0.8rem;
        color: #53292F;
    }

    .wrapper a:hover {
        color: #7E5333;
    }

    @media(max-width: 380px) {
        .wrapper {
            margin: 30px 20px;
            padding: 40px 15px 15px 15px;
        }
    }

    body {
        font-family: sans-serif;
        font-size: 16px;
        color: #fff;
        background: #F4F0EA;
    }

    .fonttype {
        font-family: 'Lucida Sans', 'Lucida Sans Regular';
    }

    .centre {
        text-align: center;

    }

    .scroll {
        height: calc(100vh - 165px);
        overflow-y: scroll;




    }

    .offcanvas-backdrop {
        /* background-color: lightcyan; */
    }

    ul.sidebar-menu {
        margin: 0;
        padding: 0;
        max-width: 300px;
        list-style: none;
        list-style-type: none;


    }

    .page-wrap {
        float: right;

        width: 66%;
        transition: width 0.3s ease;
    }

    .sections {
        transform: translate(15%, 0);
        transition: transform 0.3s ease;
    }

    .sectionsUndo {
        transform: translate(-1%, 0);
        transition: transform 0.3s ease;
    }

    .sidebar-menu li a span {
        margin-right: 20px;
        color: #000;
    }

    .sidebar-menu li a {
        background-color: #fff;
        padding: 20px 25px;
        display: block;
        text-decoration: none;
        color: #000;
    }

    .sidebar-menu li a:hover {
        background-color: #eee;
        padding: 20px 25px;
        display: block;
        text-decoration: none;
        color: #000;
    }

    li.have-children ul {
        padding: 0px;
    }

    li.have-children ul li a {
        background-color: #ddd;
        padding-left: 29px;
    }

    li.have-children ul li a:hover {
        color: #000;
        background-color: #eee;
        padding-left: 62px;
        font-weight: bold;
    }

    li.have-children,
    li {
        position: relative;
    }

    .have-children span::after {
        position: absolute;
        right: 30px;
        content: "\f054";
        color: #000;
        transition: all .5s;
    }

    li.active.have-children span::after {
        -moz-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }

    .sidebar-menu .have-children>ul {
        display: none;
    }

    #style-10::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
        border-radius: 10px;
    }

    #style-10::-webkit-scrollbar {
        width: 10px;
        background-color: #F5F5F5;
    }

    #style-10::-webkit-scrollbar-thumb {
        background-color: #ddd;
        border-radius: 10px;


    }

    .marginright {
        padding-right: 200px;
    }

    .modal-dialog {
        overflow-y: initial !important
    }

    .modal-body {
        height: 80vh;
        overflow-y: auto;
    }

    .modal.fade.in {
        overflow-y: hidden;
    }

    .containers {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

    }

    .cards {
        position: relative;
        background: #fff;
        max-width: 325px;
        width: 325px;
        height: auto;
        margin: 25px;
        box-shadow: 0 5px 25px rgb(1 1 1 / 20%);
        border-radius: 10px;
        overflow: hidden;
    }

    .card-contents {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin: 30px;
    }

    .card-images {
        max-height: 200px;
    }

    .card-images img {
        width: 100%;
        height: 20vh;
        object-fit: contain;
    }



    .card-infos {
        position: relative;
        color: #222;
        padding: 10px 20px 20px;

    }

    .card-infos h3 {
        font-size: 1.8em;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .card-infos p {
        font-size: 1em;
        margin-bottom: 5px;
    }


    ._pagination {
        user-select: none;
        margin: 30px 30px 60px;
        text-align: center;
    }

    ._pagination li {
        display: inline-block;
        margin: 5px;
        box-shadow: 0 5px 25px rgb(1 1 1 / 10%);
    }

    ._pagination li a {
        color: #fff;
        text-decoration: none;
        font-size: 1.2em;
        line-height: 45px;
    }

    ._previous-page,
    ._next-page {
        background: #0ab1ce;
        width: 80px;
        border-radius: 45px;
        cursor: pointer;
        transition: 0.3s ease;
    }

    ._previous-page:hover {
        transform: translateX(-5px);
    }

    ._next-page:hover {
        transform: translateX(5px);
    }


    ._current-page,
    ._dots {
        background: #ccc;
        width: 45px;
        border-radius: 50%;
        cursor: pointer;
    }

    ._active {
        background: #0ab1ce;
    }

    ._disable {
        background: #ccc;
    }
</style>